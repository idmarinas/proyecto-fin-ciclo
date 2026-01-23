<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2026, 22:19
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Thread.php
 * @date    22/01/2026
 * @time    21:58
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity\Forum;

use App\Entity\Forum;
use App\Entity\User\User;
use App\Enums\ThreadStatusEnum;
use App\Repository\Forum\ThreadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
 * Hilos de un foro.
 */
#[ORM\Table(name: 'pfc_thread')]
#[ORM\Entity(repositoryClass: ThreadRepository::class)]
class Thread implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface
{
    use UuidTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'thread')]
    private Collection $messages;

    #[ORM\Column(length: 255)]
    private string $title = '';

    #[ORM\Column(length: 1000)]
    private string $description = '';

    #[ORM\Column]
    private bool $private = false;

    #[ORM\Column(enumType: ThreadStatusEnum::class)]
    private ThreadStatusEnum $status = ThreadStatusEnum::OPEN;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    private ?Forum $forum = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['title'])]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'threads')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\Column]
    private int $viewCount = 0;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'threads')]
    private Collection $tags;

    public function __construct ()
    {
        $this->messages = new ArrayCollection();
        $this->tags = new ArrayCollection();
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
     * @return Collection<int, Message>
     */
    public function getMessages (): Collection
    {
        return $this->messages;
    }

    public function addMessage (Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setThread($this);
        }

        return $this;
    }

    public function removeMessage (Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getThread() === $this) {
                $message->setThread(null);
            }
        }

        return $this;
    }

    public function getDescription (): string
    {
        return $this->description;
    }

    public function setDescription (string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isPrivate (): bool
    {
        return $this->private;
    }

    public function setPrivate (bool $private): static
    {
        $this->private = $private;

        return $this;
    }

    public function isPublic (): bool
    {
        return !$this->private;
    }

    public function getStatus (): ThreadStatusEnum
    {
        return $this->status;
    }

    public function setStatus (ThreadStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getForum (): ?Forum
    {
        return $this->forum;
    }

    public function setForum (?Forum $forum): static
    {
        $this->forum = $forum;

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

    public function getAuthor (): ?User
    {
        return $this->author;
    }

    public function setAuthor (?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getViewCount (): int
    {
        return $this->viewCount;
    }

    public function setViewCount (int $viewCount): static
    {
        $this->viewCount = $viewCount;

        return $this;
    }

    public function increaseViewCount (): static
    {
        $this->viewCount++;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags (): Collection
    {
        return $this->tags;
    }

    public function addTag (Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    public function removeTag (Tag $tag): static
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
