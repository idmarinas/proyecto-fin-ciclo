<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 25/01/2026, 13:58
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    DashboardController.php
 * @date    20/10/2025
 * @time    14:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin;

use App\Entity\Forum;
use App\Entity\Forum\Message;
use App\Entity\Forum\MessageAttachment;
use App\Entity\Forum\MessageReaction;
use App\Entity\Forum\Thread;
use App\Entity\Report;
use App\Entity\Subscription;
use App\Entity\Tag;
use App\Entity\User\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Override;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(
    routePath   : '/%app.route_prefix.admin%',
    routeName   : 'admin',
    routeOptions: ['methods' => 'GET'],
    routes      : ['index' => ['routePath' => '/all']]
)]
final class DashboardController extends AbstractDashboardController
{
    public function __construct (
        private readonly Packages $packages,
    ) {}

    #[Override]
    public function index (): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    #[Override]
    public function configureDashboard (): Dashboard
    {
        $title = sprintf(
            '<img class="mx-auto d-block text-center" src="%s" alt="" /><small>%s</small>',
            $this->packages->getUrl('images/favicons/favicon-64x64.png'),
            $this->getParameter('app.title')
        );

        return parent::configureDashboard()
            ->setTitle($title)
            ->setFaviconPath('images/favicons/favicon.png')
            ->setLocales($this->getParameter('kernel.enabled_locales'))
            ->setTranslationDomain('easyadmin')
        ;
    }

    #[Override]
    public function configureMenuItems (): iterable
    {
        yield from parent::configureMenuItems();

        // Forum Management Section
        yield MenuItem::section('Forum Management');

        yield MenuItem::linkToCrud('Forums', 'fa fa-comments', Forum::class);

        yield MenuItem::linkToCrud('Threads', 'fa fa-list', Thread::class);

        yield MenuItem::linkToCrud('Messages', 'fa fa-comment', Message::class);

        yield MenuItem::linkToCrud('Attachments', 'fa fa-paperclip', MessageAttachment::class);

        yield MenuItem::linkToCrud('Reactions', 'fa fa-smile', MessageReaction::class);

        yield MenuItem::linkToCrud('Tags', 'fa fa-tags', Tag::class);

        // User Management Section
        yield MenuItem::section('User Management');

        yield MenuItem::linkToCrud('Users', 'fa fa-users', User::class);

        yield MenuItem::linkToCrud('Subscriptions', 'fa fa-bookmark', Subscription::class);

        // Moderation Section
        yield MenuItem::section('Moderation');

        yield MenuItem::linkToCrud('Reports', 'fa fa-flag', Report::class);
    }

}
