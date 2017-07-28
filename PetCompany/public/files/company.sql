-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 10:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `CAND_ID` int(11) NOT NULL,
  `CAND_NAME` varchar(50) NOT NULL,
  `CAND_PROFILE` varchar(50) NOT NULL,
  `CAND_WANTED_SALARY` int(11) NOT NULL,
  `CAND_EXPERIENCE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`CAND_ID`, `CAND_NAME`, `CAND_PROFILE`, `CAND_WANTED_SALARY`, `CAND_EXPERIENCE`) VALUES
(1, 'Adam', 'Dev', 750, 3),
(2, 'Btian', 'Dev', 650, 2),
(3, 'John', 'PM', 600, 2),
(4, 'Kevin', 'PM', 500, 5),
(5, 'Andrew', 'QC', 700, 1),
(6, 'Kate', 'QC', 450, 4);

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `NEED_ID` int(11) NOT NULL,
  `NEED_PROFILE` varchar(50) NOT NULL,
  `NEED_SALARY` varchar(50) NOT NULL,
  `NEED_EXPERIENCE` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`NEED_ID`, `NEED_PROFILE`, `NEED_SALARY`, `NEED_EXPERIENCE`, `TEAM_ID`) VALUES
(1, 'Dev', '1700', 2, 1),
(2, 'PM', '2300', 4, 1),
(3, 'QC', '1500', 1, 2),
(4, 'Dev', '1600', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `SPEC_ID` int(11) NOT NULL,
  `SPEC_NAME` varchar(50) NOT NULL,
  `SPEC_POSITION` varchar(50) NOT NULL,
  `SPEC_SALARY` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`SPEC_ID`, `SPEC_NAME`, `SPEC_POSITION`, `SPEC_SALARY`, `TEAM_ID`) VALUES
(1, 'Anthony', 'Dev', 2000, 1),
(2, 'Anastasia', 'PM', 1500, 1),
(3, 'Sara', 'QC', 500, 1),
(4, 'Alex', 'Dev', 2300, 2),
(5, 'Elisabeth', 'PM', 1900, 2),
(6, 'Albert', 'QC', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `TEAM_ID` int(11) NOT NULL,
  `TEAM_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`TEAM_ID`, `TEAM_NAME`) VALUES
(1, 'PHP Team'),
(2, 'Java Team');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`CAND_ID`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`NEED_ID`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`SPEC_ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`TEAM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `CAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `NEED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `SPEC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
