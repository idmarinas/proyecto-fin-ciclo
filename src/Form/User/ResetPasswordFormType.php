<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 23:01
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ResetPasswordFormType.php
 * @date    10/01/2026
 * @time    21:38
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\User;

use App\Validator\Constraint\PasswordRequirements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResetPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type'            => PasswordType::class,
                'options'         => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_options'   => [
                    'constraints' => [
                        new PasswordRequirements(),
                    ],
                    'label'       => 'Nueva contraseña',
                ],
                'second_options'  => [
                    'label' => 'Repetir nueva contraseña',
                ],
                'invalid_message' => 'Las contraseñas deben ser iguales.',
                'mapped'          => false,
            ])
            ->add('button', SubmitType::class, ['label' => 'Restablecer contraseña', 'attr' => ['size' => 'lg',]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'translation_domain' => false,
        ]);
    }
}
