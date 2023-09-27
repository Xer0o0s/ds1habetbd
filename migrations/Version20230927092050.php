<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927092050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borne (id INT AUTO_INCREMENT NOT NULL, date_mise_en_service DATE NOT NULL, date_derniere_revision DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, date_contrat DATE NOT NULL, no_immatriculation INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele_batterie (id INT AUTO_INCREMENT NOT NULL, capacité LONGTEXT NOT NULL, fabricant LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_rechargement (id INT AUTO_INCREMENT NOT NULL, num_operation INT NOT NULL, date_heure_debut DATE NOT NULL, date_heure_fin DATE NOT NULL, nb_kw_heures INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, latitude INT NOT NULL, longitude INT NOT NULL, adresse_rue LONGTEXT NOT NULL, adresse_ville LONGTEXT NOT NULL, code_postal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, code_type_charge LONGTEXT NOT NULL, libelle_type_charge LONGTEXT NOT NULL, puissance_type_charge LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usager (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, ville VARCHAR(255) NOT NULL, code_postal LONGTEXT NOT NULL, tel_fixe INT NOT NULL, tel_mobile INT NOT NULL, mail LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE borne');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE modele_batterie');
        $this->addSql('DROP TABLE operation_rechargement');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE type_charge');
        $this->addSql('DROP TABLE usager');
    }
}
