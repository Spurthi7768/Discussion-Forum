-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 05:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robospark`
--

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `Topic_ID` int(11) NOT NULL,
  `Topic_Title` varchar(150) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Topic_Creator` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`Topic_ID`, `Topic_Title`, `Time`, `Topic_Creator`) VALUES
(3, 'Stackoverflow', '0000-00-00 00:00:00', 'Sparky'),
(4, 'Stackoverflow', '2020-08-04 19:36:11', 'Sparky'),
(5, 'Stackoverflow', '2020-08-04 22:18:08', 'Sparky'),
(6, 'Stackoverflow', '2020-08-04 22:19:23', 'Swati'),
(7, 'Hollywood', '2020-08-05 11:49:24', 'Sparky'),
(8, 'Black panther', '2020-08-05 17:53:27', 'Sparky'),
(9, 'Black panther', '2020-08-05 17:53:59', 'Sparky'),
(10, 'Nitrogen', '2020-08-05 18:28:54', 'Sparky'),
(11, 'Nitrogen', '2020-08-05 18:32:04', 'Sparky'),
(12, 'C', '2020-08-05 18:36:18', 'Sparky'),
(13, 'C++', '2020-08-05 21:41:41', 'Sparky'),
(14, 'History', '2020-08-06 08:45:50', 'Swag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`Topic_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `Topic_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
