-- -------------------------------
-- 1. Table Vehicules
-- -------------------------------
CREATE DATABASE  colis_express ;
use colis_express ;

CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numeroImmatriculation VARCHAR(20) NOT NULL
);

INSERT INTO vehicule (numeroImmatriculation) VALUES
('AB123CD'),
('XY987ZT'),
('ZZ999YY');

-- -------------------------------
-- 2. Table CoutJournalierVehicule
-- -------------------------------
CREATE TABLE coutJournalierVehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    idVehicule INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idVehicule) REFERENCES vehicule(id)
);

INSERT INTO coutJournalierVehicule (debut, fin, idVehicule, montant) VALUES
('2025-01-01', '2025-12-31', 1, 50.00),
('2025-01-01', '2025-12-31', 2, 30.00),
('2025-01-01', '2025-12-31', 3, 45.00);

-- -------------------------------
-- 3. Table Livreurs
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
-- 4. Table SalaireJournalierChauffeur
-- -------------------------------
CREATE TABLE salaireJournalierChauffeur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    debut DATE NOT NULL,
    fin DATE NOT NULL,
    idLivreur INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idLivreur) REFERENCES livreur(id)
);

INSERT INTO salaireJournalierChauffeur (debut, fin, idLivreur, montant) VALUES
('2025-01-01', '2025-12-31', 1, 40.00),
('2025-01-01', '2025-12-31', 2, 50.00),
('2025-01-01', '2025-12-31', 3, 45.00);

-- -------------------------------
-- 5. Table ZoneLivraison
-- -------------------------------
CREATE TABLE zoneLivraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

INSERT INTO zoneLivraison (nom) VALUES
('Zone Nord'),
('Zone Sud'),
('Zone Est'),
('Zone Ouest');

-- -------------------------------
-- 6. Table Adresse
-- -------------------------------
CREATE TABLE adresse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) NOT NULL
);

INSERT INTO adresse (adresse) VALUES
('Entrepot Central'),
('123 Rue Principale'),
('456 Avenue du Parc'),
('789 Boulevard de la Ville');

-- -------------------------------
-- 7. Table AffectationVehicule
-- -------------------------------
CREATE TABLE affectationVehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idVehicule INT NOT NULL,
    idLivreur INT NOT NULL,
    dateAffectation DATE NOT NULL,
    FOREIGN KEY (idVehicule) REFERENCES vehicule(id),
    FOREIGN KEY (idLivreur) REFERENCES livreur(id)
);

INSERT INTO affectationVehicule (idVehicule, idLivreur, dateAffectation) VALUES
(1, 1, '2025-12-16'),
(2, 2, '2025-12-16'),
(3, 3, '2025-12-16');

-- -------------------------------
-- 8. Table StatusLivraison
-- -------------------------------
CREATE TABLE statusLivraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libele VARCHAR(50) NOT NULL
);

INSERT INTO statusLivraison (libele) VALUES
('en attente'),
('livré'),
('annulé');

-- -------------------------------
-- 9. Table Colis
-- -------------------------------
CREATE TABLE colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poids DECIMAL(10,2) NOT NULL,
    prixParKilos DECIMAL(10,2) NOT NULL,
    libele VARCHAR(255)
);

INSERT INTO colis (poids, prixParKilos, libele) VALUES
(10, 5, 'Electronique'),
(20, 2.5, 'Livres'),
(15, 3, 'Vêtements');

-- -------------------------------
-- 10. Table Livraison
-- -------------------------------
CREATE TABLE livraison (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idColis INT NOT NULL,
    idLivreur INT NOT NULL,
    idVehicule INT NOT NULL,
    idAdresseDepart INT NOT NULL,
    idAdresseDestination INT NOT NULL,
    dateLivraison DATE NOT NULL,
    idStatus INT NOT NULL,
    coutRevient DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idColis) REFERENCES colis(id),
    FOREIGN KEY (idLivreur) REFERENCES livreur(id),
    FOREIGN KEY (idVehicule) REFERENCES vehicule(id),
    FOREIGN KEY (idAdresseDepart) REFERENCES adresse(id),
    FOREIGN KEY (idAdresseDestination) REFERENCES adresse(id),
    FOREIGN KEY (idStatus) REFERENCES statusLivraison(id)
);

-- Exemple d’insertion calcul coutRevient : salaire + cout véhicule + poids*prix/kg
INSERT INTO livraison (idColis, idLivreur, idVehicule, idAdresseDepart, idAdresseDestination, dateLivraison, idStatus, coutRevient)
VALUES
(1, 1, 1, 1, 2, '2025-12-16', 1, 40+50+10*5),  -- 40 salaire + 50 véhicule + 50 colis
(2, 2, 2, 1, 3, '2025-12-16', 1, 50+30+20*2.5), -- 50+30+50
(3, 3, 3, 1, 4, '2025-12-16', 1, 45+45+15*3);   -- 45+45+45
