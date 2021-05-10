-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `2021-2ehif-jukeboxdb`
--
CREATE DATABASE IF NOT EXISTS `2021-2ehif-jukeboxdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2021-2ehif-jukeboxdb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`id`, `name`, `description`) VALUES
(1, 'Dance', NULL),
(2, 'Pop', NULL),
(3, 'Rock', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `interpret` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `playlist`
--

INSERT INTO `playlist` (`id`, `interpret`, `title`, `genre`) VALUES
(1, 'David Guetta', 'Flames', 1),
(2, 'Ed Sheeran', 'Afterglow', 2),
(3, '187 Strassenbande', 'Verpennt', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
