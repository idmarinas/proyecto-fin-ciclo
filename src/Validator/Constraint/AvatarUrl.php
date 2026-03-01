<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/03/2026, 13:36
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    AvatarUrl.php
 * @date    01/03/2026
 * @time    14:13
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Validator\Constraint;

use Attribute;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Compound;

/**
 * Valida que una URL de avatar sea válida y pertenezca a uno de los dominios permitidos.
 *
 * Uso en un FormType:
 *   new AvatarUrl(domains: ['images.unsplash.com', 'cdn.miservicio.com'])
 */
#[Attribute]
final class AvatarUrl extends Compound
{
    /**
     * @param string[] $domains Lista de dominios permitidos
     */
    public function __construct(public readonly array $domains = ['images.unsplash.com'])
    {
        parent::__construct();
    }

    protected function getConstraints(array $options): array
    {
        $escapedDomains = array_map(
            static fn(string $domain): string => preg_quote($domain, '/'),
            $this->domains
        );

        $pattern = '/^https?:\/\/('.implode('|', $escapedDomains).')\//i';

        return [
            new Assert\Url(
                message   : 'La URL del avatar no es válida.',
                requireTld: true,
            ),
            new Assert\Regex(
                pattern: $pattern,
                message: 'La URL del avatar debe pertenecer a uno de los dominios permitidos.',
            ),
            new Assert\NoSuspiciousCharacters(),
            new Assert\Length(max: 255),
        ];
    }
}
