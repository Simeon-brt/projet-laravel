-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 28 mai 2025 à 14:13
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int NOT NULL,
  `titre` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cinemas`
--

INSERT INTO `cinemas` (`id`, `titre`, `description`, `image`, `date`) VALUES
(1, 'Inception', 'Un voleur qui s\'infiltre dans les rêves pour voler des secrets doit implanter une idée dans l\'esprit d’un PDG.', 'https://image.tmdb.org/t/p/w500/edv5CZvWj09upOsy2Y6IwDhK8bt.jpg', '2010-07-16'),
(2, 'The Dark Knight', 'Batman affronte le Joker, un criminel anarchiste qui veut plonger Gotham dans le chaos.', 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg', '2008-07-18'),
(3, 'Interstellar', 'Un groupe d\'explorateurs voyage à travers un trou de ver pour trouver une nouvelle planète habitable.', 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg', '2014-11-07'),
(4, 'Gladiator', 'Un général romain trahi devient gladiateur pour se venger de l’empereur corrompu.', 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg', '2000-05-05'),
(5, 'Le Seigneur des anneaux : La Communauté de l\'anneau', 'Frodon entame un périlleux voyage pour détruire l\'Anneau Unique.', 'https://image.tmdb.org/t/p/w500/56zTpe2xvaA4alU51sRWPoKPYZy.jpg', '2001-12-19'),
(6, 'Titanic', 'Une romance naît entre deux passagers du Titanic, vouée à se heurter à la tragédie.', 'https://image.tmdb.org/t/p/w500/9xjZS2rlVxm8SFx8kPC3aIGCOYQ.jpg', '1997-12-19'),
(7, 'Avatar', 'Sur Pandora, un soldat humain infiltre les Na\'vi et découvre un conflit moral.', 'https://image.tmdb.org/t/p/w500/kmcqlZGaSh20zpTbuoF0Cdn07dT.jpg', '2009-12-18'),
(8, 'The Matrix', 'Un hacker découvre la vérité sur la réalité : le monde est une simulation.', 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg', '1999-03-31'),
(9, 'Le Fabuleux Destin d’Amélie Poulain', 'À Montmartre, Amélie décide d’améliorer la vie des gens qui l’entourent.', 'https://image.tmdb.org/t/p/w500/sLG6bA1Zw54q1d1WORy1xkWQ5yJ.jpg', '2001-04-25'),
(10, 'La La Land', 'Une actrice en devenir et un pianiste passionné tombent amoureux à Los Angeles.', 'https://image.tmdb.org/t/p/w500/uDO8zWDhfWwoFdKS4fzkUJt0Rf0.jpg', '2016-12-09'),
(11, 'Joker', 'Arthur Fleck, un comédien raté, bascule dans la folie et devient le Joker.', 'https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg', '2019-10-04'),
(12, 'Parasite', 'Une famille pauvre s\'infiltre dans une famille riche, déclenchant une série d’événements dramatiques.', 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg', '2019-05-30'),
(13, 'Forrest Gump', 'Forrest, un homme simple au grand cœur, traverse les époques et change l’histoire sans le vouloir.', 'https://image.tmdb.org/t/p/w500/saHP97rTPS5eLmrLQEcANmKrsFl.jpg', '1994-07-06'),
(14, 'Le Parrain', 'Le chef d’une famille mafieuse transmet son empire criminel à son fils.', 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg', '1972-03-24'),
(15, 'Les Évadés', 'Deux prisonniers tissent un lien unique et espèrent une liberté retrouvée.', 'https://image.tmdb.org/t/p/w500/9O7gLzmreU0nGkIB6K3BsJbzvNv.jpg', '1994-09-23');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2025_01_06_144738_create_tasks_table', 1),
(5, '2025_01_14_090510_add_role_to_users_table', 2),
(6, '2025_05_28_123103_create_showtimes_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `showtimes`
--

CREATE TABLE `showtimes` (
  `id` bigint UNSIGNED NOT NULL,
  `cinema_id` int NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `showtimes`
--

INSERT INTO `showtimes` (`id`, `cinema_id`, `start_time`, `end_time`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '14:00:00', '16:00:00', '2025-06-01', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(2, 1, '18:00:00', '20:00:00', '2025-06-01', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(3, 2, '15:30:00', '17:30:00', '2025-06-01', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(4, 2, '19:00:00', '21:00:00', '2025-06-02', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(5, 3, '13:00:00', '15:00:00', '2025-06-01', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(6, 3, '17:00:00', '19:00:00', '2025-06-03', '2025-05-28 12:39:12', '2025-05-28 12:39:12'),
(7, 4, '12:30:00', '14:30:00', '2025-06-01', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(8, 4, '16:00:00', '18:00:00', '2025-06-05', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(9, 5, '16:30:00', '18:30:00', '2025-06-02', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(10, 5, '20:00:00', '22:00:00', '2025-06-05', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(11, 6, '11:00:00', '13:00:00', '2025-06-03', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(12, 6, '14:00:00', '16:00:00', '2025-06-04', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(13, 7, '17:30:00', '19:30:00', '2025-06-02', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(14, 7, '19:00:00', '21:00:00', '2025-06-05', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(15, 8, '13:30:00', '15:30:00', '2025-06-03', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(16, 8, '16:00:00', '18:00:00', '2025-06-06', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(17, 9, '20:00:00', '22:00:00', '2025-06-01', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(18, 9, '14:00:00', '16:00:00', '2025-06-06', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(19, 10, '18:30:00', '20:30:00', '2025-06-04', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(20, 10, '13:00:00', '15:00:00', '2025-06-05', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(21, 11, '16:30:00', '18:30:00', '2025-06-01', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(22, 11, '19:30:00', '21:30:00', '2025-06-03', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(23, 12, '12:00:00', '14:00:00', '2025-06-02', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(24, 12, '17:00:00', '19:00:00', '2025-06-06', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(25, 13, '10:00:00', '12:00:00', '2025-06-01', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(26, 13, '15:00:00', '17:00:00', '2025-06-04', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(27, 14, '14:30:00', '16:30:00', '2025-06-03', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(28, 14, '18:00:00', '20:00:00', '2025-06-06', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(29, 15, '11:00:00', '13:00:00', '2025-06-05', '2025-05-28 13:53:45', '2025-05-28 13:53:45'),
(30, 15, '19:00:00', '21:00:00', '2025-06-06', '2025-05-28 13:53:45', '2025-05-28 13:53:45');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `created_at`, `updated_at`, `title`, `detail`, `state`) VALUES
(2, '2025-01-07 10:15:30', '2025-01-08 13:58:32', 'test2', 'ceci est un nouveau test', 1),
(7, '2025-01-08 13:57:49', '2025-01-08 13:57:49', 'tets vrai image', '<figure class=\"image\"><img src=\"http://todolist.test/userfiles/images/medium.webp\"></figure>', 0),
(10, '2025-01-10 07:24:17', '2025-01-10 07:24:17', 'edddd', '<p>ddddd</p>', 0),
(11, '2025-01-10 07:24:22', '2025-01-15 10:04:17', 'fgfff', '<p>ggggg</p>', 1),
(14, '2025-01-10 08:50:12', '2025-02-19 13:55:56', 'nouvelle image', '<figure class=\"image\"><img src=\"http://todolist.test/userfiles/images/images.jpg\"></figure>', 1),
(15, '2025-01-10 08:50:24', '2025-01-10 08:50:24', 'image oeil', '<figure class=\"image\"><img src=\"http://todolist.test/userfiles/images/images.jpg\"></figure>', 0),
(17, '2025-01-10 08:50:44', '2025-02-19 13:56:12', 'encore un chat', '<figure class=\"image\"><img src=\"http://todolist.test/userfiles/images/medium.webp\"></figure>', 1),
(20, '2025-01-13 07:50:15', '2025-01-13 07:50:15', 'image', '<figure class=\"image\"><img src=\"http://todolist.test/userfiles/images/astro.jpg\"></figure>', 0),
(21, '2025-01-13 15:24:30', '2025-02-19 13:56:14', 'ddddd', '<p>dddd</p>', 1),
(22, '2025-01-13 15:24:34', '2025-01-13 15:24:34', 'dddd', '<p>ddd</p>', 0),
(23, '2025-01-13 15:24:39', '2025-02-19 13:56:18', 'zzddq', '<p>qddqd</p>', 1),
(24, '2025-01-13 15:24:48', '2025-01-13 15:24:48', 'dqdqdfq', '<p>dada</p>', 0),
(25, '2025-01-13 15:24:51', '2025-01-13 15:24:51', 'adadz', '<p>dad</p>', 0),
(26, '2025-01-13 15:24:55', '2025-01-13 15:24:55', 'adada', '<p>adada</p>', 0),
(27, '2025-01-13 15:26:21', '2025-01-13 15:26:21', 'qdddq', '<p>dqddqdqd</p>', 0),
(28, '2025-01-13 15:26:34', '2025-01-15 10:04:22', 'qdddq', '<p>dqddqdqd</p>', 1),
(29, '2025-01-13 15:28:37', '2025-01-13 15:28:37', 'wxxcdd', '<p>dfqdfqsc</p>', 0),
(30, '2025-01-13 15:28:40', '2025-02-19 13:56:22', 'qxcqqc', '<p>qxcqq</p>', 1),
(31, '2025-01-13 15:28:43', '2025-01-13 15:28:43', 'qcqcqcq', '<p>qcqcqc</p>', 0),
(32, '2025-01-13 15:28:45', '2025-01-13 15:28:45', 'qcqcq', '<p>qcqcq</p>', 0),
(33, '2025-01-13 15:28:48', '2025-01-13 15:28:48', 'fgggg', '<p>gdgd</p>', 0),
(34, '2025-01-13 15:28:50', '2025-01-13 15:28:50', 'gdgdg', '<p>gdgg</p>', 0),
(35, '2025-01-13 15:28:53', '2025-01-13 15:28:53', 'gdgdgd', '<p>gdgdgdg</p>', 0),
(36, '2025-01-13 15:28:56', '2025-01-13 15:28:56', 'gdgdgdg', '<p>gdgdgdg</p>', 0),
(37, '2025-01-13 15:28:59', '2025-01-13 15:28:59', 'zfzf', '<p>fsfs</p>', 0),
(38, '2025-01-13 15:29:01', '2025-01-13 15:29:01', 'zfzfz', '<p>csscfs</p>', 0),
(39, '2025-01-13 15:29:05', '2025-01-13 15:29:05', 'fsfvsvs', '<p>zsffsf</p>', 0),
(40, '2025-01-13 15:29:13', '2025-01-13 15:29:13', 'qdffdf', '<p>fzfzffzf</p>', 0),
(41, '2025-01-13 15:29:16', '2025-01-13 15:29:16', 'fzfzfzf', '<p>fzffzz</p>', 0),
(42, '2025-01-13 15:29:18', '2025-01-13 15:29:18', 'zfzffzzf', '<p>zfffzffz</p>', 0),
(43, '2025-01-13 15:29:21', '2025-01-13 15:29:21', 'zfzfzff', '<p>fzffzfzf</p>', 0),
(44, '2025-01-13 15:29:23', '2025-01-15 10:04:26', 'ffzffzfz', '<p>fzfzff</p>', 1),
(45, '2025-01-13 15:29:30', '2025-01-13 15:29:30', 'zfzfzfz', '<p>qffqffqf</p>', 0),
(46, '2025-01-13 15:29:32', '2025-01-13 15:29:32', 'ffzfzfzfz', '<p>fzfzfzfz</p>', 0),
(47, '2025-01-14 14:13:43', '2025-01-14 14:13:43', 'test froala', '<p><img src=\"blob:http://todolist.test/fa05b57e-48b7-4c8b-b267-b892b78b7fd4\" style=\"width: 358px;\" class=\"fr-fic fr-dib\"></p>', 0),
(48, '2025-01-14 14:14:09', '2025-01-14 14:14:09', 'test froala redimenssion', '<p><img src=\"blob:http://todolist.test/7df478a5-a87b-4e23-93a1-3fa36df0a33c\" style=\"width: 32px;\" class=\"fr-fic fr-dib\"></p>', 0),
(49, '2025-01-14 16:07:51', '2025-01-14 16:07:51', 'test froala', '<p>daztedftftdddgdgfgfg fyg gfg fgfggfgfg g g g g gg g gg g g g gg gg g</p>', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'utilisateur',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'Siméon', 'simeon@gmail.com', 'admin', NULL, '$2y$12$TolaIY/IX2OgTyXA5pFs8eoFNYVOPtLAricUNrPHTC15ifrhB5lmi', 'Tvrdf21vCE682dEpoEgIKZIgGNhH3aNeMvkvh8foghEmJNNqa5G4IYG2QKsw', '2025-01-13 13:17:57', '2025-01-13 13:17:57'),
(22, 'test2', 'test2@gmail.com', 'utilisateur', NULL, '$2y$12$yo2YDMxULM7qg7hx7c..M.3XU/zZfkrOGlrucoV5.0f4ugsIL0pmG', NULL, '2025-01-13 15:00:10', '2025-01-13 15:00:10'),
(25, 'test4', 'test4@gmail.com', 'utilisateur', NULL, '$2y$12$8NF4NNRu9r.0FIWDKO7jD.Rt9OHsNw9dlynDrdB0N5JSuobh9oIFe', NULL, '2025-01-14 09:13:06', '2025-01-14 09:13:06'),
(26, 'test5', 'test5@gmail.com', 'utilisateur', NULL, '$2y$12$pe31hhl8DKjPefqk1ywrSObom48JNyEvTZQVBZKKiATWOtA5gQG2i', NULL, '2025-01-14 10:03:32', '2025-01-14 10:03:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showtimes_cinema_id_foreign` (`cinema_id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_cinema_id_foreign` FOREIGN KEY (`cinema_id`) REFERENCES `cinemas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
