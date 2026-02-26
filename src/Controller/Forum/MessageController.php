<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 26/02/2026, 20:00
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
use DateTime;
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

    #[Route('/message/{id}/{type}',
        name        : 'delete',
        requirements: ['id' => Requirement::DIGITS, 'type' => 'delete|remove'],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted('message.delete', subject: 'message')]
    public function askDeleteRemove(
        #[MapEntity(mapping: ['id' => 'id'])]
        Message $message,
        string  $type,
        Request $request
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        $template = 'pages/forum/messages/delete/ask.stream.html.twig';

        if ($type === 'remove') {
            $template = 'pages/forum/messages/remove/ask.stream.html.twig';
        }

        return $this->render($template, [
            'message' => $message,
            'type'    => $type,
        ]);
    }

    #[Route('/message/{id}/{type}/confirm',
        name        : 'delete_confirm',
        requirements: ['id' => Requirement::DIGITS, 'type' => 'delete|remove'],
        methods     : ['GET'],
        condition   : 'request.getPreferredFormat() == "turbo_stream"'
    )]
    #[IsGranted('message.delete', subject: 'message')]
    public function deleteRemove(
        #[MapEntity(mapping: ['id' => 'id'])]
        Message                $message,
        string                 $type,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response {
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
        $id = $message->getId();
        $template = 'pages/forum/messages/delete/confirm.stream.html.twig';

        try {
            $message->setDeletedAt(new DateTime());

            $notification = 'El mensaje ha sido borrado correctamente.';

            if ($type === 'remove') {
                $entityManager->remove($message);

                $template = 'pages/forum/messages/remove/confirm.stream.html.twig';
                $notification = 'El mensaje ha sido eliminado correctamente.';
            }

            $entityManager->flush();

            $this->addNotification('success', $notification);
        } catch (Exception) {
            $this->addNotification('error', 'No se pudo borrar el mensaje.');
        }

        return $this->render($template, ['reply_id' => $id]);
    }
}
