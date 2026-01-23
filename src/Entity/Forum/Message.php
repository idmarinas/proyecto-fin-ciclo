<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2026, 22:19
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Message.php
 * @date    22/01/2026
 * @time    23:30
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity\Forum;

use App\Entity\User\User;
use App\Repository\Forum\MessageRepository;
use App\Traits\Entity\TreeTrait;
use Doctrine\Common\Collections\ArrayCollection;
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
 * Mensajes de un hilo.
 */
#[ORM\Table(name: 'pfc_message')]
#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[Gedmo\Tree(type: 'nested')]
#[Gedmo\SoftDeleteable]
class Message implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface
{
    use UuidTrait;
    use TreeTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Thread $thread  = null;
    #[ORM\Column(type: Types::TEXT)]
    private string  $content = '';

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    public function __construct ()
    {
        $this->children = new ArrayCollection();
    }

    public function __toString (): string
    {
        return (string)$this->id;
    }

    public function getThread (): ?Thread
    {
        return $this->thread;
    }

    public function setThread (?Thread $thread): static
    {
        $this->thread = $thread;

        return $this;
    }

    public function getContent (): ?string
    {
        return $this->content;
    }

    public function setContent (string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor (): ?User
    {
        return $this->author;
    }

    public function setAuthor (?User $author): static
    {
        $this->author = $author;

        return $this;
    }
}
