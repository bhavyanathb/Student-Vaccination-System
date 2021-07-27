-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 10:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacc_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `vadmin`
--

CREATE TABLE `vadmin` (
  `Va_id` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Mob_no` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Vacc_id` int(10) NOT NULL,
  `Pwd` longtext NOT NULL,
  `Isadmin` int(3) DEFAULT 0,
  PRIMARY KEY (`Va_id`),
  KEY `Vacc_id` (`Vacc_id`),
  CONSTRAINT `vadmin_ibfk_1` FOREIGN KEY (`Vacc_id`) REFERENCES `vaccines` (`Vacc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vadmin`
--

INSERT INTO `vadmin` (`Va_id`, `Fname`, `Lname`, `Mob_no`, `Email`, `Vacc_id`, `Pwd`, `Isadmin`) VALUES
('bhavya', 'bhavya', 'b', '9876543210', 'abcd@gmail.com', 2, '$2y$10$dlJoRqA0nqMD4v3zm10rIOnf1aH5kCswdzp6ZlarQeafDUdG/Si7q', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vadmin`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `vadmin`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
