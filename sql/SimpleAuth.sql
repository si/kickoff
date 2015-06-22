CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `timezone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;