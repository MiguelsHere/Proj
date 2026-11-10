CREATE TABLE `user` (
  `user_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_name` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(320) UNIQUE NOT NULL
  `password_hash` VARCHAR(60) NOT NULL,
  `user_description` TEXT,
  `birth_date` DATE,
  `is_mod` boolean DEFAULT 0,
);

CREATE TABLE `book` (
  `book_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `ISBN` VARCHAR(13) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `publisher` VARCHAR(100) NOT NULL,
  `genre` set('Horror', 'Action', 'Adventure') NOT NULL,
  `author` VARCHAR(100) DEFAULT "Desconhecido",
  `book_description` TEXT
);

CREATE TABLE `user_shelf` (
  `user_shelf_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `book_id` BIGINT UNSIGNED NOT NULL,
  UNIQUE (`user_id`, `bookstore_id`),
  `user_feedback` ENUM('liked','disliked','neither') NOT NULL DEFAULT 'neither',
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`book_id`) REFERENCES `workout`(`book_id`) ON DELETE CASCADE
);

CREATE TABLE `bookstore`(
  `bookstore_id`  BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `bookstore_name` VARCHAR(100) NOT NULL,
  `bookstore_description` TEXT,
  `bookstore_address` VARCHAR(200) NOT NULL,
);

CREATE TABLE `bookstore_shelf` (
  `bookstore_shelf_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `bookstore_id` BIGINT UNSIGNED NOT NULL,
  `book_id` BIGINT UNSIGNED NOT NULL,
  UNIQUE (`user_id`, `bookstore_id`),
  `book_price` decimal(6,2) NOT NULL,
  FOREIGN KEY (`bookstore_id`) REFERENCES `bookstore`(`bookstore_id`) ON DELETE CASCADE,
  FOREIGN KEY (`book_id`) REFERENCES `workout`(`book_id`) ON DELETE CASCADE
);
