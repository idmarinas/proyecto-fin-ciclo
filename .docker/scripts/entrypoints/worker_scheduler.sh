#!/bin/sh

##
# Copyright 2025 (C) IDMarinas - All Rights Reserved
#
# Last modified by "IDMarinas" on 16/10/2025, 14:11
#
# @site https://www.infommo.es
#
# @project InfoMMO
# @see https://github.com/idmarinas/infommo
#
# @file worker_scheduler.sh
# @date 17/09/2025
# @time 19:56
#
# @author Iván Diaz Marinas (IDMarinas)
# @license proprietary
#
# @since 3.20.0
#

# Scheduler parece que no es compatible con la opción --limit
docker-php-entrypoint
php bin/console messenger:consume scheduler_default --time-limit=3600 --memory-limit=128M
