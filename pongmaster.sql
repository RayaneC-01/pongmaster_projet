-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 mars 2024 à 22:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pongmaster`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartes_rfid`
--

DROP TABLE IF EXISTS `cartes_rfid`;
CREATE TABLE IF NOT EXISTS `cartes_rfid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_badge` varchar(50) DEFAULT NULL,
  `id_joueur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_badge` (`numero_badge`),
  KEY `id_joueur` (`id_joueur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cartes_rfid`
--

INSERT INTO `cartes_rfid` (`id`, `numero_badge`, `id_joueur`) VALUES
(1, 'RFID5678', 1),
(2, 'RFID91011', 1),
(3, 'RFID121314', 1);

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

DROP TABLE IF EXISTS `exercices`;
CREATE TABLE IF NOT EXISTS `exercices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `exercice` varchar(50) NOT NULL,
  `numero` int NOT NULL,
  `vitesse_propulsion` varchar(20) NOT NULL,
  `cadence_ejection` varchar(20) NOT NULL,
  `vitesse_oscillation` varchar(20) NOT NULL,
  `nombre_balles` varchar(20) NOT NULL,
  `nombre_cibles` varchar(20) NOT NULL,
  `animation_cibles` varchar(50) NOT NULL,
  `zones_impact` varchar(20) NOT NULL,
  `date_enregistrement` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `exercices`
--

INSERT INTO `exercices` (`id`, `exercice`, `numero`, `vitesse_propulsion`, `cadence_ejection`, `vitesse_oscillation`, `nombre_balles`, `nombre_cibles`, `animation_cibles`, `zones_impact`, `date_enregistrement`) VALUES
(12, 'Topspin', 1, 'nulle', 'nulle', 'nulle', 'demi-panier', 'une', 'pas-d-animation', 'Z1', '2024-03-11 15:29:44');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_badge` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `categorie_age` varchar(20) DEFAULT NULL,
  `type_pratique` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_badge` (`numero_badge`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `numero_badge`, `nom`, `prenom`, `categorie_age`, `type_pratique`) VALUES
(1, 'RFID5678', 'Dupont', 'Alice', 'Jeune', 'Compétition'),
(2, 'RFID91011', 'Martin', 'Paul', 'Adulte', 'Loisir'),
(3, 'RFID121314', 'Dubois', 'Sophie', 'Senior', 'Loisir');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `mot_de_passe`, `email`) VALUES
(1, 'Inees', '$2y$10$7vkPQzHKFyS/QeNeO2eSqe60NeeqkttVbgx1cNjWbQ1Mq2uel2AfG', 'ines.kaa@gmail.com'),
(2, 'jojos', '$2y$10$.LyuMTc4RZkYeaai8I8YtOGAxJv1g7aXV3AWobL8sDzHegdYRML0a', 'jojo.stardust@gmail.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
