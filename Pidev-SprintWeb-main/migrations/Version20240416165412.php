<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416165412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabinet DROP FOREIGN KEY id_medecinFK');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D81DAF313');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFE6E88D7');
        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY idDonator_FK');
        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A0B2691CAE');
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY ingredients_ibfk_1');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY fk_livreur_user');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY menu_ibfk_1');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY id_cabinetFK');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY recette_ibfk_1');
        $this->addSql('DROP TABLE cabinet');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE donation');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE recette');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY fk_tableIdreservation');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY fk_userIdreservation');
        $this->addSql('ALTER TABLE reservation CHANGE reservationId reservationid VARCHAR(255) NOT NULL, CHANGE dateTime datetime DATETIME NOT NULL, CHANGE tableId tableid VARCHAR(255) DEFAULT NULL, CHANGE numberOfPersons numberofpersons VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX tableid ON reservation');
        $this->addSql('CREATE INDEX IDX_42C84955641DE74B ON reservation (tableid)');
        $this->addSql('DROP INDEX iduser ON reservation');
        $this->addSql('CREATE INDEX IDX_42C84955F132696E ON reservation (userid)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_tableIdreservation FOREIGN KEY (tableId) REFERENCES restauranttable (tableId)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_userIdreservation FOREIGN KEY (userId) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY fk_userIdrestaurant');
        $this->addSql('ALTER TABLE restaurant CHANGE restaurantId restaurantid VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(150) NOT NULL, CHANGE address address VARCHAR(150) NOT NULL, CHANGE description description VARCHAR(150) NOT NULL, CHANGE imagePath imagepath VARCHAR(150) NOT NULL');
        $this->addSql('DROP INDEX iduser ON restaurant');
        $this->addSql('CREATE INDEX IDX_EB95123FF132696E ON restaurant (userid)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT fk_userIdrestaurant FOREIGN KEY (userId) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE restauranttable DROP FOREIGN KEY fk_restaurantIdtable');
        $this->addSql('ALTER TABLE restauranttable CHANGE tableId tableid VARCHAR(255) NOT NULL, CHANGE restaurantId restaurantid VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX restaurantid ON restauranttable');
        $this->addSql('CREATE INDEX IDX_691A6F39145ED7B1 ON restauranttable (restaurantid)');
        $this->addSql('ALTER TABLE restauranttable ADD CONSTRAINT fk_restaurantIdtable FOREIGN KEY (restaurantId) REFERENCES restaurant (restaurantId)');
        $this->addSql('ALTER TABLE user CHANGE FirstName firstname VARCHAR(35) NOT NULL, CHANGE LastName lastname VARCHAR(35) NOT NULL, CHANGE Address address VARCHAR(20) NOT NULL, CHANGE Rating rating INT NOT NULL, CHANGE Password password VARCHAR(255) NOT NULL, CHANGE picture picture VARCHAR(300) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cabinet (id INT AUTO_INCREMENT NOT NULL, id_medecin INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, codePostal INT NOT NULL, adresseMail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_medecinFK (id_medecin), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE campaign (idCamp INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, goal INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, associationName VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, campaignType VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image BLOB DEFAULT NULL, current DOUBLE PRECISION NOT NULL, PRIMARY KEY(idCamp)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commande (idCommande INT AUTO_INCREMENT NOT NULL, dateCommande DATETIME NOT NULL, adresseLivraison VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, montantTotalCommande DOUBLE PRECISION NOT NULL, idUser INT DEFAULT NULL, plats VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, restaurantId INT DEFAULT NULL, INDEX frK_idUser (idUser), INDEX restaurantId (restaurantId), PRIMARY KEY(idCommande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE donation (idDon INT AUTO_INCREMENT NOT NULL, idCamp INT DEFAULT NULL, valeurDon INT NOT NULL, idDonator INT DEFAULT NULL, history DATE DEFAULT NULL, INDEX idCamp (idCamp), INDEX idDonator_FK (idDonator), PRIMARY KEY(idDon)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ingredients (idIng INT AUTO_INCREMENT NOT NULL, nameIng VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, amount VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, idRec INT DEFAULT NULL, INDEX idRec (idRec), PRIMARY KEY(idIng)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livraison (idLivraison INT AUTO_INCREMENT NOT NULL, idLivreur INT DEFAULT NULL, idCommande INT NOT NULL, statut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX frk_idLivreur (idLivreur), INDEX fk_keyIdCommande (idCommande), PRIMARY KEY(idLivraison)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu (idP INT AUTO_INCREMENT NOT NULL, nameP VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, priceP DOUBLE PRECISION NOT NULL, categoryP VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ingredientsP VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, restaurantId INT DEFAULT NULL, imageP VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX restaurantId (restaurantId), PRIMARY KEY(idP)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, id_cabinet INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, numTel INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dateRdv DATE NOT NULL, INDEX id_cabinetFK (id_cabinet), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE recette (idRec INT AUTO_INCREMENT NOT NULL, nomRec VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, categoryR VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, difficulty VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, serves INT NOT NULL, prep VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, rating INT NOT NULL, idUser INT DEFAULT NULL, imageRec VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX idUser (idUser), PRIMARY KEY(idRec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cabinet ADD CONSTRAINT id_medecinFK FOREIGN KEY (id_medecin) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D81DAF313 FOREIGN KEY (restaurantId) REFERENCES restaurant (restaurantId)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFE6E88D7 FOREIGN KEY (idUser) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT idDonator_FK FOREIGN KEY (idDonator) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A0B2691CAE FOREIGN KEY (idCamp) REFERENCES campaign (idCamp)');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT ingredients_ibfk_1 FOREIGN KEY (idRec) REFERENCES recette (idRec)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT fk_livreur_user FOREIGN KEY (idLivreur) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT menu_ibfk_1 FOREIGN KEY (restaurantId) REFERENCES restaurant (restaurantId)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT id_cabinetFK FOREIGN KEY (id_cabinet) REFERENCES cabinet (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT recette_ibfk_1 FOREIGN KEY (idUser) REFERENCES user (idUser)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955641DE74B');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F132696E');
        $this->addSql('ALTER TABLE reservation CHANGE reservationid reservationId INT AUTO_INCREMENT NOT NULL, CHANGE tableid tableId INT DEFAULT NULL, CHANGE datetime dateTime DATETIME DEFAULT NULL, CHANGE numberofpersons numberOfPersons INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_42c84955641de74b ON reservation');
        $this->addSql('CREATE INDEX tableId ON reservation (tableId)');
        $this->addSql('DROP INDEX idx_42c84955f132696e ON reservation');
        $this->addSql('CREATE INDEX idUser ON reservation (userId)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955641DE74B FOREIGN KEY (tableid) REFERENCES restauranttable (tableid)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F132696E FOREIGN KEY (userid) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FF132696E');
        $this->addSql('ALTER TABLE restaurant CHANGE restaurantid restaurantId INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE imagepath imagePath VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX idx_eb95123ff132696e ON restaurant');
        $this->addSql('CREATE INDEX idUser ON restaurant (userId)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FF132696E FOREIGN KEY (userid) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE restauranttable DROP FOREIGN KEY FK_691A6F39145ED7B1');
        $this->addSql('ALTER TABLE restauranttable CHANGE tableid tableId INT AUTO_INCREMENT NOT NULL, CHANGE restaurantid restaurantId INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_691a6f39145ed7b1 ON restauranttable');
        $this->addSql('CREATE INDEX restaurantId ON restauranttable (restaurantId)');
        $this->addSql('ALTER TABLE restauranttable ADD CONSTRAINT FK_691A6F39145ED7B1 FOREIGN KEY (restaurantid) REFERENCES restaurant (restaurantid)');
        $this->addSql('ALTER TABLE user CHANGE firstname FirstName VARCHAR(20) NOT NULL, CHANGE lastname LastName VARCHAR(20) NOT NULL, CHANGE address Address VARCHAR(50) NOT NULL, CHANGE rating Rating DOUBLE PRECISION DEFAULT NULL, CHANGE password Password VARCHAR(40) NOT NULL, CHANGE picture picture VARCHAR(300) DEFAULT NULL');
    }
}
