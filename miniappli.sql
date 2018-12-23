-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 déc. 2018 à 20:51
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id`, `idEcrit`, `idUtilisateur`) VALUES
(7, 19, 1),
(8, 9, 1),
(17, 39, 1),
(10, 33, 1),
(18, 42, 13),
(12, 40, 13),
(13, 39, 13),
(14, 40, 1),
(16, 36, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrit`
--

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(42, 'Contributions', 'voici les contributions', '2018-12-23 20:37:57', 'contributions.png', 1, 1),
(2, 'test2', 'SIOFJQOIJFODIJFGOIDJF', '2018-02-14 16:57:14', '', 2, 1),
(9, 'BONJOUR TOTO', 'c\'est un message de gilles à 23h02', '2018-11-27 10:02:05', '', 1, 2),
(13, 'dfgbqdf', 'wdfb', '2018-11-27 11:08:44', '', 5, 2),
(39, 'Bonjour Gilles', 'Tu as vu ce réseau social ?? Il est fabuleux !! ', '2018-12-10 17:09:57', '', 1, 1),
(26, 'J\'ai faim', 'Il est bientôt l\'heure de manger', '2018-12-01 11:35:19', '', 1, 1),
(38, 'Une image', 'ma publication image', '2018-12-04 21:24:35', 'IMG_2938.JPG', 1, 1),
(31, 'il est 18h40', 'il est 18h40', '2018-12-01 06:41:07', '', 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(1, 1, 2, 'ami'),
(2, 1, 3, 'attente'),
(43, 5, 1, 'ami'),
(54, 1, 4, 'attente'),
(55, 1, 7, 'attente'),
(56, 1, 8, 'attente'),
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `remember`, `avatar`) VALUES
(1, 'gilles', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'gilles@toto.fr', '', 'IMG_2922.JPG'),
(2, 'toto', '1234', 'toto@toto.fr', '', 'IMG_2962.JPG'),
(3, 'utilisateur3', '1234', 'utilisateur3@toto.fr', '', ''),
(11, 'toto2', '1234', 'toto2@toto.fr', '', ''),
(12, 'jesuisenmmi', '*51AF2E76A436659C6FA9C44CA318F624B0D4ABB9', 'mmiorth@gkzl.com', NULL, 'default-avatar.jpg'),
(13, 'Antoine', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'antoinevdblycee@gmail.com', NULL, 'default-avatar.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
