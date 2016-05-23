# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.01 (MySQL 5.5.42)
# Database: kickoff_dev
# Generation Time: 2016-05-23 06:56:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `name`, `city`, `lat`, `long`, `postcode`, `updated`)
VALUES
	(8,'Anfield','Liverpool',53.4308,2.96083,NULL,NULL),
	(9,'Ayresome Park','Middlesbrough',54.5642,1.24694,NULL,NULL),
	(10,'Baseball Ground','Derby',52.9047,1.46861,NULL,NULL),
	(11,'Bloomfield Road','Blackpool',53.8047,3.04806,NULL,NULL),
	(12,'Upton Park','London',51.5319,0.0394444,'','2016-05-23 06:51:08'),
	(13,'Boundary Park','Oldham',53.5553,2.12861,NULL,NULL),
	(14,'Bramall Lane','Sheffield',53.3703,1.47083,NULL,NULL),
	(15,'Britannia Stadium','Stoke-on-Trent',52.9883,2.17556,NULL,NULL),
	(16,'Burnden Park','Bolton',53.5689,2.41611,NULL,NULL),
	(17,'Cardiff City Stadium','Cardiff',51.4728,3.20306,NULL,NULL),
	(18,'Carrow Road','Norwich',52.6222,1.30917,NULL,NULL),
	(19,'City Ground','Nottingham',52.94,1.13278,NULL,NULL),
	(20,'Etihad Stadium','Manchester',53.4831,2.20028,NULL,NULL),
	(21,'County Ground','Swindon',51.5644,1.77056,NULL,NULL),
	(22,'Craven Cottage','London',51.475,0.221667,NULL,NULL),
	(23,'Dean Court','Bournemouth',50.7353,1.83833,NULL,NULL),
	(24,'The Dell','Southampton',50.9147,1.41306,NULL,NULL),
	(25,'DW Stadium','Wigan',53.5475,2.65417,NULL,NULL),
	(26,'Elland Road','Leeds',53.7778,1.57222,NULL,NULL),
	(27,'Emirates Stadium','London',51.555,0.108611,NULL,NULL),
	(28,'Ewood Park','Blackburn',53.7286,2.48917,NULL,NULL),
	(29,'Filbert Street','Leicester',52.6236,1.14056,NULL,NULL),
	(30,'Fratton Park','Portsmouth',50.7964,1.06389,NULL,NULL),
	(31,'Goodison Park','Liverpool',53.4389,2.96639,NULL,NULL),
	(32,'The Hawthorns','West Bromwich',52.5092,1.96389,NULL,NULL),
	(33,'Highbury','London',51.5578,0.102778,NULL,NULL),
	(34,'Highfield Road','Coventry',52.4119,1.49,NULL,NULL),
	(35,'Hillsborough Stadium','Sheffield',53.4114,1.50056,NULL,NULL),
	(36,'KC Stadium','Kingston upon Hull',53.7461,0.3675,NULL,NULL),
	(37,'King Power Stadium','Leicester',52.6203,1.14222,NULL,NULL),
	(38,'Liberty Stadium','Swansea',51.6428,3.93472,NULL,NULL),
	(39,'Loftus Road','London',51.5092,0.232222,NULL,NULL),
	(40,'Macron Stadium','Bolton',53.5806,2.53556,NULL,NULL),
	(41,'Madejski Stadium','Reading',51.4222,0.982778,NULL,NULL),
	(42,'Maine Road','Manchester',53.4511,2.23528,NULL,NULL),
	(43,'Molineux Stadium','Wolverhampton',52.5903,2.13028,NULL,NULL),
	(44,'Oakwell','Barnsley',53.5522,1.4675,NULL,NULL),
	(45,'Old Trafford','Trafford',53.4631,2.29139,NULL,NULL),
	(46,'Portman Road','Ipswich',52.055,1.14472,NULL,NULL),
	(47,'Pride Park Stadium','Derby',52.915,1.44722,NULL,NULL),
	(48,'Riverside Stadium','Middlesbrough',54.5783,1.21694,NULL,NULL),
	(49,'Roker Park','Sunderland',54.9214,1.37556,NULL,NULL),
	(50,'St Andrew\'s','Birmingham',52.4758,1.86806,NULL,NULL),
	(51,'St. James\' Park','Newcastle upon Tyne',54.9756,1.62167,NULL,NULL),
	(52,'St Mary\'s Stadium','Southampton',50.9058,1.39111,NULL,NULL),
	(53,'Selhurst Park','London',51.3983,0.0855556,NULL,NULL),
	(54,'Stadium of Light','Sunderland',54.9144,1.38833,NULL,NULL),
	(55,'Stamford Bridge','London',51.4817,0.191111,NULL,NULL),
	(56,'Turf Moor','Burnley',53.7892,2.23028,NULL,NULL),
	(57,'The Valley','London',51.4864,0.0363889,NULL,NULL),
	(58,'Valley Parade','Bradford',53.8042,1.75889,NULL,NULL),
	(59,'Vicarage Road','Watford',51.65,0.401667,NULL,NULL),
	(60,'Villa Park','Birmingham',52.5092,1.88472,NULL,NULL),
	(61,'White Hart Lane','London',51.6033,0.0658333,NULL,NULL);

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
