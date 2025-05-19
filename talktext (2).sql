-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 08:53 PM
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
-- Database: `talktext`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_phone` varchar(15) DEFAULT NULL,
  `receiver_phone` varchar(15) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_phone`, `receiver_phone`, `message`, `timestamp`) VALUES
(1, '0766228510', '0712131415', 'oi', '2025-05-11 10:08:48'),
(2, '0712131415', '0766228510', 'hellow', '2025-05-11 10:09:42'),
(3, '0766228510', '0712131415', 'oi', '2025-05-11 14:34:25'),
(4, '0766228510', '0712131415', 'oi', '2025-05-11 14:34:26'),
(5, '0766228510', '0712131415', 'oi', '2025-05-11 16:49:24'),
(6, '0789101112', '0712131415', 'oi', '2025-05-12 06:05:06'),
(7, '0789101112', '0766228510', 'hey are you good', '2025-05-12 07:34:57'),
(8, '0789101112', '0766228510', 'hey', '2025-05-12 07:35:17'),
(9, '0789101112', '0766228510', 'hey it\'s Gabby', '2025-05-12 07:35:33'),
(10, '0789101112', '0712131415', 'its Gabby', '2025-05-12 07:49:51'),
(11, '0789101112', '0712131415', 'hello Diana are you good I\'m here I\'m waiting for you where are you', '2025-05-12 09:15:26'),
(12, '0712131415', '0789101112', 'hellow gabby are you there', '2025-05-12 09:35:08'),
(13, '0712131415', '0789101112', 'hi I\'m testing live chat', '2025-05-12 09:50:39'),
(14, '0789101112', '0712131415', 'im testing  texts layout again', '2025-05-12 10:08:09'),
(15, '0712131415', '0789101112', 'you are good to go it\'s well', '2025-05-12 10:09:06'),
(16, '0789101112', '0712131415', 'let\'s see how it\'s working', '2025-05-12 10:10:17'),
(17, '0712131415', '0789101112', 'seems like you did it', '2025-05-12 10:10:42'),
(18, '0789101112', '0712131415', 'are you still there', '2025-05-12 11:23:44'),
(19, '0766228510', '0712131415', 'Mambo vp', '2025-05-12 14:14:10'),
(20, '0766228510', '0712131415', 'upo wapi', '2025-05-13 03:42:01'),
(21, '0766228510', '0677777777', 'mambo vipi', '2025-05-13 13:04:05'),
(22, '0766228510', '0789101112', 'mambo', '2025-05-13 15:57:55'),
(23, '0766228510', '0677777777', 'nielekeze', '2025-05-14 03:53:11'),
(24, '0766228510', '0677777777', 'njoo kesho', '2025-05-14 04:12:28'),
(25, '0766228510', '0712131415', 'sasa hivi ni asubuhi', '2025-05-14 04:14:22'),
(26, '0789101112', '0766228510', 'njoo sasa hivi', '2025-05-14 04:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture_url` varchar(255) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `profile_picture_url`, `created_at`) VALUES
(1, 'Japhsam Simulator', 'japhsamsimulator11@gmail.com', '0766228510', '$2y$10$8NPpuX8Ro4wgzu2gf2JWle2XeXfNkCZftUgrXEgUVxP/H6cBpO7kW', '', '2025-05-11 09:00:53'),
(2, 'Raymond Mbaga', 'raymondmbaga@yahoo.com', '', '$2y$10$1w4iBWTW/Wi/VSPhx7cfkeHmJBjHNfwIFpup6CHnla0AD2BL5iPde', '', '2025-05-11 09:17:31'),
(12, 'Diana Amon', 'dianaamon@yahoo.com', '0712131415', '$2y$10$EH/apqAfrW4zAr8axSME1u6WSeSVBEbiYwwit00DznF3xQXJnrC5G', '', '2025-05-11 09:54:59'),
(13, 'Gabriel Mabamba', 'gabby@yahoo.com', '0789101112', '$2y$10$hIdnMelkgV8rTRLySU9nlurAM2mCVs2GKL2uVJ3H5jQlAHBr5zN0a', '', '2025-05-12 05:17:30'),
(14, 'Pius Elias', 'piuselias@yahoo.com', '0677777777', '$2y$10$RnrLbIsR8zxU.9mkoDbwCu7lbKboc0v5S3dgNgcF5oOdtil1iAQ0u', '', '2025-05-12 09:30:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
