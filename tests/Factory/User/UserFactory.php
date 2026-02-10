<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/02/2026, 22:36
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserFactory.php
 * @date    03/02/2026
 * @time    23:27
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\Factory\User;

use App\Entity\User\User;
use DateTimeInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

final class UserFactory extends PersistentObjectFactory
{
    public function __construct (private readonly UserPasswordHasherInterface $hasher)
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public static function class (): string
    {
        return User::class;
    }

    protected function defaults (): array|callable
    {
        $createdAt = self::faker()->dateTime('-10 year');
        $updatedAt = self::faker()->dateTimeBetween($createdAt, '-1 day');

        // id: 96
        // username: 'SmartSpecialist'
        // email: 'free.user41@example.com'
        // roles: ['ROLE_USER']
        // avatar: 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&w=600&q=80'
        // created_at: '2025-01-09 12:45:00'
        // last_login: '2025-01-15 10:00:00'
        // is_verified: true
        // reputation: 123

        return [
            'sessionId'       => self::faker()->sha1(),
            'createdFromIp'   => self::faker()->ipv4(),
            'updatedFromIp'   => self::faker()->ipv4(),
            'createdAt'       => $createdAt,
            'updatedAt'       => $updatedAt,
            // 'bannedUntil'     => self::faker()->dateTimeBetween('now', '+3 years'),
            // 'deletedAt'       => self::faker()->dateTimeBetween($createdAt),
            'privacyAccepted' => self::faker()->boolean(),
            'termsAccepted'   => self::faker()->boolean(),
        ];
    }

    protected function initialize (): static
    {
        return parent::initialize()
            ->afterInstantiate(function (User $user): void {
                $user->setPassword($this->hasher->hashPassword($user, $user->getPassword()));
            })
        ;
    }

    public function updatedAt (DateTimeInterface $createdAt): self
    {
        return $this->with(['updatedAt' => self::faker()->dateTimeBetween($createdAt, '-9 day')]);
    }
}
