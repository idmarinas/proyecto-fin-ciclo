<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/02/2026, 23:02
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    OpenGraphFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Seo;

use App\Tests\Factory\Seo\OpenGraph\StructuredProperty\ImageFactory;
use Idm\Bundle\Seo\Entity\OpenGraph;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<OpenGraph>
 */
final class OpenGraphFactory extends PersistentObjectFactory
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
        return OpenGraph::class;
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
            'description' => self::faker()->text(),
            'image'       => ImageFactory::new(),
            'title'       => self::faker()->text(),
            'type'        => self::faker()->text(),
            'typeData'    => [],
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(OpenGraph $openGraph): void {})
            ;
    }
}
