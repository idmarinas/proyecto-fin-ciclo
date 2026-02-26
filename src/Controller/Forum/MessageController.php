<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 26/02/2026, 19:24
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageController.php
 * @date    25/02/2026
 * @time    21:59
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

declare(strict_types=1);

namespace App\Controller\Forum;

use App\Entity\Forum\Message;
use App\Traits\Controller\NotificationsTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Turbo\TurboBundle;

#[Route('/forum/thread', name: 'forum_thread_message_')]
class MessageController extends AbstractController
{
    use NotificationsTrait;

    #[Route('/message/{id}/delete',
        name        : 'delete',
        requirements: ['id' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted('message.delete', subject: 'message')]
    public function askDelete(
        #[MapEntity(mapping: ['id' => 'id'])]
        Message $message,
        Request $request
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        return $this->render('pages/forum/messages/delete/ask.stream.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/message/{id}/delete/confirm',
        name        : 'delete_confirm',
        requirements: ['id' => Requirement::DIGITS],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted('message.delete', subject: 'message')]
    public function delete(
        #[MapEntity(mapping: ['id' => 'id'])]
        Message                $message,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
        $id = $message->getId();

        try {
            $entityManager->remove($message);
            $entityManager->flush();

            $this->addNotification('success', 'El mensaje ha sido eliminado correctamente.');
        } catch (Exception) {
            $this->addNotification('error', 'No se pudo eliminar el mensaje.');
        }

        return $this->render('pages/forum/messages/delete/confirm.stream.html.twig', ['reply_id' => $id]);
    }
}
