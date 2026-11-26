CREATE TABLE `user` (
  `user_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(320) UNIQUE NOT NULL,
  `password_hash` VARCHAR(60) NOT NULL,
  `user_description` TEXT,
  `birth_date` DATE,
  `is_public` boolean NOT NULL DEFAULT 0,
  `can_review` boolean NOT NULL DEFAULT 1,
  `is_mod` boolean NOT NULL DEFAULT 0,
  `created_in` DATE NOT NULL DEFAULT CURRENT_DATE
);

CREATE TABLE `book` (
  `book_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `ISBN` VARCHAR(13) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `publisher` VARCHAR(100) NOT NULL,
  `genre` SET(
  'Horror', 'Action', 'Adventure', 'Fantasy', 'Science Fiction',
  'Mystery', 'Thriller', 'Crime', 'Romance', 'Drama',
  'Comedy', 'Satire', 'Historical Fiction', 'War', 'Western',
  'Dystopian', 'Young Adult', 'Children', 'Poetry', 'Biography',
  'Autobiography', 'Memoir', 'Non-Fiction', 'Self-Help', 'Philosophy',
  'Psychology', 'Religion', 'Mythology', 'Fairy Tale', 'Folklore',
  'Magical Realism', 'Urban Fantasy', 'Paranormal', 'Steampunk', 'Cyberpunk',
  'Space Opera', 'Graphic Novel', 'Coming of Age', 'Family', 'Legal',
  'Medical', 'Political', 'Espionage', 'Sports', 'Travel',
  'Cooking', 'Art', 'Music', 'Science', 'Technology',
  'Business', 'Education', 'Reference', 'Epic', 'Tragedy') NOT NULL,
  `author` VARCHAR(100) DEFAULT "Desconhecido",
  `book_description` TEXT
);

CREATE TABLE `shelf` (
  `shelf_id` BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `book_id` BIGINT UNSIGNED NOT NULL,
  `feedback` ENUM("LIKE","DISLIKE","NEITHER"),
  `review_title` VARCHAR(100) NOT NULL, 
  `review` TEXT,
  `is_favorite` boolean NOT NULL DEFAULT 0,
  `user_category` VARCHAR(100),
  `reports` BIGINT UNSIGNED NOT NULL DEFAULT 0,
  UNIQUE (`user_id`, `book_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`book_id`) REFERENCES `book`(`book_id`) ON DELETE CASCADE
);
