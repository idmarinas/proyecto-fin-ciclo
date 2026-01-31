<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 31/01/2026, 23:45
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    BanTrait.php
 * @date    20/01/2026
 * @time    22:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

namespace App\Traits\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait BanTrait
{
    /** Date on which the ban is ended */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    public ?DateTimeInterface $bannedUntil = null {
        get => $this->bannedUntil;
        set => $this->bannedUntil = $value;
    }

    /**
     * Gets whether the user is locked out.
     */
    public function isBanned (): bool
    {
        if (!$this->bannedUntil instanceof DateTimeInterface || '-0001-11-30' === $this->bannedUntil->format('Y-m-d')) {
            return false;
        }

        return $this->bannedUntil > (new DateTime('now'));
    }
}
