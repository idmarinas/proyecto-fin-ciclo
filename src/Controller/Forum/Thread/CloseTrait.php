<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/02/2026, 23:15
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    CloseTrait.php
 * @date    27/02/2026
 * @time    22:27
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Forum\Thread;

use App\Entity\Forum\Thread;
use App\Security\Voter\Forum\ThreadVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Turbo\TurboBundle;

/**
 * Trait para gestionar el cierre de hilos en el foro.
 *
 * @mixin AbstractController
 */
trait CloseTrait
{
    #[Route('/thread/{id}/close',
        name        : 'thread_close',
        requirements: ['id' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted(ThreadVoter::CLOSE, 'thread', 'No puedes cerrar este hilo', Response::HTTP_FORBIDDEN, methods: ['GET'])]
    public function askingClose(
        #[MapEntity(id: 'id')]
        Thread  $thread,
        Request $request
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        return $this->render('pages/forum/threads/streams/close.stream.html.twig', [
            'thread' => $thread,
        ]);
    }

    #[Route('/thread/{id}/close/confirm',
        name        : 'thread_close_confirm',
        requirements: ['id' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted(ThreadVoter::CLOSE, 'thread', 'No puedes cerrar este hilo', Response::HTTP_FORBIDDEN, methods: ['GET'])]
    public function confirmClose(
        #[MapEntity(id: 'id')]
        Thread                 $thread,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        if ($this->workflow->can($thread, 'close')) {
            $this->workflow->apply($thread, 'close');

            $entityManager->persist($thread);
            $entityManager->flush();

            $this->addNotification('success', 'El hilo ha sido cerrado correctamente.');
        }

        return $this->render('pages/forum/threads/streams/confirm.stream.html.twig', [
            'thread' => $thread,
        ]);
    }
}
