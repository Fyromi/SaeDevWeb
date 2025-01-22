-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 jan. 2025 à 21:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12
DROP DATABASE IF EXISTS `sae`;
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

CREATE DATABASE IF NOT EXISTS `sae` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sae`;

-- --------------------------------------------------------

--
-- Structure de la table `appartienta`
--

CREATE TABLE `appartienta` (
  `idUtilisateur` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `appartienta`
--

INSERT INTO `appartienta` (`idUtilisateur`, `idGroupe`) VALUES
(10, 0),
(31, 1),
(31, 6),
(32, 1),
(32, 7),
(33, 2),
(33, 7),
(33, 36),
(34, 2),
(34, 8),
(34, 36),
(35, 3),
(35, 8),
(35, 36),
(36, 3),
(36, 9),
(37, 4),
(37, 9),
(38, 4),
(38, 10),
(39, 5),
(39, 10),
(40, 5),
(40, 11),
(41, 6),
(41, 11),
(41, 36);

-- --------------------------------------------------------

--
-- Structure de la table `associeaprojet`
--

CREATE TABLE `associeaprojet` (
  `idGroupe` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `associeaprojet`
--

INSERT INTO `associeaprojet` (`idGroupe`, `idProjet`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 7),
(7, 9),
(8, 8),
(9, 4),
(10, 6),
(11, 8),
(12, 1),
(12, 10),
(14, 2),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 2),
(0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `champ`
--

CREATE TABLE `champ` (
  `idChamp` int(11) NOT NULL,
  `texteChamp` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `estresponsablede`
--

CREATE TABLE `estresponsablede` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `estresponsablede`
--

INSERT INTO `estresponsablede` (`idUtilisateur`, `idProjet`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(0, 23),
(0, 24),
(1, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(1, 30),
(1, 31),
(2, 32);

-- --------------------------------------------------------

--
-- Structure de la table `evalgroupe`
--

CREATE TABLE `evalgroupe` (
  `idGroupe` int(11) NOT NULL,
  `idEval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evalindividuelle`
--

CREATE TABLE `evalindividuelle` (
  `idUtilisateur` int(11) NOT NULL,
  `idEval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evalrendu`
--

CREATE TABLE `evalrendu` (
  `idEval` int(11) NOT NULL,
  `idRendu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `idEval` int(11) NOT NULL,
  `nomEval` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `coef` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupeetudiant`
--

CREATE TABLE `groupeetudiant` (
  `idGroupe` INT(11) NOT NULL AUTO_INCREMENT,
  `nomGroupe` VARCHAR(50) ,
  `imageTitre` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Déchargement des données de la table `groupeetudiant`
--

INSERT INTO `groupeetudiant` (`idGroupe`, `nomGroupe`, `imageTitre`) VALUES
(0, NULL, NULL),
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
(12, 'Groupe L', 'Image L'),
(13, 'OK', NULL),
(14, 'OK', NULL),
(15, 'Economie', NULL),
(16, NULL, NULL),
(17, NULL, NULL),
(18, NULL, NULL),
(19, NULL, NULL),
(20, NULL, NULL),
(21, NULL, NULL),
(22, NULL, NULL),
(23, 'Groupe Z', NULL),
(24, 'Groupe Y', NULL),
(25, 'Groupe Y', NULL),
(26, 'Groupe Y', NULL),
(27, 'Younes', NULL),
(36, 'Ultimate', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intervientdans`
--

CREATE TABLE `intervientdans` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `intervientdans`
--

INSERT INTO `intervientdans` (`idUtilisateur`, `idProjet`) VALUES
(2, 1),
(2, 7),
(13, 1),
(13, 7),
(14, 1),
(16, 7),
(17, 7),
(18, 8),
(19, 8),
(20, 8),
(21, 3),
(21, 9),
(22, 3),
(22, 9),
(23, 3),
(23, 9),
(24, 4),
(24, 9),
(25, 4),
(25, 10),
(26, 4),
(26, 10),
(27, 4),
(27, 10),
(28, 5),
(29, 1),
(29, 5),
(30, 5),
(31, 6),
(32, 6),
(33, 6),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `possedechamps`
--

CREATE TABLE `possedechamps` (
  `idProjet` int(11) NOT NULL,
  `idChamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idProjet` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(25) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `anneeUniversitaire` int(11) DEFAULT NULL,
  `semestre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idProjet`, `titre`, `description`, `anneeUniversitaire`, `semestre`) VALUES
