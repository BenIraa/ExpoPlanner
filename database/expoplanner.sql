-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 06:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expoplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `attendee_id` int(11) NOT NULL,
  `exhibitor_id` int(11) DEFAULT NULL,
  `attendee_fname` varchar(255) DEFAULT NULL,
  `attendee_lname` varchar(255) DEFAULT NULL,
  `attendee_fnamephone` int(255) DEFAULT NULL,
  `attendee_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registration_type` varchar(50) DEFAULT NULL,
  `preferences` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `booth_id` int(11) NOT NULL,
  `exhibitor_id` int(11) DEFAULT NULL,
  `booth_location` varchar(255) DEFAULT NULL,
  `booth_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventagenda`
--

CREATE TABLE `eventagenda` (
  `session_id` int(11) NOT NULL,
  `session_name` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventanalytics`
--

CREATE TABLE `eventanalytics` (
  `analytics_id` int(11) NOT NULL,
  `event_metrics` text DEFAULT NULL,
  `booth_traffic` int(11) DEFAULT NULL,
  `session_popularity` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventapp`
--

CREATE TABLE `eventapp` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customizations` text DEFAULT NULL,
  `push_notifications` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitorprofiles`
--

CREATE TABLE `exhibitorprofiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `industry_type` varchar(100) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `profile_description` text DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `social_media_links` text DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `booth_preferences` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exhibitorprofiles`
--

INSERT INTO `exhibitorprofiles` (`profile_id`, `user_id`, `company_name`, `industry_type`, `contact_person_name`, `contact_email`, `contact_phone`, `profile_description`, `website_url`, `social_media_links`, `logo_url`, `booth_preferences`, `additional_info`, `created_at`, `updated_at`) VALUES
(1, 4, 'inyange industry', 'Soft Drinks', '0781019415', 'beniraa50@gmail.com', '0781019415', 'milk, fanta, juice', 'www.inyange.com', 'inyange', 'qwertyuio', 'qwwee', 'qwert', '2024-01-26 16:59:32', '2024-01-26 16:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `exhibitor_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `booth_number` int(11) DEFAULT NULL,
  `contact_information` varchar(255) DEFAULT NULL,
  `booth_customization_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitor_data`
--

CREATE TABLE `exhibitor_data` (
  `id` int(11) NOT NULL,
  `exhibitor_id` int(11) DEFAULT NULL,
  `profile_description` text DEFAULT NULL,
  `exhibitor_address` text DEFAULT NULL,
  `booth_assignment` varchar(50) DEFAULT NULL,
  `floor_plan_location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leadretrieval`
--

CREATE TABLE `leadretrieval` (
  `lead_id` int(11) NOT NULL,
  `exhibitor_id` int(11) DEFAULT NULL,
  `attendee_id` int(11) DEFAULT NULL,
  `scan_timestamp` datetime DEFAULT NULL,
  `appointment_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `networking`
--

CREATE TABLE `networking` (
  `connection_id` int(11) NOT NULL,
  `exhibitor_id_1` int(11) DEFAULT NULL,
  `exhibitor_id_2` int(11) DEFAULT NULL,
  `matchmaking_score` float DEFAULT NULL,
  `messages` text DEFAULT NULL,
  `contact_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `sponsorship_id` int(11) NOT NULL,
  `sponsor_name` varchar(255) DEFAULT NULL,
  `logo_placement` varchar(255) DEFAULT NULL,
  `sponsored_sessions` text DEFAULT NULL,
  `branded_materials` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `feedback_details` text DEFAULT NULL,
  `response_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `role`) VALUES
(3, 'admin', '$2y$10$lGKkpXDvDFWXA73Z1m68seo1DH7DUr7YQYhXaS9wVSN4mxvVGaTce', 'super_admin'),
(4, 'ex', '$2y$10$k0zN2iRiZilPLkNomB4GXux0gFTgApFjNWmLiegvi0RHpd/uAtqhC', 'exhibitor'),
(5, 'BenIraa', '$2y$10$nrsGIYiifwvtKyC2tL6df.EtX0RC.Z0UQMlsLfJKqa.ws0A/SIPWy', 'exhibitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`attendee_id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`);

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`booth_id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`);

--
-- Indexes for table `eventagenda`
--
ALTER TABLE `eventagenda`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `eventanalytics`
--
ALTER TABLE `eventanalytics`
  ADD PRIMARY KEY (`analytics_id`);

--
-- Indexes for table `eventapp`
--
ALTER TABLE `eventapp`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `exhibitorprofiles`
--
ALTER TABLE `exhibitorprofiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`exhibitor_id`);

--
-- Indexes for table `exhibitor_data`
--
ALTER TABLE `exhibitor_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`);

--
-- Indexes for table `leadretrieval`
--
ALTER TABLE `leadretrieval`
  ADD PRIMARY KEY (`lead_id`),
  ADD KEY `exhibitor_id` (`exhibitor_id`),
  ADD KEY `attendee_id` (`attendee_id`);

--
-- Indexes for table `networking`
--
ALTER TABLE `networking`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `exhibitor_id_1` (`exhibitor_id_1`),
  ADD KEY `exhibitor_id_2` (`exhibitor_id_2`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`sponsorship_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibitorprofiles`
--
ALTER TABLE `exhibitorprofiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exhibitor_data`
--
ALTER TABLE `exhibitor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `attendee_ibfk_1` FOREIGN KEY (`exhibitor_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `booths`
--
ALTER TABLE `booths`
  ADD CONSTRAINT `booths_ibfk_1` FOREIGN KEY (`exhibitor_id`) REFERENCES `exhibitors` (`exhibitor_id`);

--
-- Constraints for table `eventapp`
--
ALTER TABLE `eventapp`
  ADD CONSTRAINT `eventapp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `attendees` (`attendee_id`);

--
-- Constraints for table `exhibitorprofiles`
--
ALTER TABLE `exhibitorprofiles`
  ADD CONSTRAINT `exhibitorprofiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `exhibitor_data`
--
ALTER TABLE `exhibitor_data`
  ADD CONSTRAINT `exhibitor_data_ibfk_1` FOREIGN KEY (`exhibitor_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `leadretrieval`
--
ALTER TABLE `leadretrieval`
  ADD CONSTRAINT `leadretrieval_ibfk_1` FOREIGN KEY (`exhibitor_id`) REFERENCES `exhibitors` (`exhibitor_id`),
  ADD CONSTRAINT `leadretrieval_ibfk_2` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`attendee_id`);

--
-- Constraints for table `networking`
--
ALTER TABLE `networking`
  ADD CONSTRAINT `networking_ibfk_1` FOREIGN KEY (`exhibitor_id_1`) REFERENCES `exhibitors` (`exhibitor_id`),
  ADD CONSTRAINT `networking_ibfk_2` FOREIGN KEY (`exhibitor_id_2`) REFERENCES `exhibitors` (`exhibitor_id`);

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `attendees` (`attendee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
