-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 mai 2023 à 12:26
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(26, 'Tristanelbandito', 'Tristan', 'Bandit', '$2y$10$Xz7SUQEq/uwyxIyya.hbl.ULRYV0Xg0mLRi0xruecJDutChD1phVu'),
(27, 'Tristano', 'Tristan', 'Badet', '$2y$10$FFh.lI2p3I2S8x5XkNBiw.GzSATd3YEzDO59pa1zGxkro0zB6i2ce'),
(28, 'Romano', 'Romain', 'Romain', '$2y$10$dJajEYCihLFAG8Su.Jd6iebeUu8SoaJDyLGl92X8a6h3L/P8sslaK'),
(29, 'Geronimo', 'Gero', 'Nimo', '$2y$10$MN67lAM6pVpmwnj.5WAQPe3TmfyNNU50pSTS.gBW1ViV0HyuM2G/y'),
(31, 'Guillaumedu21', 'Guillaume-Luc', 'Guillaume', '$2y$10$yKvZBpqD8jwwUWEFwf8oGOhS6or4U9c5zdLDpGwZrk4jEtgE4hrGK'),
(32, 'WoodyWoodPecker', 'Woody', 'Wood', '$2y$10$6RWwJUCxLTY1arwgCQkVNe.kRLsMfEpe8BPrMlWk7vEvVi4AlUHcy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
