<?php

namespace app\controllers;

use flight\Engine;
use app\models\DetailsModel;
use app\models\ProduitModel;

class DetailController {
    	
    protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function getInformationProduit ($id_produit) {

		$db = $this->app->db();

		$detailsModel = new DetailsModel($db);
		$details = $detailsModel->getDetail($id_produit);	

		$produitModel = new ProduitModel($db);
		$produit = $produitModel->getProduit($id_produit);

		$information_produit = [
			'image' => $produit['image'],
			'nom' => $produit['nom'],
			'prix' => $produit['prix'],
			'description' => $details['description'],
		];
		return $information_produit;
	}
}