<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 12/02/2026, 21:35
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    FormExtensionRuntime.php
 * @date    27/01/2026
 * @time    23:28
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Runtime;

use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\RuntimeExtensionInterface;

final readonly class FormExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct (private TranslatorInterface $translator) {}

    public function formWidgetAttributes (array $context): array
    {
        $attributes = [
            'id'       => $context['id'],
            'name'     => $context['full_name'],
            'disabled' => $context['disabled'] ? 'disabled' : null,
            'required' => $context['required'] ? 'required' : null,
        ];

        $context['type'] = $context['type'] ?? null;

        if (in_array($context['type'], ['input', 'hidden']) && !empty($context['value'])) {
            $attributes['value'] = $context['value'];
        } elseif ('color' == $context['type'] || 'range' == $context['type']) {
            // Attribute 'required' is not supported
            $attributes['required'] = null;
        } elseif ('checkbox' == $context['type']) {
            $attributes['checked'] = $context['checked'] ? 'checked' : null;

            if (isset($context['value'])) {
                $attributes['value'] = $context['value'];
            }
        }

        return array_filter($attributes + $this->formAttributes($context));
    }

    public function formAttributes (array $context): array
    {
        $attributes = [];
        foreach ($context['attr'] as $key => $value) {
            if (in_array($key, ['placeholder', 'title'])) {
                if (false !== $context['translation_domain'] && !empty($value)) {
                    $value = $this->translator->trans($value, [], $context['translation_domain']);
                }

                $attributes[$key] = $value;
            } elseif (true === $value) {
                $attributes[$key] = $key;
            } elseif (false !== $value) {
                $attributes[$key] = $value;
            }
        }

        return array_filter($attributes);
    }

    public function formButtonAttributes (array $context): array
    {
        $attributes = [
            'id'       => $context['id'],
            'name'     => $context['full_name'],
            'disabled' => $context['disabled'] ? 'disabled' : null,
        ];

        return array_filter($attributes + $this->formAttributes($context));
    }

    public function formLabelAttributes (array $context): array
    {
        $attributes = $context['label_attr'];

        if (!$context['compound']) {
            $attributes['for'] = $context['id'];
        }

        if ($context['required']) {
            $attributes['class'] = ($attributes['class'] ?? '') . ' required';
        }

        return $attributes;
    }

    public function formWidgetContainerAttributes (array $context): array
    {
        $attributes = [
            'id' => $context['id'],
        ];

        return array_filter($attributes + $this->formAttributes($context));
    }
}
