<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 26/02/2026, 23:34
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageFixtures.php
 * @date    09/02/2026
 * @time    21:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures\Forum;

use App\Entity\Forum\Thread;
use App\Entity\User\User;
use App\Tests\Factory\Forum\MessageFactory;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;
use Symfony\Component\Yaml\Yaml;

final class MessageFixtures extends Fixture implements DependentFixtureInterface
{

    #[Override]
    public function load(ObjectManager $manager): void
    {
        // Cargar YAML
        $message1 = Yaml::parseFile(dirname(__DIR__).'/data/dummy_messages_part1_expanded.yaml');
        $message2 = Yaml::parseFile(dirname(__DIR__).'/data/dummy_messages_part2_expanded.yaml');
        $message3 = Yaml::parseFile(dirname(__DIR__).'/data/dummy_messages_part3_expanded.yaml');
        $message4 = Yaml::parseFile(dirname(__DIR__).'/data/dummy_messages_part4_expanded.yaml');

        $messages = array_merge(
            $message1['messages'],
            $message2['messages'],
            $message3['messages'],
            $message4['messages']
        );

        /**
         * id: 838
         * thread_id: 183
         * author_id: 3
         * content: Mensaje 1 del thread 183
         * reply_to: null
         * solution: false
         * deletedAt: null
         * created_at: '2025-01-04 00:00:00'
         */
        foreach ($messages as $message) {
            $entityM = MessageFactory::new()
                ->createOne([
                    'content'   => $message['content'],
                    'solution'  => $message['solution'],
                    'thread'    => self::getReference('thread_'.$message['thread_id'], Thread::class),
                    'author'    => self::getReference('user_'.$message['author_id'], User::class),
                    'createdBy' => self::getReference('user_'.$message['author_id'], User::class),
                    'updatedBy' => self::getReference('user_'.$message['author_id'], User::class),
                    'createdAt' => new DateTime($message['created_at']),
                    'updatedAt' => new DateTime($message['created_at']),
                ])
            ;

            self::addReference('message_'.$message['id'], $entityM);
        }
    }

    #[Override]
    public function getDependencies(): array
    {
        return [
            ThreadFixtures::class,
        ];
    }
}
