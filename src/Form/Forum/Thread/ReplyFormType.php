<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 21/02/2026, 13:13
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    ReplyFormType.php
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
use App\Form\Type\AbstractFieldsetType;
use App\Form\Type\TipTapType;
use Override;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ReplyFormType extends AbstractFieldsetType
{
    #[Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TipTapType::class, [
                'attr'       => [
                    'placeholder' => 'Escribe tu respuesta aquí...',
                ],
                'label'      => 'Tu respuesta',
                'empty_data' => '',
            ])
            ->add('button', SubmitType::class, ['label' => 'Publicar respuesta', 'attr' => ['size' => 'lg']])
        ;
    }

    #[Override]
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'         => Message::class,
            'translation_domain' => false,
            'label'              => 'Añadir una respuesta',
            'help'               => 'Recuerda que tu respuesta debe ser clara, concisa y respetuosa. Asegúrate de proporcionar información relevante y útil para ayudar a resolver el problema planteado en el hilo.',
        ]);

        parent::configureOptions($resolver);
    }
}
