-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 juin 2025 à 21:29
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
-- Base de données : `cfptdocs`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appartenirs`
--

CREATE TABLE `appartenirs` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appartenirs`
--

INSERT INTO `appartenirs` (`user_id`, `departement_id`) VALUES
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_c4ff231e5ce5284f3fded2e6430d624b', 'i:1;', 1750176819),
('laravel_cache_c4ff231e5ce5284f3fded2e6430d624b:timer', 'i:1750176819;', 1750176819),
('laravel_cache_e29dc4ecb9dbc0ea3c1e1c76c008d40c', 'i:1;', 1750176725),
('laravel_cache_e29dc4ecb9dbc0ea3c1e1c76c008d40c:timer', 'i:1750176725;', 1750176725),
('laravel_cache_e76e800c8b412e6ddebb452937d3514e', 'i:1;', 1750171674),
('laravel_cache_e76e800c8b412e6ddebb452937d3514e:timer', 'i:1750171674;', 1750171674);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `filiere_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`matiere_id`, `filiere_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Informatique', 'INFO1', '2025-06-15 13:44:21', '2025-06-15 13:44:21');

-- --------------------------------------------------------

--
-- Structure de la table `downloads`
--

CREATE TABLE `downloads` (
  `fichier_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('TD','TP','Concours') NOT NULL,
  `niveau` enum('BTS1','BTS2') NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `matiere_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`id`, `name`, `type`, `niveau`, `chemin`, `matiere_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'deuxième', 'TP', 'BTS2', 'fichiers/QwKOzPlvWcKbI4Ml251i7Nyq74WSmO5J5ZHgAfxr.pdf', 6, 5, '2025-06-17 12:45:55', '2025-06-17 12:45:55'),
(4, 'mon premier', 'TD', 'BTS2', 'fichiers/SKMtHvaLKiKGDvLH1wYt7UxZCgGAzaaKaONQdlQt.pdf', 9, 5, '2025-06-17 12:50:59', '2025-06-17 12:50:59');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id`, `name`, `departement_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'IIR', 1, NULL, '2025-06-15 13:44:37', '2025-06-15 13:44:37'),
(2, 'DEV-Mobile', 1, NULL, '2025-06-15 13:44:37', '2025-06-15 13:44:37');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mathématiques', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(2, 'Réseaux', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(3, 'Développement Mobile', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(4, 'Electronique', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(5, 'Programmation', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(6, 'Maintenance Informatique', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(7, 'Anglais', '2025-06-15 16:06:03', '2025-06-15 16:06:03'),
(8, 'Transmission de données', '2025-06-15 16:06:04', '2025-06-15 16:06:04'),
(9, 'Système d\'expoitation', '2025-06-15 16:06:04', '2025-06-15 16:06:04'),
(10, 'Français', '2025-06-15 16:06:04', '2025-06-15 16:06:04');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_03_174438_create_departements_table', 1),
(5, '2025_06_03_174503_create_filieres_table', 1),
(6, '2025_06_03_174520_create_matieres_table', 1),
(7, '2025_06_03_174532_create_fichiers_table', 1),
(8, '2025_06_03_174547_create_appartenir_table', 1),
(9, '2025_06_03_174557_create_downloads_table', 1),
(10, '2025_06_03_174609_create_contenir_table', 1),
(11, '2025_06_03_175007_add_two_factor_columns_to_users_table', 1),
(12, '2025_06_03_175115_create_personal_access_tokens_table', 1),
(13, '2025_06_03_180609_add_fields_to_users_table', 1),
(14, '2025_06_14_184825_add_filiere_id_to_users_table', 1),
(15, '2025_06_03_174547_create_appartenirs_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('s50OcMHDxBO9Cg2sotl1PUr50WesKbEr2HVRo32k', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSkJEcnpKbm1CM3VpcldlVm5zWk9oZGl0SGJOdkg3WkFzS3NBOHVTayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvcHJvZmVzc2V1ciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkWGcuWVBsUldaeU5GeVFqWFUzU2N1LmVxcXFoNlpJaTMyOGNtSEcwdk5pVC9PUmZtNTR1MGEiO30=', 1750176986);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `niveau` varchar(255) DEFAULT NULL,
  `filiere_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`, `matricule`, `niveau`, `filiere_id`) VALUES
(5, 'Omar Diouf', 'omardiouf826@gmail.com', NULL, '$2y$12$Xg.YPlRWZyNFyQjXU3Scu.eqqqh6ZIi328cmHG0vNiT/ORfm54u0a', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-15 16:00:26', '2025-06-15 16:00:26', 'professeur', NULL, NULL, NULL),
(6, 'Mme DIOUF', 'mme@gmail.com', NULL, '$2y$12$3h.Lt14Qey3SU4edQ4FnGOygOgjezJrGd0No1Q4v5QW9KcyOOmV/G', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-15 16:01:53', '2025-06-15 16:01:53', 'etudiant', 'M1008109', 'BTS2', 1),
(7, 'Yacine', 'yacine@gmail.com', NULL, '$2y$12$SX9EWjeqyIzBaaB6v0ovae9aNB9YCJ1L8M3JE9w0tYW0IpPYpMOz6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-15 17:14:28', '2025-06-15 17:14:28', 'etudiant', 'M1008101', 'BTS2', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`user_id`,`departement_id`),
  ADD KEY `appartenir_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `appartenirs`
--
ALTER TABLE `appartenirs`
  ADD PRIMARY KEY (`user_id`,`departement_id`),
  ADD KEY `appartenirs_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD UNIQUE KEY `contenir_matiere_id_filiere_id_unique` (`matiere_id`,`filiere_id`),
  ADD KEY `contenir_filiere_id_foreign` (`filiere_id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departements_code_unique` (`code`);

--
-- Index pour la table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`fichier_id`,`user_id`),
  ADD KEY `downloads_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fichiers_matiere_id_foreign` (`matiere_id`),
  ADD KEY `fichiers_user_id_foreign` (`user_id`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filieres_departement_id_foreign` (`departement_id`),
  ADD KEY `filieres_user_id_foreign` (`user_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
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
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_filiere_id_foreign` (`filiere_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appartenir_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `appartenirs`
--
ALTER TABLE `appartenirs`
  ADD CONSTRAINT `appartenirs_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appartenirs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contenir_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_fichier_id_foreign` FOREIGN KEY (`fichier_id`) REFERENCES `fichiers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `fichiers_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fichiers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD CONSTRAINT `filieres_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `filieres_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_filiere_id_foreign` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
