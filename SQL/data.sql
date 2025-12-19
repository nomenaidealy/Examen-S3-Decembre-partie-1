
DROP DATABASE IF EXISTS entreprise_livraison;
CREATE DATABASE entreprise_livraison;
USE entreprise_livraison;

-- TABLE : el_vehicules
CREATE TABLE el_vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_immatriculation VARCHAR(50) NOT NULL UNIQUE
);

-- 10 véhicules
INSERT INTO el_vehicules (numero_immatriculation) VALUES
('1001-AAA'), ('1002-AAB'), ('1003-AAC'), ('1004-AAD'), ('1005-AAE'),
('1006-AAF'), ('1007-AAG'), ('1008-AAH'), ('1009-AAI'), ('1010-AAJ');

-- TABLE : el_livreurs
CREATE TABLE el_livreurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- 12 livreurs/chauffeurs
INSERT INTO el_livreurs (nom) VALUES
('Jean'), ('Paul'), ('Marc'), ('Luc'), ('David'),
('Eric'), ('Tom'), ('Sam'), ('Leo'), ('Noah'),
('Alex'), ('Chris');

-- TABLE : el_salaire_employe
CREATE TABLE el_salaire_employe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idChauffeur INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    FOREIGN KEY (idChauffeur) REFERENCES el_livreurs(id)
);

-- Répartition des salaires
-- 5 à 15000Ar, 3 à 18000Ar, 4 à 20000Ar
INSERT INTO el_salaire_employe (idChauffeur, montant, date_debut, date_fin) VALUES
(1, 15000, '2025-01-01', NULL),
(2, 15000, '2025-01-01', NULL),
(3, 15000, '2025-01-01', NULL),
(4, 15000, '2025-01-01', NULL),
(5, 15000, '2025-01-01', NULL),
(6, 18000, '2025-01-01', NULL),
(7, 18000, '2025-01-01', NULL),
(8, 18000, '2025-01-01', NULL),
(9, 20000, '2025-01-01', NULL),
(10, 20000, '2025-01-01', NULL),
(11, 20000, '2025-01-01', NULL),
(12, 20000, '2025-01-01', NULL);

-- TABLE : el_zones


CREATE TABLE el_zones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    pourcentage DECIMAL(5,2) NOT NULL
);


-- 5 zones : 3 à 12.5%, 2 à 0%
INSERT INTO el_zones (nom, pourcentage) VALUES
('Centre-ville', 12.50),
('Banlieue', 12.50),
('Zone-industrielle', 12.50),
('Peripherie', 0.00),
('Zone-rurale', 0.00);


-- TABLE : el_colis
CREATE TABLE el_colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    description VARCHAR(255),
    statut VARCHAR(20) NOT NULL
);

-- TABLE : el_statut_livraison
CREATE TABLE el_statut_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

INSERT INTO el_statut_livraison (libelle) VALUES
('En attente'),
('Livre'),
('Annule'),
('En cours');

-- TABLE : el_chiffre_affaire
CREATE TABLE el_chiffre_affaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE
);

-- Données avec prix > 20 000 Ar
INSERT INTO el_chiffre_affaire (poids, prix, date_debut, date_fin) VALUES
(1.00, 25000.00, '2025-01-01', NULL),
(10.00, 30000.00, '2025-02-01', NULL),
(12.00, 35000.00, '2025-03-01', NULL),
(20.00, 40000.00, '2025-04-01', NULL),
(8.00, 28000.00, '2025-05-01', NULL);


-- TABLE : el_livraison
CREATE TABLE el_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idColis INT NOT NULL,
    adresse_depart VARCHAR(255),
    adresse_destination VARCHAR(255),
    date_livraison DATE NOT NULL,
    idStatut INT NOT NULL,
    idVehicule INT NOT NULL,
    idChauffeur INT NOT NULL,
    cout_vehicule DECIMAL(10,2) NOT NULL,
    salaire_chauffeur DECIMAL(10,2),
    chiffre_affaire DECIMAL(10,2),
    cout_revient DECIMAL(10,2),
    idZone INT NOT NULL,
    FOREIGN KEY (idColis) REFERENCES el_colis(id),
    FOREIGN KEY (idStatut) REFERENCES el_statut_livraison(id),
    FOREIGN KEY (idVehicule) REFERENCES el_vehicules(id),
    FOREIGN KEY (idChauffeur) REFERENCES el_livreurs(id),
    FOREIGN KEY (idZone) REFERENCES el_zones(id)
);

-- Aucune donnée insérée ici comme demandé

-- VUE : el_v_livraison
CREATE OR REPLACE VIEW el_v_livraison AS
SELECT 
    l.id AS id_livraison,
    c.description AS colis,
    c.poids AS poids,
    l.adresse_depart AS depart,
    l.adresse_destination AS destination,
    l.date_livraison AS date_livraison,
    s.libelle AS statut,
    v.numero_immatriculation AS vehicule,
    ch.nom AS chauffeur,
    l.cout_vehicule AS cout_vehicule,
    l.salaire_chauffeur AS salaire,
    l.chiffre_affaire AS chiffre_affaire,
    l.cout_revient AS cout_revient
FROM el_livraison l
JOIN el_colis c ON l.idColis = c.id
JOIN el_statut_livraison s ON l.idStatut = s.id
JOIN el_vehicules v ON l.idVehicule = v.id
JOIN el_livreurs ch ON l.idChauffeur = ch.id;



-- VUE : v_date_livraison
CREATE OR REPLACE VIEW v_date_livraison AS 
SELECT 
    YEAR(date_livraison) AS annee, 
    MONTH(date_livraison) AS mois,  
    DAY(date_livraison) AS jour, 
    cout_revient, 
    chiffre_affaire, 
    (chiffre_affaire - cout_revient) AS benefice,
    idStatut AS statut  
FROM el_livraison 
WHERE idStatut = 2;



