<?php

namespace app\models;

use Flight;

class LivreurModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getListLivreurs () {   
        $stmt = $this->db->prepare("SELECT * FROM el_livreurs");
        $stmt->execute();
        $livreurs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $livreurs;
    }

}