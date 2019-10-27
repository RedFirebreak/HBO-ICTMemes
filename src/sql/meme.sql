-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 10:28 PM
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
-- Table structure for table `meme`
--

CREATE TABLE `meme` (
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `meme-titel` varchar(30) COLLATE utf8_bin NOT NULL,
  `user-ID` int(10) UNSIGNED DEFAULT NULL,
  `datum` date NOT NULL,
  `tagnaam` varchar(20) COLLATE utf8_bin NOT NULL,
  `locatie` varchar(200) COLLATE utf8_bin NOT NULL,
  `school` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `meme`
--

INSERT INTO `meme` (`meme-ID`, `meme-titel`, `user-ID`, `datum`, `tagnaam`, `locatie`, `school`) VALUES
(1, 'Memey-boi1', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool1'),
(2, 'Memey-boi2', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool1'),
(3, 'Memey-boi3', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool2'),
(4, 'Memey-boi4', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool2'),
(5, 'Memey-boi5', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool3'),
(6, 'Memey-boi6', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool3'),
(7, 'Memey-boi7', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool4'),
(8, 'Memey-boi8', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool4'),
(9, 'Memey-boi9', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool1'),
(10, 'Memey-boi10', 5, '2019-10-24', 'Hanze', '/memestorage/oktober/', 'voorbeeldschool3');

--
-- Indexes for dumped tables
--

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
  ADD KEY `tagnaam` (`tagnaam`),
  ADD KEY `school` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meme`
--
ALTER TABLE `meme`
  MODIFY `meme-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meme`
--
ALTER TABLE `meme`
  ADD CONSTRAINT `meme_ibfk_1` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`),
  ADD CONSTRAINT `meme_ibfk_2` FOREIGN KEY (`tagnaam`) REFERENCES `tags` (`tagnaam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
