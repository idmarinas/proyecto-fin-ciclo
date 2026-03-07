<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 24:17
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
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Blameable;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\SoftDeleteable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\IdTrait;
use Stringable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Mensajes de un hilo.
 */
#[ORM\Table(name: 'pfc_message')]
#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[Gedmo\SoftDeleteable]
class Message implements Stringable, SoftDeleteable, Timestampable, Blameable
{
    use IdTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Blameable(on: 'create')]
    public ?string $createdBy;

    #[ORM\Column(nullable: true)]
    #[Gedmo\Blameable(on: 'update')]
    public ?string $updatedBy;

    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn]
    #[Gedmo\Blameable(on: 'create')]
    #[Assert\Valid]
    private ?User $author = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(allowNull: false)]
    private string $content = '';

    #[ORM\Column]
    private bool $solution = false;

    #[ORM\ManyToOne(cascade: ['persist'])]
    #[Assert\Valid]
    private ?Thread $thread = null;

    public function __toString(): string
    {
        return (string)$this->id;
    }

    public function getThread(): ?Thread
    {
        return $this->thread;
    }

    public function setThread(?Thread $thread): static
    {
        $this->thread = $thread;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function isSolution(): bool
    {
        return $this->solution;
    }

    public function setSolution(bool $solution): static
    {
        $this->solution = $solution;

        return $this;
    }
}
