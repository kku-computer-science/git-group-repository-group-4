-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 10:08 AM
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
-- Database: `dataen`
--

-- --------------------------------------------------------

--
-- Table structure for table `research_focuses`
--

CREATE TABLE `research_focuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `research_topic_th` varchar(255) NOT NULL,
  `research_topic_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_focuses`
--

INSERT INTO `research_focuses` (`id`, `group_id`, `research_topic_th`, `research_topic_en`, `created_at`, `updated_at`) VALUES
(1, 3, 'หัวข้อวิจัยภาษาไทย', 'Research Topic in English', '2025-02-10 07:05:05', '2025-02-10 07:05:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `research_focuses`
--
ALTER TABLE `research_focuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_focuses_group_id_foreign` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `research_focuses`
--
ALTER TABLE `research_focuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `research_focuses`
--
ALTER TABLE `research_focuses`
  ADD CONSTRAINT `research_focuses_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `research_groups` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
