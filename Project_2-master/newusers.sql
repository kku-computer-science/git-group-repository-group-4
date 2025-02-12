-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 09:25 AM
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
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `fname_en` varchar(50) DEFAULT NULL,
  `lname_en` varchar(50) DEFAULT NULL,
  `fname_th` varchar(50) DEFAULT NULL,
  `lname_th` varchar(50) DEFAULT NULL,
  `doctoral_degree` varchar(5) DEFAULT NULL,
  `academic_ranks_en` varchar(25) DEFAULT NULL,
  `academic_ranks_th` varchar(25) DEFAULT NULL,
  `position_en` varchar(25) DEFAULT NULL,
  `position_th` varchar(25) DEFAULT NULL,
  `title_name_th` varchar(15) DEFAULT NULL,
  `title_name_en` varchar(15) DEFAULT NULL,
  `picture` varchar(155) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `fname_en`, `lname_en`, `fname_th`, `lname_th`, `doctoral_degree`, `academic_ranks_en`, `academic_ranks_th`, `position_en`, `position_th`, `title_name_th`, `title_name_en`, `picture`, `status`, `email_verified_at`, `program_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$10$nrI/W9tolkEdeA8N21TECOmr06MgEbr8q6lN2duMxn5PaHBsnt7Ci', 'admin', '-', 'ผู้ดูแลระบบ', '-', NULL, NULL, NULL, NULL, NULL, 'นาย', 'Mr.', 'UIMG_202203296242bbe5c8689.jpg', 0, NULL, 1, NULL, '2022-01-31 03:06:42', '2022-05-01 15:41:57'),
(2, 'ngamnij@kku.ac.th', NULL, '$2y$10$3VzoHQXXQlsMNF0hxuY.JeemtM1EUpJC2YWTKlqV9dP3Tl3wcwhJq', 'Ngamnij', 'Arch-int', 'งามนิจ', 'อาจอินทร์', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาง', 'Mrs.', 'UIMG_20220501626e51e056dd9.jpg', 0, NULL, 4, NULL, '2022-02-01 11:52:35', '2025-02-07 07:40:50'),
(3, 'chakso@kku.ac.th', NULL, '$2y$10$NY/HwFcQfL80AV7Lg2dVNew2YNY39ZWoP/DjbE0iZEZuO.X.Er55a', 'Chakchai', 'So-In', 'จักรชัย', 'โสอินทร์', 'Ph.D.', 'Professor', 'ศาสตราจารย์', 'Prof. Dr.', 'ศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e2980847fa.jpg', 0, NULL, 4, NULL, '2022-02-01 11:52:36', '2025-02-07 07:42:32'),
(4, 'somjit@kku.ac.th', NULL, '$2y$10$VLo1ptYZiXRpwGSfPfLXwekJu/KDflul0P0Havd6jd9tsMg8DeRYC', 'Somjit', 'Arch-int', 'สมจิตร', 'อาจอินทร์', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาย', 'Mr.', 'Somjit.jpg', 0, NULL, 2, NULL, '2022-02-01 11:52:36', '2022-02-01 11:52:36'),
(5, 'chaiyapon@kku.ac.th', NULL, '$2y$10$HBWg2AQIgFCE447R9eQnSOj22IbDbc1rCwgHjpDRXkxMjFTenF6GC', 'Chaiyapon', 'Keeratikasikorn', 'ชัยพล', 'กีรติกสิกร', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e31154570f.jpg', 0, NULL, 3, NULL, '2022-02-01 11:52:36', '2022-05-01 14:04:53'),
(6, 'punhor1@kku.ac.th', NULL, '$2y$10$apfvn7nchbetMKpiZvycQ.oHLnEEt/oh0/3godLz4T72AAqv/YYpm', 'Punyaphol', 'Horata', 'ปัญญาพล', 'หอระตะ', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220407624e7e943c5cd.jpg', 1, NULL, 5, NULL, '2022-02-01 11:52:36', '2025-02-07 07:47:24'),
(7, 'wongsar@kku.ac.th', NULL, '$2y$10$/Ehw6gvhl5qdde/YrW1II.YMQ18LZZwUGVjdJ0NJexdlkAFYXH8fC', 'Sartra', 'Wongthanavasu', 'ศาสตรา', 'วงศ์ธนวสุ', 'Ph.D.', 'Professor', 'ศาสตราจารย์', 'Prof. Dr.', 'ศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e3428e04a5.jpg', 0, NULL, 4, NULL, '2022-02-01 11:52:36', '2025-02-07 07:48:00'),
(8, 'sunkra@kku.ac.th', NULL, '$2y$10$c05Ozs3UCjtrNFRtQoMVAu2ZwFopfehohFW4mw9NfhYOVfnddREXa', 'Sirapat', 'Chiewchanwattana', 'สิรภัทร', 'เชี่ยวชาญวัฒนา', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาง', 'Mrs.', 'UIMG_20220501626e51a4f33be.jpg', 0, NULL, 4, NULL, '2022-02-01 11:52:36', '2025-02-07 07:49:49'),
(9, 'skhamron@kku.ac.th', NULL, '$2y$10$6CRhXm7BX53KWSlCLKriXei7qg7CFFIawhrKQPid9u5te9RvgpN/i', 'Khamron', 'Sunat', 'คำรณ', 'สุนัติ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e5173a8e05.jpg', 0, NULL, 5, NULL, '2022-02-01 11:52:36', '2025-02-07 07:50:59'),
(10, 'chitsutha@kku.ac.th', NULL, '$2y$10$heItHIMc4rUYiH7LyvASXeJtXsDXkCe.0bVe3Qy8bKC1ug0JOcULa', 'Chitsutha', 'Soomlek', 'ชิตสุธา', 'สุ่มเล็ก', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e36d5756d1.jpg', 0, NULL, 5, NULL, '2022-02-01 11:52:36', '2025-02-07 07:51:25'),
(11, 'nagon@kku.ac.th', NULL, '$2y$10$s3jKoRZR7aG8RAe2dUPffOm2bWq3l81SyCyP1qqq2YcWHj2lW.ki.', 'Nagon', 'Watanakij', 'ณกร', 'วัฒนกิจ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e52e51a74a.jpg', 0, NULL, 3, NULL, '2022-02-01 11:52:36', '2022-05-01 16:29:09'),
(13, 'Boonsup@kku.ac.th', NULL, '$2y$10$fqEpfJHRBvHv8VJBvdPp5.mxIALGjJuxAKhBTbiLBghXMXlDPi9Tq', 'Boonsup', 'Waikham', 'บุญทรัพย์', 'ไวคำ', NULL, 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof.', 'ผศ.', 'นาย', 'Mr.', 'Boonsup.jpg', 0, NULL, 1, NULL, '2022-02-01 11:55:56', '2022-02-01 11:55:56'),
(14, 'wpaweena@kku.ac.th', NULL, '$2y$10$pihLxY7LD3Q9yGzqAWVICe7xT8UO2.15zj6CnocLtxENnrj2YgS5G', 'Paweena', 'Wanchai', 'ปวีณา', 'วันชัย', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e3ec5eea80.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2022-05-01 15:03:18'),
(15, 'reungsang@kku.ac.th', NULL, '$2y$10$4NxYLYLEc46EvJRNCFoSQeJDMSDBywWl3Doh5U.AeKAtvYZXGPyoO', 'Pipat', 'Reungsang', 'พิพัธน์', 'เรืองแสง', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e40af16b44.jpg', 0, NULL, 3, NULL, '2022-02-01 11:55:56', '2022-05-01 15:11:27'),
(16, 'pusadee@kku.ac.th', NULL, '$2y$10$DOZApM5RDiOU8Y6drhSFIORa5o0IBaxc7ErW6cfF5nnqRcdla/40W', 'Pusadee', 'Seresangtakul', 'พุธษดี', 'ศิริแสงตระกูล', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_202204206260102f34a52.jpg', 0, NULL, 4, NULL, '2022-02-01 11:55:56', '2025-02-07 07:54:58'),
(17, 'monlwa@kku.ac.th', NULL, '$2y$10$xNNcC57VbSoz7FvYADkcs.6IVSYFsz51FZsMcrGJ4jmCjH5LtOoPO', 'Monlica', 'Wattana', 'มัลลิกา', 'วัฒนะ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e420b6d56b.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2022-05-01 15:17:15'),
(18, 'wararat@kku.ac.th', NULL, '$2y$10$.Xqn0ho63PEmdAmya6erXe37inHcU/egirN9ODk47z3aJ0sWOffnS', 'Wararat', 'Songpan', 'วรารัตน์', 'สงฆ์แป้น', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาง', 'Mrs.', 'UIMG_20220501626e43cb68e99.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2025-02-07 07:55:43'),
(19, 'sunti@kku.ac.th', NULL, '$2y$10$Sbme7QlIrU4mRFlcR8Q.1es3sGINNrk4W4yZ9AFsoxa9qh2FYfPtS', 'Sunti', 'Tintanai', 'สันติ', 'ทินตะนัย', NULL, 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof.', 'ผศ.', 'นาย', 'Mr.', 'UIMG_20220501626e452810ce9.jpg', 0, NULL, 1, NULL, '2022-02-01 11:55:56', '2022-05-01 15:30:32'),
(20, 'saiyan@kku.ac.th', NULL, '$2y$10$Bun4OTYENC5haD1ItEcPQe6Fax8HSa6Kqv/qjovHGP/kVTglagwj.', 'Saiyan', 'Saiyod', 'สายยัญ', 'สายยศ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e525e24ac0.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2022-05-01 16:26:54'),
(21, 'silain@kku.ac.th', NULL, '$2y$10$/OOD2/DSMVrZjxCV4Y/WZOYoO8ufUUVSAFHLe/8TkRsDxWvRtOZZa', 'Silada', 'Intarasothonchun', 'สิลดา', 'อินทรโสธรฉันท์', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e4f3782280.jpg', 1, NULL, 1, NULL, '2022-02-01 11:55:56', '2022-05-01 16:13:27'),
(22, 'urachart@kku.ac.th', NULL, '$2y$10$FENhdLMPALl0q9MVECvM.e51SN3V6LlmWg13Zp7aNFX1GERoL3etS', 'Urachart', 'Kokaew', 'อุรฉัตร', 'โคแก้ว', 'Ph.D.', 'Associate Professor', 'รองศาสตราจารย์', 'Assoc. Prof. Dr.', 'รศ.ดร.', 'นาง', 'Mrs.', 'UIMG_20220501626e4864317aa.jpg', 0, NULL, 4, NULL, '2022-02-01 11:55:56', '2025-02-07 07:58:20'),
(23, 'curawa@kku.ac.th', NULL, '$2y$10$0h0gqoogCAcKvHSr5nu7ZuWnxnzsGTk5QUm3choBOCOtvqYK22iMm', 'Urawan', 'Chanket', 'อุราวรรณ', 'จันทร์เกษ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e48efa5ee0.jpg', 0, NULL, 3, NULL, '2022-02-01 11:55:56', '2022-05-01 15:46:39'),
(24, 'phetim@kku.ac.th', NULL, '$2y$10$eTdVCLnoPHvZFzvCzcJDnOjBjz1Fw.1XJScJKadwj.jCNYl6w8BIS', 'Phet', 'Aimtongkham', 'เพชร', 'อิ่มทองคำ', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e493cb6200.jpg', 0, NULL, 8, NULL, '2022-02-01 11:55:56', '2025-02-07 08:00:56'),
(25, 'twachi@kku.ac.th', NULL, '$2y$10$E7rx0jbcpOgdbV8YdGfEuOKtujynoWtaUPpU3sZ12f8tHHPYdB1pO', 'Wachirawut', 'Thamviset', 'วชิราวุธ', 'ธรรมวิเศษ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ. ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e497c45cd1.jpg', 0, NULL, 1, NULL, '2022-02-01 11:55:56', '2025-02-07 08:01:00'),
(26, 'waruwu@kku.ac.th', NULL, '$2y$10$usNK/3pTwJceUEOc4KrFoO9MuOwdiD/887U2BxhJGs9lDwW6zHpP2', 'Warunya', 'Wunnasri', 'วรัญญา', 'วรรณศรี', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e4a3ada88e.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2022-05-01 15:52:10'),
(27, 'rapassit@kku.ac.th', NULL, '$2y$10$M89gMtkKu5YhD384R39GBuN4B5/d6sSbajbbWY7ovp7B5qDRSPgwW', 'Rapassit', 'Chinnapatjee', 'รภัสสิทธิ์', 'ชินภัทรจีรัสถ์', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.ดร.', 'นาย', 'Mr.', 'Rapassit.jpg', 0, NULL, 2, NULL, '2022-02-01 11:55:56', '2022-02-01 11:55:56'),
(28, 'sakpod@kku.ac.th', NULL, '$2y$10$1zIzwxKbnj7YuOd4kA87T.h5UHSh0lAuW25E2tJT9trZlxy5RL1e2', 'Sakpod', 'Tongleamnak', 'ศักดิ์พจน์', 'ทองเลี่ยมนาค', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e4efc9bc44.jpg', 0, NULL, 3, NULL, '2022-02-01 11:55:57', '2022-05-01 16:12:28'),
(29, 'thanaphon@kku.ac.th', NULL, '$2y$10$4Nsa5HgznCYlJfxaGCeR6umdWFIkdEZVMdI/deZ/XE6ioKBRyF/r2', 'Thanaphon', 'Tangchoopong', 'ธนพล', 'ตั้งชูพงศ์', NULL, 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.', 'นาย', 'Mr.', 'UIMG_20220501626e4c03d2e6a.jpg', 0, NULL, 1, NULL, '2022-02-01 11:55:57', '2022-05-01 15:59:47'),
(30, 'sarunap@kku.ac.th', NULL, '$2y$10$Tlr5glAocjeyWikzZ4wWT.edUAU4Mt0YwhHnD9luWKvj1WERrNAgi', 'Sarun', 'Apichontrakul', 'ศรัณย์', 'อภิชนตระกูล', NULL, 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.', 'นาย', 'Mr.', 'UIMG_20220501626e4ba7a1318.jpg', 0, NULL, 3, NULL, '2022-02-01 11:55:57', '2022-05-01 15:58:15'),
(31, 'rasamee@kku.ac.th', NULL, '$2y$10$jmcUK/k2S3rmbExHyWtPNu5vd3CG4Kuca/XgNeeY3eFxy1T38fdsO', 'Rasamee', 'Suwanwerakamtorn', 'รัศมี', 'สุวรรณวีระกำธร', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นาง', 'Mrs.', 'UIMG_20220501626e4c511a55e.jpg', 0, NULL, 3, NULL, '2022-02-01 11:55:57', '2022-05-01 16:01:05'),
(32, 'chanode@kku.ac.th', NULL, '$2y$10$d.0iFLezDCN4x4VyW5ooWeYPgp3G.yOv1dh6VCO3242Tjn.m4Gd/W', 'Chanon', 'Dechsupa', 'ชานนท์', 'เดชสุภา', NULL, 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Lecturer', 'ผศ. ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e4cd51ce25.jpg', 0, NULL, 1, NULL, '2022-02-01 11:55:57', '2025-02-07 08:04:17'),
(33, 'praipa@kku.ac.th', NULL, '$2y$10$R1.ftjez0vfqniI.HxKOAuZ9YzIeNod27WLyvpIpCxac6p.XkP8Fq', 'Praisan', 'Padungweang', 'ไพรสันต์', 'ผดุงเวียง', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Lecturer', 'อ.ดร.', 'นาย', 'Mr.', 'UIMG_20220501626e4ded3350b.jpg', 1, NULL, 7, NULL, '2022-02-01 11:55:57', '2025-02-07 08:05:57'),
(34, 'sumkas@kku.ac.th', NULL, '$2y$10$Es3pi9hL3kLahqdS5RgMIuBsDdC.dfexhATwtZmEbtMgDD7o7sCu.', 'Sumonta', 'Kasemvilas', 'สุมณฑา', 'เกษมวิลาศ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. Dr.', 'ผศ.ดร.', 'นางสาว', 'Miss', 'UIMG_20220501626e5005ad9bb.jpg', 0, NULL, 2, NULL, '2022-03-05 03:21:14', '2022-05-01 16:16:53'),
(35, 'staff@gmail.com', NULL, '$2y$10$p7tQSwelkV1eNMaCdDj3Le16hvZSPs8zw08UJhZZNh4yPYuSvIuky', 'staff', '-', 'เจ้าหน้าที่', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, '2022-03-31 17:00:12', '2022-05-18 08:21:35'),
(36, 'test@gmail.com', NULL, '$2y$10$vXV8y5pjmtZxkBjW.mIN4u9Oli2MFejeZqNezY6go3u323o8g1aWq', 'watcharawatchara', 'sritionwong', 'วัชระวัชระ', 'ศรีต้นวงศ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 2, NULL, '2022-04-02 18:51:43', '2022-04-03 17:44:13'),
(44, 'watchara@kkumail.com', NULL, '$2y$10$xnOxC423ySUfvY7aYW2o0.U9sPDXyYZm1ZJVjwdf9MjqDiDt4H/w6', 'watchara', 'sritonwong', 'วัชระ ', 'ศรีต้นวงศ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, '2022-04-07 04:12:05', '2022-04-07 04:12:05'),
(45, 'adidorn@kkumail.com', NULL, '$2y$10$VsYrYwROk36fpr3Ez1bKEeUzoKyZIESUW64edxBUYJRY7S1LXspl6', 'adisorn', 'naruang', 'อดิศร', 'นาเรือง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 5, NULL, '2022-04-07 04:12:06', '2022-04-10 21:07:58'),
(46, 'pongsathon@kku.ac.th', NULL, '$2y$10$HR5eW530msHb97kVW5hQQuPoQMb4tixIaTvtKJkfGfWapxDMgWxKu', 'Pongsathon', 'Janyoi', 'พงษ์ศธร', 'จันทรย้อย', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Dr.', 'อ. ดร.', 'นาย', 'Mr.', 'pongsathon.jpg', NULL, NULL, 8, NULL, '2022-04-22 06:35:21', '2025-02-07 08:09:21'),
(47, 'rojanha@kku.ac.th', NULL, '$2y$10$nfveF1GM1NBnLwuFpYdRaea8Ah4UOg5wkv04.vP19eFRA68UGvWOi', '-', '-', 'โรจนวรรณ', 'หาดี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-05-15 14:45:44', '2022-05-15 14:45:44'),
(49, 'Natech@kku.ac.th', NULL, '$2y$10$M6aM75XSoUXd6Ayc4k.zVOM.gX9O4BHiXcJ2FI1q1pnuuRVzDTl1C', '-', '-', 'เนตรนรินทร์', 'ชนะบัว', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-05-16 07:45:23', '2022-05-16 07:45:23'),
(50, 'noirattikorn@gmail.com', NULL, '$2y$10$d8qCaVCFtIRY6wV6qEFHnONc6FzYRXkE1iIFKOs56I1AkkqcdQb9W', '-', '-', 'รัตติกร', 'แทนเพชร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'UIMG_20220517628302565441d.jpg', NULL, NULL, 1, NULL, '2022-05-16 07:46:42', '2022-05-17 02:03:02'),
(51, NULL, '605020077-3', '$2y$10$IbCovXEZtZKrVh1q2XjFzeNFCbJCeM6NgoSx69.Uzn68/dOmFu/HK', NULL, NULL, 'พงศธร', 'วงศ์พราวมาศ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(52, NULL, '605020097-7', '$2y$10$0Hc7u7ItcZ1iajnpHZfd8.3MgzhO/oj3OzgsYPRy4ud9rJWMDGK2G', NULL, NULL, 'เศวตสิทธิ์', 'อิ่มนาง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(53, NULL, '605020039-1', '$2y$10$/c9oHXzsIdQmETuhhqtU1udpa2EWNM56HhG4NU.dMubiaihfpSCzG', NULL, NULL, 'ธีรธรรม', 'บุญประภาพันธุ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(54, NULL, '615020020-3', '$2y$10$NkIcg4X3159SkmcsV7BnbeV6VmKFUIZlkMZeopq6P3Q5WI8Ygu.R6', NULL, NULL, 'เดชฤทธิ์', 'แก้วประดับ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(55, NULL, '615020083-9', '$2y$10$tcEQaEFGrUpYV54YQwi7Uu6oM9xEdIGjdfnE14pQulM7avsrujLPW', NULL, NULL, 'ณัฐพงศ์', 'ฉิมวัย', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(56, NULL, '615020084-7', '$2y$10$odxow9CX/AEDQ4b0DIkn9eWJsiQdU5nzg3kCvvXfZEGxvSK3Au2fy', NULL, NULL, 'วชรพล', 'เกตวงษา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:42', '2022-05-16 08:42:42'),
(57, NULL, '615020094-4', '$2y$10$A.gTTSho0yoKsnYuj9i.NOiQ.hhKFUBsLtVlTDVfT.BWii.8Rdfzi', NULL, NULL, 'ชัยวิชิต', 'แก้วกลม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:43', '2022-05-16 08:42:43'),
(58, NULL, '615020053-8', '$2y$10$XAsLVOyi7FgRnclrjl2YSeQvfQuNB0T9r1IgzeZ1s610WM4eV9gs2', NULL, NULL, 'ปัทมวรรณ', 'สถิรพงค์กุล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:43', '2022-05-16 08:42:43'),
(59, NULL, '615020066-9 ', '$2y$10$6y3TmOM6SPdb6fJgaKph2OSpDtrb9p4tFZN1FGIZy22wu6Z42KvsK', NULL, NULL, 'ชนิตพล', 'สังข์สายศิริกุล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:43', '2022-05-16 08:42:43'),
(60, NULL, '625020074-1 ', '$2y$10$8jUkeDifvsOfaj/V54mdOOLR9Me4hg4cSMMWAZpM2/BGyf4.03BV6', NULL, NULL, 'ภควัต', 'กล้าหาญ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:44', '2022-05-16 08:42:44'),
(61, NULL, '625020075-9', '$2y$10$mKpQ8BMaqnpowcepEr2gfOrGFUaCcn7hP7WpBiOxOMiAd9VdlZ9b.', NULL, NULL, 'ศิรินทร', 'อ่อนอยู่', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:44', '2022-05-16 08:42:44'),
(62, NULL, '625020082-2 ', '$2y$10$FQSfpDikD7px92DQEbFHS.sbiUvfkvrhZKDVRxYY5iJuCCajQECaS', NULL, NULL, 'SOULIVANH', 'CHANTHAVISOUK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:44', '2022-05-16 08:42:44'),
(63, NULL, '625020012-3', '$2y$10$rgco/fQT837ZIhYxBjUs4.XpDS49sFaJZG0PY8ByHgIR20HtQcD1S', NULL, NULL, 'ธนดล', 'รัศมีเพ็ญ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:44', '2022-05-16 08:42:44'),
(64, NULL, '625020036-9', '$2y$10$o0uhWxDSXFj6j83EuSUPuu1.piy.9OEY3e9OxrM4yZPp61ZWu0IBW', NULL, NULL, 'กิตติกาญจน์', 'เจริญรัตน์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:45', '2022-05-16 08:42:45'),
(65, NULL, '625020037-7', '$2y$10$BJrDwR133mgxfSzr4oDRNOJfNc1WDOo.qKbxCtVoopcuJ3TMSn4M.', NULL, NULL, 'ธนวันต์', 'แวทไธสง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:45', '2022-05-16 08:42:45'),
(66, NULL, '625020038-5', '$2y$10$UaWARp6Dloxm8nHwkHdUX.25AKFlEze23k/A60L6hB0D5pEX7oR4O', NULL, NULL, 'ธนาธิป', 'แวทไธสง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:46', '2022-05-16 08:42:46'),
(67, NULL, '625020061-0', '$2y$10$PC9DoTIEmZiCDZZ9KDrASOaC2dyx981.cdh.70UYNmTWufDwMl2GS', NULL, NULL, 'ณัฐธิดา', 'วรรธนะปกรณ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:46', '2022-05-16 08:42:46'),
(68, NULL, '625020070-9', '$2y$10$qZ1BuZJb/b2k.pmZi/xxrOwdsCd7GHv/PQd6VIQrgUeOjjlCBny8C', NULL, NULL, 'กฤดิกร', 'วิชชาธรตระกูล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:46', '2022-05-16 08:42:46'),
(69, NULL, '625020071-7', '$2y$10$OKXLIQ3pGQ6Tatm.5c.fUOSHs9ykvIqUeTVs/PS/QHZmOt6G8Nohm', NULL, NULL, 'ภาณุวัฒน์', 'แก้วบ่อ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:46', '2022-05-16 08:42:46'),
(70, NULL, '625020072-5', '$2y$10$FBA7xQ4ZvmFvN7lPYWfYE.DKv7zTwoXv8b71ZU5VpLrXP9ERxDjTG', NULL, NULL, 'วชิรกาญจน์', 'เสือบัว', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:47', '2022-05-16 08:42:47'),
(71, NULL, '625020091-1', '$2y$10$cJznrsWPhDDdUMx/cik6WuFrtG6rD5iGblp0ONp0oibYk.iz0s4tK', NULL, NULL, 'พรรณศิริ', 'ศิริสมพงษ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:47', '2022-05-16 08:42:47'),
(72, NULL, '625020046-6 ', '$2y$10$hnJV5mwGXsnWxbhQORI3A.P/MZ3UaHWU5GpuJ2ZTdxOXBxz8mZsAy', NULL, NULL, 'ธนโชติ', 'พลน้ำเที่ยง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:47', '2022-05-16 08:42:47'),
(73, NULL, '635020002-7', '$2y$10$rjHqTLiG6mUOoRYHOb5nEOluop.rAX8wDzr55lkNTcrTL4SfsWIzi', NULL, NULL, 'ภูริณัฐ', 'นิลละออง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:47', '2022-05-16 08:42:47'),
(74, NULL, '635020046-7', '$2y$10$.x7bc.A94qzbJrPzkKHnLeFNXl7XS9O.qPK9UFmIpH6G0.QxiRJmy', NULL, NULL, 'ฑิตยา', 'ศรีวุฒิทรัพย์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:47', '2022-05-16 08:42:47'),
(75, NULL, '635020047-5', '$2y$10$h/xio9W/3mp7r5vtcY0Aku/rNKLbWIBIq/WretUSx29Tsr/BWg7TS', NULL, NULL, 'ธนาวุฒิ', 'นาบรรดิฐ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:48', '2022-05-16 08:42:48'),
(76, NULL, '635020048-3', '$2y$10$vHMcu.sZYX3yn2obHUCjJ.Kq3bERRLMe6k6RYcNQNnxTRkG4xViJG', NULL, NULL, 'ธีรธัช', 'ถวิลหวัง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:48', '2022-05-16 08:42:48'),
(77, NULL, '635020049-1', '$2y$10$tauxHDqBBba29tkYwbXah.SMwKJlw0YJvBFX0oUKg9nhTubmlsGiq', NULL, NULL, 'ภูมินทร์', 'ดวนขันธ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:48', '2022-05-16 08:42:48'),
(78, NULL, '635020050-6', '$2y$10$xT36tVHE6DMDBl8iSRWZF.WRzukgn6Os5EBLdh0lYSJPLDUdwJ3Z.', NULL, NULL, 'สิริวัฒน์', 'หิรัญชัชวาลย์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:48', '2022-05-16 08:42:48'),
(79, NULL, '635020015-8', '$2y$10$02y8cdZ5RUWeBS2yTi3Y2OK4Ob24lWGVYsxVolGtWIhtPZiM0OW6q', NULL, NULL, 'ชวรัชต์', 'ทองโยธี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:49', '2022-05-16 08:42:49'),
(80, NULL, '635020064-5', '$2y$10$o4BBQsg4jgiWj1cd20S8C.jyYAlhTZgPZdYIMkZDH5qHfOYm0MLk2', NULL, NULL, 'นพัทธ์', 'ศรีจันทพงศ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:49', '2022-05-16 08:42:49'),
(81, NULL, '635020065-3', '$2y$10$JJhm5r.Grp9dehP91sIJxepORR25XKa9WNI6.ofZhgcu6B3EZ4Tae', NULL, NULL, 'ขวัญพิฌา', 'ปะกิระคัง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:49', '2022-05-16 08:42:49'),
(82, NULL, '635020067-9', '$2y$10$Lat.ckJcIA0BGUr5VS1PtO9pbipVCQe1Dvx8HC81vvPbWsm0tBOWC', NULL, NULL, 'ณัฏฐ์สิทธิ์', 'แก้วสังหาร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:49', '2022-05-16 08:42:49'),
(83, NULL, '635020068-7', '$2y$10$dTogSYK3Fkxy2OtDr9tfH.2iZeUOxSFTkglv3dKiYgCFljGmdlcK.', NULL, NULL, 'ณัฐนนท์', 'พลอยหวังบุญ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:50', '2022-05-16 08:42:50'),
(84, NULL, '635020086-5', '$2y$10$ePj85AyGfX49t9yL0iCetuJJgs6yCnGtF70aICz95WGrNnI7YqoFC', NULL, NULL, 'แทนเทพ', 'คำอ่อน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:50', '2022-05-16 08:42:50'),
(85, NULL, '635020087-3', '$2y$10$oR8XtoZDX/bLI7rNOuPg0eREs4o.du0nEGquq8lVwuxqUA2sA9RZ.', NULL, NULL, 'พศิน', 'ขอบุญส่งเสริม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:50', '2022-05-16 08:42:50'),
(86, NULL, '645020032-9', '$2y$10$32cRqUexTpYRvW.AK9qs6u/F2//Ap5nGB9LuO.DHmXOtKupNm1uyW', NULL, NULL, 'วสวัตติ์', 'บึงกาญจนา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:50', '2022-05-16 08:42:50'),
(87, NULL, '645020066-2', '$2y$10$3YwvGACFk8IwVt7QFstBA.yO58EpJVQIb4Y8z/lRz8qlXfZV3hPbW', NULL, NULL, 'ณัฐพงษ์', 'วณิชวรนันท์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:51', '2022-05-16 08:42:51'),
(88, NULL, '645020081-6', '$2y$10$z/Ao2dqRRnc7n/1qFtFAce8SFLz6PlRuHqilShAcUvpIzA/O5OgP6', NULL, NULL, 'SOPHA', 'KHOEURT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:51', '2022-05-16 08:42:51'),
(89, NULL, '645020082-4', '$2y$10$eIqsw1xg8Zh6wz3wldt/3eKzlRoeygxo1iBoCPSIr5GnBw8.0kR4m', NULL, NULL, 'CHEN', 'SET KIM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:51', '2022-05-16 08:42:51'),
(90, NULL, '645020096-3', '$2y$10$O0nL0ZLga5q5l5zhVSgV5O8L7bAvbuiiN7Vf9O3qRypNygA7uKzlu', NULL, NULL, 'ปณต', 'ศรีนัครินทร์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:51', '2022-05-16 08:42:51'),
(91, NULL, '645020041-8 ', '$2y$10$v7zfmZw57hR6lGJ36ZHXvu1Tgw9LhDP5DMAyg6wyYTLzqWol9DAYy', NULL, NULL, 'อภิชัย', 'ศรีคุณแสน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:51', '2022-05-16 08:42:51'),
(92, NULL, '	645020040-0 ', '$2y$10$mAdY3Er4oZ1rfJavLupxW.9W5xGpAC8w3e5tfdDzRs9OFbgADcxe6', NULL, NULL, 'ภพปภพ', 'อื้อจรรยา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:52', '2022-05-16 08:42:52'),
(93, NULL, '645020038-7 ', '$2y$10$I7H6xCSKO7wtqlquuqG.MOnj1L54ejGKeK1P9goSgsuOD74k0jM9m', NULL, NULL, 'กรวิชญ์', 'ฟุ้งเฟื่อง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:52', '2022-05-16 08:42:52'),
(94, NULL, '645020072-7 ', '$2y$10$s4UaI.JakBD06.7H5IfLM.seuH1qXPT5KwHaMSpMXhuVz1u7JI3Pe', NULL, NULL, 'ยุทธพงศ์', 'มนัสทิพารมณ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:52', '2022-05-16 08:42:52'),
(95, NULL, '645020073-5 ', '$2y$10$YeJ43ZPF4rhLS5OwDWrUceNH9BrL8nnecMvNZgcv971aH9Wjnyzm.', NULL, NULL, 'ยุพารัตน์', 'นพคุณโพธิ์สว่าง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:52', '2022-05-16 08:42:52'),
(96, NULL, '645020074-3', '$2y$10$F.JSKDf2WF/PluGy52AosOHxlN1.bmRy9v2ZcOeUF6zAK7KN58kB2', NULL, NULL, 'ยุรฉัตร', 'เมธมุทา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:53', '2022-05-16 08:42:53'),
(97, NULL, '645020075-1', '$2y$10$2dvGbSNCLB5v9I8fmc4vtOvgbFRXfbZpj7C1XVX05nHcn6gbckWli', NULL, NULL, 'รัฐพล', 'สงวนตระกูล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:53', '2022-05-16 08:42:53'),
(98, NULL, '645020076-9', '$2y$10$dp1g4LpYehKQIzlekE1Vd.NKkJ.jYckJAaygSZ/TYIjNh/JK2oy6G', NULL, NULL, 'สุเมธ', 'ดวงมาลัย', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:53', '2022-05-16 08:42:53'),
(99, NULL, '645020087-4', '$2y$10$mVhyXUGz79C5vkD4o2nnVu5pB2kPjHubHJk20O5wkj/GXNxFUPoy2', NULL, NULL, 'ภูริวัฒน์', 'ดาษดา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:54', '2022-05-16 08:42:54'),
(100, NULL, '645020100-8', '$2y$10$jqEQY7kfExvP5v.xno9iwuiv6R2rWNk8LEUrbTVqhkErUHRa8C.JW', NULL, NULL, 'พงษ์ศิลป์', 'จั่นแก้ว', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:54', '2022-05-16 08:42:54'),
(101, NULL, '645020101-6', '$2y$10$h2zF0/1CSP7zOjYjIrbTbuv87KYDlPU4eJLn1J64.oJBP1HCh4WLG', NULL, NULL, 'หริภัทร', 'พงษ์สุวรรณ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-05-16 08:42:54', '2022-05-16 08:42:54'),
(102, NULL, '587020033-5', '$2y$10$BqT02ENSeLk/wF9IuF.RXOW49OeLtAaLhrWYlsXG0BLgTtdm79GWC', NULL, NULL, 'ณัฐวัตร', 'คำภักดี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:54', '2022-05-16 08:42:54'),
(103, NULL, '587020034-3', '$2y$10$v1ZJboPkAyQH5oP7m4ono.G/39RtaJgA3hORRNjW35CxY3qDbamn6', NULL, NULL, 'สุธาสินี', 'เอี่ยมสอาด', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:54', '2022-05-16 08:42:54'),
(104, NULL, '597020024-7', '$2y$10$Z9RgcIoPXIfnMmT69QdQkuLimxzAsSVdckpKqVzTeGU2zlu1A.n/S', NULL, NULL, 'คุณาวุฒิ', 'บุญกว้าง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:55', '2022-05-16 08:42:55'),
(105, NULL, '597020026-3', '$2y$10$/7gcCCfzQgh06BGFIqLi6uDDP6DyuYpvR2ky8lxnUEOjuWckXM0bm', NULL, NULL, 'นงค์นุช', 'ไพบูลย์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:55', '2022-05-16 08:42:55'),
(106, NULL, '597020027-1', '$2y$10$/Tmz9elDFDmcB.kpmX/TI.Jc/15jNo7aMHuzMOTYvXQCBbTkojpXG', NULL, NULL, 'วุฒิชัย', 'วิเชียรไชย', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:55', '2022-05-16 08:42:55'),
(107, NULL, '597020063-7', '$2y$10$QBo0u5km3UPiMANNU0RhDuv.xkbksXlZTyifGMpnlS6haJM9mEREK', NULL, NULL, 'จักรกฤษณ์', 'แก้วโยธา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:56', '2022-05-16 08:42:56'),
(108, NULL, '597020066-1', '$2y$10$9M4i1uHHu5T39bcltpWHYO65JfauGjzReRqDynQdLiaPiTQd4yeaS', NULL, NULL, 'LOAN HO', 'THI THUY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:56', '2022-05-16 08:42:56'),
(109, NULL, '597020067-9', '$2y$10$YhkRNWYWZla4OgST8uf2FeYRODY.RskTJDfv.83aenHubgxtcZbwW', NULL, NULL, 'SOVANNARITH', 'HENG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:56', '2022-05-16 08:42:56'),
(110, NULL, '597020082-3', '$2y$10$O6rVZYUmDSskDO4XY9ZqrOrqVWYJQ6EcMtQzSc9EYEK9mWReeMp3y', NULL, NULL, 'ภัทรพล', 'วันนา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:56', '2022-05-16 08:42:56'),
(111, NULL, '607020023-0', '$2y$10$0LdCq8Sm2fkD0cC1P2DuA.K2oZgXvPXpUT/gFe50ozbYDhLHUkioK', NULL, NULL, 'เกวลี', 'ผาใต้', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:57', '2022-05-16 08:42:57'),
(112, NULL, '607020024-8', '$2y$10$5OdsDXTlE7sf359wLexv8OlNHBGVzN3CQ.hLf7ctIynaUMYqf7GRG', 'Tidarat ', 'Luangrungruang', 'ธิดารัตน์', 'เหลืองรุ่งเรือง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:57', '2022-05-16 08:42:57'),
(113, NULL, '607020026-4', '$2y$10$fe3QJSSZt7LibYqQ.UWIJOiCIhtwIGq.Uvj8eQv.YxVwVIdbv4ZDu', NULL, NULL, 'อนัญญา', 'พรมโคตร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:57', '2022-05-16 08:42:57'),
(114, NULL, '607020029-8', '$2y$10$rl5fJG70Zx3OgX.QFm/bduw2oPuphkD6pu/7YjQx4qVsLWr9OZH9S', NULL, NULL, 'ชรินทร์ญา', 'หวังวัชรกุล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:57', '2022-05-16 08:42:57'),
(115, NULL, '607020031-1', '$2y$10$9zgUY4BdwNoSkphtmNH8Be8K.EIhpfetm2yQcyJMaeNVDn3E5egr6', NULL, NULL, 'สุรศักดิ์', 'ตั้งสกุล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:58', '2022-05-16 08:42:58'),
(116, NULL, '617020012-6', '$2y$10$xK.t8jDqfQKKFM/pc3ZSv.ixksohejTSKMCS0rlLjag2qH6ccyPuK', NULL, NULL, 'เสาวลักษณ์', 'ไทยกลาง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:58', '2022-05-16 08:42:58'),
(117, NULL, '617020014-2', '$2y$10$V6MP3e2IIEYOAwJwZ9KFEuV.aQQKX/Nqt3L/0KiLfHhoyABuaNqgS', NULL, NULL, 'พัชรนิกานต์', 'พงษ์ธนู', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:58', '2022-05-16 08:42:58'),
(118, NULL, '617020046-9', '$2y$10$ZP5Kra.IAA0UYjKqFLdJmeSXr/iI2NqXkJHEX6Sv5mv/9EfVrO8li', NULL, NULL, 'ปิยณัฐ', 'ศิริสวัสดิ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:58', '2022-05-16 08:42:58'),
(119, NULL, '617020047-7', '$2y$10$piw3l.bcwom24bclsFsT2OMkerkUigrnR5YK/chXln5hNFMbUSMIW', NULL, NULL, 'วุฒิชัย', 'โนนสาคู', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:59', '2022-05-16 08:42:59'),
(120, NULL, '617020049-3', '$2y$10$iqVCnp8w9SOycFLzwukr3OHQ69M6f08AVaIk/YGk3056g5MPbJKm.', NULL, NULL, 'NGUYEN', 'ANH NHAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:59', '2022-05-16 08:42:59'),
(121, NULL, '627020033-9', '$2y$10$d7AolD2xDTkyKSTy//npGeMVOiJ1Vh2Zi8LLpguxzRa3PKHQtJZdy', NULL, NULL, 'FLORENTINA', 'YUNI ARINI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:42:59', '2022-05-16 08:42:59'),
(122, NULL, '627020057-5', '$2y$10$GZE8NoV/POVSyyWzss5opOyFwqAi/dwpXozZ3wOkzC2tgYmDBziLa', NULL, NULL, 'ธนพล', 'ตั้งชูพงศ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:00', '2022-05-16 08:43:00'),
(123, NULL, '627020002-0', '$2y$10$czd5RBp24AlhDHnf/q.7Ye037bF81hVpcM57b2C7zJEoVTs3nEfs.', NULL, NULL, 'วรพจน์', 'สุวรรณภิภพ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:00', '2022-05-16 08:43:00'),
(124, NULL, '627020032-1', '$2y$10$ROPSR6fDi/cTmlgPe0rf/OGj7764ieBWNu6zxcBwkwbw95e7hvkhW', NULL, NULL, 'ชาติชาย', 'ปุณริบูรณ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:00', '2022-05-16 08:43:00'),
(125, NULL, '627020061-4', '$2y$10$KmiHdF1S3Tw4SP4voq0r2OZjXtGOiDgMyBgzVWpnhkoEqoiJDT.uW', NULL, NULL, 'จตุรภรณ์', 'โชคภูเขียว', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:00', '2022-05-16 08:43:00'),
(126, NULL, '627020062-2', '$2y$10$ft5vu9OqO5y/qRbcohIUHOrTEtbTuX717/O5x.E9taw8kbZZhYrUa', NULL, NULL, 'ปริวัฏฐ์', 'เหลืองสุวิมล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:01', '2022-05-16 08:43:01'),
(127, NULL, '637020013-6', '$2y$10$TvqHObgWsCNdtKNMRN53Qe860VaJcTAy7JCbI2a9Qmcbx6zs9KZTe', NULL, NULL, 'ชินาพัฒน์', 'สกุลราศรีสวย', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:01', '2022-05-16 08:43:01'),
(128, NULL, '647020010-3', '$2y$10$N9016WX4r7OVpJvP5QHiBuJLLwH.ZH83GulIk/DaCBMvEJqh6eBIC', NULL, NULL, 'SALEUMSOUK', 'SISANAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:02', '2022-05-16 08:43:02'),
(129, NULL, '647020019-5', '$2y$10$FKMTO1xK.Dd6IP2VlyzO6OpLPAggO8xryro1V9kjUE7kqxruKiHiW', NULL, NULL, 'นิกร', 'กรรณิกากลาง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:02', '2022-05-16 08:43:02'),
(130, NULL, '647020020-0', '$2y$10$B5pDmxVXzJuTkLQSz8k0oO9Ctzl5tHh5YCjtKXNlan.qzRINr6Fi.', NULL, NULL, 'ศราวุธ', 'ลิ้มประเสริฐ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:02', '2022-05-16 08:43:02'),
(131, NULL, '647020016-1', '$2y$10$pMc.kDzvRf/9wxV99hPDbubz9qjo0ppbDbfWBda59oeVb7XQVsuB6', NULL, NULL, 'ยอดยศ', 'ลิ้มรสธรรม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, '2022-05-16 08:43:02', '2022-05-16 08:43:02'),
(132, NULL, '605020076-5', '$2y$10$MdmlS7QD6/bVMTXBTK54xepCVGEl4kdM7XF46t1op4UMfT5QZVIJi', NULL, NULL, 'อธิชา', 'รายณะสุข', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:03', '2022-05-16 08:43:03'),
(133, NULL, '605020083-8', '$2y$10$40v2GjNKtad6Hdijg2LsUOKJxYKDFs9Bx1WFIL9hp7zOmFRW6kqha', NULL, NULL, 'อัศวโกวิท', 'พึ่งสุข', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:03', '2022-05-16 08:43:03'),
(134, NULL, '615020003-3', '$2y$10$yENnDg67ukXOKZcvKK65qu21rVSNNJ5nW9Uzpb.8zi0xTwxPGEoea', NULL, NULL, 'ภาวิดา', 'กมลคุณากร', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:03', '2022-05-16 08:43:03'),
(135, NULL, '615020004-1', '$2y$10$5EtWK0OaMSun1SDoIzs6Zu804li1VZ/LNpVhVX9H.hZbSvK7n/EAe', NULL, NULL, 'สุพัตรา', 'ภูมิแสน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:03', '2022-05-16 08:43:03'),
(136, NULL, '625020028-8', '$2y$10$51xETSLc6Djc.IPIk1bN0.yMISC63PA1Xi7oli4O4HtJd85PPIc4u', NULL, NULL, 'เชาว์วรรธน์', 'สิงห์ทอง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:04', '2022-05-16 08:43:04'),
(137, NULL, '635020017-4', '$2y$10$eGRxq8GlYCJ5JFjqdD8EveT9reMFScKnf5oQX5.ptj/VRBkXXpaPa', NULL, NULL, 'วริษฐา', 'สิทธิไพบูลย์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:04', '2022-05-16 08:43:04'),
(138, NULL, '635020029-7', '$2y$10$0Ao9wBHzLzPPA2iInKoWu.4H2EZd11c5deR0zQiHw1AQK5mwgL0xq', NULL, NULL, 'พันแสง', 'แพงวังทอง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:04', '2022-05-16 08:43:04'),
(139, NULL, '635020025-5', '$2y$10$hVKPQMPupT9fjN3lTdMIPuw9yNvAhoY5XiH73WozSO5.kC2Lq1phy', NULL, NULL, 'ยุวเรศ', 'หลุดพา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:04', '2022-05-16 08:43:04'),
(140, NULL, '587020064-4', '$2y$10$9njl9lkWtFzRNo2Sum5rS.z8Uklc/QnresDSkhx4WrS9M4Ie1rNvi', NULL, NULL, 'ศรัณย์', 'อภิชนตระกูล', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:05', '2022-05-16 08:43:05'),
(141, NULL, '637020001-3', '$2y$10$DUM0OJy9b.GzbSxGOw8.3eh5ukYqobqlP0tt8p445PG1UtgKXxDjS', NULL, NULL, 'ไชยฤทธิ์', 'เศวตวงษ์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:05', '2022-05-16 08:43:05'),
(142, NULL, '637020007-1', '$2y$10$z1vZWxcBL7BhU5.lIGY.d.4bSE2MWcGNX1ANB74if6PEfRxmEWyb6', NULL, NULL, 'วุฒิพงษ์', 'แสงมณี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-05-16 08:43:05', '2022-05-16 08:43:05'),
(143, NULL, '635020083-1', '$2y$10$PotxjF7EkiIJ8Ut97KEmeub8.R7PbFW/M4JGbYU1T7njwYgiTW7wq', NULL, NULL, 'จุฑารัตน์', 'โคตรภูเวียง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:05', '2022-05-16 08:43:05'),
(144, NULL, '635020093-8', '$2y$10$6HB0.Ga/Jp34OaM3yS..PuU8q4w61wkrzFn0bzeSU9Q9gtJj/rWC6', NULL, NULL, 'SHERLY', 'VALENTINA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:06', '2022-05-16 08:43:06'),
(145, NULL, '645020020-6', '$2y$10$18vKHPGMpYPjvMAmJe9wTOoDUF0fBLq584lyj43kkmdOqYcuMoSKK', NULL, NULL, 'พีรดนย์', 'สุขเกษม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:06', '2022-05-16 08:43:06'),
(146, NULL, '645020033-7', '$2y$10$DJFvFZNjM0O8fw4hHOhHguTTg00BeT31A0oTqwkWXfgIVM/R3hDSO', NULL, NULL, 'จิราวุฒิ', 'ผิวพันคำ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:06', '2022-05-16 08:43:06'),
(147, NULL, '645020034-5', '$2y$10$cIJXRqLuXc4GcemiEi.spuQ3gQGySARVFE.CIaUPCQC2cZGNv2AbC', NULL, NULL, 'พิทยา', 'ศิริปการ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:06', '2022-05-16 08:43:06'),
(148, NULL, '645020035-3', '$2y$10$1Ruc0GHhaen7D0oYa/aoHegkGn.pUR.dHQalL1K5bXjrLEf.863ui', NULL, NULL, 'วุฒิไกร', 'พิมพ์หล่อ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:07', '2022-05-16 08:43:07'),
(149, NULL, '645020036-1', '$2y$10$nDRg/Ri5x4H1Gu7DX00HOOWX2EslcgVvVDvZe8Qs0yoLG6DTAxk8O', NULL, NULL, 'อัครวรรษ', 'หมั้นทรัพย์', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:07', '2022-05-16 08:43:07'),
(150, NULL, '645020084-0', '$2y$10$DlV9jdXE2nLkYORW9USOo.iltSOPGLt01FaBQxR0toZYHUkFbpETW', NULL, NULL, 'RAKSMEY', 'PHANN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-05-16 08:43:07', '2022-05-16 08:43:07'),
(151, 'satikr@kku.ac.th', NULL, '', 'Satit', 'Kravenkit', 'สาธิต', 'กระเวนกิจ', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. ', 'ผศ. ดร.', 'นาย', 'Mr.', 'satit.jpg', NULL, NULL, 8, NULL, '2025-02-07 08:11:06', '2025-02-07 08:11:06'),
(152, 'isoonkan@kku.ac.th', NULL, '', 'Isoon', 'Kanjanasurat', 'ไอศูรย์', 'กาญจนสุรัตน์', 'Ph.D.', 'Assistant Professor', 'ผู้ช่วยศาสตราจารย์', 'Asst. Prof. ', 'ผศ. ดร.', 'นาย', 'Mr.', 'isoon.jpg', NULL, NULL, 8, NULL, '2025-02-07 08:13:44', '2025-02-07 08:13:44'),
(153, 'pobda@kku.ac.th', NULL, '', 'Pobporn', 'Danvirutai', 'พบพร', 'ด่านวิรุทัย', NULL, 'Lecturer', 'อาจารย์', NULL, 'อ. ดร.', NULL, NULL, 'pobporn.jpg', NULL, NULL, 1, NULL, '2025-02-07 08:14:02', '2025-02-07 08:14:02'),
(154, 'jakkritk@kku.ac.th', NULL, '', 'Jakkrit', 'Kaewyotha', 'จักรกฤษณ์', 'แก้วโยธา', 'Ph.D.', 'Lecturer', 'อาจารย์', NULL, 'อ. ดร.', 'นาย', 'Mr.', 'jakkrit.jpg', NULL, NULL, 8, NULL, '2025-02-07 08:16:08', '2025-02-07 08:16:08'),
(155, 'arfatkhan@kku.ac.th', NULL, '', 'Arfat Ahmad', 'Khan', NULL, NULL, 'Ph.D.', 'Lecturer', 'อาจารย์', NULL, 'อ. ดร.', NULL, 'Mr.', 'arfat.jpg', NULL, NULL, 7, NULL, '2025-02-07 08:17:25', '2025-02-07 08:17:25'),
(156, 'wannad@kku.ac.th', NULL, '', 'Wanchaloem', 'Nadda', 'วันเฉลิม', 'นัดดา', 'Ph.D.', 'Lecturer', 'อาจารย์', NULL, 'อ. ดร.', 'นาย', 'Mr.', 'wanchaloem.jpg', NULL, NULL, 1, NULL, '2025-02-07 08:18:22', '2025-02-07 08:18:22'),
(157, 'putklang_w@kku.ac.th', NULL, '', 'Wasana', 'Putklang', 'วาสนา', 'พุฒกลาง', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Dr.', 'อ. ดร.', NULL, NULL, 'wasana.jpg', NULL, NULL, 3, NULL, '2025-02-07 08:19:39', '2025-02-07 08:19:39'),
(158, 'pakamu@kku.ac.th', NULL, '', 'Pakarat', 'Musikawan', 'ภัคราช', 'มุสิกะวัน', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Dr.', 'อ. ดร.', 'นาย', 'Mr.', 'pakarat.jpg', NULL, NULL, 7, NULL, '2025-02-07 08:20:33', '2025-02-07 08:20:33'),
(159, 'yaniko@kku.ac.th', NULL, '', 'Yanika', 'Kongsorot', 'ญานิกา', 'คงโสรส', 'Ph.D.', 'Lecturer', 'อาจารย์', 'Dr.', 'อ. ดร.', NULL, NULL, 'yanika.jpg', NULL, NULL, 7, NULL, '2025-02-07 08:21:23', '2025-02-07 08:21:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_program_id_foreign` (`program_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
