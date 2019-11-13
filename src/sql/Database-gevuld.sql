-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 nov 2019 om 10:14
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

--
-- Gegevens worden geëxporteerd voor tabel `comment-report`
--

INSERT INTO `comment-report` (`report-ID`, `comment-ID`, `snitch-ID`, `boef-ID`, `datum`, `overtreding`, `beschrijving`) VALUES
(5, 5, 4, 4, '2019-10-28 19:04:45', 'verkeerde huidskleur', 'lololol, casual racism'),
(6, 7, 6, 7, '2019-10-28 19:04:45', 'racisme', 'kleuren zijn racistisch'),
(7, 1, 1, 12, '2019-10-28 19:04:45', 'dt-fout', 'kut moet met een d'),
(8, 2, 15, 13, '2019-10-28 19:04:45', 'stom gezicht', 'gewoon een stom gezicht');

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

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`comment-ID`, `meme-ID`, `user-ID`, `inhoud`, `datum`) VALUES
(1, 4, 12, 'wat een kut meme', '2019-10-28 18:51:24'),
(2, 4, 13, 'hou je bek crediteur', '2019-10-28 18:51:24'),
(3, 4, 12, 'hou jij je bek debiteur', '2019-10-28 18:51:24'),
(4, 7, 1, 'ohne musik wäre das leben ein irrtum', '2019-10-28 18:51:24'),
(5, 8, 4, 'lol of zo', '2019-10-28 18:51:24'),
(6, 9, 5, 'exampletext', '2019-10-28 18:51:24'),
(7, 1, 7, 'mijn favoriete kleur is geel', '2019-10-28 18:51:24');

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

--
-- Gegevens worden geëxporteerd voor tabel `emailverificatie`
--

INSERT INTO `emailverificatie` (`verificatie-ID`, `user-ID`, `verificatiecode`, `rowdatum`, `soort`, `geverifieerd`, `geverifieerd_door`) VALUES
(1, 1, 1234, '2019-10-30 17:40:37', 'wachtwoordreset', 1, 5),
(2, 2, 2345, '2019-10-30 17:40:37', 'wachtwoordreset', 1, 8),
(3, 3, 3456, '2019-10-30 17:40:37', 'emailverificatie', 0, NULL),
(4, 4, 4567, '2019-10-30 17:40:37', 'wachtwoordreset', 0, NULL),
(5, 5, 5678, '2019-10-30 17:40:37', 'emailverificatie', 1, 9),
(6, 6, 6789, '2019-10-30 17:40:37', 'emailverificatie', 1, 13),
(7, 7, 1122, '2019-10-30 17:40:37', 'emailverificatie', 1, 12),
(8, 8, 1133, '2019-10-30 17:40:37', 'wachtwoordreset', 0, NULL),
(9, 9, 2244, '2019-10-30 17:40:37', 'wachtwoordreset', 1, 2),
(10, 10, 3355, '2019-10-30 17:40:37', 'wachtwoordreset', 0, NULL),
(11, 11, 4466, '2019-10-30 17:40:37', 'wachtwoordreset', 0, NULL),
(12, 12, 6688, '2019-10-30 17:40:37', 'wachtwoordreset', 1, 1),
(13, 13, 8800, '2019-10-30 17:40:37', 'emailverificatie', 1, 4),
(14, 14, 3355, '2019-10-30 17:40:37', 'emailverificatie', 1, 4),
(15, 15, 5577, '2019-10-30 17:40:37', 'emailverificatie', 1, 1),
(16, 16, 6182740, '2019-11-11 09:02:56', 'emailverificatie', 0, NULL);

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

--
-- Gegevens worden geëxporteerd voor tabel `error`
--

