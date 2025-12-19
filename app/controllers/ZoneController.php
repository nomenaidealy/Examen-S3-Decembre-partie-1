<?php

namespace app\controllers;

use flight\Engine;
use app\models\ZoneModel;

class ZoneController {

    protected Engine $app;

    public function __construct($app) {
        $this->app = $app;
    }

    public function afficherZones() {
        $zoneModel = new ZoneModel($this->app->db());
        $zones = $zoneModel->getAllZones();

        $this->app->render('zones.php', [
            'data' => $zones
        ]);
    }

    public function afficherFormulaireAjout() {
        $this->app->render('formZone.php');
    }

    public function insererZone() {
        $nom = $this->app->request()->data->nom;
        $pourcentage = $this->app->request()->data->pourcentage;

        $zoneModel = new ZoneModel($this->app->db());
        $zoneModel->insererZone($nom, (float)$pourcentage);

        $this->app->redirect('/zone/list');
    }
}
