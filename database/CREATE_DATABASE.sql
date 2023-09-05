CREATE DATABASE `gesuas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE gesuas.people (
	id BIGINT UNSIGNED auto_increment NOT NULL,
	name varchar(100) NOT NULL,
	nis BIGINT UNSIGNED NOT NULL,
	CONSTRAINT people_PK PRIMARY KEY (id),
	CONSTRAINT people_UN UNIQUE KEY (nis)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;