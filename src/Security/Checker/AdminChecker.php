<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/01/2026, 23:04
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AdminChecker.php
 * @date    21/01/2026
 * @time    22:42
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Security\Checker;

use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

final class AdminChecker extends AbstractChecker
{
    public function checkPreAuth (UserInterface $user): void
    {
        $token = new PreAuthenticatedToken($user, 'admin', $user->getRoles());

        if (!$this->accessDecisionManager->decide($token, ['ROLE_ADMIN'], null)) {
            throw new AccessDeniedException('user.role.insufficient');
        }

        parent::checkPreAuth($user);
    }
}
