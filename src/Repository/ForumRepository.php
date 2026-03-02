<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 02/03/2026, 23:39
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumRepository.php
 * @date    21/01/2026
 * @time    23:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Repository;

use App\Entity\Forum;
use App\Entity\Forum\Thread;
use App\Enums\ThreadStatusEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;
use Override;

/**
 * @extends ServiceEntityRepository<Forum>
 */
final class ForumRepository extends NestedTreeRepository
{

    #[Override]
    public function getNodesHierarchyQueryBuilder(
        $node = null,
        $direct = false,
        array $options = [],
        $includeNode = false
    ): QueryBuilder {
        $qb = parent::getNodesHierarchyQueryBuilder($node, $direct, $options, $includeNode);

        $qb
            ->addSelect('m.createdAt AS lastMessageAt')
            ->leftJoin('node.lastThread', 'lt')
            ->leftJoin('lt.lastMessage', 'm')
        ;

        return $qb;
    }

    #[Override]
    public function getNodesHierarchy($node = null, $direct = false, array $options = [], $includeNode = false): array
    {
        $results = parent::getNodesHierarchy($node, $direct, $options, $includeNode);

        // Aplanamos el resultado si Doctrine lo ha devuelto en formato mixto debido al addSelect
        return array_map(function (array $item) {
            if (isset($item[0]) && is_array($item[0])) {
                return array_merge($item[0], array_diff_key($item, [0 => true]));
            }

            return $item;
        }, $results);
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
            ->getEntityManager()->createQueryBuilder()
            ->from(Thread::class, 't')
            ->select(
                'COUNT(t.id)                                                          AS totalThreads',
                'COALESCE(SUM(t.messageCount), 0)                                             AS totalMessages',
                'SUM(CASE WHEN t.status = :open        THEN 1 ELSE 0 END)                     AS threadsOpen',
                'SUM(CASE WHEN t.status = :waitCust OR t.status = :waitSupp THEN 1 ELSE 0 END) AS threadsInProgress',
                'SUM(CASE WHEN t.status = :resolved    THEN 1 ELSE 0 END)                     AS threadsResolved',
                'SUM(CASE WHEN t.status = :closed      THEN 1 ELSE 0 END)                     AS threadsClosed',
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
     * Devuelve estadísticas globales de todos los foros (raíces del árbol).
     * Suma los contadores des-normalizados almacenados en cada foro raíz.
     */
    public function getGlobalStats(): array
    {
        $rows = $this
            ->getEntityManager()->createQueryBuilder()
            ->from(Forum::class, 'f')
            ->select(
                'COALESCE(SUM(f.totalThreads), 0)      AS totalThreads',
                'COALESCE(SUM(f.totalMessages), 0)     AS totalMessages',
                'COALESCE(SUM(f.threadsOpen), 0)       AS threadsOpen',
                'COALESCE(SUM(f.threadsInProgress), 0) AS threadsInProgress',
                'COALESCE(SUM(f.threadsResolved), 0)   AS threadsResolved',
                'COALESCE(SUM(f.threadsClosed), 0)     AS threadsClosed',
            )
            ->where('f.parent IS NULL')
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
}
