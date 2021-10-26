-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2021 at 05:35 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(35) NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username` (`admin_email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `level`) VALUES
(1, 'prithviamazing@gmail.com', 'qwerty12345', 2),
(2, 'tamimmahmud0@gmail.com', '12345qwerty', 3),
(3, 'muzahidul190@gmail.com', 'q1w2e3r4t5y6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id_app` int(11) NOT NULL,
  `p_id_app` int(11) NOT NULL,
  `dep_id_app` int(10) DEFAULT NULL,
  `app_routine` int(7) DEFAULT NULL,
  `app_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `d_id_app`, `p_id_app`, `dep_id_app`, `app_routine`, `app_created`, `app_status`) VALUES
(1, 3, 2, 1, 6, '2021-10-27 21:47:32', 0),
(2, 3, 1, 3, 1, '2021-10-27 22:13:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(30) NOT NULL,
  `dep_details` varchar(55) NOT NULL,
  `dep_seat` int(5) NOT NULL,
  `seat_cost` int(11) DEFAULT NULL,
  `dep_seat_booked` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dep_id`),
  UNIQUE KEY `dep_name` (`dep_name`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`, `dep_details`, `dep_seat`, `seat_cost`, `dep_seat_booked`) VALUES
(1, 'Medicine', 'This department deals with medicine part.', 30, 3000, 0),
(2, 'Neurology', 'This dept. deals problems regarding Neural diseases.', 15, 5000, 0),
(24, 'Gyno', 'Safe home to Moms.', 75, 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_email` varchar(25) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_contact` int(15) NOT NULL,
  `d_education` varchar(200) DEFAULT NULL,
  `d_routine` varchar(50) DEFAULT NULL,
  `d_password` varchar(35) NOT NULL,
  `d_approved` tinyint(1) NOT NULL DEFAULT '0',
  `d_department_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `username` (`d_email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`d_id`, `d_email`, `d_name`, `d_contact`, `d_education`, `d_routine`, `d_password`, `d_approved`, `d_department_id`) VALUES
(1, 'doctor@gmail.com', 'Dr. Abbas Uddin', 1789123456, 'MBBS', NULL, '12345678', 0, 2),
(2, 'doc2@gmail.com', 'Dr.Tamim Mahmud', 1234567890, 'CSE, NUBTK', NULL, 'kfjugheirutyhg', 1, 1),
(3, 'Pridldfj@mail.com', 'Dr. Prithvi Biswas', 1923467593, 'Nubtk, Khulna`MBBS, Khulna 250 bed', '1,6', 'qwerty', 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_email` varchar(30) NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `p_dob` date NOT NULL,
  `p_gender` enum('m','f','n') DEFAULT NULL,
  `p_address` varchar(55) DEFAULT NULL,
  `p_phone` int(15) NOT NULL,
  `p_password` varchar(35) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_username` (`p_email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_id`, `p_email`, `p_name`, `p_dob`, `p_gender`, `p_address`, `p_phone`, `p_password`) VALUES
(1, 'abul@mail.com', 'abul_bashar', '2021-10-13', 'm', NULL, 1956789043, 'ghseikfuyhtgidfhgksdf'),
(2, 'someone@mail.com', 'Some One', '2003-07-23', 'f', 'PoncoGor, Bangladesh', 1925483729, 'qwerty'),
(3, 'someone@mail.coms', 'Muzahidul Islam', '2021-10-01', 'm', 'Koyra', 1966928488, '123456'),
(4, 'textmail.dd@gmail.com', 'Test Person', '1983-08-08', 'n', 'Noakhali', 1234567866, 'janinapass'),
(5, 'patient3@mail.com', 'Mr. Patient', '1973-11-21', 'f', 'Satkhira', 1723984612, 'patient123');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

DROP TABLE IF EXISTS `routine`;
CREATE TABLE IF NOT EXISTS `routine` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `d_id_r` int(10) NOT NULL,
  `sat` tinyint(1) NOT NULL DEFAULT '0',
  `sun` tinyint(1) NOT NULL DEFAULT '0',
  `mon` tinyint(1) NOT NULL DEFAULT '0',
  `tues` tinyint(1) NOT NULL DEFAULT '0',
  `wed` tinyint(1) NOT NULL DEFAULT '0',
  `thir` tinyint(1) NOT NULL DEFAULT '0',
  `fri` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seat_booking`
--

DROP TABLE IF EXISTS `seat_booking`;
CREATE TABLE IF NOT EXISTS `seat_booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `dep_id` int(5) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seat_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `textable`
--

DROP TABLE IF EXISTS `textable`;
CREATE TABLE IF NOT EXISTS `textable` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text,
  `extra` varchar(55) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Testing Table';

--
-- Dumping data for table `textable`
--

INSERT INTO `textable` (`id`, `name`, `email`, `extra`, `comments`) VALUES
(1, 'Muzahidul Islam', 'muzahidul190@gmail.com', 'This is the first record on the test table.', NULL),
(2, 'Prithvi', 'prithviamazing@gmail.com', 'This is another record for the test table', NULL),
(3, 'Tamim', 'tamimmahmud@gmail.com', 'This is 3rd record for the test table', NULL),
(4, 'Sourav Dhali', 'dhalisourav@gmail.com', 'This is 6th record for the test table', NULL),
(5, 'Sourav Dhali', 'dhalisourav@gmail.com', 'This is 5th record for the test table', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
