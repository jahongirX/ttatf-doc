-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 31, 2025 at 06:45 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttaf-docs`
--

-- --------------------------------------------------------

--
-- Table structure for table `attach`
--

CREATE TABLE `attach` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guid` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `size` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_template`
--

CREATE TABLE `document_template` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `allowed_roles` json NOT NULL,
  `body` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_template`
--

INSERT INTO `document_template` (`id`, `name`, `allowed_roles`, `body`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Nikoh to\'y sababli qayta topshirish', '\"2\"', '<p style=\"text-align:center\"><img alt=\"logo\" height=\"136\" src=\"/kcfinder/upload/images/logo.png\" width=\"136\" /></p>\r\n\r\n<h2 style=\"text-align:center\"><strong><span style=\"font-family:Times New Roman,Times,serif\">REGISTRATOR OFISI</span></strong></h2>\r\n\r\n<h2 style=\"text-align:center\"><strong><span style=\"font-family:Times New Roman,Times,serif\">FARMOYISHI</span></strong></h2>\r\n\r\n<h3 style=\"text-align:center\"><strong><span style=\"font-family:Times New Roman,Times,serif\">2024-2025&nbsp;o&lsquo;quv&nbsp;yili</span></strong></h3>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">{{static.university}} {{student.faculty.name}}&nbsp;fakulteti {{student.speciality.name}}&nbsp;{{student.level.name}}&nbsp;{{student.group.name}}&nbsp;guruh&nbsp;talabasi&nbsp;{{student.full_name}} ga&nbsp;nikoh&nbsp;to&lsquo;yi&nbsp;sababli&nbsp;10.05.2025&nbsp;dan&nbsp;14.05.2025 muddatidagi&nbsp;qoldirilgan&nbsp;va&nbsp;o&lsquo;zlashtirmagan&nbsp;mashg&lsquo;ulotlarini&nbsp;qayta&nbsp;topshirishga ruxsat&nbsp;berilsin.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Qayta&nbsp;o&lsquo;zlashtirish&nbsp;muddati&nbsp;17.05.2025 dan 23.05.2025&nbsp;gacha.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">&nbsp; &nbsp; &nbsp; &nbsp;<strong>Eslatma:</strong>&nbsp;Talabaga&nbsp;bir&nbsp;kunda&nbsp;bitta&nbsp;joriy&nbsp;nazoratni&nbsp;qayta&nbsp;topshirishga&nbsp;ruxsatetiladi.&nbsp;Belgilangan&nbsp;kundan&nbsp;keyin&nbsp;ushbu&nbsp;farmoyish&nbsp;haqiqiy&nbsp;emas.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">&nbsp; &nbsp; &nbsp; <strong>&nbsp;Asos:</strong>&nbsp;Talabaning&nbsp;nikoh&nbsp;tuzilganligi&nbsp;haqida&nbsp;guvohnomasi&nbsp;N&nbsp;№&nbsp;06170001&nbsp;sonliva&nbsp;talabaning&nbsp;tushuntirish&nbsp;xati.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Registrator&nbsp;ofisi boshlig&lsquo;i: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;A.Sharipov</span></p>\r\n', 1, '2025-05-30 16:48:37', '2025-05-30 17:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `identity` varchar(96) NOT NULL,
  `lastdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('f38cab813b28333ab51cf67c5f558d08', 1748699036);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `hemis_staff_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `hemis_staff_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, '3682012031', 'jahongir', 'X2lp9jtwWPbhrhtzH0vCsgIeih0JTFbt', '$2y$13$V1NL/Zz8fZDlQIzzohjEhOH0Hb53cywaW7BW3bbftLmmYpbKhECi.', NULL, 'xjoha@mail.ru', 10, 1748676076, 1748699009, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_variables`
--

CREATE TABLE `static_variables` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `static_variables`
--

INSERT INTO `static_variables` (`id`, `name`, `value`) VALUES
(1, 'universitet', 'Toshken tibbiyot akademiyasi Termiz filiali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, 'admin', 'dArVMsVrEo-9LPrwI4RtJc_I0eAnIIu9', '$2y$13$SQdWJIpWiv7JX3LDn2Aq4OQJEc2qZg5/UFq0RmnQbV8Lf5XIEErD6', NULL, '', 10, 1481295772, 1718074261, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attach`
--
ALTER TABLE `attach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_template`
--
ALTER TABLE `document_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Indexes for table `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `static_variables`
--
ALTER TABLE `static_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attach`
--
ALTER TABLE `attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_template`
--
ALTER TABLE `document_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `static_variables`
--
ALTER TABLE `static_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
