-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_categories
CREATE TABLE IF NOT EXISTS `hrm_categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(200) NOT NULL,
  `shortName` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Categories des agents';

-- Listage des données de la table afri_human_ressources_db.hrm_categories : ~6 rows (environ)
/*!40000 ALTER TABLE `hrm_categories` DISABLE KEYS */;
INSERT INTO `hrm_categories` (`categoryId`, `categoryName`, `shortName`, `createdAt`) VALUES
	(2, 'Directeur Marketing', 'DM', '2020-11-02 15:09:32'),
	(3, 'Chef du personnel', 'CP', '2022-07-22 08:31:34'),
	(5, 'Directeur G&eacute;n&eacute;ral', 'DG', '2022-10-23 19:59:17'),
	(6, 'Agent de r&eacute;couvrement', 'AR', '2022-10-25 17:00:20'),
	(7, 'Marketer', 'MKT', '2022-11-01 15:10:24'),
	(8, 'M&eacute;canicien', 'MCN', '2022-11-04 12:58:27'),
	(9, 'Autre', 'Autre', '2022-11-04 12:58:50');
/*!40000 ALTER TABLE `hrm_categories` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_employees
CREATE TABLE IF NOT EXISTS `hrm_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amountSmig` double NOT NULL DEFAULT '0',
  `profilePicture` varchar(250) NOT NULL DEFAULT '009-man-4.png',
  `categoryId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dateEngagement` varchar(100) DEFAULT NULL,
  `employeeType` enum('Simple Employé','Manager') NOT NULL DEFAULT 'Simple Employé',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricule` (`matricule`),
  KEY `FK_Services` (`serviceId`),
  KEY `FK_Categories` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table afri_human_ressources_db.hrm_employees : ~20 rows (environ)
