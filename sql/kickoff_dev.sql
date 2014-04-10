# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: kickoff_dev
# Generation Time: 2014-04-09 19:01:34 +0000
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
  `theme_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `calendars` WRITE;
/*!40000 ALTER TABLE `calendars` DISABLE KEYS */;

INSERT INTO `calendars` (`id`, `name`, `description`, `created`, `updated`, `user_id`, `sport_id`, `theme_id`)
VALUES
	(1,'Derby County FC','Football fixtures for the Super Rams','2012-03-13 02:01:32','2014-04-02 12:32:55',1,1,30),
	(2,'6 Nations KickOff','RBS 6 Nations rugby tournament ','2012-03-13 02:19:40','2014-04-03 12:19:40',1,2,22),
	(3,'F1 Calendar','','2012-03-13 02:19:52','2014-04-03 12:19:52',0,3,21),
	(4,'Rugby World Cup','','2012-03-13 02:20:20','2012-03-13 02:20:20',0,2,NULL),
	(5,'World Cup 2014','All the fixtures from the World Cup in Brazil','2012-03-13 02:20:37','2014-04-09 14:28:01',1,1,31),
	(6,'Euro KickOff','','2012-03-13 02:20:45','2012-03-13 02:20:45',0,1,NULL),
	(11,'International Test Matches','','2013-03-26 08:17:36','2013-03-26 08:17:36',1,11,NULL),
	(10,'International Friendlies','','2013-03-26 07:55:17','2013-03-26 07:55:17',1,1,NULL),
	(9,'Capital One Cup','English League Cup','2012-12-20 14:15:34','2012-12-20 14:15:34',1,1,NULL),
	(12,'Northamptonshire U7s','Under 7s squads from around Northamptonshire ','2013-11-17 08:15:43','2013-11-17 08:15:43',1,1,NULL),
	(13,'my league','','2014-01-28 16:34:37','2014-01-28 16:35:00',1,NULL,NULL),
	(14,'My team','A little about my team','2014-02-04 16:31:17','2014-02-04 16:31:17',1,NULL,NULL),
	(15,'Test Cal 1','Just testing','2014-03-27 18:41:48','2014-03-27 18:41:48',1,NULL,NULL),
	(17,'Test Cal 2','testing new form','2014-03-27 18:46:27','2014-03-27 18:46:27',1,1,NULL),
	(19,'Wimbledon 2014','testing new form','2014-03-27 18:47:20','2014-03-27 18:47:20',1,5,NULL);

/*!40000 ALTER TABLE `calendars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `summary` varchar(50) NOT NULL,
  `home` varchar(100) DEFAULT '',
  `away` varchar(100) DEFAULT '',
  `group` varchar(30) DEFAULT '',
  `description` text,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) DEFAULT NULL,
  `location` varchar(100) DEFAULT '',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `calendar_id` bigint(20) NOT NULL,
  `home_team_id` int(11) DEFAULT NULL,
  `away_team_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `summary`, `home`, `away`, `group`, `description`, `start`, `end`, `all_day`, `location`, `created`, `updated`, `user_id`, `calendar_id`, `home_team_id`, `away_team_id`)
VALUES
	(252,'Spain v Chile','','','B',NULL,'2014-06-18 19:00:00','2014-06-18 21:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,258,235),
	(253,'Australia v Netherlands','','','B',NULL,'2014-06-18 16:00:00','2014-06-18 18:00:00',NULL,'Porto Alegre','2014-04-09 13:23:08',NULL,NULL,5,171,254),
	(254,'Australia v Spain','','','B',NULL,'2014-06-23 16:00:00','2014-06-23 18:00:00',NULL,'Curitiba','2014-04-09 13:23:08',NULL,NULL,5,171,258),
	(255,'Netherlands v Chile','','','B',NULL,'2014-06-23 16:00:00','2014-06-23 18:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,254,235),
	(251,'Chile v Australia','','','B',NULL,'2014-06-13 22:00:00','2014-06-14 00:00:00',NULL,'Cuiaba','2014-04-09 13:23:08',NULL,NULL,5,235,171),
	(96,'Derby County v Ipswich Town','Derby County','Ipswich Town','Football League Championship','','2013-04-06 15:00:00','2013-04-06 16:50:00',0,'Pride Park','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1,NULL,NULL),
	(97,'Blackburn v Derby County','Blackburn','Derby County','Football League Championship','','2013-04-13 15:00:00','2013-04-13 16:50:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1,NULL,NULL),
	(98,'Barnsley v Derby County','Barnsley','Derby County','Football League Championship','','2013-04-16 19:45:00','2013-04-16 21:35:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1,NULL,NULL),
	(99,'Derby County v Peterborough','Derby County','Peterborough','Football League Championship','','2013-04-20 15:00:00','2013-04-20 16:50:00',0,'Pride Park','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1,NULL,NULL),
	(95,'Leeds United v Derby County','Leeds United','Derby County','Football League Championship','','2013-04-01 19:45:00','2013-04-01 21:35:00',0,'TBC','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1,NULL,NULL),
	(94,'Derby County v Bristol City','Derby County','Bristol City','Football League Championship','','2013-03-30 15:00:00','2013-03-30 16:50:00',0,'Pride Park','2012-07-01 12:03:32','0000-00-00 00:00:00',1,1,NULL,NULL),
	(90,'Derby County v Crystal Palace','Derby County','Crystal Palace','Football League Championship','','2013-03-01 19:45:00','2013-03-02 21:40:00',0,'Pride Park','2012-07-01 12:03:31','2013-02-25 08:46:12',1,1,NULL,NULL),
	(89,'Watford v Derby County','Watford','Derby County','Football League Championship','','2013-02-23 15:00:00','2013-02-23 16:50:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1,NULL,NULL),
	(88,'Derby County v Bolton','Derby County','Bolton','Football League Championship','','2013-02-19 19:45:00','2013-02-19 21:35:00',0,'Pride Park','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1,NULL,NULL),
	(87,'Derby County v Wolves','Derby County','Wolves','Football League Championship','','2013-02-16 15:00:00','2013-02-16 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1,NULL,NULL),
	(86,'Sheffield Wed v Derby County','Sheffield Wed','Derby County','Football League Championship','','2013-02-09 15:00:00','2013-02-09 16:50:00',0,'TBC','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1,NULL,NULL),
	(78,'Derby County v Hull City','Derby County','Hull City','Football League Championship','','2012-12-22 15:00:00','2012-12-22 16:50:00',0,'Pride Park','2012-07-01 12:03:29','2012-12-19 09:47:54',1,1,NULL,NULL),
	(77,'Bristol City v Derby County','Bristol City','Derby County','Football League Championship','','2012-12-15 15:00:00','2012-12-15 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1,NULL,NULL),
	(76,'Derby County v Leeds United','Derby County','Leeds United','Football League Championship','','2012-12-08 15:00:00','2012-12-08 16:50:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1,NULL,NULL),
	(75,'Leicester City v Derby County','Leicester City','Derby County','Football League Championship','','2012-12-01 17:20:00','2012-12-01 19:00:00',0,'TBC','2012-07-01 12:03:28','2012-12-01 17:05:09',1,1,NULL,NULL),
	(71,'Millwall v Derby County','Millwall','Derby County','Football League Championship','','2012-11-10 15:00:00','2012-11-10 16:50:00',0,'TBC','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1,NULL,NULL),
	(70,'Derby County v Barnsley','Derby County','Barnsley','Football League Championship','','2012-11-06 19:45:00','2012-11-06 21:35:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(66,'Derby County v Blackburn','Derby County','Blackburn','Football League Championship','','2012-10-20 15:00:00','2012-10-20 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(65,'Derby County v Brighton','Derby County','Brighton','Football League Championship','','2012-10-06 15:00:00','2012-10-06 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(93,'Derby County v Leicester City','Derby County','Leicester City','Football League Championship','','2013-03-16 15:00:00','2013-03-16 16:50:00',0,'Pride Park','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1,NULL,NULL),
	(92,'Birmingham v Derby County','Birmingham','Derby County','Football League Championship','','2013-03-09 15:00:00','2013-03-09 16:50:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1,NULL,NULL),
	(91,'Cardiff City v Derby County','Cardiff City','Derby County','Football League Championship','','2013-03-05 19:45:00','2013-03-05 21:35:00',0,'TBC','2012-07-01 12:03:31','0000-00-00 00:00:00',1,1,NULL,NULL),
	(84,'Derby County v Blackburn Rovers','Derby County','Blackburn Rovers','FA Cup','FA Cup - Fourth Round','2013-01-26 15:00:00','2013-01-26 16:50:00',0,'Pride Park','2012-07-01 12:03:30','2013-01-15 09:36:17',1,1,NULL,NULL),
	(83,'Derby County v Nottm Forest','Derby County','Nottm Forest','Football League Championship','','2013-01-19 15:00:00','2013-01-19 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1,NULL,NULL),
	(74,'Derby County v Cardiff City','Derby County','Cardiff City','Football League Championship','','2012-11-27 19:45:00','2012-11-27 21:35:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1,NULL,NULL),
	(58,'Wolves v Derby County','Wolves','Derby County','Football League Championship','','2012-08-25 15:00:00','2012-08-25 16:50:00',0,'TBC','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1,NULL,NULL),
	(85,'Derby County v Huddersfield','Derby County','Huddersfield','Football League Championship','','2013-02-02 15:00:00','2013-02-02 16:50:00',0,'Pride Park','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1,NULL,NULL),
	(82,'Brighton v Derby County','Brighton','Derby County','Football League Championship','','2013-01-12 15:00:00','2013-01-12 16:50:00',0,'TBC','2012-07-01 12:03:30','0000-00-00 00:00:00',1,1,NULL,NULL),
	(81,'Derby County v Middlesbrough','Derby County','Middlesbrough','Football League Championship','','2013-01-01 15:00:00','2013-01-01 16:50:00',0,'Pride Park','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1,NULL,NULL),
	(80,'Charlton v Derby County','Charlton','Derby County','Football League Championship','','2012-12-29 15:00:00','2012-12-29 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1,NULL,NULL),
	(79,'Burnley v Derby County','Burnley','Derby County','Football League Championship','','2012-12-26 15:00:00','2012-12-26 16:50:00',0,'TBC','2012-07-01 12:03:29','0000-00-00 00:00:00',1,1,NULL,NULL),
	(73,'Derby County v Birmingham','Derby County','Birmingham','Football League Championship','','2012-11-24 15:00:00','2012-11-24 16:50:00',0,'Pride Park','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1,NULL,NULL),
	(72,'Crystal Palace v Derby County','Crystal Palace','Derby County','Football League Championship','','2012-11-17 15:00:00','2012-11-17 16:50:00',0,'TBC','2012-07-01 12:03:28','0000-00-00 00:00:00',1,1,NULL,NULL),
	(69,'Derby County v Blackpool','Derby County','Blackpool','Football League Championship','','2012-11-03 15:00:00','2012-11-03 16:50:00',0,'Pride Park','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(68,'Peterborough v Derby County','Peterborough','Derby County','Football League Championship','','2012-10-27 15:00:00','2012-10-27 16:50:00',0,'TBC','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(67,'Ipswich Town v Derby County','Ipswich Town','Derby County','Football League Championship','','2012-10-23 19:45:00','2012-10-23 21:35:00',0,'TBC','2012-07-01 12:03:27','0000-00-00 00:00:00',1,1,NULL,NULL),
	(64,'Middlesbrough v Derby County','Middlesbrough','Derby County','Football League Championship','','2012-10-02 19:45:00','2012-10-02 21:35:00',0,'TBC','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1,NULL,NULL),
	(63,'Nottm Forest v Derby County','Nottm Forest','Derby County','Football League Championship','','2012-09-29 15:00:00','2012-09-29 16:50:00',0,'TBC','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1,NULL,NULL),
	(62,'Derby County v Burnley','Derby County','Burnley','Football League Championship','','2012-09-22 15:00:00','2012-09-22 16:50:00',0,'Pride Park','2012-07-01 12:03:26','0000-00-00 00:00:00',1,1,NULL,NULL),
	(61,'Derby County v Charlton','Derby County','Charlton','Football League Championship','','2012-09-18 19:45:00','2012-09-18 21:35:00',0,'Pride Park','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1,NULL,NULL),
	(60,'Huddersfield v Derby County','Huddersfield','Derby County','Football League Championship','','2012-09-15 15:00:00','2012-09-15 16:50:00',0,'TBC','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1,NULL,NULL),
	(59,'Derby County v Watford','Derby County','Watford','Football League Championship','','2012-09-01 15:00:00','2012-09-01 16:50:00',0,'Pride Park','2012-07-01 12:03:25','0000-00-00 00:00:00',1,1,NULL,NULL),
	(57,'Bolton v Derby County','Bolton','Derby County','Football League Championship','','2012-08-21 19:45:00','2012-08-21 21:35:00',0,'TBC','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1,NULL,NULL),
	(56,'Derby County v Sheffield Wed','Derby County','Sheffield Wed','Football League Championship','','2012-08-18 15:00:00','2012-08-18 16:50:00',0,'Pride Park','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1,NULL,NULL),
	(55,'Derby County v Scunthorpe','Derby County','Scunthorpe','Football League Cup','','2012-08-14 19:45:00','2012-08-14 21:35:00',0,'Pride Park','2012-07-01 12:03:24','0000-00-00 00:00:00',1,1,NULL,NULL),
	(100,'Blackpool v Derby County','Blackpool','Derby County','Football League Championship','','2013-04-27 15:00:00','2013-04-27 16:50:00',0,'TBC','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1,NULL,NULL),
	(101,'Derby County v Millwall','Derby County','Millwall','Football League Championship','','2013-05-04 15:00:00','2013-05-04 16:50:00',0,'Pride Park','2012-07-01 12:03:33','0000-00-00 00:00:00',1,1,NULL,NULL),
	(102,'First Meeting','','','','Discuss prototype and application marketing','2012-11-27 10:00:00','2012-11-27 10:15:00',0,'Si\'s Desk','2012-11-27 09:59:27','2012-11-27 10:42:11',1,8,NULL,NULL),
	(103,'Brazilian Grand Prix','','','','','2012-11-25 16:00:00','2012-11-25 18:00:00',0,'Sao Paulo','2012-11-27 10:40:16','2012-11-27 10:40:38',1,3,NULL,NULL),
	(104,'Wales v Ireland','Wales','Ireland','','','2013-02-02 13:30:00','2013-02-02 15:00:00',0,'Millennium Stadium','2012-12-18 23:05:05','2012-12-18 23:05:05',1,2,NULL,NULL),
	(105,'England v Scotland','England','Scotland','','','2013-02-02 16:00:00','2013-02-02 18:00:00',0,'Twickenham','2012-12-18 23:06:08','2012-12-18 23:06:08',1,2,NULL,NULL),
	(106,'Italy v France','Italy','France','','','2013-02-03 15:00:00','2013-02-03 17:00:00',0,'Stadio Olimpico','2012-12-18 23:06:43','2012-12-18 23:06:43',1,2,NULL,NULL),
	(107,'Bradford v Aston Villa','Bradford','Aston Villa','','Round 6','2013-01-08 19:45:00','2013-01-08 21:45:00',0,'','2012-12-20 14:17:29','2012-12-20 14:17:29',0,9,NULL,NULL),
	(108,'Chelsea v Swansea','Chelsea','Swansea','','Round 6','2013-01-09 19:45:00','2013-01-09 21:45:00',0,'','2012-12-20 14:18:37','2012-12-20 14:18:37',0,9,NULL,NULL),
	(109,'Aston Villa v Bradford City','Aston Villa','Bradford City','','Round 6','2013-01-22 19:45:00','2013-01-22 21:45:00',0,'','2012-12-20 14:19:24','2012-12-20 14:19:24',0,9,NULL,NULL),
	(110,'Swansea v Chelsea','Swansea','Chelsea','','Round 6','2013-01-23 19:45:00','2013-01-23 21:45:00',0,'','2012-12-20 14:20:11','2012-12-20 14:20:11',0,9,NULL,NULL),
	(111,'Serbia v Scotland','Serbia','Scotland','EUROPEAN REGION - GROUP A','FIFA WORLD CUP QUALIFYING','2013-03-26 19:30:00','2013-03-26 09:50:00',0,'','2013-03-26 07:56:47','2014-03-06 18:43:07',0,5,2,2),
	(112,'Wales v Croatia','','','EUROPEAN REGION - GROUP A','FIFA WORLD CUP QUALIFYING','2013-03-26 19:45:00','2013-03-26 09:40:00',0,'','2013-03-26 07:57:28','2013-03-26 07:57:28',0,5,NULL,NULL),
	(113,'Montenegro v England','','','EUROPEAN REGION - GROUP H','FIFA WORLD CUP QUALIFYING','2013-03-26 20:00:00','2013-03-26 22:00:00',0,'','2013-03-26 07:58:23','2013-03-26 07:58:23',0,5,NULL,NULL),
	(114,'Crick Colts U7 - Welland Valley Yellow','Crick Colts U7','Welland Valley Yellow','','','2013-11-23 10:30:00','2013-11-23 11:00:00',0,'Dallington Park','2013-11-21 09:50:24','2013-11-21 09:50:24',0,12,NULL,NULL),
	(115,'Grange Park Rangers Red - Crick Colts','Grange Park Rangers Red','Crick Colts','','','2013-11-23 11:00:00','2013-11-23 11:30:00',0,'Dallington Park','2013-11-21 09:51:27','2013-11-21 09:51:27',0,12,NULL,NULL),
	(116,'Delapre Dragons v Crick Colts','Delapre Dragons','Crick Colts','','','2014-01-11 10:30:00','2014-01-11 10:55:00',0,'Dallington Park Pitch 1','2014-01-04 11:05:09','2014-01-04 11:05:32',0,12,NULL,NULL),
	(117,'Crick Colts v Grange Park Rangers Green','Grange Park Rangers Blue','Crick Colts','','','2014-01-25 10:30:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 2','2014-01-04 11:06:34','2014-01-11 13:55:12',0,12,NULL,NULL),
	(118,'Brixworth Juniors v Crick Colts','Crick Colts','Daventry Town','','','2014-01-25 11:00:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 2','2014-01-04 11:08:03','2014-01-11 13:55:49',0,12,NULL,NULL),
	(119,'Crick Colts v West Haddon JFC','Crick Colts','West Haddon JFC','','3-1 to Crick (first win!)','2014-01-11 11:50:00','0000-00-00 00:00:00',0,'Dallington Park Pitch 1','2014-01-04 11:08:47','2014-01-11 13:52:43',0,12,NULL,NULL),
	(307,'W61 v W62','','','FINAL',NULL,'2014-07-13 23:00:00','2014-07-14 01:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(306,'L61 v L62','','','PLAY-OFF FOR THIRD PLACE',NULL,'2014-07-13 00:00:00','2014-07-13 02:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(304,'W57 v W58','','','SEMI-FINALS',NULL,'2014-07-09 00:00:00','2014-07-09 02:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(305,'W59 v W60','','','SEMI-FINALS',NULL,'2014-07-10 00:00:00','2014-07-10 02:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(303,'W55 v W56','','','QUARTER-FINALS',NULL,'2014-07-05 20:00:00','2014-07-05 22:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(124,'Wales v Italy','Wales','Italy','','','2014-02-01 14:30:00','2014-02-01 16:30:00',0,'Millennium Stadium','2014-01-15 12:02:25','2014-01-15 12:02:25',0,2,NULL,NULL),
	(125,'France v England','France','England','','','2014-02-01 17:00:00','2014-02-16 19:00:00',0,'Stade de France','2014-01-15 12:03:03','2014-01-15 12:03:03',0,2,NULL,NULL),
	(126,'Ireland v Scotland','Ireland','Scotland','','','2014-02-02 15:00:00','2014-02-02 17:00:00',0,'Aviva Stadium','2014-01-15 12:03:47','2014-01-15 12:03:47',0,2,NULL,NULL),
	(127,'Ireland v Wales','Ireland','Wales','Round 2','','2014-02-08 14:30:00','2014-02-08 16:00:00',0,'Aviva Stadium','2014-01-15 12:05:26','2014-01-15 12:05:26',0,2,NULL,NULL),
	(128,'Scotland v England','Scotland','England','Round 2','','2014-02-08 17:00:00','2014-02-08 19:00:00',0,'Murrayfield','2014-01-15 12:06:06','2014-01-15 12:06:06',0,2,NULL,NULL),
	(129,'France v Italy','France','Italy','Round 2','','2014-02-09 15:00:00','2014-02-09 17:00:00',0,'Stade de France','2014-01-15 12:06:42','2014-01-15 12:06:42',0,2,NULL,NULL),
	(130,'Wales v France','Wales','France','Round 3','','2014-02-21 20:00:00','2014-02-21 22:00:00',0,'Millennium Stadium','2014-01-15 12:07:26','2014-01-15 12:07:26',0,2,NULL,NULL),
	(131,'Italy v Scotland','Italy','Scotland','Round 3','','2014-02-22 13:30:00','2014-02-22 15:30:00',0,'Stadio Olimpico','2014-01-15 12:08:32','2014-01-15 12:08:32',0,2,NULL,NULL),
	(132,'England v Ireland','England','Ireland','Round 3','','2014-02-22 16:00:00','2014-02-22 18:00:00',0,'Twickenham','2014-01-15 12:09:14','2014-01-15 12:09:14',0,2,NULL,NULL),
	(133,'Ireland v Italy','Ireland','Italy','Round 4','','2014-03-08 14:30:00','2014-03-08 16:30:00',0,'Twickenham','2014-01-15 12:10:10','2014-01-15 12:10:10',0,2,NULL,NULL),
	(134,'Scotland v France','Scotland','France','Round 4','','2014-03-08 17:00:00','2014-03-08 19:00:00',0,'Murrayfield','2014-01-15 12:10:46','2014-01-15 12:10:46',0,2,NULL,NULL),
	(135,'England v Wales','England','Wales','Round 4','','2014-03-09 15:00:00','2014-03-09 17:00:00',0,'Twickenham','2014-01-15 12:11:19','2014-01-15 12:11:19',0,2,NULL,NULL),
	(136,'Italy v England','Italy','England','Round 5','','2014-03-15 12:30:00','2014-03-15 14:30:00',0,'Stadio Olimpico','2014-01-15 12:11:57','2014-01-15 12:11:57',0,2,NULL,NULL),
	(137,'Wales v Scotland','Wales','Scotland','Round 5','','2014-03-15 14:45:00','2014-03-15 16:45:00',0,'Millennium Stadium','2014-01-15 12:12:51','2014-01-15 12:12:51',0,2,NULL,NULL),
	(138,'France v Ireland','France','Ireland','Round 5','','2014-03-15 17:00:00','2014-03-15 19:00:00',0,'Stade de France','2014-01-15 12:13:25','2014-01-15 12:13:25',0,2,NULL,NULL),
	(148,'Crick Colts v Billing United','Crick Colts','Billing United','','','2014-04-05 11:25:00','2014-04-05 11:50:00',NULL,'Dallington Park Pitch 2','2014-03-22 12:39:59','2014-03-22 12:39:59',NULL,12,165,206),
	(141,'Roobarb v Custard','Roobarb','Custard','Prem','Another details about the game','2014-02-05 16:00:00','2014-02-05 18:20:00',NULL,'Custard Factory','2014-02-04 16:32:40','2014-02-04 16:32:40',NULL,14,NULL,NULL),
	(142,'Roobarb v Custard','Roobarb','Custard','Sup','Yo!','2014-02-04 16:49:00','2014-02-04 18:49:00',NULL,'Custard Factory','2014-02-04 16:49:58','2014-02-04 16:49:58',NULL,14,NULL,NULL),
	(143,'Roobarb v Custard','Roobarb','Custard','Sup','Yo!','2014-02-04 16:49:00','2014-02-04 18:49:00',NULL,'Custard Factory','2014-02-04 16:50:35','2014-02-04 16:50:35',NULL,14,NULL,NULL),
	(144,'FFA Black v Crick Colts','FFA Black','Crick Colts','','','2014-03-15 10:30:00','2014-03-15 10:50:00',NULL,'Dallington Park Pitch 1','2014-03-06 18:58:35','2014-03-06 19:09:22',NULL,12,202,NULL),
	(145,'Crick Colts v Towcester Town Green','Crick Colts','Towcester Town Green','','','2014-03-15 11:00:00','2014-03-15 11:20:00',NULL,'Dallington Park Pitch 1','2014-03-06 19:12:52','2014-03-06 19:13:09',NULL,12,165,203),
	(146,'Hackleton Harriers v Crick Colts','Hackleton Harriers','Crick Colts','','','2014-03-29 09:30:00','2014-03-29 09:55:00',NULL,'Dallington Park Pitch 4','2014-03-06 19:14:43','2014-03-13 08:41:54',NULL,12,204,165),
	(147,'Crick Colts v Towcester Town White','Crick Colts','Towcester Town White','','','2014-03-29 10:00:00','2014-03-29 10:25:00',NULL,'Dallington Park Pitch 4','2014-03-06 19:16:15','2014-03-06 19:16:15',NULL,12,165,205),
	(149,'Ipswich Town v Derby County','Ipswich Town','Derby County','Championship','','2014-03-25 19:45:00','2014-03-25 21:45:00',NULL,'Portman Road','2014-03-22 18:48:27','2014-03-22 18:48:27',NULL,1,88,69),
	(150,'Derby County v Charlton Athletic','Derby County','Charlton Athletic','Championship','','2014-03-29 15:00:00','2014-03-29 16:50:00',NULL,'iPro Stadium','2014-03-22 18:55:11','2014-03-22 18:55:11',NULL,1,69,207),
	(151,'Derby County v Nottingham Forest','Derby County','Nottingham Forest','Championship','5-0 ','2014-03-22 12:15:00','2014-03-22 14:00:00',NULL,'iPro Stadium','2014-03-22 18:58:26','2014-03-22 18:58:26',NULL,1,69,132),
	(152,'Middlesbrough v Derby County','Middlesbrough','Derby County','Championship','','2014-04-05 15:00:00','2014-04-05 16:50:00',NULL,'Riverside Stadium','2014-04-02 09:57:37','2014-04-02 09:57:51',NULL,1,150,69),
	(153,'Blackpool Town v Derby County','Blackpool Town','Derby County','Championship','','2014-04-08 20:00:00','2014-04-08 22:00:00',NULL,'Bloomfield Road','2014-04-02 10:00:57','2014-04-02 10:00:57',NULL,1,208,69),
	(154,'Derby County v Huddersfield','Derby County','Huddersfield','Championship','','2014-04-12 15:00:00','2014-04-12 17:00:00',NULL,'Pride Park','2014-04-02 10:05:27','2014-04-02 10:05:27',NULL,1,69,91),
	(155,'Doncaster Rovers v Derby County','Doncaster Rovers','Derby County','Championship','','2014-04-18 19:30:00','2014-04-18 21:30:00',NULL,'Keepmoat Stadium','2014-04-02 10:06:39','2014-04-02 10:06:39',NULL,1,70,69),
	(156,'Derby Count v Barnsley Town','Derby County','Barnsley Town','Championship','','2014-04-21 15:00:00','2014-04-21 17:00:00',NULL,'Pride Park','2014-04-02 10:09:37','2014-04-02 10:09:37',NULL,1,69,209),
	(157,'Derby County v Watford Town','Derby County','Watford Town','Championship','','2014-04-26 15:00:00','2014-04-26 17:00:00',NULL,'Pride Park','2014-04-02 10:10:29','2014-04-02 10:10:29',NULL,1,69,210),
	(158,'Leeds United v Derby County','Leeds United','Derby County','Championship','','2014-05-03 12:15:00','2014-05-03 14:15:00',NULL,'Elland Road','2014-04-02 10:11:35','2014-04-02 10:11:35',NULL,1,75,69),
	(244,'Brazil v Croatia','','','A',NULL,'2014-06-12 20:00:00','2014-06-12 22:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,233,239),
	(245,'Mexico v Cameroon','','','A',NULL,'2014-06-13 16:00:00','2014-06-13 18:00:00',NULL,'Natal','2014-04-09 13:23:08',NULL,NULL,5,253,234),
	(246,'Brazil v Mexico','','','A',NULL,'2014-06-17 19:00:00','2014-06-17 21:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,233,253),
	(247,'Cameroon v Croatia','','','A',NULL,'2014-06-18 22:00:00','2014-06-19 00:00:00',NULL,'Manaus','2014-04-09 13:23:08',NULL,NULL,5,234,239),
	(248,'Cameroon v Brazil','','','A',NULL,'2014-06-23 20:00:00','2014-06-23 22:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,234,233),
	(249,'Croatia v Mexico','','','A',NULL,'2014-06-23 20:00:00','2014-06-23 22:00:00',NULL,'Recife','2014-04-09 13:23:08',NULL,NULL,5,239,253),
	(250,'Spain v Netherlands','','','B',NULL,'2014-06-13 19:00:00','2014-06-13 21:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,258,254),
	(302,'W51 v W52','','','QUARTER-FINALS',NULL,'2014-07-06 00:00:00','2014-07-06 02:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(301,'W53 v W54','','','QUARTER-FINALS',NULL,'2014-07-04 20:00:00','2014-07-04 22:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(300,'W49 v W50','','','QUARTER-FINALS',NULL,'2014-07-05 00:00:00','2014-07-05 02:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(299,'1H v 2G','','','ROUND OF 16',NULL,'2014-07-02 00:00:00','2014-07-02 02:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(298,'1F v 2E','','','ROUND OF 16',NULL,'2014-07-01 20:00:00','2014-07-01 22:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(297,'1G v 2H','','','ROUND OF 16',NULL,'2014-07-01 00:00:00','2014-07-01 02:00:00',NULL,'Porto Alegre','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(296,'1E v 2F','','','ROUND OF 16',NULL,'2014-06-30 20:00:00','2014-06-30 22:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(295,'1D v 2C','','','ROUND OF 16',NULL,'2014-06-30 00:00:00','2014-06-30 02:00:00',NULL,'Recife','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(294,'1B v 2A','','','ROUND OF 16',NULL,'2014-06-29 20:00:00','2014-06-29 22:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(293,'1C v 2D','','','ROUND OF 16',NULL,'2014-06-29 00:00:00','2014-06-29 02:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(292,'1A v 2B','','','ROUND OF 16',NULL,'2014-06-28 20:00:00','2014-06-28 22:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(291,'Algeria v Russia','','','H',NULL,'2014-06-26 21:00:00','2014-06-26 23:00:00',NULL,'Curitiba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(290,'Korea Republic v Belgium','','','H',NULL,'2014-06-26 20:00:00','2014-06-26 22:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(289,'Korea Republic v Algeria','','','H',NULL,'2014-06-22 19:00:00','2014-06-22 21:00:00',NULL,'Porto Alegre','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(288,'Belgium v Russia','','','H',NULL,'2014-06-22 16:00:00','2014-06-22 18:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(287,'Russia v Korea Republic','','','H',NULL,'2014-06-17 22:00:00','2014-06-18 00:00:00',NULL,'Cuiaba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(286,'Belgium v Algeria','','','H',NULL,'2014-06-17 16:00:00','2014-06-17 18:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(285,'Portugal v Ghana','','','G',NULL,'2014-06-26 16:00:00','2014-06-26 18:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(284,'USA v Germany','','','G',NULL,'2014-06-26 16:00:00','2014-06-26 18:00:00',NULL,'Recife','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(283,'USA v Portugal','','','G',NULL,'2014-06-22 22:00:00','2014-06-23 00:00:00',NULL,'Manaus','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(282,'Germany v Ghana','','','G',NULL,'2014-06-21 19:00:00','2014-06-21 21:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(281,'Ghana v USA','','','G',NULL,'2014-06-16 22:00:00','2014-06-17 00:00:00',NULL,'Natal','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(280,'Germany v Portugal','','','G',NULL,'2014-06-16 16:00:00','2014-06-16 18:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(279,'Bosnia and Herzegovina v Iran','','','F',NULL,'2014-06-25 16:00:00','2014-06-25 18:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(278,'Nigeria v Argentina','','','F',NULL,'2014-06-25 16:00:00','2014-06-25 18:00:00',NULL,'Porto Alegre','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(277,'Nigeria v Bosnia and Herzegovina','','','F',NULL,'2014-06-21 22:00:00','2014-06-22 00:00:00',NULL,'Cuiaba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(276,'Argentina v Iran','','','F',NULL,'2014-06-21 16:00:00','2014-06-21 18:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(275,'Iran v Nigeria','','','F',NULL,'2014-06-16 20:00:00','2014-06-16 22:00:00',NULL,'Curitiba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(274,'Argentina v Bosnia and Herzegovina','','','F',NULL,'2014-06-15 22:00:00','2014-06-16 00:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(273,'Ecuador v France','','','E',NULL,'2014-06-25 20:00:00','2014-06-25 22:00:00',NULL,'Rio De Janeiro','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(272,'Honduras v Switzerland','','','E',NULL,'2014-06-25 20:00:00','2014-06-25 22:00:00',NULL,'Manaus','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(271,'Honduras v Ecuador','','','E',NULL,'2014-06-20 23:00:00','2014-06-21 01:00:00',NULL,'Curitiba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(270,'Switzerland v France','','','E',NULL,'2014-06-20 19:00:00','2014-06-20 21:00:00',NULL,'Salvador','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(269,'France v Honduras','','','E',NULL,'2014-06-15 19:00:00','2014-06-15 21:00:00',NULL,'Porto Alegre','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(268,'Switzerland v Ecuador','','','E',NULL,'2014-06-15 16:00:00','2014-06-15 18:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(267,'Costa Rica v England','','','D',NULL,'2014-06-24 16:00:00','2014-06-24 18:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,241),
	(266,'Italy v Uruguay','','','D',NULL,'2014-06-24 16:00:00','2014-06-24 18:00:00',NULL,'Natal','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(265,'Italy v Costa Rica','','','D',NULL,'2014-06-20 16:00:00','2014-06-20 18:00:00',NULL,'Recife','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(264,'Uruguay v England','','','D',NULL,'2014-06-19 19:00:00','2014-06-19 21:00:00',NULL,'Sao Paulo','2014-04-09 13:23:08',NULL,NULL,5,NULL,241),
	(263,'England v Italy','','','D',NULL,'2014-06-14 22:00:00','2014-06-15 00:00:00',NULL,'Manaus','2014-04-09 13:23:08',NULL,NULL,5,241,NULL),
	(262,'Uruguay v Costa Rica','','','D',NULL,'2014-06-14 19:00:00','2014-06-14 21:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(261,'Greece v Côte d\'Ivoire','','','C',NULL,'2014-06-24 20:00:00','2014-06-24 22:00:00',NULL,'Fortaleza','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(260,'Japan v Colombia','','','C',NULL,'2014-06-24 20:00:00','2014-06-24 22:00:00',NULL,'Cuiaba','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(259,'Japan v Greece','','','C',NULL,'2014-06-19 22:00:00','2014-06-20 00:00:00',NULL,'Natal','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(258,'Colombia v Côte d\'Ivoire','','','C',NULL,'2014-06-19 16:00:00','2014-06-19 18:00:00',NULL,'Brasilia','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(257,'Côte d\'Ivoire v Japan','','','C',NULL,'2014-06-15 01:00:00','2014-06-15 03:00:00',NULL,'Recife','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL),
	(256,'Colombia v Greece','','','C',NULL,'2014-06-14 16:00:00','2014-06-14 18:00:00',NULL,'Belo Horizonte','2014-04-09 13:23:08',NULL,NULL,5,NULL,NULL);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


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
  `theme_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `name`, `slug`, `theme_id`)
