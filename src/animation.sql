-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 22-03-2023 a les 11:01:49
-- Versió del servidor: 8.0.32-0ubuntu0.20.04.2
-- Versió de PHP: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `animation`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `cartoon`
--

CREATE TABLE `cartoon` (
  `id` int NOT NULL,
  `nom` varchar(30) NOT NULL,
  `cartoonist` int NOT NULL,
  `img` text NOT NULL,
  `film` int NOT NULL COMMENT 'codi de la peli on surt el personatge'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Bolcament de dades per a la taula `cartoon`
--

INSERT INTO `cartoon` (`id`, `nom`, `cartoonist`, `img`, `film`) VALUES
(1, 'Mickey Mouse', 1, 'mickey.png', 1),
(2, 'Scooby Doo', 2, 'doo.jpeg', 2),
(11, 'Son Goku', 4, 'goku.jpg', 3),
(12, 'Taz', 6, 'taz.jpg', 4),
(13, 'Bart Simpson', 8, 'bart.png', 5),
(17, 'BMW', 1, 'BMW.jpg', 1),
(33, 'BMW2', 4, 'BMW.jpg', 3),
(34, 'Pallasso', 16, 'pallasso.jpg', 2),
(35, 'Tinder', 4, 'tinder.jpg', 2),
(36, 'Tinder2', 7, 'tinder.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de la taula `cartoonist`
--

CREATE TABLE `cartoonist` (
  `id` int NOT NULL,
  `nom` varchar(30) NOT NULL,
  `familyname` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Bolcament de dades per a la taula `cartoonist`
--

INSERT INTO `cartoonist` (`id`, `nom`, `familyname`, `country`) VALUES
(1, 'Walt', 'Disney', 'USA'),
(2, 'Joseph \"Joe\"', 'Ruby', 'USA'),
(4, 'Akira', 'Toriyama', 'Japan'),
(6, 'Robert', 'McKimson', 'USA'),
(7, 'Jim', 'Davis', 'USA'),
(8, 'Matt', 'Groening', 'USA'),
(9, 'Fujiko', 'F. Fujio', 'Japan'),
(10, 'William and Joseph', 'Hanna - Barbera', 'USA'),
(11, 'Elzie Crisler', 'Segar', 'USA'),
(12, 'Stephen', 'Hillenburg', 'USA'),
(13, 'Trey & Matt', 'Parker & Stone', 'USA'),
(14, 'Arlene', 'Klasky', 'USA'),
(15, 'Otto James', 'Messmer', 'USA'),
(16, 'Friz', 'Freleng', 'USA'),
(17, 'Jim', 'Jinkins', 'USA'),
(18, 'Pierre', 'Culliford', 'Belgium'),
(19, 'ppp', '', 'ppp'),
(20, 'ppp', 'ppp', 'ppp'),
(21, 'prova1', 'prova1', 'prova1'),
(22, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `year` int NOT NULL,
  `director` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Bolcament de dades per a la taula `film`
--

INSERT INTO `film` (`id`, `name`, `year`, `director`, `genre`) VALUES
(1, 'Steamboat Willie', 1928, 'Walt Disney', 'animation'),
(2, 'Scooby Doo Where Are You?', 1969, 'Hannah - Barbera', 'animation'),
(3, 'Bola de Drac', 1984, 'Takami', 'genre'),
(4, 'Looney Tunes', 1954, 'Warner Bros', 'genre'),
(5, 'The Simpsons', 1989, 'Fox Broadcasting Company', 'sitcom'),
(6, 'prova', 1899, 'prova', 'prova'),
(7, 'prova', 1899, 'prova', 'prova'),
(8, 'asd', 1899, 'asd', 'PROVA'),
(9, 'prova', 1902, 'prova', 'prova'),
(10, 'ssss', 1900, 'ssss', 'sss');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `cartoon`
--
ALTER TABLE `cartoon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film` (`film`),
  ADD KEY `cartoonist` (`cartoonist`) USING BTREE;

--
-- Índexs per a la taula `cartoonist`
--
ALTER TABLE `cartoonist`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `cartoon`
--
ALTER TABLE `cartoon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la taula `cartoonist`
--
ALTER TABLE `cartoonist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la taula `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `cartoon`
--
ALTER TABLE `cartoon`
  ADD CONSTRAINT `id_cartoonist` FOREIGN KEY (`cartoonist`) REFERENCES `cartoonist` (`id`),
  ADD CONSTRAINT `id_film` FOREIGN KEY (`film`) REFERENCES `film` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
