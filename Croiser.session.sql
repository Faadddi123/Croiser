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
ALTER TABLE wikis
DROP CONSTRAINT fk_wikis_tags
-- @block
-- Generate 100 random inserts for the wiki_tags table
DROP PROCEDURE GenerateWikiTagInserts;
CREATE PROCEDURE GenerateWikiTagInserts()
BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE wiki_id INT;
    DECLARE tag_id INT;

    WHILE i <= 10 DO
        -- Generate random values for wiki_id and tag_id
        SET wiki_id = FLOOR(RAND() * 25) + 1;
        SET tag_id = FLOOR(RAND() * 14) + 1;

        -- Debug output
        SELECT wiki_id, tag_id;

        -- Insert multiple tags for each wiki
        INSERT INTO wiki_tags (wiki_id, tag_id) VALUES
            (wiki_id, tag_id);

        SET i = i + 1;
    END WHILE;
END;
-- @block
CALL GenerateWikiTagInserts();
-- @block
SELECT * FROM wikis WHERE user_id = 1
-- @block
SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id GROUP BY wikis.id;
-- @block
ALTER TABLE wikis
ADD COLUMN archived BOOLEAN
-- @block
DELETE FROM wiki_tags;
-- @block
ALTER TABLE categories AUTO_INCREMENT = 1;
--@block
INSERT INTO categories (name) VALUES
('Web Development'),
('Frontend Development'),
('Backend Development'),
('Full Stack Development'),
('Mobile App Development'),
('Database Management'),
('User Interface (UI) Design'),
('User Experience (UX) Design'),
('Web Security'),
('Artificial Intelligence'),
('Machine Learning'),
('Data Science'),
('Computer Science'),
('Software Engineering'),
('Cybersecurity'),
('Blockchain Technology'),
('Cloud Computing'),
('Networks and Systems'),
('Internet of Things (IoT)'),
('Augmented Reality (AR)'),
('Virtual Reality (VR)'),
('Physics'),
('Chemistry'),
('Biology'),
('Astronomy'),
('Geology'),
('Mathematics'),
('Environmental Science'),
('Material Science'),
('Neuroscience'),
('Astrophysics'),
('Quantum Mechanics'),
('Bioinformatics'),
('Cryptography'),
('Robotics'),
('Biotechnology'),
('Nanotechnology'),
('Geophysics'),
('Ecology'),
('Statistics'),
('Meteorology'),
('Genetics'),
('Particle Physics'),
('Renewable Energy'),
('Computer Vision'),
('Natural Language Processing'),
('Human-Computer Interaction'),
('Space Exploration'),
('Medical Science');
-- @block
INSERT INTO wikis (user_id, category_id, title, content)
VALUES
(1, 1, 'Introduction to HTML', '<p>This wiki provides an introduction to HTML, the standard markup language for creating web pages.</p>'),
(1, 2, 'Responsive Web Design', '<p>Learn the principles of responsive web design and how to create websites that work on various devices and screen sizes.</p>'),
(1, 3, 'Node.js Basics', '<p>Explore the basics of Node.js, a JavaScript runtime for server-side development, and build scalable network applications.</p>'),
(1, 4, 'Database Design Principles', '<p>Understand the fundamental principles of database design, including normalization and relational database concepts.</p>'),
(1, 5, 'Introduction to Machine Learning', '<p>Get started with machine learning and discover the basic concepts, algorithms, and applications in this field.</p>'),
(1, 6, 'Python Programming', '<p>Learn the fundamentals of Python programming language, including syntax, data types, and control structures.</p>'),
(1, 7, 'Web Security Best Practices', '<p>Explore best practices for securing web applications, covering topics like HTTPS, secure coding, and authentication.</p>'),
-- Add more entries as needed
(1, 8, 'Introduction to Quantum Computing', '<p>Dive into the basics of quantum computing and understand its potential impact on the field of computer science.</p>'),
(1, 9, 'Mobile App Development with React Native', '<p>Discover how to build cross-platform mobile applications using React Native and JavaScript.</p>'),
(1, 10, 'Artificial Intelligence in Healthcare', '<p>Explore the applications of artificial intelligence in healthcare, including diagnostics and treatment planning.</p>'),
-- Add more entries as needed
(1, 11, 'Data Visualization Techniques', '<p>Learn effective data visualization techniques using tools like D3.js and matplotlib to communicate insights clearly.</p>'),
(1, 12, 'Introduction to Astrophysics', '<p>Delve into the fascinating world of astrophysics, covering topics such as celestial bodies, galaxies, and cosmology.</p>'),
(1, 13, 'Blockchain Technology Explained', '<p>Understand the underlying technology of blockchain, its applications, and its impact on various industries.</p>'),
-- Add more entries as needed
(1, 14, 'Genetic Engineering and Biotechnology', '<p>Explore the principles and applications of genetic engineering and biotechnology in fields such as medicine and agriculture.</p>'),
(1, 15, 'Introduction to Neural Networks', '<p>Get an introduction to neural networks, one of the key technologies behind artificial intelligence and machine learning.</p>'),
-- Add more entries as needed
(1, 16, 'Environmental Sustainability', '<p>Learn about environmental sustainability practices and their importance in preserving our planet for future generations.</p>'),
(1, 17, 'Introduction to Cybersecurity', '<p>Understand the basics of cybersecurity, including threats, vulnerabilities, and strategies for protecting digital assets.</p>'),
-- Add more entries as needed
(1, 18, 'Introduction to Data Science', '<p>Explore the interdisciplinary field of data science, covering data analysis, machine learning, and statistical modeling.</p>'),
(1, 19, 'Introduction to Robotics', '<p>Discover the fundamentals of robotics, including robot design, control systems, and applications in various industries.</p>'),
-- Add more entries as needed
(1, 20, 'Introduction to Chemistry', '<p>Explore the fundamental principles of chemistry, including atomic structure, chemical reactions, and the periodic table.</p>');
-- @block
INSERT INTO wikis (
    id,
    user_id,
    category_id,
    title,
    content,
    date_created,
    archived,
    tags_id,
    image
  )
