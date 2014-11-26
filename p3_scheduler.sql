-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2014 at 03:50 AM
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
  `UID` varchar(20) NOT NULL COMMENT 'User ID',
  `PWD` char(32) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `User_Type` int(1) NOT NULL DEFAULT '1' COMMENT '0: Former Staff 1:Staff 2:Administrator'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `First_Name`, `Last_Name`) VALUES
(12342, 'NoName', 'McAwesome'),
(12343, 'Kris', 'Bullins'),
(12344, 'Ryan', 'Dooley'),
(12345, 'Duke', 'Ayers');

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
  `Date` date NOT NULL,
  PRIMARY KEY (`Employee_ID`,`Date`),
  KEY `Shift_ID` (`Shift_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Shift_ID`, `Employee_ID`, `Day`, `Date`) VALUES
(1, 12342, 'Friday', '2014-11-14'),
(2, 12342, 'Sunday', '2014-11-16'),
(3, 12342, 'Tuesday', '2014-11-18'),
(3, 12342, 'Wednesday', '2014-11-19'),
(3, 12342, 'Thursday', '2014-11-20'),
(3, 12343, 'Monday', '2014-11-10'),
(3, 12343, 'Wednesday', '2014-11-12'),
(1, 12343, 'Thursday', '2014-11-13'),
(2, 12343, 'Friday', '2014-11-21'),
(3, 12343, 'Saturday', '2014-11-22'),
(1, 12344, 'Saturday', '2014-11-08'),
(2, 12344, 'Sunday', '2014-11-09'),
(2, 12344, 'Monday', '2014-11-10'),
(3, 12344, 'Tuesday', '2014-11-11'),
(1, 12344, 'Thursday', '2014-11-13'),
(1, 12344, 'Saturday', '2014-11-15'),
(2, 12344, 'Sunday', '2014-11-16'),
(3, 12344, 'Sunday', '2014-11-23'),
(1, 12345, 'Tuesday', '2014-11-04'),
(1, 12345, 'Wednesday', '2014-11-05'),
(1, 12345, 'Thursday', '2014-11-06'),
(3, 12345, 'Friday', '2014-11-07'),
(2, 12345, 'Monday', '2014-11-10'),
(2, 12345, 'Wednesday', '2014-11-12'),
(3, 12345, 'Friday', '2014-11-14'),
(2, 12345, 'Monday', '2014-11-17'),
(1, 12345, 'Monday', '2014-11-24'),
(1, 12345, 'Tuesday', '2014-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `Shift_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Start_Time` varchar(5) NOT NULL,
  `End_Time` varchar(5) NOT NULL,
  PRIMARY KEY (`Shift_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`Shift_ID`, `Start_Time`, `End_Time`) VALUES
(1, '08:30', '15:30'),
(2, '00:30', '12:30'),
(3, '15:30', '22:00');

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
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`Shift_ID`) REFERENCES `shift` (`Shift_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
