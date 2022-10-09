CREATE DATABASE IF NOT EXISTS devwebcamp;

USE devwebcamp;

CREATE TABLE IF NOT EXISTS users (
	id INT(11) AUTO_INCREMENT,
	first_name VARCHAR(40) NOT NULL,
	last_name VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	password CHAR(60) NOT NULL,
	token CHAR(13) DEFAULT NULL,
	is_confirmed TINYINT(1) NOT NULL DEFAULT 0,
	is_admin TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
);

INSERT INTO users (
	first_name,
	last_name,
	email,
	password,
	is_confirmed,
	is_admin
) VALUES (
	'Ángel',
	'Cruz',
	'admin@test.com',
	'$2y$10$yGtTR.0evE/4AgIiun/u1eTGJBfnTgDU7MlrZLAMmXkANsYxzSpEG',
	1,
	1
), (
	'Luis',
	'Lara',
	'client@test.com',
	'$2y$10$yGtTR.0evE/4AgIiun/u1eTGJBfnTgDU7MlrZLAMmXkANsYxzSpEG',
	1,
	0
);

CREATE TABLE IF NOT EXISTS speakers (
	id INT(11) AUTO_INCREMENT,
	first_name VARCHAR(40) NOT NULL,
	last_name VARCHAR(40) NOT NULL,
	city VARCHAR(40),
	country VARCHAR(20),
	image VARCHAR(32),
	tags VARCHAR(120),
	social_networks TEXT,
	PRIMARY KEY (id)
);
