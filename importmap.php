<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/08/2025, 20:22
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/template-symfony
 *
 * @file    importmap.php
 * @date    27/08/2025
 * @time    20:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app'                      => [
        'path'       => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus'       => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo'          => [
        'version' => '7.3.0',
    ],
];
