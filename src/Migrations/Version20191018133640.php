<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191018133640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, note INT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nationalite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, editeur_id INT DEFAULT NULL, image_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, video_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, annee INT DEFAULT NULL, nbre_joueur INT DEFAULT NULL, descriptif LONGTEXT DEFAULT NULL, duree_min INT DEFAULT NULL, duree_max INT DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, INDEX IDX_3755B50D3375BD21 (editeur_id), INDEX IDX_3755B50D3DA5256D (image_id), INDEX IDX_3755B50D4296D31F (genre_id), INDEX IDX_3755B50D29C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_auteur (jeux_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_4AB63566EC2AA9D2 (jeux_id), INDEX IDX_4AB6356660BB6FE6 (auteur_id), PRIMARY KEY(jeux_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeux_avis (jeux_id INT NOT NULL, avis_id INT NOT NULL, INDEX IDX_FAF8ED9DEC2AA9D2 (jeux_id), INDEX IDX_FAF8ED9D197E709F (avis_id), PRIMARY KEY(jeux_id, avis_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D3375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE jeux_auteur ADD CONSTRAINT FK_4AB63566EC2AA9D2 FOREIGN KEY (jeux_id) REFERENCES jeux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_auteur ADD CONSTRAINT FK_4AB6356660BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_avis ADD CONSTRAINT FK_FAF8ED9DEC2AA9D2 FOREIGN KEY (jeux_id) REFERENCES jeux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeux_avis ADD CONSTRAINT FK_FAF8ED9D197E709F FOREIGN KEY (avis_id) REFERENCES avis (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeux_auteur DROP FOREIGN KEY FK_4AB6356660BB6FE6');
        $this->addSql('ALTER TABLE jeux_avis DROP FOREIGN KEY FK_FAF8ED9D197E709F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D3375BD21');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D4296D31F');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D3DA5256D');
        $this->addSql('ALTER TABLE jeux_auteur DROP FOREIGN KEY FK_4AB63566EC2AA9D2');
        $this->addSql('ALTER TABLE jeux_avis DROP FOREIGN KEY FK_FAF8ED9DEC2AA9D2');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D29C1004E');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE jeux_auteur');
        $this->addSql('DROP TABLE jeux_avis');
        $this->addSql('DROP TABLE video');
    }
}
