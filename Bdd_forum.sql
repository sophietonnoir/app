-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 19 Janvier 2015 à 10:22
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `keydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `pseudo` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`pseudo`, `message`, `date`) VALUES
('toto', 'j''ai faim', '0000-00-00 00:00:00'),
('titi', 'j''ai soif', '0000-00-00 00:00:00'),
('test', 'testvotre message\r\n', '0000-00-00 00:00:00'),
('pozkeopzekpor', 'zpoekrpzkrpoezkrpozekrzvotre message\r\n', '0000-00-00 00:00:00'),
('teststestoijrtoirejtoerijteriotjoerijtoierjtoij', 'oitjeroijtiojtoierjtiejroitjeroitjeorjtoerjtoirejtiririririririririririfjfjfjfjjfjfjfjfjfjfjfjf\r\n\r\n', '0000-00-00 00:00:00'),
('gireogjeroijg', 'groegijioerj', '0000-00-00 00:00:00'),
('Mika', 'j-tres bien', '0000-00-00 00:00:00'),
('tototototototot', 'pokrtpoekrotkropktporktpoerkpoterk', '0000-00-00 00:00:00'),
('ipipip', 'pokopkoko', '2015-01-21 00:00:00'),
('oooooooo', 'ooooooo', '0000-00-00 00:00:00'),
('ziejroeirjgiorejgioerjgioerjgioerj@', 'jgzoirjgoierjgioerjgioejorigjoerijgoierj', '2015-01-18 20:09:46'),
('Amir', 'Salut\r\n', '2015-01-18 20:11:26'),
('Amir', 'Test\r\n', '2015-01-18 20:15:00'),
('jzic', 'Amir', '2015-01-18 20:15:14'),
('grf', 'test', '2015-01-18 20:16:22'),
('Asayed', '''''''''', '2015-01-18 20:20:08'),
('CoCo', 'CoCo', '2015-01-18 20:20:19'),
('Amir', 'Amir', '2015-01-18 20:20:50'),
('Amir', 'Amir', '2015-01-18 20:20:58'),
('Coco', 'Im in love with the Coco', '2015-01-18 20:21:06'),
('sayed', 'bonjour', '2015-01-18 20:23:19'),
('', '', '0000-00-00 00:00:00'),
('sayed', 'bonjour', '2015-01-18 20:23:19'),
('DESIGN 2 OUF', 'Trop bien le nouveau design les gars !', '2015-01-18 21:29:53'),
('TRI 2 OUF', 'Trop bien comment les messages sont triÃ©s les gars !', '2015-01-18 21:43:49'),
('Sophie', 'Salut', '2015-01-18 21:51:52'),
('soso578', 'Bonjour comment rentrer un nouveau logement ?', '2015-01-18 21:52:34'),
('Maxmax94', 'Il faut cliquer sur la page " Ajouter un logement "', '2015-01-18 21:53:54'),
('soso578', 'Merci beaucoup @Maxmax94', '2015-01-18 21:54:20'),
('DESIGN 2 OUF', 'OH LA LA TROP DAR COMME ID !', '2015-01-18 22:09:33'),
('Waouh', 'Juste waouh la page est magnifique !', '2015-01-18 22:24:53'),
('Coco', 'Im IN LOVE WITH THE COCO !', '2015-01-18 22:44:55');
