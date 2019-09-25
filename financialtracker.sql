-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 03:10 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financialtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(10) UNSIGNED NOT NULL,
  `full_Name` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` char(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `full_Name`, `email`, `phonenumber`, `password`) VALUES
(1, 'Na', 'na@gmail.com', '9222222222', '$2y$10$M.dELhNKU8UbxHqqiSg2i.XBwhcfw4nm/UeDCOLRcLX3lEJfmRfpu'),
(2, 'Na', 'na@gmail.com', '9222222222', '$2y$10$t5kvPe8nMYQAdcfwCHaKAurx.vV/SbsDb6DY23IRSMJWZeTyqGBna'),
(3, 'Na', 'na@gmail.com', '9222222222', '$2y$10$21gWiLt/5H4Fy83uxMrsL.zvVFXrboXbBczZ11RDMz8Hi5zYB/kRi');

-- --------------------------------------------------------

--
-- Table structure for table `userexpense`
--

CREATE TABLE `userexpense` (
  `userexpense_ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) NOT NULL,
  `expense_Date` date DEFAULT NULL,
  `expense_Item` varchar(200) DEFAULT NULL,
  `expense_Cost` varchar(200) DEFAULT NULL,
  `date_Entry` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `userexpense`
--
ALTER TABLE `userexpense`
  ADD PRIMARY KEY (`userexpense_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userexpense`
--
ALTER TABLE `userexpense`
  MODIFY `userexpense_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
