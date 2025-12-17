<?php

use app\controllers\ApiExampleController;
use app\controllers\LivraisonController;
use app\controllers\ColisController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    $router->get('/', [ LivraisonController::class, 'afficherLivraisons' ]);

    $router->get('/test', function() use ($app) {
        echo '<h1> Test de routages </h1>';
    });

    $router->get('/hello-world/@name', function($name) {
        echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
    });

    $router->group('/livraison', function() use ($router) {
        $router->get('/form', [ LivraisonController::class, 'afficherFormulaireAjout' ]);
        $router->post('/store', [ LivraisonController::class, 'insererLivraison' ]);
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

    

  
        
}, [ SecurityHeadersMiddleware::class ]);