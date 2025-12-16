-- -------------------------------
-- Création de la base
-- -------------------------------

CREATE DATABASE colis_express;
USE colis_express;

-- -------------------------------
-- 1. Table vehicule
-- -------------------------------
CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_immatriculation VARCHAR(20) NOT NULL,
    type VARCHAR(50)
);

INSERT INTO vehicule (numero_immatriculation, type) VALUES
('AB123CD', 'Camion'),
('XY987ZT', 'Van'),
('ZZ999YY', 'Camion');

-- -------------------------------
-- 2. Table livreur
-- -------------------------------
CREATE TABLE livreur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO livreur (nom) VALUES
('John Doe'),
('Jane Smith'),
('Alice Dupont');

-- -------------------------------
-- 3. Table adresse
-- -------------------------------
CREATE TABLE adresse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) NOT NULL
);

INSERT INTO adresse (adresse) VALUES
('Entrepot Central'), -- Départ fixe
('123 Rue Principale'),
('456 Avenue du Parc'),
('789 Boulevard de la Ville');

-- -------------------------------
-- 4. Table status_livraison
-- -------------------------------
CREATE TABLE status_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libele VARCHAR(50) NOT NULL
);

INSERT INTO status_livraison (libele) VALUES
('en attente'),
('livré'),
('annulé');

-- -------------------------------
-- 5. Table colis
-- -------------------------------
CREATE TABLE colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    prix_par_kilos DECIMAL(10,2) NOT NULL,  -- Montant gagné par kg
    description VARCHAR(255)
);

INSERT INTO colis (poids, prix_par_kilos, description) VALUES
(10, 5, 'Electronique'),
(20, 2.5, 'Livres'),
(15, 3, 'Vêtements');

-- -------------------------------
-- 6. Table livraison
-- -------------------------------
CREATE TABLE livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_colis INT NOT NULL REFERENCES colis(id),
    id_livreur INT NOT NULL REFERENCES livreur(id),
    id_vehicule INT NOT NULL REFERENCES vehicule(id),
    id_adresse_depart INT NOT NULL REFERENCES adresse(id), -- Toujours entrepôt
    id_adresse_destination INT NOT NULL REFERENCES adresse(id),
    date_livraison DATE NOT NULL,
    id_status INT NOT NULL REFERENCES status_livraison(id),
    salaire_chauffeur DECIMAL(10,2) NOT NULL,  -- Salaire pour cette livraison
    cout_vehicule DECIMAL(10,2) NOT NULL,      -- Coût du véhicule pour cette livraison
    cout_revient DECIMAL(10,2) NOT NULL,       -- salaire + véhicule
    chiffre_affaire DECIMAL(10,2) NOT NULL     -- poids * prixParKg
);

-- Exemple d’insertion calculée :
INSERT INTO livraison 
(id_colis, id_livreur, id_vehicule, id_adresse_depart, id_adresse_destination, date_livraison, id_status, salaire_chauffeur, cout_vehicule, cout_revient, chiffre_affaire)
VALUES
(1, 1, 1, 1, 2, '2025-12-16', 1, 40, 50, 90, 10*5),
(2, 2, 2, 1, 3, '2025-12-16', 1, 50, 30, 80, 20*2.5),
(3, 3, 3, 1, 4, '2025-12-16', 1, 45, 45, 90, 15*3);

-- -------------------------------
-- 7. Table zone_livraison (optionnelle)
-- -------------------------------
CREATE TABLE zone_livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO zone_livraison (nom) VALUES
('Zone Nord'),
('Zone Sud'),
('Zone Est'),
('Zone Ouest');
