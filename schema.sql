CREATE DATABASE doingsdone
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
	
USE doingsdone;

CREATE TABLE `projects` (
	`id`						int(11) unsigned NOT NULL AUTO_INCREMENT,
	`project_name`		char(255) NOT NULL,
	`user_id`				int(11),
	PRIMARY KEY (`id`),
	UNIQUE KEY `project_name` (`project_name`)
);

CREATE TABLE `users` (
	`id`					int(11) unsigned NOT NULL AUTO_INCREMENT,
	`created_at`		timestamp default current_timestamp NOT NULL,
	`email`				char(255) NOT NULL,
	`user_name`	char(255) NOT NULL,
	`password` 		char(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `email` (`email`),
	UNIQUE KEY `user_name` (`user_name`)
);

CREATE TABLE `tasks` (
	`id`					int(11) unsigned NOT NULL AUTO_INCREMENT,
	`created_at`		timestamp default current_timestamp NOT NULL,
	`completed_at`	timestamp NOT NULL,
	`status`			tinyint(2) default 0,
	`project_id`		int(11),
	`user_id`			int(11),
	`task_name`		char(255) NOT NULL,
	`file_add` 		char(255),
	`deadline`		timestamp,
	PRIMARY KEY (`id`)
);

CREATE UNIQUE INDEX project_name_ind ON projects(project_name);
CREATE UNIQUE INDEX email_ind ON users(email);
CREATE UNIQUE INDEX user_name_ind ON users(user_name);
CREATE UNIQUE INDEX task_name_ind ON tasks(task_name);

CREATE INDEX user_id_ind ON tasks(user_id);
CREATE INDEX project_id_ind ON tasks(project_id);