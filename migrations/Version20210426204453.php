<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210426204453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aide (id INT NOT NULL, sujet VARCHAR(100) NOT NULL, utilisateur_id INT NOT NULL, probleme VARCHAR(100) NOT NULL, mail VARCHAR(100) NOT NULL, PRIMARY KEY(id, sujet)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aidecom (id INT AUTO_INCREMENT NOT NULL, commaintre VARCHAR(500) NOT NULL, id_sujet INT NOT NULL, INDEX id_sujet (id_sujet), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, formateur_id INT NOT NULL, apprenant_id INT NOT NULL, note INT NOT NULL, INDEX apprenant_id (apprenant_id), INDEX formateur_id (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id_catégorie INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id_catégorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoriee (ID INT AUTO_INCREMENT NOT NULL, Numero INT NOT NULL, lien VARCHAR(1024) NOT NULL, description VARCHAR(1024) NOT NULL, titre VARCHAR(1024) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(1024) DEFAULT NULL, fichier VARCHAR(1024) DEFAULT NULL, formation_id INT DEFAULT NULL, Description_cat VARCHAR(255) DEFAULT NULL, categorie_id INT DEFAULT NULL, favoris TINYINT(1) DEFAULT NULL, INDEX IDX_FDCA8C9CBCF5E72D (categorie_id), INDEX id_formation (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examenquestion (id INT AUTO_INCREMENT NOT NULL, idExamen INT DEFAULT NULL, idQuestion INT DEFAULT NULL, INDEX idQuestion (idQuestion), INDEX idExamen (idExamen), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(11) NOT NULL, prix VARCHAR(255) NOT NULL, description VARCHAR(1024) NOT NULL, UNIQUE INDEX titre (titre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, formation_id INT NOT NULL, date_inscrit DATE NOT NULL, INDEX id_formation (formation_id), INDEX id_apprenant (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listereponse (id INT AUTO_INCREMENT NOT NULL, idUser INT NOT NULL, idReponse INT DEFAULT NULL, idQuestion INT DEFAULT NULL, INDEX idReponse (idReponse), INDEX idQuestion (idQuestion), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, idUser INT NOT NULL, score INT NOT NULL, idExamen INT DEFAULT NULL, INDEX idExamen (idExamen), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, question VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, reponse VARCHAR(255) NOT NULL, vrai VARCHAR(255) NOT NULL, idQuestion INT DEFAULT NULL, INDEX idQuestion (idQuestion), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (ID_seance INT AUTO_INCREMENT NOT NULL, ID_formation INT NOT NULL, lien VARCHAR(1024) NOT NULL, description VARCHAR(1024) NOT NULL, Date_seance VARCHAR(255) NOT NULL, INDEX id_formation (ID_formation), PRIMARY KEY(ID_seance)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, formation VARCHAR(255) NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(1024) NOT NULL, password VARCHAR(1024) NOT NULL, role VARCHAR(20) NOT NULL, nom VARCHAR(20) DEFAULT NULL, prenom VARCHAR(20) DEFAULT NULL, telephone VARCHAR(110) DEFAULT NULL, adresse VARCHAR(200) DEFAULT NULL, date_naissance DATE DEFAULT NULL, enable TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7F4F0FB535 FOREIGN KEY (idReponse) REFERENCES reponse (id)');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7FE5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17325D2776');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14325D2776');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17E5546315');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7FE5546315');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7E5546315');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7F4F0FB535');
        $this->addSql('DROP TABLE aide');
        $this->addSql('DROP TABLE aidecom');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categoriee');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE examenquestion');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE listereponse');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateur');
    }
}
