-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 01:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(8) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_desc` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_desc`, `created`) VALUES
(1, 'C++', 'c++ is very awesome language and it is fast as compared to others. For competitive programming it is the best and first choice for then coders. ', '2021-02-07 18:57:45'),
(2, 'Python', 'python is beginner friendly and easy to learn, it is mostly used for machine learning and data science although it is useful for web development through django, flask framework.', '2021-02-07 18:59:26'),
(3, 'Java', 'Java is very popular and widely used language in the enterprises. It is Purely(99%) Object Oriented Programming language.', '2021-02-08 21:35:53'),
(4, 'JavaScript', 'JavaScript is very popular language for web development and it has various framework like node.js, react.js, express.js, which make the JavaScript more powerful.', '2021-02-09 20:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(7) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(7) NOT NULL,
  `comment_time` datetime DEFAULT current_timestamp(),
  `comment_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES
(1, 'It is standard library template which has inbuilt data structure library which save alot of time.', 2, '2021-02-10 17:47:10', '1'),
(2, 'Reinstall the python.', 4, '2021-02-10 18:11:40', '2'),
(3, 'what ur problem explain lil bit more.', 4, '2021-02-10 18:12:06', '3'),
(9, 'gh', 4, '2021-02-10 18:17:02', '2'),
(10, 'See previous comment.', 2, '2021-02-10 18:23:05', '2'),
(11, 'It is very useful for competetive programming.', 2, '2021-03-20 17:34:16', '1'),
(12, 'It is very useful for competetive programming.', 2, '2021-03-20 17:34:25', '2'),
(13, 'In a game development', 10, '2021-03-24 20:36:47', '1'),
(14, 'In the making of operating system.', 10, '2021-03-24 20:37:04', '2'),
(15, 'In the making of new programming language', 10, '2021-03-24 20:39:39', '3'),
(16, 'In the making of new programming language', 10, '2021-03-24 20:39:45', '1'),
(30, 'c++ is advanced and with enhanced features have', 15, '2021-03-24 21:35:48', '11');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cate_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cate_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio', 'I am unable to install pyaudio in my system and this will create a big mess for me because a important project is hold on and I have to finish it as soon as possible.', 2, 2, '2021-02-09 00:00:00'),
(2, 'What is STL?', 'Somebody please tell me what is STL in C++ I hear from someone that it is one the most popular library in C++.', 1, 1, '2021-02-09 21:53:02'),
(3, 'How to install JDBC', 'I Want to install JDBC in my system can somebody please guide me how to do that as I was find a bit difficult to do that.', 3, 3, '2021-02-10 17:21:09'),
(4, 'PIP error', 'I was facing problem while installing packages through pip.', 2, 1, '2021-02-10 17:25:20'),
(6, 'Problem in pycharm', 'Pycharm terminal was not working.', 2, 3, '2021-02-10 17:31:14'),
(9, 'What is new ver. of c++?', 'can you tell me what is the newer  version of c++ which is being currently used by the programmer?', 1, 2, '2021-03-24 20:34:24'),
(10, 'where we can use c++?', 'I am curious about to know, where we can use this powerful programming language?', 1, 2, '2021-03-24 20:36:23'),
(13, 'best IDE for js?', 'can somebody tell best IDE for the javascript for the development', 4, 2, '2021-03-24 21:00:54'),
(15, 'c vc c++', 'what is the difference between c and c++?', 1, 11, '2021-03-24 21:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'Akwabi', '123', '2021-03-23 12:15:49'),
(2, 'Jasin', '$2y$10$Vm/HeC.gBuBVjxkyJKFswOSA3I48EK9oE2dD68RGdz4ESZ9Jy27hG', '2021-09-23 12:42:45'),
(3, 'Grace', '$2y$10$dCEVfVXcBqR946BLhTgtR.vLK1.BAyA3zmMabVY0hHWXBHcDfw8Ga', '2021-09-23 12:48:19'),
(11, 'Orlando', '123', '2021-03-24 21:37:43'),
(13, 'Prudence', '$2y$10$pruuYfE6SyyhK5F9D6EvPeIiJjq6xnO133Xqx.QcYGaCSeAywM7k2', '2021-09-25 15:21:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
