<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 09/02/2026, 21:53
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumFixtures.php
 * @date    08/02/2026
 * @time    19:50
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures;

use App\Tests\Factory\ForumFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Override;
use Symfony\Component\Yaml\Yaml;

final class ForumFixtures extends Fixture
{
    #[Override]
    public function load (ObjectManager $manager): void
    {
        // Cargar YAML
        $forums = Yaml::parseFile(__DIR__ . '/data/dummy_forums_expanded.yaml');

        foreach ($forums['forums'] as $forum) {
            $entity = ForumFactory::createOne([
                'title'       => $forum['title'],
                'description' => $forum['description'],
                'image'       => $forum['image'],
            ]);

            foreach ($forum['subforums'] as $subforum) {
                $entitySub = ForumFactory::createOne([
                    'title'       => $subforum['title'],
                    'description' => $subforum['description'],
                    'image'       => $subforum['image'],
                    'parent'      => $entity,
                ]);
                self::addReference('subforum_' . $subforum['id'], $entitySub);
            }
            // self::addReference('forum_' . $forum['id'], $entity);
        }
    }
}
