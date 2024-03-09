-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 mars 2024 à 14:38
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
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `idc` bigint(10) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `date` varchar(20) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confpass` varchar(20) NOT NULL,
  `ann` int(5) NOT NULL,
  `diplome` varchar(30) NOT NULL,
  `depart` varchar(30) NOT NULL,
  `poste` varchar(30) NOT NULL,
  `image` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`idc`, `prenom`, `nom`, `date`, `adresse`, `email`, `telephone`, `password`, `confpass`, `ann`, `diplome`, `depart`, `poste`, `image`) VALUES
(0, 'sbe3', 'anaa', '', '', '', '', '', '', 0, '', '', 'suii', 'profil11.jpg'),
(1, 'hicham', 'kharbouch', '2003-02-02', 'hay el fadl rue 12 nr 31 ain chok casa', 'amine.kh209@gmail.com', '0614725610', 'hicham2003', 'hicham2003', 2020, 'dldldld', 'info', 'ddkdkdk', 'photo.jpg'),
(2, 'zdsq', 'sd', '2024-02-07', 'sqd', 'a@gmail.com', '68757', '0cc175b9c0f1b6a831c3', '0cc175b9c0f1b6a831c3', 0, 'a', 'aaa', 'a', 'photo.jpg'),
(3, 'zdsq', 'sd', '2222-02-02', 'sqd', 'h@gmail.com', '4545454', '51639c1ed0c9470c1c65', '51639c1ed0c9470c1c65', 2020, 'jhjh', 'gjggj', 'uhggjg', 'photo.jpg'),
(4, 'fjkfdjkfd', 'vksdjksdds', '2525-02-02', 'hjdfjdf', 'l@gmail.com', 'jgjgjfg', 'azer1234', 'azer1234', 2024, 'dsgkjosjgs', 'lxlxlls', 'clclclc', 'photo.jpg'),
(5, 'Adam', 'Larabi', '2002-10-25', 'Casablanca SidiMaarouf', 'adamlarabi10@gmail.com', '07-71-37-39-91', 'adam', 'adam', 2022, 'Fst', 'info', 'stagiaire', 'photo.jpg'),
(99, 'Adam', 'ßi', '', '', '', '', '', '', 0, '', '', 'devlopper', 'profil16.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_log` bigint(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_log`, `email`, `password`) VALUES
(1, 'amine.kh209@gmail.com', 'hicham2003'),
(2, 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'h@gmail.com', '51639c1ed0c9470c1c65361ad260e2f4'),
(4, 'l@gmail.com', 'azer1234'),
(5, 'adamlarabi10@gmail.com', 'adam'),
(100000, 'lokmanlaa45@gmail.com', '0691664528'),
(100001, 'r3d@gmail.com', 'r3d');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id_poste` int(10) NOT NULL,
  `nom_prenom` varchar(190) NOT NULL,
  `post` longtext NOT NULL,
  `image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `nom_prenom`, `post`, `image`) VALUES
(1, 'lokmanlaaroussi', 'rkrkrkkffkffk', '184955.jpg'),
(2, 'lokmanlaaroussi', 'rkrkrkkffkffk', '184955.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recruteur`
--

CREATE TABLE `recruteur` (
  `IDR` bigint(20) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `date` varchar(20) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confpass` varchar(32) NOT NULL,
  `societe` varchar(32) NOT NULL,
  `depart` varchar(32) NOT NULL,
  `specialite` varchar(32) NOT NULL,
  `poste` varchar(32) NOT NULL,
  `image` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recruteur`
--

INSERT INTO `recruteur` (`IDR`, `prenom`, `nom`, `date`, `adresse`, `email`, `telephone`, `password`, `confpass`, `societe`, `depart`, `specialite`, `poste`, `image`) VALUES
(100000, 'lokman', 'laaroussi', '2004-06-27', 'hay el fadl rue 12 nr 31 ain chok casa', 'lokmanlaa45@gmail.com', '06916645582', '0691664528', '0691664528', 'shell', 'jdjdfkfkfkfkf', 'java', 'kdkdkd', ''),
(100001, 'r3d', '', '2024-03-27', 'Casablanca SidiMaarouf', 'r3d@gmail.com', '07-71-37-39-91', 'r3d', 'r3d', 'r3d', 'r3d', 'r3d', 'PROFESSEUR', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`idc`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_log`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id_poste`);

--
-- Index pour la table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`IDR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
