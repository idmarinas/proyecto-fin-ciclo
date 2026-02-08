<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/02/2026, 19:31
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    FormExtension.php
 * @date    21/01/2026
 * @time    22:38
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Extension;

use App\Twig\Runtime\FormExtensionRuntime;
use Override;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class FormExtension extends AbstractExtension
{
    #[Override]
    public function getFunctions (): array
    {
        return [
            new TwigFunction('form_widget_attributes', [FormExtensionRuntime::class, 'formWidgetAttributes']),
            new TwigFunction('form_button_attributes', [FormExtensionRuntime::class, 'formButtonAttributes']),
            new TwigFunction('form_label_attributes', [FormExtensionRuntime::class, 'formLabelAttributes']),
            new TwigFunction(
                'form_widget_container_attributes',
                [FormExtensionRuntime::class, 'formWidgetContainerAttributes']
            ),
            new TwigFunction('form_attributes', [FormExtensionRuntime::class, 'formAttributes']),
        ];
    }
}
