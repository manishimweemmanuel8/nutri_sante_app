-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2021 at 11:57 AM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrcgom_nutrisante`
--
CREATE DATABASE IF NOT EXISTS `nutrcgom_nutrisante` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nutrcgom_nutrisante`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `shop` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `active`, `shop`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Nutrition', 'super@nutrition.com', '$2y$10$mSBp0UJ3I8Buzxl9uB.zF.ioyRARO8ehuty89wtRboNPAiM6JlNia', 1, 'no', NULL, '2020-05-03 07:42:53', '2020-06-10 00:38:49'),
(19, 'Receptionist', 'receptionist@gmail.com', '$2y$10$5n8qD9n5usHS7/PZKTHbWuzLRWDcjELpiNmpjIh0TyHJh1rkl2662', 1, NULL, NULL, '2021-07-09 11:45:26', '2021-07-09 11:45:42'),
(20, 'Doctor', 'doctor@gmail.com', '$2y$10$TBkKkJzurLk9miGdWjxYMefPQeD/PrBS9MuTPbABi2XCHSSVqtppS', 1, NULL, NULL, '2021-07-09 11:46:51', '2021-07-09 11:47:00'),
(21, 'Uwajeneza Mbangutse Hélène', 'uwajenezaholi@gmail.com', '$2y$10$zzMViYLoIv0XLfamkN9nlOPDGvAOP01AaRr68piFBwbrd2iyfiqaK', 1, NULL, NULL, '2021-07-12 18:37:50', '2021-07-12 18:38:49'),
(22, 'Rose Muhayimana', 'nutrisanterwanda@gmail.com', '$2y$10$QJ8qWrGHEq.xDyePP.cyHO7wl2dTQOwCP1VyC.TcTL9bjT0D6Dzy.', 1, NULL, NULL, '2021-07-12 18:46:29', '2021-07-12 18:47:00'),
(23, 'mfiteyesu leah', 'specialeah@gmail.com', '$2y$10$5Cohw158l6otmGDNrMQgXeftFXuBrONWFb5RGhX5R4uhk.vupuwbi', 1, NULL, NULL, '2021-07-12 19:22:38', '2021-07-12 19:23:44'),
(25, 'Umulisa Claudine', 'chloe.umulisa@gmail.com', '$2y$10$NjR4.fnt5A6xh5WEcbBD3OXSRz1G8VEMkf0PdPhMwhyW2UPyq0xpS', 1, NULL, 'VJUcUb1nej4cm05XjjEtwL4YjRKIlfAXKA3Dhrm7Xno5jreKBJ5NhmejFD2l', '2021-09-28 20:52:52', '2021-09-28 20:53:30'),
(26, 'Philemon Kwizera', 'philkwizera@gmail.com', '$2y$10$jNiBntnTC.MGFDVO0gxZ8.fHTbVbKm0iUOtQlEP6Tl1nqq4yP4C9K', 1, NULL, '2UAyL7tibclzClF7pykBpZF9geOaXRMjcdK28SA6pMV9BvoRCc7t897VoYEq', '2021-09-28 20:55:42', '2021-09-28 20:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permission`
--

CREATE TABLE `admin_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `role_id`, `admin_id`) VALUES
(1, 1, 1),
(22, 20, 19),
(23, 19, 20),
(25, 1, 22),
(26, 19, 23),
(28, 19, 25),
(29, 19, 21),
(30, 19, 26);

-- --------------------------------------------------------

--
-- Table structure for table `after_preparations`
--

CREATE TABLE `after_preparations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `preparation_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `missing` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `after_productions`
--

CREATE TABLE `after_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `missing` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `customer`, `phone`, `date`, `time`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'personne', '07846363452625', '2020-06-10', '10:00:00', 'MUHAYIMANA Marie Rose', '2020-06-10 07:04:50', '2021-02-16 07:04:28', '2021-02-16 07:04:28'),
(10, 'UMUBYEYI Jeanne', '0788651266', '2020-07-10', '07:17:00', 'Mfiteyesu Leah', '2020-06-10 07:17:01', '2021-02-16 07:04:23', '2021-02-16 07:04:23'),
(11, 'UMUBYEYI Jeanne', '0788651266', '2020-07-10', '07:24:00', 'Mfiteyesu Leah', '2020-06-10 07:24:38', '2021-02-16 07:04:17', '2021-02-16 07:04:17'),
(12, 'uwurukundo nadine', '0788486409', '2020-11-04', '16:00:00', 'Receptionist', '2020-11-02 13:59:33', '2021-02-16 07:04:11', '2021-02-16 07:04:11'),
(13, 'kalisa olivier', '0781194127', '2020-12-02', '14:07:00', 'Mfiteyesu Leah', '2020-11-02 14:07:13', '2021-02-16 07:03:52', '2021-02-16 07:03:52'),
(14, 'murenzi jean', '0781123234', '2020-11-17', '17:20:00', 'mukundwangendo  valerie', '2020-11-02 15:18:58', '2021-02-16 07:03:58', '2021-02-16 07:03:58'),
(15, 'ZIGAMA Jean', '0788654325', '2020-12-02', '15:22:00', 'mukundwangendo  valerie', '2020-11-02 15:22:10', '2021-02-16 07:04:05', '2021-02-16 07:04:05'),
(16, 'murenzi jean', '0788574596', '2021-02-18', '11:07:00', 'Receptionist', '2021-02-16 07:08:37', '2021-02-16 07:10:32', NULL),
(17, 'test app', '0781194127', '2021-02-17', '14:10:00', 'Receptionist', '2021-02-16 07:10:57', '2021-02-16 07:11:04', '2021-02-16 07:11:04'),
(18, 'test customer one', '0781194127', '2021-03-16', '11:55:00', 'doctor', '2021-02-16 09:55:18', '2021-07-13 17:04:20', '2021-07-13 17:04:20'),
(19, 'manishimwe emmanuel new', '0781194129', '2021-04-04', '06:41:00', 'Receptionist doctor', '2021-03-04 04:41:06', '2021-03-04 04:41:06', NULL),
(20, 'munyakazi sadate', '0781194127', '2021-07-19', '10:00:00', 'Receptionist', '2021-07-09 11:52:46', '2021-07-09 11:52:46', NULL),
(21, 'customer for test', '0781123654', '2021-08-09', '07:55:00', 'Doctor', '2021-07-09 11:55:57', '2021-07-13 17:04:27', '2021-07-13 17:04:27'),
(22, 'customer for test', '0781123654', '2021-08-09', '07:58:00', 'Doctor', '2021-07-09 11:58:43', '2021-07-13 17:04:33', '2021-07-13 17:04:33'),
(23, 'customer for test', '0781123654', '2021-08-12', '20:07:00', 'Doctor', '2021-07-13 00:07:43', '2021-07-13 00:07:43', NULL),
(24, 'Pascal', '0784213843', '2021-07-14', '10:00:00', 'Uwajeneza Mbangutse Hélène', '2021-07-13 16:41:44', '2021-07-13 16:41:44', NULL),
(25, 'umuclient', '0785830948', '2021-08-13', '09:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:01:12', '2021-08-11 18:01:12', NULL),
(26, '0783176272', '078316272', '2021-08-12', '10:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:42:22', '2021-08-11 18:42:22', NULL),
(27, 'immaculle', '0788518437', '2021-08-12', '14:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:43:43', '2021-08-11 18:43:43', NULL),
(28, 'consultation', '0782614682', '2021-08-13', '11:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:44:45', '2021-08-11 18:44:45', NULL),
(29, 'umucient', '078530948', '2021-08-13', '09:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:48:40', '2021-08-11 18:48:40', NULL),
(30, 'adeline', '0788578229', '2021-08-23', '15:00:00', 'Uwajeneza Mbangutse Hélène', '2021-08-11 18:50:00', '2021-08-11 18:50:00', NULL),
(31, 'Mukabukuru Goreth', '0788836101', '2021-11-01', '08:47:00', 'Doctor', '2021-10-01 12:47:33', '2021-10-01 12:47:33', NULL),
(32, 'Customer test', '0781194127', '2021-11-01', '11:18:00', 'Doctor', '2021-10-01 15:18:14', '2021-10-01 15:18:14', NULL),
(33, 'test customer one', '0781194127', '2021-11-04', '08:12:00', 'Super Nutrition', '2021-10-04 12:12:51', '2021-10-04 12:12:51', NULL),
(34, 'test customer one', '0781194127', '2021-11-04', '08:44:00', 'Umulisa Claudine', '2021-10-04 12:44:03', '2021-10-04 12:44:03', NULL),
(35, 'test customer one', '0781194127', '2021-11-04', '09:03:00', 'Umulisa Claudine', '2021-10-04 13:03:47', '2021-10-04 13:03:47', NULL),
(36, 'test customer one', '0781194127', '2021-11-04', '17:06:00', 'Philemon Kwizera', '2021-10-04 21:06:31', '2021-10-04 21:06:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cunsultations`
--

CREATE TABLE `cunsultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `associated_deseases` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `ct_munda` double DEFAULT NULL,
  `ct_ukuboko` double NOT NULL,
  `food_to_eat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_to_reduce` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_to_avoid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bad_nutritional_Att` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmi` double NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cunsultations`
--

INSERT INTO `cunsultations` (`id`, `customer_id`, `user_id`, `associated_deseases`, `reason`, `blood_type`, `weight`, `height`, `ct_munda`, `ct_ukuboko`, `food_to_eat`, `food_to_reduce`, `food_to_avoid`, `bad_nutritional_Att`, `medication`, `taget`, `payment_id`, `bmi`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 10, 'doctor', 'none', 'new reason for all', 'AB', 70, 1.75, 32, 15, 'vegetables', 'meat', 'eggs', 'none', 'hypertension', '80', '20', 22.857142857142858, NULL, '2021-02-16 09:52:48', '2021-10-04 21:06:31', NULL),
(18, 11, 'doctor', 'none', 'none', 'A', 61, 1.78, 32, 15, NULL, NULL, NULL, NULL, NULL, NULL, '21', 19.252619618735007, NULL, '2021-02-24 04:48:38', '2021-02-24 04:48:38', NULL),
(19, 12, 'Receptionist doctor', 'slfhgslk;', 'ewt', 'O', 61, 1.78, 103, 15, 'sddgaf', 'dgafha', 'sfgah', 'asfha', 'sfgsdfg', '75', '22', 19.252619618735007, NULL, '2021-03-04 04:38:16', '2021-03-04 04:41:05', NULL),
(20, 13, 'Doctor', 'diabate', 'None', 'O', 70, 1.78, 32, 15, 'sdfa', 'sdfa', 'asdfa', 'adsfa', 'adfa', '70', '23', 22.093170054286073, NULL, '2021-07-09 11:55:39', '2021-07-09 11:55:57', NULL),
(21, 13, 'Doctor', 'diabate', 'None', 'O', 61, 1.78, 103, 15, 'gddf', 'asga', 'agsdf', 'gdsfg', 'dfgsdf', '70', '24', 19.252619618735007, NULL, '2021-07-09 11:58:27', '2021-07-13 00:07:43', NULL),
(22, 26, 'Doctor', 'none', 'Increate my weight', 'A', 89, 1.75, 32, 15, 'food to eat', 'food to reduce', 'food to avoid', 'bad nutritional att', 'medication', 'ideal weight', '31', 29.06122448979592, NULL, '2021-10-01 12:40:08', '2021-10-01 12:47:33', NULL),
(23, 30, 'Doctor', 'None', 'OK', 'O', 61, 1.78, 32, 15, 'Food to eat', 'Food to reduce', 'Food to avoid', 'Bad nutritional att', 'Medication', '70', '32', 19.252619618735007, NULL, '2021-10-01 15:17:26', '2021-10-01 15:18:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `maritial_Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `names`, `sex`, `dob`, `maritial_Status`, `occupation`, `email`, `country`, `district_id`, `sector_id`, `phone_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'test customer one', 'male', '1993-02-14', 'single', 'nothing', 'manishimweemmanuel8@gmail.com', 'Rwanda', '20', '254', '0781194127', '2021-02-16 05:45:00', '2021-02-16 06:15:15', NULL),
(11, 'test customer two', 'male', '2021-02-16', 'single', NULL, NULL, NULL, NULL, NULL, '0781194128', '2021-02-16 06:48:43', '2021-02-16 06:48:43', NULL),
(12, 'manishimwe emmanuel new', 'male', '2003-03-02', 'single', 'it', 'receptionistdoctor@gmail.com', 'Rwanda', '17', NULL, '0781194129', '2021-03-04 04:21:30', '2021-03-04 04:21:30', NULL),
(13, 'customer for test', 'male', '2000-01-09', 'married', 'software developer', 'info@inezaflowers.rw', 'Rwanda', '3', NULL, '0781123654', '2021-07-09 11:49:38', '2021-07-09 11:51:28', NULL),
(14, 'Rose', 'female', '2021-05-12', 'married', NULL, NULL, 'Rwanda', '2', NULL, '0788888888', '2021-07-12 19:03:14', '2021-07-12 19:03:14', NULL),
(15, 'Uwimpeta ernestine', 'female', '2021-07-13', 'single', NULL, NULL, 'Rwanda', NULL, NULL, '0788491682', '2021-07-13 16:36:14', '2021-07-13 16:36:14', NULL),
(16, 'Murekeyisoni immaculle', 'female', '2021-07-15', 'single', NULL, NULL, 'Rwanda', '24', NULL, '0787138150', '2021-07-15 17:22:55', '2021-07-15 17:22:55', NULL),
(17, 'Kayitesi pamela', 'female', '2021-07-15', 'single', NULL, NULL, 'Rwanda', NULL, NULL, '0783069442', '2021-07-15 17:26:30', '2021-07-15 17:26:30', NULL),
(18, 'Macarena anastase', 'male', '2021-07-15', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788307176', '2021-07-15 17:33:10', '2021-07-15 17:33:10', NULL),
(19, 'Chinese alice', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788556412', '2021-07-16 11:53:10', '2021-07-16 11:53:10', NULL),
(20, 'Mukakarangwa corette', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788706584', '2021-07-16 11:55:31', '2021-07-16 11:55:31', NULL),
(21, 'Munyangeyo karene', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0780465433', '2021-07-16 11:58:50', '2021-07-16 11:58:50', NULL),
(22, 'Karukwiza Dinah', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '078846543', '2021-07-16 12:00:31', '2021-07-16 12:00:31', NULL),
(23, 'Perusi', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788434904', '2021-07-16 12:02:49', '2021-07-16 12:02:49', NULL),
(24, 'Presea', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '078888888', '2021-07-16 12:05:07', '2021-07-16 12:05:07', NULL),
(25, 'Ngabire josiane', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0785009623', '2021-07-16 12:06:21', '2021-07-16 12:06:21', NULL),
(26, 'Mukabukuru Goreth', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788836101', '2021-07-16 12:07:37', '2021-07-16 12:07:37', NULL),
(27, 'Umuhoza christine', 'female', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0788293515', '2021-07-16 12:09:43', '2021-07-16 12:09:43', NULL),
(28, 'Niyoniringira j.pierre', 'male', '2021-07-16', 'married', NULL, NULL, 'Rwanda', NULL, NULL, '0783333569', '2021-07-16 12:12:13', '2021-07-16 12:12:13', NULL),
(29, 'Mafaranga anastasi', 'male', '2021-08-03', 'married', NULL, NULL, 'Rwanda', '3', NULL, '0788307176', '2021-08-03 19:03:13', '2021-08-03 19:03:13', NULL),
(30, 'Customer test', 'male', '1983-01-01', 'married', 'Nothing', 'customertest@gmail.com', 'Rwanda', '2', NULL, '0781194127', '2021-10-01 15:14:36', '2021-10-01 15:14:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivers`
--

CREATE TABLE `delivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `province_id`) VALUES
(1, 'Nyarugenge', 1),
(2, 'Gasabo', 1),
(3, 'Kicukiro', 1),
(4, 'Nyanza', 2),
(5, 'Gisagara', 2),
(6, 'Nyaruguru', 2),
(7, 'Huye', 2),
(8, 'Nyamagabe', 2),
(9, 'Ruhango', 2),
(10, 'Muhanga', 2),
(11, 'Kamonyi', 2),
(12, 'Karongi', 3),
(13, 'Rutsiro', 3),
(14, 'Rubavu', 3),
(15, 'Nyabihu', 3),
(16, 'Ngororero', 3),
(17, 'Rusizi', 3),
(18, 'Nyamasheke', 3),
(19, 'Rulindo', 4),
(20, 'Gakenke', 4),
(21, 'Musanze', 4),
(22, 'Burera', 4),
(23, 'Gicumbi', 4),
(24, 'Rwamagana', 5),
(25, 'Nyagatare', 5),
(26, 'Gatsibo', 5),
(27, 'Kayonza', 5),
(28, 'Kirehe', 5),
(29, 'Ngoma', 5),
(30, 'Bugesera', 5);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `file` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `doctor` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `finalproducts`
--

CREATE TABLE `finalproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supply_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supply_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_06_023521_create_admins_table', 1),
(4, '2017_03_06_053834_create_admin_role_table', 1),
(5, '2018_03_06_023523_create_roles_table', 1),
(6, '2019_12_01_120121_create_permissions_table', 1),
(7, '2019_12_01_163205_create_permission_role_table', 1),
(8, '2019_12_01_163233_create_admin_permission_table', 1),
(9, '2020_03_24_193025_create_customers_table', 1),
(10, '2020_03_24_193047_create_cunsultations_table', 1),
(11, '2020_03_24_193108_create_nutrition_table', 1),
(12, '2020_03_24_193212_create_production_stores_table', 1),
(13, '2020_03_24_193239_create_product_stores_table', 1),
(14, '2020_03_24_193313_create_payments_table', 1),
(15, '2020_03_24_195937_create_product__requests_table', 1),
(16, '2020_03_28_203236_create_products_table', 1),
(17, '2020_03_28_205233_create_districts_table', 1),
(18, '2020_03_28_205251_create_sectors_table', 1),
(19, '2020_03_28_205301_create_cells_table', 1),
(20, '2020_03_30_150157_create_delivers_table', 1),
(21, '2020_04_02_172322_create_stock_buckups_table', 1),
(22, '2020_04_02_174500_create_shop_buckups_table', 1),
(23, '2020_04_07_163159_create_appointments_table', 1),
(24, '2020_05_07_123139_create_finalproducts_table', 2),
(25, '2020_05_07_144942_create_rowproducts_table', 2),
(26, '2020_05_11_132503_create_preparations_table', 2),
(27, '2020_05_11_132715_create_after_preparations_table', 2),
(28, '2020_05_11_132730_create_after_productions_table', 2),
(29, '2020_05_11_132736_create_productions_table', 2),
(30, '2020_05_11_132826_create_stocks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cunsultation_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `count` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT 'start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `user_id`, `amount`, `count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 10, 'Receptionist', 11000, '1', 'finish', '2021-02-16 06:55:40', '2021-07-09 11:50:09', '2021-07-09 11:50:09'),
(21, 11, 'Receptionist doctor', 11000, '1', 'finish', '2021-02-16 10:04:03', '2021-08-11 18:50:49', '2021-08-11 18:50:49'),
(22, 12, 'Receptionist doctor', 11000, '1', 'finish', '2021-03-04 04:32:33', '2021-07-12 19:09:10', '2021-07-12 19:09:10'),
(23, 13, 'Receptionist', 11000, '1', 'finish', '2021-07-09 11:49:58', '2021-08-11 18:50:59', '2021-08-11 18:50:59'),
(24, 13, 'Receptionist', 5000, '2', 'finish', '2021-07-09 11:50:32', '2021-08-11 18:51:07', '2021-08-11 18:51:07'),
(25, 13, 'Receptionist', 3000, '3', 'start', '2021-07-09 11:50:51', '2021-07-12 18:27:25', '2021-07-12 18:27:25'),
(26, 13, 'Receptionist', 3000, '4', 'start', '2021-07-09 11:51:02', '2021-08-11 18:51:23', '2021-08-11 18:51:23'),
(27, 14, 'Uwajeneza Mbangutse Hélène', 11000, '1', 'start', '2021-07-12 19:07:13', '2021-08-11 18:51:32', '2021-08-11 18:51:32'),
(28, 14, 'Uwajeneza Mbangutse Hélène', 5000, '2', 'start', '2021-07-12 19:10:15', '2021-08-11 18:51:48', '2021-08-11 18:51:48'),
(29, 15, 'Uwajeneza Mbangutse Hélène', 11000, '1', 'start', '2021-07-13 16:37:25', '2021-08-11 18:52:00', '2021-08-11 18:52:00'),
(30, 15, 'Uwajeneza Mbangutse Hélène', 11000, '2', 'start', '2021-07-13 16:38:08', '2021-08-11 18:52:12', '2021-08-11 18:52:12'),
(31, 26, 'Uwajeneza Mbangutse Hélène', 11000, '1', 'finish', '2021-08-11 17:27:22', '2021-10-01 12:40:08', NULL),
(32, 30, 'Receptionist', 11000, '1', 'finish', '2021-10-01 15:16:30', '2021-10-01 15:17:26', NULL),
(33, 10, 'Super Nutrition', 11000, '1', 'start', '2021-10-04 12:10:03', '2021-10-04 12:10:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'CreateAdmin', 'Admin', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(2, 'CreateRole', 'Role', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(3, 'ReadAdmin', 'Admin', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(4, 'ReadRole', 'Role', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(5, 'UpdateAdmin', 'Admin', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(6, 'UpdateRole', 'Role', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(7, 'DeleteAdmin', 'Admin', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(8, 'DeleteRole', 'Role', '2020-05-03 07:42:53', '2020-05-03 07:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `preparations`
--

CREATE TABLE `preparations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_product_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `after_preparation_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_stores`
--

CREATE TABLE `production_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `after_production_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `stock` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 'Brown Sugar/3000', 'stocker', NULL, NULL, NULL),
(28, 'Brown Sugar/3500', 'stocker', NULL, NULL, NULL),
(29, 'Polichi bio', 'stocker', NULL, NULL, NULL),
(30, 'Polichi/500gr', 'stocker', NULL, NULL, NULL),
(31, 'Polichi/1000gr', 'stocker', NULL, NULL, NULL),
(32, 'Sesame oil', 'stocker', NULL, NULL, NULL),
(33, 'Colza', 'stocker', NULL, NULL, NULL),
(34, 'FURTURE', 'stocker', NULL, NULL, NULL),
(35, 'Soja oil/5L', 'stocker', NULL, NULL, NULL),
(36, 'Soja oil/1L', 'stocker', NULL, NULL, NULL),
(37, 'Huile d.arachide', 'stocker', NULL, NULL, NULL),
(38, 'Olive oil/ 15500', 'stocker', NULL, NULL, NULL),
(39, 'Olive oil/12500', 'stocker', NULL, NULL, NULL),
(40, 'Olive oil positive/11000', 'stocker', NULL, NULL, NULL),
(41, 'Olive oil Positive/6500', 'stocker', NULL, NULL, NULL),
(42, 'Olive consul 1L/8000', 'stocker', NULL, NULL, NULL),
(43, 'Olive  1L/14000', 'stocker', NULL, NULL, NULL),
(44, 'Olive oil/ 5500', 'stocker', NULL, NULL, NULL),
(45, 'olive oil/3000', 'stocker', NULL, NULL, NULL),
(46, 'Macadamia Oil', 'stocker', NULL, NULL, NULL),
(47, 'Beurre de Qualite', 'stocker', NULL, NULL, NULL),
(48, 'Coconut Oil/kwisiga', 'stocker', NULL, NULL, NULL),
(49, 'Coconut Oil/Guteka', 'stocker', NULL, NULL, NULL),
(50, 'Vinaigre', 'stocker', NULL, NULL, NULL),
(51, 'Gensing', 'stocker', NULL, NULL, NULL),
(52, 'Sezame idaseye', 'stocker', NULL, NULL, NULL),
(53, 'Sezame iseye', 'stocker', NULL, NULL, NULL),
(54, 'Ibumba ry\'icyatsi', 'stocker', NULL, NULL, NULL),
(55, 'Ibumba ry\'umweru', 'stocker', NULL, NULL, NULL),
(56, 'Molinga y\'ibibabi', 'stocker', NULL, NULL, NULL),
(57, 'Soja tea 100gr', 'stocker', NULL, NULL, NULL),
(58, 'Soja tea 200gr', 'stocker', NULL, NULL, NULL),
(59, 'Amakara manini', 'stocker', NULL, NULL, NULL),
(60, 'Amakara mato', 'stocker', NULL, NULL, NULL),
(61, 'cinamoni', 'stocker', NULL, NULL, NULL),
(62, 'Igisura/poudre', 'stocker', NULL, NULL, NULL),
(63, 'Igisura/feuille', 'stocker', NULL, NULL, NULL),
(64, 'Basmati/2500', 'stocker', NULL, NULL, NULL),
(65, 'Brown Rice', 'stocker', NULL, NULL, NULL),
(66, 'camomile 3700', 'stocker', NULL, NULL, NULL),
(67, 'Camomille 4000', 'stocker', NULL, NULL, NULL),
(68, 'Fenouil', 'stocker', NULL, NULL, NULL),
(69, 'Nil ntoya', 'stocker', NULL, NULL, NULL),
(70, 'Nil nini', 'stocker', NULL, NULL, NULL),
(71, 'amazi mato inyange', 'stocker', NULL, NULL, NULL),
(72, 'Couscous', 'stocker', NULL, NULL, NULL),
(73, 'Vervaine', 'stocker', NULL, NULL, NULL),
(74, 'Digestive/2000', 'stocker', NULL, NULL, NULL),
(75, 'Digestive/2500', 'stocker', NULL, NULL, NULL),
(76, 'Imvange/1500', 'stocker', NULL, NULL, NULL),
(77, 'Raisin/4000', 'stocker', NULL, NULL, NULL),
(78, 'Raisin/2000', 'stocker', NULL, NULL, NULL),
(79, 'ibihwagari', 'stocker', NULL, NULL, NULL),
(80, 'Vergerette', 'stocker', NULL, NULL, NULL),
(81, 'Noix de cajoux', 'stocker', NULL, NULL, NULL),
(82, 'Isambaza', 'stocker', NULL, NULL, NULL),
(83, 'Ubuki/6000', 'stocker', NULL, NULL, NULL),
(84, 'Cyayi cyayi', 'stocker', NULL, NULL, NULL),
(85, 'Rice-semoule', 'stocker', NULL, NULL, NULL),
(86, 'Ibishyimbo/Kinyobwa', 'stocker', NULL, NULL, NULL),
(87, 'Ibishyimbo/Colta', 'stocker', NULL, NULL, NULL),
(88, 'Ubugali', 'stocker', NULL, NULL, NULL),
(89, 'Igikapu 500', 'stocker', NULL, NULL, NULL),
(90, 'Igikapu 600', 'stocker', NULL, NULL, NULL),
(91, 'Brown rice Flour', 'stocker', NULL, NULL, NULL),
(92, 'Slimming Green Tea', 'stocker', NULL, NULL, NULL),
(93, 'Organic Green Tea', 'stocker', NULL, NULL, NULL),
(94, 'Green Tea ordinaire', 'stocker', NULL, NULL, NULL),
(95, 'inzuzi zidaseye', 'stocker', NULL, NULL, NULL),
(96, 'Agatambaro', 'stocker', NULL, NULL, NULL),
(97, 'CURRY P.', 'stocker', NULL, NULL, NULL),
(98, 'Thym', 'stocker', NULL, NULL, NULL),
(99, 'Assiette idongo', 'stocker', NULL, NULL, NULL),
(100, 'Assiette milimani', 'stocker', NULL, NULL, NULL),
(101, 'confiture/ananas', 'stocker', NULL, NULL, NULL),
(102, 'confiture/arachide 250 gr', 'stocker', NULL, NULL, NULL),
(103, 'confiture/arachide 500 gr', 'stocker', NULL, NULL, NULL),
(104, 'Confiture/sezame', 'stocker', NULL, NULL, NULL),
(105, 'Noix ce Madacadamia Grille', 'stocker', NULL, NULL, NULL),
(106, 'Brown y\'umugati', 'stocker', NULL, NULL, NULL),
(107, 'Catheline', 'stocker', NULL, NULL, NULL),
(108, 'Sunflower oil 5l', 'stocker', NULL, NULL, NULL),
(109, 'Sunflower oil 1l', 'stocker', NULL, NULL, NULL),
(110, 'Spririna', 'stocker', NULL, NULL, NULL),
(111, 'Chia 500 gr', 'stocker', NULL, NULL, NULL),
(112, 'Chia 150 gr', 'stocker', NULL, NULL, NULL),
(113, 'Semoule. 2000', 'stocker', NULL, NULL, NULL),
(114, 'Ubunyobwa bukaranze', 'stocker', NULL, NULL, NULL),
(115, 'Olive Jambo', 'stocker', NULL, NULL, NULL),
(116, 'Basmati/2700', 'stocker', NULL, NULL, NULL),
(117, 'ubuki 500 gr', 'stocker', NULL, NULL, NULL),
(118, 'ifu y\'índagara', 'stocker', NULL, NULL, NULL),
(119, 'Olive Froid', 'stocker', NULL, NULL, NULL),
(120, 'Coconut kwisiga Nini', 'stocker', NULL, NULL, NULL),
(121, 'Spaghetti', 'stocker', NULL, NULL, NULL),
(122, 'Vervaine et Mente', 'stocker', NULL, NULL, NULL),
(123, 'Soja milk liquide', 'stocker', NULL, NULL, NULL),
(124, 'Polichi carton', 'stocker', NULL, NULL, NULL),
(125, 'Vinaigre nto', 'stocker', NULL, NULL, NULL),
(126, 'Macadamia butter', 'stocker', NULL, NULL, NULL),
(127, 'Slimming Green Tea/2000', 'stocker', NULL, NULL, NULL),
(128, 'Mint', 'stocker', NULL, NULL, NULL),
(129, 'Sage', 'stocker', NULL, NULL, NULL),
(130, 'test products', 'stocker', '2020-06-10 01:20:24', '2020-06-10 01:20:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stores`
--

CREATE TABLE `product_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product__requests`
--

CREATE TABLE `product__requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__requests`
--

INSERT INTO `product__requests` (`id`, `product_id`, `quantity`, `status`, `shop_user`, `storage_user`, `shop`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, '52', 5.00, 'Pending', 'Mukamugema Judith', NULL, 'shop one', '2020-06-10 07:41:30', '2020-06-10 07:41:30', NULL),
(12, '27', 10.00, 'Pending', 'Mukamugema Judith', NULL, 'shop one', '2020-06-10 07:42:10', '2020-06-10 07:42:10', NULL),
(13, '31', 10.00, 'Pending', 'Mukamugema Judith', NULL, 'shop one', '2020-06-10 07:42:36', '2020-06-10 07:42:36', NULL),
(14, '42', 6.00, 'Pending', 'Mukamugema Judith', NULL, 'shop one', '2020-06-10 07:42:52', '2020-06-10 07:42:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super', '2020-05-03 07:42:53', '2020-05-03 07:42:53'),
(19, 'doctor', '2020-05-03 08:30:54', '2020-05-03 08:30:54'),
(20, 'receptionist', '2020-05-03 08:31:07', '2020-05-03 08:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `rowproducts`
--

CREATE TABLE `rowproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supply_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supply_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `district_id`) VALUES
(1, 'Gitega', 1),
(2, 'Kanyinya', 1),
(3, 'Kigali', 1),
(4, 'Kimisagara', 1),
(5, 'Mageragere', 1),
(6, 'Muhima', 1),
(7, 'Nyakabanda', 1),
(8, 'Nyamirambo', 1),
(9, 'Nyarugenge', 1),
(10, 'Rwezamenyo', 1),
(11, 'Bumbogo', 2),
(12, 'Gatsata', 2),
(13, 'Gikomero', 2),
(14, 'Gisozi', 2),
(15, 'Jabana', 2),
(16, 'Jali', 2),
(17, 'Kacyiru', 2),
(18, 'Kimihurura', 2),
(19, 'Kimironko', 2),
(20, 'Kinyinya', 2),
(21, 'Ndera', 2),
(22, 'Nduba', 2),
(23, 'Remera', 2),
(24, 'Rusororo', 2),
(25, 'Rutunga', 2),
(26, 'Gahanga', 3),
(27, 'Gatenga', 3),
(28, 'Gikondo', 3),
(29, 'Kagarama', 3),
(30, 'Kanombe', 3),
(31, 'Kicukiro', 3),
(32, 'Kigarama', 3),
(33, 'Masaka', 3),
(34, 'Niboye', 3),
(35, 'Nyarugunga', 3),
(36, 'Busasamana', 4),
(37, 'Busoro', 4),
(38, 'Cyabakamyi', 4),
(39, 'Kibilizi', 4),
(40, 'Kigoma', 4),
(41, 'Mukingo', 4),
(42, 'Muyira', 4),
(43, 'Ntyazo', 4),
(44, 'Nyagisozi', 4),
(45, 'Rwabicuma', 4),
(46, 'Gikonko', 5),
(47, 'Gishubi', 5),
(48, 'Kansi', 5),
(49, 'Kibirizi', 5),
(50, 'Kigembe', 5),
(51, 'Mamba', 5),
(52, 'Muganza', 5),
(53, 'Mugombwa', 5),
(54, 'Mukindo', 5),
(55, 'Musha', 5),
(56, 'Ndora', 5),
(57, 'Nyanza', 5),
(58, 'Save', 5),
(59, 'Busanze', 6),
(60, 'Cyahinda', 6),
(61, 'Kibeho', 6),
(62, 'Kivu', 6),
(63, 'Mata', 6),
(64, 'Muganza', 6),
(65, 'Munini', 6),
(66, 'Ngera', 6),
(67, 'Ngoma', 6),
(68, 'Nyabimata', 6),
(69, 'Nyagisozi', 6),
(70, 'Ruheru', 6),
(71, 'Ruramba', 6),
(72, 'Rusenge', 6),
(73, 'Gishamvu', 7),
(74, 'Huye', 7),
(75, 'Karama', 7),
(76, 'Kigoma', 7),
(77, 'Kinazi', 7),
(78, 'Maraba', 7),
(79, 'Mbazi', 7),
(80, 'Mukura', 7),
(81, 'Ngoma', 7),
(82, 'Ruhashya', 7),
(83, 'Rusatira', 7),
(84, 'Rwaniro', 7),
(85, 'Simbi', 7),
(86, 'Tumba', 7),
(87, 'Buruhukiro', 8),
(88, 'Cyanika', 8),
(89, 'Gasaka', 8),
(90, 'Gatare', 8),
(91, 'Kaduha', 8),
(92, 'Kamegeri', 8),
(93, 'Kibirizi', 8),
(94, 'Kibumbwe', 8),
(95, 'Kitabi', 8),
(96, 'Mbazi', 8),
(97, 'Mugano', 8),
(98, 'Musange', 8),
(99, 'Musebeya', 8),
(100, 'Mushubi', 8),
(101, 'Nkomane', 8),
(102, 'Tare', 8),
(103, 'Uwinkingi', 8),
(104, 'Bweramana', 9),
(105, 'Byimana', 9),
(106, 'Kabagali', 9),
(107, 'Kinazi', 9),
(108, 'Kinihira', 9),
(109, 'Mbuye', 9),
(110, 'Mwendo', 9),
(111, 'Ntongwe', 9),
(112, 'Ruhango', 9),
(113, 'Cyeza', 10),
(114, 'Kabacuzi', 10),
(115, 'Kibangu', 10),
(116, 'Kiyumba', 10),
(117, 'Muhanga', 10),
(118, 'Mushishiro', 10),
(119, 'Nyabinoni', 10),
(120, 'Nyamabuye', 10),
(121, 'Nyarusange', 10),
(122, 'Rongi', 10),
(123, 'Rugendabari', 10),
(124, 'Shyogwe', 10),
(125, 'Gacurabwenge', 11),
(126, 'Karama', 11),
(127, 'Kayenzi', 11),
(128, 'Kayumbu', 11),
(129, 'Mugina', 11),
(130, 'Musambira', 11),
(131, 'Ngamba', 11),
(132, 'Nyamiyaga', 11),
(133, 'Nyarubaka', 11),
(134, 'Rugarika', 11),
(135, 'Rukoma', 11),
(136, 'Runda', 11),
(137, 'Bwishyura', 12),
(138, 'Gashari', 12),
(139, 'Gishyita', 12),
(140, 'Gitesi', 12),
(141, 'Mubuga', 12),
(142, 'Murambi', 12),
(143, 'Murundi', 12),
(144, 'Mutuntu', 12),
(145, 'Rubengera', 12),
(146, 'Rugabano', 12),
(147, 'Ruganda', 12),
(148, 'Rwankuba', 12),
(149, 'Twumba', 12),
(150, 'Boneza', 13),
(151, 'Gihango', 13),
(152, 'Kigeyo', 13),
(153, 'Kivumu', 13),
(154, 'Manihira', 13),
(155, 'Mukura', 13),
(156, 'Murunda', 13),
(157, 'Musasa', 13),
(158, 'Mushonyi', 13),
(159, 'Mushubati', 13),
(160, 'Nyabirasi', 13),
(161, 'Ruhango', 13),
(162, 'Rusebeya', 13),
(163, 'Bugeshi', 14),
(164, 'Busasamana', 14),
(165, 'Cyanzarwe', 14),
(166, 'Gisenyi', 14),
(167, 'Kanama', 14),
(168, 'Kanzenze', 14),
(169, 'Mudende', 14),
(170, 'Nyakiriba', 14),
(171, 'Nyamyumba', 14),
(172, 'Nyundo', 14),
(173, 'Rubavu', 14),
(174, 'Rugerero', 14),
(175, 'Bigogwe', 15),
(176, 'Jenda', 15),
(177, 'Jomba', 15),
(178, 'Kabatwa', 15),
(179, 'Karago', 15),
(180, 'Kintobo', 15),
(181, 'Mukamira', 15),
(182, 'Muringa', 15),
(183, 'Rambura', 15),
(184, 'Rugera', 15),
(185, 'Rurembo', 15),
(186, 'Shyira', 15),
(187, 'BWIRA', 16),
(188, 'GATUMBA', 16),
(189, 'HINDIRO', 16),
(190, 'KABAYA', 16),
(191, 'KAGEYO', 16),
(192, 'KAVUMU', 16),
(193, 'MATYAZO', 16),
(194, 'MUHANDA', 16),
(195, 'MUHORORO', 16),
(196, 'NDARO', 16),
(197, 'NGORORERO', 16),
(198, 'NYANGE', 16),
(199, 'SOVU', 16),
(200, 'Bugarama', 17),
(201, 'Butare', 17),
(202, 'Bweyeye', 17),
(203, 'Gashonga', 17),
(204, 'Giheke', 17),
(205, 'Gihundwe', 17),
(206, 'Gikundamvura', 17),
(207, 'Gitambi', 17),
(208, 'Kamembe', 17),
(209, 'Muganza', 17),
(210, 'Mururu', 17),
(211, 'Nkanka', 17),
(212, 'Nkombo', 17),
(213, 'Nkungu', 17),
(214, 'Nyakabuye', 17),
(215, 'Nyakarenzo', 17),
(216, 'Nzahaha', 17),
(217, 'Rwimbogo', 17),
(218, 'Bushekeri', 18),
(219, 'Bushenge', 18),
(220, 'Cyato', 18),
(221, 'Gihombo', 18),
(222, 'Kagano', 18),
(223, 'Kanjongo', 18),
(224, 'Karambi', 18),
(225, 'Karengera', 18),
(226, 'Kirimbi', 18),
(227, 'Macuba', 18),
(228, 'Mahembe', 18),
(229, 'Nyabitekeri', 18),
(230, 'Rangiro', 18),
(231, 'Ruharambuga', 18),
(232, 'Shangi', 18),
(233, 'BASE', 19),
(234, 'BUREGA', 19),
(235, 'BUSHOKI', 19),
(236, 'BUYOGA', 19),
(237, 'CYINZUZI', 19),
(238, 'CYUNGO', 19),
(239, 'KINIHIRA', 19),
(240, 'KISARO', 19),
(241, 'MASORO', 19),
(242, 'MBOGO', 19),
(243, 'MURAMBI', 19),
(244, 'NGOMA', 19),
(245, 'NTARABANA', 19),
(246, 'RUKOZO', 19),
(247, 'RUSIGA', 19),
(248, 'SHYORONGI', 19),
(249, 'TUMBA', 19),
(250, 'Busengo', 20),
(251, 'Coko', 20),
(252, 'Cyabingo', 20),
(253, 'Gakenke', 20),
(254, 'Gashenyi', 20),
(255, 'Janja', 20),
(256, 'Kamubuga', 20),
(257, 'Karambo', 20),
(258, 'Kivuruga', 20),
(259, 'Mataba', 20),
(260, 'Minazi', 20),
(261, 'Mugunga', 20),
(262, 'Muhondo', 20),
(263, 'Muyongwe', 20),
(264, 'Muzo', 20),
(265, 'Nemba', 20),
(266, 'Ruli', 20),
(267, 'Rusasa', 20),
(268, 'Rushashi', 20),
(269, 'Busogo', 21),
(270, 'Cyuve', 21),
(271, 'Gacaca', 21),
(272, 'Gashaki', 21),
(273, 'Gataraga', 21),
(274, 'Kimonyi', 21),
(275, 'Kinigi', 21),
(276, 'Muhoza', 21),
(277, 'Muko', 21),
(278, 'Musanze', 21),
(279, 'Nkotsi', 21),
(280, 'Nyange', 21),
(281, 'Remera', 21),
(282, 'Rwaza', 21),
(283, 'Shingiro', 21),
(284, 'Bungwe', 22),
(285, 'Butaro', 22),
(286, 'Cyanika', 22),
(287, 'Cyeru', 22),
(288, 'Gahunga', 22),
(289, 'Gatebe', 22),
(290, 'Gitovu', 22),
(291, 'Kagogo', 22),
(292, 'Kinoni', 22),
(293, 'Kinyababa', 22),
(294, 'Kivuye', 22),
(295, 'Nemba', 22),
(296, 'Rugarama', 22),
(297, 'Rugendabari', 22),
(298, 'Ruhunde', 22),
(299, 'Rusarabuye', 22),
(300, 'Rwerere', 22),
(301, 'Bukure', 23),
(302, 'Bwisige', 23),
(303, 'Byumba', 23),
(304, 'Cyumba', 23),
(305, 'Giti', 23),
(306, 'Kageyo', 23),
(307, 'Kaniga', 23),
(308, 'Manyagiro', 23),
(309, 'Miyove', 23),
(310, 'Mukarange', 23),
(311, 'Muko', 23),
(312, 'Mutete', 23),
(313, 'Nyamiyaga', 23),
(314, 'Nyankenke', 23),
(315, 'Rubaya', 23),
(316, 'Rukomo', 23),
(317, 'Rushaki', 23),
(318, 'Rutare', 23),
(319, 'Ruvune', 23),
(320, 'Rwamiko', 23),
(321, 'Shangasha', 23),
(322, 'Fumbwe', 24),
(323, 'Gahengeri', 24),
(324, 'Gishali', 24),
(325, 'Karenge', 24),
(326, 'Kigabiro', 24),
(327, 'Muhazi', 24),
(328, 'Munyaga', 24),
(329, 'Munyiginya', 24),
(330, 'Musha', 24),
(331, 'Muyumbu', 24),
(332, 'Mwulire', 24),
(333, 'Nyakaliro', 24),
(334, 'Nzige', 24),
(335, 'Rubona', 24),
(336, 'GATUNDA', 25),
(337, 'KARAMA', 25),
(338, 'KARANGAZI', 25),
(339, 'KATABAGEMU', 25),
(340, 'KIYOMBE', 25),
(341, 'MATIMBA', 25),
(342, 'MIMURI', 25),
(343, 'MUKAMA', 25),
(344, 'MUSHERI', 25),
(345, 'NYAGATARE', 25),
(346, 'RUKOMO', 25),
(347, 'RWEMPASHA', 25),
(348, 'RWIMIYAGA', 25),
(349, 'TABAGWE', 25),
(350, 'Gasange', 26),
(351, 'Gatsibo', 26),
(352, 'Gitoki', 26),
(353, 'Kabarore', 26),
(354, 'Kageyo', 26),
(355, 'Kiramuruzi', 26),
(356, 'Kiziguro', 26),
(357, 'Muhura', 26),
(358, 'Murambi', 26),
(359, 'Ngarama', 26),
(360, 'Nyagihanga', 26),
(361, 'Remera', 26),
(362, 'Rugarama', 26),
(363, 'Rwimbogo', 26),
(364, 'Gahini', 27),
(365, 'Kabare', 27),
(366, 'Kabarondo', 27),
(367, 'Mukarange', 27),
(368, 'Murama', 27),
(369, 'Murundi', 27),
(370, 'Mwiri', 27),
(371, 'Ndego', 27),
(372, 'Nyamirama', 27),
(373, 'Rukara', 27),
(374, 'Ruramira', 27),
(375, 'Rwinkwavu', 27),
(376, 'Gahara', 28),
(377, 'Gatore', 28),
(378, 'Kigarama', 28),
(379, 'Kigina', 28),
(380, 'Kirehe', 28),
(381, 'Mahama', 28),
(382, 'Mpanga', 28),
(383, 'Musaza', 28),
(384, 'Mushikiri', 28),
(385, 'Nasho', 28),
(386, 'Nyamugari', 28),
(387, 'Nyarubuye', 28),
(388, 'Gashanda', 29),
(389, 'Jarama', 29),
(390, 'Karembo', 29),
(391, 'Kazo', 29),
(392, 'Kibungo', 29),
(393, 'Mugesera', 29),
(394, 'Murama', 29),
(395, 'Mutenderi', 29),
(396, 'Remera', 29),
(397, 'Rukira', 29),
(398, 'Rukumberi', 29),
(399, 'Rurenge', 29),
(400, 'Sake', 29),
(401, 'Zaza', 29),
(402, 'Gashora', 30),
(403, 'Juru', 30),
(404, 'Kamabuye', 30),
(405, 'Mareba', 30),
(406, 'Mayange', 30),
(407, 'Musenyi', 30),
(408, 'Mwogo', 30),
(409, 'Ngeruka', 30),
(410, 'Ntarama', 30),
(411, 'Nyamata', 30),
(412, 'Nyarugenge', 30),
(413, 'Ririma', 30),
(414, 'Ruhuha', 30),
(415, 'Rweru', 30),
(416, 'Shyara', 30);

-- --------------------------------------------------------

--
-- Table structure for table `shop_buckups`
--

CREATE TABLE `shop_buckups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `after_preparation_id` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_buckups`
--

CREATE TABLE `stock_buckups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `after_production_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_permission`
--
ALTER TABLE `admin_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permission_admin_id_permission_id_unique` (`admin_id`,`permission_id`),
  ADD KEY `admin_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `after_preparations`
--
ALTER TABLE `after_preparations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `after_productions`
--
ALTER TABLE `after_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cunsultations`
--
ALTER TABLE `cunsultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivers`
--
ALTER TABLE `delivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalproducts`
--
ALTER TABLE `finalproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition`
--
ALTER TABLE `nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_name_index` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_role_role_id_permission_id_unique` (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `preparations`
--
ALTER TABLE `preparations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_stores`
--
ALTER TABLE `production_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stores`
--
ALTER TABLE `product_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__requests`
--
ALTER TABLE `product__requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `rowproducts`
--
ALTER TABLE `rowproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_buckups`
--
ALTER TABLE `shop_buckups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_buckups`
--
ALTER TABLE `stock_buckups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin_permission`
--
ALTER TABLE `admin_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `after_preparations`
--
ALTER TABLE `after_preparations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `after_productions`
--
ALTER TABLE `after_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cunsultations`
--
ALTER TABLE `cunsultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `delivers`
--
ALTER TABLE `delivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finalproducts`
--
ALTER TABLE `finalproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nutrition`
--
ALTER TABLE `nutrition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `preparations`
--
ALTER TABLE `preparations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_stores`
--
ALTER TABLE `production_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `product_stores`
--
ALTER TABLE `product_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product__requests`
--
ALTER TABLE `product__requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rowproducts`
--
ALTER TABLE `rowproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `shop_buckups`
--
ALTER TABLE `shop_buckups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_buckups`
--
ALTER TABLE `stock_buckups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_permission`
--
ALTER TABLE `admin_permission`
  ADD CONSTRAINT `admin_permission_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
