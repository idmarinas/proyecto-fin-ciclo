#!/bin/sh



##
# Copyright 2025 (C) IDMarinas - All Rights Reserved
#
# Last modified by "IDMarinas" on 19/10/2025, 19:37
#
# @project Foro de Ayuda y Soporte
# @see https://github.com/idmarinas/proyecto-fin-ciclo
#
# @file worker_scheduler.sh
# @date 17/10/2025
# @time 18:41
#
# @author Iván Diaz Marinas (IDMarinas)
# @license proprietary
#
# @since 1.0.0
#

# Scheduler parece que no es compatible con la opción --limit
docker-php-entrypoint
php bin/console messenger:consume scheduler_default --time-limit=3600 --memory-limit=128M
