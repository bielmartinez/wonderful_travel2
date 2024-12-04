-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 20:20:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wonderful_travel`
--
CREATE DATABASE IF NOT EXISTS `wonderful_travel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wonderful_travel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destins`
--

CREATE TABLE `destins` (
  `id` int(10) UNSIGNED NOT NULL,
  `continent` varchar(20) NOT NULL,
  `pais` varchar(40) NOT NULL,
  `preu` float NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destins`
--

INSERT INTO `destins` (`id`, `continent`, `pais`, `preu`, `foto`) VALUES
(1, 'Àsia', 'India', 1950, NULL),
(2, 'Europa', 'França', 2300.5, NULL),
(3, 'Amèrica', 'Brasil', 1800, 'brazil.jpg'),
(4, 'Àfrica', 'Sud-àfrica', 2500, NULL),
(5, 'Oceania', 'Austràlia', 3200.75, 'australia.jpg'),
(6, 'Europa', 'Espanya', 2000, NULL),
(7, 'Àsia', 'Japó', 2700, 'japon.jpg'),
(8, 'Europa', 'Itàlia', 2200, NULL),
(9, 'Amèrica', 'Mèxic', 1500, 'mexic.jpg'),
(10, 'Àfrica', 'Egipte', 1900, NULL),
(11, 'Oceania', 'Nova Zelanda', 3400.5, 'nova_zelanda.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_desti` int(10) UNSIGNED NOT NULL,
  `fecha_reserva` date NOT NULL,
  `nom_titular` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `id_desti`, `fecha_reserva`, `nom_titular`) VALUES
(1, 2, '2024-11-20', 'Carlos Pérez'),
(2, 3, '2024-11-21', 'Ana García'),
(3, 4, '2024-11-22', 'Laura Gómez'),
(4, 5, '2024-11-23', 'Pere Pi'),
(5, 6, '2024-11-24', 'Pedro Sánchez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destins`
--
ALTER TABLE `destins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_pais` (`pais`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_desti` (`id_desti`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destins`
--
ALTER TABLE `destins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_desti`) REFERENCES `destins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
