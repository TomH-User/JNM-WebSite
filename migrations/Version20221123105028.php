<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221123105028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activites (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activites_users (activites_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_EFC4DEF95B8C31B7 (activites_id), INDEX IDX_EFC4DEF967B3B43D (users_id), PRIMARY KEY(activites_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logement (id INT AUTO_INCREMENT NOT NULL, nom_logement VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, nbplaces INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, id_offre_id INT DEFAULT NULL, don VARCHAR(255) NOT NULL, INDEX IDX_AF86866F1C13BCCF (id_offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaires (id INT AUTO_INCREMENT NOT NULL, nomsociete VARCHAR(255) NOT NULL, adressepostale VARCHAR(255) DEFAULT NULL, tel_partenaire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, offre VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, ref_transport_id INT DEFAULT NULL, ref_logement_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, num_tel VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, miage VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, etat_logement SMALLINT NOT NULL, etat_transport SMALLINT NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E97DFD07CC (ref_transport_id), INDEX IDX_1483A5E9A2A201D9 (ref_logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, ref_utilisateur_id INT NOT NULL, lien VARCHAR(255) NOT NULL, nb_votes INT NOT NULL, UNIQUE INDEX UNIQ_7CC7DA2CB61ED040 (ref_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activites_users ADD CONSTRAINT FK_EFC4DEF95B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites_users ADD CONSTRAINT FK_EFC4DEF967B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F1C13BCCF FOREIGN KEY (id_offre_id) REFERENCES partenaires (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E97DFD07CC FOREIGN KEY (ref_transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A2A201D9 FOREIGN KEY (ref_logement_id) REFERENCES logement (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CB61ED040 FOREIGN KEY (ref_utilisateur_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites_users DROP FOREIGN KEY FK_EFC4DEF95B8C31B7');
        $this->addSql('ALTER TABLE activites_users DROP FOREIGN KEY FK_EFC4DEF967B3B43D');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F1C13BCCF');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E97DFD07CC');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A2A201D9');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CB61ED040');
        $this->addSql('DROP TABLE activites');
        $this->addSql('DROP TABLE activites_users');
        $this->addSql('DROP TABLE logement');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE partenaires');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
