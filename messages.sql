-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2015 a las 11:05:45
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
  `idEchange` int(11) NOT NULL,
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idEmetteur` int(11) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `logementDemande` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `disponibiliteEmetteur` varchar(100) NOT NULL,
  `disponibiliteDestinataire` varchar(100) NOT NULL,
  `message` varchar(256) NOT NULL,
  `dateMessage` timestamp NOT NULL,
  `typeMessage` varchar(30) NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`idEchange`, `idMessage`, `idEmetteur`, `idDestinataire`, `logementDemande`, `lu`, `disponibiliteEmetteur`, `disponibiliteDestinataire`, `message`, `dateMessage`, `typeMessage`) VALUES
(1, 8, 1, 2, 2, 0, '3/5/2015 au 10/5/2015', '3/5/2015 au 10/5/2015', 'message message message', '2015-01-06 13:52:25', 'demandeEchange'),
(2, 9, 2, 1, 3, 1, '8/2/2015 au 10/2/2015', '8/2/2015 au 10/2/2015', 'hola hola hola', '2015-01-06 13:52:37', 'demandeEchange');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
