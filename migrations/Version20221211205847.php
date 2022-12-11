<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221211205847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, entrepreneur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, lieu VARCHAR(255) NOT NULL, INDEX IDX_B26681E283063EA (entrepreneur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, entrepreneur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, INDEX IDX_404021BF283063EA (entrepreneur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, entrepreneur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_de_creation DATETIME NOT NULL, date_expiration DATETIME NOT NULL, INDEX IDX_5A8A6C8D283063EA (entrepreneur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, prenom_id INT DEFAULT NULL, username_id INT DEFAULT NULL, password_id INT DEFAULT NULL, email_id INT DEFAULT NULL, age_id INT DEFAULT NULL, phone INT NOT NULL, UNIQUE INDEX UNIQ_E6D6B297C8121CE9 (nom_id), UNIQUE INDEX UNIQ_E6D6B29758819F9E (prenom_id), UNIQUE INDEX UNIQ_E6D6B297ED766068 (username_id), UNIQUE INDEX UNIQ_E6D6B2973E4A79C1 (password_id), UNIQUE INDEX UNIQ_E6D6B297A832C1C9 (email_id), UNIQUE INDEX UNIQ_E6D6B297CC80CD12 (age_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, date_de_creation DATETIME NOT NULL, INDEX IDX_CE606404C8121CE9 (nom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, formation_id INT DEFAULT NULL, post_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, age INT NOT NULL, INDEX IDX_1483A5E9FD02F13 (evenement_id), INDEX IDX_1483A5E95200282E (formation_id), INDEX IDX_1483A5E94B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E283063EA FOREIGN KEY (entrepreneur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF283063EA FOREIGN KEY (entrepreneur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D283063EA FOREIGN KEY (entrepreneur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297C8121CE9 FOREIGN KEY (nom_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29758819F9E FOREIGN KEY (prenom_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297ED766068 FOREIGN KEY (username_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2973E4A79C1 FOREIGN KEY (password_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297A832C1C9 FOREIGN KEY (email_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B297CC80CD12 FOREIGN KEY (age_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C8121CE9 FOREIGN KEY (nom_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E95200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E94B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E283063EA');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF283063EA');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D283063EA');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297C8121CE9');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29758819F9E');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297ED766068');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2973E4A79C1');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297A832C1C9');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B297CC80CD12');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C8121CE9');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9FD02F13');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E95200282E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E94B89032C');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