/*!40000 ALTER TABLE `hrm_employees` DISABLE KEYS */;
INSERT INTO `hrm_employees` (`id`, `matricule`, `firstName`, `lastName`, `phone`, `address`, `email`, `amountSmig`, `profilePicture`, `categoryId`, `serviceId`, `gender`, `dateEngagement`, `employeeType`) VALUES
	(1, 'K-LOSJH001', 'Huguette', 'Banze', '+2349993839', 'Mancity', 'huguette@gmail.com', 100, '1666739674_2c21a06f33c18990c2c3.png', 2, 4, 'F', NULL, 'Manager'),
	(2, 'K-LOSJH0012', 'Nestor', 'Banze', '+2349873839', 'Lubumbashi', 'nestorbanze@afrinewsoft.com', 80, '009-man-4.png', 2, 2, 'M', NULL, 'Manager'),
	(4, 'MATRICULE', 'Eric', 'Banze', '09099399', 'Bel-aire', 'erick4ddd@gmail.com', 0, '9a52dd43663025be1700b4ca114a209c.jpeg', 1, 4, 'F', NULL, 'Simple Employé'),
	(13, 'IVu8BnQGoq', 'EricKAsk', 'UGDH', '3393033', 'hdhdd', '', 0, '009-man-4.png', 1, 2, 'M', NULL, 'Simple Employé'),
	(14, 'MAT0934', 'Erick', 'Kas', '3393033', 'Ruasgi', 'erick@gmail.cd', 25, '1666739660_11566ec8d35e8d9fa9cf.png', 7, 1, 'F', NULL, ''),
	(16, 'GCfyaCDsuL', 'Edhdj', 'hdd', '3393033', 'hhd', '', 0, '009-man-4.png', 1, 2, 'F', NULL, 'Simple Employé'),
	(17, 'Kitenge', 'Fga', 'Kitenge', '0973393033', 'Kalubwe', 'kitenge@gmail.com', 40, '009-man-4.png', 3, 2, 'M', NULL, 'Simple Employé'),
	(18, 'ZIXGtepD96', 'John', 'Kalenga', '3393033', 'hhd', '', 0, '009-man-4.png', 1, 1, 'M', NULL, 'Simple Employé'),
	(19, 'MBPEOL', 'Kas', 'Ilunga', '839393933', 'kalemie', 'kas@gmail.com', 0, '009-man-4.png', 1, 1, 'M', NULL, 'Simple Employé'),
	(21, '6YYZY', 'Erick', 'Buloba', '0939393939', 'Lubumbashi RDC', 'erickbanze@gmail.com', 300, '1666652082_c1da1d13d1c438fe94c0.png', 3, 2, 'M', NULL, 'Manager'),
	(22, 'DY76', 'Lufungulo', 'Luf', '9929922', 'Man city', 'luf@gmail.com', 100, '1666739595_7f1f303f996b3c925531.png', 3, 3, 'M', NULL, ''),
	(23, 'UEYEUE', 'Makabu', 'Ilunga', '928292', 'Lushi', 'email@gmail.com', 0, '1666739535_0b6afcbc52099432a09e.png', 4, 1, 'F', NULL, 'Simple Employé'),
	(24, 'GeWRF', 'Banze', 'Erick', '882929', '3373', 'bn@bgn.com', 200, '1666651318_99b6e27c3a2ddcbe75ac.png', 5, 4, 'M', NULL, 'Manager'),
	(25, 'IRE6N', 'IRENE', 'BANZE', '83933999', 'Man city', 'eroee@gmail.col', 200, '1666739509_5494176c3dc8b6aca3e9..png', 2, 8, 'F', NULL, ''),
	(26, '60W7aET', 'Nathan', 'Omatuku', '98948494478', 'Quartier Kampemba', 'nathan@gmail.com', 30, '1666742553_ac31f4b807f4592e53a9.png', 6, 4, 'M', NULL, ''),
	(27, 'AMjI', 'Philippe', 'Ngoy', '08128838338', 'Bel-air ', 'philippe@gmail.com', 25, '1667081192_582e099c2cd382d60a9c.png', 6, 3, 'M', NULL, ''),
	(28, '9PnftuP', 'Christian', 'MUKENDI', '08876585', 'LUBUMBASHI', 'mukendichris2021@gmail.com', 150, '1667340788_211bfb4f3ed6b2b2637d.png', 3, 4, 'M', NULL, 'Simple Employé'),
	(29, 'GmKxn', 'Fidel', 'Banze', '0992698105', 'Lubumbashi, Rdc', 'fidel@gmail.com', 50, '009-man-4.png', 6, 6, 'M', NULL, 'Simple Employé'),
	(30, 'jqBEo', 'Tarciss', 'Mbuyi', '93039393', 'Lushi, rdc', 'tarciss@gmail.com', 70, '009-man-4.png', 8, 6, 'M', NULL, 'Manager'),
	(31, '7os85', 'Tarciss', 'Mbuyi', '93039393', 'Lushi, rdc', 'tarciss@gmail.com', 70, '009-man-4.png', 8, 6, 'M', NULL, 'Manager');
