<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 19:18
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Sidebar.php
 * @date    02/03/2026
 * @time    21:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\Layout;

use App\Entity\Forum;
use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Repository\Forum\MessageRepository;
use App\Repository\Forum\ThreadRepository;
use App\Repository\ForumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
class Sidebar
{
    #[ExposeInTemplate('show_rules')]
    public bool $showRules = false;

    /** Foro actual. Si es null, se operará a nivel global. */
    #[ExposeInTemplate('forum')]
    public ?Forum $forum = null;

    public function __construct(private readonly EntityManagerInterface $em) {}

    /** Estadísticas del foro o globales si forum es null. */
    #[ExposeInTemplate('forum_stats')]
    public function getForumStats(): array
    {
        if (null !== $this->forum) {
            return [
                'totalThreads'      => $this->forum->totalThreads,
                'totalMessages'     => $this->forum->totalMessages,
                'threadsOpen'       => $this->forum->threadsOpen,
                'threadsInProgress' => $this->forum->threadsInProgress,
                'threadsResolved'   => $this->forum->threadsResolved,
                'threadsClosed'     => $this->forum->threadsClosed,
            ];
        }

        /** @var ForumRepository $repo */
        $repo = $this->em->getRepository(Forum::class);

        return $repo->getGlobalStats();
    }

    /**
     * Últimos 3 hilos creados en el foro o en todos si forum es null.
     *
     * @return Thread[]
     */
    #[ExposeInTemplate('latest_threads')]
    public function getLatestThreads(): array
    {
        /** @var ThreadRepository $repo */
        $repo = $this->em->getRepository(Thread::class);

        return null !== $this->forum
            ? $repo->findLatestByForum($this->forum)
            : $repo->findLatest();
    }

    /**
     * Hasta 5 hilos de máxima prioridad que necesitan atención:
     * primero sin respuesta (OPEN), completando con los que siguen abiertos (WAITING_*).
     *
     * @return Thread[]
     */
    #[ExposeInTemplate('threads_needing_attention')]
    public function getThreadsNeedingAttention(): array
    {
        /** @var ThreadRepository $repo */
        $repo = $this->em->getRepository(Thread::class);

        return $repo->findNeedingAttention($this->forum);
    }

    /**
     * Últimos 3 mensajes publicados en el foro o en todos si forum es null.
     *
     * @return Message[]
     */
    #[ExposeInTemplate('latest_messages')]
    public function getLatestMessages(): array
    {
        /** @var MessageRepository $repo */
        $repo = $this->em->getRepository(Message::class);

        return null !== $this->forum
            ? $repo->findLatestByForum($this->forum)
            : $repo->findLatest();
    }
}
