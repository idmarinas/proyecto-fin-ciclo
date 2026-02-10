<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/02/2026, 22:57
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageReactionFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Forum;

use App\Entity\Forum\MessageReaction;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<MessageReaction>
 */
final class MessageReactionFactory extends PersistentObjectFactory
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
        return MessageReaction::class;
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
            'message' => null, // TODO add App\Entity\Forum\Message type manually
            'type'    => self::faker()->text(20),
            'user'    => null, // TODO add App\Entity\User\User type manually
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(MessageReaction $messageReaction): void {})
            ;
    }
}
