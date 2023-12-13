-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 07 juin 2023 à 16:02
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conduite_accompagnee`
--

-- --------------------------------------------------------

--
-- Structure de la table `experiencesCond`
--

DROP TABLE IF EXISTS `experiencesCond`;
CREATE TABLE `experiencesCond` (
  `idExpCond` int(11) NOT NULL,
  `date` date NOT NULL,
  `heureDepart` date NOT NULL,
  `heureArrivee` date NOT NULL,
  `KmParcouru` int(11) NOT NULL,
  `idManoeuvre` tinyint(4) NOT NULL,
  `idMeteo` tinyint(4) NOT NULL,
  `idTrajet` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lesManoeuvres`
--

DROP TABLE IF EXISTS `lesManoeuvres`;
CREATE TABLE `lesManoeuvres` (
  `idManoeuvre` tinyint(4) NOT NULL,
  `manoeuvre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lesManoeuvres`
--

INSERT INTO `lesManoeuvres` (`idManoeuvre`, `manoeuvre`) VALUES
(1, 'demi-tour'),
(2, 'créneau'),
(3, 'épis'),
(4, 'bataille'),
(5, 'démarrage en côte');

-- --------------------------------------------------------

--
-- Structure de la table `lesMeteos`
--

DROP TABLE IF EXISTS `lesMeteos`;
CREATE TABLE `lesMeteos` (
  `idMeteo` tinyint(4) NOT NULL,
  `meteo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lesMeteos`
--

INSERT INTO `lesMeteos` (`idMeteo`, `meteo`) VALUES
(1, 'neigeux'),
(2, 'ensoleille'),
(3, 'pluvieux'),
(4, 'nuageux'),
(5, 'brumeux');

-- --------------------------------------------------------

--
-- Structure de la table `lesTrajets`
--

DROP TABLE IF EXISTS `lesTrajets`;
CREATE TABLE `lesTrajets` (
  `idTrajet` tinyint(4) NOT NULL,
  `trajet` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lesTrajets`
--

INSERT INTO `lesTrajets` (`idTrajet`, `trajet`) VALUES
(1, 'campagne'),
(2, 'montagne'),
(3, 'auto-route'),
(4, 'agglomeration'),
(5, 'mixte');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `experiencesCond`
--
ALTER TABLE `experiencesCond`
  ADD PRIMARY KEY (`idExpCond`),
  ADD KEY `experiencescond_ibfk_2` (`idMeteo`),
  ADD KEY `experiencescond_ibfk_3` (`idTrajet`),
  ADD KEY `experiencescond_ibfk_1` (`idManoeuvre`);

--
-- Index pour la table `lesManoeuvres`
--
ALTER TABLE `lesManoeuvres`
  ADD PRIMARY KEY (`idManoeuvre`);

--
-- Index pour la table `lesMeteos`
--
ALTER TABLE `lesMeteos`
  ADD PRIMARY KEY (`idMeteo`);

--
-- Index pour la table `lesTrajets`
--
ALTER TABLE `lesTrajets`
  ADD PRIMARY KEY (`idTrajet`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experiencesCond`
--
ALTER TABLE `experiencesCond`
  ADD CONSTRAINT `experiencescond_ibfk_1` FOREIGN KEY (`idManoeuvre`) REFERENCES `lesManoeuvres` (`idManoeuvre`),
  ADD CONSTRAINT `experiencescond_ibfk_2` FOREIGN KEY (`idMeteo`) REFERENCES `lesMeteos` (`idMeteo`),
  ADD CONSTRAINT `experiencescond_ibfk_3` FOREIGN KEY (`idTrajet`) REFERENCES `lesTrajets` (`idTrajet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
