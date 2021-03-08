-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2021 at 06:27 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `age` int(12) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `action` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `age`, `mobile`, `action`) VALUES
(1, 'John', 'Smith', 28, '9548451275', 1),
(2, 'Peterson', 'Parker', 40, '8645534531', 1),
(3, 'Rock', 'Madison', 20, '4234534531', 1),
(4, 'Abhi', 'Singh', 23, '4234429784', 1),
(5, 'Swami', 'Naidu', 21, '3747234671', 0),
(11, 'Sachin', 'Yadav', 23, '807770576', 1),
(12, 'Sachin', 'Yadav', 23, '807770576', 1),
(17, 'mohan', 'tomer', 22, '8546865166', 1),
(18, 'new name', 'raja', 91, '9546864654', 1),
(19, 'kartik', 'tomer', 22, '8546865166', 1),
(21, 'Sachin', 'Yadav', 23, '8077705762', 1),
(22, 'Neha', 'Yadav', 23, '8077705762', 0),
(48, 'saniya', 'khan', 201, '9547819999', 0),
(49, 'Dharam Raj', 'Yadav', 55, '8084215495', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
