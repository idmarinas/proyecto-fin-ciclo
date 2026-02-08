<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/02/2026, 19:32
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

use App\Entity\User\User;
use Override;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserInterface;

final class AdminChecker extends AbstractChecker
{
    #[Override]
    public function checkPreAuth (UserInterface $user): void
    {
        /** @var User $user */
        parent::checkPreAuth($user);

        $token = new PreAuthenticatedToken($user, 'admin', $user->getRoles());

        if (!$this->accessDecisionManager->decide($token, ['ROLE_ADMIN'], null)) {
            throw new AccessDeniedException('user.role.insufficient');
        }

        if ($user->isDeleted()) {
            throw new CustomUserMessageAccountStatusException('user.account.no.exist');
        }
    }
}
