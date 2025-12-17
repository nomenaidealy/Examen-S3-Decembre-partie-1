<?php

namespace app\controllers;

use flight\Engine;
use app\models\ColisModel;

class ColisController {

    protected Engine $app;

    public function __construct($app) {
        $this->app = $app;
    }

    // =============================
    // AFFICHER LISTE DES COLIS
    // =============================
    public function afficherColis() {
        $colisModel = new ColisModel($this->app->db());
        $colis = $colisModel->getListColis();

        $this->app->render('colis', [
            'data' => $colis
        ]);
    }

    // =============================
    // AFFICHER FORMULAIRE AJOUT
    // =============================
    public function afficherFormulaireAjout() {
        $this->app->render('formColis');
    }

    // =============================
    // TRAITEMENT INSERTION
    // =============================
    public function insererColis() {
        $description = $this->app->request()->data->description;
        $poids = $this->app->request()->data->poids;


        $colisModel = new ColisModel($this->app->db());
        $colisModel->insertColis($description, $poids);

        $this->app->redirect('/colis/list');
    }
}
