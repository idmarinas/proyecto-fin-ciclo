<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 14/02/2026, 21:11
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadFixtures.php
 * @date    08/02/2026
 * @time    23:11
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures\Forum;

use App\Entity\Forum;
use App\Entity\User\User;
use App\Enums\ThreadStatusEnum;
use App\Tests\DataFixtures\ForumFixtures;
use App\Tests\DataFixtures\User\UserFixtures;
use App\Tests\Factory\Forum\ThreadFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;
use Symfony\Component\Yaml\Yaml;

final class ThreadFixtures extends Fixture implements DependentFixtureInterface
{
    #[Override]
    public function load (ObjectManager $manager): void
    {
        // Cargar YAML
        $thread1 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part1_expanded.yaml');
        $thread2 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part2_expanded.yaml');
        $thread3 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part3_expanded.yaml');
        $thread4 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part4_expanded.yaml');

        $threads = array_merge($thread1['threads'], $thread2['threads'], $thread3['threads'], $thread4['threads']);

        /**
         * id: 5
         * subforum_id: 11
         * author_id: 122
         * title: Thread 5 en subforo 11
         * description: Descripción del thread 5
         * content: Contenido detallado del thread 5
         * status: resolved
         * help_type: problemas_facturacion
         * is_private: true
         * sticky: false
         * viewCount: 85
         * created_at: '2024-05-02 00:00:00'
         * updated_at: '2025-01-11 00:00:00'
         * deletedAt: null
         * has_messages: true
         * slug: thread-5
         * solved_message_id: 12
         */
        foreach ($threads as $thread) {
            $entity = ThreadFactory::new()
                ->createOne([
                    'title'         => $thread['title'],
                    'description'   => $thread['content'],
                    'private'       => $thread['is_private'],
                    'viewCount'     => $thread['viewCount'],
                    'sticky'        => $thread['sticky'],
                    'solvedMessage' => null,
                    'status'        => ThreadStatusEnum::from($thread['status']),
                    'forum'         => self::getReference('subforum_' . $thread['subforum_id'], Forum::class),
                    'author'        => self::getReference('user_' . $thread['author_id'], User::class),
                    'createdBy'     => self::getReference('user_' . $thread['author_id'], User::class),
                    'updatedBy'     => self::getReference('user_' . $thread['author_id'], User::class),
                ])
            ;

            self::addReference('thread_' . $thread['id'], $entity);
        }
    }

    #[Override]
    public function getDependencies (): array
    {
        return [
            ForumFixtures::class,
            UserFixtures::class,
        ];
    }
}
