<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 15/02/2026, 16:11
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
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Thread>
 */
final class ThreadRepository extends ServiceEntityRepository
{
    public function __construct (ManagerRegistry $registry)
    {
        parent::__construct($registry, Thread::class);
    }

    public function findAllByForum (Forum $forum, bool $canSeePrivate, ?User $user = null): QueryBuilder
    {
        $query = $this
            ->createQueryBuilder('t')
            ->where('t.forum = :forum')
            ->setParameter('forum', $forum)
        ;

        if (null === $user) {
            $query->andWhere('t.private = false');
        } elseif (!$canSeePrivate) {
            $query
                ->andWhere('t.private = false OR t.private = true AND t.author = :user')
                ->setParameter('user', $user)
            ;
        }

        return $query;
    }
}
