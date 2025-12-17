<?php

namespace app\controllers;

use flight\Engine;
use app\models\LivraisonModel;
use app\models\ColisModel;
use app\models\LivreurModel;
use app\models\VehiculeModel;

class LivraisonController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

    /*public function afficherLivraisons() {
        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisons = $livraisonModel->getLivraisonS();

        $this->app->render('accueil.php', [
            'data' => $livraisons
        ]);
    }*/

    public function afficherFormulaireAjout() {
        $colisModel = new ColisModel($this->app->db());
        $colis = $colisModel->getListColisAvailable();

        $livreurModel = new LivreurModel($this->app->db());
        $livreurs = $livreurModel->getListLivreurs();

        $vehiculeModel = new VehiculeModel($this->app->db());
        $vehicules = $vehiculeModel->getListVehicules();

        $this->app->render('formLivraison.php', [
            'colis'     => $colis,
            'livreurs'  => $livreurs,
            'vehicules' => $vehicules
        ]);
    }

    public function insererLivraison() {
        $idColis = $this->app->request()->data->idColis;
        $adresse_destination = $this->app->request()->data->adresse_destination;
        $date_livraison = $this->app->request()->data->date_livraison;
        $idVehicule = $this->app->request()->data->idVehicule;
        $idChauffeur = $this->app->request()->data->idChauffeur;
        $coutVehicule = $this->app->request()->data->cout_vehicule;
        $addresse_depart = "Entrepot Central"; // Adresse fixe pour le dépôt

        if (empty($idColis) || empty($adresse_destination) || empty($date_livraison) || empty($idVehicule) || empty($idChauffeur)) {
            $this->app->redirect('/livraison/form');
            return;
        }

        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisonModel->insertLivraison($idColis, $addresse_depart, $adresse_destination, $date_livraison, $idVehicule, $idChauffeur, $coutVehicule);

        $this->app->redirect('/');
    }


}