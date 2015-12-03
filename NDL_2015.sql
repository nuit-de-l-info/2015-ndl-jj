-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 03 Décembre 2015 à 21:16
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ninfo`
--

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
  `auteur` int(11) NOT NULL,
  `crise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `auteur` (`auteur`),
  ADD KEY `crise` (`crise`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