/*!40000 ALTER TABLE `hrm_employees` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_payments
CREATE TABLE IF NOT EXISTS `hrm_payments` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) NOT NULL,
  `daysWorked` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `updatedAt` date NOT NULL,
  `paymentMonth` int(11) NOT NULL,
  `paymentYear` int(11) NOT NULL,
  `baseSalary` double NOT NULL,
  `primes` double NOT NULL DEFAULT '0',
  `advantages` double NOT NULL DEFAULT '0',
  `baseSalaryRequired` double NOT NULL,
  `locationIndemnity` double NOT NULL,
  `transportIndemnity` double NOT NULL,
  `bruteRemuneration` double NOT NULL,
  `cnssQpo` double NOT NULL,
  `cnssQpp` double NOT NULL,
  `inpp` double NOT NULL,
  `onem` double NOT NULL,
  `ipr` double NOT NULL,
  `netSalary` double NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table afri_human_ressources_db.hrm_payments : ~0 rows (environ)
/*!40000 ALTER TABLE `hrm_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `hrm_payments` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_pointages
CREATE TABLE IF NOT EXISTS `hrm_pointages` (
  `taillyId` int(11) NOT NULL AUTO_INCREMENT,
  `employeId` int(11) NOT NULL,
  `taillyYear` year(4) NOT NULL,
  `yearId` int(11) NOT NULL DEFAULT '1',
  `taillyMonth` varchar(50) NOT NULL,
  `taillyDate` date NOT NULL,
  `taillyHour` time NOT NULL,
  `taillyMotif` varchar(50) NOT NULL DEFAULT '0',
  `taillyStatus` int(11) NOT NULL DEFAULT '1',
  `taillyPoint` int(11) NOT NULL DEFAULT '1',
  `userId` int(11) NOT NULL,
  `ip_adress` varchar(250) NOT NULL,
  PRIMARY KEY (`taillyId`),
  KEY `fk_agent` (`employeId`),
  KEY `fk_user` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Table de Pointages journaliiers pour les agents';

-- Listage des données de la table afri_human_ressources_db.hrm_pointages : ~32 rows (environ)
/*!40000 ALTER TABLE `hrm_pointages` DISABLE KEYS */;
INSERT INTO `hrm_pointages` (`taillyId`, `employeId`, `taillyYear`, `yearId`, `taillyMonth`, `taillyDate`, `taillyHour`, `taillyMotif`, `taillyStatus`, `taillyPoint`, `userId`, `ip_adress`) VALUES
	(3, 14, '2022', 1, '10', '2022-10-25', '14:10:54', 'Avant-midi', 1, 1, 1, ''),
	(4, 2, '2022', 1, '10', '2022-10-25', '14:11:05', 'Avant-midi', 1, 1, 1, ''),
	(5, 17, '2022', 1, '10', '2022-10-25', '14:11:11', 'Avant-midi', 1, 1, 1, ''),
	(6, 24, '2022', 1, '10', '2022-10-25', '14:11:26', 'Avant-midi', 1, 1, 1, ''),
	(7, 1, '2022', 1, '10', '2022-10-25', '22:42:20', 'Avant-midi', 1, 1, 1, ''),
	(8, 21, '2022', 1, '10', '2022-10-25', '22:42:26', 'Avant-midi', 1, 1, 1, ''),
	(9, 26, '2022', 1, '10', '2022-10-26', '02:04:33', 'Après-midi', 1, 1, 1, ''),
	(10, 27, '2022', 1, '10', '2022-10-29', '23:46:55', 'Avant-midi', 1, 1, 6, ''),
	(11, 14, '2022', 1, '10', '2022-10-29', '23:54:27', 'Avant-midi', 1, 1, 6, ''),
	(12, 23, '2022', 1, '10', '2022-10-29', '23:54:31', 'Avant-midi', 1, 1, 6, ''),
	(13, 2, '2022', 1, '10', '2022-10-29', '23:54:33', 'Avant-midi', 1, 1, 6, ''),
	(14, 17, '2022', 1, '10', '2022-10-29', '23:54:35', 'Avant-midi', 1, 1, 6, ''),
	(15, 14, '2022', 1, '10', '2022-10-31', '20:30:45', 'Avant-midi', 1, 1, 7, ''),
	(16, 23, '2022', 1, '10', '2022-10-31', '20:30:53', 'Avant-midi', 1, 1, 7, ''),
	(17, 2, '2022', 1, '10', '2022-10-31', '20:30:57', 'Avant-midi', 1, 1, 7, ''),
	(18, 17, '2022', 1, '10', '2022-10-31', '20:30:59', 'Avant-midi', 1, 1, 7, ''),
	(19, 21, '2022', 1, '10', '2022-10-31', '20:31:03', 'Avant-midi', 1, 1, 7, ''),
	(20, 25, '2022', 1, '10', '2022-10-31', '20:31:05', 'Avant-midi', 1, 1, 7, ''),
	(21, 22, '2022', 1, '10', '2022-10-31', '20:31:06', 'Avant-midi', 1, 1, 7, ''),
	(22, 27, '2022', 1, '10', '2022-10-31', '20:31:07', 'Avant-midi', 1, 1, 7, ''),
	(23, 1, '2022', 1, '10', '2022-10-31', '20:31:11', 'Avant-midi', 1, 1, 7, ''),
	(24, 24, '2022', 1, '10', '2022-10-31', '20:31:14', 'Avant-midi', 1, 1, 7, ''),
	(25, 26, '2022', 1, '10', '2022-10-31', '20:31:18', 'Avant-midi', 1, 1, 7, ''),
	(26, 28, '2022', 1, '11', '2022-11-02', '00:14:47', 'Après-midi', 1, 1, 1, ''),
	(27, 24, '2022', 1, '11', '2022-11-05', '16:06:07', 'Avant-midi', 1, 1, 1, ''),
	(28, 24, '2022', 1, '11', '2022-11-05', '16:06:07', 'Après-midi', 1, 1, 1, 'null'),
	(29, 24, '2022', 1, '11', '2022-11-04', '16:06:07', 'Après-midi', 1, 1, 1, 'null'),
	(30, 24, '2022', 1, '11', '2022-11-04', '16:06:07', 'Avant-midi', 1, 1, 1, 'null'),
	(31, 28, '2022', 1, '11', '2022-11-05', '19:28:51', 'Avant-midi', 1, 1, 1, 'null'),
	(32, 28, '2022', 1, '11', '2022-11-05', '19:28:51', 'Après-midi', 1, 1, 1, 'null'),
	(33, 28, '2022', 1, '11', '2022-11-04', '19:28:51', 'Après-midi', 1, 1, 1, 'null'),
	(34, 28, '2022', 1, '11', '2022-11-03', '19:28:51', 'Après-midi', 1, 1, 1, 'null');
