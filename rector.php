<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/assets',
        __DIR__ . '/config',
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
    ->withComposerBased(twig: true, doctrine: true, symfony: true)
    ->withSymfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml')
    ->withSkip([
        __DIR__ . '/assets/vendor/installed.php',
        __DIR__ . '/config/bundles.php',
        __DIR__ . '/config/preload.php',
        __DIR__ . '/config/reference.php',
    ])
;
