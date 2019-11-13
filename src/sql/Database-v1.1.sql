-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 nov 2019 om 10:25
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
-- Tabelstructuur voor tabel `comment-report`
--

CREATE TABLE `comment-report` (
  `report-ID` int(10) UNSIGNED NOT NULL,
  `comment-ID` int(10) UNSIGNED NOT NULL,
  `snitch-ID` int(10) UNSIGNED DEFAULT NULL,
  `boef-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `overtreding` varchar(20) NOT NULL,
  `beschrijving` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `comment-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL,
  `inhoud` varchar(500) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `emailverificatie`
--

CREATE TABLE `emailverificatie` (
  `verificatie-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL,
  `verificatiecode` int(10) UNSIGNED NOT NULL,
  `rowdatum` timestamp NOT NULL DEFAULT current_timestamp(),
  `soort` varchar(50) NOT NULL,
  `geverifieerd` tinyint(1) NOT NULL DEFAULT 0,
  `geverifieerd_door` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `error`
--

CREATE TABLE `error` (
  `error-ID` int(10) UNSIGNED NOT NULL,
  `locatie` varchar(200) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `soort` varchar(30) NOT NULL,
  `bericht` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meme`
--

CREATE TABLE `meme` (
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `meme-titel` varchar(200) NOT NULL,
  `user-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `locatie` varchar(200) NOT NULL,
  `school` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `meme-report`
--

CREATE TABLE `meme-report` (
  `report-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `snitch-ID` int(10) UNSIGNED DEFAULT NULL,
  `boef-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `overtreding` varchar(20) NOT NULL,
  `beschrijving` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `memetag`
--

CREATE TABLE `memetag` (
  `memetag-ID` int(10) UNSIGNED NOT NULL,
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overtredingen`
--

CREATE TABLE `overtredingen` (
  `overtreding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `overtredingen`
--

INSERT INTO `overtredingen` (`overtreding`) VALUES
('dierenmishandeling'),
('mishandeling'),
('nsfw'),
('offensief'),
('ongepast'),
('pornografisch materi'),
('racisme');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `private-info`
--

CREATE TABLE `private-info` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `adres` varchar(20) DEFAULT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `land` varchar(30) DEFAULT NULL,
  `geboortedatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE `rollen` (
  `userrole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `rollen`
--

INSERT INTO `rollen` (`userrole`) VALUES
('admin'),
('uber-admin'),
('user');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `school`
--

CREATE TABLE `school` (
  `schoolnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `school`
--

INSERT INTO `school` (`schoolnaam`) VALUES
('Hanze'),
('HvA'),
('NHL Stenden'),
('Windesheim');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `support`
--

CREATE TABLE `support` (
  `support-ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `naam` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `onderwerp` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `school` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `inhoud` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datum` date NOT NULL,
  `opgelost` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tags`
--

CREATE TABLE `tags` (
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `tagnaam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tags`
--

INSERT INTO `tags` (`tag-ID`, `tagnaam`) VALUES
(11, 'AdminPost'),
(12, 'Funny'),
(13, 'Animals'),
(14, 'Anime & Manga'),
(15, 'Anime Waifu'),
(16, 'Anime Wallpaper'),
(17, 'Apex Legends'),
(19, 'Awesome'),
(20, 'Car'),
(21, 'Comic & Webtoon'),
(22, 'Cosplay'),
(23, 'Countryballs'),
(24, 'Cozy & Comfy'),
(25, 'Crappy Design'),
(26, 'Drawing, DIY & Crafts'),
(27, 'Food & Drinks'),
(28, 'Football'),
(29, 'Fortnite'),
(30, 'Game of Thrones ⚔️'),
(31, 'Gaming'),
(32, 'GIF'),
(33, 'History'),
(34, 'Horror'),
(35, 'K-Pop'),
(36, 'Latest News'),
(37, 'League of Legends'),
(38, 'LEGO'),
(39, 'Marvel & DC'),
(40, 'Meme'),
(41, 'Movie & TV'),
(42, 'Music'),
(43, 'NBA'),
(44, 'Overwatch'),
(45, 'PC Master Race'),
(46, 'Pokémon'),
(47, 'Politics'),
(48, 'Relationship'),
(49, 'Savage'),
(50, 'Satisfying'),
(51, 'Science & Tech'),
(52, 'Star Wars'),
(53, 'Sport'),
(54, 'Wallpaper'),
(55, 'Wholesome:heartbeat:'),
(56, 'WTF'),
(57, 'Dark Humor'),
(58, 'Relationship'),
(59, 'Shitpost'),
(60, 'ICT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `upvote`
--

CREATE TABLE `upvote` (
  `upvote-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL,
  `soort` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `usermail` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL,
  `vorig_wachtwoord` varchar(200) DEFAULT NULL,
  `profile_picture` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '/storage/profilepictures/default.png',
  `schoolnaam` varchar(50) DEFAULT NULL,
  `laatste_login` datetime DEFAULT NULL,
  `aantal_foute_logins` tinyint(3) UNSIGNED DEFAULT 0,
  `userrole` varchar(20) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `gebanned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comment-report`
--
ALTER TABLE `comment-report`
  ADD PRIMARY KEY (`report-ID`),
  ADD KEY `comment-ID` (`comment-ID`),
  ADD KEY `snitch-ID` (`snitch-ID`),
  ADD KEY `boef-ID` (`boef-ID`),
  ADD KEY `overtreding` (`overtreding`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexen voor tabel `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD PRIMARY KEY (`verificatie-ID`),
  ADD KEY `geverifieerd_door` (`geverifieerd_door`),
  ADD KEY `geverifieerd` (`geverifieerd`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexen voor tabel `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`error-ID`);

--
-- Indexen voor tabel `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`),
  ADD KEY `school` (`school`);

--
-- Indexen voor tabel `meme-report`
--
ALTER TABLE `meme-report`
  ADD PRIMARY KEY (`report-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `snitch-ID` (`snitch-ID`),
  ADD KEY `boef-ID` (`boef-ID`),
  ADD KEY `overtreding` (`overtreding`);

--
-- Indexen voor tabel `memetag`
--
ALTER TABLE `memetag`
  ADD PRIMARY KEY (`memetag-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `memetag_ibfk_2` (`tag-ID`);

--
-- Indexen voor tabel `overtredingen`
--
ALTER TABLE `overtredingen`
  ADD PRIMARY KEY (`overtreding`);

--
-- Indexen voor tabel `private-info`
--
ALTER TABLE `private-info`
  ADD PRIMARY KEY (`user-ID`);

--
-- Indexen voor tabel `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`userrole`);

--
-- Indexen voor tabel `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolnaam`);

--
-- Indexen voor tabel `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support-ID`);

--
-- Indexen voor tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag-ID`);

--
-- Indexen voor tabel `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`upvote-ID`),
  ADD UNIQUE KEY `uni_vote` (`meme-ID`,`user-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user-ID`),
  ADD KEY `usermail` (`usermail`),
  ADD KEY `userrole` (`userrole`),
  ADD KEY `schoolnaam` (`schoolnaam`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comment-report`
--
ALTER TABLE `comment-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `comment-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `emailverificatie`
--
ALTER TABLE `emailverificatie`
  MODIFY `verificatie-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `error`
--
ALTER TABLE `error`
  MODIFY `error-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `meme`
--
ALTER TABLE `meme`
  MODIFY `meme-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `meme-report`
--
ALTER TABLE `meme-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `memetag`
--
ALTER TABLE `memetag`
  MODIFY `memetag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `support`
--
ALTER TABLE `support`
  MODIFY `support-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `tag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT voor een tabel `upvote`
--
ALTER TABLE `upvote`
  MODIFY `upvote-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `comment-report`
--
ALTER TABLE `comment-report`
  ADD CONSTRAINT `comment-report_ibfk_1` FOREIGN KEY (`boef-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `comment-report_ibfk_2` FOREIGN KEY (`snitch-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `comment-report_ibfk_3` FOREIGN KEY (`comment-ID`) REFERENCES `comments` (`comment-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment-report_ibfk_4` FOREIGN KEY (`overtreding`) REFERENCES `overtredingen` (`overtreding`);

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD CONSTRAINT `emailverificatie_ibfk_1` FOREIGN KEY (`geverifieerd_door`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `emailverificatie_ibfk_5` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `meme`
--
ALTER TABLE `meme`
  ADD CONSTRAINT `meme_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`);

--
-- Beperkingen voor tabel `meme-report`
--
ALTER TABLE `meme-report`
  ADD CONSTRAINT `meme-report_ibfk_1` FOREIGN KEY (`boef-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `meme-report_ibfk_2` FOREIGN KEY (`snitch-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `meme-report_ibfk_3` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `meme-report_ibfk_4` FOREIGN KEY (`overtreding`) REFERENCES `overtredingen` (`overtreding`);

--
-- Beperkingen voor tabel `memetag`
--
ALTER TABLE `memetag`
  ADD CONSTRAINT `memetag_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `memetag_ibfk_2` FOREIGN KEY (`tag-ID`) REFERENCES `tags` (`tag-ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `private-info`
--
ALTER TABLE `private-info`
  ADD CONSTRAINT `private-info_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `upvote`
--
ALTER TABLE `upvote`
  ADD CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`schoolnaam`) REFERENCES `school` (`schoolnaam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`userrole`) REFERENCES `rollen` (`userrole`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
