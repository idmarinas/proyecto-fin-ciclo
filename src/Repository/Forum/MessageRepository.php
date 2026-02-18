<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/02/2026, 14:12
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageRepository.php
 * @date    21/01/2026
 * @time    23:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Repository\Forum;

use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 */
final class MessageRepository extends ServiceEntityRepository
{
    public function __construct (ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function findAllByThread (Thread $thread): QueryBuilder
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.thread = :thread')
            ->orderBy('m.createdAt', 'ASC')
            ->setParameter('thread', $thread)
        ;
    }
}
