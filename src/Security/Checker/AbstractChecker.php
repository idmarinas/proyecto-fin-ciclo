<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 30/01/2026, 20:26
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AbstractChecker.php
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
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use function Symfony\Component\Translation\t;

abstract class AbstractChecker implements UserCheckerInterface
{
    private FlashBagInterface $flash;

    public function __construct (
        protected AccessDecisionManagerInterface $accessDecisionManager,
        private readonly RequestStack            $request,
    ) {}

    public function checkPreAuth (UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if ($user->isBanned()) {
            throw new CustomUserMessageAccountStatusException('user.account.banned');
        }
    }

    public function checkPostAuth (UserInterface $user, TokenInterface|null $token = null): void
    {
        if (!$user instanceof User) {
            return;
        }

        if (!$user->isVerified()) {
            $this->getFlashBag()->add('warning', t('user.email.not_verified', [], 'security'));
        }

        // user account is expired, the user may be notified
        // if ($user->isExpired())
        // {
        //     throw new AccountExpiredException('...');
        // }
    }

    public function getFlashBag (): FlashBagInterface
    {
        if (!$this->flash instanceof FlashBagInterface) {
            $this->flash = $this->request->getSession()->getFlashBag();
        }

        return $this->flash;
    }
}
