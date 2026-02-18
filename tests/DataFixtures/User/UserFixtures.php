<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/02/2026, 16:50
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

final class UserFixtures extends Fixture
{
    /**
     * @throws DateMalformedStringException
     */
    public function load (ObjectManager $manager): void
    {
        // Cargar YAML
        $users = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_users_expanded.yaml');

        foreach ($users['users'] as $user) {
            $createdAt = new DateTime($user['created_at']);
            $entity = UserFactory::new()
                ->updatedAt($createdAt)
                ->createOne([
                    'username'     => $user['username'],
                    'email'        => $user['email'],
                    'roles'        => $user['roles'],
                    'password'     => 'pass_1234',
                    'avatar'       => $user['avatar'],
                    'isVerified'   => $user['is_verified'],
                    'reputation'   => $user['reputation'],
                    'signature'    => $user['bio'] ?? '',
                    'createdAt'    => $createdAt,
                    'client'       => in_array('ROLE_CLIENT', $user['roles']),
                    'lastActiveAt' => new DateTime($user['last_login']),
                ])
            ;
            self::addReference('user_' . $user['id'], $entity);
        }
    }
}
