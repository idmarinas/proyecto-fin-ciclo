<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/02/2026, 17:05
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    SeoFactory.php
 * @date    08/02/2026
 * @time    17:01
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory;

use App\Tests\Factory\Seo\MetaFactory;
use Idm\Bundle\Seo\Entity\Seo;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Seo>
 */
final class SeoFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class (): string
    {
        return Seo::class;
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
            'meta' => MetaFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(Seo $seo): void {})
            ;
    }
}
