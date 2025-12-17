<?php

namespace app\models;

use Flight;

class LivraisonModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    /*public function getLivraisonS () {   
        $stmt = $this->db->prepare("SELECT * FROM exam_vue_livraisons");
        $stmt->execute();
        $livraisons = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $livraisons;
    }*/

    public function insertLivraison(
        $idColis,
        $adresse_depart,
        $adresse_destination,
        $date_livraison,
        $idVehicule,
        $idChauffeur,
        $coutVehicule
    ) {
        // ID du statut "En attente"
        $idStatus = 1;

        $livreurModel = new LivreurModel($this->db);
        $colisModel   = new ColisModel($this->db);

        $salaireChauffeur     = $livreurModel->getSalaireByChauffeurAndDate($idChauffeur, $date_livraison);
        $chiffreAffaireColis  = $colisModel->getPrixColisByIdAndDate($idColis, $date_livraison);

        // Sécurité
        if ($salaireChauffeur === null || $chiffreAffaireColis === null) {
            throw new \Exception("Impossible de calculer le salaire ou le chiffre d'affaire");
        }

        $cout_revient = $salaireChauffeur + $coutVehicule;

        $sql = "
            INSERT INTO el_livraison (
                idColis,
                adresse_depart,
                adresse_destination,
                date_livraison,
                idStatut,
                idVehicule,
                idChauffeur,
                cout_vehicule,
                salaire_chauffeur,
                chiffre_affaire,
                cout_revient
            ) VALUES (
                :idColis,
                :adresse_depart,
                :adresse_destination,
                :date_livraison,
                :idStatut,
                :idVehicule,
                :idChauffeur,
                :coutVehicule,
                :salaireChauffeur,
                :chiffreAffaire,
                :coutRevient
            )
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':idColis'          => (int)$idColis,
            ':adresse_depart'   => $adresse_depart,
            ':adresse_destination' => $adresse_destination,
            ':date_livraison'   => $date_livraison,
            ':idStatut'         => $idStatus,
            ':idVehicule'       => (int)$idVehicule,
            ':idChauffeur'      => (int)$idChauffeur,
            ':coutVehicule'     => (float)$coutVehicule,
            ':salaireChauffeur' => (float)$salaireChauffeur,
            ':chiffreAffaire'   => (float)$chiffreAffaireColis,
            ':coutRevient'      => (float)$cout_revient
        ]);
    }


}