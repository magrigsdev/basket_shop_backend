<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250101133322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_produit CHANGE produit_id produit_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE image_produit ADD CONSTRAINT FK_BCB5BBFB4FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCB5BBFB4FD8F9C3 ON image_produit (produit_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_produit DROP FOREIGN KEY FK_BCB5BBFB4FD8F9C3');
        $this->addSql('DROP INDEX UNIQ_BCB5BBFB4FD8F9C3 ON image_produit');
        $this->addSql('ALTER TABLE image_produit CHANGE produit_id_id produit_id INT NOT NULL');
    }
}
