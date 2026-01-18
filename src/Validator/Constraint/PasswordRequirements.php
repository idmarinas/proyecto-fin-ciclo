<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 17/01/2026, 20:46
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    PasswordRequirements.php
 * @date    10/01/2026
 * @time    13:38
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

#[Attribute]
final class PasswordRequirements extends Compound
{
    protected function getConstraints (array $options): array
    {
        return [
            new Assert\NotBlank(message: 'app.password.not_blank'),
            new Assert\Type('string'),
            // max length allowed by Symfony for security reasons
            new Assert\Length(min: 8, max: 4096, minMessage: 'app.password.min_message'),
            new Assert\NotCompromisedPassword(),
            new Assert\NoSuspiciousCharacters(restrictionLevel: Assert\NoSuspiciousCharacters::RESTRICTION_LEVEL_HIGH),
            new Assert\PasswordStrength(minScore: Assert\PasswordStrength::STRENGTH_WEAK),
        ];
    }
}
