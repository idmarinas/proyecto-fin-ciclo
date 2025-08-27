<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/08/2025, 20:17
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/template-symfony
 *
 * @file    index.php
 * @date    27/08/2025
 * @time    20:17
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return fn(array $context) => new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG'], $context['APP_ID']);
