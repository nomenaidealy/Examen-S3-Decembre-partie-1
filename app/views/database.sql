
CREATE TABLE produits (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix NUMERIC(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL
);

CREATE TABLE details (
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    id_produit INT REFERENCES produits(id)
);


INSERT INTO produits (nom, prix, image) VALUES
    ('XIAOMI Note 17 Pro Max', 2000.00, 'xiaomi_note_17_pro_max.jpeg'),
    ('iPhone 17 Pro Max',     2200.00, 'iphone_17_pro_max.jpeg'),
    ('SAMSUNG S 24',          2500.00, 'samsung_s_24.jpeg');


INSERT INTO details (description, id_produit) VALUES
    ('Le XIAOMI Note 17 Pro Max est un smartphone puissant avec un écran AMOLED de 6,67 pouces, un processeur Snapdragon 888, 8 Go de RAM et une batterie de 5000 mAh.', 1),
    ('L''iPhone 17 Pro Max offre un design élégant, un écran Super Retina XDR de 6,7 pouces, la puce A15 Bionic, et un système de caméra avancé pour des photos et vidéos de haute qualité.', 2),
    ('Le SAMSUNG S 24 est équipé d''un écran Dynamic AMOLED 2X de 6,8 pouces, d''un processeur Exynos 2200, de 12 Go de RAM et d''une batterie de 5000 mAh pour une performance optimale.', 3);
