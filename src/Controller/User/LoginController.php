<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/01/2026, 22:35
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    LoginController.php
 * @date    10/01/2026
 * @time    13:53
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\User;

use App\Traits\Controller\NotificationsTrait;
use Idm\Bundle\Seo\Attributes\Seo;
use Idm\Bundle\Seo\Attributes\Sitemap;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\UX\Turbo\TurboBundle;
use function Symfony\Component\Translation\t;

final class LoginController extends AbstractController
{
    use NotificationsTrait;

    #[Seo, Sitemap]
    #[Route(path: '/login', name: 'login', methods: ['GET', 'POST'])]
    public function login (
        AuthenticationUtils $authenticationUtils,
        SeoPageInterface    $seoPage,
        Request             $request
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_user_profile');
        }

        $seoPage
            ->setTitle('Conéctate a tu cuenta')
            ->setDescription('Página de conexión al foro de ayuda y soporte.')
        ;

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($error) {
            $this->addNotification('error', t($error->getMessageKey(), $error->getMessageData(), 'security'));
        }

        $params = ['last_username' => $lastUsername];

        if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
            // If the request comes from Turbo,
            // set the content type as text/vnd.turbo-stream.html and only send the HTML to update
            $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

            return $this->render('pages/user/login/form.stream.html.twig', $params);
        }

        return $this->render('pages/user/login/index.html.twig', $params);
    }

    #[Route(path: '/logout', name: 'logout', methods: ['GET'])]
    public function logout (): void
    {
        throw new LogicException(
            'This method can be blank - it will be intercepted by the logout key on your firewall.'
        );
    }
}
