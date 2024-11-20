CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NULL DEFAULT NULL  ,
	`user_pass` VARCHAR(255) NULL DEFAULT NULL  ,
	`email` VARCHAR(100) NULL DEFAULT NULL  ,
	`date_created` TIMESTAMP NULL DEFAULT NULL,
	`is_admin` INT(10) NULL DEFAULT '0',
	`phone` VARCHAR(15) NULL DEFAULT NULL  ,
	`address` TEXT NULL DEFAULT NULL  ,
	`full_name` VARCHAR(255) NULL DEFAULT NULL ,
	`account_status` INT(10) NULL DEFAULT '1',
	PRIMARY KEY (`id`)
);

CREATE TABLE `packages` (
	`package_id` INT(10) NOT NULL AUTO_INCREMENT,
	`package_name` VARCHAR(255) NULL DEFAULT NULL,
	`package_rating` FLOAT NULL DEFAULT NULL,
	`package_desc` TEXT NULL DEFAULT NULL,
	`package_start` DATE NULL DEFAULT NULL,
	`package_end` DATE NULL DEFAULT NULL,
	`package_price` INT(10) NULL DEFAULT NULL,
	`package_location` VARCHAR(255) NULL DEFAULT NULL,
	`is_hotel` INT(10) NULL DEFAULT '0',
	`is_transport` INT(10) NULL DEFAULT '0',
	`is_food` INT(10) NULL DEFAULT '0',
	`is_guide` INT(10) NULL DEFAULT '0',
	`package_capacity` INT(10) NULL DEFAULT '0',
	`package_booked` INT(10) UNSIGNED NULL DEFAULT '0',
	`no_of_people` INT(10) NOT NULL DEFAULT '1',
	`map_loc` TEXT NULL DEFAULT NULL,
	`master_image` TEXT NULL DEFAULT NULL,
	`extra_image_1` TEXT NULL DEFAULT NULL,
	`extra_image_2` TEXT NULL DEFAULT NULL,
	`is_exclusive` BOOLEAN DEFAULT FALSE,
	`keywords` TEXT NULL DEFAULT NULL,
	PRIMARY KEY (`package_id`)
)
;


CREATE TABLE `transactions` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`trans_id` VARCHAR(255) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL,
	`package_id` INT(10) NULL DEFAULT NULL,
	`trans_amount` INT(10) NULL DEFAULT NULL,
	`trans_date` TIMESTAMP NULL DEFAULT NULL,
	`card_no` VARCHAR(255) NULL DEFAULT NULL,
	`val_id` VARCHAR(255) NULL DEFAULT NULL,
	`card_type` VARCHAR(255) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)  ON DELETE SET NULL,
	FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE SET NULL
)
;

CREATE TABLE testimonials(
	id INT PRIMARY KEY AUTO_INCREMENT,
	message TEXT,
	user_id INT,
	package_id INT,
	rating FLOAT,
	date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
	FOREIGN KEY (package_id) REFERENCES packages(package_id) ON DELETE SET NULL
);

CREATE TABLE blogs (
    id INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image TEXT NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
    author VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
