-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 03:02 PM
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
-- Database: `mini_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `outcome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`date`, `emp_id`, `customer_id`, `type`, `outcome`) VALUES
('2025-03-26 05:42:41', 5, 24, 'follow-up', 'line busy\r\n'),
('2025-03-27 05:37:33', 4, 23, 'visit', 'closed deal'),
('2025-03-27 05:37:33', 5, 12, 'call', 'requested proposal');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `emp_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_ID`, `name`, `phone`, `emp_id`, `tag_id`) VALUES
(12, 'oss', '010465123', 4, 5),
(23, 'oss oss', '012456130', 5, 32),
(24, 'oss oss oss', '012348966', 6, 55);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `creator` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `username`, `password`, `creator`, `isAdmin`) VALUES
(4, 'Big Diaa', 'admin@minicrm.com', '123456', '1', 1),
(5, 'Diaa', 'user@minicrm.com', '654321', '2', 0),
(6, 'Ismaeel', 'ismaeel@minicrm.com', '123456', '4', 1),
(7, 'handsome', 'fat@minicrm.com', '232323', '4', 0),
(8, 'joker', 'joke@u.com', '123456', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6jmzHQLbbThoew7nHmnFlN8OMxXhZu8A0RwBEJJ9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia05WUkExWG9EcHJmMHhGRnl0QjczcHdqT2EzSHI2bTFveXZ6SlkwdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743170476),
('BvtgQ6LTV8DIZ8w1yQn9qitXY1du5aNUbBS5flY7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnAybEJadzh0YmJNVUE5aU5RTWdWbmdSajh2Zzdsa3l3WURYc0pCNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743170476),
('G8aerdylc6zNHy54AWoY5YJsjbluO782Rr0acYDo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', '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', 1743144271),
('hwhpMNl9MJaZtFwGK2ARB2c6ubrpTWgHMTTeIc37', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVRiMEJpd0dKYjVtU1FjR3FrbnVqbzdrZXpibzZyMUhsREd0OTNoUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743142219),
('NAGvdrmUlmCPGAFynUr27AuXfCWmTADxwpEKBzZz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWx4emtlVFBRVDI3NndxaERMV1ZOMElQNkNnYU9aVFB2emR1bnkwdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743142218),
('rNC9dQr7CKVAwE0lFSToP1gBEw37jMvRBAwO8ozE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0UyMDEwckd0M0FXYnRKTnlBS1ZFWVB3ck5XRlp2SExXc3ptd2JrUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743142218),
('s6zPyV9aPekmNszb4ClPxf56KxAVfhs53Js6OwfQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTVlMTBxVktuU0JFaFdjbU1ERHByRWtGem55R0oxUTBqNWxielpoZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2giO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1743170476),
('XT2WFSAftZ02W7DdO0ACPyf327Clhgcvq3Gtsp9F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiajdldm5QYnh0QlVwcEpKeEpicFdDd0xCQXRER2pMdmYzSUxEd3gxcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1743170513);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `interested` tinyint(1) NOT NULL,
  `not_interested` tinyint(1) NOT NULL,
  `potential_lead` tinyint(1) NOT NULL,
  `highPriority` tinyint(1) NOT NULL,
  `lowPrority` tinyint(1) NOT NULL,
  `client` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `interested`, `not_interested`, `potential_lead`, `highPriority`, `lowPrority`, `client`) VALUES
(1, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 1),
(3, 0, 0, 0, 0, 1, 0),
(4, 0, 0, 0, 0, 1, 1),
(5, 0, 0, 0, 1, 0, 0),
(6, 0, 0, 0, 1, 0, 1),
(7, 0, 0, 0, 1, 1, 0),
(8, 0, 0, 0, 1, 1, 1),
(9, 0, 0, 1, 0, 0, 0),
(10, 0, 0, 1, 0, 0, 1),
(11, 0, 0, 1, 0, 1, 0),
(12, 0, 0, 1, 0, 1, 1),
(13, 0, 0, 1, 1, 0, 0),
(14, 0, 0, 1, 1, 0, 1),
(15, 0, 0, 1, 1, 1, 0),
(16, 0, 0, 1, 1, 1, 1),
(17, 0, 1, 0, 0, 0, 0),
(18, 0, 1, 0, 0, 0, 1),
(19, 0, 1, 0, 0, 1, 0),
(20, 0, 1, 0, 0, 1, 1),
(21, 0, 1, 0, 1, 0, 0),
(22, 0, 1, 0, 1, 0, 1),
(23, 0, 1, 0, 1, 1, 0),
(24, 0, 1, 0, 1, 1, 1),
(25, 0, 1, 1, 0, 0, 0),
(26, 0, 1, 1, 0, 0, 1),
(27, 0, 1, 1, 0, 1, 0),
(28, 0, 1, 1, 0, 1, 1),
(29, 0, 1, 1, 1, 0, 0),
(30, 0, 1, 1, 1, 0, 1),
(31, 0, 1, 1, 1, 1, 0),
(32, 0, 1, 1, 1, 1, 1),
(33, 1, 0, 0, 0, 0, 0),
(34, 1, 0, 0, 0, 0, 1),
(35, 1, 0, 0, 0, 1, 0),
(36, 1, 0, 0, 0, 1, 1),
(37, 1, 0, 0, 1, 0, 0),
(38, 1, 0, 0, 1, 0, 1),
(39, 1, 0, 0, 1, 1, 0),
(40, 1, 0, 0, 1, 1, 1),
(41, 1, 0, 1, 0, 0, 0),
(42, 1, 0, 1, 0, 0, 1),
(43, 1, 0, 1, 0, 1, 0),
(44, 1, 0, 1, 0, 1, 1),
(45, 1, 0, 1, 1, 0, 0),
(46, 1, 0, 1, 1, 0, 1),
(47, 1, 0, 1, 1, 1, 0),
(48, 1, 0, 1, 1, 1, 1),
(49, 1, 1, 0, 0, 0, 0),
(50, 1, 1, 0, 0, 0, 1),
(51, 1, 1, 0, 0, 1, 0),
(52, 1, 1, 0, 0, 1, 1),
(53, 1, 1, 0, 1, 0, 0),
(54, 1, 1, 0, 1, 0, 1),
(55, 1, 1, 0, 1, 1, 0),
(56, 1, 1, 0, 1, 1, 1),
(57, 1, 1, 1, 0, 0, 0),
(58, 1, 1, 1, 0, 0, 1),
(59, 1, 1, 1, 0, 1, 0),
(60, 1, 1, 1, 0, 1, 1),
(61, 1, 1, 1, 1, 0, 0),
(62, 1, 1, 1, 1, 0, 1),
(63, 1, 1, 1, 1, 1, 0),
(64, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`date`,`emp_id`,`customer_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
