<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/02/2026, 18:10
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
use App\Entity\User\User;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 */
final class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function findAllByThread(Thread $thread): QueryBuilder
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
    public function countMessagesForThread(Thread $thread): int
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
    public function findLastMessageForThread(Thread $thread): ?Message
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.thread = :thread')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults(1)
            ->setParameter('thread', $thread)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function deleteRemove(Message $message, string $type): void
    {
        $message->setDeletedAt(new DateTime());
        $this->getEntityManager()->persist($message);

        if ('remove' == $type) {
            $this->getEntityManager()->remove($message);
        }

        // Actualizar hilo
        $thread = $message->getThread();
        $thread->messageCount--;
        $thread->lastMessage = null;

        // Propaga al foro: totalMessages y lastThread
        $forum = $thread->getForum();
        $forum->totalMessages--;

        // Propaga al foro padre si existe
        if (null !== $forum->parent) {
            $forum->parent->totalMessages--;
        }

        $this->getEntityManager()->persist($message);
        $this->getEntityManager()->flush();

        $thread->lastMessage = $this->findLastMessageForThread($thread);

        $this->getEntityManager()->persist($thread);
        $this->getEntityManager()->flush();
    }

    /**
     * Devuelve los usuarios únicos que han participado en un hilo
     * (autor del hilo + autores de los mensajes), sin duplicados.
     *
     * @return User[]
     */
    public function findParticipantsByThread(Thread $thread): array
    {
        // Usamos DQL directo con raíz User para evitar el error de identificación de entidad
        /** @var User[] $messageAuthors */
        $messageAuthors = $this
            ->getEntityManager()
            ->createQuery(
                'SELECT DISTINCT u FROM App\Entity\User\User u
                 JOIN App\Entity\Forum\Message m WITH m.author = u
                 WHERE m.thread = :thread AND m.deletedAt IS NULL'
            )
            ->setParameter('thread', $thread)
            ->getResult()
        ;

        return $messageAuthors;
    }
}
