CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(64) NOT NULL,
	`user_type` INT(4) DEFAULT '0',
	`created_at` datetime  default current_timestamp,
	`updated_at` timestamp default current_timestamp on update current_timestamp,
	PRIMARY KEY (`id`)
);

CREATE TABLE `posts` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) DEFAULT 'no title',
	`body` VARCHAR(1024) NOT NULL,
	`image` MEDIUMBLOB,
	`created_at` datetime  default current_timestamp,
	`updated_at` timestamp default current_timestamp on update current_timestamp,
	PRIMARY KEY (`id`)
);