-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 04:30 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eq8mangas`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `mensaje` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `mensaje`) VALUES
(1, 'Erick', 'Villeda', 'erick@admin.com', '5564434345', 'Buena pagina'),
(2, 'Ricardo', 'Hernandez', 'test@admin.com', '55672434355', 'Me gusto mucho la pagina web');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `calificacion` int(1) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `calificacion`, `categoria`) VALUES
(1, 'One Piece', 'Un manga shonen de piratas.', 10.99, 4, 'manga'),
(2, 'Naruto', 'Un manga shonen sobre ninjas.', 9.99, 1, 'anime'),
(3, 'Death Note', 'Un manga seinen de un chico que encuentra un cuaderno que mata.', 12.99, 3, 'seinen'),
(4, 'Shingeki no Kyojin', 'Un manga seinen sobre titanes que atacan a la humanidad.', 14.99, 2, 'manga'),
(5, 'Boku no Hero Academia', 'Un manga shonen sobre un chico que quiere ser un héroe.', 8.99, 5, 'shonen'),
(6, 'Dragon Ball', 'Un manga shonen sobre un guerrero que busca las Dragon Balls.', 15.99, 5, 'anime');

-- --------------------------------------------------------

--
-- Table structure for table `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suscripciones`
--

INSERT INTO `suscripciones` (`id`, `correo`) VALUES
(1, 'erick@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
