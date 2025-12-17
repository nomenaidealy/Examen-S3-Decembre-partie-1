<?php

namespace app\controllers;

use flight\Engine;
use app\models\LivraisonModel;

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
        $coliseurModel = new ColisModel($this->app->db());
        $colis = $coliseurModel->getListColis();

        $livreurModel = new LivreurModel($this->app->db());
        $livreurs = $livreurModel->getListLivreurs();

        $vehiculeModel = new VehiculeModel($this->app->db());
        $vehicules = $vehiculeModel->getListVehicules();

        $this->app->set('colis', $colis);
        $this->app->set('livreurs', $livreurs);
        $this->app->set('vehicules', $vehicules);

        $this->app->render('formLivraison.php');
    }

}