-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2025 at 01:03 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educational_experiences`
--

CREATE TABLE `educational_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `college_name` varchar(120) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_experiences`
--

INSERT INTO `educational_experiences` (`id`, `position`, `description`, `college_name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HSC', '<p>Completed the HSC board examination in the Science stream with a GPA of 3.89/5 under the Jeshor Board. Gained a strong foundation in Physics, Chemistry, Mathematics, and Biology. Demonstrated proficiency in analytical thinking, problem-solving, and scientific methodologies.</p>', 'Government Sundarban Adarsha College', '2016-01-27 00:00:00', '2018-01-27 00:00:00', 1, '2025-04-27 18:01:00', '2025-04-27 18:01:00'),
(2, 'B.Tech (Information Technology)', '<p>Completed a B.Tech in Information Technology with a CGPA of 7.17/10. Gained extensive knowledge in computer science, programming, data structures, algorithms, networking, and software development.</p><p>Developed problem-solving, analytical, and technical skills in a versatile academic environment, collaborating on diverse projects and assignments. Gained exposure to both theoretical concepts and practical applications, contributing to a strong foundation in technology and innovation.</p>', 'Lovely Professional University, Punjab, India', '2018-08-01 00:00:00', '2022-07-10 00:00:00', 1, '2025-04-27 18:04:48', '2025-04-27 18:04:48');

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
(2, '2025_04_23_100208_create_site_settings_table', 1),
(3, '2025_04_23_100219_create_sections_table', 1),
(4, '2025_04_23_100230_create_skills_table', 1),
(5, '2025_04_23_100301_create_work_experiences_table', 1),
(6, '2025_04_23_100326_create_educational_experiences_table', 1),
(7, '2025_04_23_100337_create_projects_table', 1),
(8, '2025_04_23_100351_create_project_technologies_table', 1),
(9, '2025_04_23_100401_create_project_images_table', 1),
(10, '2025_04_23_100422_create_contacts_table', 1),
(11, '2025_04_25_080339_add_new_columns_to_project_technologies_table', 1),
(12, '2025_04_25_080613_add_new_columns_to_projects_table', 1),
(13, '2025_04_25_100941_add_position_to_project_images_table', 1),
(14, '2025_04_25_183120_create_resumes_table', 1),
(15, '2025_04_26_042201_add_new_columns_to_site_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `live_url` varchar(255) DEFAULT NULL,
  `repo_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `description`, `img`, `live_url`, `repo_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FATx', 'fatx', '<p><strong>Fatx</strong> is a comprehensive cryptocurrency investment platform that integrates a <strong>Multi-Level Marketing (MLM)</strong> referral system, providing users with a wide array of investment features. The platform allows users to buy, send, and transfer coins between wallets, while offering incentives for engaging in the referral program. When users buy investment packages, they unlock additional benefits, and both they and their referred users receive bonuses as they level up within the system. The backend of Fatx is powered by <strong>Laravel</strong>, coupled with a <strong>MySQL</strong> database, ensuring a robust and efficient infrastructure for handling complex transactions and user data. On the front end, <strong>Next.js</strong> is used to create a seamless and dynamic user interface that enhances the overall experience. Fatx also integrates secure payment methods, enabling safe deposits and withdrawals. Users can initiate withdrawal requests, send funds to others, and monitor their transactions with ease. With API-driven services, Fatx allows for smooth integration with external platforms, making it a versatile and scalable solution for cryptocurrency investment and management.</p>', 'project/1745778216_Screenshot from 2025-04-28 00-17-07.png', 'https://fatx.io/', 'https://github.com/Mukulhosen/fatx-laravel', 1, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(2, 'Srfmart', 'srfmart', '<p><strong>SRFMart</strong> is a dynamic MLM-based eCommerce platform designed to seamlessly integrate multi-level marketing strategies with online retail. Developed using <strong>Laravel</strong> and <strong>Mysql</strong>, it provides a robust backend to handle complex business logic, including multi-level user hierarchies, commission tracking, and secure transactions. The system utilises a <strong>binary referral tree</strong>, where users can earn bonuses across five levels, encouraging network growth and engagement. Whenever a user registers through a referral, the referrer is rewarded with bonus points, and any purchase made by a referred user also results in additional bonuses for the referrer, strengthening the referral-based revenue model.</p><p><br></p><p>The platform supports both regular users and vendors, with the flexibility for any user to switch to a <strong>vendor account</strong> at any time, enabling <strong>multi-vendor</strong> functionality. This feature allows multiple sellers to list and sell their products while maintaining individual control over their inventory and orders. Additionally, an <strong>Agent</strong> role is implemented, allowing users and vendors to send <strong>point-to-cash requests</strong>. These requests are first processed by agents, who then forward them to the admin for approval and disbursement, ensuring proper handling of financial transactions.</p><p><br></p><p><strong>RESTful APIS</strong> were developed to facilitate real-time data synchronisation between the website and mobile applications, ensuring a seamless cross-platform experience for users. The platform also includes advanced <strong>user authentication</strong> with <strong>role-based access control</strong> to ensure that each user type (admin, agent, vendor, or regular user) has appropriate permissions for their actions. Payment workflows, including secure methods for deposits, withdrawals, and order management, are tightly integrated into the platform to ensure secure and efficient transactions.</p><p>Overall, SRFMart combines MLM principles with a full-featured eCommerce experience, providing a scalable, secure, and efficient platform for both users and vendors while encouraging growth through its referral-based system.</p>', 'project/1745778823_Screenshot from 2025-04-28 00-32-16.png', 'https://srfmart.com/', 'https://github.com/shykat199/noor-deal', 1, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(3, 'Pharmacy Invoice', 'pharmacy-invoice', '<p><strong>Pharmachy Invoice</strong> is a pharmacy-focused invoice management system designed to streamline billing, stock management, and order processing. Built with <strong>Laravel</strong> and <strong>Livewire</strong>, it offers a <strong>Single Page Application (SPA)</strong>-like experience, ensuring fast, smooth interactions without full page reloads. The system supports <strong>multi-role authentication</strong>, allowing admins, pharmacists, and other staff members to access features based on their roles and permissions.</p><p><br></p><p>Admins can manage and generate pre-defined <strong>medicine stock lists</strong>, which automatically sync with live stock levels. When medicines go out of stock, the system can alert or update inventory to ensure real-time accuracy. Pharmachy Invoice simplifies the entire process — from maintaining stock availability to generating accurate, professional invoices — providing a complete solution for modern pharmacy operations.</p>', 'project/1745780758_Screenshot.png', 'https://pharmacy.dnox.xyz/', 'https://github.com/Mukulhosen/pharmacy', 1, '2025-04-27 19:05:58', '2025-04-27 19:05:58'),
(4, 'Community Pet Social Media Site', 'community-pet-social-media-site', '<p><strong>Community Pet</strong> is a social media platform specially designed for pet lovers and pet owners. It includes all the key features of modern social networks, allowing users to <strong>create posts</strong> with <strong>images, text, audio, and videos</strong> related to their pets. Users can <strong>follow</strong> other pet owners, <strong>like</strong>, <strong>comment</strong>, and <strong>share</strong> posts to build a vibrant and supportive pet community. </p><p>The platform promotes interaction, sharing pet experiences, and forming connections among pet enthusiasts. Designed with scalability and a user-friendly experience in mind, Community Pet creates a lively space where people can showcase their pets and engage with a like-minded community.</p>', 'project/1745781179_images.jpeg', NULL, NULL, 1, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(5, 'Property Stock Management', 'property-stock-management', '<p><strong>Property Stock Management</strong> is a real estate listing platform developed using <strong>Laravel</strong> and <strong>Livewire</strong>, providing a smooth <strong>Single Page Application (SPA)</strong>-like experience. Designed for a <strong>UK-based company</strong>, the platform allows real estate agencies and property managers to efficiently <strong>list, manage, and update</strong> property inventories. It features tools for adding property details, managing availability status, and organising listings for better visibility. Built with a focus on performance and usability, the system streamlines property management workflows and offers a responsive, user-friendly interface for both admins, builders, companies or any individual user.</p>', 'project/1745816140_Screenshot from 2025-04-28 10-51-33.png', 'https://bootstrap.mdashikulislam.xyz/', 'https://github.com/mdashikulislam/propertystocklist.co.uk', 1, '2025-04-28 04:55:40', '2025-04-28 04:55:40'),
(6, 'FATx Wallet', 'fatx-wallet', '<p><strong>Fatx Wallet</strong> is a lightweight money transfer platform developed using <strong>HTML</strong>, <strong>CSS</strong>, and <strong>Laravel</strong> for its backend API. It is closely associated with <strong>FATx</strong>, a cryptocurrency investment platform. Trust Wallet provides a simple service that enables <strong>user-to-user money transfers</strong> based on <strong>wallet addresses</strong>, making it easy and secure for users to send funds within the FATx ecosystem.</p>', 'project/1745816554_Screenshot from 2025-04-28 11-01-38.png', NULL, 'https://github.com/Mukulhosen/trust-wallet', 1, '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(7, 'Ads Server', 'ads-server', '<p><strong>Ads Server</strong> is a powerful <strong>ad management platform</strong> designed to help advertisers and publishers manage ad placements efficiently. Built with <strong>Laravel</strong> for the backend and <strong>Material Design</strong> for the frontend, the platform offers a smooth, modern user experience.</p><p><br></p><p>It operates on a <strong>slot booking system</strong>, where ad spaces (slots) are listed and can be booked by advertisers. Publishers (site owners) can manage available slots and control which ads appear on their sites. Advertisers can easily <strong>upload and submit their ads</strong> through the platform, and admins (publishers) can review, approve, and schedule them for display.</p><p><br></p><p>Ads Server supports multiple ad formats, including <strong>banner ads</strong>, <strong>native ads</strong>, and <strong>paid campaigns</strong>. It also features comprehensive real-time reporting, allowing users to track <strong>CPC</strong> (Cost Per Click), <strong>CPM</strong> (Cost Per Thousand Impressions), and <strong>CPD</strong> (Cost Per Day) performance metrics.</p><p><br></p><p>The system ensures both <strong>ad creation</strong> and <strong>campaign management</strong> are seamless, offering a complete solution for advertising needs, from <strong>ad uploading</strong> to <strong>performance monitoring</strong>.</p>', 'project/1745817233_Screenshot from 2025-04-28 11-05-38.png', 'https://ads.appsinception.com/', 'https://github.com/AppsInception/ads-server', 1, '2025-04-28 05:13:53', '2025-04-28 06:27:28'),
(8, 'Project Management Tool Like Trello', 'project-management-tool-like-trello', '<p>This is a <strong>project management and task tracking platform</strong>, inspired by Trello but enhanced with advanced features. Built with <strong>Laravel</strong> for the backend and <strong>HTML/CSS</strong> for the frontend, the platform offers an intuitive and organized way to manage projects.</p><p>Key features:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Workspaces</strong>: Create and organise multiple workspaces.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Boards</strong>: Inside each workspace, users can create boards to manage different projects.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Tasks (Cards)</strong>: Boards contain lists, and lists contain cards (tasks).</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Task Management</strong>: On each card, users can:</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Add comments</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Assign members</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Set labels and due dates</li><li data-list=\"bullet\" class=\"ql-indent-1\"><span class=\"ql-ui\" contenteditable=\"false\"></span>Track activity history</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Drag and Drop</strong>: Smoothly drag cards from one list to another (e.g., moving a task from \"In Progress\" to \"Completed\").</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Activity Tracking</strong>: Monitor updates and actions performed on each card.</li></ol><p>The system delivers a <strong>user-friendly</strong>, <strong>real-time experience</strong> for individuals and teams to plan, collaborate, and track project progress.</p>', 'project/1745819795_Screenshot from 2025-04-28 11-41-21.png', NULL, 'https://github.com/shykat199/Project-Management', 1, '2025-04-28 05:56:35', '2025-04-28 05:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `position`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'project/1745778216_Screenshot from 2025-04-28 00-17-07.png', '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(2, 1, 2, 'project/1745778216_Screenshot from 2025-04-28 00-16-50.png', '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(3, 1, 3, 'project/1745778216_Screenshot from 2025-04-28 00-20-25.png', '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(4, 1, 4, 'project/1745778216_Screenshot from 2025-04-28 00-20-46.png', '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(5, 2, 1, 'project/1745778823_Screenshot from 2025-04-28 00-32-16.png', '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(6, 2, 2, 'project/1745778823_Screenshot from 2025-04-28 00-32-26.png', '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(7, 2, 3, 'project/1745778823_Screenshot from 2025-04-28 00-32-38.png', '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(8, 2, 4, 'project/1745778823_Screenshot from 2025-04-28 00-33-20.png', '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(9, 3, 1, 'project/1745780758_Screenshot from 2025-04-28 01-00-40.png', '2025-04-27 19:05:58', '2025-04-27 19:05:58'),
(10, 3, 2, 'project/1745780758_Screenshot from 2025-04-28 01-01-43.png', '2025-04-27 19:05:58', '2025-04-27 19:05:58'),
(11, 3, 3, 'project/1745780758_Screenshot from 2025-04-28 01-02-32.png', '2025-04-27 19:05:58', '2025-04-27 19:05:58'),
(12, 3, 4, 'project/1745780758_Screenshot.png', '2025-04-27 19:05:58', '2025-04-27 19:05:58'),
(13, 5, 1, 'project/1745816140_Screenshot from 2025-04-28 10-51-33.png', '2025-04-28 04:55:40', '2025-04-28 04:55:40'),
(14, 5, 2, 'project/1745816140_Screenshot from 2025-04-28 10-51-59.png', '2025-04-28 04:55:40', '2025-04-28 04:55:40'),
(15, 5, 3, 'project/1745816140_Screenshot from 2025-04-28 10-52-13.png', '2025-04-28 04:55:40', '2025-04-28 04:55:40'),
(16, 5, 4, 'project/1745816140_Screenshot from 2025-04-28 10-52-24.png', '2025-04-28 04:55:40', '2025-04-28 04:55:40'),
(17, 6, 1, 'project/1745816554_Screenshot from 2025-04-28 11-01-29.png', '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(18, 6, 2, 'project/1745816554_Screenshot from 2025-04-28 11-01-29.png', '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(19, 7, 1, 'project/1745817233_Screenshot from 2025-04-28 11-04-39.png', '2025-04-28 05:13:53', '2025-04-28 05:13:53'),
(20, 7, 2, 'project/1745817233_Screenshot from 2025-04-28 11-05-19.png', '2025-04-28 05:13:53', '2025-04-28 05:13:53'),
(21, 7, 3, 'project/1745817233_Screenshot from 2025-04-28 11-05-38.png', '2025-04-28 05:13:53', '2025-04-28 05:13:53'),
(22, 7, 4, 'project/1745817233_Screenshot from 2025-04-28 11-06-06.png', '2025-04-28 05:13:53', '2025-04-28 05:13:53'),
(23, 8, 1, 'project/1745819795_Screenshot from 2025-04-28 11-41-06.png', '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(24, 8, 2, 'project/1745819795_Screenshot from 2025-04-28 11-41-21.png', '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(25, 8, 3, 'project/1745819795_Screenshot from 2025-04-28 11-44-43.png', '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(26, 8, 4, 'project/1745819795_Screenshot from 2025-04-28 11-45-56.png', '2025-04-28 05:56:35', '2025-04-28 05:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `project_technologies`
--

CREATE TABLE `project_technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_technologies`
--

INSERT INTO `project_technologies` (`id`, `project_id`, `skill_id`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(2, 1, 2, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(3, 1, 3, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(4, 1, 4, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(5, 1, 5, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(6, 1, 10, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(7, 1, 11, NULL, '2025-04-27 18:23:36', '2025-04-27 18:23:36'),
(8, 2, 1, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(9, 2, 2, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(10, 2, 3, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(11, 2, 4, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(12, 2, 5, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(13, 2, 8, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(14, 2, 10, NULL, '2025-04-27 18:33:43', '2025-04-27 18:33:43'),
(20, 4, 2, NULL, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(21, 4, 3, NULL, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(22, 4, 4, NULL, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(23, 4, 5, NULL, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(24, 4, 7, NULL, '2025-04-27 19:12:59', '2025-04-27 19:12:59'),
(30, 5, 2, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(31, 5, 3, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(32, 5, 4, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(33, 5, 5, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(34, 5, 7, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(35, 5, 13, NULL, '2025-04-28 04:55:55', '2025-04-28 04:55:55'),
(36, 3, 1, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(37, 3, 2, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(38, 3, 5, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(39, 3, 7, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(40, 3, 11, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(41, 3, 13, NULL, '2025-04-28 04:56:13', '2025-04-28 04:56:13'),
(42, 6, 2, NULL, '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(43, 6, 7, NULL, '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(44, 6, 10, NULL, '2025-04-28 05:02:34', '2025-04-28 05:02:34'),
(52, 8, 2, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(53, 8, 3, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(54, 8, 4, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(55, 8, 5, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(56, 8, 7, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(57, 8, 11, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(58, 8, 14, NULL, '2025-04-28 05:56:35', '2025-04-28 05:56:35'),
(66, 7, 2, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(67, 7, 3, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(68, 7, 4, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(69, 7, 5, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(70, 7, 7, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(71, 7, 8, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28'),
(72, 7, 11, NULL, '2025-04-28 06:27:28', '2025-04-28 06:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'resume/1745763105_Shykat_resume.pdf.pdf', 1, '2025-04-27 14:11:45', '2025-04-27 14:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Shykat Roy', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(2, 'email', 'shykatroy.11815813@gmail.com', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(3, 'location', '70/2, Islamis College Road', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(4, 'country', 'Bangladesh', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(5, 'city', 'Khulna', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(6, 'age', '26', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(7, 'phone', '+88 01317120335', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(8, 'experience', '2', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(9, 'project_completed', '10', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(10, 'git', 'https://github.com/shykat199', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(11, 'linkedin', 'https://www.linkedin.com/in/shykay-roy/', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(12, 'whatsapp', '+88 01317120335', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(13, 'language', 'Bangla, English, Hindi', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(14, 'hobby', 'Cooking, Music, Travelling', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(15, 'about_me1', '<p>I\'m a Backend Developer who loves creating strong and simple solutions. I build features that perfectly fit the project’s needs.</p>', '2025-04-28 09:00:21', '2025-04-28 09:00:21'),
(16, 'about_me2', '<p><strong>Hi, I\'m Shykat Roy! 👨‍💻</strong></p><p>I\'m a seasoned <strong>Software Engineer</strong> and <strong>Web App Developer</strong>, with a sharp focus on the fascinating world of <strong>API Development 🔌</strong>. My expertise lies in <strong>Server-Side Programming 🖥️</strong>, <strong>JavaScript ⚡</strong>, <strong>Laravel 🌐</strong>, and <strong>PHP 🐘</strong>, where I\'ve crafted robust and scalable systems that drive dynamic web experiences. With a passion for performance and precision, I also specialise in <strong>Database Management 🗄️</strong>, fine-tuning <strong>Mysql Queries 💡</strong> for smooth and reliable backend operations. I love building systems that work fast, clean, and efficiently. 🚀</p>', '2025-04-28 09:00:21', '2025-04-29 19:28:52'),
(17, 'img', 'setting/1745830821_WhatsApp Image 2022-07-18 at 12.38.59 AM-fotor-bg-remover-2025042720842.png', '2025-04-28 09:00:21', '2025-04-28 09:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `logo`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'skill/1745765065_php-svgrepo-com.svg', 60, 1, '2025-04-27 14:44:25', '2025-04-27 14:45:44'),
(2, 'LARAVEL', 'skill/1745765085_laravel-svgrepo-com.svg', 70, 1, '2025-04-27 14:44:45', '2025-04-27 14:47:36'),
(3, 'HTML', 'skill/1745765125_html-5-svgrepo-com.svg', 70, 1, '2025-04-27 14:45:25', '2025-04-27 14:45:25'),
(4, 'CSS', 'skill/1745765206_css-3-svgrepo-com.svg', 60, 1, '2025-04-27 14:46:46', '2025-04-27 17:46:58'),
(5, 'JAVASCRIPT', 'skill/1745765231_javascript-svgrepo-com.svg', 55, 1, '2025-04-27 14:47:11', '2025-04-28 05:27:51'),
(6, 'CODEIGNITER', 'skill/1745775733_codeigniter-logo-svgrepo-com.svg', 40, 1, '2025-04-27 17:42:13', '2025-04-27 17:42:13'),
(7, 'MYSQL', 'skill/1745775774_mysql-logo-svgrepo-com.svg', 65, 1, '2025-04-27 17:42:54', '2025-04-27 17:42:54'),
(8, 'GIT', 'skill/1745775830_git-svgrepo-com.svg', 55, 1, '2025-04-27 17:43:50', '2025-04-27 17:43:50'),
(9, 'DSA', 'skill/1745775877_genetic-algorithm-svgrepo-com.svg', 50, 1, '2025-04-27 17:44:37', '2025-04-27 17:44:37'),
(10, 'API', 'skill/1745775922_api-svgrepo-com.svg', 60, 1, '2025-04-27 17:45:22', '2025-04-27 17:45:22'),
(11, 'BOOTSTRAP', 'skill/1745776042_bootstrap-fill-svgrepo-com.svg', 70, 1, '2025-04-27 17:47:22', '2025-04-28 04:55:24'),
(12, 'TRELLO', 'skill/1745776078_trello-svgrepo-com.svg', 65, 1, '2025-04-27 17:47:58', '2025-04-27 17:47:58'),
(13, 'LIVEWIRE', 'skill/1745816090_Livewire.svg', 55, 1, '2025-04-28 04:54:50', '2025-04-28 05:27:26'),
(14, 'JQUERY', 'skill/1745819588_jquery-svgrepo-com.svg', 60, 1, '2025-04-28 05:53:08', '2025-04-28 05:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shykat Roy', 'admin@gmail.com', '2025-04-27 09:57:17', '$2y$12$n6ursuYBrFxZ6RI6pgyoae/LyvoOmRQrTK3SSMuH6JCNBl6HeohkW', NULL, '2025-04-27 09:57:17', '2025-04-27 09:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `company_name` varchar(120) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `position`, `description`, `company_name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Backend Intern', '<p>Contributed to backend development by building and maintaining RESTful APIS and optimising database queries.Worked closely with senior developers to implement new features and troubleshoot issues.</p><p>Gained hands-on experience with PHP, Mysql, and Laravel frameworks in a professional environment. Participated in code reviews and collaborated in a team-driven Agile workflow.</p>', 'AppsInception', '2023-02-02 00:00:00', '2023-07-01 00:00:00', 1, '2025-04-27 17:52:54', '2025-04-27 17:52:54'),
(2, 'Jr.Backend Engineer', '<p>Design, develop, and maintain scalable backend solutions using PHP, Laravel, and Mysql. Collaborate with cross-functional teams to implement new features and improve system performance. Manage and optimise database queries to ensure fast and efficient data retrieval. Contribute to code quality through regular code reviews and test-driven development practices. Continuously improve system reliability and performance by identifying and resolving bottlenecks.</p>', 'AppsInception', '2023-08-01 00:00:00', '2025-03-01 00:00:00', 1, '2025-04-27 17:56:58', '2025-04-27 17:56:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_experiences`
--
ALTER TABLE `educational_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educational_experiences`
--
ALTER TABLE `educational_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_technologies`
--
ALTER TABLE `project_technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
