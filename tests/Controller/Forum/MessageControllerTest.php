<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:00
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageControllerTest.php
 * @date    08/03/2026
 * @time    22:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\Forum;

use App\Tests\Factory\User\UserFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\UX\Turbo\TurboBundle;
use Zenstruck\Foundry\Test\Factories;

final class MessageControllerTest extends WebTestCase
{
    use Factories;

    // Las rutas del MessageController requieren el formato turbo_stream,
    // que se activa pasando la cabecera Accept correspondiente.

    // -------------------------------------------------------
    // askDeleteRemove — confirmación de borrado (soft delete)
    // -------------------------------------------------------

    public function testAskDeleteRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/delete',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseRedirects('/user/login');
    }

    public function testAskRemoveRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/remove',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseRedirects('/user/login');
    }

    public function testAskDeleteForbiddenForUnauthorizedUser(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        // El mensaje con id=1 pertenece a otro usuario en los fixtures
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/delete',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        // El voter MessageVoter::DELETE deniega el acceso → 403
        self::assertResponseStatusCodeSame(403);
    }

    public function testAskRemoveForbiddenForNonAdmin(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        // "remove" es eliminación física, reservada para staff/admin
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/remove',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseStatusCodeSame(403);
    }

    // -------------------------------------------------------
    // deleteRemove — ejecución del borrado confirmado
    // -------------------------------------------------------

    public function testDeleteConfirmRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/delete/confirm',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseRedirects('/user/login');
    }

    public function testRemoveConfirmRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/remove/confirm',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseRedirects('/user/login');
    }

    public function testDeleteConfirmForbiddenForUnauthorizedUser(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'user@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($user);
        $client->request(
            'GET',
            '/forums/forum/thread/message/1/delete/confirm',
            [],
            [],
            ['HTTP_ACCEPT' => TurboBundle::STREAM_MEDIA_TYPE]
        );

        self::assertResponseStatusCodeSame(403);
    }
}
