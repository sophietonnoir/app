-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2014 a las 12:29:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `keydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idEmetteur` int(11) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `disponibiliteEmetteur` varchar(100) NOT NULL,
  `disponibiliteDestinataire` varchar(100) NOT NULL,
  `message` varchar(256) NOT NULL,
  `dateMessage` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`idEmetteur`, `idDestinataire`, `lu`, `disponibiliteEmetteur`, `disponibiliteDestinataire`, `message`, `dateMessage`) VALUES
(1, 0, 0, 'ioedj', 'ojlk,', 'okl', '0000-00-00 00:00:00'),
(1, 0, 0, 'ioedj', 'ojlk,', 'okl', '0000-00-00 00:00:00'),
(1, 0, 0, 'iusefdkij', 'iwelsgjdvk', 'kahjszfkj,', '0000-00-00 00:00:00'),
(1, 0, 0, 'oijkIJLKojl', 'pol', 'lj', '0000-00-00 00:00:00'),
(1, 0, 0, 'okl', 'kj,mpol', 'olklj', '0000-00-00 00:00:00'),
(1, 0, 0, 'okl', 'kj,mpol', 'olklj', '0000-00-00 00:00:00'),
(1, 0, 0, 'okl', 'kj,mpol', 'olklj', '0000-00-00 00:00:00'),
(1, 0, 0, 'okl', 'kj,mpol', 'olklj', '0000-00-00 00:00:00'),
(1, 0, 0, 'okl', 'kj,mpol', 'olklj', '0000-00-00 00:00:00'),
(1, 0, 0, 'kuj', 'oilkj', 'ij', '0000-00-00 00:00:00'),
(1, 1, 0, 'sdvxok', 'olk', 'molk', '0000-00-00 00:00:00'),
(1, 2, 0, 'efdzc', 'ikj', 'ikj', '0000-00-00 00:00:00'),
(2, 1, 0, 'iuhkjILK', 'OIJL', 'LIJ', '0000-00-00 00:00:00'),
(1, 2, 0, '3eij', 'iojk', 'oijk', '0000-00-00 00:00:00'),
(1, 0, 0, 'ed', '9oik', 'ikj', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
