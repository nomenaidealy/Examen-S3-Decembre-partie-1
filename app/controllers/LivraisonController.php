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

}