-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 11:58 AM
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

--
-- Dumping data for table `private-info`
--

INSERT INTO `private-info` (`user-ID`, `voornaam`, `achternaam`, `adres`, `postcode`, `land`, `geboortedatum`) VALUES
(1, 'Bob', 'Zeeman', 'Plantsoenlaan 234', '1234AB', 'Nederland', '2000-02-07'),
(2, 'Sanne', 'De Boer', 'Straatlaan 2', '2345BC', 'Nederland', '2000-03-13'),
(3, 'Bas', 'Fietser', 'Gootstraat 45', '3456CD', 'Nederland', '2000-12-31'),
(4, 'Alex', 'Man', 'Rivierenlaan 3', '4567DE', 'Nederland', '2000-11-11'),
(5, 'Robert', 'Van Dijk', 'Zeemanstraat 5', '5678EF', 'Nederland', '1997-10-31'),
(6, 'Alberta', 'De Boer', 'Boerengat 33', '6789FG', 'Nederland', '1998-10-10'),
(7, 'Peter', 'Pan', 'Neverland 34', '1357GH', 'Nederland', '1999-09-29'),
(8, 'Daniëlle', 'Schrijver', 'Slootstraat 5', '2468IJ', 'Nederland', '2000-07-20'),
(9, 'Bastiaan', 'De Jong', 'Schoolstraat 67', '1245JK', 'Nederland', '1990-05-31'),
(10, 'Samantha', 'Bakker', 'lantaarnpaalstraat 7', '2356KL', 'Nederland', '1992-06-16'),
(11, 'Klaas', 'Vaak', 'Slaapstraat 56', '3467LM', 'Nederland', '1996-07-30'),
(12, 'Jopie', 'Zwemmer', 'looplaan 5', '5689MN', 'Nederland', '2001-07-07'),
(13, 'Henk', 'Vlieger', 'Startbaanstraat 6', '2143NO', 'Nederland', '2002-03-03'),
(14, 'Pa', 'Tat', 'Aardappellaan 49', '4365OP', 'Nederland', '1997-12-12'),
(15, 'Ted', 'Water', 'Dennenlaan 5', '6587QW', 'Nederland', '1998-08-08');

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
