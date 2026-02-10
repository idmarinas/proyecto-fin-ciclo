<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/02/2026, 23:06
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AppCardFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Seo\TwitterCard;

use Idm\Bundle\Seo\Entity\TwitterCard\AppCard;
use Override;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<AppCard>
 */
final class AppCardFactory extends ObjectFactory
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
        return AppCard::class;
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
            'id',
            'name',
            'url',
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(AppCard $appCard): void {})
            ;
    }
}
