<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 09/02/2026, 23:43
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory;

use App\Entity\Forum;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Forum>
 */
final class ForumFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class (): string
    {
        return Forum::class;
    }

    /**
     * @see  https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[Override]
    protected function defaults (): array|callable
    {
        $createdAt = self::faker()->dateTime('-10 year');
        $updatedAt = self::faker()->dateTimeBetween($createdAt, '-1 year');

        return [
            'createdAt' => $createdAt,
            // 'ltf'          => self::faker()->randomNumber(),
            // 'totalThreads' => self::faker()->randomNumber(),
            'updatedAt' => $updatedAt,
            // Los siguientes campos son gestionados automáticamente por Gedmo:
            // - ltf, rgt, lvl: Gestión de árbol (Tree nested set)
            // - deletedAt: Soft delete
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(Forum $forum): void {})
            ;
    }
}
