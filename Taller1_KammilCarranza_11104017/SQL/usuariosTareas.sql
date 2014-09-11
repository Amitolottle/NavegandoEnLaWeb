-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2014 a las 08:46:20
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `usuariosTareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTarea` int(255) NOT NULL AUTO_INCREMENT,
  `prioridad` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `creacion` date NOT NULL,
  `finalizacion` date NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idTarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `prioridad`, `creacion`, `finalizacion`, `descripcion`) VALUES
(1, 'Alta', '2014-09-02', '2014-09-12', 'Entregar taller 1 de programación web'),
(2, 'Baja', '2014-09-02', '2014-09-03', 'Ir a Falabella a solucionar el problema del producto'),
(3, 'Medio', '1990-12-02', '1991-12-20', 'Hagamos las paces!'),
(4, 'Alta', '1996-01-04', '1996-03-04', 'LA MAMA DE FIRULO!'),
(5, 'Baja', '1995-12-01', '1995-12-25', 'Comprar el te de wonka'),
(6, 'Alta', '2014-09-07', '2014-09-10', 'Terminar ficha tÃ©cnica de redes'),
(7, 'Alta', '1996-12-31', '2014-09-19', 'Terminar expo Modelado'),
(8, 'Alta', '2014-09-10', '2014-09-12', 'Hacer taller competencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareasDeUsuarios`
--

CREATE TABLE IF NOT EXISTS `tareasDeUsuarios` (
  `idTarea` int(255) NOT NULL,
  `correoUsuario` varchar(1024) COLLATE utf8_bin NOT NULL,
  `prioridadTarea` varchar(1024) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tareasDeUsuarios`
--

INSERT INTO `tareasDeUsuarios` (`idTarea`, `correoUsuario`, `prioridadTarea`) VALUES
(1, 'kaescavi94@gmail.com', 'Alta'),
(2, 'adkad@gmail.com', 'Baja'),
(3, 'adkad@gmail.com', 'prioridad'),
(4, 'kaescavi94@gmail.com', 'Alta'),
(5, 'kaescavi94@gmail.com', 'Baja'),
(6, 'mvapsacr@gmail.com', 'Alta'),
(7, 'mvapsacr@gmail.com', 'Alta'),
(8, 'peperamon@hotmail.com', 'Alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `correo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(1024) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(1024) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `nombre`, `apellido`, `contrasena`) VALUES
('kaescavi94@gmail.com', 'Kammil', 'Carranza', 'pasarWeb'),
('adkad@gmail.com', 'Carlos', 'Perez', 'ahoy1'),
('peperamon@hotmail.com', 'Juan', 'Ramon', 'idiota1'),
('mvapsacr@gmail.com', 'Veronica', 'Alegria', 'veroasdfg'),
('unCorreoElectronico@hotmail.es', 'unNombre', 'unApellido', 'unaCon'),
('danielitadr@hotmail.com', 'Daniela', 'Delgado', 'manchas01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
