-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komik`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'site administrator'),
(4, 'User', 'Reguler Users');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(4, 2),
(4, 5),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ziyad@gmail.com', 1, '2024-10-13 08:20:42', 0),
(2, '::1', 'ziyad@gmail.com', 1, '2024-10-13 08:21:32', 1),
(3, '::1', 'ziyad@gmail.com', 1, '2024-10-13 08:45:19', 1),
(4, '::1', 'ziyad@gmail.com', NULL, '2024-10-13 08:48:00', 0),
(5, '::1', 'ziyad@gmail.com', 1, '2024-10-13 08:48:10', 1),
(6, '::1', 'ziyad@gmail.com', 1, '2024-10-13 08:50:55', 1),
(7, '::1', 'raihan@gmail.com', 2, '2024-10-13 09:05:29', 0),
(8, '::1', 'raihan@gmail.com', NULL, '2024-10-13 09:07:10', 0),
(9, '::1', 'raihan@gmail.com', 2, '2024-10-13 09:07:21', 0),
(10, '::1', 'raihan@gmail.com', NULL, '2024-10-13 09:12:31', 0),
(11, '::1', 'raihan@gmail.com', 2, '2024-10-13 09:12:39', 0),
(12, '::1', 'raihan@gmail.com', 2, '2024-10-13 09:17:57', 0),
(13, '::1', 'rassya', 4, '2024-10-13 09:28:22', 0),
(14, '::1', 'ziyad@gmail.com', NULL, '2024-10-13 12:36:29', 0),
(15, '::1', 'ziyad@gmail.com', 1, '2024-10-13 12:36:37', 1),
(16, '::1', 'raihan@gmail.com', 2, '2024-10-13 12:36:59', 0),
(17, '::1', 'raihan@gmail.com', 2, '2024-10-13 12:38:02', 1),
(18, '::1', 'ziyad@gmail.com', 1, '2024-10-13 12:47:24', 1),
(19, '::1', 'raihan@gmail.com', 2, '2024-10-13 12:47:40', 1),
(20, '::1', 'ziyad@gmail.com', 1, '2024-10-13 12:53:55', 1),
(21, '::1', 'raihan@gmail.com', 2, '2024-10-13 13:02:23', 1),
(22, '::1', 'ziyad@gmail.com', 1, '2024-10-13 13:06:15', 1),
(23, '::1', 'raihan@gmail.com', 2, '2024-10-13 13:07:24', 1),
(24, '::1', 'ziyad@gmail.com', 1, '2024-10-13 13:11:58', 1),
(25, '::1', 'ziyad@gmail.com', 1, '2024-10-14 02:18:15', 1),
(26, '::1', 'ziyad@gmail.com', NULL, '2024-10-14 02:21:57', 0),
(27, '::1', 'ziyad@gmail.com', 1, '2024-10-14 02:22:04', 1),
(28, '::1', 'raihan@gmail.com', 2, '2024-10-14 05:33:41', 1),
(29, '::1', 'ziyad@gmail.com', NULL, '2024-10-14 05:36:54', 0),
(30, '::1', 'ziyad@gmail.com', 1, '2024-10-14 05:37:01', 1),
(31, '::1', 'raihan@gmail.com', 2, '2024-10-14 05:39:59', 1),
(32, '::1', 'ziyad@gmail.com', 1, '2024-10-14 05:41:16', 1),
(33, '::1', 'ziyad@gmail.com', 1, '2024-10-14 05:41:40', 1),
(34, '::1', 'raihan@gmail.com', 2, '2024-10-14 05:42:01', 1),
(35, '::1', 'ziyad@gmail.com', NULL, '2024-10-14 05:42:47', 0),
(36, '::1', 'ziyad@gmail.com', 1, '2024-10-14 05:42:54', 1),
(37, '::1', 'raihan@gmail.com', 2, '2024-10-14 07:08:14', 1),
(38, '::1', 'ziyad@gmail.com', 1, '2024-10-14 07:09:45', 1),
(39, '::1', 'raihan@gmail.com', 2, '2024-10-14 07:14:13', 1),
(40, '::1', 'ziyad@gmail.com', 1, '2024-10-14 12:06:08', 1),
(41, '::1', 'ziyad@gmail.com', 1, '2024-10-15 02:42:10', 1),
(42, '::1', 'ziyad@gmail.com', 1, '2024-10-15 05:59:55', 1),
(43, '::1', 'ziyad@gmail.com', 1, '2024-10-15 07:20:01', 1),
(44, '::1', 'ziyad@gmail.com', 1, '2024-10-15 07:22:07', 1),
(45, '::1', 'ziyad@gmail.com', 1, '2024-10-15 07:23:16', 1),
(46, '::1', 'raihan@gmail.com', 2, '2024-10-15 07:25:29', 1),
(47, '::1', 'ziyad@gmail.com', 1, '2024-10-15 07:25:42', 1),
(48, '::1', 'anindita@gmail.com', NULL, '2024-10-15 09:54:28', 0),
(49, '::1', 'anindita@gmail.com', NULL, '2024-10-15 09:55:08', 0),
(50, '::1', 'anindita@gmail.com', NULL, '2024-10-15 09:55:19', 0),
(51, '::1', 'annindita@gmail.com', 5, '2024-10-15 09:57:05', 1),
(52, '::1', 'ziyad@gmail.com', 1, '2024-10-15 09:57:28', 1),
(53, '::1', 'ziyad@gmail.com', 1, '2024-10-15 12:24:41', 1),
(54, '::1', 'rassya', 6, '2024-10-15 12:43:32', 0),
(55, '::1', 'rassya', 7, '2024-10-15 12:51:35', 0),
(56, '::1', 'rassya', 7, '2024-10-15 12:52:04', 0),
(57, '::1', 'ziyad@gmail.com', 1, '2024-10-15 12:52:31', 1),
(58, '::1', 'ziyad@gmail.com', 1, '2024-10-16 01:16:37', 1),
(59, '::1', 'ziyad@gmail.com', 1, '2024-10-16 01:20:00', 1),
(60, '::1', 'raihan@gmail.com', 2, '2024-10-16 02:09:01', 1),
(61, '::1', 'ziyad@gmail.com', 1, '2024-10-16 02:09:15', 1),
(62, '::1', 'raihan@gmail.com', 2, '2024-10-16 03:54:41', 1),
(63, '::1', 'raihan@gmail.com', 2, '2024-10-16 03:55:19', 1),
(64, '::1', 'ziyad@gmail.com', NULL, '2024-10-16 03:56:18', 0),
(65, '::1', 'ziyad@gmail.com', NULL, '2024-10-16 03:56:26', 0),
(66, '::1', 'ziyad@gmail.com', 1, '2024-10-16 03:57:26', 1),
(67, '::1', 'ziyad@gmail.com', 1, '2024-10-16 04:12:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage ALL Users'),
(2, 'manage-profile', 'Manage User\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'PHP Komplet', 'php-komplet', 'Jubilee', 'Elex Media Komputindo', '1728553083_a44d0150aff9bb011b35.jpeg', NULL, '2024-10-10 09:38:03'),
(2, 'Mudah Belajar Komputer untuk Anak', 'mudah-belajar-komputer-untuk-anak', 'Bambang Agus Setiawan', 'Huta Media', 'belajarkomputer.jpeg', NULL, '2024-10-14 06:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1728616502, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ziyad@gmail.com', 'ZiyadRifqi', 'ZiyadRifqi Permana', '1728881930_3dc50b488e61c2776ef5.jpg', '$2y$10$BBKwPyobvI2I5kqLIaiqWubstTC1DZP.zo1umrDJ8xSEUxlVXWqIK', NULL, NULL, NULL, '66e1b98a20847ead1672ac52efee65fb', NULL, NULL, 1, 0, '2024-10-13 08:17:16', '2024-10-13 08:17:16', NULL),
(2, 'raihan@gmail.com', 'Muhammad Raihan', NULL, 'default.png', '$2y$10$tfWVlSpjrJK3O.yolgScD.Ny.ekO70Oj249KZOAV.K59aVE..XNsK', NULL, NULL, NULL, '31360c5ed1550b6c60bf6bc894af24bf', NULL, NULL, 1, 0, '2024-10-13 08:56:37', '2024-10-13 08:56:37', NULL),
(5, 'annindita@gmail.com', 'anindita2', NULL, 'default.png', '$2y$10$wvB86NzIgizphZXS/OfLUOnbcg5h1v41DlEMDujB8F6n4vAw5k2b6', NULL, NULL, NULL, '9cd86b9856b40995d7f6bf81edd27df6', NULL, NULL, 1, 0, '2024-10-15 09:53:52', '2024-10-15 09:53:52', NULL),
(7, 'Rassya@gmail.com', 'Rassya', NULL, 'default.png', '$2y$10$PsoUh/yMYnzUlLK/3lFRR.lmM9vt8.mVUk1zmxP9Guk0oqy3mGW7i', NULL, NULL, NULL, '89ba25a9de8a82aa39aff0fab95e043e', NULL, NULL, 0, 0, '2024-10-15 12:45:45', '2024-10-15 12:45:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
