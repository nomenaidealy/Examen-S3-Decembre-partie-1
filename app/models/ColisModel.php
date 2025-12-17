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

}