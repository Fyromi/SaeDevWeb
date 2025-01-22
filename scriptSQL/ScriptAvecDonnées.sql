    -- phpMyAdmin SQL Dump
    -- version 5.2.1
    -- https://www.phpmyadmin.net/
    --
    -- Hôte : 127.0.0.1
    -- Généré le : mer. 22 jan. 2025 à 23:03
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
    (42, 2),
    (42, 9),
    (45, 2),
    (46, 2),
    (46, 9),
    (47, 2),
    (48, 3),
    (49, 3),
    (49, 9),
    (50, 3),
    (51, 3),
    (52, 4),
    (53, 4),
    (54, 4),
    (55, 4),
    (56, 5),
    (57, 5),
    (58, 5),
    (59, 5),
    (60, 6),
    (61, 6),
    (62, 6),
    (63, 6),
    (64, 7),
    (65, 7),
    (66, 7),
    (67, 8),
    (68, 8),
    (69, 8);

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
    (2, 33),
    (3, 33),
    (4, 33),
    (5, 33),
    (6, 33),
    (7, 33),
    (8, 33),
    (9, 34);

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
    (43, 33),
    (73, 34);

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

    --
    -- Déchargement des données de la table `groupeetudiant`
    --

    INSERT INTO `groupeetudiant` (`idGroupe`, `nomGroupe`, `imageTitre`) VALUES
    (2, 'groupe 1', NULL),
    (3, 'groupe2', NULL),
    (4, 'groupe 3', NULL),
    (5, 'groupe 4', NULL),
    (6, 'groupe 5', NULL),
    (7, 'groupe 6', NULL),
    (8, 'groupe 7', NULL),
    (9, 'Groupe Alpha', NULL);

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
    (44, 33),
    (70, 33),
    (71, 33),
    (72, 33),
    (73, 33),
    (74, 33),
    (75, 33),
    (76, 33),
    (77, 33),
    (78, 33),
    (79, 33),
    (80, 33),
    (81, 33),
    (82, 33),
    (43, 34),
    (44, 34);

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
    (33, 'SaeWeb', 'Creation d\'un site web de gestion de sae', 2025, '4'),
    (34, 'Le Projet d\'une vie', 'Ce projet vise a questionner les étudiants sur leur avenir ', 2024, '4');

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
    (33, 34),
    (33, 36),
    (33, 37),
    (33, 39),
    (33, 40),
    (33, 41),
    (33, 42);

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
    (6, 'Depot du code', '2025-01-23', NULL),
    (7, 'Premier Dépôt', '2025-01-24', NULL),
    (8, 'Deuxième Dépôt', '2025-01-27', NULL);

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
    (33, 6),
    (33, 7),
    (33, 8);

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

    --
    -- Déchargement des données de la table `ressource`
    --

    INSERT INTO `ressource` (`idRessource`, `nomRessource`, `lienRessource`, `type`) VALUES
    (34, 'Consigne du projet', 'Projet/Projet33/ressource/Projet+SAE+Manager.pdf', 'documents'),
    (35, 'Fichier Hello Java', 'Projet/Projet33/ressource/Hello.java', 'documents'),
    (36, 'Icon +', 'Projet/Projet33/ressource/plus.png', 'documents'),
    (37, 'Icon Attention', 'Projet/Projet33/ressource/attention.png', 'documents'),
    (38, 'Fichier Apache', 'Projet/Projet33/ressource/applications.html', 'documents'),
    (39, 'Depot du code', 'Projet/Projet33/depot/depot6/groupe2/etudiant42/bitnami.css', 'depots'),
    (40, 'Depot du code', 'Projet/Projet33/depot/depot6/groupe2/etudiant45/Depot.png', 'depots'),
    (41, 'Depot du code', 'Projet/Projet33/depot/depot6/groupe2/etudiant45/Consigne.png', 'depots'),
    (42, 'Deuxième Dépôt', 'Projet/Projet33/depot/depot8/groupe2/etudiant45/plus.png', 'depots');

    -- --------------------------------------------------------

    --
    -- Structure de la table `ressourcemiseenavant`
    --

    CREATE TABLE `ressourcemiseenavant` (
    `idProjet` int(11) NOT NULL,
    `idRessource` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    --
    -- Déchargement des données de la table `ressourcemiseenavant`
    --

    INSERT INTO `ressourcemiseenavant` (`idProjet`, `idRessource`) VALUES
    (33, 35),
    (33, 38);

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
    (42, 'younes', '$2y$10$UDDoud3vcM4uHgLw2xYYP.6wiOkDF.SgCDGvFmi8C5eL1Sp/usVT2', 'etudiant', 'images/defaultProfile.png'),
    (43, 'bossard', '$2y$10$8RJ06jkKqcOMDJ0tWy6Bf.iO3SMiK10.TYQIQd4Kz1um9WXoR05eG', 'responsable', 'images/defaultProfile.png'),
    (44, 'ariles', '$2y$10$vTtnY4YFPpNfsV2UWTjlQeYvXRTMzdMPV7/UMBZwmASzkus3SG0c2', 'intervenant', 'images/defaultProfile.png'),
    (45, 'louis', '$2y$10$8otNlK0jQHt1R9h5rZ5LgeGuAy4a3i/88vCu7BREhwgA4c1RyzBfi', 'etudiant', 'images/defaultProfile.png'),
    (46, 'marie', '$2y$10$vYHcm9VzBMcuPOTr82fJyOUUCZrMOIOIcIyBWiPK40XbceN5LlYPG', 'etudiant', 'images/defaultProfile.png'),
    (47, 'pierre', '$2y$10$w5Hetsc1d3XoFtyIxGzVrO8CgjmbToHs.ymaSMl/XyqEmQVBTeB82', 'etudiant', 'images/defaultProfile.png'),
    (48, 'claire', '$2y$10$AcxaAQPVmYNQXiA3Wfljn.WyexPqDQVp3q2Tej83of1.4v0mvmtgq', 'etudiant', 'images/defaultProfile.png'),
    (49, 'julien', '$2y$10$5IXhg8QNkT/J2nse4nXJSumXRrKu01izvKH2gAvdRO1iu3bx9f49.', 'etudiant', 'images/defaultProfile.png'),
    (50, 'sophie', '$2y$10$E5eMUifghx3b1Xijk3rLSOU1EntRO5iVvXjonPYxy0xQS87yrqlgq', 'etudiant', 'images/defaultProfile.png'),
    (51, 'thomas', '$2y$10$jmdEckQbYopKYoezd.DfneevSiIjs2xr32AqTqHA.cNjbEz24LzUy', 'etudiant', 'images/defaultProfile.png'),
    (52, 'emma', '$2y$10$ZDrBZS6IxwRxanJ6cRlEzeY5ER5xAbEUFZClJJzaBJmLS2kA3CsI2', 'etudiant', 'images/defaultProfile.png'),
    (53, 'nicolas', '$2y$10$sMIihALcktbKmOXJs8hyNOSfYh6wAaeBfs0pzXZYeYzgBzPYjE9XC', 'etudiant', 'images/defaultProfile.png'),
    (54, 'alice', '$2y$10$cSXbWornoY3uH9yOUWmCsO1ez2i9rds1sPuGMkLi9G77WAxDtGolG', 'etudiant', 'images/defaultProfile.png'),
    (55, 'antoine', '$2y$10$aIXuFJQY48tsJB2qfLSY5.MJHlJc8SVHu27HjLUwaANWmMQDidwBu', 'etudiant', 'images/defaultProfile.png'),
    (56, 'tri', '$2y$10$TcfmWS8NAqd5F9xRPhteyOMobyEYbIaxdV0GsJ9BfIEJlB7z2Pdye', 'etudiant', 'images/defaultProfile.png'),
    (57, 'lucas', '$2y$10$8hHjnuoGhXlkVLxDZvMpo.jKrn/UMx3a04l15BVDyzket7QCNjGRi', 'etudiant', 'images/defaultProfile.png'),
    (58, 'laura', '$2y$10$RVnZvczoz4IMldvmFEIdzOMxKp1l/PHpeu9KXggAIei4Vmt7nrYqi', 'etudiant', 'images/defaultProfile.png'),
    (59, 'ben', '$2y$10$8KoJ85ZaCL36F6x.494.Zep/XFLAAKZjxzd.j4SaJ0Kblbtu4N5l.', 'etudiant', 'images/defaultProfile.png'),
    (60, 'jacub', '$2y$10$N1gfZ.B/G5fbrHvrQZ3m1eXEDHsoYIKVqYUzshrHDKftvoB19ECYq', 'etudiant', 'images/defaultProfile.png'),
    (61, 'max', '$2y$10$cgvzdd.OMGBtCkNDrc/O0esXItVc4DKyNfBN5rw8OtAKAZPdREKIi', 'etudiant', 'images/defaultProfile.png'),
    (62, 'julie', '$2y$10$GCbV9TIiC2ms1y09G.afWO/Ef9MzvpA/wpqs/4oDU7WTJAoZ/r/Oy', 'etudiant', 'images/defaultProfile.png'),
    (63, 'hugo', '$2y$10$Is1zXr5MJeDSNA2fkKOxXO7tth/LlzgRD1wxRAZPW.lMXQ39H7.bG', 'etudiant', 'images/defaultProfile.png'),
    (64, 'lea', '$2y$10$9xi95yYh6IR4mcoNlVmZ.u.WLm.IRJspFzl4QYU2mRbS3buw/xO1m', 'etudiant', 'images/defaultProfile.png'),
    (65, 'paul', '$2y$10$OR4KnB6X.IurUvLHZ/3qQuJujGqOHzye9vNRT0vbQq/TBmfHs47pC', 'etudiant', 'images/defaultProfile.png'),
    (66, 'chloe', '$2y$10$JSO.10KUEB2afdIESN5gSuhT2beuXHAUVZkkuzA5wZBKiDZN5V.sS', 'etudiant', 'images/defaultProfile.png'),
    (67, 'mehdy', '$2y$10$zFpVG8nuTnL1vLf4pWBRdOpl9IEepEyJ0ezMoBnrSDZOBiMBMbvBq', 'etudiant', 'images/defaultProfile.png'),
    (68, 'yovanne', '$2y$10$0OCncIlma8qQtjkq3uA8Z.oCaJvkDnk9kjNs73TteU38TXMMUNzqS', 'etudiant', 'images/defaultProfile.png'),
    (69, 'mohamed', '$2y$10$AvmCDGx.MoGg1mIyjyKlS..eihQ7OtxM4fXZe6cv1KTlnurj7Qh8a', 'etudiant', 'images/defaultProfile.png'),
    (70, 'martin', '$2y$10$5A9dr8bSyD1QpnbcAfeAlO8UUYRX5aNA3F0j1BF2QAptwAWT3xR86', 'responsable', 'images/defaultProfile.png'),
    (71, 'elise', '$2y$10$rqGiaiK./EgTy0tHeePZeO0HhTkW73tLVkw6EE4xPhTQpo0Uiekm2', 'responsable', 'images/defaultProfile.png'),
    (72, 'arthur', '$2y$10$Y1GNDRkEfbkKfgkqPrgFR.Gdmt1KuyU5OC8duHaJ6UB98h/hMzInW', 'responsable', 'images/defaultProfile.png'),
    (73, 'lucie', '$2y$10$wGzMprO9I.BCn7emOwzMQefk/bwgMmzrs4EzXiWeuFQe2wUHycyG.', 'responsable', 'images/defaultProfile.png'),
    (74, 'gabriel', '$2y$10$IgDMG7D.BrWxTRs6F.7pNuaW07n7cxlrLeQ4GrwdArGekUBjMG.Ba', 'responsable', 'images/defaultProfile.png'),
    (75, 'margaux', '$2y$10$997hkJ38qYu8Yv5IwT2IEO.JDUkOqeDbeoqyThFWbxOUrREX/GGgm', 'responsable', 'images/defaultProfile.png'),
    (76, 'bastien', '$2y$10$dvYK9aiwQ/swGGFi9S3MuuWogYAzuirmUj2qnLrE2YrnXJoTJuydq', 'responsable', 'images/defaultProfile.png'),
    (77, 'charlotte', '$2y$10$aBu81p6.j/YnlvTv0cdCDexyPAirEvdMcNIN3HEmdT6.UFT.IYre6', 'responsable', 'images/defaultProfile.png'),
    (78, 'frank', '$2y$10$QQUiNtk6Y2JmSIgmfMQxK.x83hoB9vUeFC3hUXGbf7EWSs/sgCJDC', 'responsable', 'images/defaultProfile.png'),
    (79, 'bonnot', '$2y$10$54hpFEHhT0PgG/Q64cvyD.DKyDp8WbXamO5IxNO5wQtHNpPa0HWvi', 'responsable', 'images/defaultProfile.png'),
    (80, 'simonot', '$2y$10$HteM9Fi0an639q1wiZdFGeBwBipiimXnRn/cwDGDxYTuJy2zPFZG2', 'responsable', 'images/defaultProfile.png'),
    (81, 'assia', '$2y$10$auCfXUaQUgPY907uJWNTme/9fR/2wnz1tAUMath3docP2zp/OCAPa', 'intervenant', 'images/defaultProfile.png'),
    (82, 'jeremy', '$2y$10$sA6ltK5BBhnOGqCpOLGcle30AuVPh2OWOOBIXc57xPMcCQoUKTIea', 'intervenant', 'images/defaultProfile.png'),
    (83, 'yasmine', '$2y$10$BWuB5MgMEnDw2oRYvdOxGetUNUbmKzk0x6xxn2Z..vTCsjCPthI4e', 'intervenant', 'images/defaultProfile.png'),
    (84, 'loris', '$2y$10$a9VfoXj0d/h7UiE79XefSu50AaxYNHbFlE4LXAG4eVkq0vL9RPqL2', 'intervenant', 'images/defaultProfile.png'),
    (85, 'jean', '$2y$10$9YZ58RjNqGrE.IawaJnpd.w.8eBpcqy5DAtODbgN2aYKCZA8LCAeq', 'intervenant', 'images/defaultProfile.png'),
    (86, 'laurent', '$2y$10$vA/m2qi8j7bO5dpfI1F02OnFu4KRot13Ur14Ap/IoGT23QL5YOwcS', 'intervenant', 'images/defaultProfile.png'),
    (87, 'alexandre', '$2y$10$Kz4qEUM8nE5gFjJZ.QIHGeN23eXbubG4CTyVES1LY84jzDNFc5muu', 'intervenant', 'images/defaultProfile.png'),
    (88, 'logan', '$2y$10$uo.ofmuXGSqanVJEXHlFGu.wJsSWTyuIZQM7NtETdEVmhoxvgrxlC', 'intervenant', 'images/defaultProfile.png'),
    (89, 'amine', '$2y$10$sWPHWwSGSxtZZ7oPD4tUjOQRfQ.X28ZPYyr8MLo6mICeWtj8eOw3G', 'intervenant', 'images/defaultProfile.png'),
    (90, 'bilel', '$2y$10$l0GBPQD.7DY7gWvt7QMlvO0nvNeISMbGzC0qQTc6JAmQ2pLagH/su', 'intervenant', 'images/defaultProfile.png'),
    (91, 'ines', '$2y$10$exVE2n6HPLdlbxDzGUAIM.eQbH50JR9D3QhcN28rJZ785UKxPZQLW', 'intervenant', 'images/defaultProfile.png'),
    (92, 'gaston', '$2y$10$Ol3l3hN6p19gufi/KNosh.euSTaUoQce9yGjxZGnHz68LL0bH4Ita', 'intervenant', 'images/defaultProfile.png'),
    (94, 'admin', '$2b$12$zvSSeCgGthSDphws2XqmX.ENrKvN.Cy4Fp94GVl8/PScm1aOu2ZjO', 'admin', 'images/defaultProfile.png');

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
    MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

    --
    -- AUTO_INCREMENT pour la table `projet`
    --
    ALTER TABLE `projet`
    MODIFY `idProjet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

    --
    -- AUTO_INCREMENT pour la table `rendu`
    --
    ALTER TABLE `rendu`
    MODIFY `idRendu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

    --
    -- AUTO_INCREMENT pour la table `ressource`
    --
    ALTER TABLE `ressource`
    MODIFY `idRessource` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

    --
    -- AUTO_INCREMENT pour la table `utilisateur`
    --
    ALTER TABLE `utilisateur`
    MODIFY `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
