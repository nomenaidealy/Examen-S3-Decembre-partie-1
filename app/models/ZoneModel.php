<?php

namespace app\models;

class ZoneModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllZones()  {
        $stmt = $this->db->prepare("SELECT * FROM el_zones ORDER BY id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getZonePourcentageById(int $id)  {
        $stmt = $this->db->prepare("SELECT pourcentage FROM el_zones WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$res) {
            return null;
        }
        return (float) $res['pourcentage'];
    }

    public function insererZone(string $nom, float $pourcentage) {
        $sql = "INSERT INTO el_zones (nom, pourcentage) VALUES (:nom, :pourcentage)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':pourcentage' => $pourcentage
        ]);
    }

}