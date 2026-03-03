<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 23:00
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ProfileController.php
 * @date    15/01/2026
 * @time    19:17
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\User;

use App\Entity\User\User;
use App\Form\User\ChangePasswordFormType;
use App\Form\User\EditUserFormType;
use App\Repository\User\UserRepository;
use App\Service\UserMailer;
use App\Traits\Controller\NotificationsTrait;
use DateMalformedStringException;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\UX\Turbo\TurboBundle;

#[Route('/profile', name: 'profile_')]
final class ProfileController extends AbstractController
{
    use NotificationsTrait;

    public function __construct(
        private readonly TagAwareCacheInterface $cache,
        private readonly SeoPageInterface       $seo
    ) {}

    /**
     * @throws InvalidArgumentException
     */
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(UserRepository $repository): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $this->seo->setTitle('Perfil de '.$user->getUserIdentifier());

        return $this->render('pages/user/profile/index.html.twig', [
            'stats' => $repository->getUserStats($user),
        ]);
    }

    #[Route('/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $this->seo->setTitle('Editar perfil de '.$user->getUserIdentifier());

        $form = $this->createForm(EditUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager->persist($user);
                $entityManager->flush();

                $this->cache->invalidateTags(['user_profile.stats_'.$user->getId()]);

                $this->addNotification('success', 'Tu perfil ha sido actualizado correctamente.');
            } catch (Exception $e) {
                $this->addNotification(
                    'error',
                    'Ocurrió un error al guardar los cambios. Por favor, inténtalo de nuevo más tarde.'
                );
            }

            return $this->redirectToRoute('app_user_profile_index');
        }

        return $this->render('pages/user/profile/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/change-password', name: 'change_password', methods: ['GET', 'POST'])]
    public function changePassword(
        Request                     $request,
        UserRepository              $repository,
        UserPasswordHasherInterface $hasher
    ):
    Response {
        /** @var User $user */
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        $this->seo->setTitle('Cambiar contraseña de '.$user->getUserIdentifier());

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                $repository->upgradePassword(
                    $user,
                    $hasher->hashPassword($user, $form->get('plainPassword')->getData())
                );

                $this->addNotification('success', 'Tu contraseña ha sido cambiada correctamente.');
            } catch (Exception) {
                $this->addNotification(
                    'error',
                    'Ocurrió un error al cambiar tu contraseña. Por favor, inténtalo de nuevo más tarde.'
                );
            }

            return $this->redirectToRoute('app_user_profile_index');
        }

        return $this->render('pages/user/profile/change_password.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/delete', name: 'delete', methods: ['GET'])]
    public function confirmDeletion(): Response
    {
        $this->seo->setTitle('Confirmar borrado de cuenta');

        return $this->render('pages/user/profile/confirm_deletion.html.twig');
    }

    /**
     * @throws DateMalformedStringException
     */
    #[Route('/delete/in-progress', name: 'delete_in_progress', methods: ['GET', 'POST'])]
    public function delete(Request $request, EntityManagerInterface $entityManager, UserMailer $mailer): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $this->seo->setTitle('Borrado de cuenta en proceso');

        if ($request->isMethod(Request::METHOD_POST)) {
            $user->setDeletedAt(new DateTime('now'));
            $entityManager->flush();

            try {
                $mailer->sendAccountDeletionRequest($user, $request->getClientIp() ?? 'desconocida');
            } catch (TransportExceptionInterface) {
                $this->addNotification('error', 'Error al enviar el correo de borrado de cuenta.');
            }
        }

        if (!$user->isDeleted()) {
            return $this->redirectToRoute('app_user_profile_index');
        }

        $this->seo->setTitle('Borrado de cuenta en proceso');

        $date = $user->getDeletedAt()->modify('+30 days');

        return $this->render('pages/user/profile/deletion_in_progress.html.twig', [
            'delete_remaining_time' => $date->diff(new DateTime('now')),
        ]);
    }

    /**
     * Cancela el borrado de la cuenta del usuario, restaurando su estado activo.
     */
    #[Route('/delete/cancel', name: 'delete_cancel', methods: ['POST'])]
    public function cancelDeletion(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$this->isCsrfTokenValid('cancel_deletion', $request->getPayload()->get('_token'))) {
            $this->addNotification('error', 'Token de seguridad inválido. Por favor, inténtalo de nuevo.');

            return $this->redirectToRoute('app_user_profile_delete_in_progress');
        }

        if (!$user->isDeleted()) {
            return $this->redirectToRoute('app_user_profile_index');
        }

        try {
            // Restaurar la cuenta estableciendo deletedAt a null
            $user->setDeletedAt();
            $entityManager->flush();

            $this->addNotification(
                'success',
                '¡Tu cuenta ha sido restaurada correctamente! Ya puedes usar el foro con normalidad.'
            );
        } catch (Exception) {
            $this->addNotification(
                'error',
                'Ocurrió un error al restaurar tu cuenta. Por favor, inténtalo de nuevo más tarde.'
            );

            return $this->redirectToRoute('app_user_profile_delete_in_progress');
        }

        return $this->redirectToRoute('app_user_profile_index');
    }
}
