-- creation de la bdd --

CREATE DATABASE charles_cantin; 

USE charles_cantin;

-- creation des tables --

CREATE TABLE prestations
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    prices VARCHAR(100) NOT NULL
);

CREATE TABLE gallery
(
    gallery_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE photo
(
    photo_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    size VARCHAR(255) NOT NULL,
    gallery_id INT NOT NULL,
    FOREIGN KEY (gallery_id) REFERENCES gallery(gallery_id)
);

CREATE TABLE user
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);


-- jeu de données --

INSERT INTO prestations (title, description, prices) 
VALUES
('Juste moi','Séance pour une personne, en extérieur ou en studio', '130 euros'),
('Pour deux','Pour deux personnes, en extérieur ou en studio', '195 euros'),
('Famille','Pour la famille ou les amis jusqu’à 4 personnes, en extérieur ou en studio
30 euros en supplément par personne au-delà de 4 (hormis enfant jusqu’à 2 ans', '220 euros'),
('Il était une fois','Photo de grossesse (À votre domicile, en extérieur ou en studio)', '160 euros'),
('Mon bébé','Photo d’enfant jusqu’à 3 ans (photo à domicile)', '100 euros'),
('J’immortalise l’événement','Prestation de mariage ou baptême sur devis', 'sur mesure');

ALTER TABLE prestations ADD photo VARCHAR(50);

UPDATE prestations SET photo = 'portrait.jpg' WHERE id = 1;
UPDATE prestations SET photo = 'A deux.jpg' WHERE id = 2;
UPDATE prestations SET photo = 'bébé.jpg' WHERE id = 3;
UPDATE prestations SET photo = 'grossesse.jpg' WHERE id = 4;
UPDATE prestations SET photo = 'bébé2.jpg' WHERE id = 5;
UPDATE prestations SET photo = 'bapteme.jpg' WHERE id = 6;

INSERT INTO gallery (name) 
VALUES
('mariage'),
('bébé'),
('grossesse'),
('famille'),
('baptême'),
('couple');

INSERT INTO photo (name, gallery_id)
VALUES
("mariage.jpg", 1),
("mariage2.jpg", 1),
("mariage3.jpg", 1),
("mariage4.jpg", 1);
("bébé.jpg", 2),
("bébé2.jpg", 2),
("bébé3.jpg", 2),
("bébé4.jpg", 2),
("bébé5.jpg", 2),
("bébé6.jpg", 2),
("grossesse.jpg", 3),
("grossesse2.jpg", 3),
("grossesse3.jpg", 3),
("grossesse4.jpg", 3),
("grossesse5.jpg", 3),
("famille.jpg", 4),
("famille2.jpg", 4),
("famille3.jpg", 4),
("famille4.jpg", 4),
("famille5.jpg", 4),
("bapteme.jpg", 5),
("bapteme2.jpg", 5),
("bapteme3.jpg", 5),
("bapteme4.jpg", 5),
("bapteme5.jpg", 5),
("couple.jpg", 6),
("couple2.jpg", 6),
("couple3.jpg", 6),
("couple4.jpg", 6),
("couple5.jpg", 6),
("couple6.jpg", 6);
