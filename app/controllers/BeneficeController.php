<?php

namespace app\controllers;

use flight\Engine;
use app\models\BeneficeModel;

class BeneficeController {

    protected Engine $app;

    public function __construct($app) {
        $this->app = $app;
    }

    
public function calculBenefice($jour = null, $mois = null, $annee = null) {
    $beneficeModel = new BeneficeModel($this->app->db());
    return $beneficeModel->sommeBenefice($jour, $mois, $annee);
}



}
