-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Lun 19 Janvier 2015 à 22:40
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

-- --------------------------------------------------------

--
-- Structure de la table `criteres`
--

CREATE TABLE `criteres` (
  `nomcritere` varchar(50) NOT NULL,
  `typecritere` varchar(50) NOT NULL,
  `nom` varchar(256) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `criteres`
--

INSERT INTO `criteres` (`nomcritere`, `typecritere`, `nom`, `id`) VALUES
('Type de logement', 'select', 'typedelogement', 1),
('Adresse', 'textarea', 'adresse', 2),
('Code Postal', 'input', 'codePostal', 3),
('Ville', 'input', 'Ville', 4),
('Pays', 'select', 'Pays', 5),
('Surface', 'input', 'surface', 6),
('Capacite', 'input', 'capacite', 7),
('Nombre de chambres', 'select', 'chambres', 8),
('Animaux autorises', 'inputradio', 'animauxPermis', 9),
('Piscine', 'inputradio', 'piscine', 10),
('Wifi', 'inputradio', 'wifi', 11),
('Jardin', 'inputradio', 'jardin', 13),
('Fumeur', 'inputradio', 'fumerPermis', 14),
('Nombre de toilettes', 'select', 'toilettes', 15),
('Nombre de places de parking', 'select', 'placesGarage', 16),
('Description', 'textarea', 'Description', 17);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
`idmessage` int(11) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`idmessage`, `pseudo`, `message`, `date`) VALUES
(27, 'soso578', 'Bonjour comment rentrer un nouveau logement ?', '2015-01-18 21:52:34'),
(28, 'Maxmax94', 'Il faut cliquer sur la page " Ajouter un logement "', '2015-01-18 21:53:54'),
(29, 'soso578', 'Merci beaucoup @Maxmax94', '2015-01-18 21:54:20');

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
(126, 11, '2015-01-19 21:37:24', 'Maison', 'France', 'Paris', '28 rue notre dame des champs', 75006, 'ISEP', 1500, 5, 5, 1000, 1, 0, 0, 0, 1, 0),
(127, 4, '2015-01-19 21:40:36', 'Appartement', 'France', 'Paris', '5 rue de la marne', 75008, 'Appartement calme Ã  Paris', 25, 3, 4, 3, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `idEchange` int(11) NOT NULL,
`idMessage` int(11) NOT NULL,
  `idEmetteur` int(11) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `logementDemande` int(11) NOT NULL,
  `logPropose` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL,
  `disponibiliteEmetteurArrivee` varchar(100) NOT NULL,
  `disponibiliteEmetteurDepart` varchar(100) NOT NULL,
  `disponibiliteDestinataireArrivee` varchar(100) NOT NULL,
  `disponibiliteDestinataireDepart` varchar(100) NOT NULL,
  `message` varchar(256) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `typeMessage` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`idEchange`, `idMessage`, `idEmetteur`, `idDestinataire`, `logementDemande`, `logPropose`, `lu`, `disponibiliteEmetteurArrivee`, `disponibiliteEmetteurDepart`, `disponibiliteDestinataireArrivee`, `disponibiliteDestinataireDepart`, `message`, `dateMessage`, `typeMessage`) VALUES
(2, 2, 4, 1, 126, 127, 1, '01/01/2015', '01/02/2015', '01/03/2015', '01/04/2015', 'salut!!!!', '2015-01-19 12:51:11', 'demandeEchange'),
(2, 3, 1, 4, 126, 0, 1, '01/03/2015', '01/04/2015', '01/01/2015', '01/02/2015', 'eeeeey', '2015-01-19 12:51:52', 'reponseAccepte'),
(2, 6, 4, 1, 126, 0, 1, '01/01/2015', '01/02/2015', '01/03/2015', '01/04/2015', 'Veuillez remplir et signer votre partie du contrat:  ', '2015-01-19 13:03:08', 'confirmation'),
(2, 8, 1, 4, 126, 0, 1, '01/03/2015', '01/04/2015', '01/01/2015', '01/02/2015', 'On a le plaisir de vous communiquer que l'' echange est definitivement arrangÃ©. A partir de maintenant, veuillez contacter le propietaire dans l'' information donnÃ©e dans le contrat:  ', '2015-01-19 13:05:52', 'confirmationFinale'),
(3, 9, 1, 4, 127, 126, 1, '01/08/2015', '01/09/2015', '01/10/2015', '01/14/2015', 'uuu', '2015-01-19 14:02:42', 'demandeEchange');

-- --------------------------------------------------------

--
-- Structure de la table `notation_maison`
--

CREATE TABLE `notation_maison` (
  `note` int(11) NOT NULL,
`id_note` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmaison` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notation_maison`
--

INSERT INTO `notation_maison` (`note`, `id_note`, `iduser`, `idmaison`) VALUES
(3, 1, 0, 0),
(3, 2, 0, 0),
(3, 3, 0, 0),
(3, 4, 0, 0),
(3, 5, 0, 0),
(4, 6, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `nous_contacter`
--

CREATE TABLE `nous_contacter` (
  `Nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Objet` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Message` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nous_contacter`
--

INSERT INTO `nous_contacter` (`Nom`, `Prenom`, `Email`, `Objet`, `Message`) VALUES
('ouahes', 'Iza', 'iouahes@juniorisep.com', 'Bla', 'test test'),
('blanchier', 'oeo', 'izksk', ',;dkjknfknf', ',ds,  d,fv ,df');

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
  `idLogement` int(11) NOT NULL,
`idPhoto` int(11) NOT NULL,
  `Liendelaphoto` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Photo`
--

INSERT INTO `Photo` (`idLogement`, `idPhoto`, `Liendelaphoto`) VALUES
(126, 273, '../tmp/isep.gif'),
(126, 274, '../tmp/isep1.png'),
(126, 275, '../tmp/isep2.jpg'),
(127, 276, '../tmp/appart1.jpg'),
(127, 277, '../tmp/19971.jpg'),
(127, 278, '../tmp/appart.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `codepostal` int(6) NOT NULL,
  `adresse` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `tel` int(15) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nmaison` int(11) NOT NULL,
  `questions` varchar(256) NOT NULL,
  `reponses` varchar(256) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `ville` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pays`, `codepostal`, `adresse`, `mail`, `password`, `tel`, `admin`, `pseudo`, `nmaison`, `questions`, `reponses`, `sexe`, `ville`) VALUES
(11, 'Admin', 'Admin', 'France', 75008, '28, rue Notre Dame des Champs ', 'Admin@isep.fr', 'c984aed014aec7623a54f0591da07a85fd4b762d', 125678976, 1, 'Admin', 0, '1', '', 'Masculin', 'Paris');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
 ADD PRIMARY KEY (`idContrat`);

--
-- Index pour la table `criteres`
--
ALTER TABLE `criteres`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
 ADD PRIMARY KEY (`idmessage`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
 ADD PRIMARY KEY (`idLogement`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`idMessage`);

--
-- Index pour la table `notation_maison`
--
ALTER TABLE `notation_maison`
 ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `Photo`
--
ALTER TABLE `Photo`
 ADD PRIMARY KEY (`idPhoto`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `criteres`
--
ALTER TABLE `criteres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
MODIFY `idLogement` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `notation_maison`
--
ALTER TABLE `notation_maison`
MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;