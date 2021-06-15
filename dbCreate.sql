SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE IF NOT EXISTS `labyrinth`;

CREATE TABLE IF NOT EXISTS `labyrinth`.`people` (
 `idPeople` INT NOT NULL AUTO_INCREMENT,
 `namePeople` VARCHAR(255) NOT NULL,
 `passwordPeople` VARCHAR(255) NOT NULL,
 `permissionPeople` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idPeople`));

CREATE TABLE IF NOT EXISTS `labyrinth`.`creatures` (
 `idCreature` INT NOT NULL AUTO_INCREMENT,
 `nameCreature` VARCHAR(255) NOT NULL,
 `passwordCreature` VARCHAR(255) NOT NULL,
 `permissionCreature` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idCreature`));


-- -----------------------------------------------------
-- Table `labyrinth`.`creatures`
-- -----------------------------------------------------

INSERT INTO labyrinth.people (idPeople, namePeople, passwordPeople, permissionPeople) VALUES
(1, 'Eurycliedes', MD5('greeklover'), 'user'),
(2, 'Menekrates', MD5('greeksalad'), 'user'),
(3, 'Philostratos', MD5('nickthegreek'), 'user'),
(4, 'Daedalus', MD5('g2e55kh4ck5r'), 'user'),
(5, 'M!n0taur', MD5('aminotauro'), 'admin');

INSERT INTO labyrinth.creatures (idCreature, nameCreature, passwordCreature, permissionCreature) VALUES
(1, 'Cerberos', MD5('soviet911210036173'), 'user'),
(2, 'Pegasus', MD5('pizzaeater_1'), 'user'),
(3, 'Chiron', MD5('hiphophugosoviet18'), 'user'),
(4, 'Centaurus', MD5('elcentauro'), 'user');


-- -----------------------------------------------------
-- USERS AND PRIVS
-- -----------------------------------------------------
-- CREATE USER 'daedalus'@'localhost' IDENTIFIED BY 'password';
-- GRANT SELECT ON labyrinth.table_name TO 'daedalus'@'localhost';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
