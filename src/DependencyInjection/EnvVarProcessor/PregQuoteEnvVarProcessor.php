<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/10/2025, 19:37
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    PregQuoteEnvVarProcessor.php
 * @date    27/08/2025
 * @time    21:14
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\DependencyInjection\EnvVarProcessor;

use Closure;
use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;

class PregQuoteEnvVarProcessor implements EnvVarProcessorInterface
{
    /**
     * @inheritDoc
     */
    public function getEnv (string $prefix, string $name, Closure $getEnv): mixed
    {
        $env = $getEnv($name);

        return preg_quote((string)$env);
    }

    /**
     * @inheritDoc
     */
    public static function getProvidedTypes (): array
    {
        return ['preg_quote' => 'string'];
    }
}
