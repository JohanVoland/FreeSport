-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Juin 2018 à 12:49
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `freesport`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `disponibilite` date DEFAULT NULL,
  `nombreDispo` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `idType` int(11) NOT NULL,
  `idTaille` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `nom`, `prix`, `disponibilite`, `nombreDispo`, `image`, `idType`, `idTaille`, `idGenre`) VALUES
(3, 'Bas Femme - DeQualitÃ©', 79, '2018-06-30', 100, 'bas-femme1.jpg', 3, 2, 2),
(4, 'Bas Femme - AddaptÃ©sAuSport', 45, '2018-06-30', 120, 'bas2.jpg', 1, 1, 1),
(5, 'Ensemble Femme', 120, '2018-06-30', 120, 'ensemble-femme.png', 2, 2, 2),
(6, 'Ensemble Homme', 120, '2018-06-30', 120, 'ensemble-homme.jpg', 2, 2, 1),
(7, 'test', 324, '2018-06-21', 4324, 'Desert.jpg', 1, 1, 1),
(9, 'Veste de marche bleue', 123, '2018-06-30', 50, 'download.jpg', 2, 2, 1),
(10, 'Veste de sport', 50, '2018-06-27', 50, 'download.jpg', 2, 3, 1),
(11, 'Veste Ã  capuche pour femme', 50, '2018-06-28', 50, '5465-veste-a-capuche-femme-200gm-engel-sport.jpg', 2, 1, 2),
(12, 'Veste de marche', 50, '2018-06-28', 50, 'veste-homme-sport-luisant-noir-a-capuche-gov-denim.jpg', 3, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'utilisateur'),
(2, 'responsable des ventes'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `nom`) VALUES
(1, 'homme'),
(2, 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

CREATE TABLE `lignedecommande` (
  `idLigneDeCommande` int(11) NOT NULL,
  `commande_idCommande` int(11) NOT NULL,
  `article_idArticle` int(11) NOT NULL,
  `quantité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `idTaille` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `taille`
--

INSERT INTO `taille` (`idTaille`, `nom`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`idType`, `nom`) VALUES
(1, 'T-shirt'),
(2, 'Veste'),
(3, 'Training');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rue` varchar(45) DEFAULT NULL,
  `npa` int(11) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `ville` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `nom`, `prenom`, `password`, `email`, `rue`, `npa`, `idCategorie`, `ville`) VALUES
(6, 'administrateur', '-', '-', '$2y$10$PNfbn6BoV82eArMt1ggHZ.ICX6G2TC4qodfSuLOekxwizA79PyXIi', 'FreeSportContact@gmail.com', '-', 0, 3, '-'),
(7, 'responsable des ventes', '-', '-', '$2y$10$O3chdTH73yv0jrFHtblXH.MJY4rloS6id/oAoaxDQnVZHsIy49huC', 'FreeSportContact@gmail.com', '-', 0, 2, '-'),
(8, 'johan voland', 'voland', 'johan', '$2y$10$K/UxmPZOb4ko9PG2FQSscutxD55.TZL6C5CvSy7x7zXfjs8N.plyi', 'johan.voland@cpnv.ch', 'champ derrey 4', 1083, 1, 'MÃ©ziÃ¨res'),
(9, 'UserTest', 'tzrzr', 'trzrt', '$2y$10$ioJH4UAKs7lpFxlZOfEp5evRZOcIS4BZHvGc0tQVb1VpN.XOpUgGe', 'User.Test@cpnv.ch', 'champ derrey 4', 435, 1, 'ste. croix'),
(10, 'JohnSmith', 'Smith', 'John', '$2y$10$BxAXfodfJ29HKP6PV0HwKOgdlU/u1XW1oViXMjh70YfsZMlX8lvvm', 'johnSMITH@cpnv.ch', 'Rue centrale 4', 1234, 1, 'Village');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`,`idType`,`idTaille`,`idGenre`),
  ADD KEY `fk_article_type_idx` (`idType`),
  ADD KEY `fk_article_taille1_idx` (`idTaille`),
  ADD KEY `fk_article_sexe1_idx` (`idGenre`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`,`idUtilisateur`),
  ADD KEY `fk_commande_utilisateur1_idx` (`idUtilisateur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Index pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD PRIMARY KEY (`idLigneDeCommande`,`commande_idCommande`,`article_idArticle`),
  ADD KEY `fk_commande_has_article_article1_idx` (`article_idArticle`),
  ADD KEY `fk_commande_has_article_commande1_idx` (`commande_idCommande`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`idTaille`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`,`idCategorie`),
  ADD KEY `fk_utilisateur_categorie1_idx` (`idCategorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  MODIFY `idLigneDeCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `idTaille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_sexe1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_taille1` FOREIGN KEY (`idTaille`) REFERENCES `taille` (`idTaille`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_type` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_utilisateur1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `fk_commande_has_article_article1` FOREIGN KEY (`article_idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commande_has_article_commande1` FOREIGN KEY (`commande_idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_categorie1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
