<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 13/02/2026, 17:17
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    TipTapType.php
 * @date    13/02/2026
 * @time    12:33
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\Type;

use Override;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TipTapType extends AbstractType
{
    #[Override]
    public function configureOptions (OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => [
                'class' => 'tiptap-editor',
                'rows'  => 10,
            ],
        ]);
    }

    #[Override]
    public function getParent (): string
    {
        return TextareaType::class;
    }

    #[Override]
    public function getBlockPrefix (): string
    {
        return 'tiptap';
    }
}
