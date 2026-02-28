<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/02/2026, 18:09
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Participants.php
 * @date    28/02/2026
 * @time    00:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\App\Forum\Thread\View;

use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Repository\Forum\MessageRepository;
use Psr\Cache\InvalidArgumentException;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
final class Participants
{
    public Thread $thread;

    #[ExposeInTemplate('max_visible')]
    public int $maxVisible = 5;

    public function __construct(
        private readonly MessageRepository      $messageRepository,
        private readonly TagAwareCacheInterface $cache,
    ) {}

    /**
     * @return User[]
     *
     * @throws InvalidArgumentException
     */
    #[ExposeInTemplate('participants')]
    public function getParticipants(): array
    {
        $key = 'participants-'.$this->thread->getSlug().'-'.($this->thread->lastMessageAt?->getTimestamp() ?? 0);

        return $this->cache->get($key, function (ItemInterface $item): array {
            $item->tag(['threads', 'view', 'participants', $this->thread->getSlug()]);

            return $this->messageRepository->findParticipantsByThread($this->thread);
        });
    }
}
