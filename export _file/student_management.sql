-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 02:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`) VALUES
(8, 'Motin Reza', 158226, '8th', 'Sherpur', '01872585542', '158226.jpg', '2023-01-05 10:13:42'),
(9, 'Diponkor kumar', 158225, '5th', 'Dhaka', '01921272856', '158225.png', '2023-01-05 10:15:35'),
(10, 'Suvo shariar', 158224, '4th', 'Rongpur', '01921567890', '158224.jpg', '2023-01-05 10:20:51'),
(11, 'Nousin nasrin', 158223, '3rd', 'Nuakhalid', '01845789023', '158223.jpg', '2023-01-05 10:22:18'),
(12, 'Sumaiya sathi', 158222, '2nd', 'Sylet', '01921274589', '158222.jpeg', '2023-01-05 10:23:58'),
(13, 'Amir khan', 158221, '1st', 'Kurigram', '01687345678', '158221.png', '2023-01-05 10:25:03'),
(14, 'Soniya saira', 158227, '7th', 'Mymensingh', '01921245623', '158227.jpg', '2023-01-05 10:28:25'),
(15, 'Nargis nabila', 158228, '6th', 'Pubna', '01874567123', '158228.jpg', '2023-01-05 10:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(11, 'Motin Reza', 'motinreza2000@gmail.com', 'motinreza', 'motinreza2022!', 'motinreza.jpg', 'active', '2022-05-16 14:10:09'),
(16, 'Kawsar Ahmed', 'kawsar@gamil.com', 'Kawsar Ahmed', 'kawsar2022!', 'Kawsar Ahmed.png', 'Inactive', '2023-01-05 10:02:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
