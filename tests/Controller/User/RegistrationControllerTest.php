<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:11
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    RegistrationControllerTest.php
 * @date    10/01/2026
 * @time    21:14
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\User;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;

class RegistrationControllerTest extends WebTestCase
{
    public function testWebRegistration(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/registration/register');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('Formulario de registro');

        $client->clickLink('Iniciar sesión');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('Conéctate a tu cuenta');

        $client->request(Request::METHOD_GET, '/user/registration/register');

        $client->submitForm('registration_form_button', [
            'registration_form[email]'                          => 'prueba@test.test',
            'registration_form[plainPassword][password]'        => 'pass_1234_%$',
            'registration_form[plainPassword][password_repeat]' => 'pass_1234_%$',
            'registration_form[termsAccepted]'                  => true,
            'registration_form[privacyAccepted]'                => true,
        ]);

        $this->assertResponseRedirects('http://localhost/user/profile');

        // An email must have been sent
        $this->assertEmailCount(1);
        $this->getMailerMessage();

        $client->followRedirect();
        $this->assertPageTitleContains('Perfil de');

        $client->request(Request::METHOD_GET, '/user/registration/register');

        $this->assertResponseRedirects('/user/profile');
    }

    public function testWebRegistrationFail(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/registration/register');

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('Formulario de registro');

        $client->submitForm('registration_form_button', [
            'registration_form[email]'                          => 'prueba@test.test',
            'registration_form[plainPassword][password]'        => 'pass_1234_$%',
            'registration_form[plainPassword][password_repeat]' => 'pass_1234_$%',
            'registration_form[termsAccepted]'                  => false,
            'registration_form[privacyAccepted]'                => true,
        ]);

        $this->assertResponseIsUnprocessable();

        // No email must have been sent
        $this->assertEmailCount(0);
    }

    public function testVerifyEmailLink(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/registration/register');

        $client->submitForm('registration_form_button', [
            'registration_form[email]'                          => 'prueba@test.test',
            'registration_form[plainPassword][password]'        => 'pass_1234_$%',
            'registration_form[plainPassword][password_repeat]' => 'pass_1234_$%',
            'registration_form[termsAccepted]'                  => true,
            'registration_form[privacyAccepted]'                => true,
        ]);

        $this->assertResponseRedirects('http://localhost/user/profile');

        // An email must have been sent
        $this->assertEmailCount(1);

        /** @var TemplatedEmail $email */
        $email = $this->getMailerMessage();
        $crawler = new Crawler($email->getHtmlBody());
        $link = $crawler->selectLink('Confirmar mi correo')->link()->getUri();

        $client->followRedirect();
        $this->assertResponseIsSuccessful();

        $client->request(Request::METHOD_GET, str_replace('http://localhost', '', $link));

        $this->assertResponseRedirects('/user/profile');

        $client->followRedirect();

        $this->assertResponseIsSuccessful();
    }

    public function testVerifyEmailLinkFail(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/registration/register');

        $client->submitForm('registration_form_button', [
            'registration_form[email]'                          => 'prueba@test.test',
            'registration_form[plainPassword][password]'        => 'pass_1234_$%',
            'registration_form[plainPassword][password_repeat]' => 'pass_1234_$%',
            'registration_form[termsAccepted]'                  => true,
            'registration_form[privacyAccepted]'                => true,
        ]);

        $this->assertResponseRedirects('http://localhost/user/profile');

        // An email must have been sent
        $this->assertEmailCount(1);

        /** @var TemplatedEmail $email */
        $email = $this->getMailerMessage();
        $crawler = new Crawler($email->getHtmlBody());
        $link = $crawler->selectLink('Confirmar mi correo')->link()->getUri();

        $client->followRedirect();
        $this->assertResponseIsSuccessful();

        $client->request(Request::METHOD_GET, str_replace('http://localhost', '', $link).'fail');

        $this->assertResponseRedirects('/user/login');
        $client->followRedirect();

        $this->assertResponseRedirects('/user/profile');
        $client->followRedirect();

        $this->assertPageTitleContains('Perfil de');
        $this->assertSelectorTextContains(
            'body',
            'The link to verify your email is invalid. Please request a new link.'
        );
    }

    public function testVerifyEmail(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/user/registration/register');

        $client->submitForm('registration_form_button', [
            'registration_form[email]'                          => 'prueba@test.test',
            'registration_form[plainPassword][password]'        => 'pass_1234_$%',
            'registration_form[plainPassword][password_repeat]' => 'pass_1234_$%',
            'registration_form[termsAccepted]'                  => true,
            'registration_form[privacyAccepted]'                => true,
        ]);

        $this->assertResponseRedirects('http://localhost/user/profile');

        // An email must have been sent
        $this->assertEmailCount(1);
        /** @var TemplatedEmail $email */
        $email = $this->getMailerMessage();

        $this->assertEmailAddressContains($email, 'to', 'prueba@test.test');
        $this->assertEmailHeaderSame($email, 'subject', 'Please Confirm your Email');
        $this->assertEmailHtmlBodyContains($email, 'http://localhost/user/registration/verify/email?expires=');
        $this->assertEmailHtmlBodyContains(
            $email,
            'Este enlace expirará en 1 hour, es necesario iniciar sesión para poder verificar el correo'
        );
    }
}
