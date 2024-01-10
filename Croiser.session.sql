DROP DATABASE wikimedia;
-- @block
CREATE DATABASE wikimedia;
USE wikimedia;
--@block
-- Table: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('author', 'admin') DEFAULT 'author'
);

-- Table: categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Table: tags
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Table: wikis
CREATE TABLE wikis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    category_id INT,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    archived BOOLEAN DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
-- @block

-- Table: wiki_tags (Many-to-Many Relationship between wikis and tags)
CREATE TABLE wiki_tags (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wikis(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
);

-- @block
INSERT INTO tags (name) VALUES ('HTML');
INSERT INTO tags (name) VALUES ('CSS');
INSERT INTO tags (name) VALUES ('JavaScript');
INSERT INTO tags (name) VALUES ('React');
INSERT INTO tags (name) VALUES ('Node.js');
INSERT INTO tags (name) VALUES ('Express.js');
INSERT INTO tags (name) VALUES ('Bootstrap');
-- @block
INSERT INTO categories (name) VALUES ('Technologie'),('Math'),('Earth'),('Documentry');
-- @block
INSERT INTO categories (name) VALUES ('Web Development');
INSERT INTO categories (name) VALUES ('Mobile App Development');
INSERT INTO categories (name) VALUES ('Data Science');
INSERT INTO categories (name) VALUES ('UI/UX Design');
INSERT INTO categories (name) VALUES ('Cloud Computing');
INSERT INTO categories (name) VALUES ('Artificial Intelligence');
-- @block
ALTER TABLE wikis
ADD CONSTRAINT fk_wikis_tags
FOREIGN KEY (tags_id) REFERENCES tags(id);
