<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/02/2026, 13:22
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ResolveTrait.php
 * @date    27/02/2026
 * @time    23:38
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Forum\Thread;

use App\Entity\Forum\Message;
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
 * @mixin AbstractController
 */
trait ResolveTrait
{
    #[Route('/thread/{id}/resolve/{id_message?}',
        name        : 'thread_resolve',
        requirements: ['id' => Requirement::DIGITS, 'id_message' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"',
    )]
    #[IsGranted(ThreadVoter::RESOLVE, 'thread', 'No puedes resolver este hilo', Response::HTTP_FORBIDDEN, methods: ['GET'])]
    public function askResolve(
        #[MapEntity(id: 'id')]
        Thread   $thread,
        Request  $request,
        #[MapEntity(id: 'id_message')]
        ?Message $message = null,
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        if (!$this->workflow->can($thread, 'resolve')) {
            $this->addNotification('error', 'No puedes resolver este hilo.');

            return $this->render('pages/forum/threads/streams/confirm.stream.html.twig', [
                'thread'  => $thread,
                'message' => $message,
            ]);
        }

        return $this->render('pages/forum/threads/streams/resolve.stream.html.twig', [
            'thread'  => $thread,
            'message' => $message,
        ]);
    }

    #[Route('/thread/{id}/resolve/confirm/{id_message?}',
        name        : 'thread_resolve_confirm',
        requirements: ['id' => Requirement::DIGITS, 'id_message' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted(ThreadVoter::RESOLVE, 'thread', 'No puedes resolver este hilo', Response::HTTP_FORBIDDEN, methods: ['GET'])]
    public function resolveConfirm(
        #[MapEntity(id: 'id')]
        Thread                 $thread,
        Request                $request,
        EntityManagerInterface $entityManager,
        #[MapEntity(id: 'id_message')]
        ?Message               $message = null,
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        if ($this->workflow->can($thread, 'resolve')) {
            if ($message instanceof Message) {
                $message->setSolution(true);
                $thread->setSolvedMessage($message);
                $entityManager->persist($message);
            }

            $this->workflow->apply($thread, 'resolve');

            $entityManager->persist($thread);
            $entityManager->flush();

            $this->addNotification('success', 'El hilo ha sido resuelto correctamente.');

            return $this->redirectToRoute('app_forums_forum_thread_view', [
                'slug_forum'    => $thread->getForum()->parent->getSlug(),
                'slug_subforum' => $thread->getForum()->getSlug(),
                'slug_thread'   => $thread->getSlug(),
            ]);

        }

        return $this->render('pages/forum/threads/streams/confirm.stream.html.twig', [
                'thread'  => $thread,
                'message' => $message,
            ]
        );
    }
}
