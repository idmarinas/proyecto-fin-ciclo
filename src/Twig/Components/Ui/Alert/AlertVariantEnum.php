<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 18/01/2026, 17:05
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AlertVariantEnum.php
 * @date    18/01/2026
 * @time    17:27
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\Ui\Alert;

enum AlertVariantEnum: string
{
    case Success     = 'success';
    case Danger      = 'danger';
    case Error       = 'error';
    case Warning     = 'warning';
    case Info        = 'info';
    case Notice      = 'notice';
    case Destructive = 'destructive';
    case Default     = 'default';

    public static function normalizeValue (string|self $value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        $value = self::tryFrom($value);

        return empty($value) ? self::Default : $value;
    }

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
