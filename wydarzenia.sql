-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2020, 22:15
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wydarzenia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_wpis` int(11) NOT NULL,
  `komentarz` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id`, `id_user`, `id_wpis`, `komentarz`) VALUES
(1, 1, 0, 'Test komentarza'),
(2, 1, 0, 'CzeÅ›Ä‡ co tam? :D\r\n'),
(3, 1, 0, 'test komentarza\r\n'),
(4, 1, 0, 'a co tam chcecie robić?'),
(5, 1, 0, 'a co tam chcecie robić?\r\n'),
(6, 1, 0, 'lmfkeskg'),
(7, 1, 0, 'hej a co tam będziecie robić ziomeczki?'),
(8, 0, 17, 'hejka misiaczki'),
(9, 0, 18, 'dupa'),
(10, 0, 22, 'dupa dupa cycki'),
(11, 1, 17, 'kcenjwiuvhrmhguehguiuig hm5ui5uimu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `togo`
--

CREATE TABLE `togo` (
  `id_togo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `email`) VALUES
(1, 'Jan', 'Nowak', 'nowak', '160af033fb05136b11ec2f9489704394', 'j.nowak@gmail.com'),
(2, 'Magdalena', 'Słyk', 'madzix', '$2y$10$77GKvwilDn/Esv3DKVcjD.MDeCyNYYtQJYUSCeQZAV0H1leCUGTbO', 'mnjsd@jebu.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpis`
--

CREATE TABLE `wpis` (
  `id_wpis_w` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `wpis` longtext COLLATE utf8_polish_ci DEFAULT NULL,
  `data` datetime NOT NULL,
  `path_zdjecia` char(120) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ` enum('morze','gory','jezioro') COLLATE utf8_polish_ci DEFAULT NULL,
  `rodzaj` enum('aktywnie','wypoczynek') COLLATE utf8_polish_ci DEFAULT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wpis`
--

INSERT INTO `wpis` (`id_wpis_w`, `id_user`, `wpis`, `data`, `path_zdjecia`, `typ`, `rodzaj`, `tytul`) VALUES
(17, 1, 'Fajny domek w górach dla 5 osób\r\n', '2020-01-18 15:41:16', 'image/', 'gory', 'wypoczynek', 'Wakacje w górach'),
(18, 1, 'Ferie dla 5 osób', '2020-01-18 15:56:57', 'image/', 'morze', 'wypoczynek', 'Ferie nad morzem'),
(19, 0, 'Dołącz do nas, będzie fajnie', '2020-01-26 00:00:00', '/../img/Super ferie.jpg', 'gory', 'wypoczynek', 'Super ferie'),
(20, 0, 'asfwefewf', '2020-01-09 00:00:00', '/../img/adafe.jpg', 'gory', 'wypoczynek', 'adafe'),
(21, 0, 'test', '2020-01-24 00:00:00', '/../img/madzix44.jpg', 'morze', 'aktywnie', 'madzix44'),
(22, 2, 'fefe', '2020-01-09 00:00:00', '/../img/madzixtest.jpg', 'morze', 'aktywnie', 'madzixtest');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `togo`
--
ALTER TABLE `togo`
  ADD PRIMARY KEY (`id_togo`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wpis`
--
ALTER TABLE `wpis`
  ADD PRIMARY KEY (`id_wpis_w`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `togo`
--
ALTER TABLE `togo`
  MODIFY `id_togo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wpis`
--
ALTER TABLE `wpis`
  MODIFY `id_wpis_w` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
