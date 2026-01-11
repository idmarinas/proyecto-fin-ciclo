<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 11/01/2026, 17:22
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    SessionFactory.php
 * @date    11/01/2026
 * @time    17:12
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Decorator\Session;

use App\Bag\NotificationsBag;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\AutowireDecorated;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[AsDecorator(decorates: 'session.factory')]
final readonly class SessionFactory
{
    public function __construct (
        #[AutowireDecorated]
        private \Symfony\Component\HttpFoundation\Session\SessionFactory $inner
    ) {}

    public function createSession (): SessionInterface
    {
        $session = $this->inner->createSession();
        $session->registerBag(new NotificationsBag());

        return $session;
    }
}
