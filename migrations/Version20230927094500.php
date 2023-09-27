<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927094500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE supporter (id INT AUTO_INCREMENT NOT NULL, modele_batterie_id INT DEFAULT NULL, code_type_charge_id INT DEFAULT NULL, INDEX IDX_3F06E558CB8A8D2 (modele_batterie_id), INDEX IDX_3F06E55AAD7CFFE (code_type_charge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE supporter ADD CONSTRAINT FK_3F06E558CB8A8D2 FOREIGN KEY (modele_batterie_id) REFERENCES modele_batterie (id)');
        $this->addSql('ALTER TABLE supporter ADD CONSTRAINT FK_3F06E55AAD7CFFE FOREIGN KEY (code_type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE borne ADD code_type_charge_id INT DEFAULT NULL, ADD station_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE borne ADD CONSTRAINT FK_D7465BA5AAD7CFFE FOREIGN KEY (code_type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE borne ADD CONSTRAINT FK_D7465BA521BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_D7465BA5AAD7CFFE ON borne (code_type_charge_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D7465BA521BDB235 ON borne (station_id)');
        $this->addSql('ALTER TABLE operation_rechargement ADD contrat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation_rechargement ADD CONSTRAINT FK_AE04855C1823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_AE04855C1823061F ON operation_rechargement (contrat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supporter DROP FOREIGN KEY FK_3F06E558CB8A8D2');
        $this->addSql('ALTER TABLE supporter DROP FOREIGN KEY FK_3F06E55AAD7CFFE');
        $this->addSql('DROP TABLE supporter');
        $this->addSql('ALTER TABLE borne DROP FOREIGN KEY FK_D7465BA5AAD7CFFE');
        $this->addSql('ALTER TABLE borne DROP FOREIGN KEY FK_D7465BA521BDB235');
        $this->addSql('DROP INDEX IDX_D7465BA5AAD7CFFE ON borne');
        $this->addSql('DROP INDEX UNIQ_D7465BA521BDB235 ON borne');
        $this->addSql('ALTER TABLE borne DROP code_type_charge_id, DROP station_id');
        $this->addSql('ALTER TABLE operation_rechargement DROP FOREIGN KEY FK_AE04855C1823061F');
        $this->addSql('DROP INDEX IDX_AE04855C1823061F ON operation_rechargement');
        $this->addSql('ALTER TABLE operation_rechargement DROP contrat_id');
    }
}
