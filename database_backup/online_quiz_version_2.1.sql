-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 06:05 PM
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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `quesiton_id` int(10) NOT NULL,
  `submitted_answer` varchar(10000) NOT NULL,
  `submission_date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) NOT NULL,
  `additional_comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `mark_submission`
--

CREATE TABLE `mark_submission` (
  `id` int(10) NOT NULL,
  `answer_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `submited_mark` double(5,2) NOT NULL,
  `bonous_or_deduct` double(5,2) DEFAULT 0.00,
  `submitter_username` varchar(100) NOT NULL,
  `additional_comment` varchar(500) NOT NULL,
  `question_id` int(10) NOT NULL,
  `submission_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) NOT NULL,
  `problemStatement` varchar(5000) NOT NULL,
  `expectedOutput` varchar(5000) NOT NULL,
  `lastSubmissionDate` datetime NOT NULL,
  `creator` varchar(100) NOT NULL,
  `totalMarks` double(5,2) NOT NULL DEFAULT 10.00,
  `difficultyLevel` varchar(50) NOT NULL DEFAULT '"easy"',
  `isDateExtended` tinyint(10) NOT NULL DEFAULT 0,
  `newSubmissionDate` datetime DEFAULT NULL,
  `isMarkDeduct` tinyint(10) NOT NULL DEFAULT 0,
  `markDeductMultiplier` double(5,2) NOT NULL DEFAULT 1.00,
  `hints` varchar(500) NOT NULL,
  `Instructions` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_comments`
--

CREATE TABLE `question_comments` (
  `id` int(11) NOT NULL,
  `quesion_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supported_languages`
--

CREATE TABLE `supported_languages` (
  `id` int(10) NOT NULL,
  `language` varchar(100) NOT NULL,
  `question_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answer_contraits` (`quesiton_id`),
  ADD KEY `answers_username_contrainsts` (`username`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `auth_tokens_table_foreign_key_constraints` (`username`);

--
-- Indexes for table `mark_submission`
--
ALTER TABLE `mark_submission`
  ADD KEY `user_marksumisio` (`username`),
  ADD KEY `user_submiitedBy_from_answer` (`submitter_username`),
  ADD KEY `answer_id_contrainst` (`answer_id`),
  ADD KEY `quesiton_id_contraints` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_creator_users_foreignkey_constraints` (`creator`);

--
-- Indexes for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quesiton_comments_username_user_foreign_key_constrants` (`username`),
  ADD KEY `question_question_comment_foreign_key_constraints` (`quesion_id`);

--
-- Indexes for table `supported_languages`
--
ALTER TABLE `supported_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supported_language_quesitons` (`question_id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_comments`
--
ALTER TABLE `question_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supported_languages`
--
ALTER TABLE `supported_languages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_username_contrainsts` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_answer_contraits` FOREIGN KEY (`quesiton_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_table_foreign_key_constraints` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mark_submission`
--
ALTER TABLE `mark_submission`
  ADD CONSTRAINT `answer_id_contrainst` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quesiton_id_contraints` FOREIGN KEY (`question_id`) REFERENCES `answers` (`quesiton_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_marksumisio` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_submiitedBy_from_answer` FOREIGN KEY (`submitter_username`) REFERENCES `answers` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_creator_users_foreignkey_constraints` FOREIGN KEY (`creator`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD CONSTRAINT `quesiton_comments_username_user_foreign_key_constrants` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_question_comment_foreign_key_constraints` FOREIGN KEY (`quesion_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supported_languages`
--
ALTER TABLE `supported_languages`
  ADD CONSTRAINT `supported_language_quesitons` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
