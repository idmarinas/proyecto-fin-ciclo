<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:19
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ResetPasswordControllerTest.php
 * @date    08/03/2026
 * @time    22:20
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\User;

use App\Entity\User\User;
use App\Repository\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ResetPasswordControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    private EntityManagerInterface $em;

    private UserRepository $userRepository;

    public function testResetPasswordController(): void
    {
        // Create a test user
        $user = (new User())
            ->setEmail('me@example.com')
            ->setPassword('a-test-password-that-will-be-changed-later')
        ;
        $this->em->persist($user);
        $this->em->flush();

        // Test Request reset password page
        $this->client->request('GET', '/user/reset-password');

        self::assertResponseIsSuccessful();
        self::assertPageTitleContains('Restablecer contraseña');

        // Submit the reset password form and test email message is queued / sent
        $this->client->submitForm('Enviar enlace de restablecimiento', [
            'reset_password_request_form[email]' => 'me@example.com',
        ]);

        // Ensure the reset password email was sent
        // Use either assertQueuedEmailCount() || assertEmailCount() depending on your mailer setup
        // self::assertQueuedEmailCount(1);
        self::assertEmailCount(1);

        $messages = $this->getMailerMessages();
        self::assertCount(2, $messages);

        self::assertEmailAddressContains($messages[0], 'from', 'mailer@localhost');
        self::assertEmailAddressContains($messages[0], 'to', 'me@example.com');
        self::assertEmailTextBodyContains($messages[0], 'Este enlace caducará en 1 hour');

        self::assertResponseRedirects('/user/reset-password/check-email');

        // Test check email landing page shows correct "expires at" time
        $crawler = $this->client->followRedirect();

        self::assertPageTitleContains('Correo de restablecimiento enviado');
        self::assertStringContainsString('Este enlace caducará en', $crawler->html());

        // Test the link sent in the email is valid
        $email = $messages[0]->toString();
        preg_match('#(/user/reset-password/reset/[a-zA-Z0-9]+)#', $email, $resetLink);

        $this->client->request('GET', $resetLink[1]);

        self::assertResponseRedirects('/user/reset-password/reset');

        $this->client->followRedirect();

        // Test we can set a new password
        $this->client->submitForm('Restablecer contraseña', [
            'reset_password_form[plainPassword][first]'  => 'newStrongPassword',
            'reset_password_form[plainPassword][second]' => 'newStrongPassword',
        ]);

        self::assertResponseRedirects('/');

        $user = $this->userRepository->findOneBy(['email' => 'me@example.com']);

        self::assertInstanceOf(User::class, $user);

        /** @var UserPasswordHasherInterface $passwordHasher */
        $passwordHasher = static::getContainer()->get(UserPasswordHasherInterface::class);
        self::assertTrue($passwordHasher->isPasswordValid($user, 'newStrongPassword'));
    }

    protected function setUp(): void
    {
        $this->client = static::createClient();

        // Ensure we have a clean database
        $container = static::getContainer();

        /** @var EntityManagerInterface $em */
        $em = $container->get('doctrine')->getManager();
        $this->em = $em;

        $this->userRepository = $container->get(UserRepository::class);

        foreach ($this->userRepository->findAll() as $user) {
            $this->em->remove($user);
        }

        $this->em->flush();
    }
}
