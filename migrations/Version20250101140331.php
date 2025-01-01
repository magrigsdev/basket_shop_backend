<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250101140331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_produit DROP FOREIGN KEY FK_BCB5BBFB4FD8F9C3');
        $this->addSql('DROP INDEX UNIQ_BCB5BBFB4FD8F9C3 ON image_produit');
        $this->addSql('ALTER TABLE image_produit ADD libelle VARCHAR(255) DEFAULT NULL, DROP produit_id_id, CHANGE url url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD image_produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2763EA69CD FOREIGN KEY (image_produit_id) REFERENCES image_produit (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_29A5EC2763EA69CD ON produit (image_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_produit ADD produit_id_id INT NOT NULL, DROP libelle, CHANGE url url VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE image_produit ADD CONSTRAINT FK_BCB5BBFB4FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCB5BBFB4FD8F9C3 ON image_produit (produit_id_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2763EA69CD');
        $this->addSql('DROP INDEX IDX_29A5EC2763EA69CD ON produit');
        $this->addSql('ALTER TABLE produit DROP image_produit_id');
    }
}
