<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/01/2026, 22:37
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    NotificationsTrait.php
 * @date    18/01/2026
 * @time    17:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Controller;

use App\Bag\NotificationsBag;
use LogicException;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use function sprintf;

trait NotificationsTrait
{

    protected function addNotification (string $type, mixed $message): void
    {
        try {
            $session = $this->container->get('request_stack')->getSession();
        } catch (SessionNotFoundException $e) {
            throw new LogicException(
                'You cannot use the addFlash method if sessions are disabled. Enable them in "config/packages/framework.yaml".',
                0, $e
            );
        }

        if (!$session instanceof FlashBagAwareSessionInterface) {
            throw new LogicException(
                sprintf(
                    'You cannot use the addFlash method because class "%s" doesn\'t implement "%s".',
                    get_debug_type($session),
                    FlashBagAwareSessionInterface::class
                )
            );
        }

        /** @var NotificationsBag $notification */
        $notification = $session->getBag('notifications');

        $notification->add($type, $message);
    }
}
