<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 13:09
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Forum;

use App\Entity\Forum;
use App\Entity\Forum\Thread;
use App\Enums\ThreadStatusEnum;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Thread>
 */
final class ThreadFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class(): string
    {
        return Thread::class;
    }

    /**
     * @see  https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    #[Override]
    protected function defaults(): array|callable
    {
        return [
            // - slug: Generado automáticamente desde title
            // - createdAt, updatedAt: Timestamps automáticos
            // - deletedAt: Soft delete
        ];
    }

    #[Override]
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (Thread $thread): void {
                $forum = $thread->getForum();

                $forum->lastThread = $thread;
                $forum->totalThreads++;
                $this->applyStatusCount($forum, $thread->getStatus(), +1);

                if (null !== $forum->parent) {
                    $forum->parent->lastThread = $thread;
                    $forum->parent->totalThreads++;
                    $this->applyStatusCount($forum->parent, $thread->getStatus(), +1);
                }
            })
        ;
    }

    /**
     * Incrementa el contador de estado correspondiente en el foro dado.
     */
    private function applyStatusCount(Forum $forum, ThreadStatusEnum $status, int $delta): void
    {
        match ($status) {
            ThreadStatusEnum::CLOSED   => $forum->threadsClosed += $delta,
            ThreadStatusEnum::OPEN     => $forum->threadsOpen += $delta,
            ThreadStatusEnum::RESOLVED => $forum->threadsResolved += $delta,
            default                    => $forum->threadsInProgress += $delta,
        };
    }
}
