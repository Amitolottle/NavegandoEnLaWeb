-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2014 a las 06:46:00
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `locs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locaciones`
--

CREATE TABLE IF NOT EXISTS `locaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `locaciones`
--

INSERT INTO `locaciones` (`id`, `tipo`, `nombre`, `latitud`, `longitud`) VALUES
(2, 'Restaurante', 'San antonio Ristorante', 3.445788464123206, -76.54019955215449),
(3, 'Bar', 'Donde Checha', 3.4343935522952997, -76.53633717117305),
(4, 'Estacion', 'Unidad Deportiva', 3.4149233602782396, -76.54852512893672),
(5, 'Estacion', 'Villa Colombia', 3.4438933138868437, -76.49900667663576);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
