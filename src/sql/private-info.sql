-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 08:00 PM
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
-- Table structure for table `private-info`
--

CREATE TABLE `private-info` (
  `user-ID` int(10) UNSIGNED NOT NULL,
  `voornaam` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `achternaam` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `adres` varchar(20) COLLATE utf8_general_ci DEFAULT NULL,
  `postcode` varchar(7) COLLATE utf8_general_ci DEFAULT NULL,
  `land` varchar(30) COLLATE utf8_general_ci DEFAULT NULL,
  `geboortedatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `private-info`
--
ALTER TABLE `private-info`
  ADD PRIMARY KEY (`user-ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `private-info`
--
ALTER TABLE `private-info`
  ADD CONSTRAINT `private-info_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
