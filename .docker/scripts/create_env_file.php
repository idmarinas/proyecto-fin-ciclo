<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/08/2025, 10:56
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    create_env_file.php
 * @date    28/08/2025
 * @time    10:55
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

// Incluye el archivo de configuración
$dir = dirname(__DIR__, 2);
$config = include "$dir/.env.local.php";
ksort($config, SORT_NATURAL);

// Abre (o crea) el archivo .env para escribir
$envFile = fopen("$dir/.env.docker", 'w');

// Recorre el array y escribe cada clave-valor en el archivo .env
foreach ($config as $key => $value) {
	if ('DATABASE_NAME' === $key || 'DATABASE_USER' === $key) {
		$value = str_replace(['_dev', '_test'], '', $value);
	}

	if (str_contains($value, ' ')) {
		$value = '"' . $value . '"';
	}

	fwrite($envFile, "$key=$value\n");
}

// Cierra el archivo
fclose($envFile);

echo '.env.docker file has been created successfully.';
echo "\n";
