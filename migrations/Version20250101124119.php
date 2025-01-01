<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250101124119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD taille_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2740126DC8 FOREIGN KEY (taille_id_id) REFERENCES taille (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2740126DC8 ON produit (taille_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2740126DC8');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP INDEX IDX_29A5EC2740126DC8 ON produit');
        $this->addSql('ALTER TABLE produit DROP taille_id_id');
    }
}
