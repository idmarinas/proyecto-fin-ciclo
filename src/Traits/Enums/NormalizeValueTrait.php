<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/02/2026, 23:01
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    NormalizeValueTrait.php
 * @date    10/02/2026
 * @time    23:01
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Enums;

trait NormalizeValueTrait
{
    /**
     * Normalizes the value to an instance of the enum class. If the value is already an instance, it is returned as is.
     * If the value is a string that can be converted to an enum instance, it is converted and returned. If the
     * conversion fails, the default enum value is returned.
     */
    public static function normalizeValue (string|self $value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        $value = self::tryFrom($value);

        return empty($value) ? self::Default : $value;
    }
}
