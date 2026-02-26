<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 24/02/2026, 22:22
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    EditReplyFormType.php
 * @date    14/02/2026
 * @time    18:10
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\Forum\Thread;

use App\Entity\Forum\Message;
use App\Form\Type\TipTapType;
use Override;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

final class EditReplyFormType extends AbstractType
{
    #[Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TipTapType::class, [
                'label'       => false,
                'empty_data'  => '',
                'constraints' => [
                    new Length(min: 20, max: 30000),
                ],
            ])
            ->add('button', SubmitType::class, ['label' => 'Editar respuesta', 'attr' => ['size' => 'lg',]])
        ;
    }

    #[Override]
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'         => Message::class,
            'translation_domain' => false,
            'csrf_protection'    => false,
        ]);
    }
}
