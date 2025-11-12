#!/bin/sh

##
# Copyright 2025 (C) IDMarinas - All Rights Reserved
#
#
#
# @file worker_async.sh
#
# @author Iván Diaz Marinas (IDMarinas)
# @license proprietary
#
#

docker-php-entrypoint
php bin/console messenger:consume async --time-limit=3600 --memory-limit=128M --limit=100
