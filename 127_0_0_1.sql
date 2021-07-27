-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 09:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoption`
--
CREATE DATABASE IF NOT EXISTS `adoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `adoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animalid` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `animal_type` varchar(50) NOT NULL,
  `adoption_fee` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `desexed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animalid`, `name`, `animal_type`, `adoption_fee`, `sex`, `desexed`) VALUES
(1, 'Storm', 'Dog', 350, 'Male', 0),
(2, 'Diva', 'Dog', 150, 'Female', 1),
(3, 'Juda', 'Cat', 200, 'Male', 1),
(4, 'Cleo', 'Cat', 100, 'Female', 1),
(5, 'Jack', 'Bird', 200, 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authorized_users`
--

CREATE TABLE `authorized_users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorized_users`
--

INSERT INTO `authorized_users` (`username`, `password`) VALUES
('sam', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animalid`);

--
-- Indexes for table `authorized_users`
--
ALTER TABLE `authorized_users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animalid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
