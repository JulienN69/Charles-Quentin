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