#!/bin/sh

##
# Copyright 2025 (C) IDMarinas - All Rights Reserved
#
# Last modified by "IDMarinas" on 11/09/2025, 10:25
#
# @project Foro de Ayuda y Soporte
# @see https://github.com/idmarinas/proyecto-fin-ciclo
#
# @file worker_msn_scheduler.sh
# @date 11/09/2025
# @time 10:25
#
# @author Iván Diaz Marinas (IDMarinas)
# @license BSD 3-Clause License
#
# @since 1.0.0
#

docker-php-entrypoint
php bin/console messenger:consume scheduler_default --time-limit=3600 --memory-limit=128M --limit=100
