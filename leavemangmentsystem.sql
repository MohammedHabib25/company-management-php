-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2021 at 06:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavemangmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminauth`
--

CREATE TABLE `adminauth` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminauth`
--

INSERT INTO `adminauth` (`username`, `password`) VALUES
('admin', '112233');

-- --------------------------------------------------------

--
-- Table structure for table `departmenttype`
--

CREATE TABLE `departmenttype` (
  `depid` int(10) NOT NULL,
  `departmentTypes` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departmenttype`
--

INSERT INTO `departmenttype` (`depid`, `departmentTypes`, `createdAt`) VALUES
(1, 'Operations', '2021-05-19 10:03:02'),
(2, 'Information Technology', '2021-05-19 10:03:02'),
(3, 'Human Resource', '2021-05-19 10:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `empid` int(10) UNSIGNED NOT NULL,
  `empUsername` varchar(50) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Phonenumber` char(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dateofbrith` date NOT NULL,
  `country` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `department` varchar(40) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`empid`, `empUsername`, `Password`, `fname`, `lname`, `email`, `Phonenumber`, `gender`, `dateofbrith`, `country`, `city`, `department`, `createdAt`) VALUES
(20180579, 'dfgbghjksde', '123456', 'Moahmmedsss', 'Emtiersss', 'm_mater2011@hotmail.com', '0599883947', 'male', '2021-05-24', 'egypt', 'Gaza', 'Oprations', '2021-05-20 14:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `leavesdata`
--

CREATE TABLE `leavesdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `leavetype` varchar(20) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `description` mediumtext NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusleave` varchar(20) NOT NULL,
  `empusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `leavesdata`
--
ALTER TABLE `leavesdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leavesdata`
--
ALTER TABLE `leavesdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
