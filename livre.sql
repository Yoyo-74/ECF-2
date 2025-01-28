-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 jan. 2025 à 08:32
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `type_event` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `type_event`) VALUES
(1, 'Séminaire'),
(2, 'Inauguration'),
(3, 'Formation'),
(4, 'Salon'),
(5, 'Voyage'),
(6, 'Retraite'),
(7, 'Mutation'),
(8, 'Anniversaire');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_event` int NOT NULL,
  `title_post` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `com_post` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo_post` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  KEY `USER` (`id_user`),
  KEY `EVENT` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `id_event`, `title_post`, `com_post`, `photo_post`, `date_post`) VALUES
(10, 3, 8, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '2025-01-24 12:53:27'),
(15, 3, 6, 'rrrrrrrrrrrrrrrrrrrzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '', '2025-01-24 13:17:33'),
(16, 3, 3, 'fffffffffffffffffff', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssstrrrrr', '', '2025-01-24 14:41:38'),
(17, 3, 1, 'zzzzzzzzzzzzzzzzzzaa', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'Grid-tunisie-01.jpg', '2025-01-24 14:51:04'),
(19, 4, 2, 'Nouvelle usine 2014', 'Voici la nouvelle usine des Ch\'tits dans l\'Nord en 2014 !', '', '2025-01-24 15:33:23'),
(20, 4, 6, 'Vive la retraite !!!!', 'Profites-en bien Toto', 'Grid-mars-01.jpg', '2025-01-24 15:45:09');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pw_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_user` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `pseudo_user`, `pw_user`, `date_user`) VALUES
(1, 'Lionel', 'yo@gmail.com', 'Yoda', '$2y$10$SixjpMJ.hTulggZIxswike8y0s4yYl7h7lnOx7SFHlaCiGiBlTU9K', '2025-01-22'),
(2, 'Toto', 'Toto@gmail.com', 'Toto', '$2y$10$9ZmRDLfoF.fR9kRZTl7g/eWkjjMqjmc4NtAgajTGs36vAvgST8XOG', '2025-01-22'),
(3, 'Titi', 'titi@gmail.com', 'Titi', '$2y$10$J2wtUFH0whnHjJqdbN.7FOeyVLfD.15TxS4KgRJtKNEows/uTMXOq', '2025-01-22'),
(4, 'Lionel', 'yoda@gmail.com', 'Yoda', '$2y$10$JWLzYEe.G.jOed1H28wQT.n/.tn9juMdl/ajx6VLyaXVvIzREoRY2', '2025-01-24');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
