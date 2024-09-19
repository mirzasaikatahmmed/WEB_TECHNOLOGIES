-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 03:18 PM
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
-- Database: `image_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileID` int(11) NOT NULL,
  `image_file_name` varchar(255) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileID`, `image_file_name`, `userID`) VALUES
(21, 'Mirza_Saikat_Ahmmed[22-47472-2][1].jpg', 1),
(22, 'Mirza_Saikat_Ahmmed[22-47472-2][2].jpg', 1),
(23, 'Mirza_Saikat_Ahmmed[22-47472-2][3].jpg', 1),
(24, 'Mirza_Saikat_Ahmmed[22-47472-2][4].jpg', 1),
(25, 'Mirza_Saikat_Ahmmed[22-47472-2][5].jpg', 1),
(26, 'Mirza_Saikat_Ahmmed[22-47472-2][6].jpg', 1),
(27, 'Mirza_Saikat_Ahmmed[22-47472-2][7].jpg', 1),
(28, 'Mirza_Saikat_Ahmmed[22-47472-2][8].jpg', 1),
(29, 'Mirza_Saikat_Ahmmed[22-47472-2][9].jpg', 1),
(30, 'Mirza_Saikat_Ahmmed[22-47472-2][10].jpg', 1),
(31, 'Mirza_Saikat_Ahmmed[22-47472-2][11].jpg', 1),
(32, 'Mirza_Saikat_Ahmmed[22-47472-2][12].jpg', 1),
(33, 'Mirza_Saikat_Ahmmed[22-47472-2][13].jpg', 1),
(34, 'Mirza_Saikat_Ahmmed[22-47472-2][14].jpg', 1),
(35, 'Mirza_Saikat_Ahmmed[22-47472-2][15].jpg', 1),
(36, 'Mirza_Saikat_Ahmmed[22-47472-2][16].jpg', 1),
(37, 'Mirza_Saikat_Ahmmed[22-47472-2][17].jpg', 1),
(38, 'Mirza_Saikat_Ahmmed[22-47472-2][18].jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 2 CHECK (`status` in (1,2)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `student_id`, `gender`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mirza Saikat Ahmmed', '22-47472-2', 'male', 'mirzasaikatahmmed@gmail.com', '123456', 2, '2024-09-10 16:11:17', '2024-09-17 05:08:50'),
(2, 'Mr. X', '22-00000-2', 'male', 'mrx@gmail.com', '123456', 2, '2024-09-11 16:57:45', '2024-09-11 16:57:45'),
(3, 'Mr. Y', '22-00000-3', 'male', 'mry@gmail.com', '123456', 2, '2024-09-12 05:06:28', '2024-09-12 05:06:28'),
(4, 'Mr A', '22-47474-2', 'female', 'mra@mail.com', '123456', 2, '2024-09-17 03:12:59', '2024-09-17 03:12:59'),
(8, 'Mirza', '22-47472-3', 'male', 'contact@saikat.com.bd', '123456', 2, '2024-09-19 13:18:17', '2024-09-19 13:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `FK_UserFiles` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_UserFiles` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
