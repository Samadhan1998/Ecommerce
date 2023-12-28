-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 10:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attireavenue`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(6, 'Diwakar Giri', 'diwakargiri23@gmail.com', 'Hello i am Diwakaer'),
(7, 'Rahul kumar', 'rahul123@gmai.com', 'Hello , i am Rahul '),
(8, 'Abhishek', 'abhiraj123@gmail.com', 'Hello, i am Abhijeet kumar');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `email`, `password`, `phone`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$iwittQ.5WcEl7E7wddX1se.SdTPHONUVCN3ILTMe4G47M8M8odtL6', 2147483647, 'male'),
(2, 'admin', 'admin@gmail.com', '$2y$10$PwwQanIMaL8GEzSV8LMvzO2RTgfKTodXKMRFMLaeZHj5HDbK5Lv2O', 2147483647, 'male'),
(3, 'rahul', 'rahul123@gmai.com', '$2y$10$jT1i1f5J1hht3IeyykmVOemktXqYlyRXsMDIdBdGAT8GbK7k1fBR6', 1234567890, 'male'),
(4, 'ankit', 'ankit@gmail.com', '$2y$10$0VnjLcadTSvBa8KjvKJ8cOV3PiNftat0ZaDtH0oxtTEHTybYkMg9i', 1234567890, 'male'),
(5, 'Amit kumar', 'amitkumar@gmail.com', '$2y$10$nX62RdjegMF2rANHTFsZBOQNjQIczpmhkckLireaP9PNEuj0CJSaS', 1234567890, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
