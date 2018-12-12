-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: tj5iv8piornf713y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com
-- Generation Time: Dec 12, 2018 at 08:18 PM
-- Server version: 5.7.23-log
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q04pglwa9t4hfqjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL,
  `deck` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `deck`, `question`) VALUES
(1, 'HTML', 'What is the purpose of the Doctype tag?'),
(2, 'HTML', 'HTML is typically rendered in what kind of program'),
(3, 'CSS', 'How are multiple styles separated?'),
(4, 'CSS', 'How do you determine CSS precedence?'),
(5, 'HTML', 'What is the HTML attribute required to identify an input on the server?'),
(6, 'PHP', 'What is the syntax for creating a variable in PHP?'),
(7, 'PHP', 'Are function names case sensitive in PHP?'),
(8, 'JS', 'What is the difference between null and undefined?'),
(9, 'JS', 'What “Truthy / Falsey”?'),
(10, 'JS', 'How do you declare an empty array?'),
(11, 'JS', 'What is the name of the object populated by the browser’s JavaScript engine automatically that repre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
