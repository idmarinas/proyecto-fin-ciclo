<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/02/2026, 12:58
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageReaction.php
 * @date    25/01/2026
 * @time    13:25
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity\Forum;

use App\Entity\User\User;
use App\Repository\Forum\MessageReactionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Idm\Bundle\Common\Traits\Entity\IdTrait;

#[ORM\Table(name: 'pfc_message_reaction')]
#[ORM\Entity(repositoryClass: MessageReactionRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_REACTION_USER_MESSAGE', fields: ['user', 'message', 'type'])]
class MessageReaction
{
    use IdTrait;

    #[ORM\ManyToOne(inversedBy: 'reactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Message $message = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Gedmo\Blameable(on: 'create')]
    private ?User $user = null;

    #[ORM\Column(length: 20)]
    private string $type = 'like';

    public function getMessage (): ?Message
    {
        return $this->message;
    }

    public function setMessage (?Message $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getUser (): ?User
    {
        return $this->user;
    }

    public function setUser (?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getType (): string
    {
        return $this->type;
    }

    public function setType (string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
