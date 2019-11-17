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
CREATE DATABASE IF NOT EXISTS `hbo-ictmemes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hbo-ictmemes`;

-- Dumping structure for table hboictmemes.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `tag-ID` int(10) UNSIGNED NOT NULL,
  `tagnaam` varchar(30) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tag-ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

	
	--
-- AUTO_INCREMENT voor een tabel `support`
--
ALTER TABLE `tags`
  MODIFY `tag-ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
-- Dumping data for table hboictmemes.tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT IGNORE INTO `tags` (`tagnaam`) VALUES
	('AdminPost'),
	('Funny'),
	('Animals'),
	('Anime & Manga'),
	('Anime Waifu'),
	('Anime Wallpaper'),
	('Apex Legends'),
	('Ask 9GAG'),
	('Awesome'),
	('Car'),
	('Comic & Webtoon'),
	('Cosplay'),
	('Countryballs'),
	('Cozy & Comfy'),
	('Crappy Design'),
	('Drawing, DIY & Crafts'),
	('Food & Drinks'),
	('Football'),
	('Fortnite'),
	('Game of Thrones ⚔️'),
	('Gaming'),
	('GIF'),
	('History'),
	('Horror'),
	('K-Pop'),
	('Latest News'),
	('League of Legends'),
	('LEGO'),
	('Marvel & DC'),
	('Meme'),
	('Movie & TV'),
	('Music'),
	('NBA'),
	('Overwatch'),
	('PC Master Race'),
	('Pokémon'),
	('Politics'),
	('Relationship'),
	('Savage'),
	('Satisfying'),	
	('Science & Tech'),
	('Star Wars'),
	('Sport'),
	('Wallpaper'),
	('Wholesome:heartbeat:'),
	('WTF'),
	('Dark Humor'),
	('Relationship'),
	('Shitpost'),
	('ICT')


/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
