<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 18/01/2026, 17:26
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Alert.php
 * @date    18/01/2026
 * @time    16:44
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
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;
use Symfony\UX\TwigComponent\Attribute\PostMount;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent]
final class Alert
{
    public string|TranslatableInterface $title;
    public string|TranslatableInterface $description;
    private AlertVariantEnum            $type;

    public function __construct (private readonly TranslatorInterface $translator) {}

    #[PreMount]
    public function preMount (array $data): array
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setIgnoreUndefined()
            ->setDefaults([
                'title' => '',
                'description' => '',
                'variant' => AlertVariantEnum::Default,
            ])
            ->setRequired(['description'])
            ->setAllowedTypes('title', ['string', TranslatableInterface::class])
            ->setAllowedTypes('description', ['string', TranslatableInterface::class])
            ->setAllowedTypes('variant', ['string', AlertVariantEnum::class])
            ->setAllowedValues('variant', fn(string|AlertVariantEnum $value) => AlertVariantEnum::isValidValue($value))
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
        return 'alert:' . $this->type->value;
    }

    private function translate (string|TranslatableInterface $value): string
    {
        if ($this->translator instanceof TranslatorInterface && $value instanceof TranslatableInterface) {
            return $value->trans($this->translator);
        }

        return (string)$value;
    }
}
