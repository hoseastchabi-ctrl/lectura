-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 juin 2025 à 15:31
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
-- Base de données : `lectura`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Le Canard Farceur\r\n'),
(1, 'Mystère');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `message`, `date_envoi`) VALUES
(1, 'ASSOGBA', 'Sidney', 'sidneyassobga42@gmail.com', 'bb', '2025-06-18 21:04:13'),
(2, 'ASSOGBA', 'Sidney', 'sidneyassobga42@gmail.com', 'bb', '2025-06-18 21:05:32'),
(3, 'ASSOGBA', 'Sidney', 'sidneyassobga42@gmail.com', 'bb', '2025-06-18 22:26:15');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `histoires`
--

CREATE TABLE `histoires` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `contenu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `histoires`
--

INSERT INTO `histoires` (`id`, `titre`, `auteur_id`, `categorie_id`, `contenu`) VALUES
(3, 'Le Canard Farceur\r\n', NULL, NULL, NULL),
(4, 'La Vache qui Rit', NULL, NULL, NULL),
(5, 'Le Canard Farceur', NULL, NULL, 'Voici le texte complet du livre Le Canard Farceur...');

-- --------------------------------------------------------

--
-- Structure de la table `lectures_gratuites`
--

CREATE TABLE `lectures_gratuites` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_lecture` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prets`
--

CREATE TABLE `prets` (
  `id` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_lecteur` int(11) NOT NULL,
  `date_demande` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` enum('en_attente','accepte','refuse','rendu') DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prets`
--

INSERT INTO `prets` (`id`, `id_livre`, `id_lecteur`, `date_demande`, `statut`) VALUES
(1, 1, 14, '2025-06-18 23:47:47', 'en_attente'),
(2, 1, 15, '2025-06-19 00:06:15', 'en_attente');

-- --------------------------------------------------------

--
-- Structure de la table `prets_automatiques`
--

CREATE TABLE `prets_automatiques` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_pret` datetime DEFAULT current_timestamp(),
  `date_expiration` datetime DEFAULT NULL,
  `heure_retour` time DEFAULT NULL,
  `statut` enum('actif','expire') DEFAULT 'actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','auteur','admin') DEFAULT 'user',
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `date_inscription`) VALUES
(1, 'ASSOGBA', 'Sidney', 'sidneyassobga42@gmail.com', '$2y$10$wt1pR4OCWBaBdV1AAX9jUu6ARcmql0EgyczwXABTo5QqD0n4WmA6y', '2025-06-18 21:15:42'),
(8, 'CHABI', 'Hoseas', 'bg@gmail.com', '$2y$10$yBq1oI7wf.DXxaQ5W258pO4UnAT.AVeDjLnJB1q1dUmFfQ6Z9jgii', '2025-06-18 21:21:34'),
(9, 'BIO', 'marc', 'bio@gmail.com', '$2y$10$sZahi14.2zJe.jwrGLX/teJOvzKzicRM3haCMTgRoHMxeQDiQvixu', '2025-06-18 22:27:03'),
(10, 'BIO', 'ASSOGN A', 'bi@gmail.com', '$2y$10$.57tZijYto8pmxpZAFl5Yue9G5V26ReSGCt3NYq.ZvB6qBA7gub0K', '2025-06-18 22:32:07'),
(11, 'ASSOGBA', 'marc', 'BOKO@gmail.com', '$2y$10$pVWG3ebAzBuxxq3Opqlzn.m4Ngcy75VmUYzKqThkabyaeKtlso1wC', '2025-06-18 22:35:02'),
(12, 'BIO', 'Hoseas', 'oo@gmail.com', '$2y$10$bLmVTSGq28Ki5m0YV3Q64ej8SnYDJCBdeFO05YkaUldmaHouxN0y6', '2025-06-18 22:37:54'),
(13, 'ASSOGBA', 'marc', 'io@gmail.com', '$2y$10$f9RNeb95B4DXiFEDB4jRS.MayWsfJaUlACvrlLsZA2zYExWRfYay.', '2025-06-18 22:45:01'),
(14, 'CHABI', 'marc', 'azerty@gmail.com', '$2y$10$WcjN7Bde.cL13rI0gDiQuuK1J3JH/G8d/DMe9JiktXcZdwjpCFIRS', '2025-06-18 22:51:40'),
(15, 'SERGIO', 'Busquet', 'busquet@gmail.com', '$2y$10$aV21v/DFOK4C6A/xFUPNyOwntL8fQeChQYqPvhv8xgja9yzmzracq', '2025-06-19 00:05:49'),
(16, 'BIO', 'Sidney', 'qsddfg@gmail.com', '$2y$10$.DWlSe5ghi81erBGY6H81uhh3.Ovc38y1vwaMQ7AnaBcx/91cVJIG', '2025-06-19 16:05:14'),
(17, 'Marc', 'cephas', 'cephas@gmail.com', '$2y$10$Ki6yJ4YbqCl6gJZDZGASZuvpA1hHyiOKDuQ/pFHsIH0D7qguFzVqy', '2025-06-19 16:13:05'),
(18, 'GIO', 'BIK', 'gio@gmail.com', '$2y$10$IjPVeMZpJ0PkRSCiZaiB4.yIqU1Pdr7mMLc/dq0B1Gi4v7TOdFEWy', '2025-06-19 21:21:18'),
(19, 'der', 'hhh', 'gogo@gmail.com', '$2y$10$aqpAJEAso5I1NELch8PmDeB31eYMz8PQH.hk9kH2/.fKD.TxZ0ZTC', '2025-06-19 22:16:45'),
(20, 'BIO', 'Sidney', 'SID@gmail.com', '$2y$10$9vb4jEqnADvpluimPBKsPeWUh6TIijRlhftCEl5Upy21Q22FZ6gU2', '2025-06-20 14:30:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `lectures_gratuites`
--
ALTER TABLE `lectures_gratuites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auteur` (`auteur`);

--
-- Index pour la table `prets`
--
ALTER TABLE `prets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prets_automatiques`
--
ALTER TABLE `prets_automatiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `lectures_gratuites`
--
ALTER TABLE `lectures_gratuites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `prets`
--
ALTER TABLE `prets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `prets_automatiques`
--
ALTER TABLE `prets_automatiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);

--
-- Contraintes pour la table `histoires`
--
ALTER TABLE `histoires`
  ADD CONSTRAINT `histoires_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `histoires_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `lectures_gratuites`
--
ALTER TABLE `lectures_gratuites`
  ADD CONSTRAINT `lectures_gratuites_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `lectures_gratuites_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `prets_automatiques`
--
ALTER TABLE `prets_automatiques`
  ADD CONSTRAINT `prets_automatiques_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `prets_automatiques_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
