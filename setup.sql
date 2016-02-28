CREATE DATABASE BH;
USE BH;
CREATE TABLE account (
	account_id INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
	first_name VARCHAR(15),
	middle_name VARCHAR(15),
	last_name VARCHAR(15),
	username VARCHAR(15) UNIQUE,
	password VARCHAR(15),
	position VARCHAR(15)
);

CREATE TABLE report(
	report_id INT NOT NULL AUTO_INCREMENT,
	idNumber INT NOT NULL,
	name VARCHAR(30),
	symptoms VARCHAR(255),
	urgency  INT,
	repName VARCHAR(32),
	contact VARCHAR(32),
	relation VARCHAR(32),
	repStatus VARCHAR(32),
	description TEXT(250),
	PRIMARY KEY (report_id,idNumber),
	FOREIGN KEY (idNumber) REFERENCES student(idNumber)
);

CREATE TABLE student(
	idNumber INT NOT NULL PRIMARY KEY,
	name VARCHAR(50)
);

INSERT INTO student (idNumber,name) VALUES (103864,'Joel Torrijos');
INSERT INTO student (idNumber,name) VALUES (123500,'Buhawi Jack');
insert into account (account_id, username,password) values (1,'dev','pass');