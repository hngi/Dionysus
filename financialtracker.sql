-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 01:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `username` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` char(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `email`, `phonenumber`, `password`) VALUES
(1, 'Na', 'na@gmail.com', '9222222222', '$2y$10$M.dELhNKU8UbxHqqiSg2i.XBwhcfw4nm/UeDCOLRcLX3lEJfmRfpu'),
(2, 'Na', 'na@gmail.com', '9222222222', '$2y$10$t5kvPe8nMYQAdcfwCHaKAurx.vV/SbsDb6DY23IRSMJWZeTyqGBna'),
(3, 'Na', 'na@gmail.com', '9222222222', '$2y$10$21gWiLt/5H4Fy83uxMrsL.zvVFXrboXbBczZ11RDMz8Hi5zYB/kRi'),
(4, 'Nado', 'nado@gmail.com', '0202020202', '$2y$10$Ff/n0x71RSdo09rFlTH60u1hWr2/8txHH6saTWoWQI0HELSucM01i'),
(5, 'chi', 'chi@gmail.com', NULL, '$2y$10$uf7ufbv/NhIePTJ50CH5Y.yXgfUWrcnL/GGjBwvJeOiS8y3anZCbq'),
(6, 'me', 'me@gmail.com', NULL, '$2y$10$6ERnw.MZFGD3wEnmz8YgjOdGMULZr4HLIoBxuk5CnTWgXoRUjx3z.'),
(7, 'th', 'th@gmail.com', NULL, '$2y$10$qwZsBcWTp3qvczxYlVZxseGQQdwep8Mjl1SR8x7d7AknaUdxQLqHy'),
(8, 'Naaaa', 'naaaa@gmail.com', NULL, '$2y$10$YrZPY83WPq7D5xEEeFjCbu7P1C20TXQDwGyK.y2ykE0DBGwEOS.7u'),
(9, 'We', 'we@gmail.com', NULL, '$2y$10$DnCbG6bKlyHkMkMU2pFiDura6NdgWRxI2c.ofzvX9HaUiw12.YLBW'),
(10, 'kk', 'kk@gmail.com', NULL, '$2y$10$JKNv12EQzEd60boAah0rEuNLOvgznspCvB6qbHiBoGN1/w07STqVe'),
(11, 'ss', 'ss@gmail.com', NULL, '$2y$10$rdLTtZvWZnj7oat2HV6HBOGD9YZYQlJj3afes4DearYssU/B2ylOy'),
(12, 'zz', 'zz@gmail.com', NULL, '$2y$10$lj/Xz5eu340iBC576Liwju9OdCuw3PrxzE4T.GfBcmIUz8g3x5DJC'),
(13, 'bb', 'bb@gmail.com', NULL, '$2y$10$ZFWpcAqq3Z/AbKX5ZV5EXeKGfY/LQ.7IcnYaK.CsFlwUn0xgXt49a'),
(14, 'nw', 'nw@gmail.com', NULL, '$2y$10$JK5Fl.sCqdQPl1oiPf1hs.WC/GWDosB.wgPzkf0Qad8g32rLukf6i'),
(15, 'hh', 'hh@gmail.com', NULL, '$2y$10$1f.cM9OBXiG.ZfpbLJeIRuj6vqamrlG4EB.WSI66MLSbVg0d/8hQ2'),
(16, 'ded', 'ded@gmail.com', NULL, '$2y$10$7uhgK1X84GxS59swsNdHjuoLQbNzVdh4ggDsLdCTVqM5MUmqkmqJK'),
(17, 'ee', 'ee@gmail.com', NULL, '$2y$10$wKzRVjKSrHJK3GfoqDrap.HAWq1/Uv1K1mCX9y/TVsYFYgIKgpfKS'),
(18, 'jj', 'jj@gmail.com', NULL, '$2y$10$ZpC7WRlW2DFMBZcTc00bH..oM7e3mgcj0CUy025jxmogAWYXS99hK'),
(19, 'pp', 'pp@gmail.com', NULL, '$2y$10$.OiAh3lIkhtnDwmntWZBhO50c67.X6pFhSI4aME0/AyDQ3SuyhC2.'),
(20, NULL, 'sdddd@eddd', NULL, '$2y$10$.Xx9W5b2ctQcuzTN.W2EsObYcoVPIjgSdGgfE.20DoyI.xqPswqSu'),
(21, 'ww', 'ww@gmail.com', NULL, '$2y$10$1nvgv6zTNI9gXwJja8PM2uVeBoTyn/h.CKfyq5vbjR4XiKxH911qW'),
(22, 'jo', 'jo@gmail.com', NULL, '$2y$10$eSwpOlpR47EKkulu4cif2eRgMLxVztTGLc26P2YPbBct3NakUb2EC'),
(23, 'frank', 'frank@gmail.com', NULL, '$2y$10$h/UvRkgIqZ/Ne/1AGSy71OLFoz3MD/c7HRvsYOBSzMslPNt.ygFuC'),
(24, 'danino', 'danino_001@yahoo.com', NULL, '$2y$10$eDxrf/1PzgKe9lPfCLgYPOSwnLNMYdTMjYLPY6X6hoc3oSUJDcLne');

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
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_Entry` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userexpense`
--

INSERT INTO `userexpense` (`userexpense_ID`, `user_ID`, `expense_Date`, `expense_Item`, `expense_Cost`, `type`, `description`, `date_Entry`) VALUES
(1, 24, '2019-09-28', 'Desiel', '10000', 'cash', '10000', '2019-09-26 23:41:59');

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
  MODIFY `user_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userexpense`
--
ALTER TABLE `userexpense`
  MODIFY `userexpense_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
