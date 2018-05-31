INSERT INTO category (`name`) VALUES ('Films de gangsters');

INSERT INTO category (`name`) VALUES 
('Films d\'action'),
('Films d\'horreur'),
('Films de science fiction'),
('Films policiers');

SELECT * FROM category;

UPDATE category SET `name` = 'Documentaires' WHERE id = 3; 

DELETE FROM category WHERE id = 5;