<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 07/03/2026, 18:45
 *
 * @project Foro de Ayuda y Soporte
 * @see     https://github.com/idmarinas/proyecto-fin-ciclo
 *
 * @file    Version20260307164842.php
 * @date    07/03/2026
 * @time    17:54
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
use Override;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260307164842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '1.0.0';
    }

    #[Override]
    public function postUp(Schema $schema): void
    {
        foreach ([
            __DIR__.'/start.sql',
            __DIR__.'/user.sql',
            __DIR__.'/pfc_forum.sql',
            __DIR__.'/pfc_thread.sql',
            __DIR__.'/pfc_message.sql',
            __DIR__.'/end.sql',
        ] as $file) {
            if (is_file($file)) {
                $sql = file_get_contents($file);
                if (!empty(trim($sql))) {
                    $this->connection->executeStatement($sql);
                }
            }
        }
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE idm_seo__open_graph_data (type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, type_data JSON NOT NULL, id BINARY(16) NOT NULL, image_alt VARCHAR(255) DEFAULT NULL, image_width INT DEFAULT NULL, image_height INT DEFAULT NULL, image_url VARCHAR(255) DEFAULT NULL, image_secure_url VARCHAR(255) DEFAULT NULL, video_width INT DEFAULT NULL, video_height INT DEFAULT NULL, video_type VARCHAR(255) DEFAULT NULL, video_url VARCHAR(255) DEFAULT NULL, video_secure_url VARCHAR(255) DEFAULT NULL, audio_url VARCHAR(255) DEFAULT NULL, audio_secure_url VARCHAR(255) DEFAULT NULL, audio_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE idm_seo__seo_data (id BINARY(16) NOT NULL, meta_title VARCHAR(255) NOT NULL, meta_description VARCHAR(255) NOT NULL, meta_keywords JSON NOT NULL, meta_robots JSON NOT NULL, og_id BINARY(16) DEFAULT NULL, twitter_id BINARY(16) DEFAULT NULL, UNIQUE INDEX UNIQ_5C73ADFFE2B1C419 (og_id), UNIQUE INDEX UNIQ_5C73ADFFC63E6FFF (twitter_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE idm_seo__twitter_card_data (card VARCHAR(25) NOT NULL, creator VARCHAR(20) NOT NULL, title VARCHAR(70) NOT NULL, description VARCHAR(200) NOT NULL, site VARCHAR(1000) NOT NULL, image VARCHAR(1000) NOT NULL, image_alt VARCHAR(420) NOT NULL, id BINARY(16) NOT NULL, player_url VARCHAR(255) NOT NULL, player_width INT NOT NULL, player_height INT NOT NULL, app_country VARCHAR(2) NOT NULL, app_iphone_id VARCHAR(255) NOT NULL, app_iphone_name VARCHAR(255) NOT NULL, app_iphone_url VARCHAR(255) NOT NULL, app_ipad_id VARCHAR(255) NOT NULL, app_ipad_name VARCHAR(255) NOT NULL, app_ipad_url VARCHAR(255) NOT NULL, app_googleplay_id VARCHAR(255) NOT NULL, app_googleplay_name VARCHAR(255) NOT NULL, app_googleplay_url VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE pfc_forum (total_threads INT NOT NULL, total_messages INT NOT NULL, threads_open INT NOT NULL, threads_in_progress INT NOT NULL, threads_resolved INT NOT NULL, threads_closed INT NOT NULL, description LONGTEXT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, id INT UNSIGNED AUTO_INCREMENT NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, ltf INT NOT NULL, rgt INT NOT NULL, lvl INT NOT NULL, last_thread_id INT UNSIGNED DEFAULT NULL, seo_id BINARY(16) DEFAULT NULL, tree_root INT UNSIGNED DEFAULT NULL, parent_id INT UNSIGNED DEFAULT NULL, UNIQUE INDEX UNIQ_4A1DBCD989D9B62 (slug), INDEX IDX_4A1DBCDF55F9F1F (last_thread_id), UNIQUE INDEX UNIQ_4A1DBCD97E3DD86 (seo_id), INDEX IDX_4A1DBCDA977936C (tree_root), INDEX IDX_4A1DBCD727ACA70 (parent_id), INDEX IDX_FORUM_LTF (ltf), INDEX IDX_FORUM_RGT (rgt), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE pfc_message (created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, solution TINYINT NOT NULL, id INT UNSIGNED AUTO_INCREMENT NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, author_id INT UNSIGNED DEFAULT NULL, thread_id INT UNSIGNED DEFAULT NULL, INDEX IDX_8B652422F675F31B (author_id), INDEX IDX_8B652422E2904019 (thread_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE pfc_thread (created_by VARCHAR(255) DEFAULT NULL, description VARCHAR(1000) NOT NULL, message_count INT NOT NULL, title VARCHAR(255) NOT NULL, updated_by VARCHAR(255) DEFAULT NULL, is_incident TINYINT DEFAULT 0 NOT NULL, is_critical TINYINT DEFAULT 0 NOT NULL, affects_business TINYINT DEFAULT 0 NOT NULL, priority SMALLINT DEFAULT 0 NOT NULL, private TINYINT NOT NULL, slug VARCHAR(255) DEFAULT NULL, status VARCHAR(255) NOT NULL, sticky TINYINT NOT NULL, view_count INT NOT NULL, id INT UNSIGNED AUTO_INCREMENT NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, last_message_id INT UNSIGNED DEFAULT NULL, author_id INT UNSIGNED DEFAULT NULL, forum_id INT UNSIGNED DEFAULT NULL, solved_message_id INT UNSIGNED DEFAULT NULL, seo_id BINARY(16) DEFAULT NULL, INDEX IDX_31A1C6E662A6DC27 (priority), UNIQUE INDEX UNIQ_31A1C6E6989D9B62 (slug), INDEX IDX_31A1C6E6BA0E79C3 (last_message_id), INDEX IDX_31A1C6E6F675F31B (author_id), INDEX IDX_31A1C6E629CCBAD0 (forum_id), INDEX IDX_31A1C6E63F32F684 (solved_message_id), UNIQUE INDEX UNIQ_31A1C6E697E3DD86 (seo_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL, expires_at DATETIME NOT NULL, user_id INT UNSIGNED NOT NULL, INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE user (avatar VARCHAR(255) DEFAULT NULL, reputation INT NOT NULL, client TINYINT NOT NULL, deletion_warning_sent TINYINT DEFAULT 0 NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(50) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT NOT NULL, terms_accepted TINYINT NOT NULL, privacy_accepted TINYINT NOT NULL, signature VARCHAR(300) DEFAULT NULL, last_active_at DATETIME DEFAULT NULL, id INT UNSIGNED AUTO_INCREMENT NOT NULL, banned_until DATETIME DEFAULT NULL, session_id VARCHAR(45) NOT NULL, deleted_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_from_ip VARCHAR(45) DEFAULT NULL, updated_from_ip VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE idm_seo__seo_data ADD CONSTRAINT FK_5C73ADFFE2B1C419 FOREIGN KEY (og_id) REFERENCES idm_seo__open_graph_data (id)'
        );
        $this->addSql(
            'ALTER TABLE idm_seo__seo_data ADD CONSTRAINT FK_5C73ADFFC63E6FFF FOREIGN KEY (twitter_id) REFERENCES idm_seo__twitter_card_data (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_forum ADD CONSTRAINT FK_4A1DBCDF55F9F1F FOREIGN KEY (last_thread_id) REFERENCES pfc_thread (id) ON DELETE SET NULL'
        );
        $this->addSql(
            'ALTER TABLE pfc_forum ADD CONSTRAINT FK_4A1DBCD97E3DD86 FOREIGN KEY (seo_id) REFERENCES idm_seo__seo_data (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_forum ADD CONSTRAINT FK_4A1DBCDA977936C FOREIGN KEY (tree_root) REFERENCES pfc_forum (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE pfc_forum ADD CONSTRAINT FK_4A1DBCD727ACA70 FOREIGN KEY (parent_id) REFERENCES pfc_forum (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE pfc_message ADD CONSTRAINT FK_8B652422F675F31B FOREIGN KEY (author_id) REFERENCES user (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_message ADD CONSTRAINT FK_8B652422E2904019 FOREIGN KEY (thread_id) REFERENCES pfc_thread (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_thread ADD CONSTRAINT FK_31A1C6E6BA0E79C3 FOREIGN KEY (last_message_id) REFERENCES pfc_message (id) ON DELETE SET NULL'
        );
        $this->addSql(
            'ALTER TABLE pfc_thread ADD CONSTRAINT FK_31A1C6E6F675F31B FOREIGN KEY (author_id) REFERENCES user (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_thread ADD CONSTRAINT FK_31A1C6E629CCBAD0 FOREIGN KEY (forum_id) REFERENCES pfc_forum (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_thread ADD CONSTRAINT FK_31A1C6E63F32F684 FOREIGN KEY (solved_message_id) REFERENCES pfc_message (id)'
        );
        $this->addSql(
            'ALTER TABLE pfc_thread ADD CONSTRAINT FK_31A1C6E697E3DD86 FOREIGN KEY (seo_id) REFERENCES idm_seo__seo_data (id)'
        );
        $this->addSql(
            'ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE idm_seo__seo_data DROP FOREIGN KEY FK_5C73ADFFE2B1C419');
        $this->addSql('ALTER TABLE idm_seo__seo_data DROP FOREIGN KEY FK_5C73ADFFC63E6FFF');
        $this->addSql('ALTER TABLE pfc_forum DROP FOREIGN KEY FK_4A1DBCDF55F9F1F');
        $this->addSql('ALTER TABLE pfc_forum DROP FOREIGN KEY FK_4A1DBCD97E3DD86');
        $this->addSql('ALTER TABLE pfc_forum DROP FOREIGN KEY FK_4A1DBCDA977936C');
        $this->addSql('ALTER TABLE pfc_forum DROP FOREIGN KEY FK_4A1DBCD727ACA70');
        $this->addSql('ALTER TABLE pfc_message DROP FOREIGN KEY FK_8B652422F675F31B');
        $this->addSql('ALTER TABLE pfc_message DROP FOREIGN KEY FK_8B652422E2904019');
        $this->addSql('ALTER TABLE pfc_thread DROP FOREIGN KEY FK_31A1C6E6BA0E79C3');
        $this->addSql('ALTER TABLE pfc_thread DROP FOREIGN KEY FK_31A1C6E6F675F31B');
        $this->addSql('ALTER TABLE pfc_thread DROP FOREIGN KEY FK_31A1C6E629CCBAD0');
        $this->addSql('ALTER TABLE pfc_thread DROP FOREIGN KEY FK_31A1C6E63F32F684');
        $this->addSql('ALTER TABLE pfc_thread DROP FOREIGN KEY FK_31A1C6E697E3DD86');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE idm_seo__open_graph_data');
        $this->addSql('DROP TABLE idm_seo__seo_data');
        $this->addSql('DROP TABLE idm_seo__twitter_card_data');
        $this->addSql('DROP TABLE pfc_forum');
        $this->addSql('DROP TABLE pfc_message');
        $this->addSql('DROP TABLE pfc_thread');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
