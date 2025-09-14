<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 14/09/2025, 11:39
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    bootstrap.php
 * @date    27/08/2025
 * @time    21:09
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

if (method_exists(Dotenv::class, 'bootEnv')) {
    new Dotenv()->bootEnv(dirname(__DIR__) . '/.env');
}

if ($_SERVER['APP_DEBUG']) {
    umask(0000);
}
