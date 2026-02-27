<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/02/2026, 22:25
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadController.php
 * @date    14/02/2026
 * @time    11:36
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Forum;

use App\Controller\Forum\Thread\DeleteRemoveTrait;
use App\Entity\Forum;
use App\Entity\Forum\Message;
use App\Entity\Forum\Thread;
use App\Form\Forum\Thread\CreateFormType;
use App\Form\Forum\Thread\EditFormType;
use App\Form\Forum\Thread\ReplyFormType;
use App\Repository\Forum\MessageRepository;
use App\Repository\Forum\ThreadRepository;
use App\Security\Voter\Forum\ForumVoter;
use App\Security\Voter\Forum\ThreadVoter;
use App\Traits\Controller\NotificationsTrait;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Component\Yaml\Yaml;

#[Route('{slug_forum}/forum/{slug_subforum}',
    name        : 'forum_',
    requirements: ['slug_subforum' => Requirement::ASCII_SLUG, 'slug_forum' => Requirement::ASCII_SLUG]
)]
final class ThreadController extends AbstractController
{
    use NotificationsTrait;
    use DeleteRemoveTrait;

    public function __construct(
        #[Target('thread_status')]
        private readonly WorkflowInterface $workflow
    ) {}

    #[Route('', name: 'threads', requirements: ['page' => Requirement::POSITIVE_INT], methods: ['GET'])]
    public function index(
        #[MapEntity(mapping: ['slug_subforum' => 'slug'])]
        Forum              $forum,
        Security           $security,
        ThreadRepository   $threadRepository,
        PaginatorInterface $paginator,
        Request            $request
    ): Response {
        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $canSeePrivate = $security->isGranted('ROLE_ALLOW_PRIVATE_THREADS_VIEW');
        $pagination = $paginator->paginate(
            $threadRepository->findAllByForum($forum, $canSeePrivate, $this->getUser()),
            $request->query->getInt('page', 1)
        );

        return $this->render(
            'pages/forum/threads/index.html.twig',
            [
                'forum'      => $forum,
                'pagination' => $pagination,
            ] + $sidebar
        );
    }

