-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 07:49 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_db_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `host` varchar(46) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1,\"photograph\":null,\"media\":[]}', '58.65.163.188', '2022-02-18 11:33:39', '2022-02-18 11:33:39'),
(2, 'audit:created', 1, 'App\\Models\\Member#1', 1, '{\"ledenid\":\"Member 1\",\"status\":\"Registered\",\"type_of_donor\":\"Financial\",\"first_name\":\"Member\",\"surname\":\"Fiver\",\"street_name\":\"British Home Street\",\"house_number\":\"13\",\"zip_code\":\"46000\",\"town\":\"Rawalpindi\",\"land\":\"Pakistan\",\"enamel\":\"next\",\"date_of_birth\":\"2022-02-18\",\"gender\":\"male\",\"birthplace\":\"Hangu\",\"remark\":\"Nexttech\",\"iban\":\"Nexttech\",\"updated_at\":\"2022-02-18 11:51:17\",\"created_at\":\"2022-02-18 11:51:17\",\"id\":1,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '58.65.163.188', '2022-02-18 11:51:17', '2022-02-18 11:51:17'),
(3, 'audit:created', 2, 'App\\Models\\Member#2', 1, '{\"ledenid\":\"Member 2\",\"status\":\"Active\",\"type_of_donor\":\"Non-paying\",\"first_name\":\"Member 2\",\"surname\":\"Fiver 2\",\"street_name\":\"British Home Street 2\",\"house_number\":\"13c\",\"zip_code\":\"50000\",\"town\":\"islamabad\",\"land\":\"Pakistan\",\"enamel\":\"next\",\"date_of_birth\":\"2022-02-16\",\"gender\":\"female\",\"birthplace\":\"Peshawer\",\"remark\":\"pesh\",\"iban\":\"Nextstep1\",\"updated_at\":\"2022-02-18 14:10:42\",\"created_at\":\"2022-02-18 14:10:42\",\"id\":2,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '58.65.163.188', '2022-02-18 14:10:42', '2022-02-18 14:10:42'),
(4, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"id\":1,\"photograph\":null,\"media\":[]}', '2001:1c00:2f14:c800:a4a6:7eb8:3571:de2b', '2022-02-21 16:10:51', '2022-02-21 16:10:51'),
(5, 'audit:created', 2, 'App\\Models\\User#2', 1, '{\"name\":\"Shamier\",\"last_name\":\"Madhar\",\"enamel\":\"shamier@madhar.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"shamier@madhar.nl\",\"updated_at\":\"2022-04-04 10:14:20\",\"created_at\":\"2022-04-04 10:14:20\",\"id\":2,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 08:14:20', '2022-04-04 08:14:20'),
(6, 'audit:updated', 2, 'App\\Models\\User#2', 1, '{\"name\":\"Shamier\",\"last_name\":\"Madhar\",\"enamel\":\"shamier@madhar.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"shamier@madhar.nl\",\"updated_at\":\"2022-04-04 10:14:20\",\"created_at\":\"2022-04-04 10:14:20\",\"id\":2,\"verified\":1,\"verified_at\":\"2022-04-04 10:14:20\",\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 08:14:20', '2022-04-04 08:14:20'),
(7, 'audit:updated', 2, 'App\\Models\\User#2', 1, '{\"approved\":\"1\",\"updated_at\":\"2022-04-04 10:16:22\",\"id\":2,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 08:16:22', '2022-04-04 08:16:22'),
(8, 'audit:created', 3, 'App\\Models\\User#3', 1, '{\"name\":\"Noor\",\"last_name\":\"Madhar\",\"enamel\":\"s.madhar@madhar.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@madhar.nl\",\"updated_at\":\"2022-04-04 19:49:19\",\"created_at\":\"2022-04-04 19:49:19\",\"id\":3,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 17:49:19', '2022-04-04 17:49:19'),
(9, 'audit:updated', 3, 'App\\Models\\User#3', 1, '{\"name\":\"Noor\",\"last_name\":\"Madhar\",\"enamel\":\"s.madhar@madhar.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@madhar.nl\",\"updated_at\":\"2022-04-04 19:49:19\",\"created_at\":\"2022-04-04 19:49:19\",\"id\":3,\"verified\":1,\"verified_at\":\"2022-04-04 19:49:19\",\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 17:49:19', '2022-04-04 17:49:19'),
(10, 'audit:created', 4, 'App\\Models\\User#4', 1, '{\"name\":\"Noor\",\"last_name\":\"Madhar\",\"enamel\":\"s.madhar@vectormm.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@vectormm.nl\",\"updated_at\":\"2022-04-04 20:03:35\",\"created_at\":\"2022-04-04 20:03:35\",\"id\":4,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:03:35', '2022-04-04 18:03:35'),
(11, 'audit:updated', 4, 'App\\Models\\User#4', 1, '{\"name\":\"Noor\",\"last_name\":\"Madhar\",\"enamel\":\"s.madhar@vectormm.nl\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@vectormm.nl\",\"updated_at\":\"2022-04-04 20:03:35\",\"created_at\":\"2022-04-04 20:03:35\",\"id\":4,\"verified\":1,\"verified_at\":\"2022-04-04 20:03:35\",\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:03:35', '2022-04-04 18:03:35'),
(12, 'audit:created', 5, 'App\\Models\\User#5', 1, '{\"name\":\"AB1\",\"last_name\":\"CD2\",\"enamel\":null,\"telephone\":\"3307249900\",\"approved\":\"1\",\"email\":\"enterpristore2021@gmail.com\",\"updated_at\":\"2022-04-04 20:08:09\",\"created_at\":\"2022-04-04 20:08:09\",\"id\":5,\"photograph\":null,\"media\":[]}', '3.16.142.78', '2022-04-04 18:08:09', '2022-04-04 18:08:09'),
(13, 'audit:updated', 5, 'App\\Models\\User#5', 1, '{\"name\":\"AB1\",\"last_name\":\"CD2\",\"enamel\":null,\"telephone\":\"3307249900\",\"approved\":\"1\",\"email\":\"enterpristore2021@gmail.com\",\"updated_at\":\"2022-04-04 20:08:09\",\"created_at\":\"2022-04-04 20:08:09\",\"id\":5,\"verified\":1,\"verified_at\":\"2022-04-04 20:08:09\",\"photograph\":null,\"media\":[]}', '3.16.142.78', '2022-04-04 18:08:09', '2022-04-04 18:08:09'),
(14, 'audit:deleted', 5, 'App\\Models\\User#5', 1, '{\"id\":5,\"name\":\"AB1\",\"last_name\":\"CD2\",\"enamel\":null,\"telephone\":\"3307249900\",\"approved\":1,\"verified\":1,\"verified_at\":\"2022-04-04 20:08:09\",\"verification_token\":null,\"email\":\"enterpristore2021@gmail.com\",\"email_verified_at\":null,\"created_at\":\"2022-04-04 20:08:09\",\"updated_at\":\"2022-04-04 20:08:09\",\"deleted_at\":null,\"photograph\":null}', '3.16.142.78', '2022-04-04 18:09:36', '2022-04-04 18:09:36'),
(15, 'audit:created', 6, 'App\\Models\\User#6', 1, '{\"name\":\"Noori\",\"last_name\":\"Noor\",\"enamel\":\"s.madhar@iloz.org\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@iloz.org\",\"updated_at\":\"2022-04-04 20:18:10\",\"created_at\":\"2022-04-04 20:18:10\",\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:10', '2022-04-04 18:18:10'),
(16, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"name\":\"Noori\",\"last_name\":\"Noor\",\"enamel\":\"s.madhar@iloz.org\",\"telephone\":\"0640801457\",\"approved\":\"0\",\"email\":\"s.madhar@iloz.org\",\"updated_at\":\"2022-04-04 20:18:10\",\"created_at\":\"2022-04-04 20:18:10\",\"id\":6,\"verified\":1,\"verified_at\":\"2022-04-04 20:18:10\",\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:10', '2022-04-04 18:18:10'),
(17, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"updated_at\":\"2022-04-04 20:18:11\",\"verified_at\":\"2022-04-04 20:18:11\",\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:11', '2022-04-04 18:18:11'),
(18, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"verified\":1,\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:11', '2022-04-04 18:18:11'),
(19, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"verified_at\":\"2022-04-04 20:18:11\",\"updated_at\":\"2022-04-04 20:18:11\",\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:11', '2022-04-04 18:18:11'),
(20, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"verified\":1,\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:11', '2022-04-04 18:18:11'),
(21, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"verified_at\":\"2022-04-04 20:18:12\",\"updated_at\":\"2022-04-04 20:18:12\",\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:12', '2022-04-04 18:18:12'),
(22, 'audit:updated', 6, 'App\\Models\\User#6', 1, '{\"telephone\":\"0640801458\",\"updated_at\":\"2022-04-04 20:18:40\",\"id\":6,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-04-04 18:18:40', '2022-04-04 18:18:40'),
(23, 'audit:created', 3, 'App\\Models\\Member#3', 1, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Shamier\",\"surname\":\"Madhar\",\"street_name\":\"javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721KG\",\"town\":\"Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar.nl\",\"date_of_birth\":\"1975-08-07\",\"gender\":\"male\",\"birthplace\":\"Nickerie\",\"iban\":\"NL89ABNA0548810699\",\"updated_at\":\"2022-04-26 21:40:17\",\"created_at\":\"2022-04-26 21:40:17\",\"id\":3,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-04-26 19:40:17', '2022-04-26 19:40:17'),
(24, 'audit:created', 4, 'App\\Models\\Member#4', 1, '{\"ledenid\":\"2021-0001\",\"status\":\"Registered\",\"type_of_donor\":\"Financial\",\"first_name\":\"AB1\",\"surname\":\"CD2\",\"street_name\":\"E La Palma\",\"house_number\":\"3855\",\"zip_code\":\"92807\",\"town\":\"Anaheim\",\"land\":\"United States\",\"enamel\":\"enterpristore2021@gmail.com\",\"date_of_birth\":\"27-04-2022\",\"gender\":\"male\",\"birthplace\":null,\"remark\":null,\"iban\":null,\"updated_at\":\"2022-04-26 21:50:19\",\"created_at\":\"2022-04-26 21:50:19\",\"id\":4,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '3.16.142.78', '2022-04-26 19:50:19', '2022-04-26 19:50:19'),
(25, 'audit:updated', 4, 'App\\Models\\Member#4', 1, '{\"email_checked\":1,\"email_verified_at\":\"2022-04-26 21:51:01\",\"updated_at\":\"2022-04-26 21:51:01\",\"id\":4,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '3.16.142.78', '2022-04-26 19:51:01', '2022-04-26 19:51:01'),
(26, 'audit:deleted', 4, 'App\\Models\\Member#4', 1, '{\"id\":4,\"ledenid\":\"2021-0001\",\"status\":\"Registered\",\"type_of_donor\":\"Financial\",\"first_name\":\"AB1\",\"surname\":\"CD2\",\"street_name\":\"E La Palma\",\"house_number\":\"3855\",\"zip_code\":\"92807\",\"town\":\"Anaheim\",\"land\":\"United States\",\"enamel\":\"enterpristore2021@gmail.com\",\"email_checked\":1,\"email_verified_at\":\"2022-04-26 21:51:01\",\"date_of_birth\":\"27-04-2022\",\"gender\":\"male\",\"birthplace\":null,\"unsubscribe_date\":null,\"remark\":null,\"iban\":null,\"created_at\":\"2022-04-26 21:50:19\",\"updated_at\":\"2022-04-26 21:51:01\",\"deleted_at\":null,\"photograph\":null,\"signed_document\":null}', '3.16.142.78', '2022-04-26 19:51:26', '2022-04-26 19:51:26'),
(27, 'audit:created', 5, 'App\\Models\\Member#5', 1, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Noorani\",\"surname\":\"B.V.\",\"street_name\":\"Javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721kg\",\"town\":\"Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar1.nl\",\"date_of_birth\":\"07-08-1975\",\"gender\":\"male\",\"birthplace\":\"Nickerie\",\"iban\":\"NL89ABNA0548810699\",\"updated_at\":\"2022-04-26 22:14:54\",\"created_at\":\"2022-04-26 22:14:54\",\"id\":5,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-04-26 20:14:54', '2022-04-26 20:14:54'),
(28, 'audit:updated', 5, 'App\\Models\\Member#5', 1, '{\"ledenid\":\"3\",\"updated_at\":\"2022-04-27 08:26:24\",\"id\":5,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-04-27 06:26:24', '2022-04-27 06:26:24'),
(29, 'audit:created', 6, 'App\\Models\\Member#6', 1, '{\"ledenid\":\"2022-0003\",\"status\":\"Registered\",\"type_of_donor\":\"Financial\",\"first_name\":\"sham\",\"surname\":\"Bennouho\",\"street_name\":\"Javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721kg\",\"town\":\"Zoetermeer\",\"land\":null,\"enamel\":\"shamier@madhar123.nl\",\"date_of_birth\":\"30-04-1987\",\"gender\":\"male\",\"birthplace\":\"nickerie\",\"remark\":null,\"iban\":\"NL13TRIO0379698544\",\"amount\":\"30\",\"updated_at\":\"2022-04-29 22:16:42\",\"created_at\":\"2022-04-29 22:16:42\",\"id\":6,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-04-29 20:16:42', '2022-04-29 20:16:42'),
(30, 'audit:created', 7, 'App\\Models\\Member#7', 1, '{\"type_of_donor\":\"Financial\",\"first_name\":\"S.K.\",\"surname\":\"Madhar\",\"street_name\":\"javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721KG\",\"town\":\"Gemeente Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar11114.nl\",\"date_of_birth\":\"30-04-2001\",\"gender\":\"male\",\"birthplace\":\"nickerie\",\"iban\":\"NL89ABNA0548810699\",\"ledenid\":\"2022-0004\",\"updated_at\":\"2022-04-29 22:21:36\",\"created_at\":\"2022-04-29 22:21:36\",\"id\":7,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-04-29 20:21:36', '2022-04-29 20:21:36'),
(31, 'audit:updated', 2, 'App\\Models\\User#2', 1, '{\"updated_at\":\"2022-11-23 15:58:28\",\"id\":2,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-11-23 14:58:28', '2022-11-23 14:58:28'),
(32, 'audit:updated', 2, 'App\\Models\\User#2', 1, '{\"updated_at\":\"2022-11-23 15:59:24\",\"id\":2,\"photograph\":null,\"media\":[]}', '85.145.244.191', '2022-11-23 14:59:24', '2022-11-23 14:59:24'),
(33, 'audit:created', 8, 'App\\Models\\Member#8', 1, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Shamier\",\"surname\":\"Madhar\",\"street_name\":\"javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721KG\",\"town\":\"Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar.nl\",\"date_of_birth\":\"07-08-1975\",\"gender\":\"male\",\"birthplace\":\"Nickerie\",\"iban\":\"NL89ABNA0548810699\",\"amount\":\"10\",\"ledenid\":\"20220001\",\"updated_at\":\"2022-11-23 17:30:45\",\"created_at\":\"2022-11-23 17:30:45\",\"id\":8,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-11-23 16:30:45', '2022-11-23 16:30:45'),
(34, 'audit:deleted', 8, 'App\\Models\\Member#8', 2, '{\"id\":8,\"ledenid\":\"20220001\",\"status\":\"Registered\",\"type_of_donor\":\"Financial\",\"first_name\":\"Shamier\",\"surname\":\"Madhar\",\"street_name\":\"javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721KG\",\"town\":\"Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar.nl\",\"email_checked\":null,\"email_verified_at\":null,\"date_of_birth\":\"07-08-1975\",\"gender\":\"male\",\"birthplace\":\"Nickerie\",\"unsubscribe_date\":null,\"remark\":null,\"iban\":\"NL89ABNA0548810699\",\"amount\":\"10\",\"created_at\":\"2022-11-23 17:30:45\",\"updated_at\":\"2022-11-23 17:30:45\",\"deleted_at\":null,\"photograph\":null,\"signed_document\":null}', '188.205.63.98', '2022-11-24 08:06:19', '2022-11-24 08:06:19'),
(35, 'audit:created', 9, 'App\\Models\\Member#9', NULL, '{\"type_of_donor\":\"Non-paying\",\"first_name\":\"Shoshana\",\"surname\":\"Velez\",\"street_name\":\"Tad Hopkins\",\"house_number\":\"160\",\"zip_code\":\"51832\",\"town\":\"Atque id omnis dolo\",\"land\":\"Nisi corrupti dolor\",\"enamel\":\"abdullah@nexttech-solutions.com\",\"date_of_birth\":\"02-11-2022\",\"gender\":\"female\",\"birthplace\":\"Ut beatae qui veniam\",\"iban\":\"Accusamus aut iure a\",\"amount\":\"Accusamus recusandae\",\"ledenid\":\"20220001\",\"updated_at\":\"2022-11-24 13:12:35\",\"created_at\":\"2022-11-24 13:12:35\",\"id\":9,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '154.192.16.72', '2022-11-24 12:12:36', '2022-11-24 12:12:36'),
(36, 'audit:updated', 9, 'App\\Models\\Member#9', NULL, '{\"email_checked\":1,\"email_verified_at\":\"2022-11-24 14:28:09\",\"updated_at\":\"2022-11-24 14:28:09\",\"id\":9,\"photograph\":{\"id\":2,\"model_type\":\"App\\\\Models\\\\Member\",\"model_id\":9,\"uuid\":\"4e2d1815-b7f0-41d1-bf27-3e1716fa78be\",\"collection_name\":\"photograph\",\"name\":\"637f6dbc046f7_no-image-small\",\"file_name\":\"637f6dbc046f7_no-image-small.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":5523,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":2,\"created_at\":\"2022-11-24T13:12:38.000000Z\",\"updated_at\":\"2022-11-24T13:12:39.000000Z\",\"url\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/637f6dbc046f7_no-image-small.jpg\",\"thumbnail\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/conversions\\/637f6dbc046f7_no-image-small-thumb.jpg\",\"preview\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/conversions\\/637f6dbc046f7_no-image-small-preview.jpg\"},\"signed_document\":null,\"media\":[{\"id\":2,\"model_type\":\"App\\\\Models\\\\Member\",\"model_id\":9,\"uuid\":\"4e2d1815-b7f0-41d1-bf27-3e1716fa78be\",\"collection_name\":\"photograph\",\"name\":\"637f6dbc046f7_no-image-small\",\"file_name\":\"637f6dbc046f7_no-image-small.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":5523,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":2,\"created_at\":\"2022-11-24T13:12:38.000000Z\",\"updated_at\":\"2022-11-24T13:12:39.000000Z\",\"url\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/637f6dbc046f7_no-image-small.jpg\",\"thumbnail\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/conversions\\/637f6dbc046f7_no-image-small-thumb.jpg\",\"preview\":\"https:\\/\\/crm.campusbadr.nl\\/storage\\/2\\/conversions\\/637f6dbc046f7_no-image-small-preview.jpg\"}]}', '154.192.16.72', '2022-11-24 13:28:09', '2022-11-24 13:28:09'),
(37, 'audit:deleted', 9, 'App\\Models\\Member#9', 1, '{\"id\":9,\"ledenid\":\"20220001\",\"status\":\"Registered\",\"type_of_donor\":\"Non-paying\",\"first_name\":\"Shoshana\",\"surname\":\"Velez\",\"street_name\":\"Tad Hopkins\",\"house_number\":\"160\",\"zip_code\":\"51832\",\"town\":\"Atque id omnis dolo\",\"land\":\"Nisi corrupti dolor\",\"enamel\":\"abdullah@nexttech-solutions.com\",\"email_checked\":1,\"email_verified_at\":\"2022-11-24 14:28:09\",\"date_of_birth\":\"02-11-2022\",\"gender\":\"female\",\"birthplace\":\"Ut beatae qui veniam\",\"unsubscribe_date\":null,\"remark\":null,\"iban\":\"Accusamus aut iure a\",\"amount\":\"Accusamus recusandae\",\"created_at\":\"2022-11-24 13:12:35\",\"updated_at\":\"2022-11-24 14:28:09\",\"deleted_at\":null,\"photograph\":null,\"signed_document\":null}', '154.192.16.72', '2022-11-24 13:28:39', '2022-11-24 13:28:39'),
(38, 'audit:created', 10, 'App\\Models\\Member#10', NULL, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Member\",\"surname\":\"Hi\",\"street_name\":\"British Home Street\",\"house_number\":\"13\",\"zip_code\":\"46000\",\"town\":\"Rawalpindi\",\"land\":\"Pakistan\",\"enamel\":\"abubakarsaddiq1347@gmail.com\",\"date_of_birth\":\"24-11-2022\",\"gender\":\"male\",\"birthplace\":\"Peshawer\",\"iban\":\"abc\",\"amount\":\"abc\",\"ledenid\":\"20220001\",\"updated_at\":\"2022-11-24 14:37:39\",\"created_at\":\"2022-11-24 14:37:39\",\"id\":10,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '154.192.22.240', '2022-11-24 13:37:39', '2022-11-24 13:37:39'),
(39, 'audit:created', 11, 'App\\Models\\Member#11', NULL, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Shamier\",\"surname\":\"Madhar\",\"street_name\":\"javalaan\",\"house_number\":\"401\",\"zip_code\":\"2721KG\",\"town\":\"Zoetermeer\",\"land\":\"Nederland\",\"enamel\":\"shamier@madhar.nl\",\"date_of_birth\":\"07-08-1975\",\"gender\":\"male\",\"birthplace\":\"Nickerie\",\"iban\":\"NL89ABNA0548810699\",\"amount\":\"10\",\"ledenid\":\"2022-0002\",\"updated_at\":\"2022-11-24 14:53:50\",\"created_at\":\"2022-11-24 14:53:50\",\"id\":11,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-11-24 13:53:50', '2022-11-24 13:53:50'),
(40, 'audit:created', 12, 'App\\Models\\Member#12', NULL, '{\"type_of_donor\":\"Non-paying\",\"first_name\":\"faried\",\"surname\":\"Bholai\",\"street_name\":\"juwelenstraat\",\"house_number\":\"3\",\"zip_code\":\"1336 tc\",\"town\":\"Almere\",\"enamel\":\"fariedb@gmail.com\",\"date_of_birth\":\"31-01-1989\",\"gender\":\"male\",\"birthplace\":\"Amsterdam\",\"iban\":\"NL19 ABNA 0624 0040 31\",\"amount\":\"10\",\"ledenid\":\"2022-0001\",\"updated_at\":\"2022-11-24 16:02:57\",\"created_at\":\"2022-11-24 16:02:57\",\"id\":12,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.144.246.47', '2022-11-24 15:02:57', '2022-11-24 15:02:57'),
(41, 'audit:created', 13, 'App\\Models\\Member#13', NULL, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Sheriel\",\"surname\":\"Nabie\",\"street_name\":\"Raoul Wallenbergstraat\",\"house_number\":\"41\",\"zip_code\":\"1102 AX\",\"town\":\"Amsterdam\",\"enamel\":\"s.nabie@hotmail.com\",\"date_of_birth\":\"28-10-1974\",\"gender\":\"male\",\"birthplace\":\"Nw Nickerie\",\"iban\":\"NL33 ABNA 0830 9830 58\",\"amount\":\"100\",\"ledenid\":\"2022-0002\",\"updated_at\":\"2022-11-24 16:15:53\",\"created_at\":\"2022-11-24 16:15:53\",\"id\":13,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '84.241.196.246', '2022-11-24 15:15:53', '2022-11-24 15:15:53'),
(42, 'audit:updated', 13, 'App\\Models\\Member#13', NULL, '{\"email_checked\":1,\"email_verified_at\":\"2022-11-24 16:16:41\",\"updated_at\":\"2022-11-24 16:16:41\",\"id\":13,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '104.47.51.254', '2022-11-24 15:16:41', '2022-11-24 15:16:41'),
(43, 'audit:updated', 12, 'App\\Models\\Member#12', 2, '{\"type_of_donor\":\"Financial\",\"updated_at\":\"2022-11-25 12:41:04\",\"id\":12,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '85.145.244.191', '2022-11-25 11:41:04', '2022-11-25 11:41:04'),
(44, 'audit:created', 1, 'App\\Models\\Mandaat#1', 2, '{\"ledenid_id\":\"12\",\"status\":\"Active\",\"mandaadnr\":\"2022-0001\",\"start_mandaat\":\"25-11-2022\",\"einde_mandaat\":null,\"updated_at\":\"2022-11-25 12:56:23\",\"created_at\":\"2022-11-25 12:56:23\",\"id\":1}', '85.145.244.191', '2022-11-25 11:56:23', '2022-11-25 11:56:23'),
(45, 'audit:created', 2, 'App\\Models\\Mandaat#2', 2, '{\"ledenid_id\":\"13\",\"status\":\"Active\",\"mandaadnr\":\"2022-0002\",\"start_mandaat\":\"25-11-2022\",\"einde_mandaat\":null,\"updated_at\":\"2022-11-25 12:56:53\",\"created_at\":\"2022-11-25 12:56:53\",\"id\":2}', '85.145.244.191', '2022-11-25 11:56:53', '2022-11-25 11:56:53'),
(46, 'audit:created', 14, 'App\\Models\\Member#14', NULL, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Ryan\",\"surname\":\"Dilrosun\",\"street_name\":\"Bijlmerdreef\",\"house_number\":\"1156\",\"zip_code\":\"1103jv\",\"town\":\"Amsterdam\",\"enamel\":\"r_dilrosun@msn.com\",\"date_of_birth\":\"07-02-1975\",\"gender\":\"male\",\"birthplace\":\"Paramaribo\",\"iban\":\"NL22ABNA0524508070\",\"amount\":\"5\",\"ledenid\":\"2022-0003\",\"updated_at\":\"2022-11-25 16:17:38\",\"created_at\":\"2022-11-25 16:17:38\",\"id\":14,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '109.38.128.13', '2022-11-25 15:17:38', '2022-11-25 15:17:38'),
(47, 'audit:updated', 14, 'App\\Models\\Member#14', NULL, '{\"email_checked\":1,\"email_verified_at\":\"2022-11-25 16:18:54\",\"updated_at\":\"2022-11-25 16:18:54\",\"id\":14,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '109.38.128.13', '2022-11-25 15:18:54', '2022-11-25 15:18:54'),
(48, 'audit:created', 15, 'App\\Models\\Member#15', NULL, '{\"type_of_donor\":\"Financial\",\"first_name\":\"Kenneth\",\"surname\":\"Dilrosun\",\"street_name\":\"Po\\u00ebzie straat\",\"house_number\":\"75\",\"zip_code\":\"1321HJ\",\"town\":\"Almere\",\"enamel\":\"r.dilrosun@gmail.com\",\"date_of_birth\":\"12-12-1944\",\"gender\":\"male\",\"birthplace\":\"Paramaribo\",\"iban\":\"NL91INGB0002499430\",\"amount\":\"10\",\"ledenid\":\"2022-0004\",\"updated_at\":\"2022-11-26 16:30:46\",\"created_at\":\"2022-11-26 16:30:46\",\"id\":15,\"photograph\":null,\"signed_document\":null,\"media\":[]}', '95.96.0.177', '2022-11-26 15:30:46', '2022-11-26 15:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_member_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_almere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ledenid_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mandaats`
--

CREATE TABLE `mandaats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandaadnr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_mandaat` date DEFAULT NULL,
  `einde_mandaat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ledenid_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mandaats`
--

INSERT INTO `mandaats` (`id`, `status`, `mandaadnr`, `start_mandaat`, `einde_mandaat`, `created_at`, `updated_at`, `deleted_at`, `ledenid_id`) VALUES
(1, 'Active', '2022-0001', '2022-11-25', NULL, '2022-11-25 11:56:23', '2022-11-25 12:25:15', '2022-11-25 12:25:15', 12),
(2, 'Active', '2022-0002', '2022-11-25', NULL, '2022-11-25 11:56:53', '2022-11-25 12:25:15', '2022-11-25 12:25:15', 13);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'ae39c791-5c63-4ebc-8f60-6930d40f8908', 'photograph', '637e43595594f_IMG_1009_vk', '637e43595594f_IMG_1009_vk.jpg', 'image/jpeg', 'public', 'public', 4235626, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 1, '2022-11-23 14:59:24', '2022-11-23 14:59:26'),
(3, 'App\\Models\\Member', 10, '8a2526d0-3b1e-467a-8bcd-e2abedbc9c2c', 'photograph', '637f81ad77cb3_fav-icon', '637f81ad77cb3_fav-icon.png', 'image/png', 'public', 'public', 9106, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 2, '2022-11-24 13:37:39', '2022-11-24 13:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ledenid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Registered',
  `type_of_donor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enamel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_checked` int(11) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribe_date` date DEFAULT NULL,
  `terms_1` int(1) DEFAULT NULL,
  `terms_2` int(1) DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `ledenid`, `status`, `type_of_donor`, `first_name`, `surname`, `street_name`, `house_number`, `zip_code`, `town`, `land`, `enamel`, `email_checked`, `email_verified_at`, `date_of_birth`, `gender`, `birthplace`, `unsubscribe_date`, `terms_1`, `terms_2`, `remark`, `iban`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, '2022-0001', 'Registered', 'Financial', 'faried', 'Bholai', 'juwelenstraat', '3', '1336 tc', 'Almere', NULL, 'fariedb@gmail.com', NULL, NULL, '1988-11-28', 'male', 'Amsterdam', NULL, NULL, NULL, NULL, 'NL19 ABNA 0624 0040 31', '10', '2022-11-24 15:02:57', '2022-11-25 11:41:04', NULL),
(13, '2022-0002', 'Registered', 'Financial', 'Sheriel', 'Nabie', 'Raoul Wallenbergstraat', '41', '1102 AX', 'Amsterdam', NULL, 's.nabie@hotmail.com', 1, '2022-11-24 16:16:41', '1974-10-28', 'male', 'Nw Nickerie', NULL, NULL, NULL, NULL, 'NL33 ABNA 0830 9830 58', '100', '2022-11-24 15:15:53', '2022-11-24 15:16:41', NULL),
(14, '2022-0003', 'Registered', 'Financial', 'Ryan', 'Dilrosun', 'Bijlmerdreef', '1156', '1103jv', 'Amsterdam', NULL, 'r_dilrosun@msn.com', 1, '2022-11-25 16:18:54', '1975-02-07', 'male', 'Paramaribo', NULL, NULL, NULL, NULL, 'NL22ABNA0524508070', '5', '2022-11-25 15:17:38', '2022-11-25 15:18:54', NULL),
(15, '2022-0004', 'Registered', 'Financial', 'Kenneth', 'Dilrosun', 'Poëzie straat', '75', '1321HJ', 'Almere', NULL, 'r.dilrosun@gmail.com', NULL, NULL, '1944-12-12', 'male', 'Paramaribo', NULL, NULL, NULL, NULL, 'NL91INGB0002499430', '10', '2022-11-26 15:30:46', '2022-11-26 15:30:46', NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2022_02_18_000001_create_audit_logs_table', 1),
(3, '2022_02_18_000002_create_media_table', 1),
(4, '2022_02_18_000003_create_permissions_table', 1),
(5, '2022_02_18_000004_create_roles_table', 1),
(6, '2022_02_18_000005_create_users_table', 1),
(7, '2022_02_18_000006_create_members_table', 1),
(8, '2022_02_18_000007_create_permission_role_pivot_table', 1),
(9, '2022_02_18_000008_create_role_user_pivot_table', 1),
(10, '2022_02_18_000009_add_verification_fields', 1),
(11, '2022_02_18_000010_add_approval_fields', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'member_create', NULL, NULL, NULL),
(20, 'member_edit', NULL, NULL, NULL),
(21, 'member_show', NULL, NULL, NULL),
(22, 'member_delete', NULL, NULL, NULL),
(23, 'member_access', NULL, NULL, NULL),
(24, 'members_management_access', NULL, NULL, NULL),
(25, 'family_create', NULL, NULL, NULL),
(26, 'family_edit', NULL, NULL, NULL),
(27, 'family_show', NULL, NULL, NULL),
(28, 'family_delete', NULL, NULL, NULL),
(29, 'family_access', NULL, NULL, NULL),
(30, 'mandaat_create', NULL, NULL, NULL),
(31, 'mandaat_edit', NULL, NULL, NULL),
(32, 'mandaat_show', NULL, NULL, NULL),
(33, 'mandaat_delete', NULL, NULL, NULL),
(34, 'mandaat_access', NULL, NULL, NULL),
(35, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `line1` text COLLATE utf8mb4_unicode_ci,
  `line2` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `subject`, `line1`, `line2`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Birthday Email Template', 'Happy Birthday {member_name}', '{member_name} Happy Birthday from our side.', 'Hope you Enjoying your day', 'https://campusbadr.nl/', '2022-11-28 17:03:44', '2022-11-28 14:18:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enamel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `verified` tinyint(1) DEFAULT '0',
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `enamel`, `telephone`, `approved`, `verified`, `verified_at`, `verification_token`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '', '', '', 1, 1, '2022-02-15 16:49:53', '', 'admin@admin.com', NULL, '$2y$10$0D7D9uy.faTuWoTsbYCWhefYtJuJDFdNrDIsAj2wcT0DMWvSOQioK', 'u0ux48eFWQFzVfpP9B6K2nTvjEX0bcKyiYdTlo7qC1TOEmOIeMvzFmDq9qWh', NULL, NULL, NULL),
(2, 'Shamier', 'Madhar', 'shamier@madhar.nl', '0640801457', 1, 1, '2022-04-04 10:14:20', NULL, 'shamier@madhar.nl', NULL, '$2y$10$vWZ.K4DVOyAVJmMFEpmcvO4mdIHs7..z9YET4kuaLHHhxCk/aLGy.', NULL, '2022-04-04 08:14:20', '2022-11-23 14:59:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `member_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`member_id`, `token`, `created_at`, `updated_at`) VALUES
(4, '0ab177e2f26231d12c957a8c4a4d9a33ee04bb8a', '2022-04-26 19:50:20', '2022-04-26 19:50:20'),
(5, '376359a01a85310b11a19cbc1de7b22ca226ce1e', '2022-04-26 20:14:56', '2022-08-08 17:08:45'),
(6, '2fce1c00af378e4ffd1ab948f7279527d5870205', '2022-04-29 20:16:46', '2022-04-29 20:16:46'),
(7, '7e7e6508264429631ce434cbc2e441e73d76f973', '2022-04-29 20:21:38', '2022-04-29 20:21:38'),
(8, '1eccb900370ed57315e0bfeb86ae60b434a5d0cd', '2022-11-23 16:30:46', '2022-11-23 16:30:46'),
(9, '9ab92a04e2ad408aff6fd80a45c13b45880376d0', '2022-11-24 12:12:39', '2022-11-24 13:27:49'),
(10, '9817dd4f5a22c661f1825d37d8817a4f7025c6f1', '2022-11-24 13:37:40', '2022-11-24 13:37:40'),
(11, '5d62689d7d9472b5134f1f49f9be505a850f25e2', '2022-11-24 13:53:51', '2022-11-24 13:53:51'),
(12, 'a4454fbb299f6f1eef4daad186c20b9a2e2ab565', '2022-11-24 15:02:59', '2022-11-25 11:41:15'),
(13, 'cb613e7be22b787ba6f76459dfa09157fb1603e9', '2022-11-24 15:15:53', '2022-11-24 15:15:53'),
(14, '2cbe0517f66bedbce55fe3ea345a82546a522284', '2022-11-25 15:17:40', '2022-11-25 15:17:40'),
(15, '769279dd57b569f61289a570ac138d2fd46ea064', '2022-11-26 15:30:48', '2022-11-28 07:38:01'),
(4, '0ab177e2f26231d12c957a8c4a4d9a33ee04bb8a', '2022-04-26 19:50:20', '2022-04-26 19:50:20'),
(5, '376359a01a85310b11a19cbc1de7b22ca226ce1e', '2022-04-26 20:14:56', '2022-08-08 17:08:45'),
(6, '2fce1c00af378e4ffd1ab948f7279527d5870205', '2022-04-29 20:16:46', '2022-04-29 20:16:46'),
(7, '7e7e6508264429631ce434cbc2e441e73d76f973', '2022-04-29 20:21:38', '2022-04-29 20:21:38'),
(8, '1eccb900370ed57315e0bfeb86ae60b434a5d0cd', '2022-11-23 16:30:46', '2022-11-23 16:30:46'),
(9, '9ab92a04e2ad408aff6fd80a45c13b45880376d0', '2022-11-24 12:12:39', '2022-11-24 13:27:49'),
(10, '9817dd4f5a22c661f1825d37d8817a4f7025c6f1', '2022-11-24 13:37:40', '2022-11-24 13:37:40'),
(11, '5d62689d7d9472b5134f1f49f9be505a850f25e2', '2022-11-24 13:53:51', '2022-11-24 13:53:51'),
(12, 'a4454fbb299f6f1eef4daad186c20b9a2e2ab565', '2022-11-24 15:02:59', '2022-11-25 11:41:15'),
(13, 'cb613e7be22b787ba6f76459dfa09157fb1603e9', '2022-11-24 15:15:53', '2022-11-24 15:15:53'),
(14, '2cbe0517f66bedbce55fe3ea345a82546a522284', '2022-11-25 15:17:40', '2022-11-25 15:17:40'),
(15, '769279dd57b569f61289a570ac138d2fd46ea064', '2022-11-26 15:30:48', '2022-11-28 07:38:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledenid_fk_6420006` (`ledenid_id`);

--
-- Indexes for table `mandaats`
--
ALTER TABLE `mandaats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledenid_fk_6453758` (`ledenid_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_ledenid_unique` (`ledenid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_5975492` (`role_id`),
  ADD KEY `permission_id_fk_5975492` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_5975501` (`user_id`),
  ADD KEY `role_id_fk_5975501` (`role_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
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
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mandaats`
--
ALTER TABLE `mandaats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `ledenid_fk_6420006` FOREIGN KEY (`ledenid_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `mandaats`
--
ALTER TABLE `mandaats`
  ADD CONSTRAINT `ledenid_fk_6453758` FOREIGN KEY (`ledenid_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_5975492` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_5975492` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_5975501` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_5975501` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
