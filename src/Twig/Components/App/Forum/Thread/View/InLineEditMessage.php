<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/02/2026, 13:11
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    InLineEditMessage.php
 * @date    24/02/2026
 * @time    20:10
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\App\Forum\Thread\View;

use App\Entity\Forum\Message;
use App\Form\Forum\Thread\EditReplyFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsLiveComponent]
final class InLineEditMessage extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp]
    public Message $reply;

    #[LiveProp, ExposeInTemplate('is_editing')]
    public bool $isEditing = false;

    #[LiveAction]
    public function activateEditing(): void
    {
        $this->isEditing = true;
    }

    #[ExposeInTemplate('is_resolver')]
    public function isResolver(): string
    {
        return $this->reply->getThread()->getSolvedMessage()?->getId() == $this->reply->getId()
            ? 'bg-green-50 border-green-600 shadow-md shadow-green-900' : '';
    }

    #[ExposeInTemplate('item_id')]
    public function itemId(): string
    {
        return 'reply_'.$this->reply->getId();
    }

    #[LiveAction]
    public function save(EntityManagerInterface $entityManager): void
    {
        $this->submitForm();

        $this->isEditing = false;
        $reply = $this->getForm()->getData();

        $entityManager->persist($reply);
        $entityManager->flush();

        $this->reply = $reply;
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(EditReplyFormType::class, $this->reply);
    }
}
