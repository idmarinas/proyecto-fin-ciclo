<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 20/02/2026, 21:50
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
use App\Traits\Entity\ForumTreeTrait;
use App\Traits\Entity\TreeTrait;
use DateTimeInterface;
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
 * Foros disponibles en la plataforma.
 */
#[ORM\Table(name: 'pfc_forum')]
#[ORM\Entity(repositoryClass: ForumRepository::class)]
#[Orm\Index(name: 'IDX_FORUM_LTF', columns: ['ltf'])]
#[Orm\Index(name: 'IDX_FORUM_RGT', columns: ['rgt'])]
#[Gedmo\SoftDeleteable]
#[Gedmo\Tree(type: 'nested')]
class Forum implements Stringable, SoftDeleteable, Timestampable, SeoEntityInterface
{
    use IdTrait;
    use SeoColumnTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;
    use TreeTrait;
    use ForumTreeTrait;

    /** Número total de hilos en este foro (propios + subforos). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $totalThreads = 0 {
        get => $this->totalThreads;
        set => $this->totalThreads = max(0, $value);
    }

    /** Número total de mensajes en este foro (propios + subforos). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $totalMessages = 0 {
        get => $this->totalMessages;
        set => $this->totalMessages = max(0, $value);
    }

    /** Hilos sin respuesta (estado OPEN). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $threadsOpen = 0 {
        get => $this->threadsOpen;
        set => $this->threadsOpen = max(0, $value);
    }

    /** Hilos en progreso (estados WAITING_CUSTOMER y WAITING_SUPPORT). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $threadsInProgress = 0 {
        get => $this->threadsInProgress;
        set => $this->threadsInProgress = max(0, $value);
    }

    /** Hilos resueltos (estado RESOLVED). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $threadsResolved = 0 {
        get => $this->threadsResolved;
        set => $this->threadsResolved = max(0, $value);
    }

    /** Hilos cerrados definitivamente (estado CLOSED). */
    #[ORM\Column(type: Types::INTEGER)]
    public int $threadsClosed = 0 {
        get => $this->threadsClosed;
        set => $this->threadsClosed = max(0, $value);
    }

    /** Último mensaje publicado en cualquier hilo de este foro (o sus subforos). */
    #[ORM\ManyToOne(targetEntity: Thread::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    public ?Thread $lastThread = null {
        get => $this->lastThread;
        set => $this->lastThread = $value;
    }

    /** Fecha del último mensaje en el foro. Derivada de lastThread. */
    public ?DateTimeInterface $lastMessageAt {
        get => $this->lastThread?->lastMessageAt;
    }

    /** Autor del último mensaje en el foro. Derivado de lastThread. */
    public ?string $lastMessageAuthorName {
        get => $this->lastThread?->lastMessageAuthorName;
    }

    #[ORM\Column(length: 255)]
    private string $title = '';

    #[ORM\Column(length: 255, unique: true)]
    #[Gedmo\Slug(fields: ['title'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private Collection $tags;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function __toString(): string
    {
        return $this->title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
