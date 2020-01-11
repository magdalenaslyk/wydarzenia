# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2020-01-11 19:00:23
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "komentarze"
#

DROP TABLE IF EXISTS `komentarze`;
CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_wpis` int(11) NOT NULL,
  `komentarz` longtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "komentarze"
#

INSERT INTO `komentarze` VALUES (1,1,0,'Test komentarza'),(2,1,0,'CzeÅ›Ä‡ co tam? :D\r\n'),(3,1,0,'test komentarza\r\n');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Jan','Nowak','nowak','160af033fb05136b11ec2f9489704394','j.nowak@gmail.com');

#
# Structure for table "wpis"
#

DROP TABLE IF EXISTS `wpis`;
CREATE TABLE `wpis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `wpis` longtext COLLATE utf8_polish_ci,
  `data` datetime NOT NULL,
  `images` varchar(350) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ` enum('morze','gory','jezioro') COLLATE utf8_polish_ci DEFAULT NULL,
  `rodzaj` enum('aktywnie','wypoczynek') COLLATE utf8_polish_ci DEFAULT NULL,
  `time` date NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "wpis"
#

INSERT INTO `wpis` VALUES (14,1,'Wypad w gÃ³ry to niezapomniana wycieczka :D','2020-01-11 18:52:48','image/3500.jpg','gory','aktywnie','2020-01-23','Aktywny czas w gÃ³rach :D'),(15,1,'Wypoczynek na plaÅ¼y w KoÅ‚obrzegu to niezwykle spÄ™dzony czas dla tych, ktÃ³rzy poszukujÄ… chwili wytchnienia. ','2020-01-11 18:54:39','image/kolobrzeg.jpg','morze','wypoczynek','2020-06-18','Wypoczynek nad morzem');