/*!40000 ALTER TABLE `hrm_pointages` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_services
CREATE TABLE IF NOT EXISTS `hrm_services` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(200) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Services où sont affectés les personnels';

-- Listage des données de la table afri_human_ressources_db.hrm_services : ~8 rows (environ)
/*!40000 ALTER TABLE `hrm_services` DISABLE KEYS */;
INSERT INTO `hrm_services` (`serviceId`, `serviceName`) VALUES
	(1, 'Département de Finance'),
	(2, 'Département Comptable'),
	(3, 'Département Technique et Production'),
	(4, 'Administratif'),
	(5, 'Département de Traitement'),
	(6, 'Département Charoit Automobile'),
	(7, 'Département de Sécurité'),
	(8, 'Département Marketing');
/*!40000 ALTER TABLE `hrm_services` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_smigs
CREATE TABLE IF NOT EXISTS `hrm_smigs` (
  `smigId` int(11) NOT NULL AUTO_INCREMENT,
  `smig_amount` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`smigId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Salaire de base fixé pour chaque catégorie des agents';

-- Listage des données de la table afri_human_ressources_db.hrm_smigs : ~3 rows (environ)
/*!40000 ALTER TABLE `hrm_smigs` DISABLE KEYS */;
INSERT INTO `hrm_smigs` (`smigId`, `smig_amount`, `currency`, `category_id`, `created_at`, `updated_at`) VALUES
	(3, '210', 'USD', 5, '2022-10-24 00:14:53', NULL),
	(4, '200', 'USD', 4, '2022-10-25 06:58:00', NULL),
	(5, '120', 'USD', 3, '2022-10-25 06:58:16', NULL),
	(6, '100', 'USD', 2, '2022-10-25 13:53:15', NULL),
	(7, '40', 'USD', 6, '2022-10-25 17:00:51', NULL),
	(8, '20', 'USD', 7, '2022-11-01 15:10:45', NULL),
	(9, '', '', 0, '2022-11-02 12:45:30', NULL);
