<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/02/2026, 15:33
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

    // Hilo está abierto y no tiene respuestas
    case OPEN = 'open';

    // El staff ha respondido y espera respuesta del usuario/cliente
    case WAITING_CUSTOMER = 'waiting_customer';

    // El usuario/cliente ha respondido y espera respuesta del staff
    case WAITING_SUPPORT = 'waiting_support';

    // El hilo ha sido marcado como resuelto, puede volver al estado de WAITING_* (volver a abrirlo)
    // Puede ser marcado y reabierto por el usuario/cliente o el staff.
    case RESOLVED = 'resolved';

    // El hilo se ha cerrado definitivamente, no permite volver a ningún otro estado. Ya no se puede cambiar ni
    // añadir nada.
    case CLOSED = 'closed';
}
