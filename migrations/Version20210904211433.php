<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210904211433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur CHANGE nom nom VARCHAR(50) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE last_connection last_connection DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE forming_structure CHANGE fs_email fs_email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE green_area CHANGE ga_details ga_details VARCHAR(255) DEFAULT NULL, CHANGE ga_photo ga_photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE member ADD qrcode VARCHAR(255) NOT NULL, CHANGE mb_email mb_email VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE structure CHANGE st_website st_website VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription CHANGE sb_montant sb_montant INT DEFAULT NULL, CHANGE sb_start sb_start DATETIME DEFAULT NULL, CHANGE sb_end sb_end DATETIME DEFAULT NULL, CHANGE sb_created_at sb_created_at DATETIME DEFAULT NULL, CHANGE sb_is_valid sb_is_valid TINYINT(1) DEFAULT NULL, CHANGE sb_method sb_method VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE last_connexion last_connexion DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur CHANGE nom nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_connection last_connection DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE forming_structure CHANGE fs_email fs_email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE green_area CHANGE ga_details ga_details VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE ga_photo ga_photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE member DROP qrcode, CHANGE mb_email mb_email VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE structure CHANGE st_website st_website VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE subscription CHANGE sb_montant sb_montant INT DEFAULT NULL, CHANGE sb_start sb_start DATETIME DEFAULT \'NULL\', CHANGE sb_end sb_end DATETIME DEFAULT \'NULL\', CHANGE sb_created_at sb_created_at DATETIME DEFAULT \'NULL\', CHANGE sb_is_valid sb_is_valid TINYINT(1) DEFAULT \'NULL\', CHANGE sb_method sb_method VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE last_connexion last_connexion DATETIME DEFAULT \'NULL\'');
    }
}
