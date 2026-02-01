<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/02/2026, 15:10
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    SymfonyStyleTrait.php
 * @date    01/02/2026
 * @time    12:29
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

trait SymfonyStyleTrait
{
    private static SymfonyStyle    $symfonyStyle;
    private static InputInterface  $input;
    private static OutputInterface $output;

    public static function io (): SymfonyStyle
    {
        return self::getSymfonyStyle();
    }

    private static function getSymfonyStyle (): SymfonyStyle
    {
        if (!isset(self::$symfonyStyle) || !self::$symfonyStyle instanceof SymfonyStyle) {
            self::$symfonyStyle = new SymfonyStyle(self::$input, self::$output);
        }

        return self::$symfonyStyle;
    }

    public static function symfonyStyle (InputInterface $input, OutputInterface $output): void
    {
        self::$input = $input;
        self::$output = $output;
    }
}
