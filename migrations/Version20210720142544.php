<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720142544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la base de données';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, subject LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, company_name VARCHAR(255) DEFAULT NULL, phone_number INT DEFAULT NULL, INDEX IDX_4C62E638A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE download (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ebook_id INT DEFAULT NULL, downloaded_at DATETIME NOT NULL, INDEX IDX_781A8270A76ED395 (user_id), INDEX IDX_781A827076E71D49 (ebook_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ebook (id INT AUTO_INCREMENT NOT NULL, expertise_id INT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, release_date DATE NOT NULL, editor_name VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, is_validated TINYINT(1) DEFAULT NULL, illustration VARCHAR(255) DEFAULT NULL, document_ebook VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_7D51730D9D5B92F9 (expertise_id), INDEX IDX_7D51730DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expertise (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format_service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, expertise_id INT NOT NULL, user_id INT NOT NULL, type_service_id INT NOT NULL, format_service_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, structure_name VARCHAR(255) DEFAULT NULL, training_centre_number VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, places_number INT NOT NULL, price INT NOT NULL, town VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, address LONGTEXT DEFAULT NULL, trainer VARCHAR(255) DEFAULT NULL, url LONGTEXT DEFAULT NULL, is_validated TINYINT(1) DEFAULT NULL, INDEX IDX_E19D9AD29D5B92F9 (expertise_id), INDEX IDX_E19D9AD2A76ED395 (user_id), INDEX IDX_E19D9AD2F05F7FC3 (type_service_id), INDEX IDX_E19D9AD22ED13E6B (format_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, provider_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, phone INT DEFAULT NULL, company_name VARCHAR(255) DEFAULT NULL, siret_number VARCHAR(50) DEFAULT NULL, is_validated TINYINT(1) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, adress LONGTEXT DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, banner VARCHAR(255) DEFAULT NULL, profile_picture VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, rgpd_accepted TINYINT(1) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649A53A8AA (provider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_expertise (user_id INT NOT NULL, expertise_id INT NOT NULL, INDEX IDX_227A526FA76ED395 (user_id), INDEX IDX_227A526F9D5B92F9 (expertise_id), PRIMARY KEY(user_id, expertise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A8270A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE download ADD CONSTRAINT FK_781A827076E71D49 FOREIGN KEY (ebook_id) REFERENCES ebook (id)');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT FK_7D51730D9D5B92F9 FOREIGN KEY (expertise_id) REFERENCES expertise (id)');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT FK_7D51730DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD29D5B92F9 FOREIGN KEY (expertise_id) REFERENCES expertise (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2F05F7FC3 FOREIGN KEY (type_service_id) REFERENCES type_service (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD22ED13E6B FOREIGN KEY (format_service_id) REFERENCES format_service (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE user_expertise ADD CONSTRAINT FK_227A526FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_expertise ADD CONSTRAINT FK_227A526F9D5B92F9 FOREIGN KEY (expertise_id) REFERENCES expertise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE download DROP FOREIGN KEY FK_781A827076E71D49');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY FK_7D51730D9D5B92F9');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD29D5B92F9');
        $this->addSql('ALTER TABLE user_expertise DROP FOREIGN KEY FK_227A526F9D5B92F9');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD22ED13E6B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A53A8AA');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2F05F7FC3');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638A76ED395');
        $this->addSql('ALTER TABLE download DROP FOREIGN KEY FK_781A8270A76ED395');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY FK_7D51730DA76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('ALTER TABLE user_expertise DROP FOREIGN KEY FK_227A526FA76ED395');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE download');
        $this->addSql('DROP TABLE ebook');
        $this->addSql('DROP TABLE expertise');
        $this->addSql('DROP TABLE format_service');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE type_service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_expertise');
    }
}
