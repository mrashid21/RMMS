-- Dumping database structure for rmms
CREATE DATABASE IF NOT EXISTS `rmms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `rmms`;

-- Dumping structure for table rmms.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
-- Dumping structure for table rmms.checklist
CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` int(11) NOT NULL DEFAULT '0',
  `task` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
-- Dumping structure for table rmms.contributer
CREATE TABLE IF NOT EXISTS `contributer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `researchId` int(11) DEFAULT '0',
  `contributerId` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This is a table to represent the contributers of each research.';

-- Data exporting was unselected.
-- Dumping structure for table rmms.new_notes
CREATE TABLE IF NOT EXISTS `new_notes` (
  `id` int(10) unsigned zerofill NOT NULL,
  `meetingTtile` varchar(255) COLLATE utf8_bin NOT NULL,
  `trn_date` date NOT NULL,
  `noteTitle` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  `submittedby` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
-- Dumping structure for table rmms.progress
CREATE TABLE IF NOT EXISTS `progress` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memberId` int(11) DEFAULT NULL,
  `name` char(200) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `stage` char(10) COLLATE utf8_bin DEFAULT NULL,
  `completion` char(10) COLLATE utf8_bin DEFAULT NULL,
  `contributers` char(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
-- Dumping structure for table rmms.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `researchId` int(11) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `completion` tinyint(3) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `done` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This a table to represesnt the tasks of every research. \r\n';

-- Data exporting was unselected.
-- Dumping structure for table rmms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricNumber` varchar(12) COLLATE utf8_bin DEFAULT '0',
  `firstName` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `lastName` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `email` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `password` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `userType` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `profileImage` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `bio` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `timeCreated` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
-- Dumping structure for table rmms.user_supervisor
CREATE TABLE IF NOT EXISTS `user_supervisor` (
  `studentId` int(11) NOT NULL,
  `supervisorId` int(11) NOT NULL,
  KEY `studentId` (`studentId`),
  KEY `supervisorId` (`supervisorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
