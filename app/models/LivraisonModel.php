<?php

namespace app\models;

use Flight;

class LivraisonModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getLivraisonS () {   
        $stmt = $this->db->prepare("SELECT * FROM el_v_livraison");
        $stmt->execute();
        $livraisons = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $livraisons;
    }

    public function insertLivraison(
        $idColis,
        $adresse_depart,
        $adresse_destination,
        $date_livraison,
        $idVehicule,
        $idChauffeur,
        $coutVehicule,
        $idZone,
        $pourcentage_zone
    ) {
        // ID du statut "En attente"
        $idStatus = 1;

        $livreurModel = new LivreurModel($this->db);
        $colisModel   = new ColisModel($this->db);

        $salaireChauffeur     = $livreurModel->getSalaireAvecZoneByChauffeurAndDate($idChauffeur, $date_livraison, $pourcentage_zone, $idColis, $date_livraison);
        $chiffreAffaireColis  = $colisModel->getChiffreAffaireCalcule($idColis, $date_livraison);

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
                cout_revient,
                idZone,
                pourcentage_zone
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
                :coutRevient,
                :idZone,
                :pourcentage_zone
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
            ':coutRevient'      => (float)$cout_revient,
            ':idZone'           => (int)$idZone,
            ':pourcentage_zone' => (float)$pourcentage_zone
        ]);
        $colisModel->updateStatutColis($idColis, 'livraison');
    }

    public function getStatuts() {
        $stmt = $this->db->prepare("SELECT * FROM el_statut_livraison");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateStatutLivraison(int $idLivraison, int $idStatut) {
        $sql = "UPDATE el_livraison SET idStatut = :idStatut WHERE id = :idLivraison";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'idStatut'   => $idStatut,
            'idLivraison' => $idLivraison
        ]);
    }

    public function deleteAllLivraisons() {
        $sql = "DELETE FROM el_livraison";
        $colisModel = new ColisModel($this->db);
        $colisModel->resetAll();

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

}