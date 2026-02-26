<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/02/2026, 21:11
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadVoter.php
 * @date    14/02/2026
 * @time    21:27
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Security\Voter\Forum;

use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Enums\ThreadStatusEnum;
use DateTimeImmutable;
use Override;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class ThreadVoter extends Voter
{
    public const string VIEW   = 'thread.view';
    public const string EDIT   = 'thread.edit';
    public const string DELETE = 'thread.delete';
    public const string REMOVE = 'thread.remove';
    public const string CLOSE  = 'thread.close';
    public const string OPEN   = 'thread.open';
    public const string PIN    = 'thread.pin';
    public const string UNPIN  = 'thread.unpin';
    public const string REPORT = 'thread.report';
    public const string OWNER  = 'thread.owner';

    public const array  ATTRIBUTES = [
        self::EDIT,
        self::VIEW,
        self::DELETE,
        self::REMOVE,
        self::CLOSE,
        self::OPEN,
        self::PIN,
        self::UNPIN,
        self::REPORT,
        self::OWNER,
    ];

    public function __construct(
        private readonly AccessDecisionManagerInterface $decision
    ) {}

    #[Override]
    public function supportsAttribute(string $attribute): bool
    {
        return in_array($attribute, self::ATTRIBUTES);
    }

    #[Override]
    public function supportsType(string $subjectType): bool
    {
        return is_a($subjectType, Thread::class, true);
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, self::ATTRIBUTES) && $subject instanceof Thread;
    }

    /**
     * @param Thread $subject
     */
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
            self::VIEW  => $this->canView($subject, $token),
            self::OWNER => $this->isOwner($subject, $token),
            self::DELETE,
            self::EDIT  => $this->canEditDelete($subject, $token),
            self::CLOSE => $this->canClose($subject, $token),
            default     => false,
        };
    }

    private function canView(Thread $subject, TokenInterface $token): bool
    {
        if ($subject->isPublic() || $this->decision->decide($token, ['ROLE_ALLOW_PRIVATE_THREADS_VIEW'])) {
            return true;
        }

        /** @var User $user */
        $user = $token->getUser();

        if ($subject->getAuthor() === $user) {
            return true;
        }

        return false;
    }

    private function canEditDelete(Thread $subject, TokenInterface $token): bool
    {
        if (null === $subject->getCreatedAt()) {
            return false;
        }

        $status = $subject->getStatus();

        // Si el hilo está cerrado o resuelto ya no se puede editar ni eliminar.
        if ($status == ThreadStatusEnum::CLOSED || $status == ThreadStatusEnum::RESOLVED) {
            return false;
        }

        $diff = new DateTimeImmutable()->getTimestamp() - $subject->getCreatedAt()->getTimestamp();

        // Si han pasado más de 10 minutos y tiene límite de tiempo no se permite editar ni eliminar.
        if ($diff > 600 && !$this->decision->decide($token, ['ROLE_EDIT_REMOVE_UNLIMITED_TIME'])) {
            return false;
        }

        return $this->isOwner($subject, $token);
    }

    private function canClose(Thread $subject, TokenInterface $token): bool
    {
        return $this->decision->decide($token, ['ROLE_SUPPORT']) || $this->isOwner($subject, $token);
    }

    private function isOwner(Thread $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        // Si no hay sesión o no hay autor, no es dueño del hilo
        if (!$user instanceof User || $subject->getAuthor() === null) {
            return false;
        }

        return $subject->getAuthor() === $user;
    }
}
