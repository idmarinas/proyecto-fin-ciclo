<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 15/01/2026, 19:16
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    idm_seo.php
 * @date    10/01/2026
 * @time    11:09
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'idm_seo' => [
        'sitemap' => [
            'excluded_routes' => [
                'admin',
            ],
        ],
        'seo'     => [
            'title'       => [
                'default'   => 'Ayuda y Soporte',
                'separator' => '🤔',
                'suffix'    => 'Lúmina Servicios tecnológicos',
            ],
            'description' => 'Soporte y ayuda de Lúmina Servicios Tecnológicos: soluciones rápidas, guías y asistencia para todos nuestros servicios digitales.',
            'open_graph'  => [
                'site_name' => 'Ayuda y Soporte Lúmina',
            ],
        ],
    ],
]);
