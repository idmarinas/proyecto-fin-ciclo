<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/02/2026, 18:26
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    EquatableTrait.php
 * @date    04/02/2026
 * @time    19:58
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Entity;

use App\Entity\User\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use function count;

trait EquatableTrait
{
    #[ORM\Column(type: Types::STRING, length: 45)]
    protected string $sessionId = '';

    /** @param User $user */
    public function isEqualTo (UserInterface $user): bool
    {
        if (!$user instanceof self
            || $this->getsessionId() !== $user->getsessionId() // Only 1 session active
            || $this->getPassword() !== $user->getPassword()
            || $this->getUserIdentifier() !== $user->getUserIdentifier()
        ) {
            return false;
        }

        $currentRoles = array_map(strval(...), $this->getRoles());
        $newRoles = array_map(strval(...), $user->getRoles());
        $rolesChanged = count($currentRoles) !== count($newRoles)
                        || count($currentRoles) !== count(array_intersect($currentRoles, $newRoles));

        return !$rolesChanged;
    }

    public function getSessionId (): string
    {
        return $this->sessionId;
    }

    public function setSessionId (string $sessionId): static
    {
        $this->sessionId = $sessionId;

        return $this;
    }
}
