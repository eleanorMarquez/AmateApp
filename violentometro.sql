-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 02:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `violentometro`
--

-- --------------------------------------------------------

--
-- Table structure for table `citations`
--

CREATE TABLE `citations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_profesional` bigint(20) UNSIGNED NOT NULL,
  `date_cita` date NOT NULL,
  `time_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desciption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type_cita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_cita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citations`
--

INSERT INTO `citations` (`id`, `id_profesional`, `date_cita`, `time_start`, `time_end`, `desciption`, `status`, `type_cita`, `link_cita`, `created_at`, `updated_at`) VALUES
(7, 3, '2022-09-24', '07:00:00', '09:00:00', 'hhhhhhhhh', 1, '', NULL, '2022-09-28 10:22:23', '2022-09-28 10:22:23'),
(11, 3, '2022-10-27', '09:00:00', '10:00:00', 'cccc', 1, 'on', 'https://www.ilovepdf.com/es/pdf_a_word', '2022-10-27 08:05:07', '2022-10-27 08:05:07'),
(12, 3, '2022-10-28', '00:00:00', '00:00:00', 'hhhhhhhhh', 1, 'on', 'https://www.ilovepdf.com/es/pdf_a_word', '2022-10-27 08:07:34', '2022-10-27 08:07:34'),
(13, 3, '2022-10-28', '02:30:00', '04:00:00', 'iiiiiiiiiiiii', 1, 'on', 'https://www.ilovepdf.com/es/pdf_a_word', '2022-10-27 08:22:25', '2022-10-27 08:22:25'),
(14, 3, '2022-10-29', '00:30:00', '01:30:00', 'pppp', 1, '0', NULL, '2022-10-27 08:27:05', '2022-10-27 08:27:05'),
(15, 3, '2022-10-29', '03:00:00', '04:30:00', 'jjjjjjj', 1, 'on', 'https://www.ilovepdf.com/es/pdf_a_word', '2022-10-27 08:27:34', '2022-10-27 08:27:34'),
(19, 3, '2022-11-03', '10:00:00', '11:00:00', 'hhhhhh', 0, '0', NULL, '2022-11-02 07:18:35', '2022-11-02 07:18:59'),
(20, 3, '2022-11-03', '13:00:00', '14:00:00', 'llllll', 0, '0', NULL, '2022-11-02 07:18:44', '2022-11-02 09:36:21'),
(21, 3, '2022-11-04', '15:00:00', '16:00:00', 'uu', 0, '0', NULL, '2022-11-02 09:37:21', '2022-11-02 09:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE `directories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_of_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`id`, `entity`, `image`, `area_of_contact`, `phones`, `ubication`, `facebook`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'poilicia', '/storage/imagenesentidades/a4uk9q4Qc7cJtKfNlvAJ2sj5pDTkXkhhwX9RpKbl.jpg', 'saasas', '232332', 'sdsda', NULL, NULL, '2022-10-05 10:00:13', '2022-10-05 10:00:13'),
(2, 'Fiscalia', '/storage/imagenesentidades/Vd0uthiqt9Hz0KrWu2PqJxHTcQW4CklZXluATNnu.jpg', 'cdcc', '33333', 'sddssdds', NULL, NULL, '2022-10-05 10:00:52', '2022-10-05 10:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `id_author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `ubication`, `date`, `hour`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'hh', '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></div><div>Why do we use it?<br><br></div><div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br><br></div>', '/storage/imageneseventos/fbpGRZxQFkJI3Ufndn5BsIj06Jx3CTcWXApwFjRk.jpg', 'dddssdsdds', '2022-10-05', '05:05:00', 3, '2022-10-04 08:18:43', '2022-10-04 08:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `title`, `description`, `image`, `id_author`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>', '/storage/imagenesnoticias/Rum33QgiuTNEtHInnbCDA5o6fRd49SNFDiBNoDqa.jpg', 1, '2022-10-02 20:53:55', '2022-10-02 20:53:55');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_31_040334_create_permission_tables', 1),
(6, '2022_09_04_175456_create_information_table', 1),
(7, '2022_09_04_180616_create_events_table', 1),
(8, '2022_09_04_182306_create_directories_table', 1),
(9, '2022_09_08_035344_create_questions_table', 1),
(10, '2022_09_11_205225_create_tests_table', 1),
(11, '2022_09_25_174347_create_citations_table', 1),
(12, '2022_10_14_031027_create_reservar_citas_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ask` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_up` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `ask`, `category`, `deleted_up`, `created_at`, `updated_at`) VALUES
(1, 'Te golpea o agrede\r\nfísicamente', 'urgente', NULL, '2022-10-23 02:43:24', '2022-10-23 02:43:24'),
(2, 'Te fuerza a tener relaciones\r\nsexuales ( violación )', 'urgente', NULL, '2022-10-23 02:43:58', '2022-10-23 02:43:58'),
(3, 'Te amenaza de muerte', 'urgente', NULL, '2022-10-23 02:44:34', '2022-10-23 02:44:34'),
(4, 'Te amenaza con objetos\r\no armas', 'urgente', NULL, '2022-10-23 02:44:55', '2022-10-23 02:44:55'),
(5, 'Te encierra o te aísla\r\nde tus seres queridos', 'urgente', NULL, '2022-10-23 02:45:09', '2022-10-23 02:45:09'),
(6, 'Te trata con desprecio', 'reacciona', NULL, '2022-10-23 02:46:01', '2022-10-23 02:46:01'),
(7, 'Te ofende verbalmente ,\r\nte insulta', 'reacciona', NULL, '2022-10-23 02:46:38', '2022-10-23 02:46:38'),
(8, 'Te empuja , te jalonea', 'reacciona', NULL, '2022-10-23 02:46:55', '2022-10-23 02:46:55'),
(9, 'Te pellizca , te araña', 'reacciona', NULL, '2022-10-23 02:47:13', '2022-10-23 02:47:13'),
(10, 'Te golpea \" jugando \"', 'reacciona', NULL, '2022-10-23 02:47:27', '2022-10-23 02:47:27'),
(11, 'Te acaricia agresivamente', 'reacciona', NULL, '2022-10-23 02:47:45', '2022-10-23 02:47:45'),
(12, 'Te manosea', 'reacciona', NULL, '2022-10-23 02:48:31', '2022-10-23 02:48:31'),
(13, 'Maneja y dispone de\r\ntu dinero ,', 'reacciona', '2022-10-22', '2022-10-23 02:48:47', '2022-10-23 02:49:43'),
(14, 'Maneja y dispone de\r\ntu dinero ,\r\ntus bienes o tus documentos', 'reacciona', NULL, '2022-10-23 02:50:10', '2022-10-23 02:50:10'),
(15, 'Te prohíbe usar métodos\r\n anticonceptivos', 'reacciona', NULL, '2022-10-23 02:52:22', '2022-10-23 02:52:22'),
(16, 'Te hace bromas hirientes o piropos ofensivos', 'alerta', NULL, '2022-10-23 02:57:22', '2022-10-23 02:57:22'),
(17, 'Te amenaza', 'alerta', NULL, '2022-10-23 02:57:39', '2022-10-23 02:57:39'),
(18, 'Te intimida', 'alerta', NULL, '2022-10-23 02:57:52', '2022-10-23 02:57:52'),
(19, 'Te humilla o ridiculiza', 'alerta', NULL, '2022-10-23 02:58:11', '2022-10-23 02:58:11'),
(20, 'Descalifica tus opiniones', 'alerta', NULL, '2022-10-23 02:58:36', '2022-10-23 02:58:36'),
(21, 'Te cela', 'alerta', NULL, '2022-10-23 02:58:53', '2022-10-23 02:58:53'),
(22, 'Te miente', 'alerta', NULL, '2022-10-23 02:59:08', '2022-10-23 02:59:08'),
(23, 'Destruye objetos', 'alerta', NULL, '2022-10-23 02:59:46', '2022-10-23 02:59:46'),
(24, 'Controla tus amistades o relaciones con tu familia', 'alerta', NULL, '2022-10-23 03:00:26', '2022-10-23 03:00:26'),
(25, 'Intenta anular tus decisiones', 'alerta', NULL, '2022-10-23 03:00:51', '2022-10-23 03:00:51'),
(26, 'Te indica cómo vestir o maquillarte', 'alerta', NULL, '2022-10-23 03:01:21', '2022-10-23 03:01:21'),
(27, 'Te culpabiliza', 'alerta', NULL, '2022-10-23 03:01:38', '2022-10-23 03:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `reservar_citas`
--

CREATE TABLE `reservar_citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_citation` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservar_citas`
--

INSERT INTO `reservar_citas` (`id`, `id_citation`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(4, 19, 2, 1, '2022-11-02 07:18:59', '2022-11-02 07:18:59'),
(5, 20, 2, 1, '2022-11-02 09:36:21', '2022-11-02 09:36:21'),
(6, 21, 8, 1, '2022-11-02 09:38:57', '2022-11-02 09:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-09-28 05:31:32', '2022-09-28 05:31:32'),
(2, 'Juidico', 'web', '2022-09-28 05:31:32', '2022-09-28 05:31:32'),
(3, 'Psicologo', 'web', '2022-09-28 05:31:32', '2022-09-28 05:31:32'),
(4, 'Usuario', 'web', '2022-09-28 05:31:32', '2022-09-28 05:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_author` bigint(20) UNSIGNED NOT NULL,
  `id_ask` bigint(20) UNSIGNED NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `id_author`, `id_ask`, `answer`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, '2022-10-23 22:19:25', '2022-11-02 05:05:35'),
(2, 2, 2, 0, '2022-10-23 22:19:25', '2022-11-02 05:05:35'),
(3, 2, 3, 0, '2022-10-23 22:19:26', '2022-11-02 05:05:35'),
(4, 2, 4, 0, '2022-10-23 22:19:26', '2022-11-02 05:05:35'),
(5, 2, 5, 0, '2022-10-23 22:19:26', '2022-11-02 05:02:53'),
(6, 2, 6, 0, '2022-10-23 22:19:26', '2022-11-02 05:05:35'),
(7, 2, 7, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:35'),
(8, 2, 8, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:35'),
(9, 2, 9, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:36'),
(10, 2, 10, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:36'),
(11, 2, 11, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:36'),
(12, 2, 12, 0, '2022-10-23 22:19:27', '2022-11-02 05:02:53'),
(13, 2, 13, 0, '2022-10-23 22:19:27', '2022-11-02 05:05:36'),
(14, 2, 14, 1, '2022-10-23 22:19:28', '2022-11-02 04:55:40'),
(15, 2, 15, 1, '2022-10-23 22:19:28', '2022-11-02 05:05:36'),
(16, 2, 16, 1, '2022-10-23 22:19:28', '2022-11-02 04:55:40'),
(17, 2, 17, 1, '2022-10-23 22:19:28', '2022-10-23 22:19:28'),
(18, 2, 18, 1, '2022-10-23 22:19:28', '2022-10-23 22:19:28'),
(19, 2, 19, 1, '2022-10-23 22:19:28', '2022-10-23 22:19:28'),
(20, 2, 20, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(21, 2, 21, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(22, 2, 22, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(23, 2, 23, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(24, 2, 24, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(25, 2, 25, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(26, 2, 26, 0, '2022-10-23 22:19:29', '2022-11-02 05:02:53'),
(27, 2, 27, 0, '2022-10-23 22:19:30', '2022-11-02 05:02:53'),
(29, 5, 27, 0, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(30, 5, 2, 1, '2022-10-24 06:45:11', '2022-10-24 07:23:40'),
(31, 5, 3, 1, '2022-10-24 06:45:11', '2022-10-24 07:23:40'),
(32, 5, 4, 1, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(33, 5, 5, 1, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(34, 5, 6, 0, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(35, 5, 7, 1, '2022-10-24 06:45:11', '2022-10-24 07:23:40'),
(36, 5, 8, 1, '2022-10-24 06:45:11', '2022-10-24 07:32:07'),
(37, 5, 9, 0, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(38, 5, 10, 1, '2022-10-24 06:45:11', '2022-10-24 07:23:40'),
(39, 5, 11, 1, '2022-10-24 06:45:11', '2022-10-24 07:32:07'),
(40, 5, 12, 0, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(41, 5, 13, 1, '2022-10-24 06:45:11', '2022-10-24 07:23:40'),
(42, 5, 14, 0, '2022-10-24 06:45:11', '2022-10-27 05:51:18'),
(43, 5, 15, 0, '2022-10-24 06:45:11', '2022-10-24 06:45:11'),
(44, 5, 16, 0, '2022-10-24 06:45:12', '2022-10-24 07:32:07'),
(45, 5, 17, 1, '2022-10-24 06:45:12', '2022-10-24 07:23:40'),
(46, 5, 18, 0, '2022-10-24 06:45:12', '2022-10-24 06:45:12'),
(47, 5, 19, 1, '2022-10-24 06:45:12', '2022-10-24 07:23:40'),
(48, 5, 20, 0, '2022-10-24 06:45:12', '2022-10-24 06:45:12'),
(49, 5, 21, 1, '2022-10-24 06:45:12', '2022-10-24 07:23:40'),
(50, 5, 22, 0, '2022-10-24 06:45:12', '2022-10-24 06:45:12'),
(51, 5, 23, 1, '2022-10-24 06:45:12', '2022-10-24 07:23:40'),
(52, 5, 24, 0, '2022-10-24 06:45:12', '2022-10-24 07:32:07'),
(53, 5, 25, 1, '2022-10-24 06:45:12', '2022-10-24 07:23:40'),
(54, 5, 26, 0, '2022-10-24 06:45:12', '2022-10-24 06:45:12'),
(55, 5, 27, 0, '2022-10-24 06:45:12', '2022-10-24 06:45:12'),
(73, 5, 1, 1, '2022-10-24 07:23:40', '2022-10-24 07:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `discapacity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `identification`, `area`, `image`, `email`, `email_verified_at`, `password`, `status`, `discapacity`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Amate', '11111112', NULL, '/storage/imagenadmin/HHp5dtCZ3xrAJhdKc4hMCmNgKsqEgfRe0nsStunS.jpg', 'admin@violentometro.co', NULL, '$2y$10$IK9/g4I8pvdNvMZDZ/f80.coIaanDYWZr0qJYMeKcuX2prv1BVKzG', 1, NULL, NULL, '2022-09-28 05:31:33', '2022-10-30 08:45:41'),
(2, 'Wendyyy', 'Silvaaa', '00000055', NULL, '/storage/imagenesusuarios/jUxWCwimR7TtVzMXG9F6NfMQ4qvyNa2n5cf77EjO.jpg', 'Wendy@violentometro.co', NULL, '$2y$10$c6J1dZ5jU2NDLHTiBtBj6eBmwFXxOtpohzCLP5oNgGIia9s2P2W2m', 1, 'ddddddddddddddddddddddddddd', NULL, '2022-09-28 05:31:33', '2022-10-30 23:44:41'),
(3, 'James', 'ikkkkk', '1234567', 'icima', '/storage/imagenesprofesionales/so7DzEFKoAPNUfFKhLJPvVkmtWqddzXM4yU0kj1t.jpg', 'correo@mail.com', NULL, '$2y$10$aev3PeXhB.MpDUp9bWyz9eH86Btl7S/ShPdp.Vfwkswp5uIjepoSO', 1, NULL, NULL, '2022-09-28 05:31:33', '2022-10-30 23:22:05'),
(4, 'yenny', 'silva', '12345678', NULL, NULL, 'yenny@mail.com', NULL, '$2y$10$P.4QiGl0QLh.polWn88XMelq.SkmQKDAUuv5mF5CCfqEpxbFTcR3u', 1, NULL, NULL, '2022-10-10 00:32:27', '2022-10-10 00:32:27'),
(5, 'lidia', 'silva', '109058213', NULL, NULL, 'lidia@mail.com', NULL, '$2y$10$owytyvHwZw.wDyRtYtA0Se2bB/lEZik7E7WTKmO18VqKsKEm72GFm', 1, NULL, NULL, '2022-10-24 06:43:54', '2022-10-24 06:43:54'),
(6, 'aa', 'aaa', '123654789', NULL, NULL, 'aaaa@mil.com', NULL, '$2y$10$TMB2.zhEsHLJsgcljVrOlOo4drdSyIScGEfIiZqE5XmEP3i8KtkvW', 1, NULL, NULL, '2022-10-29 06:52:22', '2022-10-29 06:52:22'),
(7, 'eeee', 'eee', '36221555', NULL, NULL, 'eee@mail.com', NULL, '$2y$10$bHU3sKlXuyGfiXNAOXvBKuWKjeiN1WGUO33StMtvKt0BuL7UosHOe', 1, 'ddddddddddddddddddddddddd', NULL, '2022-10-29 06:55:44', '2022-10-29 06:55:44'),
(8, 'kkk', 'kkkk', '122312322', NULL, NULL, 'hhhjj@mail.com', NULL, '$2y$10$XvBM9oUOiT1KudZBXytevuQb6GvoiG3lRPd.93XZm.zzelMEpeuXy', 1, NULL, NULL, '2022-11-02 05:34:52', '2022-11-02 05:34:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citations`
--
ALTER TABLE `citations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citations_id_profesional_foreign` (`id_profesional`);

--
-- Indexes for table `directories`
--
ALTER TABLE `directories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id_author_foreign` (`id_author`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `information_id_author_foreign` (`id_author`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservar_citas`
--
ALTER TABLE `reservar_citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservar_citas_id_citation_foreign` (`id_citation`),
  ADD KEY `reservar_citas_id_user_foreign` (`id_user`);

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
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_id_author_foreign` (`id_author`),
  ADD KEY `tests_id_ask_foreign` (`id_ask`);

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
-- AUTO_INCREMENT for table `citations`
--
ALTER TABLE `citations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `directories`
--
ALTER TABLE `directories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservar_citas`
--
ALTER TABLE `reservar_citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citations`
--
ALTER TABLE `citations`
  ADD CONSTRAINT `citations_id_profesional_foreign` FOREIGN KEY (`id_profesional`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);

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
-- Constraints for table `reservar_citas`
--
ALTER TABLE `reservar_citas`
  ADD CONSTRAINT `reservar_citas_id_citation_foreign` FOREIGN KEY (`id_citation`) REFERENCES `citations` (`id`),
  ADD CONSTRAINT `reservar_citas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_id_ask_foreign` FOREIGN KEY (`id_ask`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `tests_id_author_foreign` FOREIGN KEY (`id_author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
