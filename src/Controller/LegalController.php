<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 18:34
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    LegalController.php
 * @date    19/02/2026
 * @time    19:13
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

declare(strict_types=1);

namespace App\Controller;

use Idm\Bundle\Seo\Attributes\Seo;
use Idm\Bundle\Seo\Attributes\Sitemap;
use Idm\Bundle\Seo\Attributes\SitemapInterface;
use Idm\Bundle\Seo\Service\SeoPageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/legal', name: 'legal_')]
final class LegalController extends AbstractController
{
    public function __construct(private readonly SeoPageInterface $seo) {}

    #[Seo, Sitemap(priority: '0.5', changefreq: SitemapInterface::CHANGEFREQ_MONTHLY)]
    #[Route('/sobre-nosotros', name: 'sobre_nosotros')]
    public function sobreNosotros(): Response
    {
        $this->seo
            ->setTitle('Sobre Nosotros')
            ->setDescription(
                'Conoce Lúmina: nuestra misión, filosofía, servicios y el equipo que trabaja para ofrecerte una plataforma profesional, moderna y fiable.'
            )
        ;

        return $this->render('pages/legal/sobre_nosotros.html.twig');
    }

    #[Seo, Sitemap(priority: '0.2', changefreq: SitemapInterface::CHANGEFREQ_MONTHLY)]
    #[Route('/aviso-legal', name: 'aviso_legal')]
    public function avisoLegal(): Response
    {
        $this->seo
            ->setTitle('Aviso Legal')
            ->setDescription(
                'Información legal sobre la titularidad, condiciones de uso y propiedad intelectual de la plataforma Lúmina Servicios Tecnológicos.'
            )
        ;

        return $this->render('pages/legal/aviso_legal.html.twig');
    }

    #[Seo, Sitemap(priority: '0.2', changefreq: SitemapInterface::CHANGEFREQ_MONTHLY)]
    #[Route('/politica-de-privacidad', name: 'privacidad')]
    public function privacidad(): Response
    {
        $this->seo
            ->setTitle('Política de Privacidad')
            ->setDescription(
                'Consulta cómo Lúmina recoge, utiliza y protege tus datos personales, y conoce los derechos que puedes ejercer sobre ellos.'
            )
        ;

        return $this->render('pages/legal/privacidad.html.twig');
    }

    #[Seo, Sitemap(priority: '0.2', changefreq: SitemapInterface::CHANGEFREQ_MONTHLY)]
    #[Route('/politica-de-cookies', name: 'cookies')]
    public function cookies(): Response
    {
        $this->seo
            ->setTitle('Política de Cookies')
            ->setDescription(
                'Descubre qué cookies utiliza Lúmina, para qué sirven y cómo puedes gestionarlas o desactivarlas desde tu navegador.'
            )
        ;

        return $this->render('pages/legal/cookies.html.twig');
    }

    #[Seo, Sitemap(priority: '0.2', changefreq: SitemapInterface::CHANGEFREQ_MONTHLY)]
    #[Route('/terminos-y-condiciones', name: 'terminos')]
    public function terminos(): Response
    {
        $this->seo
            ->setTitle('Términos y Condiciones de Uso')
            ->setDescription(
                'Lee las condiciones que regulan el acceso y uso de la plataforma Lúmina, incluyendo las normas del foro y los derechos de los usuarios.'
            )
        ;

        return $this->render('pages/legal/terminos.html.twig');
    }
}
