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
ADD COLUMN tags_id INT;
ALTER TABLE wikis
ADD CONSTRAINT fk_wikis_tags
FOREIGN KEY (tags_id) REFERENCES tags(id);
-- @block
SELECT * FROM wikis;
INSERT INTO wikis (user_id,category_id,title,content,tags_id) VALUES (1,1,'zzzzzz','waaaaaaaaaaaaaaw',1)
-- @block
ALTER TABLE wikis
ADD COLUMN image VARCHAR(100);
-- @block
ALTER TABLE wikis
Drop COLUMN tags_id;
-- @block
-- Generate 100 random inserts for the wiki_tags table
DROP PROCEDURE GenerateWikiTagInserts;
CREATE PROCEDURE GenerateWikiTagInserts()
BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE wiki_id INT;
    DECLARE tag_id INT;

    WHILE i <= 100 DO
        -- Generate random values for wiki_id and tag_id
        SET wiki_id = FLOOR(RAND() * 51) + 1;
        SET tag_id = FLOOR(RAND() * 7) + 1;

        -- Debug output
        SELECT wiki_id, tag_id;

        -- Insert multiple tags for each wiki
        INSERT INTO wiki_tags (wiki_id, tag_id) VALUES
            (wiki_id, tag_id);

        SET i = i + 1;
    END WHILE;
END;
CALL GenerateWikiTagInserts();
-- @block
SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id GROUP BY wikis.id;
-- @block