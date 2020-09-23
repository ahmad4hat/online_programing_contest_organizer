-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 07:24 PM
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
  `question_id` int(10) NOT NULL,
  `submittedAnswer` varchar(10000) NOT NULL,
  `submissionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `submittedAnswer`, `submissionDate`, `username`) VALUES
(1, 1, 'answer is this', '2020-09-23 15:11:43', 'ahmad2'),
(2, 1, 'what is going on ', '2020-09-23 22:37:53', 'ahmad2');

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
('token_5f6a10f1546d92.98830348', 'ahmad', '1600793873'),
('token_5f6a171d36f057.78397856', 'ahmad', '1600795453'),
('token_5f6a2fa45fa163.71825681', 'ahmad', '1600801732'),
('token_5f6a3917cd6543.09718120', 'ahmad', '1600804151'),
('token_5f6a5abbbf44e3.14838568', 'ahmad', '1600812763'),
('token_5f6a710175d3c8.90859459', 'ahmad', '1600818465'),
('token_5f6aa9b35d89c1.39716526', 'ahmad', '1600832979'),
('token_5f6b1ba34557d2.26738082', 'ahmad', '1600862147'),
('token_5f6b3b2c021c62.34879133', 'ahmad', '1600870220'),
('token_5f6b5779cb19c6.76928624', 'ahmad', '1600877465'),
('token_5f6b7e16e9e193.20293706', 'ahmad', '1600887350');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(100) NOT NULL,
  `answer_id` int(100) NOT NULL,
  `username_teacher` varchar(250) NOT NULL,
  `mark` int(5) NOT NULL,
  `username_participant` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `answer_id`, `username_teacher`, `mark`, `username_participant`) VALUES
(3, 1, 'ahmad', 7, 'ahmad2'),
(4, 2, 'ahmad', 7, 'ahmad2');

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
  `totalMark` int(5) NOT NULL DEFAULT 10,
  `difficulty` varchar(50) NOT NULL DEFAULT 'easy',
  `hints` varchar(500) NOT NULL,
  `instructions` varchar(1000) NOT NULL,
  `supported_language` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `problemStatement`, `expectedOutput`, `lastSubmissionDate`, `creator`, `totalMark`, `difficulty`, `hints`, `instructions`, `supported_language`) VALUES
(1, 'find the minimum path', '2 is the minnimum path', '2020-09-24 00:00:00', 'ahmad', 20, 'easy', 'no hints', 'find the minimum circule', 'php'),
(2, 'find the minimum path 2nd', '2 is the minnimum path 2nd', '2020-09-24 00:00:00', 'ahmad', 22, 'easy', 'no hints', 'find the minimum circule', 'php , c#'),
(3, 'find the minimum path 2nd', '2 is the minnimum path 2nd', '2020-09-24 00:00:00', 'ahmad', 22, 'hard', 'no hints', 'find the minimum circule', 'php , c#'),
(4, 'problem test 12345123', 'hello ', '2020-10-02 00:00:00', 'ahmad', 50, 'hard', 'hello', 'whats up', 'what is going on'),
(5, 'problem test 12345123', 'hello ', '2020-10-02 00:00:00', 'ahmad', 50, 'hard', 'hello', 'whats up', 'what is going on'),
(6, 'test 1 2 3 fjafja ffff', 'ddfsa fdfafds', '2020-09-30 00:00:00', 'ahmad', 70, 'easy', 'hello hello ', 'what is going on', 'php'),
(7, 'fdsasdfdfds fsdafsdafds f', 'fdfsfsaff ', '2020-09-29 00:00:00', 'ahmad', 23, 'hard', 'fdsaf ', 'dfsffsad', 'fdsaf');

-- --------------------------------------------------------

--
-- Table structure for table `question_comments`
--

CREATE TABLE `question_comments` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_comments`
--

INSERT INTO `question_comments` (`id`, `question_id`, `username`, `comment`) VALUES
(1, 4, 'ahmad', 'dfsfsda'),
(2, 4, 'ahmad', 'another one'),
(3, 1, 'ahmad2', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_mark`
--

CREATE TABLE `ratings_mark` (
  `id` int(100) NOT NULL,
  `mark_id` int(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `raings` double(5,2) NOT NULL,
  `additional_comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings_question`
--

CREATE TABLE `ratings_question` (
  `id` int(100) NOT NULL,
  `question_id` int(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `rating` double(5,2) NOT NULL,
  `additional_comment` varchar(500) NOT NULL
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
(5, 'ahmad', 'Ahmad Farhat', 'ahmad@gamil.com', 'teacher', 'hscsas', 'hello whats up ', '709336800', '123456', 'sscOrSameLevel', '01677958475', '../upload/profile_picture/ahmad.png', '2020-09-22 20:42:38', 'dsad'),
(6, 'ahmad2', 'ahmad', 'ahmad@gamil.com', 'participant', 'adasasd', 'hello', '897256800', '123456', 'sscOrSameLevel', '01677952867', '../upload/profile_picture/ahmad2.png', '2020-09-23 06:51:58', 'dsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answer_contraits` (`question_id`),
  ADD KEY `answers_username_contrainsts` (`username`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `auth_tokens_table_foreign_key_constraints` (`username`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_giver_user_name` (`username_teacher`),
  ADD KEY `answersda` (`answer_id`),
  ADD KEY `participant_mark` (`username_participant`);

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
  ADD KEY `question_question_comment_foreign_key_constraints` (`question_id`);

--
-- Indexes for table `ratings_mark`
--
ALTER TABLE `ratings_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_rating_id` (`mark_id`),
  ADD KEY `username_connection` (`username`);

--
-- Indexes for table `ratings_question`
--
ALTER TABLE `ratings_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quesiton_and_rating_contraints` (`question_id`),
  ADD KEY `quesiton_raing_username` (`username`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_comments`
--
ALTER TABLE `question_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings_mark`
--
ALTER TABLE `ratings_mark`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings_question`
--
ALTER TABLE `ratings_question`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_username_contrainsts` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_answer_contraits` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_table_foreign_key_constraints` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `answersda` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mark_giver_user_name` FOREIGN KEY (`username_teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_mark` FOREIGN KEY (`username_participant`) REFERENCES `users` (`username`);

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
  ADD CONSTRAINT `question_question_comment_foreign_key_constraints` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings_mark`
--
ALTER TABLE `ratings_mark`
  ADD CONSTRAINT `mark_rating_id` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`),
  ADD CONSTRAINT `username_connection` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings_question`
--
ALTER TABLE `ratings_question`
  ADD CONSTRAINT `quesiton_and_rating_contraints` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quesiton_raing_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
