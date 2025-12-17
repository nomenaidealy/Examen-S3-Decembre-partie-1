-- =========================================
-- FICHIER : entreprise_livraison.sql
-- =========================================

DROP DATABASE IF EXISTS entreprise_livraison;
CREATE DATABASE entreprise_livraison;
USE entreprise_livraison;

-- =========================================
-- TABLE : el_vehicules
-- =========================================
CREATE TABLE el_vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_immatriculation VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO el_vehicules (numero_immatriculation) VALUES
('1234-TAA'),
('5678-TBB'),
('9012-TCC'),
('3456-TDD');

-- =========================================
-- TABLE : el_livreurs
-- =========================================
CREATE TABLE el_livreurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO el_livreurs (nom) VALUES
('Jean'),
('Paul'),
('Marc'),
('Luc');

-- =========================================
-- TABLE : el_salaire_employe
-- =========================================
CREATE TABLE el_salaire_employe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idChauffeur INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    FOREIGN KEY (idChauffeur) REFERENCES el_livreurs(id)
);

INSERT INTO el_salaire_employe (idChauffeur, montant, date_debut, date_fin) VALUES
(1, 20000, '2025-01-01', '2025-06-30'),
(1, 25000, '2025-07-01', NULL),
(2, 18000, '2025-01-01', NULL),
(3, 22000, '2025-01-01', NULL),
(4, 15000, '2025-01-01', NULL);

-- =========================================
-- TABLE : el_zones
-- =========================================
CREATE TABLE el_zones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO el_zones (nom) VALUES
('Centre-ville'),
('Banlieue'),
('Zone-industrielle'),
('Peripherie');

-- =========================================
-- TABLE : el_colis
-- =========================================
CREATE TABLE el_colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    description VARCHAR(255),
    statut VARCHAR(20) NOT NULL
);

INSERT INTO el_colis (poids, description, statut) VALUES
(5, 'Documents', 'livraison'),
(10, 'Vetements', 'livraison'),
(12, 'Materiel electronique', 'livraison'),
(4,   'telephones',  'livraison'),
(20, 'Meubles', 'non_livraison');

-- =========================================
-- TABLE : el_statut_livraison
-- =========================================
CREATE TABLE el_statut_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

INSERT INTO el_statut_livraison (libelle) VALUES
('En attente'),
('Livre'),
('Annule'),
('En cours');

-- =========================================
-- TABLE : el_chiffre_affaire
-- =========================================
CREATE TABLE el_chiffre_affaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE
);

INSERT INTO el_chiffre_affaire (poids, prix, date_debut, date_fin) VALUES
(5, 10000, '2025-01-01', '2025-06-30'),
(1, 4000, '2025-01-01' , NULL),
(5, 12000, '2025-07-01', NULL),
(10, 15000, '2025-01-01', NULL),
(20, 30000, '2025-01-01', NULL);

-- =========================================
-- TABLE : el_livraison
-- =========================================
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
    FOREIGN KEY (idColis) REFERENCES el_colis(id),
    FOREIGN KEY (idStatut) REFERENCES el_statut_livraison(id),
    FOREIGN KEY (idVehicule) REFERENCES el_vehicules(id),
    FOREIGN KEY (idChauffeur) REFERENCES el_livreurs(id)
);

INSERT INTO el_livraison (
    idColis,
    adresse_depart,
    adresse_destination,
    date_livraison,
    idStatut,
    idVehicule,
    idChauffeur,
    cout_vehicule,
    salaire_chauffeur,
    chiffre_affaire,
    cout_revient
) VALUES
(1, 'entrepotCentrale', 'Ivandry', '2025-07-10', 2, 1, 1, 5000, 25000, 12000, 30000),
(2, 'entrepotCentrale', 'Ankorondrano', '2025-07-12', 2, 2, 2, 4000, 18000, 15000, 22000),
(3, 'entrepotCentrale', 'Itaosy', '2025-07-14', 4, 3, 3, 6000, 22000, 23000, 28000),
(4, 'entrepotCentrale', 'Talatamaty', '2025-07-15', 2, 4, 4, 7000, 15000, 16000, 29000);


-- =========================================
-- FIN DU FICHIER
-- =========================================



-- =========================================
-- VUE de livraison 
-- =========================================
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
JOIN el_colis c 
    ON l.idColis = c.id
JOIN el_statut_livraison s
    ON l.idStatut = s.id
JOIN el_vehicules v
    ON l.idVehicule = v.id
JOIN el_livreurs ch
    ON l.idChauffeur = ch.id;

