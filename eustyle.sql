-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 11:33 AM
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
  `img_src` varchar(1024) DEFAULT NULL,
  `content` varchar(2048) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desig` varchar(200) NOT NULL DEFAULT ' ',
  `rating` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `img_src`, `content`, `name`, `desig`, `rating`) VALUES
(15, NULL, 'I’m really satisfied with EUSTYLE INTERIORS. We wanted someone who could understand the requirements and would design something which would meet our expectations, so we got our kitchen and master bedroom got redesigned to the latest amenities. Being a housewife, kitchen is women\'s second most preferred home, and thanks to EUSTYLE they have redesigned the kitchen to comfort level with complete setup engraved/concealed refrigerator, oven and modernized stove and chimney setup.\r\nAnd bedroom - the space is properly utilized, great design of bed and bed-back with attached tables. Organized wardrobe.', 'Vijay', ' ', 5),
(16, NULL, 'It was an absolute pleasure working with \'EUSTYLE\'. Archana was very professional and great to work with! She understands all our requirements & needs. All her work exceeded my expectations. The design\'s shared were very helpful for us to imagine how the outcome will look like, all the design are very unique and innovative.  Even the suggestion given by her to make our living room utilization in more useful way.  \r\nAll the design execution monitored and handled by Abhishek so that everything finishes on time as per the design, working with him is such a pleasure, all work done very smoothly and he made sure nothing is going off the bit.\r\nI highly recommend them for any Architectural work.\r\n', 'Pooja', ' ', 5),
(18, NULL, 'I moved recently and was starting over from scratch. I wanted my new place to feel like home - a very well styled home. I chose to go for EUSTYLE. It was easy (and fun!) to choose a designer that matched my style and EUSTYLE made everything possible.  From there I submitted my requirements, inspiration pics, budget and we were off!\r\nIt was so fun seeing the ideas come to life and my designer, Archana knocked it out of the park! I was seriously blown away at how she listened to what I said, added her expertise to it and came back with a beautiful design. I can’t wait or show off my new space!', 'Yashraj', ' ', 5),
(19, NULL, 'Recently relocated to Bangalore and we had purchased a new flat but unfurnished, from one of my friends found contact of EUSTYLE and got in touch with Abhishek the point of contact who indeed gave us the brief outlook as per our budget and space. We virtually connected with the architect Archana who suggested few of models for the living room and tv unit and showcase. Overall, we were satisfied with the designs and the service by eustyle.', 'Kranti', ' ', 5),
(20, NULL, 'I wanted to organize my office as it\'s a startup and we have tight budget and we have a staff of 22 and we wanted some desks which would be used by all and should have multi-purpose uses, tables like the ones used in corporate offices.\r\nThanks to eustyle we are pretty happy with the service.\r\n', 'Sourabh', ' ', 5),
(21, NULL, 'Thank you for assistance that you provided in designing the rooms. The work done by you and your team is nice.', 'Rashmi', ' ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `short_descr` text DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `short_descr`, `category`) VALUES
(4, 'Dileep', 'Interior design for Mr. Dileep', 'Architecture, CGI'),
(5, 'Pooja', 'Interior design for Pooja', 'Architecture, CGI'),
(6, 'Yashraj', 'Interior design for Pooja', 'Residential, Design');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) NOT NULL,
  `portfolio_id` int(11) NOT NULL,
  `img_src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `img_src`) VALUES
(2, 4, 'dileep1.jpg'),
(6, 4, 'dileep2.jpg'),
(7, 4, 'dileep3.jpg'),
(8, 5, 'pooja1.jpg'),
(9, 5, 'pooja2.jpg'),
(10, 5, 'pooja3.jpg'),
(11, 6, 'yashraj1.jpg'),
(12, 6, 'yashraj2.jpg'),
(13, 6, 'yashraj3.jpg');

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
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
