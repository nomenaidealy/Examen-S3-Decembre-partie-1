<?php

namespace app\controllers;

use flight\Engine;
use app\models\ProduitModel;

class ProduitController {
    	
    protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

    public function getProduits () {
        $db = $this->app->db();
        $produitModel = new ProduitModel($db);
        $produits = $produitModel->getProduits();

        return $produits;
    }

    public function getProduit ($id) {
        $db = $this->app->db();
        $produitModel = new ProduitModel($db);
        $produits = $produitModel->getProduits();

        return $produits($id);
    }
}