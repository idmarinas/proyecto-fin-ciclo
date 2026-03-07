<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 24:32
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumTreeTrait.php
 * @date    25/01/2026
 * @time    13:31
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Entity;

use App\Entity\Forum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait ForumTreeTrait
{
    #[Gedmo\TreeRoot]
    #[ORM\ManyToOne(targetEntity: Forum::class)]
    #[ORM\JoinColumn(name: 'tree_root', referencedColumnName: 'id', onDelete: 'CASCADE')]
    public ?Forum $root = null;

    #[Gedmo\TreeParent]
    #[ORM\ManyToOne(targetEntity: Forum::class, cascade: ['persist'], inversedBy: 'children')]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    public ?Forum $parent = null;

    #[ORM\OneToMany(targetEntity: Forum::class, mappedBy: 'parent')]
    #[ORM\OrderBy(['ltf' => 'ASC'])]
    public Collection $children {
        get => $this->children ??= new ArrayCollection();
        set => $this->children = $value;
    }
}
