#!/bin/bash

# Limpiar contenedores antiguos con el mismo prefijo
docker ps -a --filter "name=init_env_docker" --format "{{.Names}}" | while read container; do
    docker rm -f "$container"
done

CONTAINER_NAME="init_env_docker_$(date '+%Y%m%d_%H%M%S')"

docker run --detach -w /app --name "$CONTAINER_NAME" --volume ./:/app idmarinas/php:8.4-xdebug

docker exec "$CONTAINER_NAME" composer install --no-interaction --no-scripts --ansi
docker exec "$CONTAINER_NAME" php bin/console cache:clear --ansi
docker exec "$CONTAINER_NAME" composer dev:dump:env --no-interaction --ansi

echo -e "\033[42m.env.docker file created\033[0m"

docker rm -f "$CONTAINER_NAME"