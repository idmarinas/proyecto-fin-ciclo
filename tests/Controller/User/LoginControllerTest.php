<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 21:13
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    LoginControllerTest.php
 * @date    08/03/2026
 * @time    21:13
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\User;

use App\Tests\Factory\User\UserFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;

final class LoginControllerTest extends WebTestCase
{
    use Factories;

    public function testLoginPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/login');

        self::assertResponseIsSuccessful();
    }

    public function testLoginRedirectsAuthenticatedUser(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/login');

        self::assertResponseRedirects('/user/profile');
    }

    public function testLoginWithInvalidCredentialsStaysOnPage(): void
    {
        $client = static::createClient();
        UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'correct-password',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->request('GET', '/user/login');
        $client->submitForm('Conectar', [
            '_username' => 'user@example.com',
            '_password' => 'wrong-password',
        ]);

        // Symfony redirige al login con error de credenciales
        self::assertResponseRedirects('/user/login');
        $client->followRedirect();
        self::assertResponseIsSuccessful();
    }

    public function testLoginWithValidCredentialsRedirects(): void
    {
        $client = static::createClient();
        UserFactory::createOne([
            'email'      => 'valid@example.com',
            'password'   => 'my-password',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->request('GET', '/user/login');
        $client->submitForm('Conectar', [
            '_username' => 'valid@example.com',
            '_password' => 'my-password',
        ]);

        self::assertResponseRedirects();
    }
}
