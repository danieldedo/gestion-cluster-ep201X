<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230923112656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arrondissements (id INT AUTO_INCREMENT NOT NULL, commune_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_873DF2C6131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clusters (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, village_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_EC895D3F180AA129 (filiere_id), INDEX IDX_EC895D3F5E0D5582 (village_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communes (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_5C5EE2A5CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departements (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filieres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villages (id INT AUTO_INCREMENT NOT NULL, arrondissement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2D43E982407DBC11 (arrondissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrondissements ADD CONSTRAINT FK_873DF2C6131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE clusters ADD CONSTRAINT FK_EC895D3F180AA129 FOREIGN KEY (filiere_id) REFERENCES filieres (id)');
        $this->addSql('ALTER TABLE clusters ADD CONSTRAINT FK_EC895D3F5E0D5582 FOREIGN KEY (village_id) REFERENCES villages (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A5CCF9E01E FOREIGN KEY (departement_id) REFERENCES departements (id)');
        $this->addSql('ALTER TABLE villages ADD CONSTRAINT FK_2D43E982407DBC11 FOREIGN KEY (arrondissement_id) REFERENCES arrondissements (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arrondissements DROP FOREIGN KEY FK_873DF2C6131A4F72');
        $this->addSql('ALTER TABLE clusters DROP FOREIGN KEY FK_EC895D3F180AA129');
        $this->addSql('ALTER TABLE clusters DROP FOREIGN KEY FK_EC895D3F5E0D5582');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A5CCF9E01E');
        $this->addSql('ALTER TABLE villages DROP FOREIGN KEY FK_2D43E982407DBC11');
        $this->addSql('DROP TABLE arrondissements');
        $this->addSql('DROP TABLE clusters');
        $this->addSql('DROP TABLE communes');
        $this->addSql('DROP TABLE departements');
        $this->addSql('DROP TABLE filieres');
        $this->addSql('DROP TABLE villages');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
