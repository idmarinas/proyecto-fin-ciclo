<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/03/2026, 22:50
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Version20260308214842.php
 * @date    08/03/2026
 * @time    22:51
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license proprietary
 *
 * @since   1.0.0
 */

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260308214842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '1.2.0';
    }

    #[Override]
    public function postUp(Schema $schema): void
    {
        $file = __DIR__.'/user_change_password.sql';

        if (is_file($file)) {
            $sql = file_get_contents($file);
            if (!empty(trim($sql))) {
                $this->connection->executeStatement($sql);
            }
        }
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
