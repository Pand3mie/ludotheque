<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191018085513 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, editeur_id INT DEFAULT NULL, style_id INT DEFAULT NULL, images_id INT DEFAULT NULL, video_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, annee DATE DEFAULT NULL, age_min INT DEFAULT NULL, age_max INT DEFAULT NULL, nbre_joueur INT DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, descritptif LONGTEXT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, duree_min INT DEFAULT NULL, duree_max INT DEFAULT NULL, INDEX IDX_3755B50D60BB6FE6 (auteur_id), INDEX IDX_3755B50D3375BD21 (editeur_id), INDEX IDX_3755B50DBACD6074 (style_id), INDEX IDX_3755B50DD44F05E5 (images_id), INDEX IDX_3755B50D29C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, descriptif LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D3375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DBACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50DD44F05E5 FOREIGN KEY (images_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D60BB6FE6');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D3375BD21');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DD44F05E5');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50DBACD6074');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D29C1004E');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE video');
    }
}
