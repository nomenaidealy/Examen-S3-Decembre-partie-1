<?php

namespace app\models;

use Flight;

class ProduitModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getProduits () {   
        $stmt = $this->db->prepare("SELECT * FROM produits");
        $stmt->execute();
        $produits = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $produits;
    }

    // Ajout : retourne un produit par id ou null si introuvable
    public function getProduit(int $id)
    {
        foreach ($this->getProduits() as $produit) {
            if ($produit['id'] === $id) {
                return $produit;
            }
        }
        return null;
    }
}