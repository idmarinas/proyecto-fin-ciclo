<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 02/03/2026, 20:04
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    SoftDeleteableUserProvider.php
 * @date    02/03/2026
 * @time    19:31
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Security\Provider;

use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * User provider que desactiva el filtro softdeleteable de Doctrine para
 * permitir que los usuarios con cuenta marcada como borrada puedan autenticarse
 * y ser redirigidos a la página de recuperación de cuenta.
 *
 * @implements UserProviderInterface<User>
 */
final readonly class SoftDeleteableUserProvider implements UserProviderInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $filters = $this->entityManager->getFilters();

        // Desactivar el filtro softdeleteable para poder cargar usuarios borrados
        $softDeleteEnabled = $filters->isEnabled('softdeleteable');
        if ($softDeleteEnabled) {
            $filters->disable('softdeleteable');
        }

        try {
            $user = $this->entityManager
                ->getRepository(User::class)
                ->createQueryBuilder('u')
                ->select('u')
                ->where('u.email = :identifier OR u.username = :identifier')
                ->setParameter('identifier', $identifier)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        } finally {
            // Restaurar el estado del filtro siempre, incluso si hay una excepción
            if ($softDeleteEnabled) {
                $filters->enable('softdeleteable');
            }
        }

        if (!$user instanceof User) {
            $exception = new UserNotFoundException(sprintf('Usuario "%s" no encontrado.', $identifier));
            $exception->setUserIdentifier($identifier);

            throw $exception;
        }

        return $user;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class || is_subclass_of($class, User::class);
    }
}
