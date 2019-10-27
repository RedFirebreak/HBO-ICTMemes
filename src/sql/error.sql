-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 04:36 PM
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
-- Table structure for table `error`
--

CREATE TABLE `error` (
  `error-ID` int(10) UNSIGNED NOT NULL,
  `locatie` varchar(200) COLLATE utf8_bin NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `soort` varchar(30) COLLATE utf8_bin NOT NULL,
  `bericht` varchar(1024) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `error`
--

INSERT INTO `error` (`error-ID`, `locatie`, `datum`, `soort`, `bericht`) VALUES
(0, 'Homepage', '2019-10-27 16:25:22', 'ERROR', 'Ahh shit here we go again'),
(0, 'Homepage', '2019-10-27 16:29:47', 'ERROR', 'Why did this happen to meeee! I\'ve made my mistakaaaakes! Got nowhere to run! The night goes on! as im, fading away!'),
(0, 'Homepage', '2019-10-27 16:30:18', 'CRITICAL', 'Somebody is singing songs in our error log >:('),
(0, 'Homepage', '2019-10-27 16:34:24', 'CRITICAL', 'WHO\'S DONE IT'),
(0, 'Homepage', '2019-10-27 16:34:45', 'ERROR', 'STEFAN DID IT AGAIN DIDN\'T HE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
