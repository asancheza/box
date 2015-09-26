
CREATE database box;

CREATE table users (
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(40) NOT NULL,
	company VARCHAR(40) NOT NULL,
	role VARCHAR(5) NOT NULL,
	PRIMARY KEY (id)
);