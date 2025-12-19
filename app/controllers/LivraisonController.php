<?php

namespace app\controllers;

use flight\Engine;
use app\models\LivraisonModel;
use app\models\ColisModel;
use app\models\LivreurModel;
use app\models\VehiculeModel;
use app\models\ZoneModel;

class LivraisonController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

    public function afficherLivraisons() {
        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisons = $livraisonModel->getLivraisonS();

        $this->app->render('livraison.php', [
            'data' => $livraisons
        ]);
    }

    public function afficherFormulaireAjout() {
        $colisModel = new ColisModel($this->app->db());
        $colis = $colisModel->getListColisAvailable();

        $livreurModel = new LivreurModel($this->app->db());
        $livreurs = $livreurModel->getListLivreurs();

        $vehiculeModel = new VehiculeModel($this->app->db());
        $vehicules = $vehiculeModel->getListVehicules();

        $zoneModel = new ZoneModel($this->app->db());
        $zones = $zoneModel->getAllZones();


        $this->app->render('formLivraison.php', [
            'colis'     => $colis,
            'livreurs'  => $livreurs,
            'vehicules' => $vehicules,
            'zones'     => $zones
        ]);
    }

    public function insererLivraison() {
        $idColis = $this->app->request()->data->idColis;
        $adresse_destination = $this->app->request()->data->adresse_destination;
        $date_livraison = $this->app->request()->data->date_livraison;
        $idVehicule = $this->app->request()->data->idVehicule;
        $idChauffeur = $this->app->request()->data->idChauffeur;
        $coutVehicule = $this->app->request()->data->cout_vehicule;
        $idZone = $this->app->request()->data->idZone;
        $addresse_depart = "Entrepot Central"; // Adresse fixe pour le dépôt

        if (empty($idColis) || empty($adresse_destination) || empty($date_livraison) || empty($idVehicule) || empty($idChauffeur)) {
            $this->app->redirect('/livraison/form');
            return;
        }

        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisonModel->insertLivraison($idColis, $addresse_depart, $adresse_destination, $date_livraison, $idVehicule, $idChauffeur, $coutVehicule, $idZone);

        $this->app->redirect('/');
    }

    public function afficherFormulaireChangerStatut($id) {
        $idLivraison = $id;

        $livraisonModel = new LivraisonModel($this->app->db());
        $statuts = $livraisonModel->getStatuts();

        $this->app->render('formEtatLivraison.php', [
            'idLivraison' => $idLivraison,
            'data' => $statuts
        ]);
    }

    public function changerStatutLivraison() {
        $idLivraison = $this->app->request()->data->idLivraison;
        $idStatut = $this->app->request()->data->idStatut;

        if (empty($idLivraison) || empty($idStatut)) {
            $this->app->redirect('/');
            return;
        }

        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisonModel->updateStatutLivraison($idLivraison, $idStatut);

        $this->app->redirect('/livraison/list');
    }

    public function afficherFormSuppAll() {
        $this->app->render('confirmDelete.php');
    }

    public function supprimerToutesLivraisons($code) {
        $livraisonModel = new LivraisonModel($this->app->db());

        if ($code != 9999) {
            $this->app->render('confirmDelete.php', [
                'error' => 'Code de confirmation incorrect. La suppression a été annulée.'
            ]);
            return;
        }
        $livraisonModel->deleteAllLivraisons();

        $this->app->redirect('/livraison/list');
    }

}