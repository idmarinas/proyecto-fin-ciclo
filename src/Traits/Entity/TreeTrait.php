<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:45
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
    private(set) ?int $ltf {
        get => $this->ltf;
        set => $this->ltf = $value;
    }

    #[Gedmo\TreeRight]
    #[ORM\Column(type: Types::INTEGER)]
    private(set) ?int $rgt {
        get => $this->rgt;
        set => $this->rgt = $value;
    }

    #[Gedmo\TreeLevel]
    #[ORM\Column(type: Types::INTEGER)]
    private(set) ?int $lvl {
        get => $this->lvl;
        set => $this->lvl = $value;
    }
}
