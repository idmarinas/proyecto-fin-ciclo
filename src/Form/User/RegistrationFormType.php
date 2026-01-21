<?php
/**
 * Copyright 2024-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 18/01/2026, 13:36
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    RegistrationFormType.php
 * @date    02/12/2024
 * @time    16:50
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   2.0.0
 */

namespace App\Form\User;

use App\Validator\Constraint\PasswordRequirements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

final class RegistrationFormType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'register.email.label',
                'attr'  => [
                    'placeholder' => 'register.email.label',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'            => PasswordType::class,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped'          => false,
                'invalid_message' => 'app.password.not_match',
                'options'         => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_name'      => 'password',
                'second_name'     => 'password_repeat',
                'first_options'   => [
                    'label' => 'register.password.label',
                    'attr'  => ['placeholder' => 'register.password.label'],
                ],
                'second_options'  => [
                    'label' => 'register.repeat_password.label',
                    'attr'  => ['placeholder' => 'register.repeat_password.label'],
                ],
                'constraints'     => [
                    new PasswordRequirements(),
                ],
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'label'       => 'register.agree_terms.label',
                'help'        => 'register.agree_terms.help',
                'required'    => false,
                'constraints' => [
                    new Assert\IsTrue(message: 'app.agree_terms'),
                ],
            ])
            ->add('privacyAccepted', CheckboxType::class, [
                'label'       => 'register.agree_privacy.label',
                'help'        => 'register.agree_privacy.help',
                'required'    => false,
                'constraints' => [
                    new Assert\IsTrue(message: 'app.agree_privacy'),
                ],
            ])
            ->add('button', SubmitType::class, [
                'label' => 'register.button.label',
            ])
        ;
    }

    public function configureOptions (OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'translation_domain' => 'forms',
        ]);
    }
}
