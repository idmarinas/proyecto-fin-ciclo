<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 26/02/2026, 21:45
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageVoter.php
 * @date    25/02/2026
 * @time    21:09
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Security\Voter\Forum;

use App\Entity\Forum\Message;
use App\Entity\User\User;
use DateTimeImmutable;
use Override;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class MessageVoter extends Voter
{
    public const string EDIT   = 'message.edit';
    public const string DELETE = 'message.delete';
    public const string REMOVE = 'message.remove';
    public const string OWNER  = 'message.owner';

    public const array  ATTRIBUTES = [
        self::EDIT,
        self::DELETE,
        self::REMOVE,
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
        return is_a($subjectType, Message::class, true);
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, self::ATTRIBUTES) && $subject instanceof Message;
    }

    protected function voteOnAttribute(
        string         $attribute,
        mixed          $subject,
        TokenInterface $token,
        ?Vote          $vote = null
    ): bool {
        $user = $token->getUser();

        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        if ($this->decision->decide($token, ['ROLE_SUPER_ADMIN'])) {
            return true;
        }

        return match ($attribute) {
            self::OWNER => $this->isOwner($subject, $token),
            self::DELETE,
            self::EDIT  => $this->canEditDelete($subject, $token),
            default     => false,
        };
    }

    private function canEditDelete(Message $subject, TokenInterface $token): bool
    {
        if (null === $subject->getCreatedAt() || $subject->isSolution()) {
            return false;
        }

        $diff = new DateTimeImmutable()->getTimestamp() - $subject->getCreatedAt()->getTimestamp();

        // Si han pasado más de 10 minutos y tiene límite de tiempo no se permite editar ni eliminar.
        if ($diff > 600 && !$this->decision->decide($token, ['ROLE_EDIT_REMOVE_UNLIMITED_TIME'])) {
            return false;
        }

        return $this->isOwner($subject, $token);
    }

    private function isOwner(Message $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        // Si no hay sesión o no hay autor, no es dueño del hilo
        if (!$user instanceof User || $subject->getAuthor() === null) {
            return false;
        }

        return $subject->getAuthor() === $user;
    }
}
