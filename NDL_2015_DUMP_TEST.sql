-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Décembre 2015 à 05:06
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ninfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `user_password` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_date_register` date NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Ma catégorie');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `nb_votes_negatifs` int(11) NOT NULL DEFAULT '0',
  `nb_votes_positifs` int(11) DEFAULT '0',
  `auteur` int(11) NOT NULL,
  `crise` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `auteur` (`auteur`),
  KEY `crise` (`crise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `crise`
--

CREATE TABLE IF NOT EXISTS `crise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hashtag` varchar(20) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `auteur` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `rayon_en_metres` int(11) NOT NULL DEFAULT '10',
  `est_termine` tinyint(1) NOT NULL DEFAULT '0',
  `est_validee` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `crise`
--

INSERT INTO `crise` (`id`, `nom`, `description`, `hashtag`, `longitude`, `latitude`, `auteur`, `categorie`, `rayon_en_metres`, `est_termine`, `est_validee`) VALUES
(6, 'Tsunami à Paris', 'Une vague de 100m', '#crise_#kamikaze', 2.290255, 48.860799, 1, 1, 5, 0, 0),
(7, 'Attentat à Paris', 'Prise d''otages...', '#crise_#prayforparis', 2.304760, 48.851877, 1, 1, 30, 0, 0),
(8, 'Nuit de l''info', 'Trop d''étudiants qui tentent de s''échapper', '#crise_#nuitinfo', 1.400828, 43.578220, 1, 1, 3, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `pseudo_twitter` varchar(20) DEFAULT NULL,
  `est_admin` tinyint(1) NOT NULL DEFAULT '0',
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `pseudo_twitter`, `est_admin`, `mdp`) VALUES
(1, 'test@kazhord.fr', 'test', 9, 'empty');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `commentaire` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `est_positif` tinyint(1) NOT NULL,
  PRIMARY KEY (`commentaire`,`utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_COMMENTAIRE_CRISE` FOREIGN KEY (`crise`) REFERENCES `crise` (`id`),
  ADD CONSTRAINT `FK_COMMENTAIRE_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_COMMENTAIRE_PARENT` FOREIGN KEY (`parent`) REFERENCES `commentaire` (`id`);

--
-- Contraintes pour la table `crise`
--
ALTER TABLE `crise`
  ADD CONSTRAINT `FK_CRISE_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_CRISE_CATEGORIE` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
