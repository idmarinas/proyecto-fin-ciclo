<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 12/09/2025, 12:57
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    symfony_workers.php
 * @date    07/05/2025
 * @time    22:07
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

namespace Deployer;

import('recipe/common.php');

set('msn_workers_container_names', [
    'Messenger Worker Async'     => 'pfc-messenger_worker_async-1',
    'Messenger Worker Scheduler' => 'pfc-messenger_worker_scheduler-1',
]);

//
// Tasks
//

desc();
task('deploy:symfony:workers:stop', function () {
    writeln('<info>Deteniendo y borrando los contenedores workers</>');

    $workers = get('msn_workers_container_names');

    foreach ($workers as $name => $worker) {
        if (test('[ -n "$(docker ps -q --filter name=' . $worker . ')" ]')) {
            writeln("<info>Deteniendo worker y Borrando contenedor: <options=bold>$name</></info>");
            run("docker exec $worker php bin/console messenger:stop-workers");
            run("docker wait $worker");
            run("docker rm -f $worker");
        } elseif (test('[ -n "$(docker ps -aq --filter name=' . $worker . ')" ]')) {
            writeln("<fg=yellow>El worker <options=bold>$name</> no está funcionando se borra el contenedor.</>");
            run("docker rm -f $worker");
        } else {
            writeln("<fg=red>El worker <options=bold>$name</> no tiene un contenedor asociado.</>");
        }
    }
});

//

//

//

//

//

//

//

//

//

desc('Stop works of previous release');
task('remote:prod:workers:stop', function () {
    writeln('<info>Stop workers of <fg=red;options=bold>previous</> release in {{local_prod_text}}</info>');
    within('{{previous_release}}', function () {
        run('php bin/console cron:stop', real_time_output: true);
        run('php bin/console messenger:stop-workers', real_time_output: true);
    });
});

desc('Start works of current release');
task('remote:prod:workers:start', function () {
    writeln('<info>Start workers of <fg=green;options=bold>current</> release in {{local_prod_text}}</info>');
    within('{{release_path}}', function () {
        run('php bin/console cron:start > /dev/null 2>&1 &');
    });
});

desc('Workers manager');
task('remote:prod:workers', [
    'remote:prod:workers:stop',
    'remote:prod:workers:start',
]);

//- exec: { cmd: 'php bin/console cron:stop', desc: 'Stop Cron scheduler'}
//- exec: { cmd: 'php bin/console messenger:stop-workers', desc: 'Se paran todos los workers del messenger' }

//
// Hooks
//
before('deploy:publish', 'remote:prod:workers');
