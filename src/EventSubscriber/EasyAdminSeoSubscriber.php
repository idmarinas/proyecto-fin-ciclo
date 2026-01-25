<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 20:17
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    EasyAdminSeoSubscriber.php
 * @date    25/01/2026
 * @time    19:42
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventSubscriber;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Loader\Configurator\App;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

final readonly class EasyAdminSeoSubscriber implements EventSubscriberInterface
{
    public function __construct (private Security $security) {}

    public static function getSubscribedEvents (): array
    {
        return App::config([
            ResponseEvent::class => [
                ['onResponseEvent', -100],
            ],
        ]);
    }

    public function onResponseEvent (ResponseEvent $event): void
    {
        $firewallName = $this->security->getFirewallConfig($event->getRequest())?->getName();

        if (!$event->isMainRequest() && 'admin' !== $firewallName) {
            return;
        }

        $response = $event->getResponse();

        if ($response->headers->has('Content-Security-Policy')) {
            // Para no bloquear archivos JS de EasyAdmin
            $csp = $response->headers->get('Content-Security-Policy');
            $csp = preg_replace('/script-src\s+[^;]+;/', '', $csp);

            $response->headers->set('Content-Security-Policy', $csp);
        }

        $event->setResponse($response);
    }
}