(0, 'Economie', 'Cecici ets un projet d\'économie', 2024, '3'),
(1, 'Web', 'Développement d\'un site web', 2025, 'semestre1'),
(2, 'Mobile', 'Application mobile pour gestion de tâches', 2025, 'semestre1'),
(3, 'Data', 'Analyse de données pour projet scientifique', 2025, 'semestre1'),
(4, 'Réseau', 'Déploiement d\'un réseau informatique', 2025, 'semestre1'),
(5, 'IoT', 'Création d\'un dispositif IoT', 2025, 'semestre1'),
(6, 'AI', 'Développement d\'un modèle d\'intelligence artificielle', 2025, 'semestre1'),
(7, 'Sécurité', 'Audit de sécurité pour une entreprise', 2025, 'semestre2'),
(8, 'Blockchain', 'Mise en place d\'une plateforme Blockchain', 2025, 'semestre2'),
(9, 'Big Data', 'Analyse de données massives pour marketing', 2025, 'semestre2'),
(10, 'VR', 'Création d\'une expérience en réalité virtuelle', 2025, 'semestre2'),
(29, 'projetMort', 'Un projet dont on ne ressort pas indem', 666, '666'),
(32, 'Test', 'rIEN', 1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `projetressource`
--

CREATE TABLE `projetressource` (
  `idProjet` int(11) NOT NULL,
  `idRessource` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projetressource`
--

INSERT INTO `projetressource` (`idProjet`, `idRessource`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 23),
(2, 2),
(2, 24),
(2, 30),
(2, 31),
(1, 32),
(2, 33);

-- --------------------------------------------------------

--
-- Structure de la table `rendu`
--

CREATE TABLE `rendu` (
  `idRendu` bigint(20) UNSIGNED NOT NULL,
  `nomRendu` varchar(50) DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `fichierRendu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendu`
--

INSERT INTO `rendu` (`idRendu`, `nomRendu`, `date_limite`, `fichierRendu`) VALUES
(1, 'Premier dépôt', '2025-02-01', NULL),
(2, 'Dépôt intermédiaire', '2025-03-15', NULL),
(3, 'Rendu final', '2025-04-30', NULL),
(4, 'Test', '2025-01-21', NULL),
(5, 'younes', '2025-01-22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `renduprojet`
--

CREATE TABLE `renduprojet` (
  `idProjet` int(11) NOT NULL,
  `idRendu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `renduprojet`
--

INSERT INTO `renduprojet` (`idProjet`, `idRendu`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `idRessource` bigint(20) UNSIGNED NOT NULL,
  `nomRessource` varchar(50) DEFAULT NULL,
  `lienRessource` varchar(150) DEFAULT NULL,
  `type` enum('consignes','documents') NOT NULL DEFAULT 'documents'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`idRessource`, `nomRessource`, `lienRessource`, `type`) VALUES
(1, 'Documents 2', 'Projet/Projet1/ressource/morpion.h', 'documents'),
(2, 'Documents 3', 'http://lien3.com', 'documents'),
(3, 'Documents 4', 'http://lien4.com', 'documents'),
(4, 'Documents 5', 'http://lien5.com', 'documents'),
(5, 'Consignes 6', 'Projet/Projet1/ressource/HOWTO 03 - iptables.pdf', 'consignes'),
(6, 'Documents 7', 'Projet/Projet1/ressource/HOWTO 03 - iptables.pdf', 'documents'),
(7, 'Documents 8', 'http://lien8.com', 'documents'),
(8, 'Documents 9', 'Projet/Projet1/ressource/HOWTO 03 - iptables.pdf', 'documents'),
(9, 'Documents 10', 'http://lien10.com', 'documents'),
(10, 'Documents 11', 'http://lien10.com', 'documents'),
(23, 'Documents 1', 'Projet/Projet1/ressource/socket.c', 'documents'),
(25, '2', NULL, 'documents'),
(26, 'Hello.java', 'C:\\xampp\\htdocs\\SaeDevWeb\\Projet\\Projet2\\/ressourc', 'documents'),
(27, 'utilisateur.sql', 'Projet\\Projet2\\/ressourceutilisateur.sql', 'documents'),
(28, 'sae.sql', 'Projet/Projet1/ressourcesae.sql', 'documents'),
(29, 'afellah_nc.md', 'Projet/Projet2/ressource/afellah_nc.md', 'documents'),
(30, 'afellah_nc.md', 'Projet/Projet2/ressource/afellah_nc.md', 'documents'),
(31, 'Younes', 'Projet/Projet2/ressource/afellah_nc.md', 'documents'),
(32, 'caca ', 'Projet/Projet1/ressource/Nikola PETRICEVIC Ariles ', 'documents'),
(33, 'Yovanne', 'Projet/Projet2/ressource/nenuphar.png', 'documents');

-- --------------------------------------------------------

--
-- Structure de la table `ressourcemiseenavant`
--

CREATE TABLE `ressourcemiseenavant` (
  `idProjet` int(11) NOT NULL,
  `idRessource` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soutenance`
--

CREATE TABLE `soutenance` (
  `idSoutenance` int(11) NOT NULL,
  `nomSoutenance` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soutenancerendu`
--

CREATE TABLE `soutenancerendu` (
  `idSoutenance` int(11) NOT NULL,
  `idRendu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `profilpicture` VARCHAR(255) DEFAULT 'images/defaultProfile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(0, 'test', '$2y$10$U.HUUY7QPZpNFbEzFBt2nufC0GE27vePty9c4rhm42cHc5aiqZdIu', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(1, 'responsable1', '$2b$12$XCAXW4uFpJguMGL.Lohb/.MMXzPSX3AWI3LOXZingZX.1DFKTUkOm', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(2, 'responsable2', '$2b$12$zx0ez52L9QRLRQhW4be8yukDuP64MQqC00jPBlWqITqwt3QFuqLL2', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(3, 'responsable3', '$2b$12$bvnAfPL0ueky/GN0dobiSObwyPOaAyMymz7ktf1xb6TBKULOl1SVa', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(4, 'responsable4', 'password4', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(5, 'responsable5', '$2b$12$sjieaAyLUwMD/dBQBcYNmu30OQ1QaOPx5l.ZwLvXlqK64Q8o7LiWO', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(6, 'responsable6', 'password6', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(7, 'responsable7', 'password7', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(8, 'responsable8', 'password8', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(9, 'responsable9', 'password9', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(10, 'responsable10', 'password10', 'responsable', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(11, 'intervenant1', 'password14', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(12, 'intervenant2', 'password15', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(13, 'intervenant3', '$2b$12$rmwNgMtWKNrdZ0DYT2Qi.O3AX4.3duu5vV5JBPgUP41fx7L.Q7l5u', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(14, 'intervenant4', '$2b$12$DKHZ51b1hmlLmlhP2iyF8uidbsJ1aO5eGTlTABhvpwaJR82F/U026\n', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(15, 'intervenant5', 'password18', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(16, 'intervenant6', 'password19', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(17, 'intervenant7', 'password20', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(18, 'intervenant8', 'password21', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(19, 'intervenant9', 'password22', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(20, 'intervenant10', 'password23', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(21, 'intervenant11', 'password24', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(22, 'intervenant12', 'password25', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(23, 'intervenant13', 'password26', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(24, 'intervenant14', 'password27', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(25, 'intervenant15', 'password28', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(26, 'intervenant16', 'password29', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(27, 'intervenant17', 'password30', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(28, 'intervenant18', 'password31', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(29, 'intervenant19', 'password32', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(30, 'intervenant20', 'password33', 'intervenant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(31, 'etudiant1', '$2b$12$7k1GwFm3wryiPAeG2gzvmekPI2Q2RTBLiehc/zP/v4NlHtsQZphmO', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(32, 'etudiant2', '$2b$12$oBsC4SvVZPpqXYKL6u/CL.z4Iy/CpTIIKCgJ6x10f9kdcqL5pKBXG', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(33, 'etudiant3', '$2b$12$X6URQyyxdoyfaeaC6pPdO.OdSFuhTRhd2fQJls8Y8VQkAJe0n985m', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(34, 'etudiant4', '$2b$12$Kez1M/2PWQgfB2N08UBwZOgzk2JUkhHC8cktkjkZWLkzQFATb45cm', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(35, 'etudiant5', '$2b$12$EmgvvzoMROEW7nqNNgMWHOzuGgi2xZA9gAsNrA3r96YKO7KVgwODa', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(36, 'etudiant6', '$2b$12$2bxZJNyA6ihZR6Y.U4wgBeDL8SWnijRNZyEwiKf/.0xBpKmRgGlhS', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(37, 'etudiant7', '$2b$12$lUgQhj6C4L.nAESEo3mveup.EmRAAYEaT9UlhcNMYmmkQz9SY0W9a', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(38, 'etudiant8', '$2b$12$VyiOeux7iYaWzD03SKeIV.B4OCe0nQJodMpK8Ho.JfTZD/F8B0mni', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(39, 'etudiant9', '$2b$12$/pXGNXrEyi6YG8MLZa7aJucBqgS0Ub9H7ipgrvizvUXwB6P.a1y5q', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(40, 'etudiant10', '$2b$12$fsOl8Zty9szO42sqyP8jhuMBJMRbS2WzUa00qeh5eGwQjC13YCN2e', 'etudiant', 'images/defaultProfile.png');
INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(41, 'etudiant11', '$2b$12$IAhPwZQRakeDDD0tC4o6necwY19vgBUcaY98rUrToZNUCLIW.XIUi', 'etudiant', 'images/defaultProfile.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartienta`
--
ALTER TABLE `appartienta`
  ADD PRIMARY KEY (`idUtilisateur`,`idGroupe`),
  ADD KEY `idGroupe` (`idGroupe`);
--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD UNIQUE KEY `idProjet` (`idProjet`);

--
-- Index pour la table `rendu`
--
ALTER TABLE `rendu`
  ADD UNIQUE KEY `idRendu` (`idRendu`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD UNIQUE KEY `idRessource` (`idRessource`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD UNIQUE KEY `idUtilisateur` (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `rendu`
--
ALTER TABLE `rendu`
  MODIFY `idRendu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartienta`
--
ALTER TABLE `appartienta`
  ADD CONSTRAINT `fk_appartientA_groupe` FOREIGN KEY (`idGroupe`) REFERENCES `groupeetudiant` (`idGroupe`) ON DELETE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
