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
}
