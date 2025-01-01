<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250101125740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2740126DC8');
        $this->addSql('DROP INDEX IDX_29A5EC2740126DC8 ON produit');
        $this->addSql('ALTER TABLE produit CHANGE taille_id_id taille_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_29A5EC27FF25611A ON produit (taille_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FF25611A');
        $this->addSql('DROP INDEX IDX_29A5EC27FF25611A ON produit');
        $this->addSql('ALTER TABLE produit CHANGE taille_id taille_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2740126DC8 FOREIGN KEY (taille_id_id) REFERENCES taille (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2740126DC8 ON produit (taille_id_id)');
    }
}
