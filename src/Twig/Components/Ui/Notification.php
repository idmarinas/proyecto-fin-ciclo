<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 18/01/2026, 19:03
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Notification.php
 * @date    06/03/2025
 * @time    14:11
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\Ui;

use App\Twig\Components\Ui\Alert\AlertVariantEnum;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DivisibleBy;
use Symfony\Component\Validator\Validation;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent]
final class Notification
{
    public string            $title;
    public string            $description;
    public bool              $closable;
    private AlertVariantEnum $type;

    public function __construct (private readonly ?TranslatorInterface $translator = null) {}

    #[PreMount]
    public function preMount (array $data): array
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setIgnoreUndefined()
            ->setDefaults([
                'title'       => '',
                'description' => '',
                'variant'     => AlertVariantEnum::Notice,
                'closable'    => true,
                'duration'    => 5000,
                'id'          => null,
            ])
            ->setRequired('description')
            ->setAllowedTypes('title', ['string', TranslatableInterface::class])
            ->setAllowedTypes('description', ['string', TranslatableInterface::class])
            ->setAllowedTypes('variant', ['string', AlertVariantEnum::class])
            ->setAllowedTypes('closable', 'bool')
            ->setAllowedTypes('duration', 'int')
            ->setAllowedTypes('id', ['int', 'string', 'null'])
            ->setAllowedValues('variant', fn(string|AlertVariantEnum $value) => AlertVariantEnum::isValidValue($value))
            ->setAllowedValues('duration', Validation::createIsValidCallable(new DivisibleBy(5000)))
            ->setNormalizer('closable', fn(Options $opts, bool $value) => ($opts['duration'] / 5000 >= 5))
            ->setNormalizer(
                'variant',
                fn(Options $opts, string|AlertVariantEnum $v) => AlertVariantEnum::normalizeValue($v)
            )
            ->setNormalizer('title', fn(Options $opts, string|TranslatableInterface $v) => $this->translate($v))
            ->setNormalizer('description', fn(Options $opts, string|TranslatableInterface $v) => $this->translate($v))
        ;

        return $resolver->resolve($data) + $data;
    }

    #[PostMount]
    public function postMount (array $data): array
    {
        $this->type = $data['variant'];

        return $data;
    }

    #[ExposeInTemplate('icon_name')]
    public function getIconName (): string
    {
        return 'toast:' . $this->type->value;
    }

    private function translate (string|TranslatableInterface $value): string
    {
        if ($this->translator instanceof TranslatorInterface && $value instanceof TranslatableInterface) {
            return $value->trans($this->translator);
        }

        return (string)$value;
    }
}
