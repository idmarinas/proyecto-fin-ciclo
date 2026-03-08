<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 21:15
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ProfileControllerTest.php
 * @date    08/03/2026
 * @time    21:15
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

final class ProfileControllerTest extends WebTestCase
{
    use Factories;

    public function testIndexRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/profile');

        self::assertResponseRedirects('/user/login');
    }

    public function testIndexIsAccessibleForAuthenticatedUser(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/profile');

        self::assertResponseIsSuccessful();
    }

    public function testEditPageIsAccessible(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/profile/edit');

        self::assertResponseIsSuccessful();
    }

    public function testEditRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/profile/edit');

        self::assertResponseRedirects('/user/login');
    }

    public function testChangePasswordPageIsAccessible(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/profile/change-password');

        self::assertResponseIsSuccessful();
    }

    public function testDeleteConfirmationPageIsAccessible(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/profile/delete');

        self::assertResponseIsSuccessful();
    }

    public function testDeleteInProgressRedirectsIfUserNotDeleted(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('GET', '/user/profile/delete/in-progress');

        // El usuario no está marcado como eliminado, debe redirigir al perfil
        self::assertResponseRedirects('/user/profile');
    }

    public function testCancelDeletionRequiresCsrfToken(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request('POST', '/user/profile/delete/cancel', [
            '_token' => 'invalid-token',
        ]);

        // Token inválido: debe redirigir a la página de borrado en progreso
        self::assertResponseRedirects('/user/profile/delete/in-progress');
    }
}
