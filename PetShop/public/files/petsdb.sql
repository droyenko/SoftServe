-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2017 at 09:58 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `petsdb`
--

CREATE TABLE `petsdb` (
  `name` varchar(40) DEFAULT NULL,
  `price` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `fluffiness` int(2) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petsdb`
--

INSERT INTO `petsdb` (`name`, `price`, `color`, `fluffiness`, `type`) VALUES
('Jack', 300, 'black', 3, 'cat'),
('Goose', 150, 'gray', 1, 'cat'),
('Snake', 400, 'white', 0, 'cat'),
('Heat', 500, 'red', 0, 'dog'),
('Snowflake', 700, 'white', 0, 'dog'),
('Submarine', 300, 'yellow', 0, 'dog'),
('Hamster', 100, 'white', 1, 'hamster'),
('Hamster', 130, 'green', 2, 'hamster'),
('Hamster', 85, 'blue', 0, 'hamster'),
('Pashtet', 123, 'green', 3, 'cat'),
('Dino', 400, 'brown', NULL, 'dog');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
