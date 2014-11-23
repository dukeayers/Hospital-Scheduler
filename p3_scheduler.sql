-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2014 at 06:23 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p3_scheduler`
--
CREATE DATABASE IF NOT EXISTS `p3_scheduler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `p3_scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int(10) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Body` varchar(1000) NOT NULL,
  `Title` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_time_off`
--

CREATE TABLE IF NOT EXISTS `req_time_off` (
  `Employee_ID` int(10) NOT NULL,
  `RTO_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `Day` varchar(10) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`RTO_ID`),
  KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `Shift_ID` int(10) NOT NULL,
  `Employee_ID` int(10) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`Employee_ID`,`Date`),
  KEY `Shift_ID` (`Shift_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `Shift_ID` int(10) NOT NULL,
  `Start_Time` varchar(5) NOT NULL,
  `End_Time` varchar(5) NOT NULL,
  PRIMARY KEY (`Shift_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `req_time_off`
--
ALTER TABLE `req_time_off`
  ADD CONSTRAINT `req_time_off_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`Shift_ID`) REFERENCES `shift` (`Shift_ID`),
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
