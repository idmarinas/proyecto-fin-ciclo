<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/10/2025, 19:42
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    rector.php
 * @date    25/08/2025
 * @time    19:49
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/config',
        __DIR__ . '/factories',
        __DIR__ . '/fixtures',
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php84: true)
    ->withPreparedSets(
        phpunitCodeQuality : true,
        doctrineCodeQuality: true,
        symfonyCodeQuality : true,
        symfonyConfigs     : true
    )
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0)
    ->withImportNames(importDocBlockNames: false, removeUnusedImports: true)
    ->withComposerBased(twig: true, doctrine: true, symfony: true)
    ->withSymfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml')
    ->withSkip([
        __DIR__ . '/config/bundles.php',
    ])
;
