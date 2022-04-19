-- Init database.
CREATE DATABASE IF NOT EXISTS online_library;

USE online_library;

-- Drop tables.
DROP TABLE IF EXISTS
    books,
    users,
    user_favourites,
    reviews,
    recommendations;

-- Create tables.
CREATE TABLE books
(
    id          INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title       VARCHAR(100) NOT NULL,
    author      VARCHAR(100) NOT NULL,
    description VARCHAR(400) DEFAULT '',
    image_url   VARCHAR(100) NOT NULL,
    views       INT          DEFAULT 0
);

CREATE TABLE users
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(100) NOT NULL,
    password  VARCHAR(100) NOT NULL,
    image_url VARCHAR(100) NOT NULL
);

CREATE TABLE user_favourites
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE
);

CREATE TABLE reviews
(
    id         INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id    INT          NOT NULL,
    book_id    INT          NOT NULL,
    rating     INT          NOT NULL,
    text       VARCHAR(100) NOT NULL,
    updated_at timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE
);

CREATE TABLE recommendations
(
    id         INT       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id    INT       NOT NULL,
    book_id    INT       NOT NULL,
    rating     DECIMAL   NOT NULL,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE
);

-- Populate tables.
INSERT INTO books (title, author, description, image_url, views)
VALUES ("1984",
        "George Orwell",
        "Nineteen Eighty-Four is a dystopian social science fiction novel and cautionary tale written by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell's ninth and final book completed in his lifetime.",
        "https://mir-s3-cdn-cf.behance.net/project_modules/disp/8bc21955316461.59b89b39bc96d.jpg",
        12),
       ("Fahrenheit 451",
        "Ray Bradbury",
        "In a terrifying care-free future, a young man, Guy Montag, whose job as a fireman is to burn all books, questions his actions after meeting a young woman - and begins to rebel against society.",
        "https://upload.wikimedia.org/wikipedia/en/d/db/Fahrenheit_451_1st_ed_cover.jpg",
        107);

INSERT INTO users (username, password, image_url)
VALUES ("Tegan Price",
        "$2y$10$7KzIHMKsqMXdfrbBZtSLyutcBAUMSxmTe/GhYWbLDr3DyioOq9FmG",
        "https://tvline.com/wp-content/uploads/2019/11/htgawm-6x07-4.jpg"),
       ("Connor Walsh",
        "$2y$10$fYN3/Wa9GAjTOCTs5vHPKuT8f5.Be6F.qmpUOB0Pp/92HTjz8mlBi",
        "https://www.cheatsheet.com/wp-content/uploads/2020/05/How-to-Get-Away-With-Murder-Connor.jpg");

INSERT INTO user_favourites (user_id, book_id)
VALUES (1, 1),
       (1, 2),
       (2, 2);

INSERT INTO reviews (user_id, book_id, rating, text)
VALUES (1, 1, 5, "This is a test review. This is a test review. This is a test review."),
       (2, 1, 3, "This is a test review. This is a test review. This is a test review."),
       (2, 2, 4, "This is a test review. This is a test review. This is a test review.");

-- Show tables.
SHOW TABLES;
