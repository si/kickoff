# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: kickoff_dev
# Generation Time: 2014-01-16 17:07:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table calendars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `calendars`;

CREATE TABLE `calendars` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `sport_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `calendars` WRITE;
/*!40000 ALTER TABLE `calendars` DISABLE KEYS */;

INSERT INTO `calendars` (`id`, `name`, `description`, `created`, `updated`, `user_id`, `sport_id`)
VALUES
	(1,'Derby County FC','Football fixtures for Derby County','2012-03-13 02:01:32','2012-11-27 10:37:48',1,1),
	(2,'6 Nations KickOff','RBS 6 Nations rugby tournament ','2012-03-13 02:19:40','2012-12-18 23:07:15',1,2),
	(3,'F1 Calendar','','2012-03-13 02:19:52','2012-03-13 02:19:52',0,3),
	(4,'Rugby World Cup','','2012-03-13 02:20:20','2012-03-13 02:20:20',0,2),
	(5,'World Cup KickOff','','2012-03-13 02:20:37','2012-03-13 02:20:37',0,1),
	(6,'Euro KickOff','','2012-03-13 02:20:45','2012-03-13 02:20:45',0,1),
	(11,'International Test Matches','','2013-03-26 08:17:36','2013-03-26 08:17:36',1,11),
	(10,'International Friendlies','','2013-03-26 07:55:17','2013-03-26 07:55:17',1,1),
	(9,'Capital One Cup','English League Cup','2012-12-20 14:15:34','2012-12-20 14:15:34',1,1),
	(12,'Northamptonshire U7s','Under 7s squads from around Northamptonshire ','2013-11-17 08:15:43','2013-11-17 08:15:43',1,1);

/*!40000 ALTER TABLE `calendars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `summary` varchar(50) NOT NULL,
  `home` varchar(100) NOT NULL,
  `away` varchar(100) NOT NULL,
  `group` varchar(30) DEFAULT '',
  `description` text,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT NULL,
  `location` varchar(100) DEFAULT '',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `calendar_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `summary`, `home`, `away`, `group`, `description`, `start`, `end`, `all_day`, `location`, `created`, `updated`, `user_id`, `calendar_id`)
VALUES
	(1,'','Derby County','Nottingham Forest','Championship','','2012-03-13 19:45:00','2012-03-13 21:35:00',0,'Pride Park','2012-03-13 02:02:47','2012-03-13 02:11:05',0,1),
	(2,'','Doncaster Rovers','Derby County','Championship','','2012-03-17 15:00:00','2012-03-17 16:50:00',0,'Keepmoat Stadium','2012-03-13 02:05:14','2012-03-13 02:08:12',0,1),
	(3,'','Brighton & Hove Albion','Derby County','Championship','','2012-03-20 19:45:00','2012-03-20 21:35:00',0,'','2012-03-13 02:07:50','2012-03-13 02:07:50',0,1),
	(4,'','Derby County','Crystal Palace','Championship','','2012-03-24 15:00:00','2012-03-24 16:50:00',0,'Pride Park','2012-03-13 02:09:06','2012-03-13 02:09:06',0,1),
	(5,'','Bristol City','Derby County','Championship','','2012-03-31 15:00:00','2012-03-31 16:50:00',0,'Ashton Gate','2012-03-13 02:10:25','2012-03-13 02:10:25',0,1),
	(96,'Derby County v Ipswich Town','Derby County','Ipswich Town','Football League Championship','','2013-04-06 15:00:00','2013-04-06 16:50:00',0,'Pride Park','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1),
	(97,'Blackburn v Derby County','Blackburn','Derby County','Football League Championship','','2013-04-13 15:00:00','2013-04-13 16:50:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1),
	(98,'Barnsley v Derby County','Barnsley','Derby County','Football League Championship','','2013-04-16 19:45:00','2013-04-16 21:35:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1),
	(99,'Derby County v Peterborough','Derby County','Peterborough','Football League Championship','','2013-04-20 15:00:00','2013-04-20 16:50:00',0,'Pride Park','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1),
	(95,'Leeds United v Derby County','Leeds United','Derby County','Football League Championship','','2013-04-01 19:45:00','2013-04-01 21:35:00',0,'TBC','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1),
	(94,'Derby County v Bristol City','Derby County','Bristol City','Football League Championship','','2013-03-30 15:00:00','2013-03-30 16:50:00',0,'Pride Park','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1),
	(90,'Derby County v Crystal Palace','Derby County','Crystal Palace','Football League Championship','','2013-03-01 19:45:00','2013-03-02 21:40:00',0,'Pride Park','2012-07-01 12:03:31','2013-02-25 08:46:12',1,1),
	(89,'Watford v Derby County','Watford','Derby County','Football League Championship','','2013-02-23 15:00:00','2013-02-23 16:50:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1),
	(88,'Derby County v Bolton','Derby County','Bolton','Football League Championship','','2013-02-19 19:45:00','2013-02-19 21:35:00',0,'Pride Park','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1),
	(87,'Derby County v Wolves','Derby County','Wolves','Football League Championship','','2013-02-16 15:00:00','2013-02-16 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1),
	(86,'Sheffield Wed v Derby County','Sheffield Wed','Derby County','Football League Championship','','2013-02-09 15:00:00','2013-02-09 16:50:00',0,'TBC','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1),
	(78,'Derby County v Hull City','Derby County','Hull City','Football League Championship','','2012-12-22 15:00:00','2012-12-22 16:50:00',0,'Pride Park','2012-07-01 12:03:29','2012-12-19 09:47:54',1,1),
	(77,'Bristol City v Derby County','Bristol City','Derby County','Football League Championship','','2012-12-15 15:00:00','2012-12-15 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1),
	(76,'Derby County v Leeds United','Derby County','Leeds United','Football League Championship','','2012-12-08 15:00:00','2012-12-08 16:50:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1),
	(75,'Leicester City v Derby County','Leicester City','Derby County','Football League Championship','','2012-12-01 17:20:00','2012-12-01 19:00:00',0,'TBC','2012-07-01 12:03:28','2012-12-01 17:05:09',1,1),
	(71,'Millwall v Derby County','Millwall','Derby County','Football League Championship','','2012-11-10 15:00:00','2012-11-10 16:50:00',0,'TBC','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1),
	(70,'Derby County v Barnsley','Derby County','Barnsley','Football League Championship','','2012-11-06 19:45:00','2012-11-06 21:35:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(66,'Derby County v Blackburn','Derby County','Blackburn','Football League Championship','','2012-10-20 15:00:00','2012-10-20 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(65,'Derby County v Brighton','Derby County','Brighton','Football League Championship','','2012-10-06 15:00:00','2012-10-06 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(93,'Derby County v Leicester City','Derby County','Leicester City','Football League Championship','','2013-03-16 15:00:00','2013-03-16 16:50:00',0,'Pride Park','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1),
	(92,'Birmingham v Derby County','Birmingham','Derby County','Football League Championship','','2013-03-09 15:00:00','2013-03-09 16:50:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1),
	(91,'Cardiff City v Derby County','Cardiff City','Derby County','Football League Championship','','2013-03-05 19:45:00','2013-03-05 21:35:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1),
	(84,'Derby County v Blackburn Rovers','Derby County','Blackburn Rovers','FA Cup','FA Cup - Fourth Round','2013-01-26 15:00:00','2013-01-26 16:50:00',0,'Pride Park','2012-07-01 12:03:30','2013-01-15 09:36:17',1,1),
	(83,'Derby County v Nottm Forest','Derby County','Nottm Forest','Football League Championship','','2013-01-19 15:00:00','2013-01-19 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1),
	(74,'Derby County v Cardiff City','Derby County','Cardiff City','Football League Championship','','2012-11-27 19:45:00','2012-11-27 21:35:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1),
	(58,'Wolves v Derby County','Wolves','Derby County','Football League Championship','','2012-08-25 15:00:00','2012-08-25 16:50:00',0,'TBC','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1),
	(85,'Derby County v Huddersfield','Derby County','Huddersfield','Football League Championship','','2013-02-02 15:00:00','2013-02-02 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1),
	(82,'Brighton v Derby County','Brighton','Derby County','Football League Championship','','2013-01-12 15:00:00','2013-01-12 16:50:00',0,'TBC','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1),
	(81,'Derby County v Middlesbrough','Derby County','Middlesbrough','Football League Championship','','2013-01-01 15:00:00','2013-01-01 16:50:00',0,'Pride Park','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1),
	(80,'Charlton v Derby County','Charlton','Derby County','Football League Championship','','2012-12-29 15:00:00','2012-12-29 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1),
	(79,'Burnley v Derby County','Burnley','Derby County','Football League Championship','','2012-12-26 15:00:00','2012-12-26 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1),
	(73,'Derby County v Birmingham','Derby County','Birmingham','Football League Championship','','2012-11-24 15:00:00','2012-11-24 16:50:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1),
	(72,'Crystal Palace v Derby County','Crystal Palace','Derby County','Football League Championship','','2012-11-17 15:00:00','2012-11-17 16:50:00',0,'TBC','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1),
	(69,'Derby County v Blackpool','Derby County','Blackpool','Football League Championship','','2012-11-03 15:00:00','2012-11-03 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(68,'Peterborough v Derby County','Peterborough','Derby County','Football League Championship','','2012-10-27 15:00:00','2012-10-27 16:50:00',0,'TBC','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(67,'Ipswich Town v Derby County','Ipswich Town','Derby County','Football League Championship','','2012-10-23 19:45:00','2012-10-23 21:35:00',0,'TBC','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1),
	(64,'Middlesbrough v Derby County','Middlesbrough','Derby County','Football League Championship','','2012-10-02 19:45:00','2012-10-02 21:35:00',0,'TBC','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1),
	(63,'Nottm Forest v Derby County','Nottm Forest','Derby County','Football League Championship','','2012-09-29 15:00:00','2012-09-29 16:50:00',0,'TBC','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1),
	(62,'Derby County v Burnley','Derby County','Burnley','Football League Championship','','2012-09-22 15:00:00','2012-09-22 16:50:00',0,'Pride Park','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1),
	(61,'Derby County v Charlton','Derby County','Charlton','Football League Championship','','2012-09-18 19:45:00','2012-09-18 21:35:00',0,'Pride Park','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1),
	(60,'Huddersfield v Derby County','Huddersfield','Derby County','Football League Championship','','2012-09-15 15:00:00','2012-09-15 16:50:00',0,'TBC','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1),
	(59,'Derby County v Watford','Derby County','Watford','Football League Championship','','2012-09-01 15:00:00','2012-09-01 16:50:00',0,'Pride Park','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1),
	(57,'Bolton v Derby County','Bolton','Derby County','Football League Championship','','2012-08-21 19:45:00','2012-08-21 21:35:00',0,'TBC','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1),
	(56,'Derby County v Sheffield Wed','Derby County','Sheffield Wed','Football League Championship','','2012-08-18 15:00:00','2012-08-18 16:50:00',0,'Pride Park','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1),
	(55,'Derby County v Scunthorpe','Derby County','Scunthorpe','Football League Cup','','2012-08-14 19:45:00','2012-08-14 21:35:00',0,'Pride Park','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1),
	(100,'Blackpool v Derby County','Blackpool','Derby County','Football League Championship','','2013-04-27 15:00:00','2013-04-27 16:50:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1),
	(101,'Derby County v Millwall','Derby County','Millwall','Football League Championship','','2013-05-04 15:00:00','2013-05-04 16:50:00',0,'Pride Park','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1),
	(102,'First Meeting','','','','Discuss prototype and application marketing','2012-11-27 10:00:00','2012-11-27 10:15:00',0,'Si\'s Desk','2012-11-27 09:59:27','2012-11-27 10:42:11',1,8),
	(103,'Brazilian Grand Prix','','','','','2012-11-25 16:00:00','2012-11-25 18:00:00',0,'Sao Paulo','2012-11-27 10:40:16','2012-11-27 10:40:38',1,3),
	(104,'Wales v Ireland','Wales','Ireland','','','2013-02-02 13:30:00','2013-02-02 15:00:00',0,'Millennium Stadium','2012-12-18 23:05:05','2012-12-18 23:05:05',1,2),
	(105,'England v Scotland','England','Scotland','','','2013-02-02 16:00:00','2013-02-02 18:00:00',0,'Twickenham','2012-12-18 23:06:08','2012-12-18 23:06:08',1,2),
	(106,'Italy v France','Italy','France','','','2013-02-03 15:00:00','2013-02-03 17:00:00',0,'Stadio Olimpico','2012-12-18 23:06:43','2012-12-18 23:06:43',1,2),
	(107,'Bradford v Aston Villa','Bradford','Aston Villa','','Round 6','2013-01-08 19:45:00','2013-01-08 21:45:00',0,'','2012-12-20 14:17:29','2012-12-20 14:17:29',0,9),
	(108,'Chelsea v Swansea','Chelsea','Swansea','','Round 6','2013-01-09 19:45:00','2013-01-09 21:45:00',0,'','2012-12-20 14:18:37','2012-12-20 14:18:37',0,9),
	(109,'Aston Villa v Bradford City','Aston Villa','Bradford City','','Round 6','2013-01-22 19:45:00','2013-01-22 21:45:00',0,'','2012-12-20 14:19:24','2012-12-20 14:19:24',0,9),
	(110,'Swansea v Chelsea','Swansea','Chelsea','','Round 6','2013-01-23 19:45:00','2013-01-23 21:45:00',0,'','2012-12-20 14:20:11','2012-12-20 14:20:11',0,9),
	(111,'Serbia v Scotland','','','EUROPEAN REGION - GROUP A','FIFA WORLD CUP QUALIFYING','2013-03-26 19:30:00','2013-03-26 09:50:00',0,'','2013-03-26 07:56:47','2013-03-26 07:56:47',0,5),
	(112,'Wales v Croatia','','','EUROPEAN REGION - GROUP A','FIFA WORLD CUP QUALIFYING','2013-03-26 19:45:00','2013-03-26 09:40:00',0,'','2013-03-26 07:57:28','2013-03-26 07:57:28',0,5),
	(113,'Montenegro v England','','','EUROPEAN REGION - GROUP H','FIFA WORLD CUP QUALIFYING','2013-03-26 20:00:00','2013-03-26 22:00:00',0,'','2013-03-26 07:58:23','2013-03-26 07:58:23',0,5),
	(114,'Crick Colts U7 - Welland Valley Yellow','Crick Colts U7','Welland Valley Yellow','','','2013-11-23 10:30:00','2013-11-23 11:00:00',0,'Dallington Park','2013-11-21 09:50:24','2013-11-21 09:50:24',0,12),
	(115,'Grange Park Rangers Red - Crick Colts','Grange Park Rangers Red','Crick Colts','','','2013-11-23 11:00:00','2013-11-23 11:30:00',0,'Dallington Park','2013-11-21 09:51:27','2013-11-21 09:51:27',0,12),
	(116,'Delapre Dragons v Crick Colts','Delapre Dragons','Crick Colts','','','2014-01-11 10:30:00','2014-01-11 10:55:00',0,'Dallington Park Pitch 1','2014-01-04 11:05:09','2014-01-04 11:05:32',0,12),
	(117,'Crick Colts v Grange Park Rangers Green','Grange Park Rangers Blue','Crick Colts','','','2014-01-25 10:30:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 2','2014-01-04 11:06:34','2014-01-11 13:55:12',0,12),
	(118,'Brixworth Juniors v Crick Colts','Crick Colts','Daventry Town','','','2014-01-25 11:00:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 2','2014-01-04 11:08:03','2014-01-11 13:55:49',0,12),
	(119,'Crick Colts v West Haddon JFC','Crick Colts','West Haddon JFC','','3-1 to Crick (first win!)','2014-01-11 11:50:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 1','2014-01-04 11:08:47','2014-01-11 13:52:43',0,12),
	(120,'Brazil v Croatia','Brazil','Croatia','Group A','Broadcast on ITV','2014-06-12 21:00:00','2014-01-12 23:00:00',0,'Arena de Sao Paulo, Sao Paulo','2014-01-12 20:08:03','2014-01-12 20:16:04',0,5),
	(121,'Mexico v Cameroon','Mexico','Cameroon','Group A','Broadcast on ITV','2014-06-13 17:00:00','2014-06-13 19:00:00',0,'Arena das Dunas, Natal','2014-01-12 20:18:34','2014-01-12 20:18:34',0,5),
	(122,'Spain v Netherlands','Spain','Netherlands','Group B','Broadcast on BBC','2014-06-13 20:00:00','2014-06-13 22:00:00',0,'Arena Fonte Nova, Salvador','2014-01-12 20:20:25','2014-01-12 20:20:25',0,5),
	(123,'Chile v Australia','Chile','Australia','Group B','Broadcast on ITV','2014-06-13 23:00:00','2014-06-14 01:00:00',0,'Arena Pantanal, Cuiaba','2014-01-12 20:21:51','2014-01-12 20:21:51',0,5),
	(124,'Wales v Italy','Wales','Italy','','','2014-02-01 14:30:00','2014-02-01 16:30:00',0,'Millennium Stadium','2014-01-15 12:02:25','2014-01-15 12:02:25',0,2),
	(125,'France v England','France','England','','','2014-02-01 17:00:00','2014-02-16 19:00:00',0,'Stade de France','2014-01-15 12:03:03','2014-01-15 12:03:03',0,2),
	(126,'Ireland v Scotland','Ireland','Scotland','','','2014-02-02 15:00:00','2014-02-02 17:00:00',0,'Aviva Stadium','2014-01-15 12:03:47','2014-01-15 12:03:47',0,2),
	(127,'Ireland v Wales','Ireland','Wales','Round 2','','2014-02-08 14:30:00','2014-02-08 16:00:00',0,'Aviva Stadium','2014-01-15 12:05:26','2014-01-15 12:05:26',0,2),
	(128,'Scotland v England','Scotland','England','Round 2','','2014-02-08 17:00:00','2014-02-08 19:00:00',0,'Murrayfield','2014-01-15 12:06:06','2014-01-15 12:06:06',0,2),
	(129,'France v Italy','France','Italy','Round 2','','2014-02-09 15:00:00','2014-02-09 17:00:00',0,'Stade de France','2014-01-15 12:06:42','2014-01-15 12:06:42',0,2),
	(130,'Wales v France','Wales','France','Round 3','','2014-02-21 20:00:00','2014-02-21 22:00:00',0,'Millennium Stadium','2014-01-15 12:07:26','2014-01-15 12:07:26',0,2),
	(131,'Italy v Scotland','Italy','Scotland','Round 3','','2014-02-22 13:30:00','2014-02-22 15:30:00',0,'Stadio Olimpico','2014-01-15 12:08:32','2014-01-15 12:08:32',0,2),
	(132,'England v Ireland','England','Ireland','Round 3','','2014-02-22 16:00:00','2014-02-22 18:00:00',0,'Twickenham','2014-01-15 12:09:14','2014-01-15 12:09:14',0,2),
	(133,'Ireland v Italy','Ireland','Italy','Round 4','','2014-03-08 14:30:00','2014-03-08 16:30:00',0,'Twickenham','2014-01-15 12:10:10','2014-01-15 12:10:10',0,2),
	(134,'Scotland v France','Scotland','France','Round 4','','2014-03-08 17:00:00','2014-03-08 19:00:00',0,'Murrayfield','2014-01-15 12:10:46','2014-01-15 12:10:46',0,2),
	(135,'England v Wales','England','Wales','Round 4','','2014-03-09 15:00:00','2014-03-09 17:00:00',0,'Twickenham','2014-01-15 12:11:19','2014-01-15 12:11:19',0,2),
	(136,'Italy v England','Italy','England','Round 5','','2014-03-15 12:30:00','2014-03-15 14:30:00',0,'Stadio Olimpico','2014-01-15 12:11:57','2014-01-15 12:11:57',0,2),
	(137,'Wales v Scotland','Wales','Scotland','Round 5','','2014-03-15 14:45:00','2014-03-15 16:45:00',0,'Millennium Stadium','2014-01-15 12:12:51','2014-01-15 12:12:51',0,2),
	(138,'France v Ireland','France','Ireland','Round 5','','2014-03-15 17:00:00','2014-03-15 19:00:00',0,'Stade de France','2014-01-15 12:13:25','2014-01-15 12:13:25',0,2),
	(139,'Si v Mo','Si','Mo','','','2014-02-01 01:00:00',NULL,NULL,'Home','2014-01-15 18:35:18','2014-01-15 18:35:18',NULL,2),
	(140,'Os v Car','Os','Car','','','2014-12-01 23:00:00',NULL,NULL,'Home','2014-01-15 18:38:38','2014-01-15 18:38:38',NULL,2);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table sites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sites`;

