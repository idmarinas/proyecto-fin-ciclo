<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 21:15
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ThreadCrudController.php
 * @date    23/01/2026
 * @time    22:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin\Forum;

use App\Entity\Forum\Thread;
use App\Enums\ThreadStatusEnum;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Override;

final class ThreadCrudController extends AbstractCrudController
{
    #[Override]
    public static function getEntityFqcn(): string
    {
        return Thread::class;
    }

    #[Override]
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Thread')
            ->setEntityLabelInPlural('Threads')
            ->setSearchFields(['title', 'description', 'slug'])
            ->setDefaultSort(['createdAt' => 'DESC'])
        ;
    }

    #[Override]
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->hideOnForm()
        ;

        yield TextField::new('title')
            ->setRequired(true)
        ;

        yield SlugField::new('slug')
            ->setTargetFieldName('title')
            ->hideOnIndex()
        ;

        yield TextareaField::new('description')
            ->setRequired(true)
            ->hideOnIndex()
        ;

        yield AssociationField::new('forum')
            ->setRequired(true)
        ;

        yield AssociationField::new('author')
            ->setRequired(true)
        ;

        yield BooleanField::new('private')
            ->setLabel('Is Private')
        ;

        yield BooleanField::new('sticky')
            ->setLabel('Pinned')
        ;

        yield ChoiceField::new('status')
            ->setChoices([
                'Open'             => ThreadStatusEnum::OPEN,
                'Waiting Customer' => ThreadStatusEnum::WAITING_CUSTOMER,
                'Waiting Support'  => ThreadStatusEnum::WAITING_SUPPORT,
                'Resolved'         => ThreadStatusEnum::RESOLVED,
                'Closed'           => ThreadStatusEnum::CLOSED,
            ])
            ->renderAsBadges([
                ThreadStatusEnum::OPEN->value             => 'success',
                ThreadStatusEnum::WAITING_CUSTOMER->value => 'warning',
                ThreadStatusEnum::WAITING_SUPPORT->value  => 'warning',
                ThreadStatusEnum::RESOLVED->value         => 'success',
                ThreadStatusEnum::CLOSED->value           => 'secondary',
            ])
        ;

        yield AssociationField::new('solvedMessage')
            ->setLabel('Solution Message')
            ->hideOnIndex()
        ;

        yield IntegerField::new('viewCount')
            ->hideOnForm()
        ;

        yield AssociationField::new('tags')
            ->hideOnIndex()
        ;

        yield AssociationField::new('messages')
            ->onlyOnDetail()
            ->setTemplatePath('admin/fields/collection.html.twig')
        ;

        yield DateTimeField::new('createdAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('updatedAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('deletedAt')
            ->onlyOnDetail()
        ;
    }
}
