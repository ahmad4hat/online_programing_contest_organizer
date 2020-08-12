<?php

$user_table_creation = "
CREATE TABLE `online_quiz`.`users` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `user_type` VARCHAR(100) NOT NULL , `address` VARCHAR(250) NOT NULL , `bio` VARCHAR(500) NOT NULL , `dob` VARCHAR(100) NOT NULL , `password` VARCHAR(250) NOT NULL , `educational_qualification` VARCHAR(100) NOT NULL , `mobile` VARCHAR(100) NOT NULL , `profile_picuture_location` VARCHAR(500) NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `occupation` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB;
";

$user_table_decription_fixs1 = "
ALTER TABLE `users` CHANGE `profile_picuture_location` `profile_picture_location` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
";


$auth_tokens = "
CREATE TABLE `online_quiz`.`auth_tokens` ( `token` VARCHAR(500) NOT NULL , `username` VARCHAR(100) NOT NULL , `expiry_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`token`)) ENGINE = InnoDB;
";

$aut_token_and_user_table_contraints = "
ALTER TABLE `auth_tokens` ADD CONSTRAINT `auth_tokens_table_foreign_key_constraints` FOREIGN KEY (`username`) REFERENCES `users`(`username`) ON DELETE CASCADE ON UPDATE CASCADE;
";


// $question_table = "
// CREATE TABLE `online_quiz`.`questions` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `problemStatement` VARCHAR(5000) NOT NULL , `expectedOutput` VARCHAR(5000) NOT NULL , `lastSubmissionDate` DATETIME NOT NULL , `creator` VARCHAR(100) NOT NULL , `totalMarks` DOUBLE(100) NOT NULL DEFAULT '10.0' , `difficultyLevel` VARCHAR(50) NOT NULL DEFAULT 'easy' , `isDateExtended` TINYINT(10) NOT NULL DEFAULT '0' , `newSubmissionDate` DATETIME NULL , `isMarkDeduct` TINYINT(10) NOT NULL DEFAULT '0' , `markDeductMultiplier` DOUBLE(10) NOT NULL DEFAULT '1.0' , `hints` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
// ";

$question_table_fixed = "
CREATE TABLE `online_quiz`.`questions` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `problemStatement` VARCHAR(5000) NOT NULL , `expectedOutput` VARCHAR(5000) NOT NULL , `lastSubmissionDate` DATETIME NOT NULL , `creator` VARCHAR(100) NOT NULL , `totalMarks` DOUBLE(5,2) NOT NULL DEFAULT '10.00' , `difficultyLevel` VARCHAR(50) NOT NULL DEFAULT '\"easy\"' , `isDateExtended` TINYINT(10) NOT NULL DEFAULT '0' , `newSubmissionDate` DATETIME NULL , `isMarkDeduct` TINYINT(10) NOT NULL DEFAULT '0' , `markDeductMultiplier` DOUBLE(5,2) NOT NULL DEFAULT '1.0' , `hints` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `questions` ADD `Instructions` VARCHAR(1000) NOT NULL AFTER `hints`;

";

$questions_creator_users_foreignkey_constraints = "
ALTER TABLE `questions` ADD CONSTRAINT `questions_creator_users_foreignkey_constraints` FOREIGN KEY (`creator`) REFERENCES `users`(`username`) ON DELETE CASCADE ON UPDATE CASCADE;
";

$quiz_comments = "
CREATE TABLE `online_quiz`.`question_comments` ( `id` INT NOT NULL AUTO_INCREMENT , `quesion_id` INT NOT NULL , `username` VARCHAR(100) NOT NULL , `comment` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
";
$quesiton_comments_username_user_foreign_key_constrants = "
ALTER TABLE `question_comments` ADD CONSTRAINT `quesiton_comments_username_user_foreign_key_constrants` FOREIGN KEY (`username`) REFERENCES `users`(`username`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `question_comments` ADD CONSTRAINT `question_question_comment_foreign_key_constraints` FOREIGN KEY (`quesion_id`) REFERENCES `questions`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

";
