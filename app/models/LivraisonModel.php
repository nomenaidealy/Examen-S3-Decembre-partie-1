<?php

namespace app\models;

use Flight;

class LivraisonModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getLivraisonS () {   
        $stmt = $this->db->prepare("SELECT * FROM exam_vue_livraisons");
        $stmt->execute();
        $livraisons = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $livraisons;
    }

}