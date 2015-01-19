-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 19 Janvier 2015 à 16:51
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `keydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
`idContrat` int(11) NOT NULL,
  `idEchange` int(11) NOT NULL,
  `idDemandeur` int(11) NOT NULL,
  `idRepondeur` int(11) NOT NULL,
  `routeContrat` varchar(150) NOT NULL,
  `typeContrat` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contrats`
--

INSERT INTO `contrats` (`idContrat`, `idEchange`, `idDemandeur`, `idRepondeur`, `routeContrat`, `typeContrat`) VALUES
(3, 2, 4, 1, '../APPK2Kv2.1/contrats/maison-delacour-1836.jpg', 'contratA'),
(5, 2, 1, 4, '../APPK2Kv2.1/contrats/cdrs.jpg', 'contratB');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
 ADD PRIMARY KEY (`idContrat`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;