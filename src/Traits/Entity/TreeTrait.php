<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/02/2026, 15:36
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    TreeTrait.php
 * @date    14/01/2026
 * @time    20:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait TreeTrait
{
    #[ORM\Column(type: Types::INTEGER)]
    #[Gedmo\TreeLeft]
    public int $ltf = 0 {
        get => $this->ltf;
        set => $this->ltf = $value;
    }

    #[Gedmo\TreeRight]
    #[ORM\Column(type: Types::INTEGER)]
    public int $rgt = 0 {
        get => $this->rgt;
        set => $this->rgt = $value;
    }
    #[Gedmo\TreeLevel]
    #[ORM\Column(type: Types::INTEGER)]
    public int $lvl = 0 {
        get => $this->lvl;
        set => $this->lvl = $value;
    }
}
