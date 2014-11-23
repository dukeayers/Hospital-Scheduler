-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2014 at 04:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `staff_scheduler`
--
CREATE DATABASE IF NOT EXISTS `staff_scheduler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `staff_scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(4) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`Employee_ID`),
  UNIQUE KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recurring_schedule`
--

CREATE TABLE IF NOT EXISTS `recurring_schedule` (
  `DayOfWeek` varchar(9) NOT NULL,
  `Start_Time` varchar(5) NOT NULL,
  `End_Time` varchar(5) NOT NULL,
  `Employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`DayOfWeek`,`Start_Time`,`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requested_time_off`
--

CREATE TABLE IF NOT EXISTS `requested_time_off` (
  `RTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_ID` int(11) NOT NULL,
  `Start_Time` varchar(5) NOT NULL,
  `Description` varchar(140) NOT NULL,
  PRIMARY KEY (`RTO_ID`),
  UNIQUE KEY `RTO_ID` (`RTO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `Shift_ID` int(11) NOT NULL,
  `Start_Date` date NOT NULL DEFAULT '0000-00-00',
  `End_Date` date NOT NULL DEFAULT '0000-00-00',
  `Employee_ID` int(11) NOT NULL,
  `Description` varchar(140) NOT NULL,
  `OriginallyAssigned` int(11) NOT NULL,
  `ShiftState` int(11) NOT NULL,
  PRIMARY KEY (`Shift_ID`),
  UNIQUE KEY `Shift_ID` (`Shift_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
