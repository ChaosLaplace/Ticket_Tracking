-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        5.7.26 - MySQL Community Server (GPL)
-- 伺服器作業系統:                      Win64
-- HeidiSQL 版本:                  11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 傾印 project 的資料庫結構
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project`;

-- 傾印  資料表 project.list 結構
CREATE TABLE IF NOT EXISTS `list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `level` enum('A','B','C') NOT NULL,
  `priority` tinyint(3) unsigned NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- 正在傾印表格  project.list 的資料：1 rows
DELETE FROM `list`;
/*!40000 ALTER TABLE `list` DISABLE KEYS */;
INSERT INTO `list` (`id`, `title`, `content`, `level`, `priority`, `create_time`, `update_time`) VALUES
	(1, 'test', '123', 'A', 1, '2021-11-08 18:24:46', '2021-11-08 18:24:47'),
	(2, 'tes', '12', 'B', 1, '2021-11-08 18:28:11', '2021-11-08 18:28:22'),
	(3, 'te', '1', 'B', 2, '2021-11-08 18:28:21', '2021-11-08 18:28:21');
/*!40000 ALTER TABLE `list` ENABLE KEYS */;

-- 傾印  資料表 project.user 結構
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `authority` enum('MANAGER','QA','RD','PM') NOT NULL,
  `account` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- 正在傾印表格  project.user 的資料：1 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `authority`, `account`, `password`) VALUES
	(1, 'hank', 'MANAGER', '123', '123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
