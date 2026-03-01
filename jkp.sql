-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2026 at 02:26 PM
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
-- Database: `jkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password_hash`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@jkp.local', '$2y$10$feYo06GTWykRdjSXC7Tx0ufmWpKpXN3u3W73.eGx4nyqOTa.apoTm', '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(500) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(500) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `content`, `featured_image`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jansunwai', 'jansunwai', '<p><strong>Jan sunwai&nbsp;</strong></p>', NULL, '', '', '', 'published', '2026-02-28 12:56:28', '2026-02-28 12:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footprint_settings`
--

CREATE TABLE `footprint_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'OUR FOOTPRINTS',
  `subtitle` varchar(255) NOT NULL DEFAULT 'KJP-led Alliance governs 21 states',
  `states_governed` int(11) NOT NULL DEFAULT 21,
  `lok_sabha` varchar(50) NOT NULL DEFAULT '240/543',
  `rajya_sabha` varchar(50) NOT NULL DEFAULT '99/245',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footprint_settings`
--

INSERT INTO `footprint_settings` (`id`, `title`, `subtitle`, `states_governed`, `lok_sabha`, `rajya_sabha`, `created_at`, `updated_at`) VALUES
(1, 'OUR FOOTPRINTS', 'KJP-led Alliance governs 21 states', 21, '240/543', '99/245', '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `subheadline` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `layout` varchar(20) NOT NULL DEFAULT 'right',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `headline`, `subheadline`, `image`, `layout`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Empowering Farmers. Strengthening India.', 'Join the agricultural revolution.', 'assets/img/leader.png', 'right', 1, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(2, 'Growth for Every Village.', 'Building a stronger, self-reliant rural India.', 'assets/img/leader1.png', 'left', 2, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `inspiration_slides`
--

CREATE TABLE `inspiration_slides` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL DEFAULT 'OUR INSPIRATION',
  `name` varchar(160) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(60) NOT NULL DEFAULT 'Read More',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspiration_slides`
--

