<?php

namespace app\controllers;

use flight\Engine;
use app\models\BeneficeModel;

class BeneficeController {

    protected Engine $app;

    public function __construct($app) {
        $this->app = $app;
    }

    
    public function calculBenefice() {
        $jour  = $this->app->request()->data->jour !== '' ? (int)$this->app->request()->data->jour : null;
        $mois  = $this->app->request()->data->mois !== '' ? (int)$this->app->request()->data->mois : null;
        $annee = $this->app->request()->data->annee !== '' ? (int)$this->app->request()->data->annee : null;

        $beneficeModel = new BeneficeModel($this->app->db());
        $benefice = $beneficeModel->sommeBenefice($jour, $mois, $annee);

        $this->app->render('formBenefice', [
            'message' => 'Résultat du filtre',
            'resultat' => $benefice
        ]);
    }



}
