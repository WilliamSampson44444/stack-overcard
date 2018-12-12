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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`) VALUES
(1, 1, 'Tells the browser what version of html the page contains', 1, 13),
(2, 1, 'blah', 2, 1),
(3, 3, 'The ; character', 2, -5),
(4, 4, 'Specificity, then order.', 1, 0),
(5, 4, 'Specificity, then order, i.e. more specific order wins, but with same specificity, order wins.', 2, 3),
(6, 5, 'name', 1, 3),
(12, 1, 'iT sAyS wHaT kInD oF dOcToR yOu ArE', 3, -10),
(13, 5, 'Orange is a color.', 3, 0),
(14, 3, ';', 2, 2),
(15, 6, '$name', 1, 3),
(16, 6, 'var name', 2, -5),
(17, 7, 'No', 2, 4),
(18, 7, 'Yes', 1, -1),
(19, 8, 'null values do not exist, but are purposely set as not existing, while undefined values are simply u', 1, 3),
(20, 9, 'It is a way to evaluate conditions whereby a list of FALSE values is established and every other val', 2, 4),
(21, 10, 'var array = [];', 1, 2),
(22, 10, 'var array = new Array();', 1, 2),
(23, 11, 'document', 1, 4),
(24, 11, 'this', 2, -1),
(25, 11, 'html', 2, -4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
