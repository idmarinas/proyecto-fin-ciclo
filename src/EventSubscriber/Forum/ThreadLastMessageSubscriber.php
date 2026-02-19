<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/02/2026, 20:23
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadLastMessageSubscriber.php
 * @date    19/02/2026
 * @time    20:05
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventSubscriber\Forum;

use App\Entity\Forum\Message;
use App\Repository\Forum\MessageRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

/**
 * Actualiza el campo lastMessage en Thread cuando se crea o elimina un Message.
 *
 * - postPersist: al crear un mensaje, actualiza Thread::lastMessage con el nuevo mensaje.
 * - postUpdate/postRemove: al eliminar o modificar un mensaje (SoftDelete), recalcula
 *   cuál es el último mensaje visible del hilo.
 */
#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: Message::class)]
#[AsEntityListener(event: Events::postUpdate, method: 'postUpdate', entity: Message::class)]
#[AsEntityListener(event: Events::postRemove, method: 'postRemove', entity: Message::class)]
final readonly class ThreadLastMessageSubscriber
{
    public function __construct (
        private EntityManagerInterface $entityManager,
        private MessageRepository      $messageRepository,
    ) {}

    public function postPersist (Message $message, PostPersistEventArgs $args): void
    {
        $thread = $message->getThread();

        if (null === $thread) {
            return;
        }

        $thread->setLastMessage($message);

        $this->entityManager->persist($thread);
        $this->entityManager->flush();
    }

    public function postUpdate (Message $message, PostUpdateEventArgs $args): void
    {
        $this->recalculate($message, $args);
    }

    public function postRemove (Message $message, PostRemoveEventArgs $args): void
    {
        $this->recalculate($message, $args);
    }

    /**
     * Recalcula el último mensaje del hilo consultando la base de datos.
     * Se usa al eliminar o modificar un mensaje (p.ej. SoftDelete).
     */
    private function recalculate (Message $message, LifecycleEventArgs $args): void
    {
        $thread = $message->getThread();

        if (null === $thread) {
            return;
        }

        $lastMessage = $this->messageRepository->findLastMessageForThread($thread);

        $thread->setLastMessage($lastMessage);

        $this->entityManager->persist($thread);
        $this->entityManager->flush();
    }
}