    #[Route('/thread/create/{type}',
        name        : 'thread_create',
        requirements: ['type' => 'public|private'],
        methods     : ['GET', 'POST']
    )]
    public function create(
        #[MapEntity(mapping: ['slug_subforum' => 'slug'])]
        Forum                  $forum,
        string                 $type,
        Request                $request,
        EntityManagerInterface $entityManager,
    ): Response {
        $thread = new Thread()->setForum($forum);

        if ($this->isGranted(ForumVoter::CREATE_PRIVATE, $forum) && 'private' === $type) {
            $thread->private = true;
        } elseif ($this->isGranted(ForumVoter::CREATE_PUBLIC, $forum) && 'public' === $type) {
            $thread->private = false;
        } else {
            return $this->redirectToRoute('app_forums_forum_threads', [
                'slug_forum'    => $forum->parent->getSlug(),
                'slug_subforum' => $forum->getSlug(),
            ]);
        }

        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $form = $this->createForm(CreateFormType::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Thread $entity */
            $entity = $form->getData();
            $forum = $entity->getForum();

            $forum->totalThreads++;
            $forum->lastThread = $entity;
            $forum->threadsOpen++;

            if (null !== $forum->parent) {
                $forum->parent->totalThreads++;
                $forum->parent->lastThread = $entity;
                $forum->parent->threadsOpen++;
            }

            $entityManager->persist($entity);
            $entityManager->flush();

            $this->addNotification('success', 'Tu hilo ha sido creado correctamente.');

            return $this->redirectToRoute('app_forums_forum_threads', [
                'slug_forum'    => $forum->parent->getSlug(),
                'slug_subforum' => $forum->getSlug(),
            ]);
        }

        return $this->render(
            'pages/forum/threads/create.html.twig',
            [
                'forum' => $forum,
                'form'  => $form,
                'type'  => $type,
            ] + $sidebar
        );
    }

    #[Route('/thread/{slug_thread}/edit',
        name        : 'thread_edit',
        requirements: ['slug_thread' => Requirement::ASCII_SLUG],
        methods     : ['GET', 'POST']
    )]
    #[IsGranted(ThreadVoter::EDIT, 'thread', 'Hilo no encontrado', Response::HTTP_NOT_FOUND, methods: ['GET'])]
    public function edit(
        #[MapEntity(mapping: ['slug_thread' => 'slug'])]
        Thread                 $thread,
        Request                $request,
        EntityManagerInterface $entityManager
    ): Response {
        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $form = $this->createForm(EditFormType::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($thread);
            $entityManager->flush();

            $this->addNotification('success', 'Tu hilo ha sido actualizado correctamente.');

            return $this->redirectToRoute('app_forums_forum_thread_view', [
                'slug_forum'    => $thread->getForum()->parent->getSlug(),
                'slug_subforum' => $thread->getForum()->getSlug(),
                'slug_thread'   => $thread->getSlug(),
            ]);
        }

        return $this->render(
            'pages/forum/threads/edit.html.twig',
            [
                'form'   => $form,
                'thread' => $thread,
            ] + $sidebar
        );
    }

    // #[Seo]
    #[Route('/thread/{slug_thread}',
        name        : 'thread_view',
        requirements: ['slug_thread' => Requirement::ASCII_SLUG],
        methods     : ['GET', 'POST',]
    )]
    #[IsGranted(ThreadVoter::VIEW, 'thread', 'Hilo no encontrado', Response::HTTP_NOT_FOUND, methods: ['GET'])]
    public function view(
        #[MapEntity(mapping: ['slug_thread' => 'slug'])]
        Thread                 $thread,
        Request                $request,
        MessageRepository      $messageRepository,
        PaginatorInterface     $paginator,
        EntityManagerInterface $entityManager,
    ): Response {
        $sidebar = Yaml::parseFile(dirname(__DIR__).'/../../templates/dummy_sidebar.yaml');

        $page = $request->query->getInt('page', 1);
        $form = $this->createForm(ReplyFormType::class, new Message()->setThread($thread));
        $formEmpty = clone $form;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ('' !== $transition = $this->replyTransition($thread)) {
                if ('public_reply' !== $transition) {
                    $this->workflow->apply($thread, $transition);
                }
                /** @var Message $message */
                $message = $form->getData();
                $thread = $message->getThread();

                // Actualiza las estadísticas del hilo directamente
                $thread->lastMessage = $message;
                $thread->incrementMessageCount();

                // Propaga al foro: totalMessages y lastThread
                $forum = $thread->getForum();
                $forum->totalMessages++;
                $forum->lastThread = $thread;

                // Propaga al foro padre si existe
                if (null !== $forum->parent) {
                    $forum->parent->totalMessages++;
                    $forum->parent->lastThread = $thread;
                }

                $entityManager->persist($message);
                $entityManager->flush();

                $this->addNotification('success', 'Tu mensaje ha sido enviado correctamente.');

                $page = 999999999; // Para llevar a la última página
                $form = $formEmpty;
            } else {
                $this->addNotification('error', 'No puedes responder a este hilo.');
            }
        }

        $pagination = $paginator->paginate($messageRepository->findAllByThread($thread), $page);

        return $this->render(
            'pages/forum/threads/view.html.twig',
            [
                'thread'     => $thread,
                'pagination' => $pagination,
                'form'       => $form,

            ] + $sidebar
        );
    }

    private function replyTransition(Thread $thread): string
    {
        return match (true) {
            $this->workflow->can($thread, 'public_reply')
                    => 'public_reply',
            $this->workflow->can($thread, 'customer_reply')
                    => 'customer_reply',
            $this->workflow->can($thread, 'staff_reply')
                    => 'staff_reply',
            default => '',
        };
    }
}