INSERT INTO `inspiration_slides` (`id`, `title`, `name`, `description`, `image`, `button_text`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'OUR INSPIRATION', 'Dr. Syama Prasad Mookerjee', 'Founder of Bharatiya Jana Sangh', 'assets/img/Netajee.jpg', 'Read More', 1, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(2, 'OUR INSPIRATION', 'Shri Atal Bihari Vajpayee', 'Former Prime Minister of India', 'assets/img/Netajee.jpg', 'Read More', 2, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `map_locations`
--

CREATE TABLE `map_locations` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(160) NOT NULL,
  `state` varchar(120) NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `lng` decimal(10,7) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `map_locations`
--

INSERT INTO `map_locations` (`id`, `name`, `state`, `lat`, `lng`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Lucknow', 'UTTAR PRADESH', 27.1384050, 80.8593193, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(2, 'PATANA', 'BIHAR', 25.9039681, 85.8103119, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(3, 'JAIPUR', 'RAJASTHAN', 26.6297693, 73.8782402, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(4, 'BHOPAL', 'MADHYA PRADESH', 23.9694859, 78.4200043, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(5, 'MUMBAI', 'MAHARASHTRA', 18.8199672, 76.7764826, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(6, 'India Gate', 'DELHI', 28.6129000, 77.2295000, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(7, 'Gateway of India', 'MAHARASHTRA', 18.9220000, 72.8347000, 1, '2026-02-28 12:06:53', '2026-02-28 12:06:53'),
(8, 'Kolkata', 'West Bangal', 22.4719545, 88.3734866, 1, '2026-02-28 12:14:32', '2026-02-28 12:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-02-28-000001', 'App\\Database\\Migrations\\CreateCmsTables', 'default', 'App', 1772279301, 1),
(2, '2026-02-28-000002', 'App\\Database\\Migrations\\CreateMapLocations', 'default', 'App', 1772280373, 2),
(3, '2026-02-28-000003', 'App\\Database\\Migrations\\CreateCmsPages', 'default', 'App', 1772283041, 3),
(4, '2026-02-28-000004', 'App\\Database\\Migrations\\CreateSiteSettings', 'default', 'App', 1772283883, 4),
(5, '2026-02-28-000005', 'App\\Database\\Migrations\\CreateContactSubmissions', 'default', 'App', 1772283883, 4);

-- --------------------------------------------------------

--
-- Table structure for table `navigation_items`
--

CREATE TABLE `navigation_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(120) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation_items`
--

INSERT INTO `navigation_items` (`id`, `label`, `url`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Home', '#home', 1, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(2, 'About', '#', 2, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(3, 'Members', '#members', 3, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(4, 'Gallery', '#footprints', 4, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(5, 'Contact', '#', 5, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `party_presidents`
--

CREATE TABLE `party_presidents` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(160) NOT NULL,
  `tenure` varchar(160) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_presidents`
--

INSERT INTO `party_presidents` (`id`, `name`, `tenure`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Shri Atal Bihari Vajpayee', '1980 - 1986', 'assets/img/Netajee.jpg', 1, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(2, 'Shri Lal Krishna Advani', '1986 - 1990 | 1993 - 1998', 'assets/img/Shyam-Sundar-dass.jpg', 2, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(3, 'Dr. Murli Manohar Joshi', '1991 - 1993', 'assets/img/Shivdayal.jpg', 3, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `press_gallery_items`
--

CREATE TABLE `press_gallery_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(160) NOT NULL,
  `subtitle` varchar(160) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `box_type` varchar(20) NOT NULL DEFAULT 'medium',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `press_gallery_items`
--

INSERT INTO `press_gallery_items` (`id`, `title`, `subtitle`, `image`, `box_type`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Agriculture Reform', 'Policy Initiatives', 'assets/img/agriculture reform.jpg', 'large', 1, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(2, 'Campaign Drive', 'Grassroots Outreach', 'assets/img/Farmers Meet.jpg', 'tall', 2, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21'),
(3, 'Rural Development', 'Community Programs', 'assets/img/Rural Development.jpg', 'medium', 3, 1, '2026-02-28 11:48:21', '2026-02-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `setting_group` varchar(60) NOT NULL DEFAULT 'general',
  `setting_key` varchar(120) NOT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_group`, `setting_key`, `setting_value`) VALUES
(1, 'general', 'site_name', 'Janhit Kisan Party'),
(2, 'general', 'site_tagline', 'Awaz Kisan Ki – Voice of the Farmers'),
(3, 'general', 'site_meta_desc', 'Official website of Janhit Kisan Party – dedicated to the welfare of farmers and rural India.'),
(4, 'general', 'ticker_text', 'Breaking: Farmer Welfare Bill Passed • National Agriculture Summit 2026 • Membership Drive Open Now'),
(5, 'general', 'left_sidebar_html', ''),
(6, 'general', 'right_sidebar_html', ''),
(7, 'contact', 'address_line1', 'JKP National Headquarters,'),
(8, 'contact', 'address_line2', '5 Raisina Road, New Delhi – 110001'),
(9, 'contact', 'phone1', '+91 11 2345 6789'),
(10, 'contact', 'phone2', '+91 98765 43210'),
(11, 'contact', 'email1', 'info@jkp.org.in'),
(12, 'contact', 'email2', 'support@jkp.org.in'),
(13, 'contact', 'whatsapp_number', '+919876543210'),
(14, 'contact', 'whatsapp_label', 'WhatsApp Helpline'),
(15, 'contact', 'working_hours', 'Mon – Sat: 9:00 AM – 6:00 PM'),
(16, 'contact', 'map_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.6624993085285!2d77.19867!3d28.6249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd378cf0f8af%3A0x45ae94dbc0ec4954!2sRaisina%20Hill%2C%20New%20Delhi!5e0!3m2!1sen!2sin!4v1700000000000'),
(17, 'social', 'facebook_url', 'https://facebook.com/JanhitKisanParty'),
(18, 'social', 'facebook_handle', '/JanhitKisanParty'),
(19, 'social', 'twitter_url', 'https://twitter.com/JKP_Official'),
(20, 'social', 'twitter_handle', '@JKP_Official'),
(21, 'social', 'instagram_url', 'https://instagram.com/kjp_india'),
(22, 'social', 'instagram_handle', '@kjp_india'),
(23, 'social', 'youtube_url', 'https://youtube.com/@JanhitKisanParty'),
(24, 'social', 'youtube_handle', 'Janhit Kisan Party'),
(25, 'social', 'whatsapp_group_url', 'https://chat.whatsapp.com/'),
(26, 'social', 'share_facebook', '1'),
(27, 'social', 'share_twitter', '1'),
(28, 'social', 'share_whatsapp', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footprint_settings`
--
ALTER TABLE `footprint_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspiration_slides`
--
ALTER TABLE `inspiration_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_locations`
--
ALTER TABLE `map_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_items`
--
ALTER TABLE `navigation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_presidents`
--
ALTER TABLE `party_presidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_gallery_items`
--
ALTER TABLE `press_gallery_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footprint_settings`
--
ALTER TABLE `footprint_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspiration_slides`
--
ALTER TABLE `inspiration_slides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `map_locations`
--
ALTER TABLE `map_locations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navigation_items`
--
ALTER TABLE `navigation_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `party_presidents`
--
ALTER TABLE `party_presidents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `press_gallery_items`
--
ALTER TABLE `press_gallery_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
