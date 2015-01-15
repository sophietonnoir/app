-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 15 Janvier 2015 à 13:38
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `keydb`
--

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
  `placesGarage` int(2) DEFAULT NULL,
  `wifi` tinyint(1) NOT NULL,
  `jardin` tinyint(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logements`
--

INSERT INTO `logements` (`idLogement`, `idPropietaire`, `dateAjout`, `typedelogement`, `Pays`, `Ville`, `adresse`, `codePostal`, `Description`, `surface`, `chambres`, `toilettes`, `capacite`, `fumerPermis`, `animauxPermis`, `piscine`, `placesGarage`, `wifi`, `jardin`) VALUES
(1, 3, '2014-12-09 10:34:26', '', 'France', 'Paris', '28 Rue Notre Dames des Champs', 75006, 'ISEP, n''avez vous pas toujours voulu vivre dans votre lycee !?', 0, 8, 4, 500, 0, 0, 0, 2, 1, 0),
(2, 4, '2015-01-12 14:16:53', 'Appartement', 'France', 'Colombes', '64 Avenue Anatole France', 92700, 'Pavillon dans un quartier paisible, a 5 min de la gare La Garenne Colombes.\r\nPetit jardin, ambiance cosy cosy assuree !', 50, 4, 3, 300, 0, 0, 0, 2, 1, 0),
(3, 3, '2015-01-07 20:07:45', '', 'France', 'Colombes', '14 rue Pasteur', 92700, 'Maison dans un quartier paisible, proche du Pizza hut, et de l''ecole maternelle', 0, 3, 2, 150, 0, 0, 0, 2, 1, 0),
(4, 4, '2014-12-09 15:57:18', 'Maison', 'France', 'Asnieres', '20 rue de la marne', 92600, 'ok', 200, 2, 1, 3, 0, 0, 0, 2, 0, 0),
(22, 1, '2015-01-07 20:08:27', 'Maison', 'france', 'paris', 'ezfez', 23456, 'babla', 12, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(36, 1, '2014-12-16 15:12:48', 'Maison', 'france', 'paris', '5 rue de la marne', 12345, 'sdfgfghggf', 34, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(78, 2, '2015-01-07 20:07:33', 'Appartement', '', 'colombes', '3 rue de paris', 92100, 'bel appartement', 23, 2, 3, 2, 1, 1, 1, 2, 1, 0),
(79, 1, '2015-01-07 20:07:40', 'Maison', 'France', 'paris', 'dsfdg', 12345, 'dsfgd', 12, 1, 1, 1, 1, 1, 0, 0, 0, 1),
(80, 3, '2015-01-07 20:07:24', 'Maison', 'France', 'paris', 'sdff', 12345, 'dfdg', 12, 1, 1, 12, 1, 1, 0, 0, 0, 1),
(82, 2, '2015-01-07 20:08:18', 'Maison', 'France', 'lkjhvg', 'dfgh', 23456, 'dfsdgf', 21, 1, 1, 1, 0, 1, 0, 0, 0, 0),
(83, 4, '2015-01-07 15:44:09', 'Appartement', 'France', 'Boulogne', '23 rue des martyrs de la premiÃ¨re guerre mondiale', 12345, 'Appartement en plein centre', 56, 2, 2, 3, 0, 1, 1, 1, 1, 0),
(84, 4, '2015-01-10 15:25:29', 'Maison', 'France', 'Paris', '2 avenue belleforiere', 75008, 'belle maison Ã  Paris', 150, 3, 2, 5, 0, 0, 1, 1, 1, 0),
(89, 4, '2015-01-12 14:20:58', 'Maison', 'France', 'Boulogne', '6 rue de la faune', 12345, 'sqdesfdgf', 150, 1, 1, 3, 1, 1, 1, 0, 1, 1),
(92, 4, '2015-01-13 14:02:19', 'Maison', 'France', 'Boulogne', 'dsfgf', 12345, 'fdgh', 9, 1, 1, 3, 1, 1, 1, 0, 1, 1),
(94, 4, '2015-01-13 14:05:33', 'Maison', 'France', 'dfvf', 'cvb', 12345, 'dfgdfhf', 50, 1, 1, 1, 1, 1, 1, 0, 1, 1),
(112, 4, '2015-01-15 12:35:36', 'Maison', '', 'belleville', 'qSDF', 56789, 'sqdfg', 67, 1, 1, 5, 1, 1, 1, 0, 1, 1);

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
  `lu` tinyint(1) NOT NULL,
  `disponibiliteEmetteur` varchar(100) NOT NULL,
  `disponibiliteDestinataire` varchar(100) NOT NULL,
  `message` varchar(256) NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `typeMessage` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`idEchange`, `idMessage`, `idEmetteur`, `idDestinataire`, `logementDemande`, `lu`, `disponibiliteEmetteur`, `disponibiliteDestinataire`, `message`, `dateMessage`, `typeMessage`) VALUES
(1, 23, 1, 2, 2, 1, '13/05/2015 au 15/05/2015', '3/06/2015 au 5/06/2015', 'message du gmail au icloud', '0000-00-00 00:00:00', 'demandeEchange'),
(2, 24, 1, 2, 2, 1, '08/09/2015 au 12/09/2015', '5/12/2015 au 10/12/2015', 'message2 du gmail au icloud', '0000-00-00 00:00:00', 'demandeEchange'),
(2, 25, 2, 1, 2, 1, '5/12/2015 au 10/12/2015', '08/09/2015 au 12/09/2015', 'Nous sommes desolÃ©s de vous communiquer le refus de l'' echange du logement.', '0000-00-00 00:00:00', 'reponseRefus'),
(3, 26, 2, 1, 3, 1, '2/3/2015 au 8/3/2015', '8/3/2015 au 15/3/2015', 'message du icloud au gmail', '0000-00-00 00:00:00', 'demandeEchange'),
(3, 28, 1, 2, 3, 0, '8/3/2015 au 15/3/2015', '2/3/2015 au 8/3/2015', 'Nous sommes desolÃ©s de vous communiquer le refus de l'' echange du logement.', '0000-00-00 00:00:00', 'reponseRefus'),
(1, 29, 2, 1, 2, 1, '3/06/2015 au 5/06/2015', '13/05/2015 au 15/05/2015', 'JE VEUX ACCEPTER L'' ECHANGE', '0000-00-00 00:00:00', 'reponseAccepte');

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
  `idLogement` int(11) NOT NULL,
`idPhoto` int(11) NOT NULL,
  `Liendelaphoto` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Photo`
--

INSERT INTO `Photo` (`idLogement`, `idPhoto`, `Liendelaphoto`) VALUES
(1, 11, 'http://www.gralon.net/articles/vignettes/thumb-l-isep--institut-superieur-d-electronique-de-paris-2072.gif'),
(1, 12, 'http://seineouestdigital.fr/wp-content/uploads/2014/09/ISEP.jpg'),
(1, 13, 'http://www.ingenieurs.com/images/article/299_1.jpg'),
(2, 21, 'http://www.gagnerunemaison.fr/wp-content/uploads/2012/01/la_maison_champignon.jpg'),
(2, 22, 'http://www.coloriage.tv/dessincolo/maison-des-schtroumpfs.png'),
(2, 23, 'http://1.bp.blogspot.com/-JP0FeI1d-wM/UKqBPwNr-HI/AAAAAAAAAOE/SK2awOtTcq0/s1600/champignon+maison.jpg'),
(3, 31, 'http://www.immobilierprovenceconseil.com/site/images/normal/Conseil5279fa7a74646.gif'),
(3, 32, 'http://1.bp.blogspot.com/-84naaSa4suQ/TYMevjJleMI/AAAAAAAABPw/DH5o0pToW7I/s220/cartoon_house.jpg'),
(3, 33, 'http://i.istockimg.com/file_thumbview_approve/9406199/2/stock-illustration-9406199-village-house-and-summer-spring-nature-doodle-cartoon.jpg'),
(4, 42, ' ../tmp/lacbleu.jpg'),
(4, 43, '../tmp/lacforet.jpg'),
(22, 80, '../tmp/chateau.jpg'),
(23, 82, '../tmp/rapace.jpg'),
(23, 84, '../tmp/villagelac.jpg'),
(24, 89, '../tmp/image034.jpg'),
(36, 90, '../tmp/chateau.jpg'),
(80, 96, '../tmp/canyon.jpg'),
(82, 97, '../tmp/cascade1.jpg'),
(83, 98, '../tmp/paris.jpg'),
(84, 99, '../tmp/fleurs.jpg'),
(84, 100, '../tmp/neigeblanc.jpg'),
(89, 101, '../tmp/chateauecossais.jpg'),
(89, 102, '../tmp/rochejaune.jpg'),
(89, 103, '../tmp/villagelac.jpg'),
(92, 107, '../tmp/bleu.jpg'),
(92, 108, '../tmp/cascade.jpg'),
(92, 109, '../tmp/bigbang.jpg'),
(94, 110, '../tmp/eclairs.jpg'),
(94, 111, '../tmp/caravelle.jpg'),
(94, 112, '../tmp/bleu.jpg'),
(112, 167, '../tmp/bleu.jpg'),
(112, 168, '../tmp/bigbang.jpg'),
(112, 169, '../tmp/grotte.jpg');

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
  `dateinscription` date NOT NULL,
  `password` varchar(16) NOT NULL,
  `tel` int(15) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nmaison` int(11) NOT NULL,
  `age` date NOT NULL,
  `questions` varchar(256) NOT NULL,
  `reponses` varchar(256) NOT NULL,
  `sexe` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pays`, `codepostal`, `adresse`, `mail`, `dateinscription`, `password`, `tel`, `admin`, `pseudo`, `nmaison`, `age`, `questions`, `reponses`, `sexe`) VALUES
(1, 'Le Dorh', 'Jean', 'FRANCE', 92260, '2,rue Joseph le Guay', 'jledorh@gmail.com', '2014-11-07', '123456', 659118303, 1, 'yannadadmin', 1, '0000-00-00', '', '', ''),
(2, 'Le Dorh', 'Jean', 'FRANCE', 92260, '2,rue Joseph le Guay', 'jledorh@icloud.com', '2014-11-07', '234567', 659118303, 0, 'yannad', 0, '0000-00-00', '', '', ''),
(3, 'Jimenez', 'Monica', 'Espagne', 28223, '56, rue Islas', 'm@hotmail.com', '2014-11-24', 'abcd', 123456789, 0, 'mjr', 0, '0000-00-00', '', '', ''),
(4, 'tonnoir', 'sophie', 'france', 78600, '83 bis avenue de saint germain', 'laptitesophie78@hotmail.fr', '2014-12-04', 'blabla', 606965290, 1, 'soso573', 6, '0000-00-00', '', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `criteres`
--
ALTER TABLE `criteres`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `criteres`
--
ALTER TABLE `criteres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
MODIFY `idLogement` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `idMessage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;