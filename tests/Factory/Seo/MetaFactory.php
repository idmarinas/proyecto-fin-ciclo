<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/02/2026, 23:02
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MetaFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Seo;

use Idm\Bundle\Seo\Entity\Meta;
use Override;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Meta>
 */
final class MetaFactory extends ObjectFactory
{
    /**
     * @see  https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct () {}

    #[Override]
    public static function class (): string
    {
        return Meta::class;
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
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(Meta $meta): void {})
            ;
    }
}
