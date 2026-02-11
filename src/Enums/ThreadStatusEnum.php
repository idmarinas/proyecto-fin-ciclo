<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/02/2026, 23:01
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadStatusEnum.php
 * @date    22/01/2026
 * @time    22:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Enums;

use App\Traits\Enums\NormalizeValueTrait;
use App\Traits\Enums\ValidateValueTrait;

enum ThreadStatusEnum: string
{
    use ValidateValueTrait;
    use NormalizeValueTrait;

    case OPEN             = 'open';
    case IN_REVIEW        = 'in_review';
    case WAITING_CUSTOMER = 'waiting_customer';
    case WAITING_SUPPORT  = 'waiting_support';
    case RESOLVED         = 'resolved';
    case CLOSED           = 'closed';
}
