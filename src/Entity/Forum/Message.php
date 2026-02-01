<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/02/2026, 15:33
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
use App\Traits\Entity\MessageTreeTrait;
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
use Idm\Bundle\Common\Traits\Entity\IdTrait;
use Idm\Bundle\Seo\Entity\SeoEntityInterface;
use Idm\Bundle\Seo\Traits\Entity\SeoColumnTrait;
use Stringable;

/**
 * Mensajes de un hilo.
 */
#[ORM\Table(name: 'pfc_message')]
#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[Orm\Index(name: 'IDX_MESSAGE_LTF', columns: ['ltf'])]
#[Orm\Index(name: 'IDX_MESSAGE_RGT', columns: ['rgt'])]
#[Gedmo\Tree(type: 'nested')]
#[Gedmo\SoftDeleteable]
class Message implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface
{
    use IdTrait;
    use TreeTrait;
    use MessageTreeTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Thread $thread = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $content = '';

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    /**
     * @var Collection<int, MessageAttachment>
     */
    #[ORM\OneToMany(targetEntity: MessageAttachment::class, mappedBy: 'message', cascade: ['persist', 'remove'])]
    private Collection $attachments;

    /**
     * @var Collection<int, MessageReaction>
     */
    #[ORM\OneToMany(targetEntity: MessageReaction::class, mappedBy: 'message', cascade: ['persist', 'remove'])]
    private Collection $reactions;

    #[ORM\Column]
    private bool $solution = false;

    public function __construct ()
    {
        $this->children = new ArrayCollection();
        $this->attachments = new ArrayCollection();
        $this->reactions = new ArrayCollection();
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

    /**
     * @return Collection<int, MessageAttachment>
     */
    public function getAttachments (): Collection
    {
        return $this->attachments;
    }

    public function addAttachment (MessageAttachment $attachment): static
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments->add($attachment);
            $attachment->setMessage($this);
        }

        return $this;
    }

    public function removeAttachment (MessageAttachment $attachment): static
    {
        if ($this->attachments->removeElement($attachment)) {
            // set the owning side to null (unless already changed)
            if ($attachment->getMessage() === $this) {
                $attachment->setMessage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MessageReaction>
     */
    public function getReactions (): Collection
    {
        return $this->reactions;
    }

    public function addReaction (MessageReaction $reaction): static
    {
        if (!$this->reactions->contains($reaction)) {
            $this->reactions->add($reaction);
            $reaction->setMessage($this);
        }

        return $this;
    }

    public function removeReaction (MessageReaction $reaction): static
    {
        if ($this->reactions->removeElement($reaction)) {
            // set the owning side to null (unless already changed)
            if ($reaction->getMessage() === $this) {
                $reaction->setMessage(null);
            }
        }

        return $this;
    }

    public function isSolution (): bool
    {
        return $this->solution;
    }

    public function setSolution (bool $solution): static
    {
        $this->solution = $solution;

        return $this;
    }
}
