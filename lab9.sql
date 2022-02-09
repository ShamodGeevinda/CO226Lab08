
-- making database and selecting it
DROP DATABASE IF EXISTS lab9;
CREATE DATABASE lab9;
USE lab9;

-- to craete table
CREATE TABLE `vehicle` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50),
	`price` INT,
	PRIMARY KEY (`id`)
);



-- to populate data manually
INSERT INTO vehicle(name, price) VALUES 
("Audi",52642),
("Merecedes", 57127),
("Skoda", 9000),
("Volvo", 29000),
("Bentley", 350000),
("Citroen", 21000),
("Hummer", 41400),
("Volkswagen", 21600);