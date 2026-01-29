<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 29/01/2026, 22:35
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserLastActiveSubscriber.php
 * @date    13/04/2025
 * @time    21:12
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventSubscriber;

use App\Entity\User\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Security\Core\Event\AuthenticationSuccessEvent;

final readonly class UserLastActiveSubscriber implements EventSubscriberInterface
{
    public function __construct (
        private EntityManagerInterface $entityManager
    ) {}

    public static function getSubscribedEvents (): array
    {
        return [
            'security.authentication.success' => 'onSecurityAuthenticationSuccess',
        ];
    }

    /**
     * @throws ExceptionInterface
     */
    public function onSecurityAuthenticationSuccess (AuthenticationSuccessEvent $event): void
    {
        if ($event->isPropagationStopped()) {
            return;
        }

        /** @var User $user */
        $user = $event->getAuthenticationToken()->getUser();
        $user->setLastActiveAt(new DateTime('now'));

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
