-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hboictmemes
CREATE DATABASE IF NOT EXISTS `hboictmemes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hboictmemes`;

-- Dumping structure for table hboictmemes.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `tagnaam` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagnaam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table hboictmemes.tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT IGNORE INTO `tags` (`tagnaam`) VALUES
	('AdminPost'),
	('Dat-Boi'),
	('Funny'),
	('Halloween'),
	('Hanze'),
	('ICT'),
	('Schooladmin'),
	('Shitpost'),
	('Stenden'),
	('Windesheim');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
