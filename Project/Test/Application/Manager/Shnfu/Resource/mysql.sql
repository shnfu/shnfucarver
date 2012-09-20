CREATE TABLE user(
	id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	number BIGINT NOT NULL,
);

CREATE TABLE user_info(
	id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id BIGINT NOT NULL,
	name VARCHAR(32) NOT NULL,
	create datetime,
);

CREATE TABLE password(
	id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id BIGINT NOT NULL,
	encrypt_password varchar(64),
	encrypt_type enum('blowfish','md5','sha256','sha512'),
);

CREATE TABLE login_info(
	id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id BIGINT NOT NULL,
	in datetime,
	out datetime,
	ip varchar(16),
);
