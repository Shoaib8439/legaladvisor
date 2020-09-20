-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2020 at 10:49 PM
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
-- Database: `mylegal`
--

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_reg`
--

DROP TABLE IF EXISTS `lawyer_reg`;
CREATE TABLE IF NOT EXISTS `lawyer_reg` (
  `lid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_reg`
--

INSERT INTO `lawyer_reg` (`lid`, `name`, `username`, `lno`, `email`, `phone`, `password`, `status`) VALUES
(6, '\r\nAdvocate Vijay Tangri', 'Vijay123', '8439242459', 'vijay@gmail.com', '8439242459', '12345678', 0),
(5, 'Sunita Bafna', 'Sunita123', '123456', 'sunita@gmail.com', '8439242459', '12345678', 0),
(3, 'Sudershani Ray', 'Sudershani123', '123456', 'sudershaniray@gmail.com', '8439242459', '12345678', 0),
(4, 'Barkha Bhalla', 'Barkha123', '123456', 'barkha@gmail.com', '8439242459', '12345678', 0),
(8, 'Advocate Nitin Chopra', 'nitin123', '9876543210', 'nitin@gmail.com', '9876543210', '12345678', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
