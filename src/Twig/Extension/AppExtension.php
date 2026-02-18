<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/02/2026, 17:04
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AppExtension.php
 * @date    08/02/2026
 * @time    20:16
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Extension;

use Symfony\Component\Filesystem\Path;
use Twig\Attribute\AsTwigFilter;
use Twig\Attribute\AsTwigFunction;

final class AppExtension
{

    #[AsTwigFunction('parse_img', isSafe: ['html'])]
    public function image (string $image, string $alt = '', array $attributes = []): string
    {
        $image = filter_var($image, FILTER_VALIDATE_URL, ['default' => 'uploads/' . $image]);
        $attributes = array_map(fn($key, $v) => sprintf('%s="%s"', $key, $v), array_keys($attributes), $attributes);
        $attributes = implode('', $attributes);

        return sprintf('<img src="%s" alt="%s" %s loading="lazy" />', $image, $alt, $attributes);
    }

    #[AsTwigFilter('avatar_url')]
    public function avatarUrl (string $image): string
    {
        $basePath = Path::isAbsolute($image) ? '/uploads/avatars' : '/uploads/avatars/';

        return filter_var($image, FILTER_VALIDATE_URL, ['default' => $basePath . $image]);
    }
}
