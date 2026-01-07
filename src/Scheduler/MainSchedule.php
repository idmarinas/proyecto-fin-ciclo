<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/01/2026, 21:25
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MainSchedule.php
 * @date    19/10/2025
 * @time    20:11
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Scheduler;

use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;
use Symfony\Contracts\Cache\CacheInterface;

#[AsSchedule]
final readonly class MainSchedule implements ScheduleProviderInterface
{
    public function __construct (
        #[Target('scheduler.cache')]
        private CacheInterface $cache,
        private LockFactory    $lockFactory
    ) {}

    public function getSchedule (): Schedule
    {
        return new Schedule()
            ->stateful($this->cache)
            ->lock($this->lockFactory->createLock('scheduler_default'))
            ->processOnlyLastMissedRun(true)
        ;
    }
}
