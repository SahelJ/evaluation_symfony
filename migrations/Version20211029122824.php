<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029122824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprietaire ADD restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD CONSTRAINT FK_69E399D6B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D6B1E7706E ON proprietaire (restaurant_id)');
        $this->addSql('ALTER TABLE restaurant ADD ville_id INT DEFAULT NULL, ADD proprietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FA73F0036 ON restaurant (ville_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EB95123F76C50E4A ON restaurant (proprietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprietaire DROP FOREIGN KEY FK_69E399D6B1E7706E');
        $this->addSql('DROP INDEX UNIQ_69E399D6B1E7706E ON proprietaire');
        $this->addSql('ALTER TABLE proprietaire DROP restaurant_id');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FA73F0036');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F76C50E4A');
        $this->addSql('DROP INDEX IDX_EB95123FA73F0036 ON restaurant');
        $this->addSql('DROP INDEX UNIQ_EB95123F76C50E4A ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP ville_id, DROP proprietaire_id');
    }
}
