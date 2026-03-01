<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 12:55
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserRepository.php
 * @date    10/01/2026
 * @time    21:39
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Repository\User;

use App\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
final class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * Devuelve las estadísticas de actividad de un usuario en el foro en una sola consulta SQL nativa.
     *
     * Campos devueltos (todos escalares):
     * - `total_threads`   (int)         Total de hilos creados por el usuario.
     * - `total_replies`   (int)         Total de mensajes publicados por el usuario.
     * - `solved_threads`  (int)         Hilos cuyo mensaje de resolución pertenece al usuario.
     * - `last_message_date` (string|null) ID del último mensaje publicado por el usuario.
     * - `last_thread_date`  (string|null) ID del último hilo creado por el usuario.
     *
     * @return array{
     *     total_threads: int,
     *     total_replies: int,
     *     solved_threads: int,
     *     last_message_date: string|null,
     *     last_thread_date: string|null,
     * }
     */
    public function getUserStats(User $user): array
    {
        $sql = <<<SQL
            SELECT
                (
                    SELECT COUNT(t.id) FROM pfc_thread t
                    WHERE t.author_id = :userId AND t.deleted_at IS NULL
                ) AS total_threads,

                (
                    SELECT COUNT(m.id) FROM pfc_message m
                    WHERE m.author_id = :userId AND m.deleted_at IS NULL
                ) AS total_replies,

                (
                    SELECT COUNT(t.id) FROM pfc_thread t
                    INNER JOIN pfc_message sm ON sm.id = t.solved_message_id
                    WHERE sm.author_id = :userId AND t.deleted_at IS NULL AND sm.deleted_at IS NULL
                ) AS solved_threads,

                (
                    SELECT m.created_at FROM pfc_message m
                    WHERE m.author_id = :userId AND m.deleted_at IS NULL
                    ORDER BY m.created_at DESC
                    LIMIT 1
                ) AS last_message_date,

                (
                    SELECT t.created_at FROM pfc_thread t
                    WHERE t.author_id = :userId AND t.deleted_at IS NULL
                    ORDER BY t.created_at DESC LIMIT 1
                ) AS last_thread_date
            SQL;

        $result = $this
            ->getEntityManager()
            ->getConnection()
            ->executeQuery($sql, ['userId' => $user->getId()])
            ->fetchAssociative()
        ;

        return [
            'total_threads'     => (int)$result['total_threads'],
            'total_replies'     => (int)$result['total_replies'],
            'solved_threads'    => (int)$result['solved_threads'],
            'last_message_date' => $result['last_message_date'],
            'last_thread_date'  => $result['last_thread_date'],
        ];
    }
}