VALUES (
    id:int,
    user_id:int,
    category_id:int,
    'title:varchar',
    'content:text',
    'date_created:timestamp',
    'archived:tinyint',
    tags_id:int,
    'image:varchar'
  );

  -- @block
  ALTER TABLE wikis 
  DROP COLUMN tags_id   
  -- @block
  SELECT wikis.*,GROUP_CONCAT(tags.name) AS tag_names , categories.name FROM wikis INNER JOIN wiki_tags on wikis.id = wiki_tags.wiki_id INNER JOIN tags on wiki_tags.tag_id  = tags.id INNER JOIN categories on categories.id = wikis.category_id GROUP BY
        wikis.id;

-- @block
INSERT INTO categories (name) VALUES
('Web Development'),
('Machine Learning'),
('Data Science'),
('Robotics'),
('Physics');

-- Insert tags
INSERT INTO tags (name) VALUES
('HTML'),
('CSS'),
('JavaScript'),
('Python'),
('Machine Learning'),
('Data Analysis'),
('Robotics'),
('Physics'),
('Web Security'),
('Database'),
('Node.js'),
('React'),
('Artificial Intelligence'),
('Algorithm');

-- Insert wikis
INSERT INTO wikis (user_id, category_id, title, content) VALUES
(1, 1, 'Introduction to HTML', '<p>This wiki provides an introduction to HTML.</p>'),
(1, 2, 'Machine Learning Basics', '<p>Learn the basics of machine learning and its applications.</p>'),
(1, 3, 'Data Science with Python', '<p>Explore data science concepts using Python programming.</p>'),
(1, 4, 'Introduction to Robotics', '<p>Get started with the basics of robotics and automation.</p>'),
(1, 5, 'Fundamentals of Physics', '<p>Explore fundamental principles of physics.</p>');

-- Insert wiki_tags
-- @block

-- Run the SELECT query to see the result
SELECT wikis.*, GROUP_CONCAT(tags.name) AS tag_names, categories.name
FROM wikis
INNER JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
INNER JOIN tags ON wiki_tags.tag_id = tags.id
INNER JOIN categories ON categories.id = wikis.category_id
GROUP BY wikis.id;
-- @block
SELECT wikis.*, GROUP_CONCAT(tags.name) AS tag_names, categories.name
FROM wikis
INNER JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
INNER JOIN tags ON wiki_tags.tag_id = tags.id
INNER JOIN categories ON categories.id = wikis.category_id
WHERE wikis.title LIKE '%hi%'
GROUP BY wikis.id;
