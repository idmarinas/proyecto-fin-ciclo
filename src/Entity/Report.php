<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:50
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Report.php
 * @date    25/01/2026
 * @time    20:24
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity;

use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Repository\ReportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;

#[ORM\Table(name: 'pfc_report')]
#[ORM\Entity(repositoryClass: ReportRepository::class)]
class Report implements Timestampable
{
    use UuidTrait;
    use TimestampableEntity;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $reporter = null;

    #[ORM\ManyToOne]
    private ?Thread $thread = null;

    #[ORM\ManyToOne]
    private ?Message $message = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $reason = '';

    #[ORM\Column(length: 20)]
    private string $status = 'open';

    public function getReporter (): ?User
    {
        return $this->reporter;
    }

    public function setReporter (?User $reporter): static
    {
        $this->reporter = $reporter;

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

    public function getMessage (): ?Message
    {
        return $this->message;
    }

    public function setMessage (?Message $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getReason (): string
    {
        return $this->reason;
    }

    public function setReason (string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getStatus (): string
    {
        return $this->status;
    }

    public function setStatus (string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
