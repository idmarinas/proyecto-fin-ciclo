<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/02/2026, 22:58
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ResetPasswordRequestFactory.php
 * @date    10/02/2026
 * @time    23:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\User;

use App\Entity\User\ResetPasswordRequest;
use DateTimeImmutable;
use Override;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<ResetPasswordRequest>
 */
final class ResetPasswordRequestFactory extends PersistentObjectFactory
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
        return ResetPasswordRequest::class;
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
            'expiresAt'   => DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'hashedToken' => self::faker()->text(100),
            'selector'    => self::faker()->text(20),
            'user'        => null, // TODO add App\Entity\User\User type manually
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[Override]
    protected function initialize (): static
    {
        return $this// ->afterInstantiate(function(ResetPasswordRequest $resetPasswordRequest): void {})
            ;
    }
}
