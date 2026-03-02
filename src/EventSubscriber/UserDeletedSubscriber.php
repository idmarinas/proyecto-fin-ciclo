<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 02/03/2026, 20:18
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserDeletedSubscriber.php
 * @date    02/03/2026
 * @time    19:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\EventSubscriber;

use App\Entity\User\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

/**
 * Mantiene a los usuarios con cuenta borrada atrapados en la página de recuperación.
 *
 * - En LoginSuccessEvent: redirige al usuario recién autenticado si su cuenta está borrada.
 * - En KernelEvents::REQUEST: intercepta cualquier petición posterior y fuerza la redirección
 *   mientras el usuario siga autenticado y con la cuenta en estado borrado.
 */
final readonly class UserDeletedSubscriber implements EventSubscriberInterface
{
    /**
     * Rutas a las que el usuario borrado SÍ puede acceder.
     * Siempre incluir logout y las rutas del propio flujo de recuperación.
     */
    private const array ALLOWED_ROUTES = [
        'app_user_profile_delete_in_progress',
        'app_user_profile_delete_cancel',
        'app_user_logout',
    ];

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private TokenStorageInterface $tokenStorage,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            LoginSuccessEvent::class => ['onLoginSuccess', 10],
            KernelEvents::REQUEST    => ['onKernelRequest', 7],
        ];
    }

    /**
     * Redirige al usuario borrado justo tras el login exitoso.
     */
    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $user = $event->getUser();

        if (!$user instanceof User || !$user->isDeleted()) {
            return;
        }

        $response = new RedirectResponse($this->urlGenerator->generate('app_user_profile_delete_in_progress'));
        $event->setResponse($response);
    }

    /**
     * En cada petición, si el usuario autenticado tiene la cuenta borrada
     * y está intentando acceder a una ruta no permitida, le redirige.
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $token = $this->tokenStorage->getToken();

        if ($token === null) {
            return;
        }

        $user = $token->getUser();

        if (!$user instanceof User || !$user->isDeleted()) {
            return;
        }

        $currentRoute = $event->getRequest()->attributes->get('_route');

        // Si la ruta aún no está resuelta (muy temprano en el ciclo), dejar pasar
        if ($currentRoute === null) {
            return;
        }

        if (in_array($currentRoute, self::ALLOWED_ROUTES, true)) {
            return;
        }

        $event->setResponse(
            new RedirectResponse(
                $this->urlGenerator->generate('app_user_profile_delete_in_progress')
            )
        );

        $event->stopPropagation();
    }
}
