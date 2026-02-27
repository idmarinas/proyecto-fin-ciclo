<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/02/2026, 22:41
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    DeleteRemoveTrait.php
 * @date    27/02/2026
 * @time    22:22
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Forum\Thread;

use App\Entity\Forum\Thread;
use App\Repository\Forum\ThreadRepository;
use App\Security\Voter\Forum\ThreadVoter;
use Exception;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\UX\Turbo\TurboBundle;

trait DeleteRemoveTrait
{
    #[Route('/thread/{id}/{type}',
        name        : 'thread_delete',
        requirements: ['id' => Requirement::DIGITS, 'type' => 'delete|remove'],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    public function askDeleteRemove(
        #[MapEntity(mapping: ['id' => 'id'])]
        Thread  $thread,
        string  $type,
        Request $request
    ): Response {
        $this->denyAccessUnlessGranted(ThreadVoter::{strtoupper($type)}, $thread);
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        $template = 'pages/forum/threads/streams/delete.stream.html.twig';

        if ($type === 'remove') {
            $template = 'pages/forum/threads/streams/remove.stream.html.twig';
        }

        return $this->render($template, [
            'thread' => $thread,
            'type'   => $type,
        ]);
    }

    #[Route('/thread/{id}/{type}/confirm',
        name        : 'thread_delete_confirm',
        requirements: ['id' => Requirement::DIGITS, 'type' => 'delete|remove'],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    public function deleteRemove(
        #[MapEntity(mapping: ['id' => 'id'])]
        Thread           $thread,
        string           $type,
        Request          $request,
        ThreadRepository $repository
    ): Response {
        $this->denyAccessUnlessGranted(ThreadVoter::{strtoupper($type)}, $thread);
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        $url = $this->generateUrl('app_forums_forum_threads', [
            'slug_forum'    => $thread->getForum()->parent->getSlug(),
            'slug_subforum' => $thread->getForum()->getSlug(),
        ]);

        try {
            $notification = 'El hilo ha sido borrado correctamente.';

            if ($type === 'remove') {
                $notification = 'El hilo ha sido eliminado correctamente.';
            }

            $repository->deleteRemove($thread, $type);

            $this->addNotification('success', $notification);
        } catch (Exception) {
            $this->addNotification('error', 'No se pudo borrar el hilo.');

            return $this->render('pages/forum/threads/streams/confirm.stream.html.twig');
        }

        return $this->redirect($url);
    }
}
