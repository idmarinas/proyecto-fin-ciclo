<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 23:03
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ResetPasswordController.php
 * @date    10/01/2026
 * @time    13:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\User;

use App\Entity\User\User;
use App\Form\User\ResetPasswordFormType;
use App\Form\User\ResetPasswordRequestFormType;
use App\Traits\Controller\NotificationsTrait;
use Doctrine\ORM\EntityManagerInterface;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

#[Route('/reset-password')]
final class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;
    use NotificationsTrait;

    public function __construct(
        private readonly ResetPasswordHelperInterface $resetPasswordHelper,
        private readonly EntityManagerInterface       $entityManager,
        private readonly SeoPageInterface             $seo
    ) {}

    /**
     * Display & process form to request a password reset.
     */
    #[Route('', name: 'forgot_password_request')]
    public function request(Request $request, MailerInterface $mailer): Response
    {
        $this->seo->setTitle('Restablecer contraseña');

        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('email')->getData();

            return $this->processSendingPasswordResetEmail($email, $mailer);
        }

        return $this->render('pages/user/reset_password/request.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * Confirmation page after a user has requested a password reset.
     */
    #[Route('/check-email', name: 'check_email')]
    public function checkEmail(): Response
    {
        $this->seo->setTitle('Correo de restablecimiento enviado');

        $resetToken = $this->getTokenObjectFromSession();
        // Generate a fake token if the user does not exist or someone hit this page directly.
        // This prevents exposing whether or not a user was found with the given email address or not
        if (null === $resetToken) {
            $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
        }

        return $this->render('pages/user/reset_password/check_email.html.twig', [
            'resetToken' => $resetToken,
        ]);
    }

    /**
     * Validates and process the reset URL that the user clicked in their email.
     */
    #[Route('/reset/{token}', name: 'reset_password')]
    public function reset(
        Request                     $request,
        UserPasswordHasherInterface $passwordHasher,
        TranslatorInterface         $translator,
        ?string                     $token = null
    ): Response {
        if ($token) {
            // We store the token in session and remove it from the URL, to avoid the URL being
            // loaded in a browser and potentially leaking the token to 3rd party JavaScript.
            $this->storeTokenInSession($token);

            return $this->redirectToRoute('app_user_reset_password');
        }

        $token = $this->getTokenFromSession();

        if (null === $token) {
            throw $this->createNotFoundException('No reset password token found in the URL or in the session.');
        }

        try {
            /** @var User $user */
            $user = $this->resetPasswordHelper->validateTokenAndFetchUser($token);
        } catch (ResetPasswordExceptionInterface $e) {
            $this->addFlash(
                'reset_password_error',
                sprintf(
                    '%s - %s',
                    $translator->trans(
                        ResetPasswordExceptionInterface::MESSAGE_PROBLEM_VALIDATE,
                        [],
                        'ResetPasswordBundle'
                    ),
                    $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
                )
            );

            return $this->redirectToRoute('app_user_forgot_password_request');
        }

        // The token is valid; allow the user to change their password.
        $form = $this->createForm(ResetPasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // A password reset token should be used only once, remove it.
            $this->resetPasswordHelper->removeResetRequest($token);

            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // Encode(hash) the plain password, and set it.
            $user->setPassword($passwordHasher->hashPassword($user, $plainPassword));
            $this->entityManager->flush();

            // The session is cleaned up after the password has been changed.
            $this->cleanSessionAfterReset();

            $this->addNotification('success', [
                'title'   => 'Contraseña cambiada correctamente',
                'message' => 'Recuérdala bien esta vez.',
            ]);

            return $this->redirectToRoute('app_home');
        }

        return $this->render('pages/user/reset_password/reset.html.twig', [
            'form' => $form,
        ]);
    }

    private function processSendingPasswordResetEmail(string $emailFormData, MailerInterface $mailer): RedirectResponse
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $emailFormData]);

        // Do not reveal whether a user account was found or not.
        if (!$user) {
            return $this->redirectToRoute('app_user_check_email');
        }

        try {
            $resetToken = $this->resetPasswordHelper->generateResetToken($user);
        } catch (ResetPasswordExceptionInterface $e) {
            // If you want to tell the user why a reset email was not sent, uncomment
            // the lines below and change the redirect to 'app_forgot_password_request'.
            // Caution: This may reveal if a user is registered or not.
            //
            // $this->addFlash('reset_password_error', sprintf(
            //     '%s - %s',
            //     $translator->trans(ResetPasswordExceptionInterface::MESSAGE_PROBLEM_HANDLE, [], 'ResetPasswordBundle'),
            //     $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
            // ));

            return $this->redirectToRoute('app_user_check_email');
        }

        $email = new TemplatedEmail()
            ->to((string)$user->getEmail())
            ->subject('Tu solicitud de restablecimiento de contraseña')
            ->htmlTemplate('emails/user/reset_password.html.twig')
            ->textTemplate('emails/user/reset_password.text.twig')
            ->context(['resetToken' => $resetToken,])
        ;

        try {
            $mailer->send($email);

            $this->addNotification(
                'success',
                'Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña. Por favor, revisa tu bandeja de entrada.'
            );
        } catch (TransportExceptionInterface) {
            $this->addNotification(
                'error',
                'Se ha producido un error al enviar el correo electrónico para restablecer la contraseña. Inténtalo de nuevo más tarde.'
            );
        }

        // Store the token object in session for retrieval in check-email route.
        $this->setTokenObjectInSession($resetToken);

        return $this->redirectToRoute('app_user_check_email');
    }
}
