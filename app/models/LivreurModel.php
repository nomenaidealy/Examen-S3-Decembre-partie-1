<?php

namespace app\models;

class LivreurModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getListLivreurs () {   
        $stmt = $this->db->prepare("SELECT * FROM el_livreurs");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer le salaire d'un chauffeur à une date donnée
     */
    public function getSalaireByChauffeurAndDate(int $idChauffeur, string $date) {
        $sql = "
            SELECT montant
            FROM el_salaire_employe
            WHERE idChauffeur = :idChauffeur
              AND date_debut <= :date
              AND (date_fin IS NULL OR date_fin >= :date)
            ORDER BY date_debut DESC
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'idChauffeur' => $idChauffeur,
            'date' => $date
        ]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ? $result['montant'] : null;
    }
}
