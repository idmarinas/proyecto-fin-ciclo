<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/02/2026, 22:59
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ValidateValueTrait.php
 * @date    10/02/2026
 * @time    22:58
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Enums;

trait ValidateValueTrait
{
    /**
     *  Validates whether the value provided is an instance of the enum class or can be converted from a string.
     */
    public static function isValidValue (string|self $value): bool
    {
        if ($value instanceof self) {
            return true;
        }

        return !(self::tryFrom($value) === null);
    }
}
