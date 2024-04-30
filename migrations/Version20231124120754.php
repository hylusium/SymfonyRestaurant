<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124120754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_restaurant_id INT NOT NULL, id_client_id INT NOT NULL, commentaire VARCHAR(500) NOT NULL, note INT NOT NULL, UNIQUE INDEX UNIQ_8F91ABF0FCFA10B (id_restaurant_id), UNIQUE INDEX UNIQ_8F91ABF099DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FCFA10B FOREIGN KEY (id_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF099DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FCFA10B');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF099DED506');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE client');
    }
}
