-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2018, 11:06
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `piwne_smaki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id_like` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `like_unlike`
--

INSERT INTO `like_unlike` (`id_like`, `userid`, `postid`, `type`, `timestamp`) VALUES
(1, 1, 1, 1, '2018-02-21 14:29:39'),
(2, 2, 1, 1, '2018-02-21 14:45:51'),
(3, 3, 1, 1, '2018-11-30 00:50:45'),
(4, 4, 1, 1, '2018-02-21 14:50:56'),
(6, 5, 2, 0, '2018-02-21 17:49:55'),
(7, 3, 3, 1, '2018-02-21 15:11:56'),
(8, 4, 2, 0, '2018-02-21 15:11:56'),
(9, 6, 1, 1, '2018-02-21 15:11:56'),
(10, 7, 2, 0, '2018-02-21 15:11:56'),
(11, 9, 2, 1, '2018-11-30 09:11:04'),
(12, 9, 3, 1, '2018-11-30 00:02:30'),
(13, 9, 1, 1, '2018-11-30 09:14:21'),
(14, 9, 7, 0, '2018-11-29 23:49:51'),
(15, 9, 6, 0, '2018-11-30 00:03:17'),
(16, 9, 9, 1, '2018-11-30 00:03:22'),
(17, 9, 8, 1, '2018-11-30 00:03:26'),
(18, 3, 6, 1, '2018-11-30 00:50:50'),
(19, 3, 4, 1, '2018-11-30 00:50:54'),
(20, 3, 10, 1, '2018-11-30 00:50:58'),
(21, 9, 4, 1, '2018-11-30 04:25:19'),
(22, 9, 10, 1, '2018-11-30 04:25:30'),
(23, 9, 14, 0, '2018-11-30 08:48:55'),
(24, 9, 16, 1, '2018-11-30 09:14:42');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id_like`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
