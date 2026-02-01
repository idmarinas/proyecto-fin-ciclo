<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/02/2026, 19:05
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    LayoutMenu.php
 * @date    31/01/2026
 * @time    20:10
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Menu;

use App\Event\ConfigureMenuEvent;
use Knp\Menu\Attribute\AsMenuBuilder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final readonly class LayoutMenu
{
    public function __construct (private FactoryInterface $factory, private EventDispatcherInterface $dispatcher) {}

    #[AsMenuBuilder('layout.menu.header')]
    public function createHeaderMenu (array $options): ItemInterface
    {
        $menu = $this->factory->createItem('layout.menu.header');

        $menu
            ->addChild('Portada', ['route' => 'app_home'])
            ->setExtra('translation_domain', false)
        ;
        $menu
            ->addChild('Foro', ['route' => 'app_forums_index'])
            ->setExtra('translation_domain', false)
        ;

        $menu->setChildrenAttribute('data-turbo', 'false');
        $menu->setExtra('translation_domain', false);

        $event = new ConfigureMenuEvent($this->factory, $menu);
        $this->dispatcher->dispatch($event, ConfigureMenuEvent::CONFIGURE_LAYOUT_HEADER);

        return $menu;
    }
}
