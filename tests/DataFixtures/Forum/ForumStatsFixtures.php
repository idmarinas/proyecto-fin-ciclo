<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 11:11
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumStatsFixtures.php
 * @date    22/02/2026
 * @time    10:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Tests\DataFixtures\Forum;

use App\Entity\Forum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Override;

final class ForumStatsFixtures extends Fixture implements DependentFixtureInterface
{
    #[Override]
    public function load(ObjectManager $manager): void
    {

        $repository = $manager->getRepository(Forum\Thread::class);
        // Recalcular stats de los foros padre sumando los de sus subforos
        $parentForums = $manager
            ->getRepository(Forum::class)
            ->createQueryBuilder('f')
            ->where('f.parent IS NULL')
            ->getQuery()
            ->getResult()
        ;

        foreach ($parentForums as $forum) {
            $stats = $repository->getStatsForForum($forum);

            $forum->totalThreads = $stats['totalThreads'];
            $forum->totalMessages = $stats['totalMessages'];
            $forum->threadsOpen = $stats['threadsOpen'];
            $forum->threadsInProgress = $stats['threadsInProgress'];
            $forum->threadsResolved = $stats['threadsResolved'];
            $forum->threadsClosed = $stats['threadsClosed'];
            $forum->lastThread = $repository->findLastThreadForForum($forum);

            $manager->persist($forum);
        }

        $manager->flush();
    }

    #[Override]
    public function getDependencies(): array
    {
        return [ThreadMessageLinkFixtures::class];
    }
}
