-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 08:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_whitebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Admin_role` text NOT NULL,
  `phone` text NOT NULL,
  `user_name` text NOT NULL,
  `pass_key` text NOT NULL,
  `status` text NOT NULL,
  `time_in` text NOT NULL,
  `time_out` text NOT NULL,
  `Date_added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`Id`, `Name`, `Admin_role`, `phone`, `user_name`, `pass_key`, `status`, `time_in`, `time_out`, `Date_added`) VALUES
(1, 'Allan mboti', 'super_admin', '0719852400', 'super@admin.com', '$1$A073955@$fJro93h1qgqhzW2oPErvI/', 'diactivate', '1111111', '221111', '211122'),
(2, 'Allan Mboti', 'clerk', '0719852400', 'allanmboti@gmail.com', '$1$A073955@$fJro93h1qgqhzW2oPErvI/', 'offline', '1111111', '1587738639', '1587698651'),
(3, 'john kinywa', 'executive', '0739552799', 'ictainnovations@gmail.com', '$1$A073955@$fJro93h1qgqhzW2oPErvI/', 'online', '11111', '222', '1587716677');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
