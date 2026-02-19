<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/02/2026, 22:08
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file Thread.php
 * @date 22/01/2026
 * @time 21:58
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
 */

namespace App\Entity\Forum;

use App\Entity\Forum;
use App\Entity\Subscription;
use App\Entity\Tag;
use App\Entity\User\User;
use App\Enums\ThreadStatusEnum;
use App\Repository\Forum\ThreadRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Blameable;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\IdTrait;
use Idm\Bundle\Seo\Entity\SeoEntityInterface;
use Idm\Bundle\Seo\Traits\Entity\SeoColumnTrait;
use Stringable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hilos de un foro.
 */
#[ORM\Table(name: 'pfc_thread')]
#[ORM\Entity(repositoryClass: ThreadRepository::class)]
class Thread implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface, Blameable
{
    use IdTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Blameable(on: 'create')]
    public ?string $createdBy {
        get => $this->createdBy;
        set => $this->createdBy = $value;
    }

    #[ORM\Column(length: 1000)]
    #[Assert\NotBlank(allowNull: false)]
    public string $description = '' {
        get => $this->description;
        set => $this->description = $value;
    }

    /** Último mensaje publicado en el hilo. Se actualiza automáticamente al crear/eliminar mensajes. */
    #[ORM\ManyToOne(targetEntity: Message::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    public ?Message $lastMessage = null {
        get => $this->lastMessage;
        set => $this->lastMessage = $value;
    }

    /** Fecha del último mensaje publicado. Derivada de lastMessage. */
    public ?DateTimeInterface $lastMessageAt {
        get => $this->lastMessage?->getCreatedAt();
    }

    /** Nombre del autor del último mensaje. Derivado de lastMessage. */
    public ?string $lastMessageAuthorName {
        get => $this->lastMessage?->getAuthor()?->getUsername();
    }

    /** Número de mensajes del hilo. Se actualiza automáticamente al crear/eliminar mensajes. */
    #[ORM\Column]
    public int $messageCount = 0 {
        get => $this->messageCount;
        set => $this->messageCount = max(0, $value);
    }

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(allowNull: false)]
    public string $title = '' {
        get => $this->title;
        set => $this->title = $value;
    }

    #[ORM\Column(nullable: true)]
    #[Gedmo\Blameable(on: 'update')]
    public ?string $updatedBy {
        get => $this->updatedBy;
        set => $this->updatedBy = $value;
    }

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Gedmo\Blameable(on: 'create')]
    private ?User $author = null;

    #[ORM\ManyToOne]
    private ?Forum $forum = null;

    #[ORM\Column]
    private bool $private = false;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['title'])]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: Message::class)]
    private ?Message $solvedMessage = null;

    #[ORM\Column(enumType: ThreadStatusEnum::class)]
    private ThreadStatusEnum $status = ThreadStatusEnum::OPEN;

    #[ORM\Column]
    private bool $sticky = false;

    /**
     * @var Collection<int, Subscription>
     */
    #[ORM\OneToMany(targetEntity: Subscription::class, mappedBy: 'thread', cascade: ['persist', 'remove'])]
    private Collection $subscriptions;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private Collection $tags;

    #[ORM\Column]
    private int $viewCount = 0;

    public function __construct ()
    {
        $this->tags = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
    }

    public function __toString (): string
    {
        return $this->title;
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

    /**
     * @return Collection<int, Subscription>
     */
    public function getSubscriptions (): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription (Subscription $subscription): static
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions->add($subscription);
            $subscription->setThread($this);
        }

        return $this;
    }

    public function removeSubscription (Subscription $subscription): static
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getThread() === $this) {
                $subscription->setThread(null);
            }
        }

        return $this;
    }

    public function isSticky (): bool
    {
        return $this->sticky;
    }

    public function setSticky (bool $sticky): static
    {
        $this->sticky = $sticky;

        return $this;
    }

    public function getSolvedMessage (): ?Message
    {
        return $this->solvedMessage;
    }

    public function setSolvedMessage (?Message $solvedMessage): static
    {
        $this->solvedMessage = $solvedMessage;

        return $this;
    }

    public function incrementMessageCount (): static
    {
        $this->messageCount++;

        return $this;
    }

    public function decrementMessageCount (): static
    {
        $this->messageCount--;

        return $this;
    }
}
