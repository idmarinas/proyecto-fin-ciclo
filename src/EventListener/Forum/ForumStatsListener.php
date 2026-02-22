<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 13:06
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumStatsListener.php
 * @date    19/02/2026
 * @time    11:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventListener\Forum;

use App\Entity\Forum;
use App\Entity\Forum\Thread;
use App\Repository\Forum\ThreadRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Recalcula las estadísticas de Forum cuando un Thread cambia de estado o es eliminado.
 *
 *   - postUpdate: cambio de estado del hilo (OPEN → WAITING_* → RESOLVED → CLOSED).
 *   - postRemove: borrado físico del hilo.
 *   - En ambos casos propaga también al foro padre si existe.
 */
// #[AsEntityListener(event: Events::postUpdate, entity: Thread::class, priority: -10)]
// #[AsEntityListener(event: Events::postRemove, entity: Thread::class, priority: -10)]
final readonly class ForumStatsListener
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ThreadRepository       $threadRepository,
    ) {}

    public function postRemove(Thread $thread): void
    {
        $this->recalculate($thread);
    }

    private function recalculate(Thread $thread): void
    {
        $forum = $thread->getForum();

        if (null === $forum) {
            return;
        }

        $this->updateForum($forum);

        // Propaga al foro padre si existe
        if (null !== $forum->parent) {
            $this->updateForum($forum->parent);
        }
    }

    /**
     * Recalcula todas las estadísticas del foro con una sola query agregada
     * y actualiza lastThread buscando el hilo con el mensaje más reciente.
     */
    private function updateForum(Forum $forum): void
    {
        $stats = $this->threadRepository->getStatsForForum($forum);

        $forum->totalThreads = $stats['totalThreads'];
        $forum->totalMessages = $stats['totalMessages'];
        $forum->threadsOpen = $stats['threadsOpen'];
        $forum->threadsInProgress = $stats['threadsInProgress'];
        $forum->threadsResolved = $stats['threadsResolved'];
        $forum->threadsClosed = $stats['threadsClosed'];
        $forum->lastThread = $this->threadRepository->findLastThreadForForum($forum);

        $this->entityManager->persist($forum);
        $this->entityManager->flush();
    }
}
