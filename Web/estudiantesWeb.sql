-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-08-2014 a las 02:30:39
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estudiantesWeb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `codigo` varchar(500) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(1000) COLLATE latin1_bin NOT NULL,
  `apellido` varchar(1000) COLLATE latin1_bin NOT NULL,
  `correo` varchar(1000) COLLATE latin1_bin NOT NULL,
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`codigo`, `nombre`, `apellido`, `correo`) VALUES
('10234576', 'Juan', 'Ramón', 'senorTengoTalento@gmail.com'),
('11104017', 'Kammil', 'Carranza', 'kaescavi94@gmail.com'),
('11123849', 'Carlos', 'Garcia', 'jajiffn@gmail.com'),
('11124027', 'Veronica', 'Alegria', 'mvapsacr@gmail.com'),
('11203948', 'Juan', 'Guerra', 'juanLu@gmail.com'),
('11212023', 'Natalia', 'Ayala Pèrez', 'natalia.ayala@correo.icesi.edu.co'),
('11236578', 'Pepito', 'Perez', 'adkad@gmail.com'),
('12112019', 'Andres', 'Bonilla', 'leecher01@gmail.com'),
('12112021', 'Karina', 'Rodriguez', 'picadasExpress12@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `idNota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1000) COLLATE latin1_bin NOT NULL,
  `porcentaje` int(11) NOT NULL,
  PRIMARY KEY (`idNota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idNota`, `nombre`, `porcentaje`) VALUES
(1, 'Taller1', 20),
(2, 'Taller2', 25),
(3, 'Taller3', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasdeestudiantes`
--

CREATE TABLE IF NOT EXISTS `notasdeestudiantes` (
  `idNota` int(11) NOT NULL,
  `codigoEstudiante` varchar(1000) COLLATE latin1_bin NOT NULL,
  `valor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `notasdeestudiantes`
--

INSERT INTO `notasdeestudiantes` (`idNota`, `codigoEstudiante`, `valor`) VALUES
(1, '11212023', 5),
(1, '10234576', 2),
(2, '10234576', 2),
(2, '12112019', 2),
(2, '12112021', 3),
(1, '12112021', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
