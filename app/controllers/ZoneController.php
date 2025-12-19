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

    public function afficherFormulaireModification($id) {
        $zoneModel = new ZoneModel($this->app->db());
        $zones = $zoneModel->getAllZones();

        $zoneToEdit = null;
        foreach ($zones as $zone) {
            if ((int)$zone['id'] === (int)$id) {
                $zoneToEdit = $zone;
                break;
            }
        }

        if ($zoneToEdit === null) {
            $this->app->redirect('/zone/list');
            return;
        }

        $this->app->render('editZone.php', [
            'zone' => $zoneToEdit
        ]);
    }

    public function modifierZone() {
        $id = $this->app->request()->data->id;
        $nom = $this->app->request()->data->nom;
        $pourcentage = $this->app->request()->data->pourcentage;

        $zoneModel = new ZoneModel($this->app->db());
        $zoneModel->updateZone($id, $nom, (float)$pourcentage);

        $this->app->redirect('/zone/list');;
    }

    public function supprimerZone($id) {
        $zoneModel = new ZoneModel($this->app->db());
        $zoneModel->deleteZone($id);
        $this->app->redirect('/zone/list');
    }
}
