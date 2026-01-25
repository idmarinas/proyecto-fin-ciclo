<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:56
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Subscription.php
 * @date    25/01/2026
 * @time    20:24
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity;

use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Repository\SubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;

#[ORM\Table(name: 'pfc_subscription')]
#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_SUBSCRIPTION_USER_THREAD', fields: ['user', 'thread'])]
class Subscription implements Timestampable
{
    use UuidTrait;
    use TimestampableEntity;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Thread $thread = null;

    public function getUser (): ?User
    {
        return $this->user;
    }

    public function setUser (?User $user): static
    {
        $this->user = $user;

        return $this;
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
}
