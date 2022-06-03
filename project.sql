-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 06:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `hashed_password`) VALUES
(1, 'admin', '$2y$10$Ln.gg6t9JxRJ2IOmYBN74.Xateq.hOICxeuVRQyxzAQVdNUd/pJNu'),
(6, 'test', '$2y$10$vk9w2AsMhAwvA59QTCWtw.g7juB40w4IL/2LhU2zeiQfKCsrSwpym');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `visible` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(1, 1, 'Our mission', 1, 'Yes', 'Our mission has always been ....'),
(6, 1, 'Our History', 2, 'Yes', 'Founded in 1898 in two bla bla..			'),
(7, 5, 'Large Widgets', 1, 'Yes', 'Our large widget is this bla blala....		'),
(8, 5, 'Small Widgets', 2, 'Yes', 'Orur small widget is this and bla bla..'),
(9, 7, 'Retrofitting', 1, 'Yes', 'We love to replace widgets..'),
(12, 6, 'to be deleted', 1, 'Yes', 'trial trster							');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `visible` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'About Widget Corp', 1, 'Yes'),
(5, 'Products', 2, 'Yes'),
(6, 'Trial', 4, 'No'),
(7, 'Services', 3, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
