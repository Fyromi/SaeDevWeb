-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 jan. 2025 à 21:53
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
-- Structure de la table `appartienta`
--

CREATE TABLE `appartienta` (
  `idUtilisateur` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `associeaprojet`
--

CREATE TABLE `associeaprojet` (
  `idGroupe` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(50) NOT NULL,
  `imageTitre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `intervientdans`
--

CREATE TABLE `intervientdans` (
  `idUtilisateur` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `projetressource`
--

CREATE TABLE `projetressource` (
  `idProjet` int(11) NOT NULL,
  `idRessource` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `renduprojet`
--

CREATE TABLE `renduprojet` (
  `idProjet` int(11) NOT NULL,
  `idRendu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `idRessource` bigint(20) UNSIGNED NOT NULL,
  `nomRessource` varchar(50) DEFAULT NULL,
  `lienRessource` varchar(255) DEFAULT NULL,
  `type` enum('consignes','documents','depots') NOT NULL DEFAULT 'documents'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `profilpicture` varchar(255) DEFAULT 'images/defaultProfile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `login`, `mdp`, `role`, `profilpicture`) VALUES
(0, 'admin', '$2b$12$zvSSeCgGthSDphws2XqmX.ENrKvN.Cy4Fp94GVl8/PScm1aOu2ZjO', 'admin', 'images/defaultProfile.png');

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
-- Index pour la table `groupeetudiant`
--
ALTER TABLE `groupeetudiant`
  ADD PRIMARY KEY (`idGroupe`);

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
-- AUTO_INCREMENT pour la table `groupeetudiant`
--
ALTER TABLE `groupeetudiant`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `rendu`
--
ALTER TABLE `rendu`
  MODIFY `idRendu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartienta`
--
ALTER TABLE `appartienta`
  ADD CONSTRAINT `fk_appartientA_groupe` FOREIGN KEY (`idGroupe`) REFERENCES `groupeetudiant` (`idGroupe`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
