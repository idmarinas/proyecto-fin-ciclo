<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 12:28
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    UserCrudController.php
 * @date    23/01/2026
 * @time    22:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Controller\Admin\User;

use App\Entity\User\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Override;

final class UserCrudController extends AbstractCrudController
{
    #[Override]
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    #[Override]
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setSearchFields(['email', 'username'])
            ->setDefaultSort(['createdAt' => 'DESC'])
        ;
    }

    #[Override]
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->hideOnForm()
        ;

        yield EmailField::new('email')
            ->setRequired(true)
        ;

        yield TextField::new('username')
            ->setRequired(true)
        ;

        yield AvatarField::new('avatar')
            // ->setBasePath('uploads/avatars')
            // ->setUploadDir('public/uploads/avatars')
            // ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->onlyOnIndex()
        ;

        yield TextField::new('avatarUrl')
            ->hideOnIndex()
        ;

        yield ArrayField::new('roles')
            ->hideOnIndex()
        ;

        yield BooleanField::new('isVerified')
            ->setLabel('Email Verified')
            ->renderAsSwitch(false)
        ;

        yield BooleanField::new('termsAccepted')
            ->setLabel('Terms Accepted')
            ->hideOnIndex()
        ;

        yield BooleanField::new('privacyAccepted')
            ->setLabel('Privacy Accepted')
            ->hideOnIndex()
        ;

        yield TextField::new('signature')
            ->hideOnIndex()
        ;

        yield DateTimeField::new('lastActiveAt')
            ->hideOnForm()
        ;

        yield BooleanField::new('isBanned')
            ->setLabel('Is Banned')
            ->renderAsSwitch(false)
        ;

        yield DateTimeField::new('bannedAt')
            ->onlyOnDetail()
        ;

        yield TextField::new('banReason')
            ->onlyOnDetail()
        ;

        yield DateTimeField::new('createdAt')
            ->hideOnForm()
        ;

        yield DateTimeField::new('deletedAt')
            ->onlyOnDetail()
        ;
    }
}
