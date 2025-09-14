<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 14/09/2025, 11:27
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Kernel.php
 * @date    30/05/2025
 * @time    16:48
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

namespace App;

use Override;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    #[Override]
    public function getProjectDir (): string
    {
        return dirname(__DIR__);
    }
}
