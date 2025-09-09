<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/09/2025, 19:10
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    common_text_vars.php
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

set('text_prod', function () {
    $name = currentHost()->getLabels()['server_name'] ?? 'unknown';

    return "<fg=green>$name</> en <fg=magenta;options=bold>PROD</>";
});
set('text_dev', '<fg=yellow>localhost</> en <fg=red;options=bold>DEV</>');
