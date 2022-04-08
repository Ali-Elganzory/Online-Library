-- Init database.
CREATE DATABASE IF NOT EXISTS online_library;

USE online_library;

-- Drop tables.
DROP TABLE IF EXISTS books;

-- Create tables.
CREATE TABLE books (id 			INT 		 NOT NULL PRIMARY KEY AUTO_INCREMENT,
					title 		VARCHAR(100) NOT NULL,
                    author		VARCHAR(100) NOT NULL,
					description VARCHAR(400) DEFAULT '', 
                    image_url 	VARCHAR(100) NOT NULL,
                    views 		INT			 DEFAULT 0);

-- Populate tables.
INSERT INTO books (title, author, description, image_url, views)
VALUES
	("1984", 
     "George Orwell", 
     "Nineteen Eighty-Four is a dystopian social science fiction novel and cautionary tale written by English writer George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell's ninth and final book completed in his lifetime.",
     "https://mir-s3-cdn-cf.behance.net/project_modules/disp/8bc21955316461.59b89b39bc96d.jpg",
     12);

-- Show tables.
SHOW TABLES;
