<?php

namespace app\models;

use Flight;

class ColisModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getListColis () {   
        $stmt = $this->db->prepare("SELECT * FROM el_colis");
        $stmt->execute();
        $colis = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $colis;
    }

    public function insertColis($description, $poids) {
        $sql = "INSERT INTO el_colis (poids, description, statut)
                VALUES (:poids, :description, :statut)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':poids', $poids, \PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, \PDO::PARAM_STR);
        $stmt->bindValue(':statut', 'non_livraison', \PDO::PARAM_STR);

        $stmt->execute();
    }

}
