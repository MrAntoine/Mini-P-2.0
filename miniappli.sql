-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 déc. 2018 à 17:16
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `miniappli`
--

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEcrit` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id`, `idEcrit`, `idUtilisateur`) VALUES
(7, 19, 1),
(8, 9, 1),
(9, 38, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

DROP TABLE IF EXISTS `ecrit`;
CREATE TABLE IF NOT EXISTS `ecrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrit`
--

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(25, '01/12', 'test 01', '2018-12-01 11:34:57', '', 1, 1),
(2, 'test2', 'SIOFJQOIJFODIJFGOIDJF', '2018-02-14 16:57:14', '', 2, 1),
(9, 'BONJOUR TOTO', 'c\'est un message de gilles à 23h02', '2018-11-27 10:02:05', '', 1, 2),
(37, 'gfgfgfd', 'fgfhfhfhf', '2018-12-04 14:22:22', '', 1, 1),
(13, 'dfgbqdf', 'wdfb', '2018-11-27 11:08:44', '', 5, 2),
(39, 'Bonjour Gilles', 'Tu as vu ce réseau social ?? Il est fabuleux !! ', '2018-12-10 17:09:57', '', 1, 1),
(36, 'Dernier test ', '19h31', '2018-12-01 07:31:11', '', 1, 1),
(19, 'bonjour', 'eqrotjsorijgoijo', '2018-11-28 02:38:55', '', 1, 1),
(26, 'J\'ai faim', 'Il est bientôt l\'heure de manger', '2018-12-01 11:35:19', '', 1, 1),
(28, 'kl,kl,,kl', 'klk,lkl,', '2018-12-01 11:54:36', '', 1, 1),
(38, 'Une image', 'ma publication image', '2018-12-04 21:24:35', 'IMG_2938.JPG', 1, 1),
(30, 'test', 'test', '2018-12-01 06:40:49', '', 1, 1),
(31, 'il est 18h40', 'il est 18h40', '2018-12-01 06:41:07', '', 1, 1),
(32, 'test sans timezone', 'il est 18:49', '2018-12-01 06:50:42', '', 1, 1),
(33, 'test', 'il est 18h53', '2018-12-01 06:55:02', '', 1, 1),
(34, 'jknjnkjnk', 'jnknjkjnknjk', '2018-12-01 06:55:24', '', 1, 1),
(35, 'Bonjsoir c\'est un test', 'il est 19h12', '2018-12-01 07:12:13', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(1, 1, 2, 'ami'),
(2, 1, 3, 'attente'),
(43, 5, 1, 'ami'),
(54, 1, 4, 'attente'),
(55, 1, 7, 'attente'),
(37, 1, 6, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `remember`, `avatar`) VALUES
(1, 'gilles', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'gilles@toto.fr', '', 'IMG_3073.JPG'),
(2, 'toto', '1234', 'toto@toto.fr', '', 'IMG_2962.JPG'),
(3, 'utilisateur3', '1234', 'utilisateur3@toto.fr', '', ''),
(4, 'utilisateur4', '1234', 'utilisateur4@toto.fr', '', ''),
(5, 'utilisateur5', '1234', 'utilisateur5@toto.fr', '', ''),
(6, 'utilisateur6', '1234', 'utilisateur6@toto.fr', '', ''),
(7, 'utilisateur7', '1234', 'utilisateur7@toto.fr', '', ''),
(8, 'utilisateur8', '1234', 'utilisateur8@toto.fr', '', ''),
(9, 'utilisateur9\r\n', '1234', 'utilisateur9@toto.fr', '', ''),
(10, 'utilisateur10\r\n', '1234', 'utilisateur10@toto.fr', '', ''),
(11, 'toto2', '1234', 'toto2@toto.fr', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
