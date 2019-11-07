-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 okt 2019 om 14:55
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbo-ictmemes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `support`
--

CREATE TABLE if not exists`support` (
  `support-ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `naam` varchar(50) COLLATE utf8_bin NOT NULL,
  `onderwerp` varchar(30) COLLATE utf8_bin NOT NULL,
  `school` varchar(30) COLLATE utf8_bin NOT NULL,
  `inhoud` varchar(500) COLLATE utf8_bin NOT NULL,
  `datum` date NOT NULL,
  `opgelost` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY if not exists(`support-ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `support`
--
ALTER TABLE `support`
  MODIFY `support-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- Gegevens worden geëxporteerd voor tabel `support`
--

INSERT INTO `support` (`email`,`naam`, `onderwerp`, `inhoud`, `datum`, `opgelost`) VALUES
('janwillem@hotmail.com',`Naam1`, 'login probleem', 'ik kan niet inloggen ', '2019-10-15', 0),
('willemjan@hotmail.com',`Naam2`, 'niet registreren', 'ik probeer een account aan te maken maar ik krijg een error.', '2019-10-15', 1),
('Basdeejay@hotmail.com',`Naam3`, 'meme submut', 'ik probeer een meme toe te voegen maar deze werkt niet.', '2019-10-13', 1),
('khalidwonder@st.hanze.nl',`Naam4`, 'henk de tank-meme', 'waarom staan er nog geen henk tatje memes op de website', '2019-10-13', 0),
('gigidagostino@st.windesheim.nl',`Nam5`, 'geen account', 'ik wil een meme posten maar ik wil geen account aanmaken kan dit?', '2019-10-05', 1),
('alcazarvevo@discotheek.com',`man6`, 'video', 'ik probeer een video te uploaden maar dit lukt niet, kan dit eigenlijk wel?', '2019-10-12', 1),
('earhtwindfire@st.NHL.nl',`vrouw7`, 'tags', 'ik zie geen tags op de tag pagina, ligt dit aan mij of aan jullie?', '2019-10-09', 1);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
