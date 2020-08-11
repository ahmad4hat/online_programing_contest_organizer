<?php

$user_table_creation = "
CREATE TABLE `online_quiz`.`users` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `user_type` VARCHAR(100) NOT NULL , `address` VARCHAR(250) NOT NULL , `bio` VARCHAR(500) NOT NULL , `dob` VARCHAR(100) NOT NULL , `password` VARCHAR(250) NOT NULL , `educational_qualification` VARCHAR(100) NOT NULL , `mobile` VARCHAR(100) NOT NULL , `profile_picuture_location` VARCHAR(500) NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `occupation` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`)) ENGINE = InnoDB;
";


$auth_tokens = "
CREATE TABLE `online_quiz`.`auth_tokens` ( `token` VARCHAR(500) NOT NULL , `username` VARCHAR(100) NOT NULL , `expiry_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`token`)) ENGINE = InnoDB;
";
