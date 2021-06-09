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

INSERT INTO labyrinth.people (idPeople, namePeople, passwordPeople) VALUES
(1, 'Eurycliedes', MD5('lovely')),
(2, 'Menekrates', 'testpassword2'),
(3, 'Philostratos', 'testpassword3');

INSERT INTO labyrinth.creatures (idCreature, nameCreature, passwordCreature) VALUES
(1, 'Cerberos', MD5('lovely')),
(2, 'Pegasus', MD5('testpassword5')),
(3, 'Chiron', MD5('testpassword6'));

-- INSERT INTO labyrinth.people (idPeople, namePeople, passwordPeople) VALUES
-- (1, 'Eurycliedes', 'testpassword1'),
-- (2, 'Menekrates', 'testpassword2'),
-- (3, 'Philostratos', 'testpassword3');

-- INSERT INTO labyrinth.creatures (idCreature, nameCreature, passwordCreature) VALUES
-- (1, 'Cerberos', 'testpassword4'),
-- (2, 'Pegasus', 'testpassword5'),
-- (3, 'Chiron', 'testpassword6');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
