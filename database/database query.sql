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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rmms.activities: ~0 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` (`id`, `memberId`, `name`, `time`) VALUES
	(1, 1, 'Loged in Successfully', '2019-05-28 07:09:19'),
	(2, 1, 'Created a new research', '2019-05-28 07:11:42'),
	(3, 1, 'Created a new task to research phase', '2019-05-28 07:12:09'),
	(4, 1, 'Logged out', '2019-05-28 07:47:44'),
	(5, 2, 'Loged in Successfully', '2019-05-28 07:47:50');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;

-- Dumping structure for table rmms.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `SupervisorID` int(11) NOT NULL,
  `SupervisorName` varchar(50) COLLATE utf8_bin NOT NULL,
  `AppointmentSubject` varchar(50) COLLATE utf8_bin NOT NULL,
  `AppointmentDate` varchar(50) COLLATE utf8_bin NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  PRIMARY KEY (`AppointmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `appointment` (`AppointmentID`, `SupervisorName`, `AppointmentSubject`, `AppointmentDate`, `StartTime`, `EndTime`) VALUES
(3, 'Prof Maria', 'Web Programming', '2019-05-15', '13:58:00', '23:59:00'),
(5, 'Prof Maria', 'ormms', '2019-05-16', '12:30:00', '13:30:00'),
(7, 'Prof Maria', 'ormms', '2019-05-16', '12:30:00', '13:30:00'),
(8, 'Prof Asmira', 'Web Programming', '2019-05-24', '23:20:00', '12:00:00');

-- Dumping data for table rmms.appointment: ~0 rows (approximately)
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- Dumping structure for table rmms.checklist
CREATE TABLE IF NOT EXISTS `checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` int(11) NOT NULL DEFAULT '0',
  `task` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rmms.checklist: ~0 rows (approximately)
/*!40000 ALTER TABLE `checklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `checklist` ENABLE KEYS */;

-- Dumping structure for table rmms.contributer
CREATE TABLE IF NOT EXISTS `contributer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `researchId` int(11) DEFAULT '0',
  `contributerId` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This is a table to represent the contributers of each research.';

-- Dumping data for table rmms.contributer: ~0 rows (approximately)
/*!40000 ALTER TABLE `contributer` DISABLE KEYS */;
/*!40000 ALTER TABLE `contributer` ENABLE KEYS */;

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

INSERT INTO `new_notes` (`id`, `meetingTitle`, `trn_date`, `noteTitle`, `content`, `submittedby`) VALUES
(49, 'Web Programming', '2019-05-27', 'ORMMS2', 'content', ''),
(50, 'Web Programming', '2019-05-27', 'ORMMS2', 'content', ''),
(52, 'Web Programming', '2019-05-27', 'Assignment3', 'lkkk', '');

-- Dumping data for table rmms.new_notes: ~0 rows (approximately)
/*!40000 ALTER TABLE `new_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_notes` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rmms.progress: ~0 rows (approximately)
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT INTO `progress` (`id`, `memberId`, `name`, `status`, `stage`, `completion`, `contributers`) VALUES
	(001, 1, 'First Phase', 'pending', NULL, '50', '2');
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This a table to represesnt the tasks of every research. \r\n';

-- Dumping data for table rmms.tasks: ~0 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `researchId`, `name`, `completion`, `start_date`, `due_date`, `done`) VALUES
	(1, 1, 'First Task', 80, '2019-05-08', '2019-05-23', 0);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table rmms.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `matricNumber`, `firstName`, `lastName`, `email`, `password`, `userType`, `profileImage`, `bio`, `timeCreated`) VALUES
	(1, 'WIF170714', 'Ayoob', 'Alogaidi', 'ayoob@kk.k', '$2y$10$lj402nBp1aBfTiL9mGFfD.scLh0VxNGHR/dukSuQ5QeZm6WZEjFva', 'student', 'https://api.adorable.io/avatars/160/ayoob.png', '', '2019-05-28'),
	(2, 'WIF170710', 'Salih', 'Zain', 'salih@kk.k', '$2y$10$oYclu3580H5qfdJLzyIFhe.HrAd/pgVAqbeINq4Q1D8fDU8spIcwa', 'supervisor', 'https://api.adorable.io/avatars/160/ayoob.png', '', '2019-05-28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table rmms.user_supervisor
CREATE TABLE IF NOT EXISTS `user_supervisor` (
  `studentId` int(11) NOT NULL,
  `supervisorId` int(11) NOT NULL,
  KEY `studentId` (`studentId`),
  KEY `supervisorId` (`supervisorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

