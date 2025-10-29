-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2022 at 01:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whiteboxmarch2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings_mailer`
--

CREATE TABLE `settings_mailer` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `email_sender` text NOT NULL,
  `reply_to_email` text NOT NULL,
  `bcc_email` text NOT NULL,
  `Password` text NOT NULL,
  `host_mail` text NOT NULL,
  `html_enabled` text NOT NULL,
  `Port_mail` text NOT NULL,
  `SMTPSecure` text NOT NULL,
  `mail_engine` text NOT NULL,
  `updated_by` text NOT NULL,
  `status` text NOT NULL,
  `date_created` text NOT NULL,
  `date_updated` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_mailer`
--

INSERT INTO `settings_mailer` (`id`, `email`, `email_sender`, `reply_to_email`, `bcc_email`, `Password`, `host_mail`, `html_enabled`, `Port_mail`, `SMTPSecure`, `mail_engine`, `updated_by`, `status`, `date_created`, `date_updated`) VALUES
(1, 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'a2pjZyBmZ3ByIHh4aHggeWllcQ==', 'smtp.gmail.com', 'true', '587', 'ssl', 'smtp', '1', 'done', '2022-03-08 15:06:40 pm', '2022-03-08 15:09:02 pm'),
(2, 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'a2pjZyBmZ3ByIHh4aHggeWllcQ==', 'smtp.gmail.com', 'true', '587', 'tls', 'smtp', '1', 'done', '2022-03-08 15:09:02 pm', '2022-03-08 16:55:07 pm'),
(3, 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'a2pjZyBmZ3ByIHh4aHggeWllcXBw', 'smtp.gmail.com', 'true', '587', 'tls', 'smtp', '1', 'done', '2022-03-08 16:55:07 pm', '2022-03-08 17:01:32 pm'),
(4, 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'whitebox@ict.go.ke', 'a2pjZyBmZ3ByIHh4aHggeWllcQ==', 'smtp.gmail.com', 'true', '587', 'tls', 'smtp', '1', 'active', '2022-03-08 17:01:32 pm', '2022-03-08 17:01:32 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings_mailer`
--
ALTER TABLE `settings_mailer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings_mailer`
--
ALTER TABLE `settings_mailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
