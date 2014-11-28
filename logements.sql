-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2014 a las 15:11:15
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
-- Estructura de tabla para la tabla `logements`
--

CREATE TABLE IF NOT EXISTS `logements` (
  `idLogement` int(11) NOT NULL AUTO_INCREMENT,
  `idPropietaire` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complementAdresse` varchar(255) NOT NULL,
  `codePostal` int(6) NOT NULL,
  `description` varchar(256) NOT NULL,
  `chambres` int(2) NOT NULL,
  `toilettes` int(2) NOT NULL,
  `capacite` int(2) NOT NULL,
  `fumerPermis` tinyint(1) NOT NULL,
  `animauxPermis` tinyint(1) NOT NULL,
  `piscine` tinyint(1) NOT NULL,
  `placesGarage` int(2) NOT NULL,
  `wifii` tinyint(1) NOT NULL,
  PRIMARY KEY (`idLogement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
