<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 04/03/2026, 22:56
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
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
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

    public function findAllByForum(
        Forum $forum,
        bool  $canSeePrivate,
        bool  $canSeeDeleted,
        ?User $user = null
    ): QueryBuilder {
        $query = $this
            ->createQueryBuilder('t')
            ->where('t.forum = :forum')
            ->setParameter('forum', $forum)
            // Los hilos resueltos/cerrados van al final, sin prioridad
            ->addSelect('CASE WHEN t.status IN (:closedStatus) THEN 0 ELSE 1 END AS HIDDEN is_active')
            ->addSelect('CASE WHEN t.status IN (:closedStatus) THEN 0 ELSE t.priority END AS HIDDEN effective_priority')
            ->setParameter('closedStatus', [ThreadStatusEnum::RESOLVED, ThreadStatusEnum::CLOSED])
            ->orderBy('is_active', 'DESC')             // Activos primero, resueltos/cerrados al final
            ->addOrderBy('effective_priority', 'DESC') // Luego por prioridad (solo aplica a activos)
            ->addOrderBy('t.createdAt', 'DESC')        // Finalmente por fecha de creación
        ;

        if (null === $user) {
            $query->andWhere('t.private = false');
        } elseif (!$canSeePrivate) {
            $query
                ->andWhere('t.private = false OR t.private = true AND t.author = :user')
                ->setParameter('user', $user)
            ;
        }

        if (null === $user) {
            $query->andWhere('t.deletedAt IS NULL');
        } elseif ($canSeeDeleted) {
            // Hilos borrados siempre al final
            $query
                ->addSelect('CASE WHEN t.deletedAt IS NOT NULL THEN 0 ELSE 1 END AS HIDDEN is_not_deleted')
                ->orderBy('is_not_deleted', 'DESC')
                ->addOrderBy('is_active', 'DESC')
                ->addOrderBy('effective_priority', 'DESC')
                ->addOrderBy('t.createdAt', 'DESC')
            ;
        }

        return $query;
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
            ->andWhere('t.lastMessage IS NOT NULL')
            ->andWhere('t.deletedAt IS NULL')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults(1)
            ->setParameter('forum', $forum)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function countPrivateThreadsForUser(User $user): int
    {
        return $this
            ->createQueryBuilder('t')
            ->select('COUNT(t)')
            ->where('t.private = true AND t.author = :user')
            ->andWhere('t.deletedAt IS NULL')
            ->andWhere('t.status !=  :closed OR t.status != :resolved')
            ->setParameters(
                new ArrayCollection([
                    new Parameter('user', $user),
                    new Parameter('closed', ThreadStatusEnum::CLOSED->value),
                    new Parameter('resolved', ThreadStatusEnum::RESOLVED->value),
                ])
            )
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function deleteRemove(Thread $thread, string $type): void
    {
        $date = new DateTime();

        if ($thread->isDeleted()) {
            $type = 'remove';
            $date = $thread->getDeletedAt();
        }

        $thread->setDeletedAt($date);

        $this->deleteThreadMessages($thread, $type);

        if ('remove' == $type) {
            $this->getEntityManager()->remove($thread);
        }

        // Propaga al foro: totalMessages y lastThread
        $forum = $thread->getForum();
        $forum->totalMessages--;
        $forum->lastThread = null;
        $this->applyStatusCount($forum, $thread->getStatus(), -1);

        // Propaga al foro padre si existe
        if (null !== $forum->parent) {
            $forum->parent->totalMessages--;
            $this->applyStatusCount($forum->parent, $thread->getStatus(), -1);
        }

        $this->getEntityManager()->persist($thread);
        $this->getEntityManager()->flush();

        $forum->lastThread = $this->findLastThreadForForum($forum);

        $this->getEntityManager()->persist($forum);
        $this->getEntityManager()->flush();
    }

    /**
     * Devuelve hasta 5 hilos de máxima prioridad que necesitan atención.
     *
     * Criterio de ordenación global (una sola query):
     *   1. priority DESC          → los más urgentes primero
     *   2. unanswered DESC        → sin respuesta (OPEN) antes que en progreso (WAITING_*)
     *   3. createdAt ASC          → más antiguos primero como desempate final
     *
     * @return Thread[]
     */
    public function findNeedingAttention(?Forum $forum = null, int $limit = 5): array
    {
        $qb = $this
            ->createQueryBuilder('t')
            ->andWhere('t.private = false')
            ->andWhere('t.deletedAt IS NULL')
            ->andWhere('t.status IN (:statuses)')
            ->setParameter('statuses', [
                ThreadStatusEnum::OPEN,
                ThreadStatusEnum::WAITING_CUSTOMER,
                ThreadStatusEnum::WAITING_SUPPORT,
            ])
            ->addSelect('CASE WHEN t.status = :open THEN 1 ELSE 0 END AS HIDDEN unanswered')
            ->setParameter('open', ThreadStatusEnum::OPEN)
            ->addOrderBy('unanswered', 'DESC')
            ->orderBy('t.priority', 'DESC')
            ->addOrderBy('t.createdAt', 'ASC')
            ->setMaxResults($limit)
        ;

        if (null !== $forum) {
            $qb->andWhere('t.forum = :forum')->setParameter('forum', $forum);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Devuelve los 3 últimos hilos creados en un foro concreto (no privados, no borrados).
     *
     * @return Thread[]
     */
    public function findLatestByForum(Forum $forum, int $limit = 3): array
    {
        return $this
            ->createQueryBuilder('t')
            ->where('t.forum = :forum')
            ->andWhere('t.private = false')
            ->andWhere('t.deletedAt IS NULL')
            ->orderBy('t.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->setParameter('forum', $forum)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Devuelve los 3 últimos hilos creados en todos los foros (no privados, no borrados).
     *
     * @return Thread[]
     */
    public function findLatest(int $limit = 3): array
    {
        return $this
            ->createQueryBuilder('t')
            ->andWhere('t.private = false')
            ->andWhere('t.deletedAt IS NULL')
            ->orderBy('t.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    private function applyStatusCount(Forum $forum, ThreadStatusEnum $status, int $delta): void
    {
        match ($status) {
            ThreadStatusEnum::CLOSED   => $forum->threadsClosed += $delta,
            ThreadStatusEnum::OPEN     => $forum->threadsOpen += $delta,
            ThreadStatusEnum::RESOLVED => $forum->threadsResolved += $delta,
            default                    => $forum->threadsInProgress += $delta,
        };
    }

    private function deleteThreadMessages(Thread $thread, string $type): void
    {
        $query = $this
            ->getEntityManager()->createQueryBuilder()
            ->where('m.thread = :thread')
            ->setParameter('thread', $thread)
        ;

        if ('remove' == $type) {
            $query->delete(Forum\Message::class, 'm');
        } else {
            $query
                ->update(Forum\Message::class, 'm')
                ->set('m.deletedAt', ':now')
                ->setParameter('now', new DateTime())
            ;
        }

        $query->getQuery()->execute();
    }
}
