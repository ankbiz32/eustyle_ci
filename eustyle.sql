-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 01:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eustyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `img_src` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(2048) DEFAULT NULL,
  `message` varchar(2048) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `img_src` varchar(1024) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desig` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `short_descr` text DEFAULT NULL,
  `img_src` varchar(200) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `short_descr`, `img_src`, `category`) VALUES
(4, 'Stone House', 'Stone House is a digital platform that provides university students with personalized learning pathways', 'work1.jpg', 'Architecture, CGI'),
(5, 'Single House', 'Discover how we helped them scale up from local to global.', 'work2.jpg', 'Architecture, CGI'),
(6, 'Cube Vilas, Poland', 'Discover how we helped CleanCloud to increase their presence on a global market by their scaling up its visual identity and building a flexible style guide for their future product elaboration.', 'work3.jpg', 'Residential, Design');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active',
  `role` varchar(15) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pwd`, `fname`, `lname`, `email`, `status`, `role`) VALUES
(1, 'admin_eustyle', '$2y$10$UO51FEmyFx6MxpI6b3TFWeTukAUxgIS0MW9lV2GDak.Xga.ZkQ1sC', 'Eustyle', 'Admin', 'archana.chinagi@gmail.com', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `webprofile`
--

CREATE TABLE `webprofile` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `whatsapp_no` varchar(50) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `fblink` varchar(50) DEFAULT NULL,
  `linkedinlink` varchar(100) DEFAULT NULL,
  `instalink` varchar(50) DEFAULT NULL,
  `youtubelink` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webprofile`
--

INSERT INTO `webprofile` (`id`, `email`, `phone1`, `phone2`, `whatsapp_no`, `address_line1`, `address_line2`, `fblink`, `linkedinlink`, `instalink`, `youtubelink`) VALUES
(1, 'archana.chinagi@gmail.com', '9590688265', '9972083015', '9972083015', '', '', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://instagram.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `webprofile`
--
ALTER TABLE `webprofile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `webprofile`
--
ALTER TABLE `webprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
