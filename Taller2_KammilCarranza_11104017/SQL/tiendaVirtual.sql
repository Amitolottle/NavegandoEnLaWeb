-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2014 a las 06:11:16
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tiendaVirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `idProducto`, `idUsuario`, `fecha`) VALUES
(1, 1, 1, '2014-10-13'),
(2, 1, 1, '2014-10-15'),
(3, 1, 1, '2014-10-15'),
(4, 2, 1, '2014-10-15'),
(5, 1, 1, '2014-10-15'),
(6, 2, 1, '2014-10-15'),
(7, 4, 1, '2014-10-15'),
(8, 3, 3, '2014-10-15'),
(9, 1, 3, '2014-10-15'),
(10, 2, 3, '2014-10-15'),
(11, 1, 1, '2014-10-15'),
(12, 4, 3, '2014-10-15'),
(13, 2, 3, '2014-10-15'),
(14, 1, 3, '2014-10-15'),
(15, 1, 1, '2014-10-15'),
(16, 2, 1, '2014-10-15'),
(17, 3, 1, '2014-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `precio` int(11) NOT NULL,
  `categoria` varchar(1024) COLLATE utf8_bin NOT NULL,
  `bombillos` int(11) NOT NULL,
  `vendedor` varchar(1024) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria`, `bombillos`, `vendedor`) VALUES
(1, 'Por una ciudad mejor', 325, 'Proyectos de grado', 57, 'Carlos Paz'),
(2, 'El futuro', 1234, 'Empresas', 72, 'Foncho Pazco'),
(3, 'Cena Perfecta', 45, 'Cocina', 17, 'Nube Prax'),
(4, 'Dos en la Ciudad', 65, 'Citas', 38, 'Albert Cassanova');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(1024) COLLATE utf8_bin NOT NULL,
  `rutaImagen` varchar(1024) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombre`, `contrasena`, `rutaImagen`) VALUES
(1, 'kaescavi94@gmail.com', 'Kammil Carranza', 'pasarWeb', 'images/MiPerfil.png'),
(2, 'firulin@gmail.com', 'Firulo Lucas', 'vainilla', 'images/default.png'),
(3, 'mvapsacr@gmail.com', 'Veronica Alegria', 'zapato1', 'images/vero.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
