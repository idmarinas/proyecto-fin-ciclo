<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 20/01/2026, 22:10
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    RegistrationController.php
 * @date    10/01/2026
 * @time    13:38
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\User;

use App\Entity\User\User;
use App\Form\User\RegistrationFormType;
use App\Security\EmailVerifier;
use App\Traits\Controller\NotificationsTrait;
use Doctrine\ORM\EntityManagerInterface;
use Idm\Bundle\Seo\Attributes\Seo;
use Idm\Bundle\Seo\Attributes\Sitemap;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\UX\Turbo\TurboBundle;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

#[Route('/registration')]
final class RegistrationController extends AbstractController
{
    use NotificationsTrait;

    public function __construct (
        private readonly EmailVerifier    $emailVerifier,
        private readonly SeoPageInterface $seoPage,
        private readonly MailerInterface  $mailer
    ) {}

    #[Seo, Sitemap]
    #[Route('/register', name: 'register')]
    public function register (
        Request                     $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface      $entityManager,
        UserAuthenticatorInterface  $userAuthenticator,
        #[Autowire(service: 'security.authenticator.form_login.main')]
        FormLoginAuthenticator      $formLoginAuthenticator
    ): Response {
        $this->seoPage
            ->setTitle('Formulario de registro')
            ->setDescription('Formulario de registro para usuarios nuevos.')
        ;

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_user_verify_email',
                $user,
                new TemplatedEmail()
                    ->to((string)$user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('emails/user/welcome.html.twig')
                    ->textTemplate('emails/user/welcome.txt.twig')
                    ->locale($request->getLocale())
            );

            // do anything else you need here, like send an email
            return $userAuthenticator->authenticateUser($user, $formLoginAuthenticator, $request, [
                new RememberMeBadge()->enable(),
            ]);
        }

        if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
            $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

            return $this->render('pages/user/registration/form.stream.html.twig', ['form' => $form]);
        }

        return $this->render('pages/user/registration/index.html.twig', ['form' => $form,]);
    }

    #[Route('/verify/email', name: 'verify_email')]
    public function verifyUserEmail (Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate an email confirmation link, sets User::isVerified=true and persists
        try {
            /** @var User $user */
            $user = $this->getUser();
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_user_login');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_user_profile');
    }
}
