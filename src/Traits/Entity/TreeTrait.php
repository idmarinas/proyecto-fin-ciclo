<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2026, 23:28
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

use App\Entity\Forum\Message;
use Doctrine\Common\Collections\Collection;
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
    private(set) ?int     $lvl {
        get => $this->lvl;
        set => $this->lvl = $value;
    }
    #[Gedmo\TreeRoot]
    #[ORM\ManyToOne(targetEntity: Message::class)]
    #[ORM\JoinColumn(name: 'tree_root', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private(set) ?Message $root {
        get => $this->root;
        set => $this->root = $value;
    }

    #[Gedmo\TreeParent]
    #[ORM\ManyToOne(targetEntity: Message::class, inversedBy: 'children')]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private(set) ?Message $parent {
        get => $this->parent;
        set => $this->parent = $value;
    }

    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'parent')]
    #[ORM\OrderBy(['lft' => 'ASC'])]
    private(set) Collection $children {
        get => $this->children;
        set => $this->children = $value;
    }
}
