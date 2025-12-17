-- =========================================
-- Base de données : exam_colis_express
-- =========================================

CREATE DATABASE IF NOT EXISTS exam_colis_express;
USE exam_colis_express;

-- =========================================
-- 1. Table vehicule
-- =========================================
CREATE TABLE exam_vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_immatriculation VARCHAR(20) NOT NULL,
    type VARCHAR(50)
);

INSERT INTO exam_vehicule (numero_immatriculation, type) VALUES
('AB123CD', 'Camion'),
('XY987ZT', 'Van'),
('ZZ999YY', 'Camion');

-- =========================================
-- 2. Table livreur
-- =========================================
CREATE TABLE exam_livreur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO exam_livreur (nom) VALUES
('John Doe'),
('Jane Smith'),
('Alice Dupont');

-- =========================================
-- 3. Table adresse
-- =========================================
CREATE TABLE exam_adresse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) NOT NULL
);

INSERT INTO exam_adresse (adresse) VALUES
('Entrepot Central'),
('123 Rue Principale'),
('456 Avenue du Parc'),
('789 Boulevard de la Ville');

-- =========================================
-- 4. Table status_livraison
-- =========================================
CREATE TABLE exam_status_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
);

INSERT INTO exam_status_livraison (libelle) VALUES
('en attente'),
('livré'),
('annulé');

-- =========================================
-- 5. Table colis
-- =========================================
CREATE TABLE exam_colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    prix_par_kilos DECIMAL(10,2) NOT NULL,
    description VARCHAR(255)
);

INSERT INTO exam_colis (poids, prix_par_kilos, description) VALUES
(10, 5, 'Electronique'),
(20, 2.5, 'Livres'),
(15, 3, 'Vêtements');

-- =========================================
-- 6. Table livraison
-- =========================================
CREATE TABLE exam_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_colis INT NOT NULL,
    id_livreur INT NOT NULL,
    id_vehicule INT NOT NULL,
    id_adresse_depart INT NOT NULL,
    id_adresse_destination INT NOT NULL,
    date_livraison DATE NOT NULL,
    id_status INT NOT NULL,
    salaire_chauffeur DECIMAL(10,2) NOT NULL,
    cout_vehicule DECIMAL(10,2) NOT NULL,
    cout_revient DECIMAL(10,2) NOT NULL,
    chiffre_affaire DECIMAL(10,2) NOT NULL,

    CONSTRAINT fk_livraison_colis
        FOREIGN KEY (id_colis) REFERENCES exam_colis(id),
    CONSTRAINT fk_livraison_livreur
        FOREIGN KEY (id_livreur) REFERENCES exam_livreur(id),
    CONSTRAINT fk_livraison_vehicule
        FOREIGN KEY (id_vehicule) REFERENCES exam_vehicule(id),
    CONSTRAINT fk_livraison_adresse_depart
        FOREIGN KEY (id_adresse_depart) REFERENCES exam_adresse(id),
    CONSTRAINT fk_livraison_adresse_destination
        FOREIGN KEY (id_adresse_destination) REFERENCES exam_adresse(id),
    CONSTRAINT fk_livraison_status
        FOREIGN KEY (id_status) REFERENCES exam_status_livraison(id)
);

-- =========================================
-- 7. Insertion des livraisons
-- =========================================
INSERT INTO exam_livraison 
(id_colis, id_livreur, id_vehicule, id_adresse_depart, id_adresse_destination,
 date_livraison, id_status, salaire_chauffeur, cout_vehicule, cout_revient, chiffre_affaire)
VALUES
(1, 1, 1, 1, 2, '2025-12-16', 1, 40, 50, 90, 10*5),
(2, 2, 2, 1, 3, '2025-12-16', 1, 50, 30, 80, 20*2.5),
(3, 3, 3, 1, 4, '2025-12-16', 1, 45, 45, 90, 15*3);

-- =========================================
-- 8. Table zone_livraison (optionnelle)
-- =========================================
CREATE TABLE exam_zone_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO exam_zone_livraison (nom) VALUES
('Zone Nord'),
('Zone Sud'),
('Zone Est'),
('Zone Ouest');

-- =========================================
-- 9. Vue des livraisons
-- =========================================
CREATE OR REPLACE VIEW exam_vue_livraisons AS
SELECT 
    l.id,
    c.description AS colis,
    c.poids,
    c.prix_par_kilos,
    lr.nom AS livreur,
    v.numero_immatriculation AS vehicule,
    a_dep.adresse AS adresse_depart,
    a_dest.adresse AS adresse_destination,
    l.date_livraison,
    s.libelle AS statut,
    l.salaire_chauffeur,
    l.cout_vehicule,
    l.cout_revient,
    l.chiffre_affaire
FROM exam_livraison l
JOIN exam_colis c ON l.id_colis = c.id
JOIN exam_livreur lr ON l.id_livreur = lr.id
JOIN exam_vehicule v ON l.id_vehicule = v.id
JOIN exam_adresse a_dep ON l.id_adresse_depart = a_dep.id
JOIN exam_adresse a_dest ON l.id_adresse_destination = a_dest.id
JOIN exam_status_livraison s ON l.id_status = s.id;
