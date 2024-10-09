-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 09 oct. 2024 à 19:42
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `motion`
--

-- --------------------------------------------------------

--
-- Structure de la table `artefact`
--

DROP TABLE IF EXISTS `artefact`;
CREATE TABLE IF NOT EXISTS `artefact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTypeArtefact` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Artefact_TypeArtefact_FK` (`idTypeArtefact`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artefact`
--

INSERT INTO `artefact` (`id`, `description`, `matricule`, `idTypeArtefact`) VALUES
(1, 'Artefact 1', 'A123', 1),
(2, 'Artefact 2', 'A124', 2);

-- --------------------------------------------------------

--
-- Structure de la table `artefactsplans`
--

DROP TABLE IF EXISTS `artefactsplans`;
CREATE TABLE IF NOT EXISTS `artefactsplans` (
  `idArtefact` int NOT NULL,
  `idPlan` int NOT NULL,
  PRIMARY KEY (`idArtefact`,`idPlan`),
  KEY `ArtefactsPlans_Plan_FK` (`idPlan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `effet`
--

DROP TABLE IF EXISTS `effet`;
CREATE TABLE IF NOT EXISTS `effet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `effet`
--

INSERT INTO `effet` (`id`, `intitule`) VALUES
(1, 'Effet Spécial 1'),
(2, 'Effet Spécial 2');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDebut` date NOT NULL,
  `matricule` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `dateDebut`, `matricule`) VALUES
(5, 'Grantorinooo', '2023-12-17', '7854'),
(6, 'BladeRunner', '2023-12-12', '874');

-- --------------------------------------------------------

--
-- Structure de la table `filmsutilisateurs`
--

DROP TABLE IF EXISTS `filmsutilisateurs`;
CREATE TABLE IF NOT EXISTS `filmsutilisateurs` (
  `idUtilisateur` int NOT NULL,
  `idFilm` int NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idFilm`),
  KEY `FilmsUtilisateurs_Film_FK` (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idFilm` int NOT NULL,
  `matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numOrdre` int NOT NULL,
  `duree` float DEFAULT NULL,
  `echelle` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dialogues` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idEffet` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Plan_Effet_FK` (`idEffet`),
  KEY `Plan_Film_FK` (`idFilm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeartefact`
--

DROP TABLE IF EXISTS `typeartefact`;
CREATE TABLE IF NOT EXISTS `typeartefact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `typeArtefact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeartefact`
--

INSERT INTO `typeartefact` (`id`, `typeArtefact`) VALUES
(1, 'Type 1'),
(2, 'Type 2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `initiales` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mdp`, `initiales`, `email`) VALUES
(64, 'Root', 'Root', '$2y$10$ApJfGvmzIloWvFrWtYg3tuWm.hXBZlEodwX4FRJeyNR.Md1F4MYH.', 'RT', 'Root@gmail.com'),
(65, 'Root', 'Root', '$2y$10$p5EObhdBnDrQ.U1ixlYDruw8J6WolK/Zffbz0WkgFpMY6o5BTUW2i', 'RT', 'Root@gmail.com'),
(66, 'Mario', 'Mario', '$2y$10$pc3MEWEvyhGm9cNkGBX7au7m6w08rKFpzLUyw/vD/DPyXG2gEWTqC', 'MR', 'Mario@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artefact`
--
ALTER TABLE `artefact`
  ADD CONSTRAINT `Artefact_TypeArtefact_FK` FOREIGN KEY (`idTypeArtefact`) REFERENCES `typeartefact` (`id`);

--
-- Contraintes pour la table `artefactsplans`
--
ALTER TABLE `artefactsplans`
  ADD CONSTRAINT `ArtefactsPlans_Artefact_FK` FOREIGN KEY (`idArtefact`) REFERENCES `artefact` (`id`),
  ADD CONSTRAINT `ArtefactsPlans_Plan_FK` FOREIGN KEY (`idPlan`) REFERENCES `plan` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `filmsutilisateurs`
--
ALTER TABLE `filmsutilisateurs`
  ADD CONSTRAINT `FilmsUtilisateurs_Film_FK` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `FilmsUtilisateurs_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `Plan_Effet_FK` FOREIGN KEY (`idEffet`) REFERENCES `effet` (`id`),
  ADD CONSTRAINT `Plan_Film_FK` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
