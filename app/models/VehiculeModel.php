<?php

namespace app\models;

use Flight;

class VehiculeModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getListVehicules () {   
        $stmt = $this->db->prepare("SELECT * FROM el_vehicules");
        $stmt->execute();
        $vehicules = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $vehicules;
    }

}