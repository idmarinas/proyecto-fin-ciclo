<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2026, 22:39
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    TagCrudController.php
 * @date    23/01/2026
 * @time    22:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin\Forum;

use App\Entity\Forum\Tag;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Override;

final class TagCrudController extends AbstractCrudController
{
    #[Override]
    public static function getEntityFqcn (): string
    {
        return Tag::class;
    }

    #[Override]
    public function configureCrud (Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Tag')
            ->setEntityLabelInPlural('Tags')
            ->setSearchFields(['name', 'slug'])
            ->setDefaultSort(['name' => 'ASC'])
        ;
    }

    #[Override]
    public function configureFields (string $pageName): iterable
    {
        yield IdField::new('id')
            ->hideOnForm()
        ;

        yield TextField::new('name')
            ->setRequired(true)
        ;

        yield SlugField::new('slug')
            ->setTargetFieldName('name')
            ->hideOnIndex()
        ;

        yield ColorField::new('color')
            ->setLabel('Tag Color')
        ;

        yield AssociationField::new('threads')
            ->onlyOnDetail()
            ->setTemplatePath('admin/fields/collection.html.twig')
        ;

        yield DateTimeField::new('createdAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('updatedAt')
            ->hideOnForm()
        ;
    }
}
