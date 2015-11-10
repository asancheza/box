
CREATE database box;

CREATE table users (
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(40) NOT NULL,
	company VARCHAR(40) NOT NULL,
	role VARCHAR(5) NOT NULL,
	PRIMARY KEY (id)
);

CREATE table apps (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE table contents (
	id INT NOT NULL AUTO_INCREMENT,
	app_id INT NOT NULL,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(100),
	type VARCHAR(20) NOT NULL,
	date DATE,
	image_id INT,
	PRIMARY KEY (id)
);

CREATE table images (
	id INT NOT NULL AUTO_INCREMENT,
	content_id INT NOT NULL,
	url VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);

CREATE table content_types (
	id INT NOT NULL AUTO_INCREMENT,
	content_id INT NOT NULL,
	name VARCHAR(100),
	description VARCHAR(255)
	PRIMARY KEY (id)
);