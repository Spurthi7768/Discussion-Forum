-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 05:19 AM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post ID` int(11) NOT NULL,
  `Topic ID` int(11) NOT NULL,
  `Post Text` text NOT NULL,
  `Post Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Post Creator` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post ID`, `Topic ID`, `Post Text`, `Post Time`, `Post Creator`) VALUES
(3, 3, 'hello!', '2020-08-04 18:53:05', 'Sparky'),
(4, 4, 'hello!', '2020-08-04 19:36:11', 'Sparky'),
(5, 5, 'it is very informative.', '2020-08-04 22:18:08', 'Sparky'),
(6, 6, 'Genius!', '2020-08-04 22:19:23', 'Swati'),
(7, 3, 'Helllo honey bunny.', '2020-08-05 09:44:47', 'manisha'),
(8, 7, 'What is Hollywood?', '2020-08-05 11:49:24', 'Sparky'),
(9, 7, 'Hollywood is English Film Industry', '2020-08-05 11:51:27', 'manisha'),
(10, 6, 'Yes it is!', '2020-08-05 11:55:47', 'Sparky'),
(11, 6, 'Wooo HOOO!', '2020-08-05 11:58:24', 'Coding_Master'),
(12, 8, 'Where are black panthers found?', '2020-08-05 17:53:27', 'Sparky'),
(13, 9, 'Where are black panthers found?', '2020-08-05 17:53:59', 'Sparky'),
(14, 10, 'What is Nitrogen?', '2020-08-05 18:28:54', 'Sparky'),
(15, 11, 'What is Nitrogen?', '2020-08-05 18:32:04', 'Sparky'),
(16, 12, 'who invented C language', '2020-08-05 18:36:19', 'Sparky'),
(17, 8, 'Africa', '2020-08-05 19:07:47', 'Sparky'),
(18, 13, 'What is C++', '2020-08-05 21:41:41', 'Sparky'),
(19, 13, 'scsagg', '2020-08-05 21:41:58', 'Sparky'),
(20, 14, 'What is the history of India?', '2020-08-06 08:45:50', 'Swag'),
(21, 11, 'Nitrogen is N2.', '2020-08-06 08:47:34', 'Swag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
