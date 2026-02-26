<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 16:12
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumVoter.php
 * @date    26/02/2026
 * @time    23:46
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Security\Voter\Forum;

use App\Entity\Forum;
use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Override;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class ForumVoter extends Voter
{
    public const string CREATE_PRIVATE = 'create.thread.private';
    public const string CREATE_PUBLIC  = 'create.thread.public';

    public const array ATTRIBUTES = [self::CREATE_PRIVATE, self::CREATE_PUBLIC];

    public function __construct(
        private readonly AccessDecisionManagerInterface $decision,
        private readonly EntityManagerInterface         $entityManager
    ) {}

    #[Override]
    public function supportsAttribute(string $attribute): bool
    {
        return in_array($attribute, self::ATTRIBUTES);
    }

    #[Override]
    public function supportsType(string $subjectType): bool
    {
        return is_a($subjectType, Forum::class, true);
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, self::ATTRIBUTES) && $subject instanceof Forum;
    }

    protected function voteOnAttribute(
        string         $attribute,
        mixed          $subject,
        TokenInterface $token,
        ?Vote          $vote = null
    ): bool {
        // ROLE_SUPER_ADMIN can do anything! The power!
        if ($this->decision->decide($token, ['ROLE_SUPER_ADMIN'])) {
            return true;
        }

        return match ($attribute) {
            self::CREATE_PRIVATE => $this->canCreatePrivate($token, $vote),
            self::CREATE_PUBLIC  => $this->decision->decide($token, ['ROLE_PUBLIC_THREAD_CREATE']),
            default              => false,
        };
    }

    public function canCreatePrivate(TokenInterface $token, Vote $vote): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        // No tiene permiso para crear hilos privados
        if (!$this->decision->decide($token, ['ROLE_PRIVATE_THREAD_CREATE'])) {
            return false;
        }

        $allowRoles = ['ROLE_CLIENT', 'ROLE_SUPPORT', 'ROLE_ADMIN'];

        if (array_any($allowRoles, fn($role) => $this->decision->decide($token, [$role]))) {
            return true;
        }

        $countPrivateThreads = $this->entityManager
            ->getRepository(Forum\Thread::class)
            ->countPrivateThreadsForUser($user)
        ;

        $can = !($countPrivateThreads >= 1);

        if (!$can) {
            $vote->addReason(
                'No puede tener más de 1 hilo privado abierto. Actualmente tiene '.$countPrivateThreads.'.'
            );
        }

        return $can;
    }
}
