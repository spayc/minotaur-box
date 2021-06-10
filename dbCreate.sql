
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE IF NOT EXISTS `labyrinth`;

CREATE TABLE IF NOT EXISTS `labyrinth`.`people` (
 `idPeople` INT NOT NULL AUTO_INCREMENT,
 `namePeople` VARCHAR(255) NOT NULL,
 `passwordPeople` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idPeople`));

CREATE TABLE IF NOT EXISTS `labyrinth`.`creatures` (
 `idCreature` INT NOT NULL AUTO_INCREMENT,
 `nameCreature` VARCHAR(255) NOT NULL,
 `passwordCreature` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idCreature`));


 CREATE TABLE IF NOT EXISTS `labyrinth`.`lunch` (
 `idFood` INT NOT NULL AUTO_INCREMENT,
 `nameFood` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idFood`));

CREATE TABLE IF NOT EXISTS `labyrinth`.`login` (
 `idLogin` INT NOT NULL AUTO_INCREMENT,
 `nameLogin` VARCHAR(255) NOT NULL,
 `passwordLogin` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idLogin`));


INSERT INTO labyrinth.people (idPeople, namePeople, passwordPeople) VALUES
(1, 'Eurycliedes', 'testpassword1'),
(2, 'Menekrates', 'testpassword2'),
(3, 'Philostratos', 'testpassword3');

INSERT INTO labyrinth.creatures (idCreature, nameCreature, passwordCreature) VALUES
(1, 'Cerberos', 'testpassword4'),
(2, 'Pegasus', 'testpassword5'),
(3, 'Chiron', 'testpassword6');

INSERT INTO labyrinth.login (idLogin, nameLogin, passwordLogin) VALUES
(1, 'Minotau', 'test'),
(2, 'Daddalus', 'testpassword5'),
(3, 'test', 'test');


INSERT INTO labyrinth.lunch (idFood, nameFood) VALUES
(1, 'Baklava'),
(2, 'Olives'),
(3, 'Cheese');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