/*!40000 ALTER TABLE `hrm_smigs` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_tauxtransports
CREATE TABLE IF NOT EXISTS `hrm_tauxtransports` (
  `tauxId` int(11) NOT NULL AUTO_INCREMENT,
  `yearId` int(11) NOT NULL,
  `tauxMonth` varchar(50) NOT NULL,
  `amountManager` double NOT NULL,
  `amountSimpleEmployee` double NOT NULL,
  `createdAt` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`tauxId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Fixation de taux de transport';

-- Listage des données de la table afri_human_ressources_db.hrm_tauxtransports : ~12 rows (environ)
/*!40000 ALTER TABLE `hrm_tauxtransports` DISABLE KEYS */;
INSERT INTO `hrm_tauxtransports` (`tauxId`, `yearId`, `tauxMonth`, `amountManager`, `amountSimpleEmployee`, `createdAt`, `userId`, `status`) VALUES
	(1, 1, '01', 1, 0.5, '2022-11-09 00:00:00', 1, ''),
	(2, 1, '09', 1, 0.5, '2022-11-09 00:00:00', 1, ''),
	(3, 1, '10', 1, 0.5, '2022-11-09 00:00:00', 1, ''),
	(4, 1, '11', 1, 0.5, '2022-11-09 00:00:00', 1, '1'),
	(5, 1, '02', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(6, 1, '03', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(7, 1, '04', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(8, 1, '05', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(9, 1, '06', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(10, 1, '07', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(11, 1, '08', 1, 0.5, '2022-11-11 00:00:00', 1, ''),
	(12, 1, '12', 1, 0.5, '2022-11-11 00:00:00', 1, '');
/*!40000 ALTER TABLE `hrm_tauxtransports` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_users
CREATE TABLE IF NOT EXISTS `hrm_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_status` int(5) NOT NULL DEFAULT '1',
  `user_image` varchar(100) NOT NULL,
  `user_signature` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table afri_human_ressources_db.hrm_users : ~2 rows (environ)
/*!40000 ALTER TABLE `hrm_users` DISABLE KEYS */;
INSERT INTO `hrm_users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`, `user_status`, `user_image`, `user_signature`) VALUES
	(1, 'Erick Banze', '$2y$10$BFSPHMybpVXyzUU/t5ZxpuyQcGf6sF934qARS2O5Cs7ppfWZTp4Gu', 'erickbanze4@gmail.com', 'Admin', 1, 'user-default-avatar.png', NULL),
	(8, 'Christian', '$2y$10$aJxZTWq985HRCHT5dsHp8OGVi.UoRSaRFwhNYrRpp9zMrnVvpzcYC', 'mukendichris2021@gmail.com', 'Admin', 1, 'user-default-avatar.png', NULL);
/*!40000 ALTER TABLE `hrm_users` ENABLE KEYS */;

-- Listage de la structure de la table afri_human_ressources_db. hrm_years
CREATE TABLE IF NOT EXISTS `hrm_years` (
  `yearId` int(11) NOT NULL AUTO_INCREMENT,
  `yearName` year(4) NOT NULL,
  PRIMARY KEY (`yearId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table afri_human_ressources_db.hrm_years : ~8 rows (environ)
/*!40000 ALTER TABLE `hrm_years` DISABLE KEYS */;
INSERT INTO `hrm_years` (`yearId`, `yearName`) VALUES
	(1, '2022'),
	(2, '2023'),
	(3, '2024'),
	(4, '2025'),
	(5, '2026'),
	(6, '2027'),
	(7, '2027'),
	(8, '2028'),
	(9, '2029'),
	(10, '2030');
/*!40000 ALTER TABLE `hrm_years` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
