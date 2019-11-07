-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 05:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `support-ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `naam` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `onderwerp` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `school` varchar(30) COLLATE utf8_bin NOT NULL,
  `inhoud` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datum` date NOT NULL,
  `opgelost` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `tagnaam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `profile_picture` varchar(300) COLLATE utf8_bin DEFAULT '/storage/profilepictures/default.png',
  `schoolnaam` varchar(50) DEFAULT NULL,
  `laatste_login` datetime DEFAULT NULL,
  `aantal_foute_logins` tinyint(3) UNSIGNED DEFAULT 0,
  `userrole` varchar(20) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `gebanned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `memetag_ibfk_1` (`meme-ID`),
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
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  MODIFY `verificatie-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `error`
--
ALTER TABLE `error`
  MODIFY `error-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `support-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `memetag_ibfk_2` FOREIGN KEY (`tag-ID`) REFERENCES `tags` (`tag-ID`) ON UPDATE CASCADE;

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
