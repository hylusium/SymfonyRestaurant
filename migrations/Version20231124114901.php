<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124114901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE moderateur (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, id_restaurateur_id INT NOT NULL, nom VARCHAR(100) NOT NULL, adresse VARCHAR(200) NOT NULL, note INT NOT NULL, UNIQUE INDEX UNIQ_EB95123FD26FDDDE (id_restaurateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FD26FDDDE FOREIGN KEY (id_restaurateur_id) REFERENCES restaurateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FD26FDDDE');
        $this->addSql('DROP TABLE moderateur');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE restaurateur');
    }
}
