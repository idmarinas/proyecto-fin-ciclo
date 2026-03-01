<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 13:50
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    EditUserFormType.php
 * @date    01/03/2026
 * @time    14:13
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\User;

use App\Entity\User\User;
use App\Form\Type\TipTapType;
use App\Validator\Constraint\AvatarUrl;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NoSuspiciousCharacters;

final class EditUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avatar', TextType::class, [
                'label'       => 'Url del Avatar',
                'constraints' => [new AvatarUrl(),],
            ])
            ->add('username', TextType::class, [
                'label'       => 'Nombre visible',
                'required'    => true,
                'constraints' => [
                    new NoSuspiciousCharacters(),
                    new Length(min: 0, max: 50),
                ],
            ])
            ->add('signature', TipTapType::class, [
                'label'       => 'Firma',
                'required'    => false,
                'constraints' => [new Length(min: 0, max: 255),],
            ])
            ->add('button', SubmitType::class, ['label' => 'Guardar cambios', 'attr' => ['size' => 'lg',]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'         => User::class,
            'translation_domain' => false,
        ]);
    }
}
