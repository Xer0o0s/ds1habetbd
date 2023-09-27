<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927093742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD id_modele_batterie_id INT NOT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993F9A1A7D FOREIGN KEY (id_modele_batterie_id) REFERENCES modele_batterie (id)');
        $this->addSql('CREATE INDEX IDX_60349993F9A1A7D ON contrat (id_modele_batterie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993F9A1A7D');
        $this->addSql('DROP INDEX IDX_60349993F9A1A7D ON contrat');
        $this->addSql('ALTER TABLE contrat DROP id_modele_batterie_id');
    }
}
