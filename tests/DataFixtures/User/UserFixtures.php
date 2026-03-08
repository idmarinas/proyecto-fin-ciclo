<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:21
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserFixtures.php
 * @date    03/02/2026
 * @time    23:24
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures\User;

use App\Tests\Factory\User\UserFactory;
use DateMalformedStringException;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;
use function Zenstruck\Foundry\faker;

final class UserFixtures extends Fixture
{
    /**
     * @throws DateMalformedStringException
     */
    public function load(ObjectManager $manager): void
    {
        // Cargar YAML
        $users = Yaml::parseFile(dirname(__DIR__).'/data/dummy_users_expanded.yaml');

        $password = function (string $email): string {
            return match (true) {
                str_starts_with($email, 'super@'),
                str_starts_with($email, 'admin'),
                str_starts_with($email, 'support'),
                str_starts_with($email, 'user1@'),
                str_starts_with($email, 'client1@') => 'pass_1234',
                default                             => faker()->password(7, 15),
            };
        };

        foreach ($users['users'] as $user) {
            $createdAt = new DateTime($user['created_at']);
            $entity = UserFactory::new()
                ->updatedAt($createdAt)
                ->createOne([
                    'username'     => $user['username'],
                    'email'        => $user['email'],
                    'roles'        => $user['roles'],
                    'password'     => $password($user['email']),
                    'avatar'       => $user['avatar'],
                    'isVerified'   => $user['is_verified'],
                    'reputation'   => $user['reputation'],
                    'signature'    => $user['bio'] ?? '',
                    'createdAt'    => $createdAt,
                    'client'       => in_array('ROLE_CLIENT', $user['roles']),
                    'lastActiveAt' => new DateTime($user['last_login']),
                ])
            ;
            self::addReference('user_'.$user['id'], $entity);
        }
    }
}
