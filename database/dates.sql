-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 09:06 AM
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
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `Date_id` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Vacc_id` int(10) DEFAULT NULL,
  `Avail_doses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Date_id`),
  KEY `Vacc_id` (`Vacc_id`),
  CONSTRAINT `dates_ibfk_1` FOREIGN KEY (`Vacc_id`) REFERENCES `vaccines` (`Vacc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`Date_id`, `Date`, `Vacc_id`, `Avail_doses`) VALUES
(1, '2021-07-12', 1, '10'),
(2, '2021-07-12', 2, '10'),
(3, '2021-07-12', 3, '10'),
(4, '2021-07-13', 1, '10'),
(5, '2021-07-13', 2, '10'),
(6, '2021-07-13', 3, '10'),
(7, '2021-07-14', 1, '10'),
(8, '2021-07-14', 2, '10'),
(9, '2021-07-14', 3, '10'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dates`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dates`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `dates`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
