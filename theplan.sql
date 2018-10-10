-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql20j13.db.hostpoint.internal
-- Erstellungszeit: 07. Okt 2018 um 23:24
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `theplan`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT NULL,
  `rolle` tinyint(4) DEFAULT NULL,
  `profilepic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `token`, `log_date`, `status`, `rolle`, `profilepic`) VALUES
(1, 'nelson.lopez@backup.one', 'Nelson', 'Widmer', '752d35d14b6fdffac3ff3d962bcdf7b77323c88cfd692e61c3d112ecbaf354ec', '3311aeca887fb24defecb22b00cfa8', '2017-06-29 02:02:12', 1, 0, 'IchAug2016.jpg'),
(2, 'nelson.lopez@filesync.ch', 'Nelson', 'LOKO', '94395302b8861a62c2e9552f667d007af057db31a81de387c96322ff2c43e358', '8e1bbfd8cbe48535d119c62dbc0dda', '2017-06-29 12:05:18', 1, 0, NULL),
(4, 'nelson.lopez1806@gmail.com', 'Nelson', 'Lopez', '0b55630f0d13cd0cad3caa65961da523b9b14e1db47852ec5e45cd0e7181d37a', 'a88e1248b0831c41c733237c3409fc', '2017-07-02 12:26:16', 1, 0, NULL),
(5, 'nelson.lopez1806@gmail.com', 'Nelson', 'Lopez', '85ea7f74dac1ad47de132462400ffa135a4a64742fea1b61d0823a8efd2614d4', '6cd3c8234fb6dfc9665201cba42f01', '2017-08-10 10:35:17', 1, 0, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
