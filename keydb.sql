-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Novembre 2014 à 16:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `keydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `codepostal` int(6) NOT NULL,
  `adresse` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `dateinscription` date NOT NULL,
  `password` varchar(16) NOT NULL,
  `tel` int(15) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nmaison` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pays`, `codepostal`, `adresse`, `mail`, `dateinscription`, `password`, `tel`, `admin`, `pseudo`, `nmaison`) VALUES
(1, 'Le Dorh', 'Jean', 'FRANCE', 92260, '2,rue Joseph le Guay', 'jledorh@gmail.com', '2014-11-07', '123456', 659118303, 1, 'yannadadmin', 1),
(2, 'Le Dorh', 'Jean', 'FRANCE', 92260, '2,rue Joseph le Guay', 'jledorh@icloud.com', '2014-11-07', '234567', 659118303, 0, 'yannad', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
