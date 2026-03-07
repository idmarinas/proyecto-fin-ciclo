<?php

/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 16:48
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
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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

        yield AvatarField::new('avatar');

        yield TextField::new('username')
            ->setRequired(true)
        ;

        $roles = [];
        if ($this->isGranted('ROLE_ALLOW_CHANGE_USER_ROLE')) {
            $roles['User'] = 'ROLE_USER';
        }
        if ($this->isGranted('ROLE_ALLOW_CHANGE_CLIENT_ROLE')) {
            $roles['Client'] = 'ROLE_CLIENT';
        }
        if ($this->isGranted('ROLE_ALLOW_CHANGE_SUPPORT_ROLE')) {
            $roles['Support'] = 'ROLE_SUPPORT';
        }
        if ($this->isGranted('ROLE_ALLOW_CHANGE_ADMIN_ROLE')) {
            $roles['Admin'] = 'ROLE_ADMIN';
        }
        if ($this->isGranted('ROLE_ALLOW_CHANGE_SUPER_ADMIN_ROLE')) {
            $roles['Super Admin'] = 'ROLE_SUPER_ADMIN';
        }

        $rolesChoice = ChoiceField::new('mainRole', 'Rol')
            ->setChoices($roles)
            ->renderAsBadges()
        ;

        $user = $this->getContext()?->getEntity()?->getInstance();
        if ($user instanceof User) {
            $mainRole = $user->getMainRole();
            $canChangeRole = match ($mainRole) {
                'ROLE_SUPER_ADMIN' => $this->isGranted('ROLE_ALLOW_CHANGE_SUPER_ADMIN_ROLE'),
                'ROLE_ADMIN'       => $this->isGranted('ROLE_ALLOW_CHANGE_ADMIN_ROLE'),
                'ROLE_SUPPORT'     => $this->isGranted('ROLE_ALLOW_CHANGE_SUPPORT_ROLE'),
                'ROLE_CLIENT'      => $this->isGranted('ROLE_ALLOW_CHANGE_CLIENT_ROLE'),
                default            => $this->isGranted('ROLE_ALLOW_CHANGE_USER_ROLE'),
            };

            if (!$canChangeRole) {
                $rolesChoice->setDisabled();
            }
        }

        yield $rolesChoice;

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

        yield BooleanField::new('isDeleted')
            ->setLabel('¿Borrado?')
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
