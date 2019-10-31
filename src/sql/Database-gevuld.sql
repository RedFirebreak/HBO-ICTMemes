-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 05:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Table structure for table `comment-report`
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
-- Dumping data for table `comment-report`
--

INSERT INTO `comment-report` (`report-ID`, `comment-ID`, `snitch-ID`, `boef-ID`, `datum`, `overtreding`, `beschrijving`) VALUES
(5, 5, 4, 4, '2019-10-28 19:04:45', 'verkeerde huidskleur', 'lololol, casual racism'),
(6, 7, 6, 7, '2019-10-28 19:04:45', 'racisme', 'kleuren zijn racistisch'),
(7, 1, 1, 12, '2019-10-28 19:04:45', 'dt-fout', 'kut moet met een d'),
(8, 2, 15, 13, '2019-10-28 19:04:45', 'stom gezicht', 'gewoon een stom gezicht');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL,
  `inhoud` varchar(500) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
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
-- Table structure for table `emailverificatie`
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
-- Dumping data for table `emailverificatie`
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
(15, 15, 5577, '2019-10-30 17:40:37', 'emailverificatie', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `error`
--

CREATE TABLE `error` (
  `error-ID` int(10) UNSIGNED NOT NULL,
  `locatie` varchar(200) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `soort` varchar(30) NOT NULL,
  `bericht` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `error`
--

INSERT INTO `error` (`error-ID`, `locatie`, `datum`, `soort`, `bericht`) VALUES
(1, 'Homepage', '2019-10-27 16:25:22', 'ERROR', 'Ahh shit here we go again'),
(2, 'Homepage', '2019-10-27 16:29:47', 'ERROR', 'Why did this happen to meeee! I\'ve made my mistakaaaakes! Got nowhere to run! The night goes on! as im, fading away!'),
(3, 'Homepage', '2019-10-27 16:30:18', 'CRITICAL', 'Somebody is singing songs in our error log >:('),
(4, 'Homepage', '2019-10-27 16:34:24', 'CRITICAL', 'WHO\'S DONE IT'),
(5, 'Homepage', '2019-10-27 16:34:45', 'ERROR', 'STEFAN DID IT AGAIN DIDNT HE'),
(6, 'SYSTEM-C:xampphtdocsHBO-ICTMemesfunc.header.php', '2019-10-30 17:23:54', 'ERROR', '[Line: 18][8] Undefined index: loggedin'),
(7, 'SYSTEM-C:xampphtdocsHBO-ICTMemesfunc.header.php', '2019-10-30 17:45:01', 'ERROR', '[Line: 18][8] Undefined index: loggedin');

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `meme-titel` varchar(30) NOT NULL,
  `user-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` date NOT NULL,
  `locatie` varchar(200) NOT NULL,
  `school` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`meme-ID`, `meme-titel`, `user-ID`, `datum`, `locatie`, `school`) VALUES
(1, 'Memey-boi1', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool1'),
(2, 'Memey-boi2', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool1'),
(3, 'Memey-boi3', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool2'),
(4, 'Memey-boi4', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool2'),
(5, 'Memey-boi5', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool3'),
(6, 'Memey-boi6', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool3'),
(7, 'Memey-boi7', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool4'),
(8, 'Memey-boi8', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool4'),
(9, 'Memey-boi9', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool1'),
(10, 'Memey-boi10', 5, '2019-10-24', '/memestorage/oktober/', 'voorbeeldschool3');

-- --------------------------------------------------------

--
-- Table structure for table `meme-report`
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
-- Table structure for table `memetag`
--

CREATE TABLE `memetag` (
  `memetag-ID` int(10) UNSIGNED NOT NULL,
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `overtredingen`
--

CREATE TABLE `overtredingen` (
  `overtreding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `overtredingen`
--

INSERT INTO `overtredingen` (`overtreding`) VALUES
('dt-fout'),
('racisme'),
('slechte muzieksmaak'),
('stom gezicht'),
('verkeerde huidskleur');

-- --------------------------------------------------------

--
-- Table structure for table `private-info`
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
-- Table structure for table `rollen`
--

CREATE TABLE `rollen` (
  `userrole` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rollen`
--

INSERT INTO `rollen` (`userrole`) VALUES
('admin'),
('uber-admin'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolnaam`) VALUES
('voorbeeldschool1'),
('voorbeeldschool2'),
('voorbeeldschool3'),
('voorbeeldschool4');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support-ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `naam` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `onderwerp` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `inhoud` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datum` date NOT NULL,
  `opgelost` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`support-ID`, `email`, `naam`, `onderwerp`, `inhoud`, `datum`, `opgelost`) VALUES
(1, 'janwillem@hotmail.com', '', 'login probleem', 'ik kan niet inloggen ', '2019-10-15', 0),
(2, 'willemjan@hotmail.com', '', 'niet registreren', 'ik probeer een account aan te maken maar ik krijg een error.', '2019-10-15', 1),
(3, 'Basdeejay@hotmail.com', '', 'meme submut', 'ik probeer een meme toe te voegen maar deze werkt niet.', '2019-10-13', 1),
(4, 'khalidwonder@st.hanze.nl', '', 'henk de tank-meme', 'waarom staan er nog geen henk tatje memes op de website', '2019-10-13', 0),
(5, 'gigid\'agostino@st.windesheim.nl', '', 'geen account', 'ik wil een meme posten maar ik wil geen account aanmaken kan dit?', '2019-10-05', 1),
(6, 'alcazarvevo@discotheek.com', '', 'video', 'ik probeer een video te uploaden maar dit lukt niet, kan dit eigenlijk wel?', '2019-10-12', 1),
(7, 'earhtwindfire@st.NHL.nl', '', 'tags', 'ik zie geen tags op de tag pagina, ligt dit aan mij of aan jullie?', '2019-10-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `tagnaam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
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
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `upvote-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `usermail` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL,
  `vorig_wachtwoord` varchar(200) DEFAULT NULL,
  `profile_picture` varchar(300) DEFAULT NULL,
  `schoolnaam` varchar(50) DEFAULT NULL,
  `laatste_login` datetime DEFAULT NULL,
  `aantal_foute_logins` tinyint(3) UNSIGNED DEFAULT 0,
  `userrole` varchar(20) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `gebanned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
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
(15, 'egg@mail.com', 'eggisland', 'chickenChicken', 'CluckCluck', '', 'voorbeeldschool4', '0000-00-00 00:00:00', 1, 'user', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment-report`
--
ALTER TABLE `comment-report`
  ADD PRIMARY KEY (`report-ID`),
  ADD KEY `comment-ID` (`comment-ID`),
  ADD KEY `snitch-ID` (`snitch-ID`),
  ADD KEY `boef-ID` (`boef-ID`),
  ADD KEY `overtreding` (`overtreding`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexes for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD PRIMARY KEY (`verificatie-ID`),
  ADD KEY `geverifieerd_door` (`geverifieerd_door`),
  ADD KEY `geverifieerd` (`geverifieerd`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexes for table `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`error-ID`);

--
-- Indexes for table `meme`
--
ALTER TABLE `meme`
  ADD PRIMARY KEY (`meme-ID`),
  ADD UNIQUE KEY `meme-titel_4` (`meme-titel`),
  ADD KEY `meme-titel` (`meme-titel`),
  ADD KEY `meme-titel_2` (`meme-titel`),
  ADD KEY `meme-titel_3` (`meme-titel`),
  ADD KEY `user-ID` (`user-ID`),
  ADD KEY `school` (`school`);

--
-- Indexes for table `meme-report`
--
ALTER TABLE `meme-report`
  ADD PRIMARY KEY (`report-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `snitch-ID` (`snitch-ID`),
  ADD KEY `boef-ID` (`boef-ID`),
  ADD KEY `overtreding` (`overtreding`);

--
-- Indexes for table `memetag`
--
ALTER TABLE `memetag`
  ADD PRIMARY KEY (`memetag-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `memetag_ibfk_2` (`tag-ID`);

--
-- Indexes for table `overtredingen`
--
ALTER TABLE `overtredingen`
  ADD PRIMARY KEY (`overtreding`);

--
-- Indexes for table `private-info`
--
ALTER TABLE `private-info`
  ADD PRIMARY KEY (`user-ID`);

--
-- Indexes for table `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`userrole`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolnaam`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`support-ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag-ID`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`upvote-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user-ID`),
  ADD KEY `usermail` (`usermail`),
  ADD KEY `userrole` (`userrole`),
  ADD KEY `schoolnaam` (`schoolnaam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment-report`
--
ALTER TABLE `comment-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  MODIFY `verificatie-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `error`
--
ALTER TABLE `error`
  MODIFY `error-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
  MODIFY `meme-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meme-report`
--
ALTER TABLE `meme-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memetag`
--
ALTER TABLE `memetag`
  MODIFY `memetag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `support-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `upvote-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment-report`
--
ALTER TABLE `comment-report`
  ADD CONSTRAINT `comment-report_ibfk_1` FOREIGN KEY (`boef-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `comment-report_ibfk_2` FOREIGN KEY (`snitch-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `comment-report_ibfk_3` FOREIGN KEY (`comment-ID`) REFERENCES `comments` (`comment-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment-report_ibfk_4` FOREIGN KEY (`overtreding`) REFERENCES `overtredingen` (`overtreding`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Constraints for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD CONSTRAINT `emailverificatie_ibfk_1` FOREIGN KEY (`geverifieerd_door`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `emailverificatie_ibfk_5` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Constraints for table `meme`
--
ALTER TABLE `meme`
  ADD CONSTRAINT `meme_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`);

--
-- Constraints for table `meme-report`
--
ALTER TABLE `meme-report`
  ADD CONSTRAINT `meme-report_ibfk_1` FOREIGN KEY (`boef-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `meme-report_ibfk_2` FOREIGN KEY (`snitch-ID`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `meme-report_ibfk_3` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `meme-report_ibfk_4` FOREIGN KEY (`overtreding`) REFERENCES `overtredingen` (`overtreding`);

--
-- Constraints for table `memetag`
--
ALTER TABLE `memetag`
  ADD CONSTRAINT `memetag_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `memetag_ibfk_2` FOREIGN KEY (`tag-ID`) REFERENCES `tags` (`tag-ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private-info`
--
ALTER TABLE `private-info`
  ADD CONSTRAINT `private-info_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;

--
-- Constraints for table `upvote`
--
ALTER TABLE `upvote`
  ADD CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`),
  ADD CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`schoolnaam`) REFERENCES `school` (`schoolnaam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`userrole`) REFERENCES `rollen` (`userrole`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
