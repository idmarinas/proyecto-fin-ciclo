<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 10/02/2026, 23:22
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageAttachmentFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\Forum;

use App\Entity\Forum\MessageAttachment;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<MessageAttachment>
 */
final class MessageAttachmentFactory extends PersistentObjectFactory
{
    #[Override]
    public static function class (): string
    {
        return MessageAttachment::class;
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
            'createdAt' => self::faker()->dateTime(),
            'fileName'  => self::faker()->text(255),
            'fileSize'  => self::faker()->randomNumber(),
            'message'   => null, // TODO add App\Entity\Forum\Message type manually
            'mimeType'  => self::faker()->text(100),
            'updatedAt' => self::faker()->dateTime(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(MessageAttachment $messageAttachment): void {})
            ;
    }
}
