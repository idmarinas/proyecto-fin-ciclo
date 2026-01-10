<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/01/2026, 21:24
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
                'default'   => 'F.A.S',
                'separator' => '🤔',
                'suffix'    => 'Foro de Ayuda y Soporte',

            ],
            'description' => 'Foro de ayuda y soporte para clientes y no de nuestros servicios gratuitos y de pago.',
            'open_graph'  => [
                'site_name' => 'Foro de Ayuda y Soporte',
            ],
        ],
    ],
]);
