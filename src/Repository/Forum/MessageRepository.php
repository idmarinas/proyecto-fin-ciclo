<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/02/2026, 21:50
 *
 * @project Foro de Ayuda y Soporte
 * @see https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file MessageRepository.php
 * @date 21/01/2026
 * @time 23:19
 *
 * @author Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since 1.0.0
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

    /**
     * Cuenta los mensajes visibles (no eliminados por SoftDelete) de un hilo.
     */
    public function countMessagesForThread (Thread $thread): int
    {
        return (int)$this
            ->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->where('m.thread = :thread')
            ->setParameter('thread', $thread)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * Devuelve el último mensaje visible (no eliminado por SoftDelete) de un hilo.
     * Devuelve null si el hilo no tiene ningún mensaje.
     */
    public function findLastMessageForThread (Thread $thread): ?Message
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.thread = :thread')
            ->andWhere('m.deletedAt IS NULL')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults(1)
            ->setParameter('thread', $thread)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
