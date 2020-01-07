# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2020-01-04 14:37:07
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "users"
#


#
# Structure for table "wpisy"
#

DROP TABLE IF EXISTS `wpisy`;
CREATE TABLE `wpisy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `wpis` longtext COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `images` varchar(350) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "wpisy"
#

