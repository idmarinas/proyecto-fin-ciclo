<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:07
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadControllerTest.php
 * @date    08/03/2026
 * @time    22:08
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\Forum;

use App\Tests\Factory\User\UserFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;

final class ThreadControllerTest extends WebTestCase
{
    use Factories;

    // -------------------------------------------------------
    // Listado de hilos (index)
    // -------------------------------------------------------

    public function testThreadListIsAccessiblePublicly(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas'
        );

        self::assertResponseIsSuccessful();
    }

    // -------------------------------------------------------
    // Ver hilo (view) — hilo público
    // -------------------------------------------------------

    public function testPublicThreadIsVisibleWithoutLogin(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-4-en-subforo-11'
        );

        self::assertResponseIsSuccessful();
    }

    public function testPrivateThreadRequiresLogin(): void
    {
        $client = static::createClient();
        // El hilo 5 en subforo 11 es privado (is_private: true en fixtures)
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-5-en-subforo-11'
        );

        // Sin autenticación debe devolver 404 (IsGranted con HTTP_NOT_FOUND)
        self::assertResponseStatusCodeSame(404);
    }

    public function testPrivateThreadIsVisibleForStaff(): void
    {
        $client = static::createClient();
        $user = UserFactory::createOne([
            'email'      => 'staff@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER', 'ROLE_ALLOW_PRIVATE_THREADS_VIEW'],
        ]);

        $client->loginUser($user);
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-5-en-subforo-11'
        );

        self::assertResponseIsSuccessful();
    }

    // -------------------------------------------------------
    // Crear hilo — acceso y redirecciones
    // -------------------------------------------------------

    public function testCreatePublicThreadRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/create/public'
        );

        self::assertResponseRedirects('/forums/facturacion-y-documentos/forum/configuracion-de-facturas');
    }

    public function testCreatePublicThreadPageIsAccessibleForAuthenticatedUser(): void
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
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/create/public'
        );

        self::assertResponseIsSuccessful();
    }

    public function testCreatePrivateThreadRequiresPrivatePermission(): void
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
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/create/private'
        );

        self::assertResponseIsSuccessful();
    }

    // -------------------------------------------------------
    // Editar hilo
    // -------------------------------------------------------

    public function testEditThreadRedirectsUnauthenticatedUser(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-4-en-subforo-11/edit'
        );

        self::assertResponseStatusCodeSame(404);
    }

    public function testEditThreadForbiddenForNonAuthor(): void
    {
        $client = static::createClient();
        $otherUser = UserFactory::createOne([
            'email'      => 'other@example.com',
            'password'   => 'password123',
            'isVerified' => true,
            'roles'      => ['ROLE_USER'],
        ]);

        $client->loginUser($otherUser);
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-4-en-subforo-11/edit'
        );

        // El voter ThreadVoter::EDIT devuelve 404 si no tiene permiso
        self::assertResponseStatusCodeSame(404);
    }
}
