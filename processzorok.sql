-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2023. Dec 29. 11:43
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_elso_dolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `processzorok`
--

CREATE TABLE `processzorok` (
  `id` bigint(20) NOT NULL,
  `processzor_gyarto` varchar(30) NOT NULL,
  `processzor_tipus` varchar(30) NOT NULL,
  `orajel` double NOT NULL,
  `architektura` enum('x86-64','x86','AMD64','IA64') NOT NULL,
  `kibocsajtas` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `processzorok`
--

INSERT INTO `processzorok` (`id`, `processzor_gyarto`, `processzor_tipus`, `orajel`, `architektura`, `kibocsajtas`) VALUES
(2, 'Intel', 'Pentium D1507', 1.2, 'x86-64', '2015'),
(3, 'Intel', 'Pentium N3710', 2.56, 'IA64', '2016'),
(4, 'AMD', 'Opteron X2100', 2.4, 'x86', '2016'),
(13, 'Intel', 'Core™ i9 Processors (14th gen)', 6, 'IA64', '2023');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `processzorok`
--
ALTER TABLE `processzorok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `processzorok`
--
ALTER TABLE `processzorok`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
