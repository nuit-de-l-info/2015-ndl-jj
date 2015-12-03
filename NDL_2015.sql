-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 03 Décembre 2015 à 21:00
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ninfo`
--


-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `nb_votes_negatifs` int(11) NOT NULL DEFAULT '0',
  `nb_votes_positifs` int(11) DEFAULT '0',
  `auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `crise`
--

CREATE TABLE `crise` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hashtag` varchar(20) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `auteur` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `rayon_en_metres` int(11) NOT NULL DEFAULT '10',
  `est_termine` tinyint(1) NOT NULL DEFAULT '0',
  `est_validee` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pseudo_twitter` varchar(20) DEFAULT NULL,
  `est_admin` tinyint(1) NOT NULL DEFAULT '0',
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `commentaire` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `est_positif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `auteur` (`auteur`);

--
-- Index pour la table `crise`
--
ALTER TABLE `crise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`commentaire`,`utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `crise`
--
ALTER TABLE `crise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_COMMENTAIRE_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_COMMENTAIRE_PARENT` FOREIGN KEY (`parent`) REFERENCES `commentaire` (`id`);

--
-- Contraintes pour la table `crise`
--
ALTER TABLE `crise`
  ADD CONSTRAINT `FK_CRISE_AUTEUR` FOREIGN KEY (`auteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_CRISE_CATEGORIE` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`);
