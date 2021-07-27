-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 10:04 AM
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
-- Table structure for table `stddoses`
--

CREATE TABLE `stddoses` (
  `Dose_id` int(10) NOT NULL,
  `Std_id` varchar(255) DEFAULT NULL,
  `Date_id` int(10) DEFAULT NULL,
  `Vacc_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Dose_id`),
  KEY `Date_id` (`Date_id`),
  KEY `Vacc_id` (`Vacc_id`),
  KEY `Std_id` (`Std_id`),
  CONSTRAINT `Std_ibfk_1` FOREIGN KEY (`Date_id`) REFERENCES `dates` (`Date_id`),
  CONSTRAINT `Std_ibfk_2` FOREIGN KEY (`Vacc_id`) REFERENCES `vaccines` (`Vacc_id`),
  CONSTRAINT `Std_ibfk_3` FOREIGN KEY (`Std_id`) REFERENCES `student` (`Std_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stddoses`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `stddoses`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stddoses`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `stddoses`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
