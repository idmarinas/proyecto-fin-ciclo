<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/02/2026, 23:01
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

use App\Traits\Enums\NormalizeValueTrait;
use App\Traits\Enums\ValidateValueTrait;

enum AlertVariantEnum: string
{
    use ValidateValueTrait;
    use NormalizeValueTrait;

    case Success     = 'success';
    case Danger      = 'danger';
    case Error       = 'error';
    case Warning     = 'warning';
    case Info        = 'info';
    case Notice      = 'notice';
    case Destructive = 'destructive';
    case Default     = 'default';
}