INSERT INTO `error` (`error-ID`, `locatie`, `datum`, `soort`, `bericht`) VALUES
(1, 'Homepage', '2019-10-27 16:25:22', 'ERROR', 'Ahh shit here we go again'),
(2, 'Homepage', '2019-10-27 16:29:47', 'ERROR', 'Why did this happen to meeee! I\'ve made my mistakaaaakes! Got nowhere to run! The night goes on! as im, fading away!'),
(3, 'Homepage', '2019-10-27 16:30:18', 'CRITICAL', 'Somebody is singing songs in our error log >:('),
(4, 'Homepage', '2019-10-27 16:34:24', 'CRITICAL', 'WHO\'S DONE IT'),
(5, 'Homepage', '2019-10-27 16:34:45', 'ERROR', 'STEFAN DID IT AGAIN DIDNT HE'),
(6, 'SYSTEM-C:xampphtdocsHBO-ICTMemesfunc.header.php', '2019-10-30 17:23:54', 'ERROR', '[Line: 18][8] Undefined index: loggedin'),
(7, 'SYSTEM-C:xampphtdocsHBO-ICTMemesfunc.header.php', '2019-10-30 17:45:01', 'ERROR', '[Line: 18][8] Undefined index: loggedin'),
(8, 'SYSTEM-C:xampphtdocsuploaduploaded.php', '2019-11-08 20:16:43', 'ERROR', '[Line: 35][2] mysqli_real_escape_string() expects parameter 2 to be string, array given'),
(9, 'SYSTEM-C:xampphtdocsuploaduploaded.php', '2019-11-08 20:16:43', 'ERROR', '[Line: 52][2] mysqli_fetch_assoc() expects parameter 1 to be mysqli_result, bool given'),
(10, 'SYSTEM-C:xampphtdocsaccountlogin.php', '2019-11-11 10:02:16', 'ERROR', '[Line: 38][8] Undefined variable: loggedin'),
(11, 'SYSTEM-C:xampphtdocssrcfunctions.php', '2019-11-11 10:02:57', 'ERROR', '[Line: 285][2] mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set()'),
(12, 'SYSTEM-C:xampphtdocsaccountlogin.php', '2019-11-11 10:03:08', 'ERROR', '[Line: 38][8] Undefined variable: loggedin'),
(13, 'SYSTEM-C:xampphtdocsaccountlogin.php', '2019-11-11 10:03:39', 'ERROR', '[Line: 38][8] Undefined variable: loggedin'),
(14, 'SYSTEM-C:xampphtdocsaccountlogin.php', '2019-11-11 10:03:58', 'ERROR', '[Line: 38][8] Undefined variable: loggedin'),
(15, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 10, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(16, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 9, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(17, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 8, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(18, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 7, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(19, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 6, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(20, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 5, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(21, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 4, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(22, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 3, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(23, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 2, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(24, 'Home-memeimage', '2019-11-11 10:04:03', 'ERROR', 'The homepage found an image that does not exist!(ID: 1, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(25, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 10, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(26, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 9, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(27, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 8, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(28, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 7, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(29, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 6, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(30, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 5, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(31, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 4, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(32, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 3, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(33, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 2, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(34, 'Home-memeimage', '2019-11-11 10:11:11', 'ERROR', 'The homepage found an image that does not exist!(ID: 1, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(35, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 10, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(36, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 9, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(37, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 8, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(38, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 7, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(39, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 6, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(40, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 5, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(41, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 4, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(42, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 3, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(43, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 2, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )'),
(44, 'Home-memeimage', '2019-11-11 10:11:20', 'ERROR', 'The homepage found an image that does not exist!(ID: 1, location: ./memestorage/oktober/, user: 5, Date: 2019-10-24 00:00:00 )');

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
('dt-fout'),
('racisme'),
('slechte muzieksmaak'),
('stom gezicht'),
('verkeerde huidskleur');

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
('voorbeeldschool1'),
('voorbeeldschool2'),
('voorbeeldschool3'),
('voorbeeldschool4');

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

--
-- Gegevens worden geëxporteerd voor tabel `support`
--

INSERT INTO `support` (`support-ID`, `email`, `naam`, `onderwerp`, `school`, `inhoud`, `datum`, `opgelost`) VALUES
(1, 'janwillem@hotmail.com', '', 'login probleem', '', 'ik kan niet inloggen ', '2019-10-15', 0),
(2, 'willemjan@hotmail.com', '', 'niet registreren', '', 'ik probeer een account aan te maken maar ik krijg een error.', '2019-10-15', 1),
(3, 'Basdeejay@hotmail.com', '', 'meme submut', '', 'ik probeer een meme toe te voegen maar deze werkt niet.', '2019-10-13', 1),
(4, 'khalidwonder@st.hanze.nl', '', 'henk de tank-meme', '', 'waarom staan er nog geen henk tatje memes op de website', '2019-10-13', 0),
(5, 'gigid\'agostino@st.windesheim.nl', '', 'geen account', '', 'ik wil een meme posten maar ik wil geen account aanmaken kan dit?', '2019-10-05', 1),
(6, 'alcazarvevo@discotheek.com', '', 'video', '', 'ik probeer een video te uploaden maar dit lukt niet, kan dit eigenlijk wel?', '2019-10-12', 1),
(7, 'earhtwindfire@st.NHL.nl', '', 'tags', '', 'ik zie geen tags op de tag pagina, ligt dit aan mij of aan jullie?', '2019-10-09', 1);

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
(1, 'AdminPost'),
(2, 'Dat-Boi'),
(3, 'Funny'),
(4, 'Halloween'),
(5, 'Hanze'),
(6, 'ICT'),
(7, 'Schooladmin'),
(8, 'Shitpost'),
(9, 'Stenden'),
(10, 'Windesheim');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `upvote`
--

CREATE TABLE `upvote` (
  `upvote-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL
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
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user-ID`, `usermail`, `username`, `wachtwoord`, `vorig_wachtwoord`, `profile_picture`, `schoolnaam`, `laatste_login`, `aantal_foute_logins`, `userrole`, `is_verified`, `gebanned`) VALUES
(1, 'coole.dude@mail.com', 'coole dude', 'hoihoi', '', '', 'voorbeeldschool4', '2019-10-10 14:00:00', 2, 'admin', 1, 0),
(2, 'username@email.com', 'username', 'Bl4ck4ndWhite', 'White4ndBl4ck', '', 'voorbeeldschool2', '2019-10-14 02:00:00', 1, 'admin', 1, 0),
(3, 'Administrator@mail.com', 'Administrator', 'St@rt123', 'Eind1098', '', 'voorbeeldschool1', '2019-10-16 05:00:00', 3, 'uber-admin', 0, 1),
(4, 'alex@mail.com', 'alex', 'Alex', '', '', 'voorbeeldschool3', '2019-10-15 10:00:00', 10, 'user', 0, 1),
(5, 'demo@mail.com', 'Demo', 'ThisIsNotAPassword', '', '', 'voorbeeldschool2', '2019-10-11 06:00:00', 13, 'user', 1, 0),
(6, 'Pos@mail.com', 'Pos', 'P@ssword', '', '', 'voorbeeldschool4', '2019-10-16 03:00:00', 5, 'user', 1, 0),
(7, 'Peter@mail.com', 'peterthepeter', 'P@ssWord345', '', '', 'voorbeeldschool1', '2019-10-09 15:00:00', 2, 'user', 1, 1),
(8, 'thebeast@mail.com', 'The Beast', 'ComeAtMe', '', '', 'voorbeeldschool2', '2019-10-24 18:00:00', 6, 'user', 0, 0),
(9, 'splosh@mail.com', 'slosh vitamins', 'EatDemVitamins', '', '', 'voorbeeldschool3', '2019-10-15 10:00:00', 9, 'uber-admin', 1, 1),
(10, 'incredible@mail.com', 'incredible typewriter', 'TypeWriter567', '', '', 'voorbeeldschool2', '2019-10-17 16:00:00', 2, 'user', 0, 0),
(11, 'mugwup@mail.com', 'mugwumpsystemize', 'beAMugWump4Life', 'IDontNeedNoPassword', '', 'voorbeeldschool2', '2019-10-18 04:00:00', 1, 'user', 0, 0),
(12, 'crediteur@mail.com', 'crediteur', 'debiteur', '', '', 'voorbeeldschool2', '2019-10-17 07:00:00', 0, 'user', 1, 0),
(13, 'debiteur@mail.com', 'debiteur', 'crediteur', 'crediteur<3', '', 'voorbeeldschool2', '2019-10-14 07:00:00', 0, 'user', 1, 0),
(14, 'bobcattweed@mail.com', 'bobcattweed', 'BringTheweed', '', '', 'voorbeeldschool3', '2019-10-14 22:00:00', 0, 'admin', 1, 0),
(15, 'egg@mail.com', 'eggisland', 'chickenChicken', 'CluckCluck', '', 'voorbeeldschool4', '0000-00-00 00:00:00', 1, 'user', 1, 0),
(16, 'tombeugels@hotmail.com', 'tom', '0f141392f18c390695b0db24f1995523', NULL, '/storage/profilepictures/default.png', 'voorbeeldschool1', '2019-11-11 10:03:58', 0, 'uber-admin', 1, 0);

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
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `comment-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `emailverificatie`
--
ALTER TABLE `emailverificatie`
  MODIFY `verificatie-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `error`
--
ALTER TABLE `error`
  MODIFY `error-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `meme`
--
ALTER TABLE `meme`
  MODIFY `meme-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `meme-report`
--
ALTER TABLE `meme-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `memetag`
--
ALTER TABLE `memetag`
  MODIFY `memetag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `support`
--
ALTER TABLE `support`
  MODIFY `support-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `tag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `upvote`
--
ALTER TABLE `upvote`
  MODIFY `upvote-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`),
  ADD CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`);

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
