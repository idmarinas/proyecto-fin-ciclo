<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/02/2026, 10:35
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadLastMessageListener.php
 * @date    19/02/2026
 * @time    23:40
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventListener\Forum;

use App\Entity\Forum\Message;
use App\Repository\Forum\MessageRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postUpdate, entity: Message::class)]
#[AsEntityListener(event: Events::postRemove, entity: Message::class)]
final readonly class ThreadLastMessageListener
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private MessageRepository      $messageRepository,
    ) {
    }

    /**
     * Mensaje modificado (p.ej. SoftDelete activa deletedAt):
     * recalcula ambos campos desde la BD.
     */
    public function postUpdate(Message $message): void
    {
        $this->recalculate($message);
    }

    /**
     * Recalcula lastMessage y messageCount consultando la BD.
     */
    private function recalculate(Message $message): void
    {
        $thread = $message->getThread();

        if (null === $thread) {
            return;
        }

        $thread->lastMessage = $this->messageRepository->findLastMessageForThread($thread);
        $thread->messageCount = $this->messageRepository->countMessagesForThread($thread);

        $this->entityManager->persist($thread);
        $this->entityManager->flush();
    }

    /**
     * Mensaje eliminado físicamente: recalcula ambos campos desde la BD.
     */
    public function postRemove(Message $message): void
    {
        $this->recalculate($message);
    }
}
