<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/03/2026, 22:30
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
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
final class Sidebar
{
    #[ExposeInTemplate('show_rules')]
    public bool $showRules = false;

    /** Foro actual. Si es null, se operará a nivel global. */
    #[ExposeInTemplate('forum')]
    public ?Forum $forum = null;

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly TagAwareCacheInterface $cache,
        #[Target('camelCase.normalizer')]
        private readonly NormalizerInterface    $normalizer
    ) {}

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

        return $this->cache->get('app.layout.sidebar.forum_stats', function (ItemInterface $item) {
            $item->expiresAfter(60);
            $item->tag(['layout', 'sidebar', 'forum_stats']);
            /** @var ForumRepository $repo */
            $repo = $this->em->getRepository(Forum::class);

            return $this->normalizer->normalize($repo->getGlobalStats());
        });
    }

    /**
     * Últimos 3 hilos creados en el foro o en todos si forum es null.
     *
     * @return Thread[]
     */
    #[ExposeInTemplate('latest_threads')]
    public function getLatestThreads(): array
    {
        return $this->cache->get('app.layout.sidebar.latest_threads', function (ItemInterface $item) {
            $item->expiresAfter(60);
            $item->tag(['layout', 'sidebar', 'latest_threads']);
            /** @var ThreadRepository $repo */
            $repo = $this->em->getRepository(Thread::class);

            $data = null !== $this->forum
                ? $repo->findLatestByForum($this->forum)
                : $repo->findLatest();

            return $this->normalizer->normalize($data, context: [
                AbstractNormalizer::ATTRIBUTES => [
                    'slug',
                    'title',
                    'createdAt',
                    'forum'  => [
                        'parent' => ['slug'],
                        'slug',
                    ],
                    'author' => [
                        'userIdentifier',
                    ],
                ],
            ]);
        });
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
        return $this->cache->get('app.layout.sidebar.threads_needing_attention', function (ItemInterface $item) {
            $item->expiresAfter(60);
            $item->tag(['layout', 'sidebar', 'threads_needing_attention']);
            /** @var ThreadRepository $repo */
            $repo = $this->em->getRepository(Thread::class);

            return $this->normalizer->normalize($repo->findNeedingAttention($this->forum), context: [
                AbstractNormalizer::ATTRIBUTES => [
                    'slug',
                    'title',
                    'priority',
                    'createdAt',
                    'status',
                    'isIncident',
                    'isCritical',
                    'affectsBusiness',
                    'forum' => [
                        'parent' => ['slug'],
                        'slug',
                    ],
                ],
            ]);
        });
    }

    /**
     * Últimos 3 mensajes publicados en el foro o en todos si forum es null.
     *
     * @return Message[]
     */
    #[ExposeInTemplate('latest_messages')]
    public function getLatestMessages(): array
    {
        return $this->cache->get('app.layout.sidebar.latest_messages', function (ItemInterface $item) {
            $item->expiresAfter(60);
            $item->tag(['layout', 'sidebar', 'latest_messages']);
            /** @var MessageRepository $repo */
            $repo = $this->em->getRepository(Message::class);

            $data = null !== $this->forum
                ? $repo->findLatestByForum($this->forum)
                : $repo->findLatest();

            return $this->normalizer->normalize($data, context: [
                AbstractNormalizer::ATTRIBUTES => [
                    'content',
                    'createdAt',
                    'author' => [
                        'userIdentifier',
                    ],
                    'thread' => [
                        'slug',
                        'title',
                        'forum' => [
                            'parent' => ['slug'],
                            'slug',
                        ],
                    ],
                ],
            ]);
        });
    }
}
