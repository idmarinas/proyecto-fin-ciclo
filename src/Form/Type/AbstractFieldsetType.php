<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 12/02/2026, 22:47
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AbstractFieldsetType.php
 * @date    12/02/2026
 * @time    21:08
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Form\Type;

use Override;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractFieldsetType extends AbstractType
{
    #[Override]
    public function configureOptions (OptionsResolver $resolver): void
    {
        $resolver->define('fieldset')->default(true)->allowedTypes('bool')->allowedValues(true);
        $resolver->define('label_as_legend')->default(true)->allowedTypes('bool');
    }

    #[Override]
    public function buildView (FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['fieldset'] = $options['fieldset'];
        $view->vars['label_as_legend'] = $options['label_as_legend'];
    }

}
