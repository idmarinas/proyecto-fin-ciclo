<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 21:14
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    MessageCrudController.php
 * @date    23/01/2026
 * @time    22:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin\Forum;

use App\Entity\Forum\Message;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Override;

final class MessageCrudController extends AbstractCrudController
{
    #[Override]
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }

    #[Override]
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Message')
            ->setEntityLabelInPlural('Messages')
            ->setSearchFields(['content'])
            ->setDefaultSort(['createdAt' => 'DESC'])
        ;
    }

    #[Override]
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->hideOnForm()
        ;

        yield AssociationField::new('thread')
            ->setRequired(true)
        ;

        yield AssociationField::new('author')
            ->setRequired(true)
        ;

        yield TextareaField::new('content')
            ->setRequired(true)
            ->hideOnIndex()
        ;

        yield AssociationField::new('parent')
            ->setLabel('Parent Message')
            ->hideOnIndex()
        ;

        yield BooleanField::new('solution')
            ->setLabel('Is Solution')
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
