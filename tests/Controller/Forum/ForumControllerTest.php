<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 02:21
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumControllerTest.php
 * @date    08/03/2026
 * @time    02:14
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller\Forum;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ForumControllerTest extends WebTestCase
{

    public function testForums(): void
    {
        $client = static::createClient();
        $client->request('GET', '/forums');

        self::assertResponseRedirects('/forums/');

        $client->followRedirect();

        self::assertResponseIsSuccessful();
    }

    public function testSubForums(): void
    {
        $client = static::createClient();
        $client->request('GET', '/forums/facturacion-y-documentos');

        self::assertResponseIsSuccessful();
    }

    public function testThreads(): void
    {
        $client = static::createClient();
        $client->request('GET', '/forums/facturacion-y-documentos/forum/configuracion-de-facturas');

        self::assertResponseIsSuccessful();
    }

    public function testThread(): void
    {
        $client = static::createClient();
        $client->request(
            'GET',
            '/forums/facturacion-y-documentos/forum/configuracion-de-facturas/thread/thread-4-en-subforo-11'
        );

        self::assertResponseIsSuccessful();
    }

    public function testRules(): void
    {
        $client = static::createClient();
        $client->request('GET', '/forums/rules');

        self::assertResponseIsSuccessful();
    }
}
