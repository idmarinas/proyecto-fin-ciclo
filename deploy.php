<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/10/2025, 19:41
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    deploy.php
 * @date    17/07/2025
 * @time    20:01
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace Deployer;

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

// Obtener las variables .env en $_ENV
new Dotenv()->loadEnv(__DIR__.'/.env');

import(__DIR__.'/.deployer/common.php');
import(__DIR__.'/.deployer/task/docker.php');
import(__DIR__.'/.deployer/task/upload_files.php');
import(__DIR__.'/.deployer/task/doctrine.php');
import(__DIR__.'/.deployer/task/maintenance.php');
import(__DIR__.'/.deployer/task/symfony_workers.php');
import(__DIR__.'/.deployer/task/download_files.php');
import(__DIR__.'/.deployer/task/restore_volumes.php');

//
// Config
//
set('project_name', $_ENV['APP_TITLE'] ?? 'Your Project Name');
set('user', 'IDMarinas');
// Release number
set('release_name', fn() => within('{{deploy_path}}', function () {
    $latest = run('cat .dep/latest_release || echo 0');

    return str_pad(strval(intval($latest) + 1), 10, '0', STR_PAD_LEFT);
}));
set('keep_releases', 5);
set('what', get('project_name'));
set('cleanup_use_sudo', true);

//
// Project Config
//
set('app/version', $_ENV['APP_VERSION'] ?? '0.0.0');
set('app/version/build', $_ENV['APP_VERSION_BUILD'] ?? 1);
set('docker/project_name', $_ENV['APP_PROJECT_NAME'] ?? 'your_project_name');
set('github/user', $_ENV['GITHUB_USER'] ?? 'idmarinas');
set('github/repository', $_ENV['GITHUB_REPOSITORY'] ?? '');
set('github/repository/name', $_ENV['GITHUB_REPOSITORY_NAME'] ?? 'your-project-name');

// Path to the bin *.
set('bin/webserver', 'docker exec {{docker/project_name}}-webserver-1');
set('bin/php', '{{bin/webserver}} php');
set('bin/composer', '{{bin/webserver}} composer');
set('bin/console', '{{bin/php}} bin/console');

set('http_user', 'www-data');
set('http_group', 'www-data');

// Docker
set('docker/compose/files', '--env-file .env.docker -f compose.yaml -f compose.prod.yaml');
set('docker/registry', 'ghcr.io');
set('docker/image/name', '{{docker/registry}}/{{github/repository}}:{{app/version}}-build.{{app/version/build}}');

//
// Hosts
//
host('s1.docker.pfc')
    ->setHostname('137.74.43.42')
    ->setPort(64217)
    ->setRemoteUser('debian')
    ->setDeployPath('/home/debian/www/project_fp')
    ->setLabels(['stage' => 'prod', 'role' => 'web', 'server_name' => 'S1 - Docker Server Production'])
;

task('docker:volume:restore')->disable();

//
// Deploy Task - Upload a new version
//
task('deploy', [
    'deploy:prepare',
    'download:backups',
    'deploy:upload_files',
    'docker:registry:login',
    'docker:image:pull',
    'docker:copy:env_docker',
    'deploy:symfony:workers:stop',
    'docker:service:start',
    'doctrine:migrations',
    'deploy:symfony:workers:start',
    'deploy:publish',
]);

task('deploy:prepare', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'docker:image:build',
]);
task('deploy:publish', [
    'deploy:symlink',
    'deploy:unlock',
    'maintenance:off',
    'deploy:cleanup',
    'deploy:success',
]);
