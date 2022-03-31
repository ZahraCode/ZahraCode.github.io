-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 31 mars 2022 à 20:33
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `action`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, ' fatou', 'fatou', 'fatou@gmail.com', '$2y$10$AeZNhy8kPZfOPl9AkKZofOFNuJmdl67Up5JWny.XiSel.Dz2so7M6'),
(8, 'lion', 'llf', 'jean@gmail.com', '$2y$10$/M6M.dRsxtD6ttIlddgxkenjKsXI./QCcv4eWTgOgwIVQpozYxxue'),
(9, ' nafi', 'nafi', 'samba@gmail.com', '$2y$10$T7OueZC1VjjM0vtybAmRCuReE9Xg2kJzzUlRwz39q07aECHnzo5Yu'),
(10, 'lion', 'kkk', 'rane@gmail.com', '$2y$10$7rSItKuHvuDpTpcVdoC3f.4LNi0qEkL1voMD7sPecpNRLq8ueSJ3i'),
(11, 'fatou', ' ld', 'talla@gmail.com', '$2y$10$m4gStz2zc22qOU8zHBdIoeBfNvRwVWICHu9..7RFS0pRIpUtMb3py'),
(12, 'zal', 'lamine', 'ama@gmail.com', '$2y$10$8X5EPpGVPb7qN492IhUOhOVgZAWodx.0D7a0WvSkUL0fu3agn/2Oy'),
(13, 'amat', 'matar', 'amat@gmail.com', '$2y$10$Zec94glbaNXI9Yi6RP294eZjQcxd1tnyHlSjZcve6yX.b9DSTA4yO'),
(14, 'jean', 'mdmmd', 'lean@gmail.com', '$2y$10$rLdCjcZizi.CFXAO82Jw6uC7D6mgC3tfROo8O/KZTMFU2hEvrkt2y'),
(15, 'jean', 'mdmmd', 'leanff@gmail.com', '$2y$10$XV84l7b.HUuiFSwr06TJmOXmsyKctODae6b0.FWCjehSvvi3dXEay');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `adresse`, `numero`, `mdp`) VALUES
(4, '253', 'werr', 'fff', 'ggg', 554, 'dffgfg'),
(5, '14', 'fatou', 'ee', 'ddd12', 12, '33'),
(16, '13', 'ka', 'salif', 'pa', 12, 'ois'),
(17, '1', 'zal', 'ka', 'pa', 1, 'ass'),
(18, '2', 'maman', 'ka', 'sss12', 34, 'ddd'),
(19, '3', 'ami', 'ba', 'dd', 34, '123'),
(20, '77777', 'sarr', 'max', 'camberre', 123, 'ffgg'),
(21, '88', 'dd', 'ja', '44fgdd', 33, 'fgggh'),
(22, '63', 'fgg', 'ff', '333fg', 12, 'ffg'),
(23, '34', 'rrr', 'ff', 'ffg', 12, 'fggbhh'),
(24, '100', 'sy', 'khady', 'ffg', 12, 'fff'),
(25, '333', ' fatou', 'dfjjf', 'ffff12', 33, 'ffgg'),
(26, '73', 'jk', 'mari', 'nmmm', 77, 'mmmn'),
(27, 'salam12', 'fatou', 'hhj', 'nnn', 55, 'hhh');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `matricules` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `formation`, `matiere`, `matricules`, `nom`, `prenom`) VALUES
(30, 'Approfondissement en informatique', 'Programmation objets', '1', 'zal', 'ka'),
(31, 'Mathematique applique', 'statistique', '1', 'zal', 'ka'),
(32, 'Approfondissement en informatique', 'Programmation objets', '2', 'maman', 'ka'),
(33, 'manageriale', 'Anglais', '1', 'zal', 'ka'),
(34, 'Mathematique applique', 'Gestion de projet', '25', 'werr', 'fff'),
(35, 'Mathematique applique', 'Gestion de projet', '1', 'zal', 'ka'),
(36, 'Approfondissement en informatique', 'Programmation objets', '253', 'werr', 'fff 123'),
(37, 'manageriale', 'Anglais', '253', 'werr', 'fff 123'),
(38, 'Approfondissement en informatique', 'Programmation web', '253', 'werr', 'fff 123'),
(39, 'Mathematique applique', 'statistique', '253', 'werr', 'fff 123'),
(40, 'Approfondissement en informatique', 'Programmation objets', '13', 'ka', 'salif'),
(41, 'manageriale', 'Gestion de l\'entreprise', '13', 'ka', 'salif'),
(42, 'manageriale', 'Anglais', '13', 'ka', 'salif'),
(43, 'Approfondissement en informatique', 'Programmation objets', '73', 'jk', 'mari'),
(44, 'Mathematique applique', 'statistique', '73', 'jk', 'mari'),
(45, 'manageriale', 'Anglais', '73', 'jk', 'mari'),
(46, 'Mathematique applique', 'Gestion de projet', '73', 'jk', 'mari'),
(47, 'manageriale', 'Gestion de l\'entreprise', '73', 'jk', 'mari');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `controle` int(11) NOT NULL,
  `examen` int(11) NOT NULL,
  `tp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `matricule`, `matiere`, `controle`, `examen`, `tp`) VALUES
(19, '1', 'Choisi la matiere', 163, 163, 123),
(20, '1', 'statistique', 12, 34, 550),
(21, '1', 'Anglais', 16, 26, 14),
(22, '1', 'Gestion de projet', 12, 34, 14),
(23, '1', 'Programmation objets', 11, 34, 23),
(24, '100', 'Programmation objets', 16, 18, 14),
(25, '100', 'Anglais', 12, 34, 14),
(26, '100', 'statistique', 11, 18, 14),
(27, '100', 'Gestion de projet', 16, 18, 55),
(28, '333', 'Programmation objets', 19, 34, 12),
(29, '333', 'Anglais', 12, 34, 17),
(30, '333', 'statistique', 11, 12, 17),
(31, '333', 'Gestion de l\'entreprise', 16, 34, 14),
(32, '14', 'Programmation objets', 19, 12, 12),
(33, '14', 'Gestion de l\'entreprise', 12, 34, 12),
(34, '73', 'Programmation objets', 110, 18, 14),
(35, '73', 'Anglais', 19, 18, 12),
(36, '73', 'Programmation web', 12, 12, 123),
(37, '73', 'statistique', 11, 13, 14),
(38, '73', 'Gestion de projet', 16, 26, 123);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
