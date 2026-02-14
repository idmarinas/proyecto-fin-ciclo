<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 14/02/2026, 20:57
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadMessageLinkFixtures.php
 * @date    14/02/2026
 * @time    20:55
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures\Forum;

use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;
use Symfony\Component\Yaml\Yaml;

final class ThreadMessageLinkFixtures extends Fixture implements DependentFixtureInterface
{
    #[Override]
    public function load (ObjectManager $manager): void
    {
        // Cargar YAML de threads
        $thread1 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part1_expanded.yaml');
        $thread2 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part2_expanded.yaml');
        $thread3 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part3_expanded.yaml');
        $thread4 = Yaml::parseFile(dirname(__DIR__) . '/data/dummy_threads_part4_expanded.yaml');

        $threads = array_merge(
            $thread1['threads'],
            $thread2['threads'],
            $thread3['threads'],
            $thread4['threads']
        );

        $threads = array_filter($threads, fn($thread) => !empty($thread['solved_message_id']));

        // Vincular threads con sus mensajes resueltos
        foreach ($threads as $thread) {
            $threadEntity = $this->getReference('thread_' . $thread['id'], Thread::class);
            $messageEntity = $this->getReference('message_' . $thread['solved_message_id'], Message::class);

            $threadEntity->setSolvedMessage($messageEntity);
            $manager->persist($threadEntity);
        }

        $manager->flush();
    }

    #[Override]
    public function getDependencies (): array
    {
        return [
            ThreadFixtures::class,
            MessageFixtures::class,
        ];
    }
}
