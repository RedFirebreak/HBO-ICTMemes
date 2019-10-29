-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 04:48 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
-- Table structure for table `emailverificatie`
--

CREATE TABLE if not exists`emailverificatie` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `usermail` varchar(50) COLLATE utf8_bin NOT NULL,
  `verificatiecode` int(10) UNSIGNED NOT NULL,
  `geverifieerd` tinyint(1) NOT NULL DEFAULT 0,
  `geverifieerd_door` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emailverificatie`
--

INSERT INTO `emailverificatie` (`user-ID`, `usermail`, `verificatiecode`, `geverifieerd`, `geverifieerd_door`) VALUES
(1, 'coole.dude@mail.com', 1234, 1, 5),
(2, 'username@email.com', 2345, 1, 8),
(3, 'Administrator@mail.com', 3456, 0, NULL),
(4, 'alex@mail.com', 4567, 0, NULL),
(5, 'demo@mail.com', 5678, 1, 9),
(6, 'Pos@mail.com', 6789, 1, 13),
(7, 'Peter@mail.com', 1122, 1, 12),
(8, 'thebeast@mail.com', 1133, 0, NULL),
(9, 'splosh@mail.com', 2244, 1, 2),
(10, 'incredible@mail.com', 3355, 0, NULL),
(11, 'mugwup@mail.com', 4466, 0, NULL),
(12, 'crediteur@mail.com', 6688, 1, 1),
(13, 'debiteur@mail.com', 8800, 1, 4),
(14, 'bobcattweed@mail.com', 3355, 1, 4),
(15, 'egg@mail.com', 5577, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD PRIMARY KEY if not exists(`user-ID`),
  ADD KEY if not exists`usermail` (`usermail`),
  ADD KEY if not exists`geverifieerd_door` (`geverifieerd_door`),
  ADD KEY if not exists`geverifieerd` (`geverifieerd`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD CONSTRAINT `emailverificatie_ibfk_1` FOREIGN KEY (`geverifieerd_door`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `emailverificatie_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `emailverificatie_ibfk_3` FOREIGN KEY (`usermail`) REFERENCES `user` (`usermail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emailverificatie_ibfk_4` FOREIGN KEY (`geverifieerd`) REFERENCES `user` (`is_verified`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
