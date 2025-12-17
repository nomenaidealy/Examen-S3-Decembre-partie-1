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

    public function afficherLivraisons() {
        $livraisonModel = new LivraisonModel($this->app->db());
        $livraisons = $livraisonModel->getLivraisonS();

        $this->app->render('accueil.php', [
            'data' => $livraisons
        ]);
    }

    public function afficherFormulaireAjout() {
        $colisModel = new ColisModel($this->app->db());
        $colis = $colisModel->getListColis();

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


}