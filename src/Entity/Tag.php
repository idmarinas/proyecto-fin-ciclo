<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:28
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Tag.php
 * @date    23/01/2026
 * @time    22:20
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;
use Stringable;

/**
 * Etiquetas para clasificar hilos.
 */
#[ORM\Table(name: 'pfc_tag')]
#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag implements Stringable, Timestampable
{
    use UuidTrait;
    use TimestampableEntity;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $name = null;

    #[ORM\Column(length: 60, unique: true)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $color = null;

    public function __toString (): string
    {
        return (string)$this->name;
    }

    public function getName (): ?string
    {
        return $this->name;
    }

    public function setName (string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug (): ?string
    {
        return $this->slug;
    }

    public function setSlug (string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getColor (): ?string
    {
        return $this->color;
    }

    public function setColor (?string $color): static
    {
        $this->color = $color;

        return $this;
    }
}
