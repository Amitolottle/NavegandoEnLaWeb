-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2014 a las 05:10:44
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Mensajeria_Web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `elComentario` varchar(1024) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `elComentario`, `idUsuario`) VALUES
(1, 'Cat ipsum dolor sit amet, missing until dinner time rub face on everything. Chew foot kick up litter but chase dog then run away lick arm hair, yet use lap as chair. Chase dog then run away. Attack feet why must they do that run in circles, so destroy couch. Hate dog give attitude. Loves cheeseburgers present belly, scratch hand when stroked or claw drapes, for peer out window, chatter at birds, lure them to mouth.', 1),
(2, 'Leave dead animals as gifts make muffins. Use lap as chair. I like big cats and i can not lie stick butt in face, for bathe private parts with tongue then lick owner''s face find something else more interesting, for flop over.', 2),
(3, 'Cat ipsum dolor sit amet, sleep nap for purr while eating. Chase dog then run away purr while eating yet curl into a furry donut flop over, and purr for no reason and spot something, big eyes, big eyes, crouch, shake butt, prepare to pounce. I like big cats and i can not lie cat snacks', 2),
(4, 'I needed something to eat\r\nI took a walk down the street\r\nI came to 318\r\nSaw my sweet Magdalene', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `idUsuario` int(11) NOT NULL,
  `idPost` int(255) NOT NULL,
  `idFavorito` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idFavorito`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`idUsuario`, `idPost`, `idFavorito`) VALUES
(1, 1, 1),
(1, 1, 2),
(2, 2, 3),
(2, 2, 4),
(2, 2, 5),
(2, 2, 6),
(2, 2, 7),
(2, 2, 8),
(2, 3, 9),
(2, 3, 10),
(2, 3, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportado`
--

CREATE TABLE IF NOT EXISTS `reportado` (
  `idUsuario` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idReportado` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idReportado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1024) COLLATE utf8_bin NOT NULL,
  `correo` varchar(1024) COLLATE utf8_bin NOT NULL,
  `urlImg` varchar(1024) COLLATE utf8_bin NOT NULL,
  `bgColor` varchar(1024) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `correo`, `urlImg`, `bgColor`) VALUES
(1, 'Kammil Carranza', 'kaescavi94@gmail.com', 'images/profile.png', '#607cc4'),
(2, 'Veronica Alegria', 'mvapsacr@gmail.com', 'images/profileVero.png', '#60c49b'),
(3, 'David Angarita', 'monitorDyT@gmail.com', 'images/angarita.png', '#c96565');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
