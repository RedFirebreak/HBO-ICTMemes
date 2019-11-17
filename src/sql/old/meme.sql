-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 nov 2019 om 10:13
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hboictmemes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meme`
--

CREATE TABLE `meme` (
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `meme-titel` varchar(30) NOT NULL,
  `user-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `locatie` varchar(200) NOT NULL,
  `school` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `meme`
--

INSERT INTO `meme` (`meme-ID`, `meme-titel`, `user-ID`, `datum`, `locatie`, `school`) VALUES
(1, 'Memey-boi1', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool1'),
(2, 'Memey-boi2', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool1'),
(3, 'Memey-boi3', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool2'),
(4, 'Memey-boi4', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool2'),
(5, 'Memey-boi5', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool3'),
(6, 'Memey-boi6', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool3'),
(7, 'Memey-boi7', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool4'),
(8, 'Memey-boi8', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool4'),
(9, 'Memey-boi9', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool1'),
(10, 'Memey-boi10', 5, '2019-10-23 22:00:00', '/memestorage/oktober/', 'voorbeeldschool3');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`),
  ADD KEY `school` (`school`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `meme`
--
ALTER TABLE `meme`
  MODIFY `meme-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `meme`
--
ALTER TABLE `meme`
  ADD CONSTRAINT `meme_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
