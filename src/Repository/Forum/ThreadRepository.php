<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 11:10
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadRepository.php
 * @date    21/01/2026
 * @time    23:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Repository\Forum;

use App\Entity\Forum;
use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Enums\ThreadStatusEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Thread>
 */
final class ThreadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thread::class);
    }

    public function findAllByForum(Forum $forum, bool $canSeePrivate, ?User $user = null): QueryBuilder
    {
        $query = $this
            ->createQueryBuilder('t')
            ->where('t.forum = :forum')
            ->setParameter('forum', $forum)
        ;

        if (null === $user) {
            $query->andWhere('t.private = false');
        } else {
            if (!$canSeePrivate) {
                $query
                    ->andWhere('t.private = false OR t.private = true AND t.author = :user')
                    ->setParameter('user', $user)
                ;
            }
        }

        return $query;
    }

    /**
     * Devuelve un array asociativo con las estadísticas de un foro:
     * - totalThreads
     * - totalMessages
     * - threadsOpen
     * - threadsInProgress
     * - threadsResolved
     * - threadsClosed
     */
    public function getStatsForForum(Forum $forum): array
    {
        $rows = $this
            ->createQueryBuilder('t')
            ->select(
                'COUNT(t.id)                                                                                       AS totalThreads',
                'COALESCE(SUM(t.messageCount), 0)                                                                          AS totalMessages',
                'SUM(CASE WHEN t.status = :open        THEN 1 ELSE 0 END)                                                  AS threadsOpen',
                'SUM(CASE WHEN t.status = :waitCust OR t.status = :waitSupp THEN 1 ELSE 0 END)                             AS threadsInProgress',
                'SUM(CASE WHEN t.status = :resolved    THEN 1 ELSE 0 END)                                                  AS threadsResolved',
                'SUM(CASE WHEN t.status = :closed      THEN 1 ELSE 0 END)                                                  AS threadsClosed',
            )
            ->where('t.forum = :forum')
            ->setParameter('forum', $forum)
            ->setParameter('open', ThreadStatusEnum::OPEN)
            ->setParameter('waitCust', ThreadStatusEnum::WAITING_CUSTOMER)
            ->setParameter('waitSupp', ThreadStatusEnum::WAITING_SUPPORT)
            ->setParameter('resolved', ThreadStatusEnum::RESOLVED)
            ->setParameter('closed', ThreadStatusEnum::CLOSED)
            ->getQuery()
            ->getSingleResult()
        ;

        return [
            'totalThreads'      => (int)$rows['totalThreads'],
            'totalMessages'     => (int)$rows['totalMessages'],
            'threadsOpen'       => (int)$rows['threadsOpen'],
            'threadsInProgress' => (int)$rows['threadsInProgress'],
            'threadsResolved'   => (int)$rows['threadsResolved'],
            'threadsClosed'     => (int)$rows['threadsClosed'],
        ];
    }

    /**
     * Devuelve el Thread cuyo lastMessage es el más reciente del foro.
     */
    public function findLastThreadForForum(Forum $forum): ?Thread
    {
        return $this
            ->createQueryBuilder('t')
            ->innerJoin('t.lastMessage', 'm')
            ->where('t.forum = :forum')
            ->andWhere('t.deletedAt IS NULL')
            ->andWhere('t.lastMessage IS NOT NULL')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults(1)
            ->setParameter('forum', $forum)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
