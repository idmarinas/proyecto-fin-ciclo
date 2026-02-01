<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 31/01/2026, 20:17
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ConfigureMenuEvent.php
 * @date    31/01/2026
 * @time    20:14
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Event;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Contracts\EventDispatcher\Event;

final class ConfigureMenuEvent extends Event
{
    const string CONFIGURE_LAYOUT_HEADER = 'app.configure.menu.layout.header';
    const string CONFIGURE_LAYOUT_FOOTER = 'app.configure.menu.layout.footer';

    public function __construct (private readonly FactoryInterface $factory, private readonly ItemInterface $menu) {}

    /**
     * @return FactoryInterface
     */
    public function getFactory (): FactoryInterface
    {
        return $this->factory;
    }

    /**
     * @return ItemInterface
     */
    public function getMenu (): ItemInterface
    {
        return $this->menu;
    }
}
