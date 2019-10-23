-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 12:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhira`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_plot`
--

CREATE TABLE `book_plot` (
  `id` int(20) NOT NULL,
  `sector` int(100) NOT NULL,
  `plot_id` int(200) NOT NULL,
  `plc` varchar(200) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `emi_time` varchar(200) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `sponser_id` varchar(200) NOT NULL,
  `sponser_role` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `month` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_plot`
--

INSERT INTO `book_plot` (`id`, `sector`, `plot_id`, `plc`, `total_price`, `emi_time`, `payment_mode`, `sponser_id`, `sponser_role`, `user_name`, `father_name`, `user_phone`, `user_email`, `user_address`, `date`, `month`, `year`, `last_update`, `status`) VALUES
(1, 1, 1, '1', '1000000', '36', 'cash', '2', '1', 'ashok1', 'dsfdsg', '8543029454', 'dk@pass123', 'dfdsf', '2018-10-14', 10, 2018, '2018-10-14 12:41:39.166291', 1),
(2, 1, 2, '1', '100000', '36', 'cheque', '3', '2', 'dinesh1', 'dsfdsg', '8543029454', 'dk@pass123', 'dfdsf', '2018-10-14', 10, 2018, '2018-10-14 12:42:27.008204', 1),
(3, 1, 3, '1', '800000', '60', 'cash', '4', '3', 'rama1', 'dsfdsg', '8543029454', 'dk@pass123', 'dfdsf', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(4, 1, 5, '1', '5000000', '60', 'cheque', '5', '4', 'mukesh1', 'sdfs', '1234567654', 'fdgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(5, 1, 6, '1', '100000', '60', 'cash', '6', '5', 'ramesh1', 'sdfs', '1234567654', 'fdgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(6, 1, 8, '1.1', '880000', '36', 'cash', '7', '6', 'roma1', 'sdfs', '1234567654', 'fdgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(7, 1, 9, '1.1', '220000', '60', 'cheque', '8', '7', 'ganesh1', 'sdfs', '1234567654', 'fdgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(8, 1, 10, '1.1', '4400000', '60', 'cash', '9', '8', 'mukul1', 'sdfs', '1234567654', 'fdgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(9, 1, 11, '1.1', '1100000', '60', 'cash', '10', '3', 'sonam1', 'sdfs', '1234567654', 'fdgfgi@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(10, 1, 12, '1', '100000', '60', 'cheque', '11', '4', 'ganpati', 'sdfs', '1234567654', 'fdgfgfgl@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(11, 1, 13, '1.1', '880000', '60', 'cheque', '12', '5', 'rishi1', 'sdfs', '1234567654', 'fdgfgp@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(12, 1, 15, '1.1', '176000', '60', 'cheque', '13', '6', 'kanti', 'sdfs', '1234567654', 'fdghfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(13, 1, 16, '1.1', '5500000', '60', 'cheque', '14', '7', 'pinki1', 'sdfs', '1234567654', 'fdgfgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(14, 1, 14, '1.1', '704000', '60', 'cheque', '15', '8', 'rinki1', 'sdfs', '1234567654', 'fdgfgi@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(15, 1, 17, '1', '1000000', '60', 'cash', '16', '4', 'ankita1', 'sdfs', '1234567654', 'fdgfgfgl@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(16, 1, 18, '1', '640000', '60', 'cheque', '17', '5', 'poonam', 'sdfs', '1234567654', 'fdgfgp@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(17, 1, 20, '1.1', '176000', '60', 'cheque', '18', '6', 'rekha1', 'rekha', '1234567654', 'fdghfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(18, 1, 7, '1.1', '880000', '60', 'cash', '19', '7', 'roli1', 'sdfs', '1234567654', 'fdgfgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(19, 1, 19, '1.1', '88000', '60', 'cheque', '20', '8', 'rupa1', 'sdfs', '1234567654', 'fdgfgi@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(20, 1, 21, '1.1', '4400000', '60', 'cheque', '21', '5', 'raman1', 'sdfs', '1234567654', 'fdgfgfgl@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(21, 2, 24, '1', '160000', '60', 'cheque', '22', '6', 'kamal1', 'sdfs', '1234567654', 'fdgfgp@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(22, 2, 25, '1.1', '220000', '60', 'cheque', '23', '7', 'nikil1', 'sdfs', '1234567654', 'fdghfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(23, 2, 23, '1', '200000', '60', 'cheque', '24', '8', 'hasan', 'sdfs', '1234567654', 'fdgfgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(24, 2, 27, '1.1', '176000', '36', 'cash', '25', '6', 'adita', 'sdfs', '1234567654', 'fdgfgi@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(25, 2, 28, '1.1', '176000', '60', 'cash', '26', '7', 'suman1', 'sdfs', '1234567654', 'fdgfgfgl@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(26, 2, 29, '1.1', '176000', '60', 'cheque', '27', '8', 'rinku1', 'sdfs', '1234567654', 'fdgfgp@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1),
(27, 2, 26, '1.1', '220000', '60', 'cheque', '6', '5', 'mukesh1', 'sdfs', '1234567654', 'fdgfgfg@gmail.com', 'gfdgfdhg', '2018-10-10', 10, 2018, '2018-10-14 12:41:13.385118', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE `plot` (
  `plot_id` int(200) NOT NULL,
  `sr_no` int(200) NOT NULL,
  `plot_no` int(200) NOT NULL,
  `plot_size` int(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`plot_id`, `sr_no`, `plot_no`, `plot_size`, `date`, `status`) VALUES
(1, 1, 1, 1000, '10-10-18', 0),
(2, 1, 2, 100, '10-10-18', 0),
(3, 1, 3, 800, '10-10-18', 0),
(4, 1, 4, 200, '10-10-18', 1),
(5, 1, 5, 5000, '10-10-18', 0),
(6, 1, 6, 100, '10-10-18', 0),
(7, 1, 7, 1000, '10-10-18', 0),
(8, 1, 8, 800, '10-10-18', 0),
(9, 1, 9, 200, '10-10-18', 0),
(10, 1, 10, 5000, '10-10-18', 0),
(11, 1, 11, 1000, '10-10-18', 0),
(12, 1, 12, 100, '10-10-18', 0),
(13, 1, 13, 800, '10-10-18', 0),
(14, 1, 13, 800, '10-10-18', 0),
(15, 1, 14, 200, '10-10-18', 0),
(16, 1, 15, 5000, '10-10-18', 0),
(17, 1, 16, 1000, '10-10-18', 0),
(18, 1, 17, 800, '10-10-18', 0),
(19, 1, 18, 100, '10-10-18', 0),
(20, 1, 19, 200, '10-10-18', 0),
(21, 1, 20, 5000, '10-10-18', 0),
(22, 2, 1, 200, '11-10-18', 1),
(23, 2, 2, 200, '11-10-18', 0),
(24, 2, 3, 200, '11-10-18', 0),
(25, 2, 4, 200, '11-10-18', 0),
(26, 2, 5, 200, '11-10-18', 0),
(27, 2, 6, 200, '11-10-18', 0),
(28, 2, 7, 200, '11-10-18', 0),
(29, 2, 8, 200, '11-10-18', 0),
(30, 2, 9, 200, '11-10-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plot_installment`
--

CREATE TABLE `plot_installment` (
  `id` int(200) NOT NULL,
  `cust_id` int(200) NOT NULL,
  `stalment` int(100) NOT NULL,
  `sponser_id` int(200) NOT NULL DEFAULT '0',
  `sponser_role` int(200) NOT NULL DEFAULT '0',
  `comm_percent` int(200) NOT NULL DEFAULT '0',
  `commission` int(200) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `month` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_installment`
--

INSERT INTO `plot_installment` (`id`, `cust_id`, `stalment`, `sponser_id`, `sponser_role`, `comm_percent`, `commission`, `type`, `date`, `year`, `month`) VALUES
(1, 1, 10000, 2, 1, 20, 2000, 'b', '2018-10-10', 2018, 10),
(2, 2, 10000, 3, 2, 19, 1900, 'b', '2018-10-10', 2018, 10),
(3, 3, 10000, 4, 3, 18, 1800, 'b', '2018-10-10', 2018, 10),
(4, 4, 10000, 5, 4, 16, 1600, 'b', '2018-10-11', 2018, 10),
(5, 5, 10000, 6, 5, 14, 1400, 'b', '2018-10-11', 2018, 10),
(6, 6, 10000, 7, 6, 12, 1200, 'b', '2018-10-11', 2018, 6),
(7, 7, 10000, 8, 7, 10, 1000, 'b', '2018-10-11', 2018, 6),
(8, 8, 10000, 9, 8, 6, 600, 'b', '2018-10-11', 2018, 10),
(9, 9, 10000, 10, 3, 18, 1800, 'b', '2018-10-11', 2018, 10),
(10, 10, 10000, 11, 4, 16, 1600, 'b', '2018-10-11', 2018, 10),
(11, 11, 10000, 12, 5, 14, 1400, 'b', '2018-10-11', 2018, 8),
(12, 12, 10000, 13, 6, 12, 1200, 'b', '2018-10-11', 2018, 9),
(13, 13, 10000, 14, 7, 10, 1000, 'b', '2018-10-11', 2018, 10),
(14, 14, 10000, 15, 8, 6, 600, 'b', '2018-10-11', 2018, 4),
(15, 15, 10000, 16, 4, 16, 1600, 'b', '2018-10-11', 2018, 10),
(16, 16, 10000, 17, 5, 14, 1400, 'b', '2018-10-11', 2018, 10),
(17, 17, 10000, 18, 6, 12, 1200, 'b', '2018-10-11', 2018, 10),
(18, 18, 10000, 19, 7, 10, 1000, 'b', '2018-10-11', 2018, 10),
(19, 19, 10000, 20, 8, 6, 600, 'b', '2018-10-11', 2018, 10),
(20, 20, 10000, 21, 5, 14, 1400, 'b', '2018-10-11', 2018, 11),
(21, 21, 10000, 22, 6, 12, 1200, 'b', '2018-10-11', 2018, 12),
(22, 22, 10000, 23, 7, 10, 1000, 'b', '2018-10-11', 2018, 12),
(23, 23, 10000, 24, 8, 6, 600, 'b', '2018-10-11', 2018, 11),
(24, 24, 10000, 25, 6, 12, 1200, 'b', '2018-10-11', 2018, 5),
(25, 25, 10000, 26, 7, 10, 1000, 'b', '2018-10-11', 2018, 7),
(26, 26, 10000, 27, 8, 6, 600, 'b', '2018-10-11', 2018, 10),
(27, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 4),
(28, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 8),
(29, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 9),
(30, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 10),
(31, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 6),
(32, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 3),
(33, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 2),
(34, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 5),
(35, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-12', 2018, 7),
(36, 27, 10000, 6, 5, 14, 1400, 'b', '2018-10-13', 2018, 2),
(37, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-14', 2018, 1),
(38, 1, 27500, 2, 1, 20, 5500, 's', '2018-10-14', 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `month` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `user_id`, `role`, `date`, `year`, `month`) VALUES
(7, 6, 5, '2018-10-14', 2018, 10),
(8, 5, 3, '2018-10-14', 2018, 10),
(9, 7, 5, '2018-10-14', 2018, 10),
(10, 5, 1, '2018-10-14', 2018, 10),
(11, 7, 4, '2018-10-14', 2018, 10),
(12, 6, 2, '2018-10-14', 2018, 10),
(13, 11, 3, '2018-10-14', 2018, 10),
(14, 7, 3, '2018-10-14', 2018, 10),
(15, 3, 4, '2018-10-14', 2018, 10),
(16, 2, 3, '2018-10-14', 2018, 10),
(17, 8, 2, '2018-10-14', 2018, 10),
(18, 8, 1, '2018-10-14', 2018, 10),
(19, 5, 6, '2018-10-14', 2018, 10),
(20, 5, 3, '2018-10-14', 2018, 10),
(21, 5, 2, '2018-10-14', 2018, 10),
(22, 3, 3, '2018-10-14', 2018, 10),
(23, 2, 2, '2018-10-14', 2018, 10),
(24, 2, 1, '2018-10-14', 2018, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(200) NOT NULL,
  `sponser_id` int(200) NOT NULL DEFAULT '0',
  `amount` int(200) NOT NULL DEFAULT '0',
  `date` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `month` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `sponser_id`, `amount`, `date`, `year`, `month`) VALUES
(1, 2, 200000, '2018-10-13', 2018, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `sec_id` int(200) NOT NULL,
  `sec_name` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sec_id`, `sec_name`, `Date`) VALUES
(1, 'block A', '10-10-18'),
(2, 'block B', '10-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `sponser_id` int(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `login_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `addhar_no` int(100) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `month` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `user_role` varchar(200) NOT NULL DEFAULT 'user',
  `bank_name` varchar(200) NOT NULL,
  `ifsc` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acholder_name` varchar(200) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `profile_image` varchar(100) NOT NULL DEFAULT 'profile.jpg',
  `status` tinyint(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sponser_id`, `user_name`, `login_id`, `password`, `user_phone`, `user_email`, `addhar_no`, `user_address`, `date`, `month`, `year`, `user_role`, `bank_name`, `ifsc`, `account_number`, `acholder_name`, `last_update`, `profile_image`, `status`) VALUES
(1, 0, 'apinfra', 'ap', '123', '8707526612', 'kawanna00@lequitywk.com', 0, 'zdsdf', '2018-07-09 21:30:00', 10, 2018, 'admin', 'xZXC', 'zxczc', 'cxzcz', 'czxscz', '2019-10-23 10:07:46.796302', '311_thumb_thumb.jpg', 1),
(2, 1, 'ashok', 'ashok', 'ashok123', '8543029454', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:19:15', 10, 2018, '1', 'dfdsf', 'sdfsf', '23213', 'dfdsf', '2018-10-14 11:29:33.080905', 'profile.jpg', 1),
(3, 2, 'dinesh', 'dinesh', 'esrfgd', '8543029454', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:22:21', 10, 2018, '3', 'dfdsf', 'sdfsf', '23213', 'dfdsf', '2018-10-14 11:17:52.139723', 'profile.jpg', 1),
(4, 2, 'rama', 'efe', 'dkm', '6392125576', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:29:41', 10, 2018, '6', 'Allahabad Bank', 'sdfsf', '23213', 'dfdsf', '2018-10-14 11:10:13.518905', 'profile.jpg', 1),
(5, 2, 'mukesh', 'gfdgfdg', 'esrfgd', '8543029454', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:30:34', 10, 2018, '2', 'dfdsf', 'sdfsf', '23213', 'dfdsf', '2018-10-14 11:17:21.307436', 'profile.jpg', 1),
(6, 2, 'ramesh', 'gfdgfdg', 'dhiraj111111', '6392125576', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:32:18', 10, 2018, '8', 'Allahabad Bank', 'ALLA0213020', '23213', 'dfdsf', '2018-10-14 11:10:21.832644', 'profile.jpg', 1),
(7, 2, 'roma', 'yht', 'esrfgd', '8543029454', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 01:36:07', 10, 2018, '3', 'dfdsf', 'sdfsf', '59044371079', 'Aleem Quraishi', '2018-10-14 11:03:59.070831', 'profile.jpg', 1),
(8, 2, 'ganesh', 'gfdgfdg', 'ashok123', '8543029454', 'dytytuyk@pas6', 213213, 'dfdsf', '2018-10-11 02:01:28', 10, 2018, '1', 'dfdsf', 'sdfsf', '23213', 'dfdsf', '2018-10-14 11:14:10.974483', 'profile.jpg', 1),
(9, 2, 'mukul', 'gfdgfdg', 'esrfgd', '8543029454', 'dk@pass123', 213213, 'dfdsf', '2018-10-11 02:06:13', 10, 2018, '8', 'dfdsf', 'sdfsf', '23213', 'dfdsf', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(10, 3, 'sonam', 'sonam', 'sonam', '1234567654', 'fdgfg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 14:59:26', 10, 2018, '3', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(11, 3, 'ganpati', 'ertre', 'rtyre', '1234567654', 'fdgfgfg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 15:01:08', 10, 2018, '3', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-14 11:02:59.628840', 'profile.jpg', 1),
(12, 3, 'rishi', 't5rytr', 'htfgg', '1234567654', 'fdghfg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 15:05:58', 10, 2018, '5', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(13, 3, 'kanti', 'ertre', 'sonam', '1234567654', 'fdgfgp@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 15:06:43', 10, 2018, '6', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(14, 3, 'pinki', 'ertre', 'sonam', '1234567654', 'fdgfgfgl@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 15:08:05', 10, 2018, '7', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(15, 3, 'rinki', 'ertre', 'sonam', '1234567654', 'fdgfgi@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 15:08:51', 10, 2018, '8', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(16, 10, 'ankita', 'ertre', 'rtyre', '1234567654', 'fdgfgj@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 16:17:09', 10, 2018, '4', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(17, 10, 'poonam', 'ertre', 'sonam', '1234567654', 'fdgfig@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 16:17:52', 10, 2018, '5', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(18, 10, 'rekha', 'ertre', 'rtyre', '1234567654', 'fdgfyg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 16:19:04', 10, 2018, '6', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(19, 10, 'roli', 'ertre', 'htfgg', '1234567654', 'fdgfg1@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:33:44', 10, 2018, '7', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(20, 10, 'rupa', 'ertre', 'htfgg', '1234567654', 'fdgf2g@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:37:49', 10, 2018, '8', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(21, 16, 'raman', 'ertre', 'sonam', '1234567654', 'fdgfgofgl@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:41:30', 10, 2018, '5', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(22, 16, 'kamal', 'ertre', 'sonam', '1234567654', 'fdgfgf3gl@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:45:43', 10, 2018, '6', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(23, 16, 'nikil', 'ertre', 'sonam', '1234567654', 'fdgfgo1@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:48:47', 10, 2018, '7', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(24, 16, 'hasan', 'ertre', 'sonam', '1234567654', 'fd4gfgfgl@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:50:05', 10, 2018, '8', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(25, 21, 'adita', 'sonam', 'htfgg', '1234567654', 'fdgfgf1gl@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:58:50', 10, 2018, '6', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(26, 21, 'suman', 'ertre', 'sonam', '1234567654', 'fdgfhhg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 09:59:53', 10, 2018, '7', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(27, 21, 'rinku', 'ertre', 'sonam', '1234567654', 'fdggfg@gmail.com', 23121, 'gfdgfdhg', '2018-10-11 10:00:34', 10, 2018, '8', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:12:47.674685', 'profile.jpg', 1),
(28, 7, 'dhiraj', 't5rytr', 'sonam', '1234567654', 'fdgfg3@gmail.com', 23121, 'gfdgfdhg', '2018-10-13 07:11:07', 10, 2018, '8', 'dsfdsf', 'fdgvdg', '23424', 'dfdgfdg', '2018-10-13 07:11:07.082792', 'profile.jpg', 1),
(29, 3, 'sjdhsj', 'ap123', 'vivek', '2344433678', 'dh@gmail.com', 324, 'xsdef', '2018-10-14 09:17:20', 10, 2018, '3', 'sadsad', 'dfdf', 'dfdf', 'frfrfr', '2018-10-14 09:17:20.538774', 'profile.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_commission`
--

CREATE TABLE `user_commission` (
  `id` int(200) NOT NULL,
  `sponser_id` int(200) DEFAULT NULL,
  `commission` int(200) NOT NULL DEFAULT '0',
  `date` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `month` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_commission`
--

INSERT INTO `user_commission` (`id`, `sponser_id`, `commission`, `date`, `year`, `month`) VALUES
(1, 2, 34210, '2018-10-12', 2018, 10),
(5, 3, 5894, '2018-10-12', 2018, 10),
(6, 4, 1800, '2018-10-12', 2018, 10),
(7, 5, 1600, '2018-10-12', 2018, 10),
(9, 6, 1400, '2018-10-12', 2018, 10),
(10, 7, 1200, '2018-10-12', 2018, 10),
(11, 8, 1000, '2018-10-12', 2018, 10),
(12, 9, 600, '2018-10-12', 2018, 10),
(13, 10, 5300, '2018-10-12', 2018, 10),
(14, 6, 1400, '2018-10-13', 2018, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `commission` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `commission`) VALUES
(1, 'Director', 20),
(2, 'Deputy Director', 19),
(3, 'vp', 18),
(4, 'bp', 16),
(5, 'AP', 14),
(6, 'ASM', 12),
(7, 'BDM', 10),
(8, 'Asssociate', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_plot`
--
ALTER TABLE `book_plot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`plot_id`);

--
-- Indexes for table `plot_installment`
--
ALTER TABLE `plot_installment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_commission`
--
ALTER TABLE `user_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_plot`
--
ALTER TABLE `book_plot`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `plot_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `plot_installment`
--
ALTER TABLE `plot_installment`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `sec_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_commission`
--
ALTER TABLE `user_commission`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
