-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 10:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qaforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `question` longtext NOT NULL,
  `datee` varchar(40) NOT NULL,
  `timee` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `reply` longtext NOT NULL,
  `date` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `middlename` varchar(40) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(12) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `surname`, `email`, `username`, `password`, `gender`, `contact`, `profile_image`, `status`) VALUES
(1, 'stephen', 'kamau', 'makumi', 'makumistephen2014@gmail.com', 'stephen', '47c9ea7a6f6d49700f414afecaa2023b', 'male', 704372166, 'profile_pic_dir/steve.jpg', 'addicted to success'),
(2, 'Owen', 'Beckham', 'Owen', 'owen@gmail.com', 'Hoax', '25f9e794323b453885f5181f1b624d0b', 'male', 713022471, '', ''),
(3, 'Manuel', 'Mugo', 'Manuel', 'machariamanuel@gmail.com', 'Manuel', '6d1e697c92a6b7aa0e991f0fce06dfb1', 'male', 741064111, '', ''),
(4, 'Cathy', 'Wachu', 'Muriithi', 'cathywachu88@gmail.com', 'Cathy', 'c1dd27504509b524911272c3a53b1bc0', 'female', 793556804, '', ''),
(5, 'Ian', 'Noel', 'Muthuri', 'rumplefitch@gmail.com', 'Rum', 'e10adc3949ba59abbe56e057f20f883e', 'male', 701813534, '', ''),
(6, 'Vlad', 'Ule Msee', 'Wenyu lakini wake', 'patjupiter72@gmail.com', 'Kunguni Flani msafi', 'eecf3f6f5c7af21aabdd9ab591783e10', 'male', 729213887, '', ''),
(7, 'Owen', 'Beckham', 'Owen ', 'mirajin@gmail.com', 'Hoax', 'fcea920f7412b5da7be0cf42b8c93759', 'male', 713022471, '', ''),
(8, 'Mzee ', 'Kijana', 'Manu', 'mzeekijana@gmail.com', 'Gukadotcom', '224c1c878dec9c52ea8a8aaaf46a8872', 'male', 741064111, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
