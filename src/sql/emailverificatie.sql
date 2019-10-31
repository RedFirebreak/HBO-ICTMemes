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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD PRIMARY KEY (`verificatie-ID`),
  ADD KEY `geverifieerd_door` (`geverifieerd_door`),
  ADD KEY `geverifieerd` (`geverifieerd`),
  ADD KEY `user-ID` (`user-ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  MODIFY `verificatie-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emailverificatie`
--
ALTER TABLE `emailverificatie`
  ADD CONSTRAINT `emailverificatie_ibfk_1` FOREIGN KEY (`geverifieerd_door`) REFERENCES `user` (`user-ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `emailverificatie_ibfk_5` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
