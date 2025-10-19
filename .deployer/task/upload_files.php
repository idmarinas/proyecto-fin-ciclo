<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/10/2025, 19:37
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    upload_files.php
 * @date    05/03/2025
 * @time    11:48
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace Deployer;

import('recipe/common.php');

desc('Upload files to server');
task('deploy:upload_files', function () {
    writeln('<fg=blue>Subiendo archivos a {{text_prod}}...</>');
    upload('./', '{{release_path}}', [
        'flags'   => '-azPh',
        'options' => [
            '--include=compose.yaml',
            '--include=compose.prod.yaml',
            '--exclude=**/*',
            '--chmod=F440',
        ],
    ]);
    writeln('<fg=blue>Subiendo {{docker/image/tar}} a {{text_prod}}...</>');
    upload('./.deployer/{{docker/image/tar}}', '{{release_path}}', [
        'options' => ['--chmod=F750'],
    ]);
});
