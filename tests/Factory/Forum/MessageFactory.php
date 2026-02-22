<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/02/2026, 17:46
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Forum;

use App\Entity\Forum\Message;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Message>
 */
final class MessageFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class(): string
    {
        return Message::class;
    }

    /**
     * @see  https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[Override]
    protected function defaults(): array|callable
    {
        return [];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize(): static
    {
        return $this
            ->afterInstantiate(function (Message $message): void {
                $thread = $message->getThread();
                $thread->lastMessage = $message;
                $thread->incrementMessageCount();

                $forum = $thread->getForum();
                $forum->lastThread = $thread;
                $forum->totalMessages++;

                if (null !== $forum->parent) {
                    $forum->parent->lastThread = $thread;
                    $forum->parent->totalMessages++;
                }
            })
        ;
    }
}
