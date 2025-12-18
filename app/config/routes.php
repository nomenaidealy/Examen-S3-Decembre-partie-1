<?php

use app\controllers\ApiExampleController;
use app\controllers\LivraisonController;
use app\controllers\ColisController;
use app\controllers\BeneficeController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    $router->get('/', function () use ($app) {
        $app->render('accueil', ['message' => 'Bienvenue']);
    });

    $router->get('/test', function() use ($app) {
        echo '<h1> Test de routages </h1>';
    });

    $router->get('/hello-world/@name', function($name) {
        echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
    });

    $router->group('/livraison', function() use ($router) {
        $router->get('/form', [ LivraisonController::class, 'afficherFormulaireAjout' ]);
        $router->post('/store', [ LivraisonController::class, 'insererLivraison' ]);
        $router->get('/list', [ LivraisonController::class, 'afficherLivraisons' ]);
    });


    $router->group('/api', function() use ($router) {
        $router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
        $router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
        $router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
    });

    
    $router->group('/colis', function() use ($router, $app)  {
        $router->get('/form', function() use ($app) {
            $app->render('formColis', ['message'=> 'Direction vers colis.php']);
        });
        $router->post('/ajout', [ ColisController::class, 'insererColis' ]) ;
        $router->get('/list', [ ColisController::class, 'afficherColis']);
    });

  
$router->group('/benefice', function() use ($router, $app) {

    
    $router->get('/form', function() use ($app) {
        $app->render('formBenefice', ['message' => 'Direction vers benefice.php', 'resultat' => null]);
    });

   
    $router->post('/filtre', function() use ($app) {
        $jour  = $app->request()->data->jour !== '' ? (int)$app->request()->data->jour : null;
        $mois  = $app->request()->data->mois !== '' ? (int)$app->request()->data->mois : null;
        $annee = $app->request()->data->annee !== '' ? (int)$app->request()->data->annee : null;

        $controller = new \app\controllers\BeneficeController($app);
        $benefice = $controller->calculBenefice($jour, $mois, $annee);

        $app->render('formBenefice', [
            'message' => 'Résultat du filtre',
            'resultat' => $benefice
        ]);
    });
});




    

  
        
}, [ SecurityHeadersMiddleware::class ]);