VALUES
	(1,'Football','football',26),
	(2,'Rugby','rugby',22),
	(3,'Formula 1','formula-1',21),
	(5,'Tennis','tennis',29),
	(6,'Athletics','athletics',28),
	(7,'American Football','american-football',25),
	(8,'Basketball','basketball',23),
	(9,'Baseball','baseball',24),
	(11,'Cricket','cricket',27),
	(12,'Racing','racing',NULL);

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


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `name`, `sport_id`, `theme_id`, `created`)
VALUES
	(2,'England',2,NULL,'2014-03-06 10:36:47'),
	(3,'Oceania 1',2,NULL,'2014-03-06 10:37:02'),
	(4,'Wales',2,NULL,'2014-03-06 10:37:17'),
	(5,'Australia',2,NULL,'2014-03-06 10:37:57'),
	(69,'Derby County',1,30,'2014-03-06 18:22:51'),
	(70,'Doncaster Rovers',1,NULL,'2014-03-06 18:22:51'),
	(71,'Brighton & Hove Albion',1,NULL,'2014-03-06 18:22:51'),
	(74,'Barnsley',1,NULL,'2014-03-06 18:22:51'),
	(75,'Leeds United',1,NULL,'2014-03-06 18:22:51'),
	(76,'Watford',1,NULL,'2014-03-06 18:22:51'),
	(78,'Leicester City',1,NULL,'2014-03-06 18:22:51'),
	(82,'Wolves',1,NULL,'2014-03-06 18:22:51'),
	(85,'Burnley',1,NULL,'2014-03-06 18:22:51'),
	(88,'Ipswich Town',1,NULL,'2014-03-06 18:22:51'),
	(91,'Huddersfield',1,NULL,'2014-03-06 18:22:51'),
	(93,'Blackpool',1,NULL,'2014-03-06 18:22:51'),
	(94,'Bradford',1,NULL,'2014-03-06 18:22:51'),
	(96,'Aston Villa',1,NULL,'2014-03-06 18:22:51'),
	(100,'Grange Park Rangers Red',1,NULL,'2014-03-06 18:22:51'),
	(101,'Delapre Dragons',1,NULL,'2014-03-06 18:22:51'),
	(102,'Grange Park Rangers Blue',1,NULL,'2014-03-06 18:22:51'),
	(104,'Brazil',1,NULL,'2014-03-06 18:22:51'),
	(105,'Mexico',1,NULL,'2014-03-06 18:22:51'),
	(106,'Spain',1,NULL,'2014-03-06 18:22:51'),
	(107,'Chile',1,NULL,'2014-03-06 18:22:51'),
	(132,'Nottingham Forest',1,NULL,'2014-03-06 18:23:01'),
	(134,'Crystal Palace',1,NULL,'2014-03-06 18:23:01'),
	(136,'Peterborough',1,NULL,'2014-03-06 18:23:01'),
	(137,'Bristol City',1,NULL,'2014-03-06 18:23:01'),
	(138,'Bolton',1,NULL,'2014-03-06 18:23:01'),
	(140,'Hull City',1,NULL,'2014-03-06 18:23:01'),
	(143,'Blackburn',1,NULL,'2014-03-06 18:23:01'),
	(144,'Brighton',1,NULL,'2014-03-06 18:23:01'),
	(148,'Cardiff City',1,NULL,'2014-03-06 18:23:01'),
	(150,'Middlesbrough',1,NULL,'2014-03-06 18:23:01'),
	(151,'Birmingham',1,NULL,'2014-03-06 18:23:01'),
	(154,'Charlton',1,NULL,'2014-03-06 18:23:01'),
	(156,'Sheffield Wed',1,NULL,'2014-03-06 18:23:01'),
	(157,'Scunthorpe',1,NULL,'2014-03-06 18:23:01'),
	(158,'Millwall',1,NULL,'2014-03-06 18:23:01'),
	(160,'Swansea',1,NULL,'2014-03-06 18:23:01'),
	(162,'Chelsea',1,NULL,'2014-03-06 18:23:01'),
	(164,'Welland Valley Yellow',1,NULL,'2014-03-06 18:23:01'),
	(165,'Crick Colts',1,NULL,'2014-03-06 18:23:01'),
	(166,'Daventry Town',1,NULL,'2014-03-06 18:23:01'),
	(167,'West Haddon JFC',1,NULL,'2014-03-06 18:23:01'),
	(168,'Croatia',1,NULL,'2014-03-06 18:23:01'),
	(169,'Cameroon',1,NULL,'2014-03-06 18:23:01'),
	(170,'Netherlands',1,NULL,'2014-03-06 18:23:01'),
	(171,'Australia',1,NULL,'2014-03-06 18:23:01'),
	(202,'FFA Black',1,NULL,'2014-03-06 19:08:30'),
	(203,'Towcester Town Green',1,NULL,'2014-03-06 19:12:52'),
	(204,'Hackleton Harriers',1,NULL,'2014-03-06 19:14:43'),
	(205,'Towcester Town White',1,NULL,'2014-03-06 19:16:15'),
	(206,'Billing United',1,NULL,'2014-03-22 12:39:59'),
	(207,'Charlton Athletic',1,NULL,'2014-03-22 18:55:11'),
	(208,'Blackpool Town',1,NULL,'2014-04-02 10:00:57'),
	(209,'Barnsley Town',1,NULL,'2014-04-02 10:09:37'),
	(210,'Watford Town',1,NULL,'2014-04-02 10:10:29'),
	(212,'1A',1,NULL,'2014-04-03 22:02:24'),
	(213,'1B',1,NULL,'2014-04-03 22:02:24'),
	(214,'1C',1,NULL,'2014-04-03 22:02:24'),
	(215,'1D',1,NULL,'2014-04-03 22:02:24'),
	(216,'1E',1,NULL,'2014-04-03 22:02:24'),
	(217,'1F',1,NULL,'2014-04-03 22:02:24'),
	(218,'1G',1,NULL,'2014-04-03 22:02:24'),
	(219,'1H',1,NULL,'2014-04-03 22:02:24'),
	(220,'2A',1,NULL,'2014-04-03 22:02:24'),
	(221,'2B',1,NULL,'2014-04-03 22:02:24'),
	(222,'2C',1,NULL,'2014-04-03 22:02:24'),
	(223,'2D',1,NULL,'2014-04-03 22:02:24'),
	(224,'2E',1,NULL,'2014-04-03 22:02:24'),
	(225,'2F',1,NULL,'2014-04-03 22:02:24'),
	(226,'2G',1,NULL,'2014-04-03 22:02:24'),
	(227,'2H',1,NULL,'2014-04-03 22:02:24'),
	(228,'Algeria',1,NULL,'2014-04-03 22:02:24'),
	(229,'Argentina',1,NULL,'2014-04-03 22:02:24'),
	(230,'Australia',1,NULL,'2014-04-03 22:02:24'),
	(231,'Belgium',1,NULL,'2014-04-03 22:02:24'),
	(232,'Bosnia and Herzegovina',1,NULL,'2014-04-03 22:02:24'),
	(233,'Brazil',1,NULL,'2014-04-03 22:02:24'),
	(234,'Cameroon',1,NULL,'2014-04-03 22:02:24'),
	(235,'Chile',1,NULL,'2014-04-03 22:02:24'),
	(236,'Colombia',1,NULL,'2014-04-03 22:02:24'),
	(237,'Costa Rica',1,NULL,'2014-04-03 22:02:24'),
	(238,'Côte d\'Ivoire',1,NULL,'2014-04-03 22:02:24'),
	(239,'Croatia',1,NULL,'2014-04-03 22:02:24'),
	(240,'Ecuador',1,NULL,'2014-04-03 22:02:24'),
	(241,'England',1,NULL,'2014-04-03 22:02:24'),
	(242,'France',1,NULL,'2014-04-03 22:02:24'),
	(243,'Germany',1,NULL,'2014-04-03 22:02:24'),
	(244,'Ghana',1,NULL,'2014-04-03 22:02:24'),
	(245,'Greece',1,NULL,'2014-04-03 22:02:24'),
	(246,'Honduras',1,NULL,'2014-04-03 22:02:24'),
	(247,'Iran',1,NULL,'2014-04-03 22:02:24'),
	(248,'Italy',1,NULL,'2014-04-03 22:02:24'),
	(249,'Japan',1,NULL,'2014-04-03 22:02:24'),
	(250,'Korea Republic',1,NULL,'2014-04-03 22:02:24'),
	(251,'L61',1,NULL,'2014-04-03 22:02:24'),
	(252,'L62',1,NULL,'2014-04-03 22:02:24'),
	(253,'Mexico',1,NULL,'2014-04-03 22:02:24'),
	(254,'Netherlands',1,NULL,'2014-04-03 22:02:24'),
	(255,'Nigeria',1,NULL,'2014-04-03 22:02:24'),
	(256,'Portugal',1,NULL,'2014-04-03 22:02:24'),
	(257,'Russia',1,NULL,'2014-04-03 22:02:24'),
	(258,'Spain',1,NULL,'2014-04-03 22:02:24'),
	(259,'Switzerland',1,NULL,'2014-04-03 22:02:24'),
	(260,'Uruguay',1,NULL,'2014-04-03 22:02:24'),
	(261,'USA',1,NULL,'2014-04-03 22:02:24'),
	(262,'W49',1,NULL,'2014-04-03 22:02:24'),
	(263,'W50',1,NULL,'2014-04-03 22:02:24'),
	(264,'W51',1,NULL,'2014-04-03 22:02:24'),
	(265,'W52',1,NULL,'2014-04-03 22:02:24'),
	(266,'W53',1,NULL,'2014-04-03 22:02:24'),
	(267,'W54',1,NULL,'2014-04-03 22:02:24'),
	(268,'W55',1,NULL,'2014-04-03 22:02:24'),
	(269,'W56',1,NULL,'2014-04-03 22:02:24'),
	(270,'W57',1,NULL,'2014-04-03 22:02:24'),
	(271,'W58',1,NULL,'2014-04-03 22:02:24'),
	(272,'W59',1,NULL,'2014-04-03 22:02:24'),
	(273,'W60',1,NULL,'2014-04-03 22:02:24'),
	(274,'W61',1,NULL,'2014-04-03 22:02:24'),
	(275,'W62',1,NULL,'2014-04-03 22:02:24');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table themes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `themes`;

