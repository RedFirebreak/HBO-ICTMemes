-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 08:05 PM
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
-- Database: `hbo-ictmemes`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment-report`
--

CREATE TABLE if not exists `comment-report` (
  `report-ID` int(10) UNSIGNED NOT NULL,
  `comment-ID` int(10) UNSIGNED NOT NULL,
  `snitch-ID` int(10) UNSIGNED DEFAULT NULL,
  `boef-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `overtreding` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `beschrijving` varchar(300) COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment-report`
--
ALTER TABLE `comment-report`
  ADD PRIMARY KEY if not exists(`report-ID`),
  ADD KEY if not exists`comment-ID` (`comment-ID`),
  ADD KEY if not exists`snitch-ID` (`snitch-ID`),
  ADD KEY if not exists`boef-ID` (`boef-ID`),
  ADD KEY if not exists`overtreding` (`overtreding`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment-report`
--
ALTER TABLE `comment-report`
  MODIFY `report-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dumping data for table `comment-report`
--

INSERT INTO `comment-report` (`comment-ID`, `snitch-ID`, `boef-ID`, `datum`, `overtreding`, `beschrijving`) VALUES
(5, 4, 4, '2019-10-28 19:04:45', 'verkeerde huidskleur', 'lololol, casual racism'),
(7, 6, 7, '2019-10-28 19:04:45', 'racisme', 'kleuren zijn racistisch'),
(1, 1, 12, '2019-10-28 19:04:45', 'dt-fout', 'kut moet met een d'),
(2, 15, 13, '2019-10-28 19:04:45', 'stom gezicht', 'gewoon een stom gezicht');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
