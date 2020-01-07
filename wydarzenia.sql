# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2020-01-07 22:03:17
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "komentarze"
#

DROP TABLE IF EXISTS `komentarze`;
CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `komentarz` longtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "komentarze"
#

INSERT INTO `komentarze` VALUES (1,1,'Test komentarza');

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
  `wpis` longtext COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `images` varchar(350) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

#
# Data for table "wpis"
#

INSERT INTO `wpis` VALUES (1,1,'CzeÅ›Ä‡ wszystkim organizujÄ™ wyjÅ›cie w gÃ³ry w sobotÄ™ z rana. Zapraszam wszystkich bardzo serdecznie. ','2020-01-04 15:07:01','image/3500.jpg'),(2,1,'Siemankow :D wypad nad morze to fajna sprawa. Kto byÅ‚by chÄ™tny na wypad do KoÅ‚obrzegu?\r\nPiszcie :D\r\n','2020-01-07 20:24:38','image/kolobrzeg.jpg');
