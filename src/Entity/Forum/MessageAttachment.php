<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:25
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageAttachment.php
 * @date    25/01/2026
 * @time    13:25
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Entity\Forum;

use App\Repository\Forum\MessageAttachmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Idm\Bundle\Common\Traits\Entity\UuidTrait;

#[ORM\Table(name: 'pfc_message_attachment')]
#[ORM\Entity(repositoryClass: MessageAttachmentRepository::class)]
class MessageAttachment implements Timestampable
{
    use UuidTrait;
    use TimestampableEntity;

    #[ORM\ManyToOne(inversedBy: 'attachments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Message $message = null;

    #[ORM\Column(length: 255)]
    private string $fileName = '';

    #[ORM\Column]
    private int $fileSize = 0;

    #[ORM\Column(length: 100)]
    private string $mimeType = '';

    public function getMessage (): ?Message
    {
        return $this->message;
    }

    public function setMessage (?Message $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getFileName (): string
    {
        return $this->fileName;
    }

    public function setFileName (string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileSize (): int
    {
        return $this->fileSize;
    }

    public function setFileSize (int $fileSize): static
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function getMimeType (): string
    {
        return $this->mimeType;
    }

    public function setMimeType (string $mimeType): static
    {
        $this->mimeType = $mimeType;

        return $this;
    }
}
