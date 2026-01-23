<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2026, 22:16
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Forum.php
 * @date    21/01/2026
 * @time    23:15
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity;

use App\Entity\Forum\Thread;
use App\Repository\ForumRepository;
use App\Traits\Entity\TreeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;
use Idm\Bundle\Seo\Entity\SeoEntityInterface;
use Idm\Bundle\Seo\Traits\Entity\SeoColumnTrait;
use Stringable;

/**
 * Foros disponibles en la plataforma.
 */
#[ORM\Table(name: 'pfc_forum')]
#[ORM\Entity(repositoryClass: ForumRepository::class)]
#[Gedmo\SoftDeleteable]
#[Gedmo\Tree(type: 'nested')]
class Forum implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface
{
    use UuidTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;
    use TreeTrait;

    #[ORM\Column(length: 255)]
    private string $title = '';

    /**
     * @var Collection<int, Thread>
     */
    #[ORM\OneToMany(targetEntity: Thread::class, mappedBy: 'forum')]
    private Collection $threads;

    #[ORM\Column(length: 255, unique: true)]
    #[Gedmo\Slug(fields: ['title'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct ()
    {
        $this->children = new ArrayCollection();
        $this->threads = new ArrayCollection();
    }

    public function __toString (): string
    {
        return $this->title;
    }

    public function getTitle (): string
    {
        return $this->title;
    }

    public function setTitle (string $title): static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Thread>
     */
    public function getThreads (): Collection
    {
        return $this->threads;
    }

    public function addThread (Thread $thread): static
    {
        if (!$this->threads->contains($thread)) {
            $this->threads->add($thread);
            $thread->setForum($this);
        }

        return $this;
    }

    public function removeThread (Thread $thread): static
    {
        if ($this->threads->removeElement($thread)) {
            // set the owning side to null (unless already changed)
            if ($thread->getForum() === $this) {
                $thread->setForum(null);
            }
        }

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
}
