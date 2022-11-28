<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128082216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, nom_statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_users (statut_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_267ECA97F6203804 (statut_id), INDEX IDX_267ECA9767B3B43D (users_id), PRIMARY KEY(statut_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statut_users ADD CONSTRAINT FK_267ECA97F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statut_users ADD CONSTRAINT FK_267ECA9767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statut_users DROP FOREIGN KEY FK_267ECA97F6203804');
        $this->addSql('ALTER TABLE statut_users DROP FOREIGN KEY FK_267ECA9767B3B43D');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE statut_users');
    }
}
