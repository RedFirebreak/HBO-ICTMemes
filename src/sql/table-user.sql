-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 02:20 PM
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
-- Database: `hbo-ict memes`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE if not exists`user` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `usermail` varchar(100) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `wachtwoord` varchar(200) COLLATE utf8_bin NOT NULL,
  `vorig_wachtwoord` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `profile_picture` varchar(300) COLLATE utf8_bin DEFAULT '/storage/profilepictures/default.png',
  `schoolnaam` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `laatste_login` datetime DEFAULT NULL,
  `aantal_foute_logins` tinyint(3) UNSIGNED DEFAULT 0,
  `userrole` varchar(20) COLLATE utf8_bin NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `gebanned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY if not exists(`user-ID`),
  ADD KEY if not exists`usermail` (`usermail`),
  ADD KEY if not exists`userrole` (`userrole`),
  ADD KEY if not exists`schoolnaam` (`schoolnaam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usermail`, `username`, `wachtwoord`, `vorig_wachtwoord`, `profile_picture`, `schoolnaam`, `laatste_login`, `aantal_foute_logins`, `userrole`, `is_verified`, `gebanned`) VALUES
('coole.dude@mail.com', 'coole dude', 'hoihoi', '', '', 'voorbeeldschool4', '2019-10-10 14:00:00', 2, 'admin', 1, 0),
('username@email.com', 'username', 'Bl4ck4ndWhite', 'White4ndBl4ck', '', 'voorbeeldschool2', '2019-10-14 02:00:00', 1, 'admin', 1, 0),
('Administrator@mail.com', 'Administrator', 'St@rt123', 'Eind1098', '', 'voorbeeldschool1', '2019-10-16 05:00:00', 3, 'uber-admin', 0, 1),
('alex@mail.com', 'alex', 'Alex', '', '', 'voorbeeldschool3', '2019-10-15 10:00:00', 10, 'user', 0, 1),
('demo@mail.com', 'Demo', 'ThisIsNotAPassword', '', '', 'voorbeeldschool2', '2019-10-11 06:00:00', 13, 'user', 1, 0),
('Pos@mail.com', 'Pos', 'P@ssword', '', '', 'voorbeeldschool4', '2019-10-16 03:00:00', 5, 'user', 1, 0),
('Peter@mail.com', 'peterthepeter', 'P@ssWord345', '', '', 'voorbeeldschool1', '2019-10-09 15:00:00', 2, 'user', 1, 1),
('thebeast@mail.com', 'The Beast', 'ComeAtMe', '', '', 'voorbeeldschool2', '2019-10-24 18:00:00', 6, 'user', 0, 0),
('splosh@mail.com', 'slosh vitamins', 'EatDemVitamins', '', '', 'voorbeeldschool3', '2019-10-15 10:00:00', 9, 'uber-admin', 1, 1),
('incredible@mail.com', 'incredible typewriter', 'TypeWriter567', '', '', 'voorbeeldschool2', '2019-10-17 16:00:00', 2, 'user', 0, 0),
('mugwup@mail.com', 'mugwumpsystemize', 'beAMugWump4Life', 'IDontNeedNoPassword', '', 'voorbeeldschool2', '2019-10-18 04:00:00', 1, 'user', 0, 0),
('crediteur@mail.com', 'crediteur', 'debiteur', '', '', 'voorbeeldschool2', '2019-10-17 07:00:00', 0, 'user', 1, 0),
('debiteur@mail.com', 'debiteur', 'crediteur', 'crediteur<3', '', 'voorbeeldschool2', '2019-10-14 07:00:00', 0, 'user', 1, 0),
('bobcattweed@mail.com', 'bobcattweed', 'BringTheweed', '', '', 'voorbeeldschool3', '2019-10-14 22:00:00', 0, 'admin', 1, 0),
('egg@mail.com', 'eggisland', 'chickenChicken', 'CluckCluck', '', 'voorbeeldschool4', '0000-00-00 00:00:00', 1, 'user', 1, 0);


--
-- Constraints for dumped tables
--

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
