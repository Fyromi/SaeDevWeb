-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 12 jan. 2025 à 12:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupeetudiant`
--

CREATE TABLE `groupeetudiant` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(50) DEFAULT NULL,
  `imageTitre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupeetudiant`
--

INSERT INTO `groupeetudiant` (`idGroupe`, `nomGroupe`, `imageTitre`) VALUES
(1, 'Groupe A', 'Image A'),
(2, 'Groupe B', 'Image B'),
(3, 'Groupe C', 'Image C'),
(4, 'Groupe D', 'Image D'),
(5, 'Groupe E', 'Image E'),
(6, 'Groupe F', 'Image F'),
(7, 'Groupe G', 'Image G'),
(8, 'Groupe H', 'Image H'),
(9, 'Groupe I', 'Image I'),
(10, 'Groupe J', 'Image J'),
(11, 'Groupe K', 'Image K'),
(12, 'Groupe L', 'Image L');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groupeetudiant`
--
ALTER TABLE `groupeetudiant`
  ADD PRIMARY KEY (`idGroupe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
