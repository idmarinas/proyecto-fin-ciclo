<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 02:15
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    HomeControllerTest.php
 * @date    08/03/2026
 * @time    02:13
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HomeControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
    }

    public function testLegal(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal/aviso-legal');

        self::assertResponseIsSuccessful();
    }

    public function testPrivacy(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal/politica-de-privacidad');

        self::assertResponseIsSuccessful();
    }

    public function testTerms(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal/terminos-y-condiciones');

        self::assertResponseIsSuccessful();
    }

    public function testCookies(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal/politica-de-cookies');

        self::assertResponseIsSuccessful();
    }
}
