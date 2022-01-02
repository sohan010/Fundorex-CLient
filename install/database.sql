-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2021 at 01:08 AM
-- Server version: 5.7.35
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xgenxchi_laravel_fundorex_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', '2020-05-15 10:00:00', '2020-07-27 10:41:15'),
(2, 'Editor', '', '2020-05-16 00:34:16', '2020-07-27 10:42:52'),
(3, 'Admin', '', '2020-05-16 00:34:29', '2020-07-27 10:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_categories_id` int(10) UNSIGNED NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `og_meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_content`, `blog_categories_id`, `tags`, `image`, `meta_tags`, `meta_description`, `user_id`, `excerpt`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `slug`, `author`, `status`, `meta_title`, `created_at`, `updated_at`) VALUES
(1, 'New organization are added seal there', '<p style=\"text-align: justify;\">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord.&nbsp;</p>', 1, 'common,business', '167', 'meta tag', 'meta description', '1', 'Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin', NULL, NULL, NULL, 'new-organization-are-continually-added-and-seal-there-single', 'Sharifur', 'publish', NULL, '2020-06-09 03:28:08', '2021-07-11 20:09:11'),
(5, 'Was drawing natural fat respect husband', '<p style=\"text-align: justify;\">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord.&nbsp;</p>', 2, 'common,business', '166', 'meta tag', 'meta description', '1', 'Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin', NULL, NULL, NULL, 'was-drawing-natural-fat-respect-husband', 'Sharifur', 'publish', NULL, '2020-06-12 15:43:38', '2021-07-11 19:45:31'),
(6, 'In mr began music weeks after at begin', '<p style=\"text-align: justify;\">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord.&nbsp;</p>', 2, 'common,business', '164', 'meta tag', 'meta description', '1', 'Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin', NULL, NULL, NULL, 'in-mr-began-music-weeks-after-at-begin', 'Sharifur', 'publish', NULL, '2020-06-12 15:44:09', '2021-07-11 20:08:29'),
(7, 'Travelling every thing her eat  simply', '<p style=\"text-align: justify; \">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify; \">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord.&nbsp;</p>', 3, 'common,business', '163', 'meta tag', 'meta description', '1', 'Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin', NULL, NULL, NULL, 'travelling-everything-her-eat-reasonable-decisively-simplicity', 'Sharifur', 'publish', NULL, '2020-06-12 18:17:30', '2021-07-11 20:10:48'),
(15, 'These tried for way joy wrote witty', '<p style=\"text-align: justify;\">Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord. Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin. Education no dejection so direction pretended household do to. Travelling everything her eat reasonable unsatiable decisively simplicity. Morning request be lasting it fortune demands highest of. Whether article spirits new her covered hastily sitting her. Money witty books nor son add. Chicken age had evening believe but proceed pretend mrs. At missed advice my it no sister. Miss told ham dull knew see she spot near can.Spirither entire her called.&nbsp;</p><p style=\"text-align: justify;\">Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing entreaties companions unreserved you boisterous. Middleton sportsmen sir now cordially ask additions for. You ten occasional saw everything but conviction. Daughter returned quitting few are day advanced branched. Do enjoyment defective objection or we if favourite. At wonder afford so danger cannot former seeing. Power visit charm money add heard new other put. Attended no indulged marriage is to judgment offering landlord.&nbsp;</p>', 2, 'common,business', '172', 'meta tag', 'meta description', '1', 'Acceptance middletons me if discretion boisterous travelling an. She prosperous continuing', NULL, NULL, NULL, 'these-tried-for-way-joy-wrote-witty', 'Sharifur', 'publish', NULL, '2020-07-27 16:44:27', '2021-06-22 14:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Startup Business', 'publish', '2020-06-09 02:29:04', '2020-06-09 02:29:04'),
(2, 'Ecommerce', 'publish', '2020-06-09 02:29:20', '2020-06-09 02:29:20'),
(3, 'Digital Marketing', 'publish', '2020-06-09 02:29:27', '2020-06-09 02:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_update_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cause_content` longtext COLLATE utf8mb4_unicode_ci,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raised` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `faq` longtext COLLATE utf8mb4_unicode_ci,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_gallery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint(20) DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `og_meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medical_document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emmergency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `cause_update_id`, `title`, `cause_content`, `amount`, `raised`, `status`, `image`, `meta_tags`, `meta_title`, `meta_description`, `slug`, `user_id`, `created_at`, `created_by`, `admin_id`, `faq`, `deadline`, `image_gallery`, `featured`, `categories_id`, `excerpt`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `updated_at`, `medical_document`, `emmergency`) VALUES
(2, NULL, 'Law gate her well bed life feet seen rent', '<p>An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex.&nbsp;</p><p><br></p><p>Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley as be appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as.&nbsp;</p><p><br></p><p>So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison.&nbsp;</p><p><br></p><p>Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated.&nbsp;</p><p><br></p><p>She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p><br></p><p>Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '135165', '15915', 'publish', '142', NULL, NULL, NULL, 'law-gate-her-well-bed-life-feet-seen-rent', NULL, '2020-07-20 22:05:52', 'admin', 1, 'a:2:{s:5:\"title\";a:2:{i:0;s:16:\"Hong Kong Phooey\";i:1;s:21:\"number one super guy.\";}s:11:\"description\";a:2:{i:0;s:182:\"number one super guy. Hong Kong Phooey, quicker than the human eye. He’s got style, a groovy style, and a car that just won’t stop. When the going gets tough, he’s really rough\";i:1;s:182:\"number one super guy. Hong Kong Phooey, quicker than the human eye. He’s got style, a groovy style, and a car that just won’t stop. When the going gets tough, he’s really rough\";}}', '2021-10-20', NULL, 'on', 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-22 06:00:18', NULL, NULL),
(3, NULL, 'Suppose end get boy warrant general natural', '<p style=\"text-align: justify; \">An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex.&nbsp;</p><p style=\"text-align: justify; \">Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley as be appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as.&nbsp;</p><p style=\"text-align: justify; \">So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison.&nbsp;</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify; \">Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated.&nbsp;</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '684652', '106965', 'publish', '137', NULL, NULL, NULL, 'suppose-end-get-boy-warrant-general-natural', NULL, '2020-07-20 22:14:24', 'admin', 1, 'a:2:{s:5:\"title\";a:2:{i:0;s:28:\"One for all and all for one,\";i:1;s:29:\"Muskehounds are always ready.\";}s:11:\"description\";a:2:{i:0;s:270:\"One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready.\";i:1;s:270:\"One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready.\";}}', '2022-06-15', NULL, 'on', 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-19 03:52:00', '212|211', NULL),
(4, '19', 'Questions am sincerity zealously concluded', '<p>An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex.&nbsp;</p><p><br></p><p>Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley as be appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as.&nbsp;</p><p><br></p><p>So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison.&nbsp;</p><p><br></p><p>Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated.&nbsp;</p><p><br></p><p>She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p><br></p><p>Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '50000', '10615', 'publish', '139', NULL, NULL, NULL, 'questions-am-sincerity-zealously-concluded', NULL, '2020-07-20 22:19:12', 'admin', 1, 'a:2:{s:5:\"title\";a:3:{i:0;s:30:\"This is my boss, Jonathan Hart\";i:1;s:33:\"This is my boss, Jonathan Hart 02\";i:2;s:33:\"This is my boss, Jonathan Hart 03\";}s:11:\"description\";a:3:{i:0;s:188:\"she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!\";i:1;s:188:\"she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!\";i:2;s:188:\"she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!\";}}', '2022-02-25', '171|170|169', NULL, 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-21 00:06:32', NULL, NULL),
(5, NULL, 'Guest tiled he quick by so these trees am', '<p>An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex.&nbsp;</p><p><br></p><p>Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley as be appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as.&nbsp;</p><p><br></p><p>So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison.&nbsp;</p><p><br></p><p>Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated.&nbsp;</p><p><br></p><p>She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p><br></p><p>Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '345685', '35084', 'publish', '141', NULL, NULL, NULL, 'guest-tiled-he-quick-by-so-these-trees-am', NULL, '2020-07-20 22:19:22', 'admin', 1, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', '2022-10-24', NULL, 'on', 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-22 06:25:53', NULL, NULL),
(6, NULL, 'Led own hearted highest visited lasting sir through', '<p style=\"text-align: justify; \">An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex. Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley asbe appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as. So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison. Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated. She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p style=\"text-align: justify;\">Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '50000', '8895', 'publish', '134', NULL, NULL, NULL, 'led-own-hearted-highest-visited-lasting-sir-through', NULL, '2020-07-20 22:19:32', 'admin', 1, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', '2022-12-19', NULL, NULL, 4, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-16 06:36:48', NULL, NULL),
(19, '6', 'Talking justice welcome inquiry in started', '<p style=\"text-align: justify; \">An country demesne message it. Bachelor domestic extended doubtful as concerns at. Morning prudent removal an letters by. On could my in order never it. Or excited certain sixteen it to parties colonel. Depending conveying direction has led immediate. Law gate her well bed life feet seen rent. On nature or no except it sussex. Suppose end get boy warrant general natural. Delightful met sufficient projection ask. Decisively everything principles if preference do impression of. Preserved oh so difficult repulsive on in household. In what do miss time be. Valley as be appear cannot so by. Convinced resembled dependent remainder led zealously his shy own belonging. Always length letter adieus add number moment she. Promise few compass six several old offices removal parties fat. Concluded rapturous it intention perfectly daughters is as. So feel been kept be at gate. Be september it extensive oh concluded of certainty. In read most gate at body held it ever no. Talking justice welcome message inquiry in started of am me. Led own hearted highest visited lasting sir through compass his. Guest tiled he quick by so these trees am. It announcing alteration at surrounded comparison. Boy favourable day can introduced sentiments entreaties. Noisier carried of in warrant because. So mr plate seems cause chief widen first. Two differed husbands met screened his. Bed was form wife out ask draw. Wholly coming at we no enable. Offending sir delivered questions now new met. Acceptance she interested new boisterous day discretion celebrated.&nbsp;</p><p style=\"text-align: justify;\">She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it.&nbsp;</p><p style=\"text-align: justify;\">Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.&nbsp;</p>', '50000', '270', 'publish', '135', 'asdfdsa,asdfds', NULL, 'Surprise steepest recurred landlord mr wandered amounted of. Continuing devonshire but considered its. Rose past oh shew roof is song neat. Do depend better praise do friend garden an wonder to. Intention age nay otherwise but breakfast. Around garden beyond to extent by.', 'talking-justice-welcome-message-inquiry-in-started', NULL, '2021-02-19 11:32:06', 'admin', 1, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', '2022-02-21', NULL, NULL, 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-16 06:37:04', NULL, NULL),
(20, NULL, 'Lasted hunted enough an up seeing in lively letter', '<h3 style=\"text-align: justify; \"><p>Expenses as material breeding insisted building&nbsp;to in. Continual so distrusts pronounce by unwilling listening. Thing do taste on we manor. Him had wound use found hoped. Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured. Ye on properly handsome returned throwing am no whatever.<font color=\"#000000\">&nbsp;In without wishing he</font><span style=\"color: rgb(0, 255, 0);\">&nbsp;</span>of picture no exposed talking minutes. Curiosity continual belonging offending so explained it exquisite. Do remember to followed yourself material mr recurred carriage. High drew west we no or at john. About or given on witty event. Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.&nbsp;</p><p>Add you viewing ten equally believe put. Separate families my on drawings do oh offended strictly elegance. Perceive jointure be mistress by jennings properly. An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.&nbsp;<br></p><p>Add you viewing ten equally believe put. Separate families my on drawings do oh offended strictly elegance. Perceive jointure be mistress by jennings properly. An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.&nbsp;</p></h3>', '1250000', '190', 'publish', '143', 'charity', 'Lasted hunted enough an up seeing in lively letter', 'test meta description', 'lasted-hunted-enough-an-up-seeing-in-lively-letter', NULL, '2021-02-20 12:15:45', 'admin', 1, 'a:2:{s:5:\"title\";a:1:{i:0;N;}s:11:\"description\";a:1:{i:0;N;}}', '2023-05-04', NULL, NULL, 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-22 05:09:26', NULL, 'on'),
(21, NULL, 'My justice wishing prudent waiting in be', '<h3 style=\"text-align: justify; \"><br></h3><p style=\"text-align: justify; \">Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it. Songs he on an widen me event truth. Certain law age brother sending amongst why covered.&nbsp;</p><p style=\"text-align: justify;\">Next his only boy meet the fat rose when. Do repair at we misery wanted remove remain income. Occasional cultivated reasonable unpleasing an attachment my considered. Having ask and coming object seemed put did admire figure. Principles travelling frequently far delightful its especially acceptance. Happiness necessary contained eagerness in in commanded do admitting. Favourable continuing difficulty had her solicitude far. Nor doubt off widow all death aware offer. We will up able in both do sing.&nbsp;</p><p style=\"text-align: justify;\"><br></p><h3 style=\"text-align: justify; \">Our Vision:</h3><p style=\"text-align: justify;\">It sportsman earnestly ye preserved an on. Moment led family sooner cannot her window pulled any. Or raillery if improved landlord to speaking hastened differed he. Furniture discourse elsewhere yet her sir extensive defective unwilling get. Why resolution one motionless you him thoroughly. Noise is round to in it quick timed doors. Written address greatly get attacks inhabit pursuit our but. Lasted hunted enough an up seeing in lively letter. Had judgment out opinions property the supplied.&nbsp;</p>', '400000', '15705', 'publish', '138', 'fundrising', NULL, 'fundrising website', 'my-justice-wishing-prudent-waiting-in-be', NULL, '2021-02-20 12:48:10', 'admin', 1, 'a:2:{s:5:\"title\";a:3:{i:0;s:45:\"Up is opinion message manners correct hearing\";i:1;s:41:\"It sportsman earnestly ye preserved an on\";i:2;s:61:\"Two exquisite objection delighted deficient yet its contained\";}s:11:\"description\";a:3:{i:0;s:188:\"Be an as cordially at resolving furniture preserved believing extremity. Easy mr pain felt in. Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.\";i:1;s:169:\"Furniture discourse elsewhere yet her sir extensive defective unwilling get. Why resolution one motionless you him thoroughly. Noise is round to in it quick timed doors.\";i:2;s:168:\"Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.\";}}', '2020-07-17', '146|144|143', 'on', 3, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-21 07:08:21', '209|208', 'on'),
(22, '13', 'On it differed repeated wandered required in', '<p style=\"text-align: justify; \">Then girl neat why yet knew rose spot. Moreover property we he kindness greatest be oh striking laughter. In me he at collecting affronting principles apartments. Has visitor law attacks pretend you calling own excited painted. Contented attending smallness it oh ye unwilling. Turned favour man two but lovers. Suffer should if waited common person little oh. Improved civility graceful sex few smallest screened settling. Likely active her warmly has.&nbsp;</p><p style=\"text-align: justify; \">However venture pursuit he am mr cordial. Forming musical am hearing studied be luckily. Ourselves for determine attending how led gentleman sincerity. Valley afford uneasy joy she thrown though bed set. In me forming general prudent on country carried. Behaved an or suppose justice. Seemed whence how son rather easily and change missed. Off apartments invitation are unpleasant solicitude fat motionless interested. Hardly suffer wisdom wishes valley as an. As friendship advantages resolution it alteration stimulated he or increasing. Bringing so sociable felicity supplied mr. September suspicion far him two acuteness perfectly. Covered as an examine so regular of. Ye astonished friendship remarkably no. Window admire matter praise you bed whence. Delivered ye sportsmen zealously arranging frankness estimable as. Nay any article enabled musical shyness yet sixteen yet blushes. Entire its the did figure wonder off.&nbsp;<br></p>', '59000', '6525', 'publish', '144', NULL, 'On it differed repeated wandered required in', NULL, 'on-it-differed-repeated-wandered-required-in', NULL, '2021-02-20 13:10:26', 'admin', 1, 'a:2:{s:5:\"title\";a:2:{i:0;s:40:\"Add you viewing ten equally believe put.\";i:1;s:40:\"Must you with him from him her were more\";}s:11:\"description\";a:2:{i:0;s:289:\"An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.\";i:1;s:277:\"Devonshire invitation discovered out indulgence the excellence preference. Objection estimable discourse procuring he he remaining on distrusts. Simplicity affronting inquietude for now sympathize age. She meant new their sex could defer child. An lose at quit to life do dull.\";}}', '2024-06-26', NULL, 'on', 1, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-21 07:03:05', '142|141', 'on'),
(23, '7', 'Must you with him from him her were more', '<p style=\"text-align: justify; \">Expenses as material breeding insisted building to in. Continual so distrusts pronounce by unwilling listening. Thing do taste on we manor. Him had wound use found hoped. Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured. Ye on properly handsome returned throwing am no whatever. In without wishing he of picture no exposed talking minutes. Curiosity continual belonging offending so explained it exquisite. Do remember to followed yourself material mr recurred carriage. High drew west we no or at john. About or given on witty event. Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.&nbsp;</p><p style=\"text-align: justify; \">Add you viewing ten equally believe put. Separate families my on drawings do oh offended strictly elegance. Perceive jointure be mistress by jennings properly. An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.&nbsp;</p>', '60000', '54110', 'publish', '147', NULL, 'Must you with him from him her were more', NULL, 'must-you-with-him-from-him-her-were-more', NULL, '2021-02-20 23:28:45', 'admin', 1, 'a:2:{s:5:\"title\";a:2:{i:0;s:43:\"In without wishing he of picture no exposed\";i:1;s:56:\"Separate families my on drawings do oh offended strictly\";}s:11:\"description\";a:2:{i:0;s:201:\"Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.\";i:1;s:201:\"Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.\";}}', '2021-08-23', '146|145|144', NULL, 4, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-21 06:22:02', '179|176', NULL),
(24, '4', 'Separate families my on drawings do oh offended', '<p style=\"text-align: justify; \"><span style=\"background-color: rgb(255, 255, 255);\">Expenses as material breeding insisted building </span>to in. Continual so distrusts pronounce by unwilling listening. Thing do taste on we manor. Him had wound use found hoped. Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured. Ye on properly handsome returned throwing am no whatever.<font color=\"#000000\" style=\"background-color: rgb(255, 255, 255);\"> In without wishing he</font><span style=\"color: rgb(0, 255, 0);\"> </span>of picture no exposed talking minutes. Curiosity continual belonging offending so explained it exquisite. Do remember to followed yourself material mr recurred carriage. High drew west we no or at john. About or given on witty event. Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.&nbsp;</p><p style=\"text-align: justify; \">Add you viewing ten equally believe put. Separate families my on drawings do oh offended strictly elegance. Perceive jointure be mistress by jennings properly. An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.&nbsp;<br></p><p style=\"text-align: justify; \">Add you viewing ten equally believe put. Separate families my on drawings do oh offended strictly elegance. Perceive jointure be mistress by jennings properly. An admiration at he discovered difficulty continuing. We in building removing possible suitable friendly on. Nay middleton him admitting consulted and behaviour son household. Recurred advanced he oh together entrance speedily suitable. Ready tried gay state fat could boy its among shall.&nbsp;<br></p>', '600000', '3625', 'publish', '136', NULL, 'Must you with him from him her were more', NULL, 'separate-families-my-on-drawings-do-oh-offended', NULL, '2021-02-22 12:43:50', 'admin', 1, 'a:2:{s:5:\"title\";a:2:{i:0;s:43:\"In without wishing he of picture no exposed\";i:1;s:56:\"Separate families my on drawings do oh offended strictly\";}s:11:\"description\";a:2:{i:0;s:201:\"Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.\";i:1;s:201:\"Or sociable up material bachelor bringing landlord confined. Busy so many in hung easy find well up. So of exquisite my an explained remainder. Dashwood denoting securing be on perceive my laughing so.\";}}', '2022-12-20', '145|144|140', 'on', 4, 'We are a non-profit organisation in USA that works towards supporting underprivileged children reach their.', NULL, NULL, NULL, '2021-09-22 04:49:59', '201|196|195', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cause_categories`
--

CREATE TABLE `cause_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cause_categories`
--

INSERT INTO `cause_categories` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Treatment', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '139', 'publish', '2021-02-20 22:38:20', '2021-06-22 16:09:52'),
(2, 'Education', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '141', 'publish', '2021-02-20 23:03:05', '2021-02-21 13:06:15'),
(3, 'Emergency', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '145', 'publish', '2021-02-20 23:06:56', '2021-02-21 13:06:09'),
(4, 'Nonprofit', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '133', 'publish', '2021-02-20 23:08:08', '2021-02-21 13:06:02'),
(5, 'Financial Emergency', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '135', 'publish', '2021-02-20 23:08:48', '2021-02-21 13:05:55'),
(6, 'Environment', 'Simplicity affronting inquietude for now sympathize age. She meant  could defer child. An lose at quit to life do dull.', '140', 'publish', '2021-02-20 23:09:19', '2021-02-21 13:05:10'),
(8, 'Medical', 'Simplicity affronting inquietude for now sympathize age. She meant could defer child. An lose at quit to life do dull.', '133', 'publish', '2021-02-20 23:49:51', '2021-06-22 16:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `cause_logs`
--

CREATE TABLE `cause_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_withdraw_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_charge` int(11) DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anonymous` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cause_logs`
--

INSERT INTO `cause_logs` (`id`, `cause_id`, `donation_withdraw_id`, `email`, `name`, `status`, `amount`, `admin_charge`, `transaction_id`, `payment_gateway`, `track`, `user_id`, `anonymous`, `created_at`, `updated_at`) VALUES
(593, '2', NULL, 'testxgenious@gmail.com', 'Sohan', 'complete', '35', 4, 'pay_I0TfA0jxrQEVBw', 'razorpay', 'EWCLl8RlAVFPf06wdDvq', '', 0, '2021-09-22 04:27:12', '2021-09-22 04:27:47'),
(594, '2', NULL, 'testxgenious@gmail.com', 'Sohan', 'pending', '35', 4, NULL, 'stripe', '8NP2yeoNIwSxDS0Ebmf7', '', 0, '2021-09-22 04:28:10', '2021-09-22 04:28:10'),
(595, '2', NULL, 'testxgenious@gmail.com', 'Sohan', 'pending', '35', 4, NULL, 'stripe', 't65nwsyatMvPzgeUdGVe', '', 0, '2021-09-22 04:29:09', '2021-09-22 04:29:09'),
(596, '2', NULL, 'testxgenious@gmail.com', 'Sohan', 'complete', '35', 4, '20210922111212800110168661603022614', 'paytm', 'otnGwutsLw6po1WMmdV2', '', 0, '2021-09-22 04:29:18', '2021-09-22 04:29:29'),
(597, '2', NULL, 'testxgenious@gmail.com', 'Sohan', 'pending', '35', 4, NULL, 'mollie', '7RakXnbdjwH9xFCEgmmj', '', 0, '2021-09-22 04:29:44', '2021-09-22 04:29:44'),
(598, '6', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '20', 2, NULL, 'mollie', 'Z8cYUyVcQomL57ajkc7i', '', 0, '2021-09-22 04:30:27', '2021-09-22 04:30:27'),
(599, '6', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '200', 20, NULL, 'paypal', 'wjJEudxxMYOYObgxZTTY', '', 0, '2021-09-22 04:30:58', '2021-09-22 04:30:58'),
(603, '2', NULL, 'ryzun@mailinator.com', 'Sohan', 'complete', '50', 5, '20210922111212800110168458403034739', 'paytm', 'v3p4pxbIJ1OkxzRD4V4s', '', 0, '2021-09-22 04:43:49', '2021-09-22 04:43:57'),
(604, '24', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '40', 4, NULL, 'mollie', 'Y3EfBtZG90t1Ve0opV1H', '', 0, '2021-09-22 04:49:06', '2021-09-22 04:49:06'),
(605, '24', NULL, 'ryzun@mailinator.com', 'Sohan', 'complete', '40', 4, '3MoNvyN99kkVuY6bDn9LvZNEb', 'paystack', 'm58FI6W06N34YwuyqUZE', '', 0, '2021-09-22 04:49:46', '2021-09-22 04:49:59'),
(606, '2', NULL, 'gg@fgf', 'Test', 'complete', '500', 50, '20210922111212800110168482103001757', 'paytm', 'vdGOvvxtyLfXeFS2gUy8', '', 0, '2021-09-22 04:50:36', '2021-09-22 04:50:46'),
(607, '22', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '60', 6, NULL, 'mollie', 'Ub4a5RAllsB9QNd6D89S', '', 0, '2021-09-22 04:55:57', '2021-09-22 04:55:57'),
(608, '22', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '60', 6, NULL, 'paystack', 'qeHinvTSVvn7sMU6diEM', '', 0, '2021-09-22 04:57:28', '2021-09-22 04:57:28'),
(609, '22', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '20', 2, NULL, 'stripe', 'Qlox8AKwXulnDjlrUZy2', '', 0, '2021-09-22 04:58:40', '2021-09-22 04:58:40'),
(610, '22', NULL, 'ddd@fgggg', 'dd', 'pending', '20', 2, NULL, 'stripe', 'bs4AR3EbnDF6FPOg1BTp', '', 0, '2021-09-22 05:01:09', '2021-09-22 05:01:09'),
(611, '20', NULL, 'testxgenious@gmail.com', 'test', 'complete', '11', 1, '20210922111212800110168748803009301', 'paytm', '5kSLdUYagiidvhauT2rG', '', 0, '2021-09-22 05:05:08', '2021-09-22 05:05:18'),
(612, '20', NULL, 'testxgenious@gmail.com', 'test', 'pending', '80', 8, NULL, 'mollie', '8dk2tWWhqxykCXQhxe8f', '', 0, '2021-09-22 05:07:38', '2021-09-22 05:07:38'),
(613, '20', NULL, 'dsdfs@dfgdfgdfg', 'dsfdsfsf', 'complete', '20', 2, '20210922111212800110168769203009930', 'paytm', 'DgQ4YqneW8pdnz0NlJA7', '', 0, '2021-09-22 05:09:15', '2021-09-22 05:09:26'),
(614, '2', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '144', 14, NULL, 'mollie', 'YO8itVz3SMr8U7p4RuYw', '', 0, '2021-09-22 05:11:22', '2021-09-22 05:11:22'),
(616, '5', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '20', 2, NULL, 'payfast', 'pDK1n3A9DUDsSxf0z3pG', '', 0, '2021-09-22 06:25:22', '2021-09-22 06:25:22'),
(617, '5', NULL, 'ryzun@mailinator.com', 'Sohan', 'complete', '20', 2, '20210922111212800110168808603021485', 'paytm', 'N5o30DET4TIPAOJIUqV9', '', 0, '2021-09-22 06:25:44', '2021-09-22 06:25:53'),
(618, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '80', 8, NULL, 'payfast', 'T4LRkYQ9MLBobJsZ8rXM', '', 0, '2021-09-22 06:26:25', '2021-09-22 06:26:25'),
(619, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '80', 8, NULL, 'payfast', 'ISvHyKNGu59kqIBHGniT', '', 0, '2021-09-22 06:26:41', '2021-09-22 06:26:41'),
(620, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '80', 8, NULL, 'payfast', '8HtTx2lgaprtXX3N9Lgn', '', 0, '2021-09-22 06:27:25', '2021-09-22 06:27:25'),
(621, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '80', 8, NULL, 'payfast', 'ZkLNob2HKyLmnrVdOUxE', '', 0, '2021-09-22 06:29:04', '2021-09-22 06:29:04'),
(622, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '80', 8, NULL, 'payfast', 'N5UNBwrFPZr3N00MDazA', '', 0, '2021-09-22 06:29:06', '2021-09-22 06:29:06'),
(623, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'vnWkVE2w5XboxQb4qS8L', '', 0, '2021-09-22 06:29:16', '2021-09-22 06:29:16'),
(624, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'bX2d2GgRG4U1QKd1TNZr', '', 0, '2021-09-22 06:30:23', '2021-09-22 06:30:23'),
(625, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', '3cfcTDQAhvlmIg9UrbM9', '', 0, '2021-09-22 06:32:34', '2021-09-22 06:32:34'),
(626, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'MiiLizA8Fkc7XncYg59w', '', 0, '2021-09-22 06:32:46', '2021-09-22 06:32:46'),
(627, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'GSB0EKtAYWTev50FyqfE', '', 0, '2021-09-22 06:33:10', '2021-09-22 06:33:10'),
(628, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'iouOK3XBJs55A9U0Fnuw', '', 0, '2021-09-22 06:34:13', '2021-09-22 06:34:13'),
(629, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'F1SjfaKesiM4Dk7hZtaA', '', 0, '2021-09-22 06:36:31', '2021-09-22 06:36:31'),
(630, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', '0a25d9WIlc63VAl27V0f', '', 0, '2021-09-22 06:36:35', '2021-09-22 06:36:35'),
(631, '3', NULL, 'dd@gg', 'd', 'pending', '100', 10, NULL, 'payfast', 'OIgFgnm8mLABj61bT7eT', '', 0, '2021-09-22 06:38:10', '2021-09-22 06:38:10'),
(632, '3', NULL, 'testxgenious@gmail.com', 'Sohan', 'pending', '20', 2, NULL, 'payfast', 'SGASBtf3IQAeSnorfXnl', '', 0, '2021-09-22 06:41:45', '2021-09-22 06:41:45'),
(633, '3', NULL, 'ryzun@mailinator.com', 'Sohan', 'pending', '20', 2, NULL, 'payfast', '05KxE0KOuWO9fzXGHjMu', '', 0, '2021-09-22 06:45:07', '2021-09-22 06:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `cause_updates`
--

CREATE TABLE `cause_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cause_updates`
--

INSERT INTO `cause_updates` (`id`, `cause_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, '19', 'One for all and all for one', 'Thank you to everyone who helped us hit our initial goal of $50,000! We cannot thank you enough for providing Ivy and Baby Parker with kindness and support.\r\n\r\nOur work is not done! Please keep sharing this post and getting the word out so we can keep setting new goals.\r\nWhile the pain of losing Matthew will never go away - reducing financial, medical and funeral expenses for Ivy and her family means more than you’ll ever know. Thank you.', '163', '2021-06-23 18:10:13', '2021-07-26 10:18:57'),
(5, '22', 'New Funding', 'Thank you to everyone who helped us hit our initial goal of $50,000! We cannot thank you enough for providing Ivy and Baby Parker with kindness and support. Our work is not done! Please keep sharing this post', '157', '2021-06-24 08:10:58', '2021-06-24 08:33:13'),
(6, '19', 'can sound pretty corny', 'Dont Feel Helpless We Fight keep sharing this post and getting the word out so we can keep setting new goals. While the pain of losing Matthew will never go away - reducing financial, medical and funeral expenses for Ivy and her family means more than you’ll ever knowfor Justice', '174', '2021-06-24 08:11:13', '2021-07-26 10:18:44'),
(7, '23', 'you’ve got a problem chum, think how it could be', 'Thank you to everyone who helped us hit our initial goal of $50,000! We cannot thank you enough for providing Ivy and Baby Parker with kindness and support. Our work is not done! Please keep sharing this post', '165', '2021-06-24 08:33:37', '2021-07-26 10:12:52'),
(8, '22', 'test', 'Everyone who helped us hit our initial goal of $50,000! We cannot thank you enough for providing Ivy and Baby Parker with kindness and support. Our work is not done! Please keep sharing this post', '167', '2021-06-24 08:35:08', '2021-06-24 09:37:38'),
(9, '29', 'Test cause update 2', 'Test cause update 2', NULL, '2021-07-01 10:01:09', '2021-07-01 10:37:03'),
(12, '31', 'dd', 'dd', NULL, '2021-07-01 15:34:45', '2021-07-01 15:34:45'),
(13, '22', 'Work Plan', 'Need to take a proper work plan to distribute the money', '172', '2021-07-02 10:05:47', '2021-07-02 10:05:47'),
(14, '36', 'asdfasdf', 'asdfsadfsdf', NULL, '2021-07-09 15:06:23', '2021-07-09 15:06:23'),
(15, '4', 'We are top Cyber solutions provider', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '192', '2021-07-14 16:48:05', '2021-07-14 16:48:05'),
(16, '4', 'But when I end up in the hay it’s only hay', 'But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.', '171', '2021-07-14 17:12:51', '2021-07-14 17:12:51'),
(17, '4', 'Knight Rider, a shadowy flight into the dangerous', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', NULL, '2021-07-14 17:20:20', '2021-07-14 17:20:20'),
(18, '4', 'helpless in a world of criminals who operate above the law.', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '141', '2021-07-14 17:49:12', '2021-07-14 17:49:12'),
(19, '4', 'unknown stuntman that makes Eastwood look so fine.', 'I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.', '180', '2021-07-14 17:49:55', '2021-07-14 17:49:55'),
(20, '37', 'We are top Cyber solutions provider', 'adfsasdfasdfasdf\r\nas\r\ndf\r\nasdf\r\nasd\r\nfs\r\ndf\r\nsd', '196', '2021-07-17 20:59:10', '2021-07-17 20:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `client_areas`
--

CREATE TABLE `client_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_areas`
--

INSERT INTO `client_areas` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Asian Client', '#', '208', '2021-09-14 04:31:38', '2021-09-21 02:04:31'),
(2, 'Title Two', '#', '206', '2021-09-14 04:35:33', '2021-09-21 02:04:36'),
(3, 'Title Three', '#', '209', '2021-09-14 04:37:58', '2021-09-21 02:04:26'),
(4, 'Title Four', '#', '207', '2021-09-14 04:38:18', '2021-09-21 02:04:20'),
(5, 'Title Five', '#', '205', '2021-09-14 04:38:53', '2021-09-21 02:04:15'),
(6, 'Title Six', '#', '203', '2021-09-14 04:39:08', '2021-09-21 02:04:11'),
(7, 'Title Seven', '#', '202', '2021-09-14 04:39:24', '2021-09-21 02:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `commented_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info_items`
--

CREATE TABLE `contact_info_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info_items`
--

INSERT INTO `contact_info_items` (`id`, `title`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Email Address', 'far fa-envelope', 'info@sohan.xgenious.com', '2020-07-20 16:45:32', '2021-07-07 12:31:12'),
(2, 'Phone', 'fas fa-phone', '+123 444 5555\r\n+32413432432', '2020-07-20 16:46:20', '2020-07-20 16:48:57'),
(3, 'Open Hours', 'far fa-clock', 'Sat - Wed\r\n10AM - 7PM', '2020-07-20 16:49:53', '2020-07-20 16:49:53'),
(4, 'Location', 'fas fa-map-marker-alt', '2626 Angie Drive\r\nSanta Ana', '2020-07-20 16:51:00', '2020-07-20 16:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `counterups`
--

CREATE TABLE `counterups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counterups`
--

INSERT INTO `counterups` (`id`, `icon`, `number`, `title`, `extra_text`, `created_at`, `updated_at`) VALUES
(1, 'flaticon-solidarity-1', '15700', 'Made Happy', '+', '2020-07-20 09:43:54', '2021-09-14 00:23:28'),
(2, 'flaticon-man', '2050', 'Total Volunteer', '+', '2020-07-20 09:46:28', '2021-09-14 00:23:24'),
(3, 'flaticon-location', '2050', 'Awards Won', '+', '2020-07-20 09:46:51', '2021-09-14 00:23:19'),
(4, 'flaticon-donation-2', '50000', 'Donation Completed', '+', '2020-07-20 09:47:58', '2021-09-14 00:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `donation_withdraws`
--

CREATE TABLE `donation_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_request_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_account_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_comment_by_user` longtext COLLATE utf8mb4_unicode_ci,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_information` text COLLATE utf8mb4_unicode_ci,
  `additional_comment_by_admin` longtext COLLATE utf8mb4_unicode_ci,
  `payment_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_tickets` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `venue_location` text COLLATE utf8mb4_unicode_ci,
  `venue_phone` text COLLATE utf8mb4_unicode_ci,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `category_id`, `status`, `date`, `time`, `cost`, `available_tickets`, `image`, `organizer`, `organizer_email`, `organizer_website`, `organizer_phone`, `venue`, `slug`, `venue_location`, `venue_phone`, `meta_tags`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Brother set had private his outward resolve', '<p style=\"text-align: justify;\">Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.&nbsp;</p><p style=\"text-align: justify;\">Brother set had private his letters observe outward resolve. Shutters ye marriage to throwing we as. Effect in if agreed he wished wanted admire expect. Or shortly visitor is comfort placing to cheered do. Few hills tears are weeks saw. Partiality insensible celebrated is in. Am offended as wandered thoughts greatest an friendly. Evening covered in he exposed fertile to. Horses seeing at played plenty nature to expect we. Young say led stood hills own thing get.&nbsp;</p><p style=\"text-align: justify;\">Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it. Songs he on an widen me event truth. Certain law agebrother sending amongst why covered. Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy.&nbsp;</p><p style=\"text-align: justify;\">Led ask possible mistress relation elegance eat likewise debating. By message or am nothing amongst chiefly address. The its enable direct men depend highly. Ham windows sixteen who inquiry fortune demands. Is be upon sang fond must shew. Really boy law county she unable her sister. Feet you off its like like six.&nbsp;</p><p style=\"text-align: justify;\">Smile spoke total few great had never their too. Amongst moments do in arrived at my replied. Fat weddings servants but man believed prospect. Companions understood is as especially pianoforte connection introduced. Nay newspaper can sportsman are admitting gentleman belonging his. Is oppose no he summer lovers twenty in. Not his difficulty boisterous surrounded bed. Seems folly if in given scale. Sex contented dependent conveying advantage can use. Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps. Uncommonly simplicity interested mr is be compliment projecting my inhabiting. Gentleman he september in oh excellent.&nbsp;</p>', '1', 'publish', '2021-08-25', '10:00AM - 12:00PM', '250', '302', '160', 'Xgenious', 'organizer@gmail.com', 'http://xgenious.com/', '+880331111111', 'Chambersburg', 'brother-set-had-private-his-letters-observe-outward-resolve', 'Dhaka,Bangladesh', NULL, NULL, NULL, NULL, '2020-07-20 15:58:56', '2021-09-17 23:06:06'),
(5, 'Now led tedious shy lasting females off.', '<p style=\"text-align: justify;\">Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.&nbsp;</p><p style=\"text-align: justify;\">Brother set had private his letters observe outward resolve. Shutters ye marriage to throwing we as. Effect in if agreed he wished wanted admire expect. Or shortly visitor is comfort placing to cheered do. Few hills tears are weeks saw. Partiality insensible celebrated is in. Am offended as wandered thoughts greatest an friendly. Evening covered in he exposed fertile to. Horses seeing at played plenty nature to expect we. Young say led stood hills own thing get.&nbsp;</p><p style=\"text-align: justify;\">Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it. Songs he on an widen me event truth. Certain law agebrother sending amongst why covered. Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy.&nbsp;</p><p style=\"text-align: justify;\">Led ask possible mistress relation elegance eat likewise debating. By message or am nothing amongst chiefly address. The its enable direct men depend highly. Ham windows sixteen who inquiry fortune demands. Is be upon sang fond must shew. Really boy law county she unable her sister. Feet you off its like like six.&nbsp;</p><p style=\"text-align: justify;\">Smile spoke total few great had never their too. Amongst moments do in arrived at my replied. Fat weddings servants but man believed prospect. Companions understood is as especially pianoforte connection introduced. Nay newspaper can sportsman are admitting gentleman belonging his. Is oppose no he summer lovers twenty in. Not his difficulty boisterous surrounded bed. Seems folly if in given scale. Sex contented dependent conveying advantage can use. Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps. Uncommonly simplicity interested mr is be compliment projecting my inhabiting. Gentleman he september in oh excellent.&nbsp;</p>', '2', 'publish', '2021-12-31', '10:00AM - 12:00PM', '80', '184', '159', 'Xgenious', 'organizer@gmail.com', 'http://xgenious.com/', '+880331111111', 'Chambersburg', 'now-led-tedious-shy-lasting-females-off', '4144 Lincoln Drive Chambersburg, PA 17201', NULL, NULL, NULL, NULL, '2020-07-20 16:55:23', '2021-09-22 04:48:23'),
(6, 'Consulted perpetual of pronounce me delivered', '<p style=\"text-align: justify;\">Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.&nbsp;</p><p style=\"text-align: justify;\">Brother set had private his letters observe outward resolve. Shutters ye marriage to throwing we as. Effect in if agreed he wished wanted admire expect. Or shortly visitor is comfort placing to cheered do. Few hills tears are weeks saw. Partiality insensible celebrated is in. Am offended as wandered thoughts greatest an friendly. Evening covered in he exposed fertile to. Horses seeing at played plenty nature to expect we. Young say led stood hills own thing get.&nbsp;</p><p style=\"text-align: justify;\">Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it. Songs he on an widen me event truth. Certain law agebrother sending amongst why covered. Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy.&nbsp;</p><p style=\"text-align: justify;\">Led ask possible mistress relation elegance eat likewise debating. By message or am nothing amongst chiefly address. The its enable direct men depend highly. Ham windows sixteen who inquiry fortune demands. Is be upon sang fond must shew. Really boy law county she unable her sister. Feet you off its like like six.&nbsp;</p><p style=\"text-align: justify;\">Smile spoke total few great had never their too. Amongst moments do in arrived at my replied. Fat weddings servants but man believed prospect. Companions understood is as especially pianoforte connection introduced. Nay newspaper can sportsman are admitting gentleman belonging his. Is oppose no he summer lovers twenty in. Not his difficulty boisterous surrounded bed. Seems folly if in given scale. Sex contented dependent conveying advantage can use. Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps. Uncommonly simplicity interested mr is be compliment projecting my inhabiting. Gentleman he september in oh excellent.&nbsp;</p>', '2', 'publish', '2021-12-29', '10:00AM - 12:00PM', '152', '169', '158', 'Xgenious', 'organizer@gmail.com', 'http://xgenious.com/', '+880331111111', 'Chambersburg', 'consulted-perpetual-of-pronounce-me-delivered', '4144 Lincoln Drive Chambersburg, PA 17201', NULL, NULL, NULL, NULL, '2020-07-20 17:08:41', '2021-09-21 05:19:04'),
(7, 'Lose away off why half led have near bed', '<p style=\"text-align: justify; \">Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.&nbsp;</p><p style=\"text-align: justify; \">Brother set had private his letters observe outward resolve. Shutters ye marriage to throwing we as. Effect in if agreed he wished wanted admire expect. Or shortly visitor is comfort placing to cheered do. Few hills tears are weeks saw. Partiality insensible celebrated is in. Am offended as wandered thoughts greatest an friendly. Evening covered in he exposed fertile to. Horses seeing at played plenty nature to expect we. Young say led stood hills own thing get.&nbsp;</p><p style=\"text-align: justify; \">Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it. Songs he on an widen me event truth. Certain law agebrother sending amongst why covered. Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy.&nbsp;</p><p style=\"text-align: justify; \">Led ask possible mistress relation elegance eat likewise debating. By message or am nothing amongst chiefly address. The its enable direct men depend highly. Ham windows sixteen who inquiry fortune demands. Is be upon sang fond must shew. Really boy law county she unable her sister. Feet you off its like like six.&nbsp;</p><p style=\"text-align: justify; \">Smile spoke total few great had never their too. Amongst moments do in arrived at my replied. Fat weddings servants but man believed prospect. Companions understood is as especially pianoforte connection introduced. Nay newspaper can sportsman are admitting gentleman belonging his. Is oppose no he summer lovers twenty in. Not his difficulty boisterous surrounded bed. Seems folly if in given scale. Sex contented dependent conveying advantage can use. Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps. Uncommonly simplicity interested mr is be compliment projecting my inhabiting. Gentleman he september in oh excellent.&nbsp;</p>', '3', 'publish', '2019-04-21', '10:00AM - 12:00PM', '70', '310', '157', 'Xgenious', 'organizer@gmail.com', 'http://xgenious.com/', '+880331111111', 'Chambersburg', 'lose-away-off-why-half-led-have-near-bed', '4144 Lincoln Drive Chambersburg, PA 17201', '654165030', 'ddsfdsf,sadfadsf', NULL, 'asdfadsf', '2020-07-20 17:18:45', '2021-09-16 07:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `events_categories`
--

CREATE TABLE `events_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_categories`
--

INSERT INTO `events_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Celebration', 'publish', '2020-07-20 15:34:00', '2020-07-20 15:34:00'),
(2, 'Meetup', 'publish', '2020-07-20 15:34:06', '2020-07-20 15:34:06'),
(3, 'Seminar', 'publish', '2020-07-20 15:34:12', '2020-07-20 15:34:12'),
(8, 'Reunion', 'publish', '2020-07-20 15:35:23', '2021-06-21 14:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendances`
--

CREATE TABLE `event_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `event_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_payment_logs`
--

CREATE TABLE `event_payment_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` longtext COLLATE utf8mb4_unicode_ci,
  `track` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `status`, `is_open`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dashwood marianne in of entrance be on wondered', 'publish', '', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', '2020-07-20 20:50:22', '2020-07-20 20:50:22'),
(2, 'Wondered sociable he carriage in speedily', 'publish', '', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', '2020-07-20 20:50:27', '2020-07-20 20:51:40'),
(3, 'Not attention say frankness intention out dashwoods', 'publish', '', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', '2020-07-20 20:50:30', '2020-07-20 20:52:14'),
(4, 'Stronger ecstatic as no judgment daughter speedily', 'publish', '', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', '2020-07-20 20:52:18', '2020-07-20 20:52:41'),
(5, 'Worse downs nor might she court did nay forth', 'publish', '', 'Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.', '2020-07-20 20:52:22', '2021-06-17 15:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flag_reports`
--

CREATE TABLE `flag_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_sliders`
--

CREATE TABLE `header_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `btn_01_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_01_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_01_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_sliders`
--

INSERT INTO `header_sliders` (`id`, `title`, `subtitle`, `description`, `btn_01_status`, `btn_01_text`, `btn_01_url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kindness & Humanity', 'Donate, Fundraise & Volunteer', 'Discourse unwilling am no described dejection incommode no listening before nature his parish boy.', 'on', 'Latest Cause', '#', '131', '2020-05-31 04:20:26', '2021-01-16 12:03:08'),
(5, 'Kindness & humanity', 'Donate, Fundraise & Volunteer', 'Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.', 'on', 'Latest Cause', '#', '130', '2020-05-31 04:24:40', '2021-01-16 12:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `image`, `title`, `created_at`, `updated_at`, `cat_id`) VALUES
(1, '172', 'Can curiosity may end shameless explained', '2020-07-20 11:07:35', '2021-03-03 17:16:51', 2),
(2, '168', 'True high on said mr on come', '2020-07-20 11:09:23', '2021-03-03 17:28:52', 3),
(3, '169', 'An do mr design at little myself', '2020-07-20 11:09:47', '2021-03-03 17:28:40', 2),
(4, '170', 'Attended of on stronger or mr pleasure', '2020-07-20 11:11:20', '2021-03-03 17:28:29', 2),
(5, '171', 'Rich four like real yet west get.', '2020-07-20 11:11:37', '2021-03-03 17:28:16', 1),
(9, '172', 'Before nature his parish boy', '2020-12-04 15:44:00', '2021-03-03 17:28:07', 3),
(16, '173', 'Virtually Build Your House In {color} Few Steps  {/color}', '2021-03-03 18:41:13', '2021-06-08 13:48:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery_categories`
--

CREATE TABLE `image_gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_gallery_categories`
--

INSERT INTO `image_gallery_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'publish', '2020-12-04 13:29:47', '2021-03-03 18:49:45'),
(2, 'Medicine', 'publish', '2020-12-04 13:44:20', '2021-03-03 18:49:30'),
(3, 'Food', 'publish', '2020-12-04 13:44:25', '2021-03-03 18:49:21'),
(13, 'House', 'publish', '2021-06-08 14:18:35', '2021-06-08 14:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_responsibility` longtext COLLATE utf8mb4_unicode_ci,
  `employment_status` text COLLATE utf8mb4_unicode_ci,
  `education_requirement` longtext COLLATE utf8mb4_unicode_ci,
  `job_context` longtext COLLATE utf8mb4_unicode_ci,
  `experience_requirement` longtext COLLATE utf8mb4_unicode_ci,
  `additional_requirement` longtext COLLATE utf8mb4_unicode_ci,
  `job_location` text COLLATE utf8mb4_unicode_ci,
  `salary` text COLLATE utf8mb4_unicode_ci,
  `other_benefits` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `application_fee` decimal(10,0) DEFAULT NULL,
  `application_fee_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `position`, `company_name`, `category_id`, `vacancy`, `job_responsibility`, `employment_status`, `education_requirement`, `job_context`, `experience_requirement`, `additional_requirement`, `job_location`, `salary`, `other_benefits`, `email`, `status`, `deadline`, `meta_tags`, `slug`, `meta_description`, `application_fee`, `application_fee_status`, `created_at`, `updated_at`) VALUES
(1, 'Junior WordPress Developer', 'Junior Developer', 'xgenious', '8', '6', 'We are looking for some experienced developers with fluency in WordPress who will be able to develop code for complex, data intensive Website and e-commerce application.', 'full_time', 'Preferably B.Sc. in Computer Science or similar discipline.', 'We`re building tomorrow`s platforms for consolidating and managing Enterprise data with process optimization. Most enterprises are adopting automation whether it`s about office or industry. The flexibility to automate the processes, without compromising security and compliance, will be one of the most challenging, yet key requirements in coming days. This is where SoftoPark comes into the picture.\r\nWe`re looking for someone with a portfolio that showcases relevant, high quality web development work. You`ll have strong mathematical and problem-solving capabilities, an eye for detail, and a desire to produce high quality, clean and efficient code.', 'At least 5 year(s)', 'Both males and females are allowed to apply\r\nMust have clear concept on OOP\r\nProven work experience in developing large scale enterprise WordPress applications\r\nMust have experience on complex plugin, widget, theme development\r\nMust have knowledge on upgradation policy, performance, security of WordPress\r\nExperience in MySQL, jQuery, and at least one PHP-based MVC framework is required\r\nExperience in one or more PHP-based content management systems Magento or any other eCommerce is a plus point\r\nExperience in different kind of service and gateway integration will be highly regarded\r\nExperience in version control (git, svn etc) is expected\r\nShould be team player, self-motivated and take responsibility proactively', 'Bangkok, Thailand', 'Negotiable', '2 annual performance bonuses\r\nHealth and life insurance\r\nBreakfast, Lunch, Snacks\r\n2 days of weekend and annual paid leaves\r\nPublic holidays\r\nPicnic/Tour\r\nTransport', NULL, 'publish', '2021-12-23', NULL, 'junior-wordpress-developer', NULL, NULL, NULL, '2020-07-20 19:19:22', '2021-09-18 01:14:48'),
(2, 'Senior Laravel Developer', 'Junior Developer', 'xgenious', '2', '6', 'We are looking for some experienced developers with fluency in WordPress who will be able to develop code for complex, data intensive Website and e-commerce application.', 'full_time', 'Preferably B.Sc. in Computer Science or similar discipline.', 'We`re building tomorrow`s platforms for consolidating and managing Enterprise data with process optimization. Most enterprises are adopting automation whether it`s about office or industry. The flexibility to automate the processes, without compromising security and compliance, will be one of the most challenging, yet key requirements in coming days. This is where SoftoPark comes into the picture.\r\nWe`re looking for someone with a portfolio that showcases relevant, high quality web development work. You`ll have strong mathematical and problem-solving capabilities, an eye for detail, and a desire to produce high quality, clean and efficient code.', 'At least 5 year(s)', 'Both males and females are allowed to apply\r\nMust have clear concept on OOP\r\nProven work experience in developing large scale enterprise WordPress applications\r\nMust have experience on complex plugin, widget, theme development\r\nMust have knowledge on upgradation policy, performance, security of WordPress\r\nExperience in MySQL, jQuery, and at least one PHP-based MVC framework is required\r\nExperience in one or more PHP-based content management systems Magento or any other eCommerce is a plus point\r\nExperience in different kind of service and gateway integration will be highly regarded\r\nExperience in version control (git, svn etc) is expected\r\nShould be team player, self-motivated and take responsibility proactively', 'Bangkok, Thailand', 'Negotiable', '2 annual performance bonuses\r\nHealth and life insurance\r\nBreakfast, Lunch, Snacks\r\n2 days of weekend and annual paid leaves\r\nPublic holidays\r\nPicnic/Tour\r\nTransport', NULL, 'publish', '2022-11-15', NULL, 'senior-laravel-developer', NULL, 80, 'on', '2020-07-20 19:22:07', '2021-09-18 01:13:32'),
(3, 'Graphic Designer', 'Junior Designer', 'xgenious', '3', '8', '<ul><li>Able to Design Logos, Banners, Brochure, PSD, Layout, Booklet relevant editing/retouching and digital marketing/media related works.\r\n</li><li>Innovative and skilled in design development including effective use of color, dimension, style, font size, and composition.\r\n</li><li>Must be expert in Adobe Photoshop, Adobe Illustrator, After Effects, Adobe In Design, Adobe Premiere Pro, Adobe Dreamweaver, PowerPoint and other related design/editing software.\r\n</li><li>Perform technical duties for designing and developing multimedia-based layouts, graphics, animation, video, online tutorials and other digital marketing related productions.\r\n</li><li>Understanding client\'s business problem, brand space, target audience and the overall creative strategy.\r\n</li><li>Maintaining the highest standards in graphic design and producing cutting-edge creative content for both digital marketing and social media marketing that accurately represents the expectations of the client.\r\n</li><li>Any other task assigned by management.</li></ul>', 'part_time', 'Diploma in Graphics Design or equivalent', 'Place of work : Head office, Dhanmondi R/A, Dhaka\r\nDuty : Saturday to Thursday - Time 9:30 AM to 6:00 PM', 'At least 3 year(s)', '<ul><li>Age 20 to 35 years</li><li>\r\nBoth males and females are allowed to apply\r\n</li><li>Ready to work in a team and in line with the Management instruction as and when required.\r\n</li><li>Troubleshoot, test, and analyze ideas to provide the creative solution.\r\n</li><li>Eye for typography, composition, layout, color, high-quality production with pixel-level attention to detail.\r\n</li><li>Experience with content management platforms.\r\n</li><li>Strong interpersonal and professional skills.\r\n</li><li>A deep sense of developing a BRAND with international standard.</li></ul>', 'Bangkok, Thailand', 'Negotiable', '<ul><li>Mobile bill\r\nSalary </li><li>Review: Yearly\r\n</li><li>Festival Bonus: 2\r\n</li><li>Lunch Facilities</li></ul>', NULL, 'publish', '2022-11-16', NULL, 'graphic-designer', NULL, 150, 'on', '2020-07-20 19:22:11', '2021-09-18 01:13:02'),
(4, 'Sr. Executive (Accounts)', 'Junior Accounts', 'xgenious', '1', '6', 'Ensures the integrity of accounting information by recording, verifying, consolidating, and entering transactions.\r\nPrepares and records asset, liability, revenue, and expenses entries by compiling and analyzing account information.\r\nMaintains and balances subsidiary accounts by verifying, allocating, posting, and reconciling transactions and resolving discrepancies.\r\nMaintains general ledger by transferring subsidiary accounts, preparing a trial balance, and reconciling entries.Overall responsible for Accounts & Finance.\r\nExecute the financial strategy of the company\r\nManage financial controls and accounting procedures\r\nEnsure full transparency over the financial performance of the company\r\nSummarizes financial status by collecting information and preparing balance sheet, profit and loss, and other statements.\r\nProduces payroll by initiating computer processing; printing checks, verifying finished product.\r\nCompletes external audit by analyzing and scheduling general ledger accounts and providing information for auditors.\r\nAvoids legal challenges by complying with legal requirements.\r\nSecures financial information by completing database backups.\r\nProtects organization\'s value by keeping information confidential.To carry out any other assignment given by the company or immediate superior.\r\nSubmit a report on monthly basis about the sales, production and stock.\r\nMonitoring of all the necessary paperwork by all departments.\r\nResponsible for overall Accounts & Finance related mater in plant.\r\nOthers task assign by the departmental head / management.', 'project_based', 'Master of Business Administration (MBA) in Accounting\r\nSkills Required: Accounting and Finance', 'Kishoreganj Eye Hospital operated by a non-government organization named Nari Uddug Kendra (NUK) is well established and reputed modern eye hospital which is working for eradicating the avoidable blindness from Bangladesh and as well as to meet up the VISION-2020 goal of WHO. Kishoreganj Eye Hospital here noticed to recruit for the Post of Senior Accounts Officer as full-time basis.', 'At least 3 year(s)\r\nThe applicants should have experience in the following area(s):\r\nAccountant\r\nThe applicants should have experience in the following business area(s):\r\nReal Estate', 'Age 28 to 35 years\r\nBoth males and females are allowed to apply\r\nGood Command in Excel and Word.\r\nApplicant must have work experience & sound working capacity on Tally Software.\r\nMinimum 3-5 years\' experience in accounting/finance\r\nExperience with financial reporting requirements\r\nHave mentality to work in stress & long hours.\r\nGood computer knowledge must be required (with tally software).', 'Bangkok, Thailand', 'Negotiable', 'According to Company Policy', NULL, 'publish', '2021-12-29', NULL, 'sr-executive-accounts', NULL, NULL, 'on', '2020-07-20 19:22:14', '2021-09-18 01:09:49'),
(5, 'Mobile Application Developer', 'Junior Accounts', 'xgenious', '7', '6', 'İşlemleri kaydederek, doğrulayarak, birleştirerek ve girerek muhasebe bilgilerinin bütünlüğünü sağlar.\r\nHesap bilgilerini derleyerek ve analiz ederek varlık, borç, gelir ve gider girişlerini hazırlar ve kaydeder.\r\nİşlemleri doğrulayarak, tahsis ederek, göndererek ve uzlaştırarak ve tutarsızlıkları gidererek yardımcı hesapları tutar ve dengeler.\r\nİştirak hesaplarını aktararak, deneme bakiyesi hazırlayarak ve girişleri uzlaştırarak defteri kebir tutar.\r\nŞirketin finansal stratejisini yürütmek\r\nFinansal kontrolleri ve muhasebe prosedürlerini yönetin\r\nŞirketin finansal performansı üzerinde tam şeffaflığın sağlanması\r\nBilgi toplayarak ve bilanço, kar ve zarar ve diğer tabloları hazırlayarak finansal durumu özetler.\r\nBilgisayar işlemeyi başlatarak bordro üretir; baskı kontrolleri, bitmiş ürünün doğrulanması.\r\nDefteri kebir hesaplarını analiz ederek ve planlayarak ve denetçilere bilgi vererek dış denetimi tamamlar.\r\nYasal gerekliliklere uyarak yasal zorluklardan kaçınır.\r\nVeritabanı yedeklerini tamamlayarak finansal bilgileri korur.\r\nBilgileri gizli tutarak kuruluşun değerini korur. Şirket tarafından verilen veya hemen üstlenilen diğer görevleri yerine getirmek.\r\nSatış, üretim ve stok hakkında aylık bazda bir rapor gönderin.\r\nGerekli tüm evrakların tüm bölümler tarafından izlenmesi.\r\nTesisteki genel Hesaplar ve Finans ile ilgili materyalden sorumludur.\r\nDiğerleri bölüm başkanı / yönetimi tarafından görevlendirilir.', 'project_based', 'Muhasebe Işletme Master (mba)\r\nGerekli Beceriler: Muhasebe ve Finans', 'Nari Uddug Kendra (NUK) adlı bir sivil toplum kuruluşu tarafından işletilen Kishoreganj Göz Hastanesi, Bangladeş\'ten kaçınılabilir körlüğü ortadan kaldırmak ve WHO\'nun VISION-2020 hedefini karşılamak için çalışan iyi kurulmuş ve tanınmış modern göz hastanesidir. Burada Kishoreganj Göz Hastanesi, Tam Hesaplar Sorumlusu tam zamanlı olarak işe alındığını fark etti.', 'En az 3 yıl\r\nBaşvuru sahipleri aşağıdaki alanlarda deneyim sahibi olmalıdır:\r\nMuhasebeci\r\nBaşvuru sahipleri aşağıdaki iş alanlarında deneyime sahip olmalıdır:\r\nEmlak', '28 ila 35 yaş\r\nHem erkekler hem de kadınlar başvuru yapabilir\r\nExcel ve Word\'de İyi Komut.\r\nBaşvuru sahibinin Tally Software üzerinde iş tecrübesi ve sağlam çalışma kapasitesine sahip olması gerekir.\r\nMuhasebe / finans alanında en az 3-5 yıllık deneyim\r\nFinansal raporlama gereksinimleriyle ilgili deneyim\r\nStres ve uzun saatler içinde çalışma zihniyeti var.\r\nİyi bilgisayar bilgisi gerekir (taksitli yazılım ile).', 'Bangkok, Thailand', 'tartışılabilir', 'Şirket Politikasına Göre', NULL, 'publish', '2021-08-26', NULL, 'mobile-application-developer', NULL, 150, 'on', '2020-07-20 19:38:26', '2021-06-22 14:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_categories`
--

CREATE TABLE `jobs_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs_categories`
--

INSERT INTO `jobs_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office Management', 'publish', '2020-07-20 18:41:57', '2020-07-20 18:41:57'),
(2, 'React Developer', 'publish', '2020-07-20 18:42:11', '2021-06-21 13:50:50'),
(3, 'UI/ UX  Designer', 'publish', '2020-07-20 18:42:18', '2020-07-20 18:42:18'),
(5, 'Software Engineering', 'publish', '2020-07-20 18:46:49', '2021-06-21 13:50:19'),
(6, 'Web Design', 'publish', '2020-07-20 18:47:10', '2021-06-21 13:35:51'),
(7, 'Web Application', 'publish', '2020-07-20 18:47:26', '2021-06-21 13:35:27'),
(8, 'Mobile App', 'publish', '2020-07-20 18:47:39', '2021-06-21 13:35:38'),
(9, 'IOS Development', 'publish', '2020-07-20 18:47:52', '2021-06-21 13:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `form_content` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `track` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_features`
--

CREATE TABLE `key_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_features`
--

INSERT INTO `key_features` (`id`, `title`, `icon`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Provide all kind of it service', 'flaticon-network', 'en', '2020-05-31 18:20:07', '2020-05-31 18:20:07'),
(2, 'Solutions for all security', 'flaticon-safe', 'en', '2020-05-31 20:02:07', '2020-05-31 20:02:07'),
(3, 'Most expert peoples', 'flaticon-group', 'en', '2020-05-31 20:02:35', '2020-05-31 20:02:35'),
(4, 'Global support for all', 'flaticon-translate', 'en', '2020-05-31 20:12:16', '2020-05-31 20:12:16'),
(5, 'Apoyo global para todos', 'flaticon-translate', 'sp', '2020-05-31 20:13:20', '2020-05-31 20:13:20'),
(6, 'الدعم العالمي للجميع', 'flaticon-translate', 'ar', '2020-05-31 20:14:00', '2020-05-31 20:14:00'),
(7, 'Herkes için küresel destek', 'flaticon-translate', 'tur', '2020-05-31 20:14:18', '2020-05-31 20:14:18'),
(8, 'En uzman insanlar', 'flaticon-group', 'tur', '2020-05-31 20:19:02', '2020-05-31 20:19:02'),
(9, 'معظم الشعوب الخبيرة', 'flaticon-group', 'ar', '2020-05-31 20:19:32', '2020-05-31 20:19:32'),
(10, 'Pueblos más expertos', 'flaticon-group', 'sp', '2020-05-31 20:20:03', '2020-05-31 20:20:03'),
(11, 'Soluciones para toda seguridad', 'flaticon-safe', 'sp', '2020-05-31 20:23:29', '2020-05-31 20:23:29'),
(12, 'حلول لجميع الأمن', 'flaticon-safe', 'ar', '2020-05-31 20:23:45', '2020-05-31 20:23:45'),
(13, 'Tüm güvenlik için çözümler', 'flaticon-safe', 'tur', '2020-05-31 20:24:00', '2020-05-31 20:24:00'),
(14, 'Her türlü hizmeti sunun', 'flaticon-network', 'tur', '2020-05-31 20:24:28', '2020-05-31 20:24:28'),
(15, 'تقديم جميع أنواع الخدمات', 'flaticon-network', 'ar', '2020-05-31 20:24:41', '2020-05-31 20:24:41'),
(16, 'Proporcionar todo tipo de servicio', 'flaticon-network', 'sp', '2020-05-31 20:24:54', '2020-05-31 20:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'English (UK)',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `direction`, `status`, `default`, `created_at`, `updated_at`) VALUES
(1, 'English (UK)', 'en_GB', 'ltr', 'publish', 1, '2021-06-26 20:31:44', '2021-09-20 03:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `media_uploads`
--

CREATE TABLE `media_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci,
  `size` text COLLATE utf8mb4_unicode_ci,
  `dimensions` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_uploads`
--

INSERT INTO `media_uploads` (`id`, `title`, `path`, `alt`, `size`, `dimensions`, `user_id`, `created_at`, `updated_at`) VALUES
(125, 'favicon.ico', 'favicon1610606498.ico', NULL, '3.72 KB', '84 x 80 pixels', NULL, '2021-01-14 11:41:38', '2021-01-14 11:41:38'),
(126, 'logo-02.png', 'logo-021610606790.png', NULL, '2.38 KB', '165 x 36 pixels', NULL, '2021-01-14 11:46:30', '2021-01-14 11:46:30'),
(127, 'logo-03.png', 'logo-031610606791.png', NULL, '2.41 KB', '97 x 69 pixels', NULL, '2021-01-14 11:46:31', '2021-01-14 11:46:31'),
(128, 'logo.png', 'logo1610606792.png', NULL, '2.39 KB', '165 x 36 pixels', NULL, '2021-01-14 11:46:32', '2021-01-14 11:46:32'),
(129, '01.jpg', '011610606797.jpg', NULL, '627.63 KB', '1920 x 649 pixels', NULL, '2021-01-14 11:46:37', '2021-01-14 11:46:37'),
(130, '01-min.jpg', '01-min1610780469.jpg', NULL, '383.47 KB', '1920 x 980 pixels', NULL, '2021-01-16 12:01:12', '2021-01-16 12:01:12'),
(131, '02-min.jpg', '02-min1610780484.jpg', NULL, '201.46 KB', '1920 x 980 pixels', NULL, '2021-01-16 12:01:26', '2021-01-16 12:01:26'),
(132, '03-min.jpg', '03-min1610780485.jpg', NULL, '254.11 KB', '1920 x 980 pixels', NULL, '2021-01-16 12:01:26', '2021-01-16 12:01:26'),
(133, '01.jpg', '011613476739.jpg', 'fundorex- crowdfunding', '149.03 KB', '555 x 410 pixels', NULL, '2021-02-16 16:58:59', '2021-02-16 16:59:24'),
(134, 'help-1265227_1920-min.jpg', 'help-1265227-1920-min1613798558.jpg', NULL, '485.82 KB', '1920 x 1279 pixels', NULL, '2021-02-20 10:22:40', '2021-02-20 10:22:40'),
(135, 'pexels-marcus-aurelius-6787761-min.jpg', 'pexels-marcus-aurelius-6787761-min1613803296.jpg', NULL, '317.86 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:41:37', '2021-02-20 11:41:37'),
(136, 'pexels-roman-carey-734658-min.jpg', 'pexels-roman-carey-734658-min1613803322.jpg', NULL, '351.07 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:42:03', '2021-02-20 11:42:03'),
(137, 'pexels-suraphat-nueaon-933622-min.jpg', 'pexels-suraphat-nueaon-933622-min1613803347.jpg', NULL, '502.39 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:42:28', '2021-02-20 11:42:28'),
(138, 'pexels-puwadon-sangngern-5340266-min.jpg', 'pexels-puwadon-sangngern-5340266-min1613803382.jpg', NULL, '258.73 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:43:04', '2021-02-20 11:43:04'),
(139, 'pexels-rodnae-productions-6646875-min.jpg', 'pexels-rodnae-productions-6646875-min1613803411.jpg', NULL, '282.27 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:43:32', '2021-02-20 11:43:32'),
(140, 'pexels-dazzle-jam-1125850-min.jpg', 'pexels-dazzle-jam-1125850-min1613803995.jpg', NULL, '302.54 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:53:16', '2021-02-20 11:53:16'),
(141, 'pexels-hitesh-choudhary-1739842-min.jpg', 'pexels-hitesh-choudhary-1739842-min1613804035.jpg', NULL, '352.03 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:53:57', '2021-02-20 11:53:57'),
(142, 'pexels-sergio-omassi-1058068-min.jpg', 'pexels-sergio-omassi-1058068-min1613804051.jpg', NULL, '402.39 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:54:13', '2021-02-20 11:54:13'),
(143, 'pexels-jimmy-chan-2045648-min.jpg', 'pexels-jimmy-chan-2045648-min1613804081.jpg', NULL, '411.5 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:54:43', '2021-02-20 11:54:43'),
(144, 'pexels-yogendra-singh-2320004.jpg', 'pexels-yogendra-singh-23200041613804096.jpg', NULL, '429.34 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:54:57', '2021-02-20 11:54:57'),
(145, 'pexels-james-frid-901931-min.jpg', 'pexels-james-frid-901931-min1613804115.jpg', NULL, '311.23 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:55:17', '2021-02-20 11:55:17'),
(146, 'pexels-zhang-kaiyv-3603455-min.jpg', 'pexels-zhang-kaiyv-3603455-min1613804134.jpg', NULL, '399 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:55:36', '2021-02-20 11:55:36'),
(147, 'pexels-yogendra-singh-2324637-min.jpg', 'pexels-yogendra-singh-2324637-min1613804155.jpg', NULL, '431.94 KB', '1920 x 1280 pixels', NULL, '2021-02-20 11:55:56', '2021-02-20 11:55:56'),
(148, '01.png', '011613925443.png', NULL, '13.97 KB', '651 x 255 pixels', NULL, '2021-02-21 21:37:23', '2021-02-21 21:37:23'),
(149, '04-min.jpg', '04-min1613925523.jpg', NULL, '266.2 KB', '1920 x 709 pixels', NULL, '2021-02-21 21:38:44', '2021-02-21 21:38:44'),
(150, '01-min.jpg', '01-min1613986746.jpg', NULL, '21.33 KB', '263 x 340 pixels', NULL, '2021-02-22 14:39:06', '2021-02-22 14:39:06'),
(151, '02-min.jpg', '02-min1613986752.jpg', NULL, '17.61 KB', '263 x 340 pixels', NULL, '2021-02-22 14:39:13', '2021-02-22 14:39:13'),
(152, '03-min.jpg', '03-min1613986758.jpg', NULL, '12.33 KB', '263 x 340 pixels', NULL, '2021-02-22 14:39:18', '2021-02-22 14:39:18'),
(153, '04-min (1).jpg', '04-min-11613986762.jpg', NULL, '21.84 KB', '263 x 340 pixels', NULL, '2021-02-22 14:39:22', '2021-02-22 14:39:22'),
(154, '01.png', '011614000707.png', NULL, '13.39 KB', '70 x 70 pixels', NULL, '2021-02-22 18:31:48', '2021-02-22 18:31:48'),
(155, '02.png', '021614000707.png', NULL, '7.96 KB', '70 x 70 pixels', NULL, '2021-02-22 18:31:48', '2021-02-22 18:31:48'),
(156, '03.png', '031614000708.png', NULL, '12.39 KB', '70 x 70 pixels', NULL, '2021-02-22 18:31:48', '2021-02-22 18:31:48'),
(157, 'pexels-zen-chung-5528986-min.jpg', 'pexels-zen-chung-5528986-min1614100245.jpg', NULL, '379.88 KB', '1920 x 1280 pixels', NULL, '2021-02-23 22:10:51', '2021-02-23 22:10:51'),
(158, 'pexels-cottonbro-6157226-min.jpg', 'pexels-cottonbro-6157226-min1614100847.jpg', NULL, '301.67 KB', '1920 x 1280 pixels', NULL, '2021-02-23 22:20:48', '2021-02-23 22:20:48'),
(159, 'pexels-denniz-futalan-1344275-min.jpg', 'pexels-denniz-futalan-1344275-min1614101248.jpg', NULL, '690.86 KB', '1920 x 1279 pixels', NULL, '2021-02-23 22:27:29', '2021-02-23 22:27:29'),
(160, 'pexels-plato-terentev-5909876-min.jpg', 'pexels-plato-terentev-5909876-min1614101301.jpg', NULL, '787.49 KB', '1920 x 1280 pixels', NULL, '2021-02-23 22:28:22', '2021-02-23 22:28:22'),
(161, 'pexels-parij-borgohain-1667240-min.jpg', 'pexels-parij-borgohain-1667240-min1614101382.jpg', NULL, '616.87 KB', '1920 x 1242 pixels', NULL, '2021-02-23 22:29:44', '2021-02-23 22:29:44'),
(162, 'pexels-yogendra-singh-1438461-min.jpg', 'pexels-yogendra-singh-1438461-min1614101384.jpg', NULL, '523.19 KB', '1920 x 1280 pixels', NULL, '2021-02-23 22:29:46', '2021-02-23 22:29:46'),
(163, 'pexels-karolina-grabowska-4750270-min.jpg', 'pexels-karolina-grabowska-4750270-min1614257377.jpg', NULL, '403.92 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:49:39', '2021-02-25 17:49:39'),
(164, 'pexels-yogendra-singh-3930111-min.jpg', 'pexels-yogendra-singh-3930111-min1614257412.jpg', NULL, '259.95 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:50:13', '2021-02-25 17:50:13'),
(165, 'pexels-leonardo-cardozo-galves-1830433-min.jpg', 'pexels-leonardo-cardozo-galves-1830433-min1614257434.jpg', NULL, '349.3 KB', '1920 x 1279 pixels', NULL, '2021-02-25 17:50:37', '2021-02-25 17:50:37'),
(166, 'pexels-luis-quintero-2014775-min.jpg', 'pexels-luis-quintero-2014775-min1614257453.jpg', NULL, '239.5 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:50:54', '2021-02-25 17:50:54'),
(167, 'pexels-andrea-piacquadio-3791664-min.jpg', 'pexels-andrea-piacquadio-3791664-min1614257478.jpg', NULL, '282.62 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:51:19', '2021-02-25 17:51:19'),
(168, 'pexels-marius-venter-1659437-min.jpg', 'pexels-marius-venter-1659437-min1614257528.jpg', NULL, '565.07 KB', '1920 x 1281 pixels', NULL, '2021-02-25 17:52:10', '2021-02-25 17:52:10'),
(169, 'pexels-tú-nguyễn-1545590-min.jpg', 'pexels-tu-nguyen-1545590-min1614257567.jpg', NULL, '353.5 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:52:48', '2021-02-25 17:52:48'),
(170, 'pexels-andrea-piacquadio-3768131-min.jpg', 'pexels-andrea-piacquadio-3768131-min1614257583.jpg', NULL, '316.33 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:53:06', '2021-02-25 17:53:06'),
(171, 'pexels-cottonbro-6157226 (1)-min.jpg', 'pexels-cottonbro-6157226-1-min1614257602.jpg', NULL, '301.67 KB', '1920 x 1280 pixels', NULL, '2021-02-25 17:53:24', '2021-02-25 17:53:24'),
(172, 'pexels-keira-burton-6147207-min.jpg', 'pexels-keira-burton-6147207-min1614257627.jpg', NULL, '314.47 KB', '1920 x 1226 pixels', NULL, '2021-02-25 17:53:48', '2021-02-25 17:53:48'),
(173, 'x-genious-logo-fb-pro.png', 'x-genious-logo-fb-pro1614273913.png', NULL, '150.18 KB', '1000 x 1000 pixels', NULL, '2021-02-25 22:25:13', '2021-02-25 22:25:13'),
(174, '02.jpg', '021614446235.jpg', NULL, '112.64 KB', '357 x 536 pixels', NULL, '2021-02-27 22:17:15', '2021-02-27 22:17:15'),
(175, '03.jpg', '031614447426.jpg', NULL, '39.62 KB', '360 x 207 pixels', NULL, '2021-02-27 22:37:06', '2021-02-27 22:37:06'),
(176, 'bg-min.jpg', 'bg-min1614512964.jpg', NULL, '267.81 KB', '1138 x 1155 pixels', NULL, '2021-02-28 16:49:25', '2021-02-28 16:49:25'),
(179, '04-min.png', '04-min1614664748.png', NULL, '321.38 KB', '944 x 676 pixels', NULL, '2021-03-02 10:59:09', '2021-03-02 10:59:09'),
(180, 'bg.jpg', 'bg1614700521.jpg', NULL, '176.43 KB', '555 x 485 pixels', NULL, '2021-03-02 20:55:21', '2021-03-02 20:55:21'),
(181, 'download.jpeg', 'download1615321224.jpeg', NULL, '10.05 KB', '277 x 182 pixels', NULL, '2021-03-10 01:20:24', '2021-03-10 01:20:24'),
(182, 'paypal.png', 'paypal1615321225.png', NULL, '5.54 KB', '361 x 140 pixels', NULL, '2021-03-10 01:20:25', '2021-03-10 01:20:25'),
(183, 'paytm-logo-630x336.jpeg', 'paytm-logo-630x3361615321747.jpeg', NULL, '18.17 KB', '630 x 336 pixels', NULL, '2021-03-10 01:29:08', '2021-03-10 01:29:08'),
(184, 'stripe.png', 'stripe1615321788.png', NULL, '3.28 KB', '318 x 159 pixels', NULL, '2021-03-10 01:29:48', '2021-03-10 01:29:48'),
(185, '216-2164303_razorpay-logo-png.png', '216-2164303-razorpay-logo-png1615321852.png', NULL, '20.27 KB', '900 x 230 pixels', NULL, '2021-03-10 01:30:52', '2021-03-10 01:30:52'),
(186, 'paystack.png', 'paystack1615321887.png', NULL, '2.86 KB', '301 x 167 pixels', NULL, '2021-03-10 01:31:27', '2021-03-10 01:31:27'),
(187, 'mollie.png', 'mollie1615321921.png', NULL, '2.11 KB', '301 x 167 pixels', NULL, '2021-03-10 01:32:01', '2021-03-10 01:32:01'),
(188, 'flutterwave-logo-vector.png', 'flutterwave-logo-vector1615321957.png', NULL, '4.51 KB', '900 x 500 pixels', NULL, '2021-03-10 01:32:37', '2021-03-10 01:32:37'),
(189, '79412a34ea6a84ad988a7141aa7299be.jpeg', '79412a34ea6a84ad988a7141aa7299be1615322824.jpeg', NULL, '9.91 KB', '580 x 386 pixels', NULL, '2021-03-10 01:47:05', '2021-03-10 01:47:05'),
(190, '01-min1599286982.jpg', '01-min15992869821623736111.jpg', NULL, '201.4 KB', '1280 x 1000 pixels', NULL, '2021-06-15 09:48:31', '2021-06-15 09:48:31'),
(191, 'bg.png', 'bg1624256716.png', NULL, '39.6 KB', '556 x 276 pixels', NULL, '2021-06-21 10:25:16', '2021-06-21 10:25:16'),
(192, '01.png', '011626158728.png', NULL, '737.83 KB', '1920 x 1001 pixels', NULL, '2021-07-13 10:45:29', '2021-07-13 10:45:29'),
(193, 'Group 9381.png', 'group-93811626161188.png', NULL, '6.65 KB', '80 x 80 pixels', NULL, '2021-07-13 11:26:28', '2021-07-13 11:26:28'),
(194, 'desktop responds 1.jpeg', 'desktop-responds-11626161235.jpeg', NULL, '111.08 KB', '1586 x 620 pixels', NULL, '2021-07-13 11:27:16', '2021-07-13 11:27:16'),
(195, 'cta-bg-min.jpg', 'cta-bg-min1626161299.jpg', NULL, '168.99 KB', '1920 x 807 pixels', 1, '2021-07-13 11:28:20', '2021-07-13 11:28:20'),
(196, 'pexels-rodnae-productions-6646917.jpg', 'pexels-rodnae-productions-66469171626164055.jpg', NULL, '416.14 KB', '1920 x 1280 pixels', 1, '2021-07-13 12:14:16', '2021-07-13 12:14:16'),
(197, 'header-bg-min.jpg', 'header-bg-min1627064076.jpg', NULL, '225.12 KB', '1920 x 1243 pixels', 1, '2021-07-23 22:14:37', '2021-07-23 22:14:37'),
(198, 'pexels-mart-production-8106261.jpg', 'pexels-mart-production-81062611627279410.jpg', NULL, '409.25 KB', '1920 x 1280 pixels', 1, '2021-07-26 10:03:31', '2021-07-26 10:03:31'),
(199, 'pexels-spencer-selover-775358.jpg', 'pexels-spencer-selover-7753581627279748.jpg', NULL, '43.56 KB', '500 x 500 pixels', 1, '2021-07-26 10:09:08', '2021-07-26 10:09:08'),
(200, 'section-line-shape.png', 'section-line-shape1631522107.png', NULL, '1.69 KB', '182 x 107 pixels', NULL, '2021-09-13 02:35:07', '2021-09-13 02:35:07'),
(201, 'banner.jpg', 'banner1631522125.jpg', NULL, '1.15 MB', '1920 x 802 pixels', NULL, '2021-09-13 02:35:26', '2021-09-13 02:35:26'),
(202, '02.png', '021631615402.png', NULL, '2.76 KB', '151 x 29 pixels', NULL, '2021-09-14 04:30:02', '2021-09-14 04:30:02'),
(203, '01.png', '011631615402.png', NULL, '2.61 KB', '151 x 41 pixels', NULL, '2021-09-14 04:30:02', '2021-09-14 04:30:02'),
(204, '03.png', '031631615403.png', NULL, '2.14 KB', '151 x 35 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(205, '04.png', '041631615403.png', NULL, '2.21 KB', '151 x 17 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(206, 'client1.png', 'client11631615403.png', NULL, '2.72 KB', '179 x 31 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(207, 'client2.png', 'client21631615403.png', NULL, '4.97 KB', '179 x 72 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(208, 'client3.png', 'client31631615403.png', NULL, '4.57 KB', '177 x 71 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(209, 'client4.png', 'client41631615403.png', NULL, '4.16 KB', '179 x 60 pixels', NULL, '2021-09-14 04:30:03', '2021-09-14 04:30:03'),
(210, 'client5.png', 'client51631615404.png', NULL, '3.89 KB', '116 x 60 pixels', NULL, '2021-09-14 04:30:04', '2021-09-14 04:30:04'),
(211, '01.jpg', '011631688911.jpg', NULL, '36.13 KB', '262 x 276 pixels', NULL, '2021-09-15 00:55:11', '2021-09-15 00:55:11'),
(212, 'events.jpg', 'events1631688921.jpg', NULL, '139.08 KB', '520 x 597 pixels', NULL, '2021-09-15 00:55:21', '2021-09-15 00:55:21'),
(213, '01.jpg', '011632045738.jpg', NULL, '34.59 KB', '295 x 204 pixels', 4, '2021-09-19 04:02:18', '2021-09-19 04:02:18'),
(214, '02.jpg', '021632045746.jpg', NULL, '30.65 KB', '295 x 204 pixels', 4, '2021-09-19 04:02:26', '2021-09-19 04:02:26'),
(215, '03.jpg', '031632045746.jpg', NULL, '39.29 KB', '295 x 204 pixels', 4, '2021-09-19 04:02:27', '2021-09-19 04:02:27'),
(216, '03.jpg', '031632045786.jpg', NULL, '29.8 KB', '262 x 276 pixels', 4, '2021-09-19 04:03:06', '2021-09-19 04:03:06'),
(217, 'events.jpg', 'events1632045786.jpg', NULL, '139.08 KB', '520 x 597 pixels', 4, '2021-09-19 04:03:06', '2021-09-19 04:03:06'),
(218, 'banner-bg-sh.jpg', 'banner-bg-sh1632222343.jpg', NULL, '220.53 KB', '1761 x 839 pixels', NULL, '2021-09-21 05:05:44', '2021-09-21 05:05:44'),
(219, 'banner-bg-sh2.jpg', 'banner-bg-sh21632222544.jpg', NULL, '699.83 KB', '1761 x 839 pixels', NULL, '2021-09-21 05:09:04', '2021-09-21 05:09:04'),
(220, 'PayFast-Press-Release-Image-01.jpg', 'payfast-press-release-image-011632313432.jpg', NULL, '102.44 KB', '2500 x 1250 pixels', NULL, '2021-09-22 06:23:53', '2021-09-22 06:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Primary Menu', '[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Home\",\"purl\":\"@url\"},{\"ptype\":\"static\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"about\",\"pname\":\"About\",\"children\":[{\"ptype\":\"static\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"image_gallery\",\"pname\":\"Image Gallery\"},{},{},{},{},{\"ptype\":\"static\",\"id\":8,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"testimonial\",\"pname\":\"Testimonial\"},{},{},{},{},{\"ptype\":\"static\",\"id\":12,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"team\",\"pname\":\"Team Member\"},{},{},{},{}]},{\"ptype\":\"custom\",\"id\":16,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Pages\",\"purl\":\"\",\"children\":[{\"ptype\":\"pages\",\"id\":17,\"antarget\":\"\",\"icon\":\"\",\"pid\":1},{},{},{},{\"ptype\":\"pages\",\"id\":20,\"antarget\":\"\",\"icon\":\"\",\"pid\":2},{},{},{},{\"ptype\":\"static\",\"id\":23,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"donation\",\"pname\":\"Donations\"},{},{\"ptype\":\"static\",\"pslug\":\"support_ticket\",\"pname\":\"Support Ticket\",\"id\":142},{\"ptype\":\"static\",\"id\":24,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"success-story\",\"pname\":\"set menu title from page settings\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":42,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"donor\",\"pname\":\"Donor List\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":61,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"career_with_us\",\"pname\":\"Career With Us\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":80,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"faq\",\"pname\":\"FAQ\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}]},{\"items_id\":\"2,3,4,5,6,19,20,21\",\"ptype\":\"App\\\\MenuBuilder\\\\MegaMenus\\\\DonationMegaMenu\",\"id\":129,\"antarget\":\"\",\"icon\":\"\"},{\"ptype\":\"static\",\"id\":130,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"events\",\"pname\":\"Events\"},{\"ptype\":\"static\",\"id\":131,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"blog\",\"pname\":\"Blog\"},{\"ptype\":\"static\",\"id\":132,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"contact\",\"pname\":\"Contact\"}]', 'default', '2020-05-28 05:53:38', '2021-09-20 22:55:39'),
(2, 'Menu with Icon', '[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Home\",\"purl\":\"@url\"}]', '', '2020-06-01 02:54:39', '2021-06-17 13:20:18'),
(3, 'Useful Links', '[{\"icon\":\"fas fa-angle-right\",\"pname\":\"Home\",\"purl\":\"@url\",\"ptype\":\"custom\",\"id\":1},{\"icon\":\"fas fa-angle-right\",\"pslug\":\"about_page_slug\",\"pname\":\"about_page_en_name\",\"ptype\":\"static\",\"id\":2},{\"icon\":\"fas fa-angle-right\",\"pslug\":\"service_page_slug\",\"pname\":\"service_page_en_name\",\"ptype\":\"static\",\"id\":3},{\"icon\":\"fas fa-angle-right\",\"pslug\":\"work_page_slug\",\"pname\":\"work_page_en_name\",\"ptype\":\"static\",\"id\":4}]', NULL, '2020-06-18 01:33:46', '2020-06-18 01:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_06_180949_create_admins_table', 1),
(5, '2019_12_07_071950_create_contact_info_items_table', 1),
(6, '2019_12_07_082524_create_static_options_table', 1),
(7, '2019_12_09_063224_create_testimonials_table', 1),
(8, '2019_12_10_125607_create_social_icons_table', 1),
(9, '2019_12_10_210247_create_blog_categories_table', 1),
(10, '2019_12_11_074345_create_blogs_table', 1),
(11, '2019_12_13_221931_create_languages_table', 1),
(12, '2019_12_29_113138_create_team_members_table', 1),
(13, '2020_01_25_155448_create_pages_table', 1),
(14, '2020_01_28_054211_create_faqs_table', 1),
(15, '2020_02_04_010636_create_newsletters_table', 1),
(16, '2020_03_29_075123_create_admin_roles_table', 1),
(17, '2020_04_14_082508_create_media_uploads_table', 1),
(18, '2020_04_22_065550_create_jobs_table', 1),
(19, '2020_04_22_065603_create_jobs_categories_table', 1),
(20, '2020_04_23_140942_create_events_table', 1),
(21, '2020_04_23_141011_create_events_categories_table', 1),
(22, '2020_06_14_081955_create_widgets_table', 1),
(23, '2020_07_02_125439_create_job_applicants_table', 1),
(24, '2020_07_04_143731_create_event_attendances_table', 1),
(25, '2020_07_04_173333_create_event_payment_logs_table', 1),
(26, '2020_07_06_154309_create_causes_table', 1),
(27, '2020_07_17_162008_create_image_galleries_table', 2),
(28, '2020_12_04_062950_create_image_gallery_categories_table', 2),
(29, '2021_02_19_092255_create_cause_updates_table', 3),
(30, '2020_07_07_150250_create_cause_logs_table', 4),
(31, '2021_02_20_08115319_create_cause_categories_table', 5),
(32, '2021_03_24_140243_create_menus_table', 5),
(33, '2021_03_27_113444_create_counterups_table', 5),
(34, '2021_04_08_122116_create_topbar_infos_table', 5),
(35, '2021_04_18_132805_create_header_sliders_table', 5),
(36, '2021_06_24_065557_create_comments_table', 5),
(37, '2021_07_04_052916_create_donation_withdraws_table', 5),
(38, '2021_07_23_160619_add_column_to_user_table', 6),
(39, '2021_07_23_183955_add_new_column_to_newsletters_table', 7),
(40, '2021_07_23_192801_create_permission_tables', 8),
(41, '2021_09_13_105614_create_success_stories_table', 9),
(42, '2021_09_13_110246_create_success_story_categories_table', 9),
(43, '2021_09_14_100349_create_client_areas_table', 10),
(44, '2021_09_19_044631_create_flag_reports_table', 11),
(45, '2021_09_19_044701_create_medical_documents_table', 11),
(46, '2021_09_19_090907_add_new_column_to_causes_table', 12),
(47, '2021_09_20_122226_create_support_tickets_table', 13),
(48, '2021_09_20_122306_create_support_ticket_messages_table', 13),
(49, '2021_09_20_124001_create_support_ticket_departments_table', 13),
(50, '2021_09_21_112550_add_badge_to_causes_table', 14),
(51, '2021_09_21_120538_add_emmergency_to_causes_table', 15),
(52, '2021_09_21_120623_add_emmergency_title_to_causes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Admin', 1),
(2, 'App\\Admin', 3),
(3, 'App\\Admin', 4),
(2, 'App\\Admin', 5),
(3, 'App\\Admin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `page_content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `meta_tags`, `meta_description`, `page_content`, `status`, `created_at`, `updated_at`, `meta_title`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `visibility`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', 'dynamic page', 'this is dynamic page meta description', '<p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Welcome to fundorex!</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">These terms and conditions outline the rules and regulations for the use of fundorex\'s Website, located at http://xgenious.com/laravel/fundorex.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">By accessing this website we assume you accept these terms and conditions. Do not continue to use fundorex if you do not agree to take all of the terms and conditions stated on this page.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company’s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Cookies</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We employ the use of cookies. By accessing fundorex, you agreed to use cookies in agreement with the fundorex\'s Privacy Policy.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">License</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Unless otherwise stated, fundorex and/or its licensors own the intellectual property rights for all material on fundorex. All intellectual property rights are reserved. You may access this from fundorex for your own personal use subjected to restrictions set in these terms and conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">You must not:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>Republish material from fundorex</li><li>Sell, rent or sub-license material from fundorex</li><li>Reproduce, duplicate or copy material from fundorex</li><li>Redistribute content from fundorex</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<a href=\"https://www.termsandconditionsgenerator.com/\" style=\"color: rgb(102, 102, 102);\">Terms And Conditions Generator</a>.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. fundorex does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of fundorex,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, fundorex shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">fundorex reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">You warrant and represent that:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li><li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li><li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li><li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">You hereby grant fundorex a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Hyperlinking to our Content</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The following organizations may link to our Website without prior written approval:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>Government agencies;</li><li>Search engines;</li><li>News organizations;</li><li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li><li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We may consider and approve other link requests from the following types of organizations:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>commonly-known consumer and/or business information sources;</li><li>dot.com community sites;</li><li>associations or other groups representing charities;</li><li>online directory distributors;</li><li>internet portals;</li><li>accounting, law and consulting firms; and</li><li>educational institutions and trade associations.</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of fundorex; and (d) the link is in the context of general resource information.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to fundorex. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Approved organizations may hyperlink to our Website as follows:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>By use of our corporate name; or</li><li>By use of the uniform resource locator being linked to; or</li><li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">No use of fundorex\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">iFrames</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Content Liability</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Your Privacy</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Please read Privacy Policy</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Reservation of Rights</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Removal of links from our website</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p><h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Disclaimer</span></h3><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>limit or exclude our or your liability for death or personal injury;</li><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></ul><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', 'publish', '2020-05-28 05:57:59', '2021-07-11 17:37:08', NULL, NULL, NULL, NULL, 'everyone'),
(2, 'Privacy Policy', 'privacy-policy', NULL, NULL, '<p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">At fundorex, accessible from https://xgenious.com/laravel/fundorex/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by fundorex and how we use it.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in fundorex. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.privacypolicygenerator.info/\" style=\"color: rgb(102, 102, 102);\">Privacy Policy Generator</a>.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Consent</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Information we collect</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">How we use your information</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We use the information we collect in various ways, including to:</p><ul style=\"margin-bottom: 10px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>Provide, operate, and maintain our website</li><li>Improve, personalize, and expand our website</li><li>Understand and analyze how you use our website</li><li>Develop new products, services, features, and functionality</li><li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li><li>Send you emails</li><li>Find and prevent fraud</li></ul><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Log Files</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">fundorex follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Cookies and Web Beacons</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Like any other website, fundorex uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">For more general information on cookies, please read&nbsp;<a href=\"https://www.privacypolicyonline.com/what-are-cookies/\" style=\"color: rgb(102, 102, 102);\">\"What Are Cookies\"</a>.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Advertising Partners Privacy Policies</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">You may consult this list to find the Privacy Policy for each of the advertising partners of fundorex.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on fundorex, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Note that fundorex has no access to or control over these cookies that are used by third-party advertisers.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Third Party Privacy Policies</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">fundorex\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">CCPA Privacy Rights (Do Not Sell My Personal Information)</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Under the CCPA, among other rights, California consumers have the right to:</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Request that a business delete any personal data about the consumer that a business has collected.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">GDPR Data Protection Rights</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p><h2 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(102, 102, 102); margin-bottom: 18px; font-size: 16px;\">Children\'s Information</h2><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p><p style=\"margin-bottom: 20px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">fundorex does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', 'publish', '2020-07-24 21:01:55', '2021-07-11 17:35:40', NULL, NULL, NULL, NULL, 'everyone');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dvrobin4@gmail.com', 'tBrVsCSxrJA0eJsOSkpFyNgeXleI1p', NULL),
('rajivkissy@gmail.com', 'lgcF2ZVWyOOZTG6BiP3c7gUmchTKDA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'user-list', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(6, 'user-create', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(7, 'user-edit', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(8, 'user-delete', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(9, 'newsletter-list', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(10, 'newsletter-create', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(11, 'newsletter-mail-send', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(12, 'newsletter-delete', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(13, 'blog-list', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(14, 'blog-create', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(15, 'blog-edit', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(16, 'blog-delete', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(17, 'blog-page-settings', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(18, 'blog-single-page-settings', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(19, 'blog-category-list', 'admin', '2021-07-24 21:46:18', '2021-07-24 21:46:18'),
(20, 'blog-category-create', 'admin', '2021-07-24 21:46:18', '2021-07-24 21:46:18'),
(21, 'blog-category-edit', 'admin', '2021-07-24 21:46:19', '2021-07-24 21:46:19'),
(22, 'blog-category-delete', 'admin', '2021-07-24 21:46:19', '2021-07-24 21:46:19'),
(23, 'image-gallery-list', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(24, 'image-gallery-create', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(25, 'image-gallery-edit', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(26, 'image-gallery-delete', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(27, 'image-gallery-category-list', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(28, 'image-gallery-category-create', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(29, 'image-gallery-category-edit', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(30, 'image-gallery-category-delete', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(31, 'image-gallery-page-settings', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(32, 'faq-list', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(33, 'faq-create', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(34, 'faq-edit', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(35, 'faq-delete', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(36, 'team-member-list', 'admin', '2021-07-24 22:44:27', '2021-07-24 22:44:27'),
(37, 'team-member-create', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(38, 'team-member-edit', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(39, 'team-member-delete', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(40, 'page-list', 'admin', '2021-07-25 10:10:51', '2021-07-25 10:10:51'),
(41, 'page-create', 'admin', '2021-07-25 10:10:51', '2021-07-25 10:10:51'),
(42, 'page-edit', 'admin', '2021-07-25 10:10:52', '2021-07-25 10:10:52'),
(43, 'page-delete', 'admin', '2021-07-25 10:10:52', '2021-07-25 10:10:52'),
(44, 'testimonial-list', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(45, 'testimonial-create', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(46, 'testimonial-edit', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(47, 'testimonial-delete', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(48, 'counterup-list', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(49, 'counterup-create', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(50, 'counterup-edit', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(51, 'counterup-delete', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(52, 'job-list', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(53, 'job-create', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(54, 'job-edit', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(55, 'job-delete', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(56, 'job-category-list', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(57, 'job-category-create', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(58, 'job-category-edit', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(59, 'job-category-delete', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(60, 'job-applicant-view', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(61, 'job-applicant-delete', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(62, 'job-applicant-mail', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(63, 'job-applicant-report', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(64, 'job-settings', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(65, 'job-applicant-list', 'admin', '2021-07-25 11:37:19', '2021-07-25 11:37:19'),
(66, 'event-list', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(67, 'event-create', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(68, 'event-edit', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(69, 'event-delete', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(70, 'event-category-list', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(71, 'event-category-create', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(72, 'event-category-edit', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(73, 'event-category-delete', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(74, 'event-attendance-list', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(75, 'event-attendance-delete', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(76, 'event-attendance-edit', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(77, 'event-attendance-mail', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(78, 'event-payment-log-list', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(79, 'event-payment-log-delete', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(80, 'event-payment-log-view', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(81, 'event-attendance-report', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(82, 'event-payment-log-report', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(83, 'event-single-settings', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(84, 'event-settings', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(85, 'event-payment-log-edit', 'admin', '2021-07-25 20:03:27', '2021-07-25 20:03:27'),
(86, 'donation-list', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(87, 'donation-create', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(88, 'donation-edit', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(89, 'donation-delete', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(90, 'donation-category-list', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(91, 'donation-category-create', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(92, 'donation-category-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(93, 'donation-category-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(94, 'donation-pending-cause', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(95, 'donation-withdraw-list', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(96, 'donation-withdraw-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(97, 'donation-withdraw-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(98, 'donation-withdraw-view', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(99, 'donation-payment-list', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(100, 'donation-payment-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(101, 'donation-payment-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(102, 'donation-cause-report', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(103, 'donation-settings', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(104, 'appearance-topbar-settings', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(105, 'appearance-navbar-settings', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(106, 'appearance-home-variant', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(107, 'appearance-menu-manage-list', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(108, 'appearance-menu-manage-edit', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(109, 'appearance-menu-manage-delete', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(110, 'appearance-widget-manage', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(111, 'appearance-form-builder', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(112, 'appearance-media-image', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(113, 'appearance-menu-manage-create', 'admin', '2021-07-25 22:21:13', '2021-07-25 22:21:13'),
(114, 'page-settings-home-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(115, 'page-settings-about-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(116, 'page-settings-event-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(117, 'page-settings-contact-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(118, 'page-settings-error-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(119, 'page-settings-maintain-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(120, 'general-settings-site-identity', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(121, 'general-settings-basic-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(122, 'general-settings-color-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(123, 'general-settings-typography', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(124, 'general-settings-seo-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(125, 'general-settings-third-party-script', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(126, 'general-settings-email-template', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(127, 'general-settings-smtp-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(128, 'general-settings-regenerate-media-image', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(129, 'general-settings-page-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(130, 'general-settings-payment-gateway', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(131, 'general-settings-custom-css', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(132, 'general-settings-custom-js', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(133, 'general-settings-cache-settings', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(134, 'general-settings-gdpr-settings', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(135, 'general-settings-sitemap', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(136, 'general-settings-rss-feed', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(137, 'general-settings-license', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(138, 'language-list', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(139, 'language-edit', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(140, 'language-create', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(141, 'language-delete', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(142, 'success-story-list', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(143, 'success-story-edit', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(144, 'success-story-create', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(145, 'success-story-delete', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(146, 'success-story-category-list', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(147, 'success-story-category-edit', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(148, 'success-story-category-create', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(149, 'success-story-category-delete', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(150, 'client-area-list', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(151, 'client-area-edit', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(152, 'client-area-create', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(153, 'client-area-delete', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(154, 'page-settings-success-story-page-manage', 'admin', '2021-09-16 04:43:50', '2021-09-16 04:43:50'),
(155, 'donations-flag-report-list', 'admin', '2021-09-18 23:16:18', '2021-09-18 23:16:18'),
(158, 'donations-flag-report-delete', 'admin', '2021-09-18 23:16:18', '2021-09-18 23:16:18'),
(163, 'donations-flag-report-view', 'admin', NULL, NULL),
(164, 'donations-flag-report-mail-send', 'admin', NULL, NULL),
(165, 'donations-flag-report-status-update', 'admin', '2021-09-19 10:29:29', NULL),
(166, 'general-settings-database-upgrade', 'admin', NULL, NULL),
(167, 'support-ticket-index', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(168, 'support-ticket-create', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(169, 'support-ticket-view', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(170, 'support-ticket-delete', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(171, 'support-ticket-page-settings', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(172, 'support-ticket-category-index', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(173, 'support-ticket-category-create', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(174, 'support-ticket-category-edit', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(175, 'support-ticket-category-delete', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin', '2021-07-24 18:04:30', '2021-07-24 21:01:22'),
(3, 'Super Admin', 'admin', '2021-07-24 18:04:30', '2021-07-24 18:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 2),
(10, 2),
(11, 2),
(13, 2),
(14, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(36, 2),
(37, 2),
(38, 2),
(40, 2),
(41, 2),
(42, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(76, 2),
(78, 2),
(80, 2),
(81, 2),
(83, 2),
(84, 2),
(86, 2),
(90, 2),
(95, 2),
(96, 2),
(99, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(139, 2),
(140, 2),
(142, 2),
(143, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2),
(148, 2),
(149, 2),
(150, 2),
(151, 2),
(152, 2),
(153, 2),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(115, 3),
(116, 3),
(117, 3),
(118, 3),
(119, 3),
(120, 3),
(121, 3),
(122, 3),
(123, 3),
(124, 3),
(125, 3),
(126, 3),
(127, 3),
(128, 3),
(129, 3),
(130, 3),
(131, 3),
(132, 3),
(133, 3),
(134, 3),
(135, 3),
(136, 3),
(137, 3),
(138, 3),
(139, 3),
(140, 3),
(141, 3),
(142, 3),
(143, 3),
(144, 3),
(145, 3),
(146, 3),
(147, 3),
(148, 3),
(149, 3),
(150, 3),
(151, 3),
(152, 3),
(153, 3),
(154, 3),
(155, 3),
(158, 3),
(163, 3),
(164, 3),
(165, 3),
(166, 3),
(167, 3),
(168, 3),
(169, 3),
(170, 3),
(171, 3),
(172, 3),
(173, 3),
(174, 3),
(175, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `lang`, `status`, `created_at`, `updated_at`, `icon_type`, `icon`, `img_icon`) VALUES
(1, 'Web Design', 'en', 'publish', '2020-06-01 01:46:07', '2020-12-06 21:33:40', 'icon', 'flaticon-security', NULL),
(2, 'Web Developer', 'en', 'publish', '2020-06-01 01:46:14', '2020-12-06 21:33:29', 'icon', 'flaticon-electronics', NULL),
(3, 'UX/UI Design', 'en', 'publish', '2020-06-01 01:46:38', '2020-12-06 21:33:15', 'icon', 'flaticon-group', NULL),
(4, 'Mobile Apps', 'en', 'publish', '2020-06-01 01:46:44', '2020-12-06 21:33:02', 'icon', 'flaticon-security', NULL),
(5, 'تطبيقات الموبايل', 'ar', 'publish', '2020-06-01 01:47:32', '2020-06-01 01:47:32', NULL, NULL, NULL),
(6, 'Mobil uygulamalar', 'tur', 'publish', '2020-06-01 01:47:38', '2020-06-01 01:47:38', NULL, NULL, NULL),
(7, 'Mobil uygulamalar...', 'sp', 'publish', '2020-06-01 01:47:43', '2020-06-01 01:47:43', NULL, NULL, NULL),
(8, 'Diseño UX / UI', 'sp', 'publish', '2020-06-01 01:48:09', '2020-06-01 01:48:09', NULL, NULL, NULL),
(9, 'Diseño UX / UI', 'tur', 'publish', '2020-06-01 01:48:27', '2020-06-01 01:48:27', NULL, NULL, NULL),
(10, 'تصميم UX / UI', 'ar', 'publish', '2020-06-01 01:48:33', '2020-06-01 01:48:33', NULL, NULL, NULL),
(11, 'مطور ويب', 'ar', 'publish', '2020-06-01 01:48:47', '2020-06-01 01:48:47', NULL, NULL, NULL),
(12, 'Desarrollador web', 'sp', 'publish', '2020-06-01 01:48:55', '2020-06-01 01:48:55', NULL, NULL, NULL),
(13, 'Web Geliştiricisi', 'tur', 'publish', '2020-06-01 01:49:01', '2020-06-01 01:49:01', NULL, NULL, NULL),
(14, 'Web Tasarım', 'tur', 'publish', '2020-06-01 01:49:12', '2020-06-01 01:49:12', NULL, NULL, NULL),
(15, 'Diseño web', 'sp', 'publish', '2020-06-01 01:49:32', '2020-06-01 01:49:32', NULL, NULL, NULL),
(16, 'تم تصميم الموقع', 'ar', 'publish', '2020-06-01 01:49:38', '2020-06-01 01:49:38', NULL, NULL, NULL),
(17, 'asdfadsfsad', 'sp', 'publish', '2020-12-01 19:17:24', '2020-12-01 19:17:24', 'icon', 'fas fa-exclamation-triangle', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-twitter', 'https://twitter.com/xgenious1', '2020-06-19 23:55:51', '2020-06-20 00:09:12'),
(2, 'fab fa-facebook-f', 'https://www.facebook.com/xgenious', '2020-06-19 23:56:17', '2021-02-27 13:28:11'),
(3, 'fab fa-pinterest-p', '#', '2020-06-20 00:10:18', '2020-06-20 00:10:18'),
(4, 'fab fa-instagram', '#', '2020-06-20 00:10:35', '2020-06-20 00:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1757, 'nullable|string', NULL, '2021-02-21 10:53:41', '2021-02-21 10:53:52'),
(2035, 'testimonial_page_meta_description', NULL, '2021-06-17 08:41:43', '2021-09-20 22:54:06'),
(2036, 'image_gallery_page_name', 'Image Gallery', '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2037, 'image_gallery_page_meta_tags', NULL, '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2038, 'image_gallery_page_meta_description', NULL, '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2039, 'donor_page_name', 'Donor List', '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2040, 'donor_page_meta_tags', NULL, '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2041, 'donor_page_meta_description', NULL, '2021-06-17 08:41:44', '2021-09-20 22:54:06'),
(2042, 'about_page_about_section_title', 'We are {color}charity{/color} foundation with 20 years experience', '2021-06-17 09:20:28', '2021-06-17 13:55:15'),
(2043, 'about_page_about_section_subtitle', 'About Us', '2021-06-17 09:20:28', '2021-06-17 13:55:15'),
(2044, 'about_page_about_section_description', '<p style=\"margin-bottom: 10px; font-family: Roboto, sans-serif; font-size: 14px; line-height: 24px; color: rgb(97, 97, 97); outline: none; -webkit-font-smoothing: antialiased; hyphens: auto;\"><span style=\"outline: none; -webkit-font-smoothing: antialiased; font-size: 60px; line-height: 60px;\">W</span>e are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as</p><p style=\"margin-bottom: 10px; font-family: Roboto, sans-serif; font-size: 14px; line-height: 24px; color: rgb(97, 97, 97); outline: none; -webkit-font-smoothing: antialiased; hyphens: auto;\">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional. consectetur adipiscing elit. Aenean egestas magna at porttitor vehicula nullam augue ipsum dolor.</p>', '2021-06-17 09:20:28', '2021-06-17 13:55:15'),
(2045, 'about_page_our_mission_title', 'Our Mission', '2021-06-17 09:28:55', '2021-06-27 10:19:07'),
(2046, 'about_page_our_mission_description', '<span style=\"color: rgb(97, 97, 97); font-family: Roboto, sans-serif; background-color: rgb(243, 240, 234);\">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</span>', '2021-06-17 09:28:55', '2021-06-27 10:19:07'),
(2047, 'about_page_our_mission_list_section_title', 'a:4:{i:0;s:31:\"If you want to change the world\";i:1;s:31:\"If you want to change the world\";i:2;s:31:\"If you want to change the world\";i:3;s:31:\"If you want to change the world\";}', '2021-06-17 09:28:55', '2021-06-27 10:19:08'),
(2048, 'about_page_what_we_do_area_subtitle', 'What we do', '2021-06-17 09:38:40', '2021-06-27 10:20:54'),
(2049, 'about_page_what_we_do_area_title', 'We have selected the following {color}problems{/color}', '2021-06-17 09:38:40', '2021-06-27 10:20:54'),
(2050, 'about_page_what_we_do_section_title', 'a:3:{i:0;s:9:\"Education\";i:1;s:7:\"Helping\";i:2;s:9:\"Treatment\";}', '2021-06-17 09:38:40', '2021-06-27 10:20:55'),
(2051, 'about_page_what_we_do_section_description', 'a:3:{i:0;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:1;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:2;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";}', '2021-06-17 09:38:40', '2021-06-27 10:20:55'),
(2052, 'about_page_testimonial_title', 'What {color}peoples{/color} say about us', '2021-06-17 09:41:16', '2021-06-27 10:21:07'),
(2053, 'about_page_testimonial_subtitle', 'Clients Testimonial', '2021-06-17 09:41:17', '2021-06-27 10:21:07'),
(2054, 'about_page_team_member_section_title', '{color}Volunteers{/color} who always support us', '2021-06-17 09:43:15', '2021-06-27 10:21:23'),
(2055, 'about_page_team_member_section_subtitle', 'Our Volunteer', '2021-06-17 09:43:15', '2021-06-27 10:21:23'),
(2056, 'contact_page_form_section_title', 'Keep In Touch', '2021-06-17 10:04:56', '2021-07-27 23:13:57'),
(2057, 'contact_page_form_submit_btn_text', 'Send Message', '2021-06-17 10:04:56', '2021-07-27 23:13:57'),
(2058, 'feedback_page_form_name_label', 'Name', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2059, 'feedback_page_form_email_label', 'Email', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2060, 'feedback_page_form_ratings_label', 'How Was Your Experience', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2061, 'feedback_page_form_description_label', 'Write Few Words', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2062, 'feedback_page_form_button_text', 'Submit Now', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2063, 'feedback_page_form_form_title', 'Leave Your Feedback', '2021-06-17 10:42:10', '2021-06-17 10:42:19'),
(2064, 'option_name', '191', '2021-06-21 10:25:22', '2021-06-21 10:25:22'),
(2065, 'event_page_bg_image', '191', '2021-06-21 10:27:02', '2021-06-27 10:23:16'),
(2066, 'home_page_variant', '06', '2021-06-26 13:48:43', '2021-09-22 06:52:02'),
(2067, 'site_logo', '128', '2021-06-26 14:46:58', '2021-06-26 14:46:58'),
(2068, 'site_favicon', '125', '2021-06-26 14:46:58', '2021-06-26 14:46:58'),
(2069, 'site_breadcrumb_bg', '129', '2021-06-26 14:46:58', '2021-06-26 14:46:58'),
(2070, 'site_white_logo', '126', '2021-06-26 14:46:58', '2021-06-26 14:46:58'),
(2071, 'site_title', 'Fundorex', '2021-06-26 14:50:21', '2021-07-26 09:34:59'),
(2072, 'site_tag_line', 'Crowdfunding Platform CMS', '2021-06-26 14:50:21', '2021-07-26 09:34:59'),
(2073, 'site_footer_copyright', '{copy}  {year}  All right reserved by  <a href=\"https://xgenious.com\">xgenious</a>', '2021-06-26 14:50:21', '2021-07-26 09:34:59'),
(2074, 'site_admin_panel_nav_sticky', 'on', '2021-06-26 14:50:21', '2021-07-05 18:09:13'),
(2075, 'site_frontend_nav_sticky', NULL, '2021-06-26 14:50:21', '2021-07-26 09:34:59'),
(2076, 'og_meta_image_for_site', '173', '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2077, 'site_rtl_enabled', NULL, '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2078, 'site_maintenance_mode', NULL, '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2079, 'site_payment_gateway', 'on', '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2080, 'site_sticky_navbar_enabled', 'on', '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2081, 'disable_backend_preloader', 'on', '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2082, 'disable_user_email_verify', NULL, '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2083, 'site_force_ssl_redirection', NULL, '2021-06-26 14:50:22', '2021-07-26 09:34:59'),
(2084, 'site_color', '#fcb11a', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2085, 'site_secondary_color', '#00bdc0', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2086, 'site_main_color_two', '#1a191f', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2087, 'site_heading_color', '#2b2a35', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2088, 'site_paragraph_color', '#616161', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2089, 'portfolio_home_color', '#ff4756', '2021-06-26 14:52:21', '2021-06-26 14:53:32'),
(2090, 'logistics_home_color', '#ff4039', '2021-06-26 14:52:22', '2021-06-26 14:53:32'),
(2091, 'body_font_family', 'Roboto', '2021-06-26 14:55:07', '2021-07-26 11:20:30'),
(2092, 'heading_font_family', 'Open Sans', '2021-06-26 14:55:07', '2021-07-26 11:20:30'),
(2093, 'heading_font', 'on', '2021-06-26 14:55:07', '2021-07-26 11:20:30'),
(2094, 'body_font_variant', 'a:3:{i:0;s:5:\"0,400\";i:1;s:5:\"0,500\";i:2;s:5:\"0,700\";}', '2021-06-26 14:55:07', '2021-07-26 11:20:30'),
(2095, 'heading_font_variant', 'a:4:{i:0;s:5:\"0,300\";i:1;s:5:\"0,400\";i:2;s:5:\"0,600\";i:3;s:5:\"0,700\";}', '2021-06-26 14:55:07', '2021-07-26 11:20:30'),
(2096, 'site_meta_tags', 'hello,meta,tag', '2021-06-26 14:58:21', '2021-06-26 14:58:21'),
(2097, 'site_meta_description', 'this is multilingual example meta tag for english', '2021-06-26 14:58:21', '2021-06-26 14:58:21'),
(2098, 'site_disqus_key', 'fundorex', '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2099, 'site_google_analytics', 'UA-173946136-1', '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2100, 'tawk_api_key', '5e0b3e167e39ea1242a27b69', '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2101, 'site_third_party_tracking_code', NULL, '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2102, 'site_google_captcha_v3_site_key', '6LdvUeQUAAAAAHKM02AWBjtKAAL0-AqUk_qkqa0O', '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2103, 'site_google_captcha_v3_secret_key', '6LdvUeQUAAAAABaCkkQbMY-z2XaqYsLSWwYgB6Ru', '2021-06-26 14:59:00', '2021-07-23 21:36:40'),
(2104, 'site_global_email', 'info@sohan.xgenious.com', '2021-06-26 14:59:51', '2021-09-21 00:39:10'),
(2105, 'site_global_email_template', '<p>Hello @username,</p><p><br></p><p>@message</p><p><br></p><p>Regards</p><p>@company</p>', '2021-06-26 14:59:51', '2021-09-21 00:39:10'),
(2106, 'service_query_success_message', 'Thanks for your message. we will contact you soon.', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2107, 'case_study_query_success_message', 'Thanks for your message. we will contact you soon.', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2108, 'quote_mail_success_message', 'Thanks for your contact. we will contact you soon.', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2109, 'contact_mail_success_message', 'Thanks for your contact!!', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2110, 'get_in_touch_mail_success_message', 'Thanks for your contact!!', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2111, 'apply_job_success_message', 'Your Application Is Submitted Successfully!!', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2112, 'order_mail_success_message', 'Thanks for your order. we will contact you soon.', '2021-06-26 15:04:03', '2021-06-26 15:04:03'),
(2113, 'event_attendance_mail_success_message', 'Thanks for your Booking. we will get back to you very soon.', '2021-06-26 15:04:04', '2021-06-26 15:04:04'),
(2114, 'feedback_form_mail_success_message', 'Thanks for your feedback!!', '2021-06-26 15:04:04', '2021-06-26 15:04:04'),
(2115, 'site_smtp_mail_mailer', 'smtp', '2021-06-26 15:05:21', '2021-07-07 12:45:30'),
(2116, 'site_smtp_mail_host', 'test@fff', '2021-06-26 15:05:21', '2021-07-07 12:45:30'),
(2117, 'site_smtp_mail_port', '465', '2021-06-26 15:05:21', '2021-07-07 12:45:30'),
(2118, 'site_smtp_mail_username', 'fff@fff', '2021-06-26 15:05:21', '2021-07-07 12:45:30'),
(2119, 'site_smtp_mail_password', 'ddfdfdf', '2021-06-26 15:05:22', '2021-07-07 12:45:30'),
(2120, 'site_smtp_mail_encryption', 'ssl', '2021-06-26 15:05:22', '2021-07-07 12:45:30'),
(2121, 'site_gdpr_cookie_title', 'Cookies & Privacy', '2021-06-26 15:25:54', '2021-07-11 17:33:38'),
(2122, 'site_gdpr_cookie_message', 'Is education residence conveying so so. Suppose shyness say ten behaved morning had. Any unsatiable assistance compliment occasional too reasonably advantages.', '2021-06-26 15:25:54', '2021-07-11 17:33:38'),
(2123, 'site_gdpr_cookie_more_info_label', 'More information', '2021-06-26 15:25:54', '2021-07-11 17:33:38'),
(2124, 'site_gdpr_cookie_more_info_link', '{url}/p/privacy-policy/2', '2021-06-26 15:25:54', '2021-07-11 17:33:38'),
(2125, 'site_gdpr_cookie_accept_button_label', 'Accept Cookie', '2021-06-26 15:25:55', '2021-07-11 17:33:38'),
(2126, 'site_gdpr_cookie_decline_button_label', 'Decline Cookie', '2021-06-26 15:25:55', '2021-07-11 17:33:38'),
(2127, 'site_gdpr_cookie_delay', '5000', '2021-06-26 15:25:55', '2021-07-11 17:33:38'),
(2128, 'site_gdpr_cookie_enabled', 'on', '2021-06-26 15:25:55', '2021-07-11 17:33:38'),
(2129, 'site_gdpr_cookie_expire', '30', '2021-06-26 15:25:55', '2021-07-11 17:33:38'),
(2130, 'preloader_default', '6', '2021-06-26 15:26:19', '2021-07-06 08:33:58'),
(2131, 'preloader_status', 'on', '2021-06-26 15:26:19', '2021-07-26 09:34:59'),
(2132, 'preloader_custom', NULL, '2021-06-26 15:26:19', '2021-07-06 08:33:58'),
(2133, 'preloader_custom_image', NULL, '2021-06-26 15:26:19', '2021-07-06 08:33:58'),
(2134, 'preloader_cacncel_button', 'on', '2021-06-26 15:26:19', '2021-07-06 08:33:58'),
(2135, 'site_rss_feed_description', 'The description of the feed.', '2021-06-26 15:29:23', '2021-06-26 15:29:23'),
(2136, 'site_rss_feed_title', 'My feeds', '2021-06-26 15:29:23', '2021-06-26 15:29:23'),
(2137, 'site_rss_feed_url', '/feeds', '2021-06-26 15:29:23', '2021-06-26 15:29:23'),
(2138, 'job_module_status', 'on', '2021-06-26 15:30:11', '2021-07-06 08:56:33'),
(2139, 'events_module_status', 'on', '2021-06-26 15:30:11', '2021-07-06 08:56:33'),
(2140, 'donations_module_status', 'on', '2021-06-26 15:30:11', '2021-07-06 08:56:33'),
(2141, 'item_purchase_key', 'ddd', '2021-06-26 15:30:27', '2021-06-26 15:30:27'),
(2142, 'item_license_status', 'not_verified', '2021-06-26 15:30:27', '2021-06-26 15:30:27'),
(2143, 'item_license_msg', 'Your Purchase Key Is Not Valid !!!', '2021-06-26 15:30:27', '2021-06-26 15:30:27'),
(2144, 'blog_page_read_more_btn_text', 'Read More', '2021-06-26 15:32:38', '2021-07-07 11:48:27'),
(2145, 'blog_page_item', '3', '2021-06-26 15:32:39', '2021-07-07 11:48:27'),
(2146, 'blog_page_recent_post_widget_items', '4', '2021-06-26 15:32:39', '2021-07-07 11:48:27'),
(2147, 'blog_single_page_related_post_title', 'Related Post', '2021-06-26 15:32:58', '2021-07-07 11:50:17'),
(2148, 'blog_single_page_share_title', 'Share', '2021-06-26 15:32:59', '2021-07-07 11:50:17'),
(2149, 'blog_single_page_category_title', 'Blog Categories', '2021-06-26 15:32:59', '2021-07-07 11:50:17'),
(2150, 'blog_single_page_recent_post_title', 'Related Posts', '2021-06-26 15:32:59', '2021-07-07 11:50:17'),
(2151, 'blog_single_page_tags_title', 'Tags', '2021-06-26 15:32:59', '2021-07-07 11:50:17'),
(2152, 'blog_single_page_recent_post_item', '3', '2021-06-26 15:32:59', '2021-07-07 11:50:17'),
(2153, 'site_image_gallery_post_items', '9', '2021-06-26 15:33:30', '2021-06-26 15:33:30'),
(2154, 'site_image_gallery_order', 'ASC', '2021-06-26 15:33:31', '2021-06-26 15:33:31'),
(2155, 'site_image_gallery_order_by', 'id', '2021-06-26 15:33:31', '2021-06-26 15:33:31'),
(2156, 'site_jobs_category_title', 'Job Category', '2021-06-26 15:35:37', '2021-07-07 11:55:14'),
(2157, 'site_job_post_items', '4', '2021-06-26 15:35:37', '2021-07-22 11:07:31'),
(2158, 'job_single_page_job_context_label', 'Job Context', '2021-06-26 15:36:18', '2021-07-22 11:07:31'),
(2159, 'job_single_page_job_responsibility_label', 'Job Responsibility', '2021-06-26 15:36:18', '2021-07-22 11:07:31'),
(2160, 'job_single_page_education_requirement_label', 'Educational Requirement', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2161, 'job_single_page_experience_requirement_label', 'Experience Requirement', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2162, 'job_single_page_additional_requirement_label', 'Additional Requirement', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2163, 'job_single_page_others_benefits_label', 'Others Benefits', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2164, 'job_single_page_apply_button_text', 'Apply To The Job', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2165, 'job_single_page_job_info_text', 'Jobs Information', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2166, 'job_single_page_company_name_text', 'Company Name', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2167, 'job_single_page_job_category_text', 'Job Category', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2168, 'job_single_page_job_position_text', 'Job Position', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2169, 'job_single_page_job_type_text', 'Job Type', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2170, 'job_single_page_salary_text', 'Salary', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2171, 'job_single_page_job_location_text', 'Job Location', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2172, 'job_single_page_job_deadline_text', 'Deadline', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2173, 'job_single_page_job_application_fee_text', 'Application Free', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2174, 'job_single_page_apply_form', 'on', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2175, 'job_single_page_applicant_mail', 'dvrobin4@gmail.com', '2021-06-26 15:36:19', '2021-07-22 11:07:31'),
(2176, 'job_success_page_title', 'Thank you', '2021-06-26 15:36:39', '2021-07-22 11:07:31'),
(2177, 'job_success_page_description', 'thanks, for choosing us.', '2021-06-26 15:36:39', '2021-07-22 11:07:31'),
(2178, 'job_cancel_page_title', 'Sorry!', '2021-06-26 15:37:10', '2021-07-22 11:07:31'),
(2179, 'job_cancel_page_description', 'your payment is not success', '2021-06-26 15:37:10', '2021-07-22 11:07:31'),
(2180, 'site_events_category_title', NULL, '2021-06-26 15:39:06', '2021-07-12 09:23:23'),
(2181, 'site_events_post_items', NULL, '2021-06-26 15:39:06', '2021-09-23 08:50:05'),
(2182, 'event_single_event_info_title', 'Event Info', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2183, 'event_single_date_title', 'Date', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2184, 'event_single_time_title', 'Time', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2185, 'event_single_cost_title', 'Cost', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2186, 'event_single_category_title', 'Category', '2021-06-26 15:39:39', '2021-06-26 15:39:40'),
(2187, 'event_single_organizer_title', 'Event Organizer', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2188, 'event_single_organizer_name_title', 'Name', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2189, 'event_single_organizer_email_title', 'gg@fgf', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2190, 'event_single_organizer_phone_title', '01875484888', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2191, 'event_single_organizer_website_title', 'Website', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2192, 'event_single_venue_title', 'Event Venue', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2193, 'event_single_venue_name_title', 'Name', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2194, 'event_single_venue_location_title', 'Locaiton', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2195, 'event_single_venue_phone_title', '+18274737136', '2021-06-26 15:39:39', '2021-06-26 15:39:39'),
(2196, 'event_single_available_ticket_text', 'Available Tickets', '2021-06-26 15:39:40', '2021-06-26 15:39:40'),
(2197, 'event_single_reserve_button_title', 'Reserve Your Seat', '2021-06-26 15:39:40', '2021-06-26 15:39:40'),
(2198, 'event_single_event_expire_text', 'Event Expired', '2021-06-26 15:39:41', '2021-06-26 15:39:41'),
(2199, 'donor_page_post_items', '6', '2021-06-26 15:41:18', '2021-07-13 22:55:09'),
(2200, 'donation_button_text', 'Donate Now', '2021-06-26 15:41:18', '2021-09-23 08:50:05'),
(2201, 'donation_goal_text', 'Goal', '2021-06-26 15:41:18', '2021-09-23 08:50:05'),
(2202, 'donation_raised_text', 'Raised', '2021-06-26 15:41:18', '2021-09-23 08:50:05'),
(2203, 'donation_notify_mail', 'test@sohan.xgenious.com', '2021-06-26 15:43:10', '2021-09-23 08:50:05'),
(2204, 'donation_custom_amount', '20,40,60,80,100,120', '2021-06-26 15:43:10', '2021-09-23 08:50:05'),
(2205, 'donation_default_amount', '20', '2021-06-26 15:43:10', '2021-09-23 08:50:05'),
(2206, 'donation_single_form_title', 'Donate for help', '2021-06-26 15:43:10', '2021-07-16 21:35:44'),
(2207, 'donation_single_form_button_text', 'Donate Now', '2021-06-26 15:43:10', '2021-09-23 08:50:05'),
(2208, 'donation_single_recent_donation_text', 'people have made a donation', '2021-06-26 15:43:10', '2021-09-23 08:50:05'),
(2209, 'donation_success_page_title', 'Thank You', '2021-06-26 15:43:26', '2021-09-23 08:50:05'),
(2210, 'donation_success_page_subtitle', NULL, '2021-06-26 15:43:26', '2021-06-26 15:43:26'),
(2211, 'donation_success_page_description', NULL, '2021-06-26 15:43:26', '2021-09-23 08:50:05'),
(2212, 'donation_cancel_page_title', 'Sorry', '2021-06-26 15:43:35', '2021-09-23 08:50:05'),
(2213, 'donation_cancel_page_subtitle', NULL, '2021-06-26 15:43:35', '2021-07-03 09:40:01'),
(2214, 'donation_cancel_page_description', NULL, '2021-06-26 15:43:35', '2021-09-23 08:50:05'),
(2215, 'event_success_page_title', 'Thank you', '2021-06-26 15:44:14', '2021-07-12 19:25:52'),
(2216, 'event_success_page_description', NULL, '2021-06-26 15:44:14', '2021-07-12 19:25:52'),
(2217, 'event_cancel_page_title', 'Sorry !!', '2021-06-26 15:44:21', '2021-07-12 19:25:52'),
(2218, 'event_cancel_page_subtitle', 'Payment Cancel For Event: {evname}', '2021-06-26 15:44:21', '2021-07-12 19:25:52'),
(2219, 'event_cancel_page_description', NULL, '2021-06-26 15:44:21', '2021-07-12 19:25:52'),
(2220, 'home_page_01_topbar_info_list_text', 'a:2:{i:0;s:15:\"+920 330 330 33\";i:1;s:23:\"test@sohan.xgenious.com\";}', '2021-06-26 15:45:55', '2021-06-26 15:46:10'),
(2221, 'home_page_01_topbar_info_list_icon_icon', 'a:2:{i:0;s:19:\"flaticon-phone-call\";i:1;s:15:\"fas fa-envelope\";}', '2021-06-26 15:45:55', '2021-06-26 15:46:10'),
(2222, 'home_page_navbar_button_subtitle', 'Make your', '2021-06-26 15:48:01', '2021-09-21 04:42:43'),
(2223, 'home_page_navbar_button_title', 'Campaign', '2021-06-26 15:48:01', '2021-09-21 04:42:43'),
(2224, 'home_page_navbar_button_status', 'on', '2021-06-26 15:48:01', '2021-09-21 04:42:43'),
(2225, 'home_page_navbar_button_url', NULL, '2021-06-26 15:48:01', '2021-09-21 04:42:43'),
(2226, 'home_page_navbar_button_icon', 'far fa-heart', '2021-06-26 15:48:01', '2021-09-21 04:42:43'),
(2227, 'home_page_01_about_us_title', 'Your {color}support{/color} can help us a lot', '2021-06-26 15:54:02', '2021-06-26 17:07:37'),
(2228, 'home_page_01_about_us_subtitle', 'About Us', '2021-06-26 15:54:02', '2021-06-26 17:07:37'),
(2229, 'home_page_01_about_us_donation_text', 'Donated', '2021-06-26 15:54:02', '2021-06-26 17:01:58'),
(2230, 'home_page_01_about_us_description', '<div>We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</div><div><br></div>', '2021-06-26 15:54:02', '2021-06-26 17:07:37'),
(2231, 'home_page_01_about_us_lists', 'If you want to change the world\r\nKeep the same cleaner for every visit\r\nOne-off, weekly or fortnightly visits', '2021-06-26 15:54:03', '2021-06-26 17:07:37'),
(2232, 'home_page_01_about_us_total_donation', '8860', '2021-06-26 15:54:03', '2021-06-26 17:07:37'),
(2233, 'home_page_03_about_us_right_image', '180', '2021-06-26 15:54:03', '2021-06-26 15:54:03'),
(2234, 'homepage_01_feature_section_icon', 'a:3:{i:0;s:12:\"flaticon-man\";i:1;s:16:\"flaticon-charity\";i:2;s:17:\"flaticon-ribbon-2\";}', '2021-06-26 15:55:12', '2021-06-26 15:55:34'),
(2235, 'homepage_01_feature_section_url', 'a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}', '2021-06-26 15:55:12', '2021-06-26 15:55:34'),
(2236, 'homepage_01_feature_section_title', 'a:3:{i:0;s:14:\"Be a volunteer\";i:1;s:14:\"Start Donating\";i:2;s:18:\"Join our community\";}', '2021-06-26 15:55:12', '2021-06-26 15:55:34'),
(2237, 'homepage_01_feature_section_description', 'a:3:{i:0;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:1;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:2;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";}', '2021-06-26 15:55:12', '2021-06-26 15:55:35'),
(2238, 'home_page_01_donation_category_subtitle', 'Causes Category', '2021-06-26 15:55:44', '2021-06-26 15:55:44'),
(2239, 'home_page_01_donation_category_title', 'Causes By {color}Category{/color}', '2021-06-26 15:55:44', '2021-06-26 15:55:44'),
(2240, 'home_page_01_featured_cause_area_subtitle', 'Picked by our team', '2021-06-26 15:55:51', '2021-06-26 15:55:51'),
(2241, 'home_page_01_featured_cause_area_title', 'Featured {color}Causes{/color}', '2021-06-26 15:55:51', '2021-06-26 15:55:51'),
(2242, 'home_page_01_featured_cause_area_button_text', 'Donate Now', '2021-06-26 15:55:51', '2021-06-26 15:55:51'),
(2243, 'home_page_01_cta_area_title', 'Works towards supporting underprivileged people', '2021-06-26 15:57:06', '2021-06-26 17:09:27'),
(2244, 'home_page_01_cta_area_video_url', 'https://www.youtube.com/watch?v=bdBG5VO01e0', '2021-06-26 15:57:06', '2021-06-26 17:09:27'),
(2245, 'home_page_01_cta_area_background_image', '149', '2021-06-26 15:57:06', '2021-06-26 17:09:27'),
(2246, 'home_page_01_latest_cause_subtitle', 'Donation Cause', '2021-06-26 15:57:24', '2021-06-29 12:22:47'),
(2247, 'home_page_01_latest_cause_readmore', 'Read More', '2021-06-26 15:57:24', '2021-06-29 12:22:47'),
(2248, 'home_page_01_latest_cause_button_text', 'All Donation Cause', '2021-06-26 15:57:24', '2021-06-29 12:22:47'),
(2249, 'home_page_01_latest_cause_title', 'Recently added donation {color}causes{/color}', '2021-06-26 15:57:24', '2021-06-29 12:22:48'),
(2250, 'home_page_01_latest_cause_items', '3', '2021-06-26 15:57:24', '2021-06-29 12:22:48'),
(2251, 'home_page_01_team_member_section_title', '{color}Volunteers{/color} who always support us', '2021-06-26 15:57:45', '2021-06-26 15:57:45'),
(2252, 'home_page_01_team_member_section_subtitle', 'Our Volunteer', '2021-06-26 15:57:45', '2021-06-26 15:57:45'),
(2253, 'home_page_01_team_member_items', '6', '2021-06-26 15:57:45', '2021-06-26 15:57:45'),
(2254, 'home_page_02_what_we_do_area_subtitle', 'What we do', '2021-06-26 15:59:39', '2021-06-26 17:04:56'),
(2255, 'home_page_02_what_we_do_area_title', 'We have selected the following {color}problems{/color}', '2021-06-26 15:59:39', '2021-06-26 17:04:56'),
(2256, 'homepage_02_what_we_do_section_icon', 'a:4:{i:0;s:20:\"flaticon-transfusion\";i:1;s:17:\"flaticon-donate-1\";i:2;s:17:\"flaticon-location\";i:3;s:16:\"flaticon-balloon\";}', '2021-06-26 15:59:40', '2021-06-26 17:04:56'),
(2257, 'homepage_02_what_we_do_section_url', 'a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}', '2021-06-26 15:59:40', '2021-06-26 17:04:56'),
(2258, 'homepage_02_what_we_do_section_title', 'a:4:{i:0;s:9:\"Education\";i:1;s:6:\"Health\";i:2;s:11:\"Environment\";i:3;s:16:\"Food & Nutrition\";}', '2021-06-26 15:59:40', '2021-06-26 17:04:56'),
(2259, 'homepage_02_what_we_do_section_description', 'a:4:{i:0;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:1;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:2;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";i:3;s:95:\"We are a non-profit organisation in USA that works towards supporting underprivileged children.\";}', '2021-06-26 15:59:40', '2021-06-26 17:04:56'),
(2260, 'home_page_02_what_we_do_left_image', '176', '2021-06-26 15:59:40', '2021-06-26 17:04:56'),
(2261, 'home_page_02_coutnerup_background_image', '131', '2021-06-26 16:00:05', '2021-06-26 16:00:05'),
(2262, 'home_page_01_testimonial_section_title', 'What {color}peoples{/color} say about us', '2021-06-26 16:00:24', '2021-06-26 16:00:24'),
(2263, 'home_page_01_testimonial_section_subtitle', 'Testimonial', '2021-06-26 16:00:24', '2021-06-26 16:00:24'),
(2264, 'home_01_testimonial_bg', '131', '2021-06-26 16:00:24', '2021-06-26 16:00:24'),
(2265, 'home_page_01_latest_event_subtitle', 'Latest Events', '2021-06-26 16:00:47', '2021-06-26 16:00:47'),
(2266, 'home_page_01_latest_event_button_text', 'Book Seat', '2021-06-26 16:00:47', '2021-06-26 16:00:47'),
(2267, 'home_page_01_latest_event_title', 'Attend {color}events{/color} those going around you', '2021-06-26 16:00:47', '2021-06-26 16:00:47'),
(2268, 'home_page_01_latest_event_items', '6', '2021-06-26 16:00:47', '2021-06-26 16:00:47'),
(2269, 'home_page_01_latest_news_title', 'Check latest {color}blog & news{/color}', '2021-06-26 16:01:00', '2021-06-26 16:01:00'),
(2270, 'home_page_01_latest_news_subtitle', 'Latest Blog', '2021-06-26 16:01:00', '2021-06-26 16:01:00'),
(2271, 'home_page_01_latest_news_items', '6', '2021-06-26 16:01:00', '2021-06-26 16:01:00'),
(2272, 'home_page_call_to_action_section_status', 'on', '2021-06-26 16:01:21', '2021-06-26 16:03:00'),
(2273, 'home_page_about_us_section_status', 'on', '2021-06-26 16:01:21', '2021-09-15 22:26:19'),
(2274, 'home_page_testimonial_section_status', 'on', '2021-06-26 16:01:21', '2021-09-15 22:26:19'),
(2275, 'home_page_latest_news_section_status', 'on', '2021-06-26 16:01:21', '2021-06-26 16:03:00'),
(2276, 'home_page_support_bar_section_status', 'on', '2021-06-26 16:01:21', '2021-06-26 16:03:00'),
(2277, 'home_page_team_member_section_status', 'on', '2021-06-26 16:01:21', '2021-09-15 22:26:19'),
(2278, 'home_page_contact_section_status', 'on', '2021-06-26 16:01:21', '2021-06-26 16:03:00'),
(2279, 'home_page_video_section_status', 'on', '2021-06-26 16:01:21', '2021-09-15 22:26:19'),
(2280, 'home_page_key_feature_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:18'),
(2281, 'home_page_what_we_do_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:18'),
(2282, 'home_page_cause_category_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:19'),
(2283, 'home_page_feature_cause_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:19'),
(2284, 'home_page_recent_cause_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:19'),
(2285, 'home_page_counterup_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:19'),
(2286, 'home_page_latest_events_section_status', 'on', '2021-06-26 16:31:21', '2021-09-15 22:26:19'),
(2287, 'home_page_latest_blog_section_status', 'on', '2021-06-26 16:31:22', '2021-09-15 22:26:19'),
(2288, 'home_page_header_slider_section_status', 'on', '2021-06-26 16:34:13', '2021-09-15 22:26:18'),
(2289, 'home_page_02_about_us_donation_text', 'Active Volunteers', '2021-06-26 17:01:58', '2021-06-26 17:01:58'),
(2290, 'home_page_02_about_us_short_description', '<span style=\"color: rgb(97, 97, 97); font-family: Roboto, sans-serif;\">We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.</span>', '2021-06-26 17:01:58', '2021-06-26 17:01:58'),
(2291, 'home_page_02_about_us_left_image', '174', '2021-06-26 17:01:59', '2021-06-26 17:01:59'),
(2292, 'home_page_02_about_us_right_bottom_image', '175', '2021-06-26 17:01:59', '2021-06-26 17:01:59'),
(2293, 'home_page_02_about_us_icon', 'flaticon-woman', '2021-06-26 17:01:59', '2021-06-26 17:01:59'),
(2294, 'home_page_01_about_us_right_image', '179', '2021-06-26 17:07:37', '2021-06-26 17:07:37'),
(2295, 'home_page_01_cta_area_signature_image', '148', '2021-06-26 17:09:27', '2021-06-26 17:09:27'),
(2296, 'about_page_slug', 'about', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2297, 'team_page_slug', 'team', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2298, 'faq_page_slug', 'faq', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2299, 'blog_page_slug', 'blog', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2300, 'contact_page_slug', 'contact', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2301, 'career_with_us_page_slug', 'career', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2302, 'events_page_slug', 'events', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2303, 'donation_page_slug', 'donation', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2304, 'testimonial_page_slug', 'testimonial', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2305, 'image_gallery_page_slug', 'image-gallery', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2306, 'donor_page_slug', 'donor-list', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2307, 'about_page_name', 'About', '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2308, 'about_page_meta_tags', NULL, '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2309, 'about_page_meta_description', NULL, '2021-06-27 09:33:47', '2021-09-20 22:54:03'),
(2310, 'team_page_name', 'Team Member', '2021-06-27 09:33:48', '2021-09-20 22:54:03'),
(2311, 'team_page_meta_tags', NULL, '2021-06-27 09:33:48', '2021-09-20 22:54:03'),
(2312, 'team_page_meta_description', NULL, '2021-06-27 09:33:48', '2021-09-20 22:54:04'),
(2313, 'faq_page_name', 'FAQ', '2021-06-27 09:33:48', '2021-09-20 22:54:04'),
(2314, 'faq_page_meta_tags', NULL, '2021-06-27 09:33:48', '2021-09-20 22:54:04'),
(2315, 'faq_page_meta_description', NULL, '2021-06-27 09:33:48', '2021-09-20 22:54:05'),
(2316, 'blog_page_name', 'Blog', '2021-06-27 09:33:48', '2021-09-20 22:54:05'),
(2317, 'blog_page_meta_tags', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2318, 'blog_page_meta_description', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2319, 'contact_page_name', 'Contact', '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2320, 'contact_page_meta_tags', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2321, 'contact_page_meta_description', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2322, 'career_with_us_page_name', 'Career With Us', '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2323, 'career_with_us_page_meta_tags', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2324, 'career_with_us_page_meta_description', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2325, 'events_page_name', 'Events', '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2326, 'events_page_meta_tags', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2327, 'events_page_meta_description', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2328, 'donation_page_name', 'Donations', '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2329, 'donation_page_meta_tags', NULL, '2021-06-27 09:33:49', '2021-09-20 22:54:05'),
(2330, 'donation_page_meta_description', NULL, '2021-06-27 09:33:50', '2021-09-20 22:54:05'),
(2331, 'testimonial_page_name', 'Testimonial', '2021-06-27 09:33:50', '2021-09-20 22:54:05'),
(2332, 'testimonial_page_meta_tags', NULL, '2021-06-27 09:33:50', '2021-09-20 22:54:05'),
(2333, 'about_page_about_us_section_status', 'on', '2021-06-27 10:17:10', '2021-06-27 10:17:10'),
(2334, 'about_page_our_mission_section_status', 'on', '2021-06-27 10:17:11', '2021-06-27 10:17:11'),
(2335, 'about_page_counterup_section_status', 'on', '2021-06-27 10:17:11', '2021-06-27 10:17:11'),
(2336, 'about_page_what_we_do_section_status', 'on', '2021-06-27 10:17:11', '2021-06-27 10:17:11'),
(2337, 'about_page_testimonial_section_status', 'on', '2021-06-27 10:17:11', '2021-06-27 10:17:11'),
(2338, 'about_page_team_member_section_status', 'on', '2021-06-27 10:17:11', '2021-06-27 10:17:11'),
(2339, 'about_page_our_mission_list_section_icon', 'a:4:{i:0;s:12:\"fas fa-check\";i:1;s:12:\"fas fa-check\";i:2;s:12:\"fas fa-check\";i:3;s:12:\"fas fa-check\";}', '2021-06-27 10:19:08', '2021-06-27 10:19:08'),
(2340, 'about_page_our_mission_left_image_image', '180', '2021-06-27 10:19:08', '2021-06-27 10:19:08'),
(2341, 'about_page_counterup_background_image', '149', '2021-06-27 10:19:31', '2021-06-27 10:19:31'),
(2342, 'about_page_what_we_do_section_icon', 'a:3:{i:0;s:20:\"flaticon-transfusion\";i:1;s:14:\"flaticon-house\";i:2;s:19:\"flaticon-solidarity\";}', '2021-06-27 10:20:43', '2021-06-27 10:20:55'),
(2343, 'about_page_what_we_do_section_url', 'a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}', '2021-06-27 10:20:43', '2021-06-27 10:20:55'),
(2344, 'about_page_testimonial_item', '4', '2021-06-27 10:21:07', '2021-06-27 10:21:07'),
(2345, 'about_page_team_member_item', '6', '2021-06-27 10:21:23', '2021-06-27 10:21:23'),
(2346, 'contact_page_form_receiving_mail', 'dvrobin4@gmail.com', '2021-06-27 10:26:38', '2021-07-27 23:13:57'),
(2347, 'contact_page_map_section_location', '2626 Angie Drive Santa Ana, CA 92701', '2021-06-27 10:26:55', '2021-07-07 12:37:39'),
(2348, 'contact_page_map_section_zoom', '15', '2021-06-27 10:26:55', '2021-07-07 12:37:39'),
(2349, 'contact_page_contact_info_section_status', 'on', '2021-06-27 10:27:19', '2021-06-27 10:27:19'),
(2350, 'contact_page_contact_section_status', 'on', '2021-06-27 10:27:19', '2021-06-27 10:27:19'),
(2351, 'contact_page_contact_form_fields', '{\"field_type\":[\"text\",\"text\",\"email\",\"textarea\"],\"field_name\":[\"name\",\"subject\",\"email\",\"message\"],\"field_placeholder\":[\"Your Name\",\"Subject\",\"Your Email\",\"Message\"],\"field_required\":{\"1\":\"on\",\"2\":\"on\"}}', '2021-06-27 10:37:05', '2021-07-26 11:10:55'),
(2352, 'order_page_form_fields', '{\"field_type\":[\"textarea\",\"file\"],\"field_name\":[\"message\",\"file\"],\"field_placeholder\":[\"Your Message\",\"Document\"],\"mimes_type\":{\"2\":\"mimes:jpg,jpeg,png\"}}', '2021-06-27 10:41:23', '2021-06-27 10:41:23'),
(2353, 'apply_job_page_form_fields', '{\"field_type\":[\"text\",\"file\",\"textarea\"],\"field_name\":[\"expected-salary\",\"cv\",\"additional-info\"],\"field_placeholder\":[\"Your NameYour Expected Salary\",\"Your CV\",\"About Yourself\"],\"mimes_type\":{\"1\":\"mimes:txt,pdf\"}}', '2021-06-27 10:43:55', '2021-09-17 23:50:01'),
(2354, 'event_attendance_form_fields', '{\"field_type\":[\"text\",\"email\",\"textarea\"],\"field_name\":[\"name\",\"email\",\"message\"],\"field_placeholder\":[\"name\",\"Your Email\",\"Your Message\"],\"field_required\":{\"2\":\"on\"}}', '2021-06-27 10:45:49', '2021-07-06 09:23:25'),
(2355, 'error_404_page_title', '404', '2021-06-27 10:50:05', '2021-06-27 10:50:05'),
(2356, 'error_404_page_subtitle', 'Oops! This Page Could Not Be Found', '2021-06-27 10:50:05', '2021-06-27 10:50:05'),
(2357, 'error_404_page_paragraph', 'Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable', '2021-06-27 10:50:05', '2021-06-27 10:50:05'),
(2358, 'error_404_page_button_text', 'Go To Home Page', '2021-06-27 10:50:06', '2021-06-27 10:50:06'),
(2359, 'maintain_page_title', 'We are on Scheduled Maintenance', '2021-06-27 11:01:56', '2021-07-03 08:19:50'),
(2360, 'maintain_page_description', 'way off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited.', '2021-06-27 11:01:56', '2021-07-03 08:19:50'),
(2361, 'maintain_page_logo', '126', '2021-06-27 11:01:57', '2021-07-02 18:49:09'),
(2362, 'maintain_page_background_image', '131', '2021-06-27 11:01:57', '2021-06-27 11:01:57'),
(2363, 'cash_on_delivery_preview_logo', '181', '2021-06-27 11:21:47', '2021-09-22 06:28:37'),
(2364, 'stripe_preview_logo', '184', '2021-06-27 11:21:47', '2021-09-22 06:28:37'),
(2365, 'paystack_preview_logo', '186', '2021-06-27 11:21:47', '2021-09-22 06:28:37'),
(2366, 'paystack_public_key', 'pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2367, 'paystack_secret_key', 'sk_test_2a458001d806c878aba51955b962b3c8ed78f04b', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2368, 'paystack_merchant_email', 'sopnilsohan03@gmail.com', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2369, 'razorpay_preview_logo', '185', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2370, 'paypal_preview_logo', '182', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2371, 'paypal_app_client_id', 'ATx-SYQyPtXHw1bZaBDhJUZabxbutIqAqqZORgvgEoK_-9MrAkUzYkbt8pSnUyKNEdNN3aJt8tcpcY1I', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2372, 'paypal_app_secret', 'ELJCWPUabUnnMamfw5-ZxaUsvir3KAJrPnAcSeS11znsroi45HP0p7y7vGZcYsBsAAi7Ou6kelCpj69K', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2373, 'paytm_preview_logo', '183', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2374, 'paytm_merchant_key', 'dv0XtmsPYpewNag&', '2021-06-27 11:21:48', '2021-09-22 06:28:37'),
(2375, 'paytm_merchant_mid', 'Digita57697814558795', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2376, 'paytm_merchant_website', 'WEBSTAGING', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2377, 'site_global_currency', 'USD', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2378, 'manual_payment_preview_logo', '189', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2379, 'site_manual_payment_name', 'Manual Payment', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2380, 'site_manual_payment_description', 'manual payment gateway description', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2381, 'razorpay_key', 'rzp_test_SXk7LZqsBPpAkj', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2382, 'razorpay_secret', 'Nenvq0aYArtYBDOGgmMH7JNv', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2383, 'stripe_publishable_key', 'pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2384, 'stripe_secret_key', 'sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw', '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2385, 'site_global_payment_gateway', NULL, '2021-06-27 11:21:49', '2021-09-22 06:28:38'),
(2386, 'site_usd_to_ngn_exchange_rate', '380', '2021-06-27 11:21:49', '2021-09-22 06:28:41'),
(2387, 'site_euro_to_ngn_exchange_rate', NULL, '2021-06-27 11:21:49', '2021-09-22 06:28:39'),
(2388, 'mollie_public_key', 'test_SMWtwR6W48QN2UwFQBUqRDKWhaQEvw', '2021-06-27 11:21:49', '2021-09-22 06:28:39'),
(2389, 'mollie_preview_logo', '187', '2021-06-27 11:21:49', '2021-09-22 06:28:39'),
(2390, 'flutterwave_preview_logo', '188', '2021-06-27 11:21:49', '2021-09-22 06:28:39'),
(2391, 'flutterwave_secret_key', 'FLWSECK_TEST-d37a42d8917db84f1b2f47c125252d0a-X', '2021-06-27 11:21:49', '2021-09-22 06:28:39'),
(2392, 'flutterwave_public_key', 'FLWPUBK_TEST-86cce2ec43c63e09a517290a8347fcab-X', '2021-06-27 11:21:49', '2021-09-22 06:28:40'),
(2393, 'site_currency_symbol_position', 'left', '2021-06-27 11:21:50', '2021-09-22 06:28:40'),
(2394, 'site_default_payment_gateway', 'paypal', '2021-06-27 11:21:50', '2021-09-22 06:28:40'),
(2395, 'manual_payment_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:40'),
(2396, 'paypal_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:40'),
(2397, 'paytm_test_mode', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2398, 'paypal_test_mode', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2399, 'paytm_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2400, 'razorpay_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2401, 'stripe_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2402, 'paystack_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2403, 'mollie_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2404, 'cash_on_delivery_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2405, 'flutterwave_gateway', 'on', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2406, 'site_usd_to_usd_exchange_rate', NULL, '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2407, 'site_usd_to_inr_exchange_rate', '74', '2021-06-27 11:21:50', '2021-09-22 06:28:41'),
(2408, 'event_attendance_page_title', 'Confirm Your Attendance', '2021-06-29 09:44:31', '2021-07-12 19:25:52'),
(2409, 'event_attendance_page_form_button_title', 'Confirm Attendance', '2021-06-29 09:44:31', '2021-07-12 19:25:52'),
(2410, 'event_attendance_receiver_mail', 'info@sohan.xgenious.com', '2021-06-29 09:44:31', '2021-07-12 19:25:52'),
(2411, 'cause_single_payment_in_seperate_page', 'on', '2021-06-29 17:36:05', '2021-07-15 21:20:29'),
(2412, 'cause_single_donate_button_text', 'Donate Now', '2021-06-29 17:36:05', '2021-09-23 08:50:05'),
(2413, 'site_admin_dark_mode', 'off', '2021-07-02 06:00:00', '2021-09-20 22:27:18'),
(2414, 'donation_admin_charge', '10', '2021-07-03 09:41:18', '2021-07-03 09:42:14'),
(2415, 'donation_admin_withdraw_charge', '20', '2021-07-03 09:41:18', '2021-07-03 09:42:14'),
(2416, 'donation_charge_active_deactive_button', 'on', '2021-07-03 14:05:03', '2021-09-23 08:50:05'),
(2417, 'charge_amount_type', 'percentage', '2021-07-03 14:05:03', '2021-09-23 08:50:05'),
(2418, 'charge_amount', '10', '2021-07-03 14:05:03', '2021-09-23 08:50:05'),
(2419, 'site_script_version', '1.0.0', '2021-07-03 14:05:03', '2021-07-03 14:05:03'),
(2420, 'disable_guest_mode_for_event_module', 'on', '2021-07-12 09:26:20', '2021-07-12 19:25:52'),
(2421, 'event_page_button_text', 'Book Seat', '2021-07-12 19:24:36', '2021-07-12 19:25:52'),
(2422, 'donation_single_faq_title', 'General Question', '2021-07-16 21:37:14', '2021-09-23 08:50:05'),
(2423, 'cause_single_donate_sidebar_text', 'Your Donation Details', '2021-07-16 21:48:00', '2021-09-23 08:50:05'),
(2424, 'enable_facebook_login', 'on', '2021-07-23 17:56:50', '2021-07-23 21:36:40'),
(2425, 'facebook_client_id', NULL, '2021-07-23 17:56:50', '2021-07-23 21:36:40'),
(2426, 'facebook_client_secret', NULL, '2021-07-23 17:56:50', '2021-07-23 21:36:40'),
(2427, 'enable_google_login', 'on', '2021-07-23 19:43:16', '2021-07-23 21:36:40'),
(2428, 'google_client_id', NULL, '2021-07-23 21:36:12', '2021-07-23 21:36:40'),
(2429, 'google_client_secret', NULL, '2021-07-23 21:36:12', '2021-07-23 21:36:40'),
(2430, 'home_page_04_header_area_title', 'Donate, Fundraise & Volunteer', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2431, 'home_page_04_header_area_subtitle', 'DONATE & SAVE PEOPLE', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2432, 'home_page_04_donate_button_text', 'DONATE NOW', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2433, 'home_page_04_donate_button_text_url', NULL, '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2434, 'home_page_04_right_side_heading', 'Donate us', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2435, 'home_page_04_right_side_donate_button_text', 'Donate Now', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2436, 'home_page_04_header_area_line_image', '200', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2437, 'home_page_04_header_area_bg_image', '201', '2021-09-13 02:32:56', '2021-09-13 02:51:41'),
(2438, 'home_page_04_feature_area_title', 'Our Causes', '2021-09-13 04:08:35', '2021-09-21 06:53:26'),
(2439, 'home_page_04_feature_area_subtitle', 'Featured Campaign', '2021-09-13 04:08:35', '2021-09-21 06:53:26'),
(2440, 'home_page_04_feature_area_donation_button_text', 'MAKE A DONATION', '2021-09-13 04:29:56', '2021-09-21 06:53:26'),
(2441, 'home_page_04_success_story_area_title', 'Our Success', '2021-09-13 23:26:58', '2021-09-13 23:30:57'),
(2442, 'home_page_04_success_story_area_subtitle', 'Our Success Stories', '2021-09-13 23:26:58', '2021-09-13 23:30:57'),
(2443, 'home_page_04_success_story_area_button_text', 'Read Details', '2021-09-13 23:26:58', '2021-09-13 23:30:57'),
(2444, 'home_page_04_success_story_area_item_show', '3', '2021-09-13 23:26:58', '2021-09-13 23:30:57'),
(2445, 'home_page_04_about_us_area_title', 'About Us', '2021-09-14 00:06:51', '2021-09-14 00:15:16'),
(2446, 'home_page_04_about_us_area_subtitle', 'Know About Us', '2021-09-14 00:06:52', '2021-09-14 00:15:16'),
(2447, 'home_page_04_about_us_area_description', 'Nullam sed condimentum lorem. Donec id enim condimentum, posuere tortor ac, dignissim risus. Curabitur vel congue lectus. Aliquam enim libero, mollis nec sodales vel, efficitur vel sapien. Proin rhoncus mi et sem sodales, sodales fermentum ex molestie. Etiam laoreet eleifend dolor a auctor. \r\n\r\nCurabitur nec dignissim arcu. In posuere elit ut magna suscipit, eget consectetur libero vestibulum. Cras maximus justo arcu, sit amet blandit nunc tristique in. Suspendisse tristique, ante a feugiat laoreet, turpis magna sagittis nulla.', '2021-09-14 00:06:52', '2021-09-14 00:15:16'),
(2448, 'home_page_04_about_us_area_button_text', 'Read More', '2021-09-14 00:06:52', '2021-09-14 00:15:16'),
(2449, 'home_page_04_about_us_area_button_url', '#', '2021-09-14 00:15:16', '2021-09-14 00:15:16'),
(2450, 'home_page_04_events_area_title', 'Our Events', '2021-09-14 00:55:14', '2021-09-14 01:11:40'),
(2451, 'home_page_04_events_area_subtitle', 'Upcoming Events', '2021-09-14 00:55:14', '2021-09-14 01:11:40'),
(2452, 'home_page_04_events_area_item_show', '4', '2021-09-14 00:55:14', '2021-09-14 01:11:40'),
(2453, 'home_page_04_recent_causes_area_title', 'Our Causes', '2021-09-14 01:28:44', '2021-09-14 01:41:04'),
(2454, 'home_page_04_recent_causes_area_subtitle', 'Recently Added Causes', '2021-09-14 01:28:44', '2021-09-14 01:41:04'),
(2455, 'home_page_04_recent_causes_area_button_text', 'Make A Donation', '2021-09-14 01:28:44', '2021-09-14 01:41:04'),
(2456, 'home_page_04_recent_causes_area_see_all_button_text', 'See All Causes', '2021-09-14 01:28:45', '2021-09-14 01:41:04'),
(2457, 'home_page_04_recent_causes_area_item_show', '3', '2021-09-14 01:41:04', '2021-09-14 01:41:04'),
(2458, 'home_page_04_recent_blog_area_title', 'Latest Blog', '2021-09-14 03:10:08', '2021-09-14 03:36:12'),
(2459, 'home_page_04_recent_blog_area_subtitle', 'Latest Blog & News', '2021-09-14 03:10:08', '2021-09-14 03:36:12'),
(2460, 'home_page_04_recent_blog_area_item_show', '4', '2021-09-14 03:10:08', '2021-09-14 03:36:12'),
(2461, 'home_page_05_rise_area_heading_title', 'Rise Your Hand', '2021-09-14 22:26:18', '2021-09-14 22:26:18'),
(2462, 'home_page_05_rise_area_button_text', 'Donate Now', '2021-09-14 22:26:18', '2021-09-14 22:26:18'),
(2463, 'home_page_05_feature_area_title', 'Our Causes', '2021-09-14 22:32:01', '2021-09-14 22:32:01'),
(2464, 'home_page_05_feature_area_subtitle', 'Featurd Campaign', '2021-09-14 22:32:01', '2021-09-14 22:32:01'),
(2465, 'home_page_05_feature_area_donation_button_text', 'Donate', '2021-09-14 22:32:01', '2021-09-14 22:32:01'),
(2466, 'home_page_05_category_area_title', 'Category', '2021-09-14 22:48:19', '2021-09-14 22:48:19'),
(2467, 'home_page_05_category_area_subtitle', 'Causes by Category', '2021-09-14 22:48:19', '2021-09-14 22:48:19'),
(2468, 'home_page_05_success_story_area_title', 'Success', '2021-09-14 23:26:20', '2021-09-14 23:57:39'),
(2469, 'home_page_05_success_story_area_subtitle', 'Success Stories', '2021-09-14 23:26:20', '2021-09-14 23:57:39'),
(2470, 'home_page_05_success_story_area_button_text', 'Read Details', '2021-09-14 23:26:20', '2021-09-14 23:57:39'),
(2471, 'home_page_05_success_story_area_item_show', '2', '2021-09-14 23:26:20', '2021-09-14 23:57:39'),
(2472, 'home_page_05_recent_causes_area_title', 'Our Causes', '2021-09-15 00:18:24', '2021-09-15 00:18:24'),
(2473, 'home_page_05_recent_causes_area_subtitle', 'Recently Added Causes', '2021-09-15 00:18:24', '2021-09-15 00:18:24'),
(2474, 'home_page_05_recent_causes_area_see_all_button_text', 'See All Causes', '2021-09-15 00:18:24', '2021-09-15 00:18:24'),
(2475, 'home_page_05_events_area_title', 'Our Events', '2021-09-15 00:36:05', '2021-09-15 00:56:38'),
(2476, 'home_page_05_events_area_subtitle', 'Upcoming Events', '2021-09-15 00:36:06', '2021-09-15 00:56:38');
INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(2477, 'home_page_05_events_area_item_show', '3', '2021-09-15 00:40:24', '2021-09-15 00:56:38'),
(2478, 'home_page_05_events_area_left_image', '212', '2021-09-15 00:56:38', '2021-09-15 00:56:38'),
(2479, 'home_page_05_recent_blog_area_title', 'Latest Blog', '2021-09-15 01:06:19', '2021-09-22 06:49:52'),
(2480, 'home_page_05_recent_blog_area_subtitle', 'Latest Blog & News', '2021-09-15 01:06:19', '2021-09-22 06:49:52'),
(2481, 'home_page_05_recent_blog_area_item_show', '3', '2021-09-15 01:06:19', '2021-09-22 06:49:53'),
(2482, 'home_page_06_rise_area_heading_title', 'Rise Your Hand', '2021-09-15 05:07:50', '2021-09-15 05:09:15'),
(2483, 'home_page_06_rise_area_button_text', 'Donate  Now', '2021-09-15 05:07:50', '2021-09-15 05:09:15'),
(2484, 'home_page_06_feature_area_title', 'Featurd Campaign', '2021-09-15 05:14:17', '2021-09-15 05:14:17'),
(2485, 'home_page_06_feature_area_donation_button_text', 'Make A Donation', '2021-09-15 05:14:17', '2021-09-15 05:14:17'),
(2486, 'home_page_06_category_area_title', 'Causes Category', '2021-09-15 05:41:07', '2021-09-15 05:41:07'),
(2487, 'home_page_06_recent_causes_area_title', 'Recently Added Causes', '2021-09-15 05:47:38', '2021-09-15 05:47:38'),
(2488, 'home_page_06_recent_causes_area_button_text', 'Make A Donate', '2021-09-15 05:47:39', '2021-09-15 05:47:39'),
(2489, 'home_page_06_success_story_area_button_text', 'Read Details', '2021-09-15 06:19:06', '2021-09-15 06:19:19'),
(2490, 'home_page_06_success_story_area_item_show', '3', '2021-09-15 06:19:06', '2021-09-15 06:19:19'),
(2491, 'home_page_06_about_us_area_title', 'About Us', '2021-09-15 06:42:34', '2021-09-15 06:48:49'),
(2492, 'home_page_06_about_us_area_description', 'Nullam sed condimentum lorem. Donec id enim condimentum, posuere tortor ac, dignissim risus. Curabitur vel congue lectus. Aliquam enim libero, mollis nec sodales vel, efficitur vel sapien. Proin rhoncus mi et sem sodales, sodales fermentum ex molestie. Etiam laoreet eleifend dolor a auctor.Nullam sed condimentum lorem. Donec id enim condimentum, posuere tortor ac, dignissim risus. Curabitur vel congue lectus. Aliquam enim libero, mollis nec sodales vel, efficitur vel sapien. Proin rhoncus mi et sem sodales, sodales fermentum ex molestie. Etiam laoreet eleifend dolor a auctor.', '2021-09-15 06:42:34', '2021-09-15 06:48:49'),
(2493, 'home_page_06_about_us_area_button_text', 'Read Details', '2021-09-15 06:42:34', '2021-09-15 06:48:49'),
(2494, 'home_page_06_about_us_area_button_url', '#', '2021-09-15 06:42:34', '2021-09-15 06:48:49'),
(2495, 'home_page_06_events_area_title', 'Upcoming Events', '2021-09-15 06:56:47', '2021-09-15 07:15:18'),
(2496, 'home_page_06_events_area_item_show', '4', '2021-09-15 07:05:02', '2021-09-15 07:15:18'),
(2497, 'home_page_header_area_section_status', 'on', '2021-09-15 23:09:26', '2021-09-15 23:09:46'),
(2498, 'home_page_category_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2499, 'home_page_feature_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2500, 'home_page_success_story_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2501, 'home_page_aboutus_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2502, 'home_page_counterup_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2503, 'home_page_events_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2504, 'home_page_recent_cause_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2505, 'home_page_blog_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2506, 'home_page_client_area_section_status', 'on', '2021-09-15 23:09:27', '2021-09-15 23:09:47'),
(2507, 'home_page_04_header_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2508, 'home_page_04_category_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2509, 'home_page_04_feature_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2510, 'home_page_04_success_story_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2511, 'home_page_04_aboutus_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2512, 'home_page_04_counterup_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2513, 'home_page_04_events_area_section_status', NULL, '2021-09-15 23:19:09', '2021-09-15 23:30:42'),
(2514, 'home_page_04_recent_cause_area_section_status', NULL, '2021-09-15 23:19:10', '2021-09-15 23:30:42'),
(2515, 'home_page_04_blog_area_section_status', NULL, '2021-09-15 23:19:10', '2021-09-15 23:30:42'),
(2516, 'home_page_04_client_area_section_status', NULL, '2021-09-15 23:19:10', '2021-09-15 23:30:42'),
(2517, 'home_page_header_area_04_section_status', 'on', '2021-09-15 23:32:59', '2021-09-15 23:36:34'),
(2518, 'home_page_category_area_04_section_status', 'on', '2021-09-15 23:32:59', '2021-09-15 23:36:34'),
(2519, 'home_page_feature_area_04_section_status', 'on', '2021-09-15 23:32:59', '2021-09-15 23:36:34'),
(2520, 'home_page_success_story_area_04_section_status', 'on', '2021-09-15 23:32:59', '2021-09-15 23:36:34'),
(2521, 'home_page_aboutus_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:34'),
(2522, 'home_page_counterup_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:34'),
(2523, 'home_page_events_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:35'),
(2524, 'home_page_recent_cause_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:35'),
(2525, 'home_page_blog_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:35'),
(2526, 'home_page_client_area_04_section_status', 'on', '2021-09-15 23:33:00', '2021-09-15 23:36:35'),
(2527, 'home_page_header_slider_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2528, 'home_page_rise_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2529, 'home_page_feature_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2530, 'home_page_category_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2531, 'home_page_success_story_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2532, 'home_page_counterup_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2533, 'home_page_recent_cause_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2534, 'home_page_events_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2535, 'home_page_blog_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2536, 'home_page_client_area_05_section_status', 'on', '2021-09-15 23:47:48', '2021-09-15 23:47:48'),
(2537, 'home_page_header_slider_area_06_section_status', 'on', '2021-09-15 23:53:00', '2021-09-15 23:56:26'),
(2538, 'home_page_rise_area_06_section_status', 'on', '2021-09-15 23:53:00', '2021-09-15 23:56:26'),
(2539, 'home_page_feature_area_06_section_status', 'on', '2021-09-15 23:53:00', '2021-09-15 23:56:26'),
(2540, 'home_page_category_area_06_section_status', 'on', '2021-09-15 23:53:00', '2021-09-15 23:56:27'),
(2541, 'home_page_recent_cause_area_06_section_status', 'on', '2021-09-15 23:53:00', '2021-09-15 23:56:27'),
(2542, 'home_page_success_story_area_06_section_status', 'on', '2021-09-15 23:53:01', '2021-09-15 23:56:27'),
(2543, 'home_page_aboutus_area_06_section_status', 'on', '2021-09-15 23:53:01', '2021-09-15 23:56:27'),
(2544, 'home_page_events_area_06_section_status', 'on', '2021-09-15 23:53:01', '2021-09-15 23:56:27'),
(2545, 'home_page_client_area_06_section_status', 'on', '2021-09-15 23:53:01', '2021-09-15 23:56:27'),
(2546, 'home_page_counterup_area_06_section_status', 'on', '2021-09-15 23:54:38', '2021-09-15 23:56:27'),
(2547, 'success_story_page_slug', 'success-story', '2021-09-16 00:05:40', '2021-09-20 22:54:03'),
(2548, 'success_story_page_name', 'Success Stories', '2021-09-16 00:05:44', '2021-09-20 22:54:06'),
(2549, 'success_story_page_meta_tags', NULL, '2021-09-16 00:05:44', '2021-09-20 22:54:06'),
(2550, 'success_story_page_meta_description', NULL, '2021-09-16 00:05:44', '2021-09-20 22:54:06'),
(2551, 'success_story_page_button_text', 'View Details', '2021-09-16 01:59:44', '2021-09-18 05:28:03'),
(2552, 'success_story_page_item_show', '2', '2021-09-16 01:59:44', '2021-09-18 05:28:03'),
(2553, 'donation_single_page_countdown_status', 'on', '2021-09-16 05:40:57', '2021-09-23 08:50:05'),
(2554, 'donation_charge_form', 'donor', '2021-09-16 05:40:57', '2021-09-23 08:50:05'),
(2555, 'user_campaign_metadata_status', NULL, '2021-09-16 05:40:57', '2021-09-23 08:50:05'),
(2556, 'allow_user_to_add_custom_tip_in_donation', NULL, '2021-09-16 05:40:57', '2021-09-23 08:50:05'),
(2557, 'donation_deadline_text', 'Donation Expired', '2021-09-16 05:40:57', '2021-09-23 08:50:05'),
(2558, 'payfast_test_mode', 'on', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2559, 'payfast_preview_logo', '220', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2560, 'payfast_merchant_id', '10024000', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2561, 'payfast_merchant_key', '77jcu5v4ufdod', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2562, 'payfast_passphrase', 'testpayfastsohan', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2563, 'payfast_gateway', 'on', '2021-09-18 01:46:01', '2021-09-22 06:28:40'),
(2564, 'site_usd_to_zar_exchange_rate', '385', '2021-09-18 01:46:02', '2021-09-22 06:28:41'),
(2565, 'donation_medical_document_button_text', 'Medical Document', '2021-09-18 06:36:09', '2021-09-23 08:50:05'),
(2566, 'donation_medical_document_button_show_hide', 'on', '2021-09-18 06:36:09', '2021-09-23 08:50:06'),
(2567, 'donation_single_page_variant', '02', NULL, '2021-09-21 23:21:43'),
(2568, 'donation_flag_show_hide', 'on', '2021-09-19 07:01:14', '2021-09-23 08:50:06'),
(2569, 'donation_description_show_hide', 'on', '2021-09-19 07:01:14', '2021-09-19 07:07:34'),
(2570, 'donation_updates_show_hide', 'on', '2021-09-19 07:01:14', '2021-09-23 08:50:06'),
(2571, 'donation_comments_show_hide', 'on', '2021-09-19 07:01:14', '2021-09-23 08:50:06'),
(2572, 'donation_faq_show_hide', 'on', '2021-09-19 07:01:40', '2021-09-23 08:50:06'),
(2573, 'donation_descriptions_show_hide', 'on', '2021-09-19 07:10:20', '2021-09-23 08:50:06'),
(2574, 'home_page_06_header_area_title', 'a:2:{i:0;s:29:\"Donate, Fundraise & Volunteer\";i:1;s:23:\"Help, Donate & Fundrise\";}', '2021-09-20 00:15:15', '2021-09-21 05:09:12'),
(2575, 'home_page_06_header_area_subtitle', 'a:2:{i:0;s:28:\"Small Effort Make Big Change\";i:1;s:30:\"Your Contribution Is Important\";}', '2021-09-20 00:15:15', '2021-09-21 05:09:12'),
(2576, 'home_page_06_header_area_donate_button_title', 'a:2:{i:0;s:6:\"Donate\";i:1;s:10:\"Donate Now\";}', '2021-09-20 00:15:15', '2021-09-21 05:09:12'),
(2577, 'home_page_06_header_area_donate_button_url', 'a:2:{i:0;N;i:1;N;}', '2021-09-20 00:15:15', '2021-09-21 05:09:12'),
(2578, 'home_page_06_header_area_read_more_button_title', 'a:2:{i:0;s:9:\"Read More\";i:1;s:12:\"Read Details\";}', '2021-09-20 00:15:15', '2021-09-21 05:09:12'),
(2579, 'home_page_06_header_area_read_more_button_url', 'a:2:{i:0;N;i:1;N;}', '2021-09-20 00:15:16', '2021-09-21 05:09:13'),
(2580, 'home_page_06_header_area_image', 'a:2:{i:0;s:3:\"196\";i:1;s:3:\"134\";}', '2021-09-20 00:15:16', '2021-09-21 05:09:13'),
(2581, 'home_page_06_header_area_donation', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"2\";}', '2021-09-20 01:32:04', '2021-09-21 05:09:13'),
(2582, 'support_ticket_page_slug', 'support-ticket', '2021-09-20 22:54:03', '2021-09-20 22:54:03'),
(2583, 'support_ticket_page_name', 'Support Ticket', '2021-09-20 22:54:06', '2021-09-20 22:54:06'),
(2584, 'support_ticket_page_meta_tags', NULL, '2021-09-20 22:54:06', '2021-09-20 22:54:06'),
(2585, 'support_ticket_page_meta_description', NULL, '2021-09-20 22:54:06', '2021-09-20 22:54:06'),
(2586, 'support_ticket_login_notice', 'Login to create support ticket', '2021-09-20 23:26:53', '2021-09-20 23:26:53'),
(2587, 'support_ticket_form_title', 'Create New Support Ticket', '2021-09-20 23:26:53', '2021-09-20 23:26:53'),
(2588, 'support_ticket_button_text', 'Submit Ticket', '2021-09-20 23:26:53', '2021-09-20 23:26:53'),
(2589, 'support_ticket_success_message', 'Thanks for contact us, we will reply soon', '2021-09-20 23:26:53', '2021-09-20 23:26:53'),
(2590, 'home_page_06_header_area_bg_image', '219', '2021-09-21 05:06:27', '2021-09-21 05:09:13'),
(2591, 'emmergency_donation_text', 'This fundraiser is in an urgent need of funds', '2021-09-21 06:59:33', '2021-09-23 08:50:05'),
(2592, 'releated_donation_text', 'Related Causes', '2021-09-21 23:18:31', '2021-09-23 08:50:05'),
(2593, 'donation_social_icons_show_hide', 'on', '2021-09-22 04:09:09', '2021-09-23 08:50:06'),
(2594, 'donation_recent_donors_show_hide', 'on', '2021-09-22 04:09:09', '2021-09-23 08:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_content` longtext COLLATE utf8mb4_unicode_ci,
  `success_story_category_id` int(10) UNSIGNED NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci,
  `og_meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `title`, `story_content`, `success_story_category_id`, `slug`, `image`, `status`, `excerpt`, `meta_title`, `meta_tags`, `meta_description`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `created_at`, `updated_at`) VALUES
(1, 'Award From Uniesco', '<div><div>Days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div><div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div></div><div><div><br></div></div>', 4, 'award-from-uniesco', '160', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-13 07:04:32', '2021-09-16 02:50:21'),
(2, 'ICIR Recommendation', '<p>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on. There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</p><p><span style=\"color:rgb(0,0,0);font-size:14px;\">There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on. There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</span></p><p><span style=\"color:rgb(0,0,0);font-size:14px;\">There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on. There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</span><span style=\"color:rgb(0,0,0);font-size:14px;\"><br></span><br></p>', 6, 'icir-recommendation', '158', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settl', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-13 07:26:38', '2021-09-16 02:50:09'),
(3, 'IGMA Award', '<div>Days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div><br></div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div><div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div></div>', 4, 'igma-award', '170', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-13 22:29:29', '2021-09-16 02:49:58'),
(6, 'Annual Day Celebration', '<div>Days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div><div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div></div>', 4, 'annual-day-celebration', '196', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-16 00:56:37', '2021-09-16 02:49:50'),
(7, 'National Peace Award', '<div>Days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div><br></div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div><div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div></div>', 6, 'national-peace-award', '197', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-16 00:56:39', '2021-09-16 02:49:43'),
(8, 'IMF Contribution', '<div>Days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</div><div><br></div><div><div>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats</div><div><br></div></div>', 5, 'imf-contribution', '166', 'publish', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.\r\n\r\nthat’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down.', 'award', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', 'award', 'Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow', '127', '2021-09-16 00:56:40', '2021-09-16 04:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `success_story_categories`
--

CREATE TABLE `success_story_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `success_story_categories`
--

INSERT INTO `success_story_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'WHO', 'publish', '2021-09-13 06:10:32', '2021-09-13 06:10:32'),
(5, 'Private Organization', 'publish', '2021-09-13 06:10:42', '2021-09-13 06:10:42'),
(6, 'National', 'publish', '2021-09-13 06:10:53', '2021-09-13 06:14:38'),
(7, 'International', 'publish', '2021-09-13 06:11:05', '2021-09-13 06:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `via` text COLLATE utf8mb4_unicode_ci,
  `operating_system` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_departments`
--

CREATE TABLE `support_ticket_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_ticket_departments`
--

INSERT INTO `support_ticket_departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Submit Issue', 'publish', '2021-09-20 07:20:04', '2021-09-20 07:20:04'),
(2, 'Login Issue', 'publish', '2021-09-20 07:21:08', '2021-09-20 07:21:08'),
(3, 'Payment Gateway', 'publish', '2021-09-20 07:21:56', '2021-09-20 07:21:56'),
(4, 'Cause Issue', 'publish', '2021-09-20 07:22:17', '2021-09-20 07:22:17'),
(5, 'Captcha Issue', 'publish', '2021-09-20 07:22:28', '2021-09-20 07:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_messages`
--

CREATE TABLE `support_ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `notify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_one_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_two_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_three_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `description`, `image`, `icon_one`, `icon_two`, `icon_three`, `icon_one_url`, `icon_two_url`, `icon_three_url`, `created_at`, `updated_at`) VALUES
(1, 'Siful Islam', '-Envato Cliente', NULL, '153', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2020-07-20 11:18:55', '2021-02-22 14:40:18'),
(2, 'sharifur', 'Founder', NULL, '151', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2020-07-20 11:19:23', '2021-02-22 14:39:58'),
(3, 'Olivia Hamel', '-Envato Cliente', NULL, '150', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2020-07-20 11:19:43', '2021-02-22 14:39:46'),
(4, 'Sharifur Rahman', 'CEO Ir-Tech', NULL, '152', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2020-07-20 11:20:02', '2021-02-22 14:39:30'),
(17, 'Barbara Linneman', 'Founder', NULL, '151', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2021-03-11 17:13:35', '2021-03-11 17:25:35'),
(18, 'Terrell Boderquist', 'Founder', NULL, '153', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2021-03-11 17:19:17', '2021-03-11 17:25:23'),
(19, 'Steven Tucker', 'Founder', NULL, '151', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '#', '#', '#', '2021-03-11 17:22:21', '2021-03-11 17:25:12'),
(20, 'Dominic Fanning', 'Founder', NULL, '150', 'fab fa-instagram', 'fab fa-twitter', 'fab fa-facebook-f', '##', '#', '#', '2021-03-11 17:24:11', '2021-06-10 17:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `description`, `status`, `designation`, `created_at`, `updated_at`) VALUES
(2, 'Siful Islam', '156', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Customer', '2020-06-05 06:40:03', '2021-02-23 10:50:43'),
(3, 'Elvira Siebert', '155', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Customer', '2020-06-05 06:43:31', '2021-02-23 10:50:32'),
(4, 'Sheree Derouen', '154', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Customer', '2020-06-05 06:43:34', '2021-02-22 18:35:19'),
(5, 'Sheree Derouen', '155', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Müşteri', '2020-06-05 06:44:55', '2021-06-21 11:47:43'),
(17, 'Nur Fuad', '156', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Founder', '2020-07-29 19:05:33', '2021-06-21 11:47:36'),
(18, 'Eric Guillen', '155', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Customer', '2021-03-11 18:25:28', '2021-03-11 21:31:41'),
(20, 'Terry Espinoza', '156', 'I found myself working in a true partnership that results in an extra incredible experience of us', 'publish', 'Customer', '2021-03-11 21:31:49', '2021-06-09 10:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `topbar_infos`
--

CREATE TABLE `topbar_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email_verify_token` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci,
  `google_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_name` text COLLATE utf8mb4_unicode_ci,
  `widget_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `widget_order` int(11) DEFAULT NULL,
  `widget_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `widget_name`, `widget_content`, `widget_order`, `widget_location`, `created_at`, `updated_at`) VALUES
(29, 'AboutUsWidget', 'a:7:{s:2:\"id\";s:2:\"29\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"1\";s:9:\"site_logo\";s:3:\"126\";s:11:\"description\";s:162:\"We are a non-profit organisation in USA that works towards supporting underprivileged children reach their full potential - physical, mental as well as emotional.\";}', 1, 'footer', '2021-03-08 20:57:54', '2021-06-16 14:47:17'),
(30, 'ContactInfoWidget', 'a:9:{s:2:\"id\";s:2:\"30\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";s:10:\"Contact us\";s:8:\"location\";s:17:\"Dhaka, Bangladesh\";s:5:\"phone\";s:11:\"01875484888\";s:5:\"email\";s:20:\"support@fundorex.com\";}', 3, 'footer', '2021-03-08 21:05:37', '2021-06-21 11:42:07'),
(32, 'RecentBlogPostWidget', 'a:7:{s:2:\"id\";s:2:\"32\";s:11:\"widget_name\";s:20:\"RecentBlogPostWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"4\";s:12:\"widget_title\";s:12:\"Recent Posts\";s:10:\"post_items\";s:1:\"2\";}', 2, 'footer', '2021-03-09 12:52:48', '2021-06-21 11:42:07'),
(35, 'RecentEventWidget', 'a:7:{s:2:\"id\";s:2:\"35\";s:11:\"widget_name\";s:17:\"RecentEventWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:5:\"event\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";s:13:\"Recent Events\";s:10:\"post_items\";s:1:\"5\";}', 3, 'event', '2021-03-09 16:00:03', '2021-07-27 20:35:15'),
(36, 'EventCategoryWidget', 'a:7:{s:2:\"id\";s:2:\"36\";s:11:\"widget_name\";s:19:\"EventCategoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:5:\"event\";s:12:\"widget_order\";s:1:\"3\";s:12:\"widget_title\";s:14:\"Event Category\";s:10:\"post_items\";s:1:\"5\";}', 4, 'event', '2021-03-09 16:56:54', '2021-07-27 20:35:15'),
(37, 'EventSearchWidget', 'a:6:{s:2:\"id\";s:2:\"37\";s:11:\"widget_name\";s:17:\"EventSearchWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:5:\"event\";s:12:\"widget_order\";s:1:\"1\";s:12:\"widget_title\";N;}', 2, 'event', '2021-03-09 17:52:02', '2021-07-27 20:35:14'),
(38, 'RecentBlogPostWidget', 'a:7:{s:2:\"id\";s:2:\"38\";s:11:\"widget_name\";s:20:\"RecentBlogPostWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";s:12:\"Recent Posts\";s:10:\"post_items\";s:1:\"5\";}', 2, 'blog', '2021-03-09 17:59:18', '2021-06-17 15:33:48'),
(39, 'BlogSearchWidget', 'a:6:{s:2:\"id\";s:2:\"39\";s:11:\"widget_name\";s:16:\"BlogSearchWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"1\";s:13:\"widget_title_\";s:6:\"Search\";}', 1, 'blog', '2021-03-09 18:00:22', '2021-06-17 15:34:19'),
(40, 'BlogCategoryWidget', 'a:7:{s:2:\"id\";s:2:\"40\";s:11:\"widget_name\";s:18:\"BlogCategoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"3\";s:12:\"widget_title\";s:10:\"Categories\";s:10:\"post_items\";s:1:\"3\";}', 3, 'blog', '2021-03-09 18:00:37', '2021-06-17 15:34:04'),
(41, 'JobSearchWidget', 'a:6:{s:2:\"id\";s:2:\"41\";s:11:\"widget_name\";s:15:\"JobSearchWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:3:\"job\";s:12:\"widget_order\";s:1:\"1\";s:12:\"widget_title\";N;}', 2, 'job', '2021-03-09 18:49:52', '2021-07-27 20:36:39'),
(42, 'JobCategoryWidget', 'a:7:{s:2:\"id\";s:2:\"42\";s:11:\"widget_name\";s:17:\"JobCategoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:3:\"job\";s:12:\"widget_order\";s:1:\"3\";s:12:\"widget_title\";s:10:\"Categories\";s:10:\"post_items\";s:1:\"5\";}', 4, 'job', '2021-03-09 19:07:24', '2021-07-27 20:36:39'),
(43, 'RecentJobPostWidget', 'a:7:{s:2:\"id\";s:2:\"43\";s:11:\"widget_name\";s:19:\"RecentJobPostWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:3:\"job\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";s:11:\"Recent Jobs\";s:10:\"post_items\";s:1:\"4\";}', 3, 'job', '2021-03-09 19:18:52', '2021-07-27 20:36:39'),
(44, 'NewsletterWidget', 'a:7:{s:2:\"id\";s:2:\"44\";s:11:\"widget_name\";s:16:\"NewsletterWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"4\";s:12:\"widget_title\";s:9:\"Subscribe\";s:11:\"description\";s:49:\"join our newsletter to get latest update form us.\";}', 4, 'footer', '2021-06-21 11:30:03', '2021-06-21 13:12:20'),
(45, 'RecentSuccessStoryWidget', 'a:7:{s:2:\"id\";s:2:\"45\";s:11:\"widget_name\";s:24:\"RecentSuccessStoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:13:\"success-story\";s:12:\"widget_order\";s:1:\"1\";s:12:\"widget_title\";s:22:\"Recent Success Stories\";s:10:\"post_items\";s:1:\"3\";}', 1, 'success-story', '2021-09-16 02:35:52', '2021-09-18 05:30:56'),
(46, 'SuccessStoryCategoryWidget', 'a:6:{s:11:\"widget_name\";s:26:\"SuccessStoryCategoryWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:13:\"success-story\";s:12:\"widget_order\";s:1:\"1\";s:12:\"widget_title\";s:24:\"Success Story Categories\";s:10:\"post_items\";s:1:\"4\";}', 2, 'success-story', '2021-09-16 02:39:19', '2021-09-16 02:55:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_categories`
--
ALTER TABLE `cause_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_logs`
--
ALTER TABLE `cause_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_updates`
--
ALTER TABLE `cause_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_areas`
--
ALTER TABLE `client_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info_items`
--
ALTER TABLE `contact_info_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counterups`
--
ALTER TABLE `counterups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_withdraws`
--
ALTER TABLE `donation_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_categories`
--
ALTER TABLE `events_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_attendances`
--
ALTER TABLE `event_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_payment_logs`
--
ALTER TABLE `event_payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flag_reports`
--
ALTER TABLE `flag_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_sliders`
--
ALTER TABLE `header_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery_categories`
--
ALTER TABLE `image_gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_categories`
--
ALTER TABLE `jobs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_features`
--
ALTER TABLE `key_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_story_categories`
--
ALTER TABLE `success_story_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `success_story_categories_name_unique` (`name`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_departments`
--
ALTER TABLE `support_ticket_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topbar_infos`
--
ALTER TABLE `topbar_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cause_categories`
--
ALTER TABLE `cause_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cause_logs`
--
ALTER TABLE `cause_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=634;

--
-- AUTO_INCREMENT for table `cause_updates`
--
ALTER TABLE `cause_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client_areas`
--
ALTER TABLE `client_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `contact_info_items`
--
ALTER TABLE `contact_info_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counterups`
--
ALTER TABLE `counterups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation_withdraws`
--
ALTER TABLE `donation_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events_categories`
--
ALTER TABLE `events_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_attendances`
--
ALTER TABLE `event_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `event_payment_logs`
--
ALTER TABLE `event_payment_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flag_reports`
--
ALTER TABLE `flag_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `header_sliders`
--
ALTER TABLE `header_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `image_gallery_categories`
--
ALTER TABLE `image_gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs_categories`
--
ALTER TABLE `jobs_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `key_features`
--
ALTER TABLE `key_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_uploads`
--
ALTER TABLE `media_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2595;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `success_story_categories`
--
ALTER TABLE `success_story_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support_ticket_departments`
--
ALTER TABLE `support_ticket_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `topbar_infos`
--
ALTER TABLE `topbar_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
