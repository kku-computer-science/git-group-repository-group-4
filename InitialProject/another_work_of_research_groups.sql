-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2025 at 04:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RG`
--

-- --------------------------------------------------------

--
-- Table structure for table `work_of_research_groups`
--

CREATE TABLE `work_of_research_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(1) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `research_group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_of_research_groups`
--

INSERT INTO `work_of_research_groups` (`id`, `role`, `user_id`, `research_group_id`) VALUES
(95, 1, 2, 10),
(96, 2, 18, 10),
(97, 2, 22, 10),
(98, 2, 14, 10),
(99, 2, 17, 10),
(100, 2, 26, 10),
(101, 1, 16, 9),
(102, 2, 46, 9),
(103, 1, 7, 8),
(105, 2, 25, 8),
(111, 1, 9, 5),
(112, 2, 8, 5),
(113, 2, 6, 5),
(115, 2, 5, 3),
(116, 2, 11, 3),
(117, 1, 157, 3),
(118, 2, 15, 3),
(119, 2, 31, 3),
(121, 2, 23, 3),
(123, 2, 30, 3),
(124, 2, 28, 3),
(125, 2, 29, 5),
(126, 2, 33, 5),
(127, 2, 158, 5),
(128, 2, 159, 5),
(132, 2, 151, 12),
(134, 2, 24, 12),
(135, 2, 159, 12),
(136, 1, 158, 12),
(137, 2, 154, 10),
(138, 1, 3, 13),
(139, 2, 13, 13),
(140, 2, 24, 13),
(141, 2, 155, 13),
(142, 2, 151, 13),
(143, 1, 20, 11),
(144, 2, 21, 11),
(145, 2, 34, 11),
(146, 1, 10, 14),
(147, 2, 32, 14),
(148, 2, 6, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `work_of_research_groups`
--
ALTER TABLE `work_of_research_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_of_research_groups_user_id_foreign` (`user_id`),
  ADD KEY `work_of_research_groups_research_group_id_foreign` (`research_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work_of_research_groups`
--
ALTER TABLE `work_of_research_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work_of_research_groups`
--
ALTER TABLE `work_of_research_groups`
  ADD CONSTRAINT `work_of_research_groups_research_group_id_foreign` FOREIGN KEY (`research_group_id`) REFERENCES `research_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_of_research_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
