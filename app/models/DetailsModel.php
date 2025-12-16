<?php

namespace app\models;

use Flight;

class DetailsModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDetails () {
        $stmt = $this->db->prepare("SELECT * FROM details");
        $stmt->execute();
        $details = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $details;
    }

    public function getDetail ($id) {
        $details = $this->getDetails();

        foreach ($details as $detail) {
            if ((int)$detail['id_produit'] === (int)$id) {
                return $detail;
            }
        }

        // Valeur par défaut si non trouvé (évite erreurs côté contrôleur/vue)
        return ['id' => null, 'description' => '', 'id_produit' => $id];
    }
}