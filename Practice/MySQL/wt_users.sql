-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 06:26 PM
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
-- Database: `wt_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Fathers_Name` varchar(30) NOT NULL,
  `Mothers_Name` varchar(30) NOT NULL,
  `Blood_Group` varchar(10) NOT NULL,
  `Religion` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Website` varchar(50) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Registration_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First_Name`, `Last_Name`, `Gender`, `Fathers_Name`, `Mothers_Name`, `Blood_Group`, `Religion`, `Email`, `Phone`, `Website`, `Address`, `Username`, `Password`, `Registration_Date`) VALUES
(1, 'Mirza Saikat', 'Ahmmed', 'Male', 'Mirza Kamal Pasa', 'Mst. Sima Akter', 'A+', 'Islam', 'contact@saikat.com.bd', '01571195489', 'http://www.saikat.com.bd', 'Kuratoli, Dhaka-1229, Bangladesh', 'saikat', '123456', '2024-07-02 15:38:32'),
(2, 'FName', 'LName', 'Male', 'FaName', 'MoName', 'A+', 'Islam', 'email@gmail.com', '01571195489', 'https://saikat.com.bd/', 'Kuratoli, Dhaka-1229, Bangladesh', 'aiub', 'saikat', '2024-07-02 16:03:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
