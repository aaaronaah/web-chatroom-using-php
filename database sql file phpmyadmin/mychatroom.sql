-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 04:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `sr_no` int(11) NOT NULL,
  `msg` text NOT NULL,
  `room` text NOT NULL,
  `ip` text NOT NULL,
  `starttime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`sr_no`, `msg`, `room`, `ip`, `starttime`) VALUES
(1, 'this', 'room', '123', '2020-03-09 19:38:11'),
(2, 'hi mee here', 'chating3', '::1', '2020-03-09 19:45:26'),
(3, 'hi mee here', 'chating3', '::1', '2020-03-09 19:47:55'),
(4, 'hi mee here', 'chating3', '::1', '2020-03-09 19:47:57'),
(5, 'how are you ', 'chating3', '::1', '2020-03-09 19:48:15'),
(6, 'test submit button ', 'chating3', '::1', '2020-03-09 19:52:03'),
(7, 'thi is meeee', 'chating3', '::1', '2020-03-09 19:54:52'),
(8, 'hello', 'chating3', '::1', '2020-03-09 20:22:02'),
(9, 'hiii', 'chating3', '::1', '2020-03-09 20:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `sr_no` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `starttime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`sr_no`, `roomname`, `starttime`) VALUES
(1, 'haary1', '2020-03-09 18:02:19'),
(2, 'chatting', '2020-03-09 18:28:42'),
(3, 'chatting1', '2020-03-09 18:30:24'),
(4, 'chatting2', '2020-03-09 18:34:08'),
(5, 'chating3', '2020-03-09 18:37:39'),
(6, 'myroom', '2020-03-20 13:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
