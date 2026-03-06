<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/03/2026, 23:04
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ForumCrudController.php
 * @date    23/01/2026
 * @time    22:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin;

use App\Entity\Forum;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Idm\Bundle\Seo\Traits\Admin\SeoTrait;
use Override;

final class ForumCrudController extends AbstractCrudController
{
    use SeoTrait;

    #[Override]
    public static function getEntityFqcn(): string
    {
        return Forum::class;
    }

    #[Override]
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Foro')
            ->setEntityLabelInPlural('Foros')
            ->setSearchFields(['title', 'description', 'slug'])
            ->setDefaultSort(['createdAt' => 'DESC'])
        ;
    }

    #[Override]
    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Foro');
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
            ->hideOnIndex()
        ;

        yield ImageField::new('image')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads/forums/'.date('Y/m'))
            ->setUploadedFileNamePattern('forums/[year]/[month]/[slug]-[contenthash].[extension]')
            ->onlyOnIndex()
        ;

        yield UrlField::new('image')->onlyOnForms();

        yield AssociationField::new('parent')
            ->setLabel('Parent Forum')
            ->hideOnIndex()
        ;

        yield DateTimeField::new('createdAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('updatedAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('deletedAt')
            ->hideOnIndex()
            ->hideWhenCreating()
        ;

        yield from $this->getSeoFields();
    }
}
