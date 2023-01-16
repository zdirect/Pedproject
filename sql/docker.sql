-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Oct 28, 2022 at 03:40 PM
-- Server version: 5.7.38
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `content`) VALUES
(1, 'student - 0', 'content - 0'),
(2, 'students - 0', 'content - 0'),
(3, 'students - 0', 'content - 0'),
(4, 'students - 0', 'content - 0'),
(5, 'students - 0', 'content - 0'),
(6, 'students - 0', 'content - 0'),
(7, 'students - 0', 'content - 0'),
(8, 'students - 0', 'content - 0'),
(9, 'students - 0', 'content - 0'),
(10, 'students - 1', 'content - 1'),
(11, 'students - 2', 'content - 2'),
(12, 'students - 3', 'content - 3'),
(13, 'students - 4', 'content - 4'),
(15, 'students - 6', 'content - 6'),
(16, 'students - 7', 'content - 7'),
(17, 'students - 0', 'content - 0'),
(18, 'students - 1', 'content - 1'),
(19, 'students - 2', 'content - 2'),
(20, 'students - 3', 'content - 3'),
(21, 'students - 4', 'content - 4'),
(22, 'students - 5', 'content - 5'),
(23, 'students - 6', 'content - 6'),
(24, 'students - 7', 'content - 7'),
(25, 'students - 0', 'content - 0'),
(26, 'students - 1', 'content - 1'),
(27, 'students - 2', 'content - 2'),
(28, 'students - 3', 'content - 3'),
(29, 'students - 4', 'content - 4'),
(30, 'students - 5', 'content - 5'),
(31, 'students - 6', 'content - 6'),
(32, 'students - 7', 'content - 7');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` text,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `gallery_img` text,
  `parent_id` int(11) DEFAULT NULL,
  `menu_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `content`, `img`, `gallery_img`, `parent_id`, `menu_position`) VALUES
(1, NULL, 'text', NULL, '[\"new_red.jpg\"]', 0, 0),
(2, 'name1', 'text', 'main_img.jpg', '[\"new_red.jpg\"]', 0, 0),
(4, 'Oksana2', 'text2', 'main_img.jpg', '[\"new_red.jpg\"]', 0, 0),
(5, 'name1', 'text', 'main_img.jpg', '[\"new_red.jpg\"]', 0, 0),
(7, 'name1', 'text', 'main_img.jpg', '[\"new_red.jpg\"]', 0, 0),
(14, 'teachers - 6', 'content - 6', NULL, NULL, 15, 0),
(15, 'teachers - 7', 'content - 7', NULL, NULL, 16, 0),
(16, 'teachers - 0', 'content - 0', NULL, NULL, 17, 0),
(17, 'teachers - 1', 'content - 1', NULL, NULL, 18, 0),
(18, 'teachers - 2', 'content - 2', NULL, NULL, 19, 0),
(19, 'teachers - 3', 'content - 3', NULL, NULL, 20, 0),
(21, 'teachers - 5', 'content - 5', NULL, NULL, 22, 0),
(22, 'teachers - 6', 'content - 6', NULL, NULL, 23, 0),
(23, 'teachers - 7', 'content - 7', NULL, NULL, 24, 0),
(24, 'teachers - 0', 'content - 0', NULL, NULL, 25, 0),
(25, 'teachers - 1', 'content - 1', NULL, NULL, 26, 0),
(26, 'teachers - 2', 'content - 2', NULL, NULL, 27, 0),
(27, 'teachers - 3', 'content - 3', NULL, NULL, 28, 0),
(28, 'teachers - 4', 'content - 4', NULL, NULL, 29, 0),
(29, 'teachers - 5', 'content - 5', NULL, NULL, 30, 0),
(30, 'teachers - 6', 'content - 6', NULL, NULL, 31, 0),
(31, 'teachers - 7', 'content - 7', NULL, NULL, 32, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
