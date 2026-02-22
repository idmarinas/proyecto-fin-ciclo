<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/02/2026, 21:59
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    CreateFormType.php
 * @date    21/02/2026
 * @time    13:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\Forum\Thread;

use App\Entity\Forum\Thread;
use App\Form\Type\TipTapType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

final class CreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label'         => 'Título de la consulta/duda',
                'sanitize_html' => true,
                'sanitizer'     => 'title_sanitizer',
                'attr'          => [
                    'placeholder' => 'Escribe un título claro y descriptivo',
                ],
                'constraints'   => [
                    new Assert\Length(min: 10, max: 255),
                    new Assert\NoSuspiciousCharacters(),
                ],
            ])
            ->add('description', TipTapType::class, [
                'label'       => 'Escribe tu consulta/duda',
                'empty_data'  => '',
                'constraints' => [
                    new Assert\Length(min: 20, max: 30000),
                ],
            ])
            ->add('isIncident', CheckboxType::class, [
                'label'    => 'Es un incidente',
                'required' => false,
                'help'     => 'Marca esta opción si se trata de un fallo o comportamiento inesperado del sistema.',
            ])
            ->add('isCritical', CheckboxType::class, [
                'label'    => 'Es crítico',
                'required' => false,
                'help'     => 'Indica que el problema es grave y afecta de forma importante al funcionamiento.',
            ])
            ->add('affectsBusiness', CheckboxType::class, [
                'label'    => 'Afecta al negocio',
                'required' => false,
                'help'     => 'Selecciona esta opción si el problema impacta directamente en ventas o clientes.',
            ])
            ->add('button', SubmitType::class, ['label' => 'Publicar hilo', 'attr' => ['size' => 'lg']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'         => Thread::class,
            'translation_domain' => false,
        ]);

        parent::configureOptions($resolver);
    }
}
