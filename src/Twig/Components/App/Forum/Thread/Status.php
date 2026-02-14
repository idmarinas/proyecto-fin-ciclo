<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 11/02/2026, 22:57
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Status.php
 * @date    10/02/2026
 * @time    22:40
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\App\Forum\Thread;

use App\Enums\ThreadStatusEnum;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent]
final class Status
{
    public ThreadStatusEnum $status;
    public string           $id;
    public int              $replies;

    #[PreMount]
    public function preMount (array $data): array
    {
        $resolver = new OptionsResolver()
            ->setIgnoreUndefined()
            ->setDefaults([
                'status'  => null,
                'id'      => '',
                'replies' => 0,
            ])
            ->setRequired(['status'])
            ->addAllowedTypes('status', ['string', ThreadStatusEnum::class])
            ->addAllowedTypes('id', ['string'])
            ->addAllowedTypes('replies', 'int')
            ->setAllowedValues('status', fn(string|ThreadStatusEnum $value) => ThreadStatusEnum::isValidValue($value))
            ->setNormalizer(
                'status',
                fn(Options $opts, string|ThreadStatusEnum $v) => ThreadStatusEnum::normalizeValue($v)
            )
        ;

        return $resolver->resolve($data) + $data;
    }

    /**
     * {{ html_classes('', {
     * 'border-yellow-500 bg-yellow-50 text-yellow-700 [&_h3]:text-yellow-800': statusEnum.OPEN == status and replies >
     * 0,
     * 'border-green-600 bg-green-50 text-green-700 [&_h3]:text-green-800': statusEnum.RESOLVED == status,
     * 'border-red-600 bg-red-50 text-red-700 [&_h3]:text-red-800': statusEnum.OPEN == status and replies == 0
     * }) }}
     */

    #[ExposeInTemplate('card_classes')]
    public function getCardClases (): string
    {
        return match (true) {
            ThreadStatusEnum::OPEN == $this->status && $this->replies > 0
                    => 'border-yellow-500 bg-yellow-50 text-yellow-700 [&_h3]:text-yellow-800',
            ThreadStatusEnum::RESOLVED == $this->status
                    => 'border-green-600 bg-green-50 text-green-700 [&_h3]:text-green-800',
            default => 'border-red-600 bg-red-50 text-red-700 [&_h3]:text-red-800',
        };
    }

    #[ExposeInTemplate('card_title')]
    public function getTitle (): string
    {
        return match (true) {
            ThreadStatusEnum::OPEN == $this->status && $this->replies > 0
                    => 'Hilo en progreso',
            ThreadStatusEnum::RESOLVED == $this->status
                    => 'Hilo resuelto',
            default => 'Este hilo no tiene respuestas',
        };
    }

    #[ExposeInTemplate('card_description')]
    public function getDescription (): string
    {
        return match (true) {
            ThreadStatusEnum::OPEN == $this->status && $this->replies > 0
                    => 'Este hilo está recibiendo respuestas y se encuentra actualmente en discusión.',
            ThreadStatusEnum::RESOLVED == $this->status
                    => 'Este hilo ha sido marcado como resuelto. La solución se encuentra en las respuestas.',
            default => 'Si conoces la solución o puedes aportar alguna idea, tu ayuda será muy apreciada.',
        };
    }

    #[ExposeInTemplate('icon_name')]
    public function getIconName (): string
    {
        return 'thread:' . match (true) {
                ThreadStatusEnum::OPEN == $this->status && $this->replies > 0
                        => 'progress',
                default => $this->status->value,
            };
    }
}
