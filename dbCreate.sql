SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE IF NOT EXISTS `labyrinth`;

-- -----------------------------------------------------
-- Table `labyrinth`.`people`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labyrinth`.`people` (
 `idPeople` INT NOT NULL AUTO_INCREMENT,
 `namePeople` VARCHAR(255) NOT NULL,
 `passwordPeople` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idPeople`));


-- -----------------------------------------------------
-- Table `labyrinth`.`creatures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `labyrinth`.`creatures` (
 `idCreature` INT NOT NULL AUTO_INCREMENT,
 `nameCreature` VARCHAR(255) NOT NULL,
 `passwordCreature` VARCHAR(255) NOT NULL,
 PRIMARY KEY (`idCreature`));


-- -----------------------------------------------------
-- Table `labyrinth`.`creatures`
-- -----------------------------------------------------

INSERT INTO labyrinth.people (idPeople, namePeople, passwordPeople) VALUES
(1, 'Eurycliedes', MD5('greeklover')),
(2, 'Menekrates', MD5('greeksalad')),
(3, 'Philostratos', MD5('nickthegreek')),
(4, 'Daedalus', MD5('1989dontforgetyourpass'));

INSERT INTO labyrinth.creatures (idCreature, nameCreature, passwordCreature) VALUES
(1, 'Cerberos', MD5('soviet911210036173')),
(2, 'Pegasus', MD5('pizzaeater_1')),
(3, 'Chiron', MD5('hiphophugosoviet18')),
(4, 'Centaurus', MD5('elcentauro')),
(5, 'Minotaur', MD5('aminotauro'));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
