<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210829182918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, last_connection DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, login VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forming_structure (id INT AUTO_INCREMENT NOT NULL, fs_nom VARCHAR(100) NOT NULL, fs_type VARCHAR(100) NOT NULL, fs_adresse VARCHAR(255) NOT NULL, fs_email VARCHAR(255) DEFAULT NULL, fs_phone VARCHAR(255) NOT NULL, fs_representing_name VARCHAR(100) NOT NULL, fs_created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE green_area (id INT AUTO_INCREMENT NOT NULL, forming_structure_id INT NOT NULL, ga_lat VARCHAR(100) NOT NULL, ga_long VARCHAR(100) NOT NULL, ga_surface VARCHAR(100) NOT NULL, ga_details VARCHAR(255) DEFAULT NULL, ga_photo VARCHAR(255) DEFAULT NULL, ga_started_at DATETIME NOT NULL, ga_finished_at DATETIME NOT NULL, INDEX IDX_310C85F5F37A2EE6 (forming_structure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, mb_nom VARCHAR(50) NOT NULL, mb_prenom VARCHAR(50) NOT NULL, mb_gender VARCHAR(50) NOT NULL, mb_email VARCHAR(50) DEFAULT NULL, mb_phone VARCHAR(50) NOT NULL, mb_adresse VARCHAR(255) NOT NULL, mb_date_insc DATETIME NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_green_area (member_id INT NOT NULL, green_area_id INT NOT NULL, INDEX IDX_DA429B1C7597D3FE (member_id), INDEX IDX_DA429B1C9A0C541F (green_area_id), PRIMARY KEY(member_id, green_area_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partnership (id INT AUTO_INCREMENT NOT NULL, ps_shop_name VARCHAR(100) NOT NULL, ps_shop_addr VARCHAR(255) NOT NULL, ps_shop_category VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure (id INT NOT NULL, st_secteur VARCHAR(50) NOT NULL, st_website VARCHAR(100) DEFAULT NULL, st_country_origi VARCHAR(50) NOT NULL, representing VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, sb_montant INT DEFAULT NULL, sb_start DATETIME DEFAULT NULL, sb_end DATETIME DEFAULT NULL, sb_created_at DATETIME DEFAULT NULL, sb_is_valid TINYINT(1) DEFAULT NULL, sb_method VARCHAR(50) DEFAULT NULL, INDEX IDX_A3C664D37597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_partnership (subscription_id INT NOT NULL, partnership_id INT NOT NULL, INDEX IDX_BB03A6399A1887DC (subscription_id), INDEX IDX_BB03A6396AE7F85 (partnership_id), PRIMARY KEY(subscription_id, partnership_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE volunteer (id INT NOT NULL, vt_mobility TINYINT(1) NOT NULL, vt_skills VARCHAR(255) NOT NULL, vt_years_exp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE green_area ADD CONSTRAINT FK_310C85F5F37A2EE6 FOREIGN KEY (forming_structure_id) REFERENCES forming_structure (id)');
        $this->addSql('ALTER TABLE member_green_area ADD CONSTRAINT FK_DA429B1C7597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member_green_area ADD CONSTRAINT FK_DA429B1C9A0C541F FOREIGN KEY (green_area_id) REFERENCES green_area (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE structure ADD CONSTRAINT FK_6F0137EABF396750 FOREIGN KEY (id) REFERENCES member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D37597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE subscription_partnership ADD CONSTRAINT FK_BB03A6399A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription_partnership ADD CONSTRAINT FK_BB03A6396AE7F85 FOREIGN KEY (partnership_id) REFERENCES partnership (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE volunteer ADD CONSTRAINT FK_5140DEDBBF396750 FOREIGN KEY (id) REFERENCES member (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE green_area DROP FOREIGN KEY FK_310C85F5F37A2EE6');
        $this->addSql('ALTER TABLE member_green_area DROP FOREIGN KEY FK_DA429B1C9A0C541F');
        $this->addSql('ALTER TABLE member_green_area DROP FOREIGN KEY FK_DA429B1C7597D3FE');
        $this->addSql('ALTER TABLE structure DROP FOREIGN KEY FK_6F0137EABF396750');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D37597D3FE');
        $this->addSql('ALTER TABLE volunteer DROP FOREIGN KEY FK_5140DEDBBF396750');
        $this->addSql('ALTER TABLE subscription_partnership DROP FOREIGN KEY FK_BB03A6396AE7F85');
        $this->addSql('ALTER TABLE subscription_partnership DROP FOREIGN KEY FK_BB03A6399A1887DC');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE forming_structure');
        $this->addSql('DROP TABLE green_area');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_green_area');
        $this->addSql('DROP TABLE partnership');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_partnership');
        $this->addSql('DROP TABLE volunteer');
    }
}
