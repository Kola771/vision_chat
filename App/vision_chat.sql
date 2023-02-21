-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 21 fév. 2023 à 17:01
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vision_chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `story`
--

CREATE TABLE `story` (
  `story_id` int(11) NOT NULL,
  `story_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `story`
--

INSERT INTO `story` (`story_id`, `story_image`, `user_id`, `created_at`) VALUES
(4, 'story-image63f3a13e44b7a2.71387088.jpg', 975245, '2023-02-20 03:35:10'),
(5, 'story-image63f3a13e478b31.45791973.jpg', 975245, '2023-02-20 03:35:10'),
(7, 'story-image63f4b11ba049b3.65544603.jpg', 845895, '2023-02-21 10:55:07'),
(8, 'story-image63f4df1d9ec3d0.17978394.jpg', 975245, '2023-02-21 02:11:25'),
(13, 'story-image63f4f182c4aaf7.08791649.jpg', 313085, '2023-02-21 03:29:54'),
(14, 'story-image63f4f182c73e30.75748317.jpg', 313085, '2023-02-21 03:29:54'),
(15, 'story-image63f4f182c98305.52436366.jpg', 313085, '2023-02-21 03:29:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_date` date NOT NULL,
  `user_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sexe` enum('Masculin','Féminin','Autres') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_situation` enum('Célibataire','Couple','Compliqué','union') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_rand` int(11) DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` enum('Admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` enum('Active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_date`, `user_username`, `user_email`, `user_image`, `user_sexe`, `user_situation`, `number_rand`, `user_password`, `user_role`, `user_status`, `created_at`) VALUES
(313085, 'Koladé', 'ABOUDOU', '2002-05-12', 'Asdepic001', 'koladeaboudou@gmail.com', 'account.jpg', 'Masculin', 'Célibataire', NULL, '$2y$10$8QFyMHZMEKOv/FBivXWP5.ILwSrCFHspUrWz3IEJOLeRhLSM/0NQ6', 'user', 'Active', '2023-02-21 11:56:09'),
(845895, 'Marcos', 'MEDENOU', '2023-02-17', 'Marcos199', 'marcos@gmail.com', 'account.jpg', 'Masculin', 'Célibataire', NULL, '$2y$10$YXHLA9H9Bnd0LEbYF0Vw8.aOOc5Q4GmAy8IcS86UzV3GbG6ITSB3m', 'user', 'Active', '2023-02-21 13:14:44'),
(975245, 'Tiburce', 'KOUAGOU', '1997-05-04', 'Tiburce025', 'tiburcekouagou@gmail.com', 'account.jpg', 'Masculin', 'Célibataire', NULL, '$2y$10$J96wUWE65f5qPrBLDswVLudV8RyBYuXytUX0XcuVAd2hOplojMeQG', 'user', 'Active', '2023-02-21 11:23:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=975246;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
