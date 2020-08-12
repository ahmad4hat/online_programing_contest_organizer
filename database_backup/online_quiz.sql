-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 10:11 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `token` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `expiry_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`token`, `username`, `expiry_date`) VALUES
('token_5f32ba88a4d179.35001041', 'ahmad', '1597167272'),
('token_5f3383048cfd44.30127560', 'tester2', '1597218596');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `educational_qualification` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `profile_picture_location` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `user_type`, `address`, `bio`, `dob`, `password`, `educational_qualification`, `mobile`, `profile_picture_location`, `created_at`, `occupation`) VALUES
(1, 'ahmad', 'ahmad', 'ahmad@gamil.com', 'participant,questionCreator,judge', 'dhaka', 'Hello I am ahmad', '932940000', '123456', 'sscOrSameLevel', '+8801677952867', 'upload/profile_picture/ahmad.png', '2020-08-11 21:34:32', 'Student'),
(2, 'tester2', 'tester2', 'tester2@gmail.com', 'participant,questionCreator,judge', 'test', 'i am a tester', '1024437600', '123456', 'sscOrSameLevel', '01677899', 'upload/profile_picture/tester2.png', '2020-08-12 11:45:28', 'tester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
