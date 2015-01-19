-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 19 Janvier 2015 à 00:19
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

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
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
`idLogement` int(11) NOT NULL,
  `idPropietaire` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `typedelogement` varchar(256) NOT NULL,
  `Pays` varchar(30) NOT NULL,
  `Ville` varchar(25) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(6) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `surface` int(11) NOT NULL,
  `chambres` int(2) NOT NULL,
  `toilettes` int(2) NOT NULL,
  `capacite` int(2) NOT NULL,
  `fumerPermis` tinyint(1) NOT NULL,
  `animauxPermis` tinyint(1) NOT NULL,
  `piscine` tinyint(1) NOT NULL,
  `placesGarage` int(2) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `jardin` tinyint(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logements`
--

INSERT INTO `logements` (`idLogement`, `idPropietaire`, `dateAjout`, `typedelogement`, `Pays`, `Ville`, `adresse`, `codePostal`, `Description`, `surface`, `chambres`, `toilettes`, `capacite`, `fumerPermis`, `animauxPermis`, `piscine`, `placesGarage`, `wifi`, `jardin`) VALUES
(126, 4, '2015-01-18 22:45:38', 'Maison', 'France', 'Paris', '28 rue notre dame des champs', 75006, 'ISEP', 1500, 5, 5, 1000, 1, 0, 0, 0, 1, 0),
(127, 4, '2015-01-18 22:47:32', 'Appartement', 'France', 'Paris', '5 rue de la marne', 75008, 'Bel appartement Ã  Paris', 25, 3, 4, 3, 1, 0, 1, 0, 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
 ADD PRIMARY KEY (`idLogement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
MODIFY `idLogement` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
