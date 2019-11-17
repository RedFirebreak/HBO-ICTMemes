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
-- Table structure for table `comments`
--

CREATE TABLE if not exists`comments` (
  `comment-ID` int(10) UNSIGNED NOT NULL,
  `meme-ID` int(10) UNSIGNED NOT NULL,
  `user-ID` int(10) UNSIGNED NOT NULL,
  `inhoud` varchar(500) COLLATE utf8_general_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment-ID`),
  ADD KEY `meme-ID` (`meme-ID`),
  ADD KEY `user-ID` (`user-ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`meme-ID`, `user-ID`, `inhoud`, `datum`) VALUES
(4, 12, 'wat een kut meme', '2019-10-28 18:51:24'),
(4, 13, 'hou je bek crediteur', '2019-10-28 18:51:24'),
(4, 12, 'hou jij je bek debiteur', '2019-10-28 18:51:24'),
(7, 1, 'ohne musik wäre das leben ein irrtum', '2019-10-28 18:51:24'),
(8, 4, 'lol of zo', '2019-10-28 18:51:24'),
(9, 5, 'exampletext', '2019-10-28 18:51:24'),
(1, 7, 'mijn favoriete kleur is geel', '2019-10-28 18:51:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`meme-ID`) REFERENCES `meme` (`meme-ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user-ID`) REFERENCES `user` (`user-ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
