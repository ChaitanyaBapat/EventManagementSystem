-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 03:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MOBILE_NUMBER` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASSWORD`, `EMAIL`, `MOBILE_NUMBER`) VALUES
('bapat', '12345', 'carb@gmail.com', '9167140720');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EVENT_ID` int(10) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `START_TIME` time NOT NULL,
  `END_TIME` time NOT NULL,
  `DESCRIPTION` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ROLL_NO` varchar(9) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `YEAR` varchar(2) NOT NULL,
  `DIVISION` varchar(1) NOT NULL,
  `BATCH` varchar(5) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `MOBILE_NUMBER` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ROLL_NO`, `PASSWORD`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `YEAR`, `DIVISION`, `BATCH`, `EMAIL`, `MOBILE_NUMBER`) VALUES
('15CE1025', '827ccb0eea8a706c4c34a16891f84e7b', 'Chaitanya', 'Avinash', 'Bapat', 'te', 'A', 'one', 'carb@gmail.com', '2147483647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EVENT_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ROLL_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EVENT_ID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
