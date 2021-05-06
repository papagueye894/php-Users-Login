-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 jan. 2020 à 08:38
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `personne_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(70) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Privilege` varchar(25) DEFAULT NULL,
  `personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idCompte`),
  KEY `fk_compte_personne_idx` (`personne_idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(15) DEFAULT NULL,
  `Prenom` varchar(70) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Sexe` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `Nom`, `Prenom`, `Age`, `Sexe`) VALUES
(1, 'Diop', 'Oumou', 24, 'F'),
(2, 'Correa', 'Mame Bou', 24, 'M'),
(3, 'Diop', 'Papa', 24, 'M'),
(4, 'Sene', 'Amadou', 23, 'M'),
(6, 'Ly', 'Fatou', 23, 'F'),
(8, 'Gueye', 'Papa', 25, 'M'),
(10, 'Ly', 'Papa', 226, 'M'),
(11, 'Diop', 'Mame Bou', 24, 'M'),
(14, 'Sy', 'Adja', 52, 'F'),
(15, 'Sene', 'Mame Bou', 23, 'M'),
(17, 'Gueye', 'Mame Bou', 2, 'M'),
(19, 'Ly', 'Fatou', 12, 'F'),
(20, 'Correa', 'Fatou', 23, 'F');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `fk_compte_personne` FOREIGN KEY (`personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
