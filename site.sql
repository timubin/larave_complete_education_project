-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `username`, `email`) VALUES
(1, 'admin', '1234', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_meg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_mobile`, `contact_email`, `contact_meg`) VALUES
(1, 'Mubin', '01799238826', 'mubin@gmail.com', 'I need a Website'),
(5, 'php artisan serve', 'php artisan serve', 'php artisan serve', 'php artisan serve'),
(6, 'php artisan serve', 'php artisan serve', 'php@gmail.com', 'php artisan serve'),
(7, 'php artisan serve', 'php artisan serve', 'php@gmail.com', 'php artisan serve');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(16, 'Online Class', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', '2000', '124', '541', 'https://timubin.com/', 'http://localhost:9000/storage/psqESvH6Zy11tWhkPyEAzQSc2XEfmcFbGf3Rr4g6.png'),
(17, 'React js', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', '1450', '174', '641', 'https://timubin.com/', 'http://localhost:9000/storage/N4VH7dF5zv5T4TUXwd6vj8Rbm46qnL9KTzDSE4op.png'),
(18, 'Digital Marketing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', '142', '114', '541', 'https://timubin.com/', 'http://localhost:9000/storage/ZHfRZIgotpX8Pz8DCWYOMR4SPTnFyBh1MhTYIP9Z.png');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_12_04_052749_visitor_table', 1),
(3, '2022_12_05_145224_service_table', 2),
(4, '2022_12_14_034009_course_table', 3),
(5, '2022_12_16_104918_projects_table', 4),
(6, '2022_12_17_043549_contact_table', 5),
(7, '2022_12_18_084507_review_table', 6),
(8, '2014_10_12_000000_create_users_table', 7),
(9, '2014_10_12_100000_create_password_resets_table', 7),
(10, '2019_08_19_000000_create_failed_jobs_table', 7),
(11, '2022_12_19_130331_admin_table', 7),
(12, '2022_12_20_140111_photo_table', 8);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `location`) VALUES
(64, 'http://localhost:9000/storage/psqESvH6Zy11tWhkPyEAzQSc2XEfmcFbGf3Rr4g6.png'),
(65, 'http://localhost:9000/storage/ZHfRZIgotpX8Pz8DCWYOMR4SPTnFyBh1MhTYIP9Z.png'),
(66, 'http://localhost:9000/storage/JclF0sKFAZhyaJj51IYo5oj7ZrpsOWkPHuFNeatI.png'),
(67, 'http://localhost:9000/storage/SdfFq7kckG8RUtRz7VsAZftpjeGV7aRFvZ6vlwZw.png'),
(68, 'http://localhost:9000/storage/N4VH7dF5zv5T4TUXwd6vj8Rbm46qnL9KTzDSE4op.png');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_img`) VALUES
(1, 'আইটি কোর্স ', 'মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট ', 'https://timubin.com/', 'http://localhost/images/poject.jpg'),
(6, 'মার্কেটপ্লেস সাপোর্ট', 'মার্কেটপ্লেস সাপোর্ট টিম দ্বারা ৩ মাস / লাইফ টাইম মার্কেটপ্লেস সাপোর্ট', 'https://timubin.com/', 'http://localhost/images/poject.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `des`, `img`) VALUES
(1, 'বিল গেটস 1', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'http://localhost/images/bill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_img`) VALUES
(2, 'সোর্স কোড', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/code.svg'),
(3, 'ইন্টারফেস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/graphic.svg'),
(4, 'কাস্টম সার্ভিস', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/custom.svg'),
(10, 'সোর্স কোড', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/code.svg');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2022-12 05:11:50pm'),
(2, '127.0.0.1', '2022-12 05:12:03pm'),
(3, '127.0.0.1', '2022-12 06:15:21pm'),
(4, '127.0.0.1', '2022-12 08:36:50pm'),
(5, '127.0.0.1', '2022-12 08:37:21pm'),
(6, '127.0.0.1', '2022-12 08:37:30pm'),
(7, '127.0.0.1', '2022-12 08:37:58pm'),
(8, '127.0.0.1', '2022-12 08:43:21pm'),
(9, '127.0.0.1', '2022-12 08:47:39pm'),
(10, '127.0.0.1', '2022-12 09:27:38pm'),
(11, '127.0.0.1', '2022-12 09:28:31pm'),
(12, '127.0.0.1', '2022-12 09:29:36pm'),
(13, '127.0.0.1', '2022-12 08:49:54pm'),
(14, '127.0.0.1', '2022-12 09:30:08am'),
(15, '127.0.0.1', '2022-12 09:38:02am'),
(16, '127.0.0.1', '2022-12 10:39:53am'),
(17, '127.0.0.1', '2022-12 11:31:07am'),
(18, '127.0.0.1', '2022-12 11:33:31am'),
(19, '127.0.0.1', '2022-12 11:35:34am'),
(20, '127.0.0.1', '2022-12 11:37:12am'),
(21, '127.0.0.1', '2022-12 11:38:56am'),
(22, '127.0.0.1', '2022-12 11:41:08am'),
(23, '127.0.0.1', '2022-12 11:42:20am'),
(24, '127.0.0.1', '2022-12 11:45:37am'),
(25, '127.0.0.1', '2022-12 11:48:57am'),
(26, '127.0.0.1', '2022-12 04:23:23pm'),
(27, '127.0.0.1', '2022-12 04:26:56pm'),
(28, '127.0.0.1', '2022-12 04:28:22pm'),
(29, '127.0.0.1', '2022-12 04:33:35pm'),
(30, '127.0.0.1', '2022-12 04:34:13pm'),
(31, '127.0.0.1', '2022-12 04:34:36pm'),
(32, '127.0.0.1', '2022-12 04:35:14pm'),
(33, '127.0.0.1', '2022-12 04:35:56pm'),
(34, '127.0.0.1', '2022-12 04:46:07pm'),
(35, '127.0.0.1', '2022-12 04:46:18pm'),
(36, '127.0.0.1', '2022-12 05:12:07pm'),
(37, '127.0.0.1', '2022-12 05:12:38pm'),
(38, '127.0.0.1', '2022-12 05:15:43pm'),
(39, '127.0.0.1', '2022-12 05:16:18pm'),
(40, '127.0.0.1', '2022-12 10:30:17am'),
(41, '127.0.0.1', '2022-12 10:31:32am'),
(42, '127.0.0.1', '2022-12 10:32:14am'),
(43, '127.0.0.1', '2022-12 10:32:41am'),
(44, '127.0.0.1', '2022-12 10:34:04am'),
(45, '127.0.0.1', '2022-12 12:19:37pm'),
(46, '127.0.0.1', '2022-12 12:22:13pm'),
(47, '127.0.0.1', '2022-12 12:25:35pm'),
(48, '127.0.0.1', '2022-12 12:27:51pm'),
(49, '127.0.0.1', '2022-12 12:29:32pm'),
(50, '127.0.0.1', '2022-12 12:31:28pm'),
(51, '127.0.0.1', '2022-12 12:32:28pm'),
(52, '127.0.0.1', '2022-12 01:13:30pm'),
(53, '127.0.0.1', '2022-12 01:15:57pm'),
(54, '127.0.0.1', '2022-12 01:17:05pm'),
(55, '127.0.0.1', '2022-12 04:19:39pm'),
(56, '127.0.0.1', '2022-12 04:32:44pm'),
(57, '127.0.0.1', '2022-12 04:38:00pm'),
(58, '127.0.0.1', '2022-12 04:38:51pm'),
(59, '127.0.0.1', '2022-12 04:48:14pm'),
(60, '127.0.0.1', '2022-12 04:48:35pm'),
(61, '127.0.0.1', '2022-12 04:53:04pm'),
(62, '127.0.0.1', '2022-12 04:53:25pm'),
(63, '127.0.0.1', '2022-12 04:55:26pm'),
(64, '127.0.0.1', '2022-12 04:56:02pm'),
(65, '127.0.0.1', '2022-12 05:08:56pm'),
(66, '127.0.0.1', '2022-12 05:09:11pm'),
(67, '127.0.0.1', '2022-12 05:09:21pm'),
(68, '127.0.0.1', '2022-12 05:13:20pm'),
(69, '127.0.0.1', '2022-12 05:14:38pm'),
(70, '127.0.0.1', '2022-12 05:16:54pm'),
(71, '127.0.0.1', '2022-12 05:29:45pm'),
(72, '127.0.0.1', '2022-12 05:35:20pm'),
(73, '127.0.0.1', '2022-12 05:41:27pm'),
(74, '127.0.0.1', '2022-12 05:41:43pm'),
(75, '127.0.0.1', '2022-12 05:45:54pm'),
(76, '127.0.0.1', '2022-12 11:38:23am'),
(77, '127.0.0.1', '2022-12 03:36:37pm'),
(78, '127.0.0.1', '2022-12 03:37:22pm'),
(79, '127.0.0.1', '2022-12 03:45:12pm'),
(80, '127.0.0.1', '2022-12 03:46:47pm'),
(81, '127.0.0.1', '2022-12 04:08:59pm'),
(82, '127.0.0.1', '2022-12 04:09:40pm'),
(83, '127.0.0.1', '2022-12 04:10:26pm'),
(84, '127.0.0.1', '2022-12 04:12:13pm'),
(85, '127.0.0.1', '2022-12 04:25:26pm'),
(86, '127.0.0.1', '2022-12 04:32:33pm'),
(87, '127.0.0.1', '2022-12 04:32:51pm'),
(88, '127.0.0.1', '2022-12 04:34:03pm'),
(89, '127.0.0.1', '2022-12 05:44:37pm'),
(90, '127.0.0.1', '2022-12 05:50:01pm'),
(91, '127.0.0.1', '2022-12 11:41:50am'),
(92, '127.0.0.1', '2022-12 12:13:22pm'),
(93, '127.0.0.1', '2022-12 01:43:15pm'),
(94, '127.0.0.1', '2022-12 03:33:30pm'),
(95, '127.0.0.1', '2022-12 03:38:07pm'),
(96, '127.0.0.1', '2022-12 03:41:21pm'),
(97, '127.0.0.1', '2022-12 03:43:33pm'),
(98, '127.0.0.1', '2022-12 03:48:27pm'),
(99, '127.0.0.1', '2022-12 03:48:55pm'),
(100, '127.0.0.1', '2022-12 04:39:24pm'),
(101, '127.0.0.1', '2022-12 04:39:51pm'),
(102, '127.0.0.1', '2022-12 04:40:04pm'),
(103, '127.0.0.1', '2022-12 04:40:20pm'),
(104, '127.0.0.1', '2022-12 04:44:50pm'),
(105, '127.0.0.1', '2022-12 10:02:55am'),
(106, '127.0.0.1', '2022-12 10:15:45am'),
(107, '127.0.0.1', '2022-12 10:18:51am'),
(108, '127.0.0.1', '2022-12 10:27:44am'),
(109, '127.0.0.1', '2022-12 10:37:28am'),
(110, '127.0.0.1', '2022-12 02:51:06pm'),
(111, '127.0.0.1', '2022-12 02:52:02pm'),
(112, '127.0.0.1', '2022-12 02:53:34pm'),
(113, '127.0.0.1', '2022-12 02:54:50pm'),
(114, '127.0.0.1', '2022-12 02:56:29pm'),
(115, '127.0.0.1', '2022-12 02:57:28pm'),
(116, '127.0.0.1', '2022-12 03:10:33pm'),
(117, '127.0.0.1', '2022-12 03:11:24pm'),
(118, '127.0.0.1', '2022-12 03:24:46pm'),
(119, '127.0.0.1', '2022-12 03:39:11pm'),
(120, '127.0.0.1', '2022-12 03:40:08pm'),
(121, '127.0.0.1', '2022-12 03:40:32pm'),
(122, '127.0.0.1', '2022-12 03:44:28pm'),
(123, '127.0.0.1', '2022-12 03:46:43pm'),
(124, '127.0.0.1', '2022-12 03:47:47pm'),
(125, '127.0.0.1', '2022-12 03:50:31pm'),
(126, '127.0.0.1', '2022-12 03:54:59pm'),
(127, '127.0.0.1', '2022-12 03:55:49pm'),
(128, '127.0.0.1', '2022-12 04:59:15pm'),
(129, '127.0.0.1', '2022-12 05:00:18pm'),
(130, '127.0.0.1', '2022-12 05:06:19pm'),
(131, '127.0.0.1', '2022-12 05:07:55pm'),
(132, '127.0.0.1', '2022-12 05:09:54pm'),
(133, '127.0.0.1', '2022-12 05:13:33pm'),
(134, '127.0.0.1', '2022-12 05:15:12pm'),
(135, '127.0.0.1', '2022-12 05:16:26pm'),
(136, '127.0.0.1', '2022-12 05:17:17pm'),
(137, '127.0.0.1', '2022-12 05:19:52pm'),
(138, '127.0.0.1', '2022-12 05:24:41pm'),
(139, '127.0.0.1', '2022-12 05:29:53pm'),
(140, '127.0.0.1', '2022-12 05:33:11pm'),
(141, '127.0.0.1', '2022-12 05:34:33pm'),
(142, '127.0.0.1', '2022-12 05:35:39pm'),
(143, '127.0.0.1', '2022-12 05:36:01pm'),
(144, '127.0.0.1', '2022-12 06:54:32pm'),
(145, '127.0.0.1', '2022-12 08:09:19pm'),
(146, '127.0.0.1', '2022-12 08:11:43pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
