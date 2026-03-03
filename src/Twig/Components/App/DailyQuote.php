<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 03/03/2026, 20:56
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    DailyQuote.php
 * @date    03/03/2026
 * @time    00:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Twig\Components\App;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
final class DailyQuote
{
    private const array QUOTES = [
        [
            'text'   => 'El mejor momento para plantar un árbol fue hace 20 años. El segundo mejor momento es ahora.',
            'author' => 'Proverbio chino',
        ],
        [
            'text'   => 'La única forma de hacer un gran trabajo es amar lo que haces.',
            'author' => 'Steve Jobs',
        ],
        [
            'text'   => 'No cuentes los días, haz que los días cuenten.',
            'author' => 'Muhammad Ali',
        ],
        [
            'text'   => 'El éxito es la suma de pequeños esfuerzos repetidos día tras día.',
            'author' => 'Robert Collier',
        ],
        [
            'text'   => 'La tecnología es solo una herramienta. Lo que importa es la persona que la usa.',
            'author' => 'Bill Gates',
        ],
        [
            'text'   => 'Un problema bien planteado es un problema medio resuelto.',
            'author' => 'John Dewey',
        ],
        [
            'text'   => 'Cualquier tecnología suficientemente avanzada es indistinguible de la magia.',
            'author' => 'Arthur C. Clarke',
        ],
        [
            'text'   => 'La simplicidad es la máxima sofisticación.',
            'author' => 'Leonardo da Vinci',
        ],
        [
            'text'   => 'Primero hazlo funcionar, luego hazlo correcto, luego hazlo rápido.',
            'author' => 'Kent Beck',
        ],
        [
            'text'   => 'El código es como el humor: cuando tienes que explicarlo, es malo.',
            'author' => 'Cory House',
        ],
    ];

    /**
     * Selecciona la frase del día de forma determinista según el día del año,
     * de modo que todos los usuarios ven la misma frase durante el mismo día.
     *
     * @return array{text: string, author: string}
     */
    #[ExposeInTemplate('quote')]
    public function getQuote(): array
    {
        $index = (int)date('z') % count(self::QUOTES);

        return self::QUOTES[$index];
    }
}
