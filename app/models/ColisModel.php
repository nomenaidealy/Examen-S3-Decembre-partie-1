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

    

    public function insertColis( $description,$poids) {
        $sql = "INSERT INTO el_colis (poids, description, statut)
                VALUES (:poids, :description, :statut)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':poids', $poids, \PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, \PDO::PARAM_STR);
        $stmt->bindValue(':statut', 'non_livraison', \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function getPrixColisByIdAndDate(int $idColis, string $date) {
        $sql = "
            SELECT ca.prix
            FROM el_colis c
            JOIN el_chiffre_affaire ca ON ca.poids = c.poids
            WHERE c.id = :idColis
              AND ca.date_debut <= :date
              AND (ca.date_fin IS NULL OR ca.date_fin >= :date)
            ORDER BY ca.date_debut DESC
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'idColis' => $idColis,
            'date' => $date
        ]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ? $result['prix'] : null;
    }
}
