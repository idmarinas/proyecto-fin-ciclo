<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 12:03
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumController.php
 * @date    26/01/2026
 * @time    19:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Forum;

use App\Entity\Forum;
use Doctrine\ORM\EntityManagerInterface;
use Idm\Bundle\Seo\Attributes\Seo;
use Idm\Bundle\Seo\Attributes\Sitemap;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Yaml\Yaml;

final class ForumController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly SeoPageInterface       $seo
    ) {}

    #[Seo, Sitemap]
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        $this->seo
            ->setTitle('Foro de Ayuda y Soporte')
            ->setDescription(
                'Bienvenido a los foros de ayuda y soporte de Lúmina. Encuentra respuestas, reporta incidencias y conecta con nuestro equipo de soporte.'
            )
        ;

        $repository = $this->entityManager->getRepository(Forum::class);
        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $forums = $repository->childrenHierarchy();

        return $this->render(
            'pages/forum/index.html.twig',
            [
                'forums' => $forums,
            ] + $sidebar
        );
    }

    #[Seo(entity: Forum::class), Sitemap('forums', entity: Forum::class, urlParameters: [
        'slug' => new Sitemap\Prop('slug'),
    ])]
    #[Route('/{slug}', name: 'forum', requirements: ['slug' => Requirement::ASCII_SLUG], methods: ['GET'])]
    public function forumParent(
        #[MapEntity(mapping: ['slug' => 'slug'])]
        Forum $forum
    ): Response {
        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $extra = array_replace_recursive($sidebar);

        return $this->render(
            'pages/forum/forums.html.twig',
            [
                'forum' => $forum,
            ] + $extra
        );
    }
}