CREATE TABLE `themes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `primary_colour` varchar(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;

INSERT INTO `themes` (`id`, `name`, `image`, `primary_colour`, `created`, `status`)
VALUES
	(15,'Chameleon Green','files/chameleon_reptilia_wallpaper_1600x1200.jpg','60,180,60','2014-04-02 06:14:14',NULL),
	(19,'Tea','files/shutterstock_52215466.jpg','120,90,40','2014-04-02 06:21:51',NULL),
	(20,'DJ','files/8332_127034295841_1794403_n.jpg','40,40,40','2014-04-02 06:29:01',NULL),
	(21,'Formula 1','files/F1_McLaren_and_ASOS.png','50,50,50','2014-04-02 06:38:46',NULL),
	(22,'Ruggers','files/rugby.jpg','30,90,30','2014-04-02 07:42:21',NULL),
	(23,'Basketball Court','files/8798121_basketball_court.jpg','','2014-04-02 07:55:10',NULL),
	(24,'Baseball Low','files/4571236155.jpg','','2014-04-02 07:55:28',NULL),
	(25,'American Football CU','files/American_football_in_Tel_Aviv_Israel.jpg','','2014-04-02 07:55:54',NULL),
	(26,'Back of the Net','files/close_up_football_goal_1341825905.jpg','0,0,0','2014-04-02 07:56:37',NULL),
	(27,'Cricket Ball','files/cricket_ball.jpg','','2014-04-02 07:56:59',NULL),
	(28,'On Your Marks','files/Fields_wallpapers_2721.jpg','','2014-04-02 07:57:19',NULL),
	(29,'Spinning Tennis','files/Global_Tennis_Adviser.jpg','','2014-04-02 08:00:17',NULL),
	(30,'Pride Park East','files/DerbyCountyEastStand.JPG','','2014-04-02 09:24:56',NULL),
	(31,'Rio','files/rio.jpg','180,220,255','2014-04-09 14:27:50',NULL);

/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `position` float NOT NULL DEFAULT '1',
  `field` varchar(255) NOT NULL,
  `value` text,
  `input` varchar(16) NOT NULL,
  `data_type` varchar(16) NOT NULL,
  `label` varchar(128) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_PROFILE_PROPERTY` (`field`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `password_token` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `email_token` varchar(255) DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `tos` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_action` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `BY_USERNAME` (`username`),
  KEY `BY_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `slug`, `password`, `password_token`, `email`, `email_verified`, `email_token`, `email_token_expires`, `tos`, `active`, `last_login`, `last_action`, `is_admin`, `role`, `created`, `modified`)
VALUES
	('52f51e64-ccfc-4d18-bc2d-021ae35825ee','sijobling','sijobling','426c804033f50f97f8a4f607caeea5b3bb7220e5',NULL,'simon.jobling@gmail.com',0,'x4k0fz7tqr','2014-02-08 17:56:52',1,1,NULL,NULL,0,'registered','2014-02-07 17:56:52','2014-02-07 17:56:52');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