CREATE TABLE `sites` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table sports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sports`;

CREATE TABLE `sports` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `name`, `slug`)
VALUES
	(1,'Football','football'),
	(2,'Rugby','rugby'),
	(3,'Formula 1','formula-1'),
	(4,'Golf','golf'),
	(5,'Tennis','tennis'),
	(6,'Athletics','athletics'),
	(7,'American Football','american-football'),
	(8,'Basketball','basketball'),
	(9,'Baseball','baseball'),
	(11,'Cricket','cricket'),
	(12,'Racing','racing');

/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `calendar_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;

INSERT INTO `subscriptions` (`id`, `calendar_id`, `user_id`, `created`)
VALUES
	(1,1,1,'2012-03-13 02:30:57'),
	(2,2,1,'2012-03-13 02:49:11'),
	(3,3,1,'2012-03-13 02:49:17'),
	(4,4,1,'2012-03-13 02:49:26');

/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `created`, `updated`)
VALUES
	(1,'si','test','simon.jobling@gmail.com',NULL,'2012-03-13 02:30:26','2012-03-13 02:55:51'),
	(2,'pibdit','test','lizzie@unstyled.com','Lizzie','2012-03-13 02:54:21','2012-03-13 02:57:28'),
	(3,'aajhiggs','test','andy@unstyled.com',NULL,'2012-03-13 02:54:33','2012-03-13 02:55:35'),
	(4,'briansuda','test','brian@unstyled.com',NULL,'2012-03-13 02:54:43','2012-03-13 02:55:26'),
	(5,'abitgone','test','abitgone@unstyled.com',NULL,'2012-03-13 02:55:02','2012-03-13 02:55:02'),
	(6,'dnewns','test','dnewns@unstyled.com',NULL,'2012-03-13 02:55:16','2012-03-13 02:55:16');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
