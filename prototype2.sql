-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2014 at 09:46 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler`
--
CREATE DATABASE IF NOT EXISTS `scheduler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scheduler`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `EMPLOYEE_FNAME` varchar(15) NOT NULL,
  `EMPLOYEE_LNAME` varchar(15) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`),
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `EMPLOYEE_FNAME`, `EMPLOYEE_LNAME`) VALUES
(12345, 'Duke', 'Ayers'),
(54321, 'Ekud', 'Lastname'),
(68794, 'Bob', 'McSwag'),
(78456, 'Timothy', 'Bear');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(300) NOT NULL,
  `Body` varchar(3000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `Title`, `Body`) VALUES
(1, 'What Browser Should I Use?', 'Any of the most up-to-date browsers are going to be the best to use with the scheduling application. This includes and up-to-date version of Google Chrome, Mozilla Firefox, or Internet Explorer'),
(2, 'How Do I Add A Unique Shift?', 'This is currently being built but you should be able to just open up the indicated page and submit the new unique shift for all employees to use.');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `SCHEDULE_SHIFT_ID` int(1) NOT NULL,
  `SCHEDULE_EMPLOYEE_ID` int(10) NOT NULL,
  `SCHEDULE_DAY` varchar(15) NOT NULL,
  PRIMARY KEY (`SCHEDULE_SHIFT_ID`,`SCHEDULE_EMPLOYEE_ID`,`SCHEDULE_DAY`),
  KEY `SCHEDULE_SHIFT_ID` (`SCHEDULE_SHIFT_ID`,`SCHEDULE_EMPLOYEE_ID`),
  KEY `SCHEDULE_EMPLOYEE_ID` (`SCHEDULE_EMPLOYEE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SCHEDULE_SHIFT_ID`, `SCHEDULE_EMPLOYEE_ID`, `SCHEDULE_DAY`) VALUES
(1, 12345, 'Monday'),
(2, 12345, 'Tuesday'),
(2, 12345, 'Wednesday'),
(4, 12345, 'Saturday'),
(1, 54321, 'Friday'),
(1, 54321, 'Wednesday'),
(2, 54321, 'Monday'),
(3, 54321, 'Saturday'),
(4, 54321, 'Sunday'),
(4, 54321, 'Thursday'),
(4, 54321, 'Tuesday'),
(4, 68794, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `SHIFT_ID` int(2) NOT NULL,
  `SHIFT_START` varchar(20) NOT NULL,
  `SHIFT_END` varchar(20) NOT NULL,
  PRIMARY KEY (`SHIFT_ID`),
  KEY `SHIFT_ID` (`SHIFT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`SHIFT_ID`, `SHIFT_START`, `SHIFT_END`) VALUES
(1, '04:00', '06:00'),
(2, '08:00', '14:00'),
(3, '12:00', '23:50'),
(4, '16:00', '23:50'),
(5, '02:00', '09:00'),
(56, '12:30', '15:30'),
(123, '12:30', '04:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`SCHEDULE_SHIFT_ID`) REFERENCES `shift` (`SHIFT_ID`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`SCHEDULE_EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
