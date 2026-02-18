<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 18/02/2026, 22:43
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

use App\Entity\Forum\Thread;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Thread>
 */
final class ThreadFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class (): string
    {
        return Thread::class;
    }

    /**
     * @see  https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[Override]
    protected function defaults (): array|callable
    {
        return [
            // 'createdAt' => self::faker()->dateTime(),
            // 'private'   => self::faker()->boolean(),
            // 'slug'      => self::faker()->text(255),
            // 'status' => self::faker()->randomElement(ThreadStatusEnum::cases()),
            // - slug: Generado automáticamente desde title
            // - createdAt, updatedAt: Timestamps automáticos
            // - deletedAt: Soft delete
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(Thread $thread): void {})
            ;
    }
}
