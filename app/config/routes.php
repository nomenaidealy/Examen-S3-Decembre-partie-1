<?php

use app\controllers\ApiExampleController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    $router->get('/', function() use ($app) {
		$produitController = new ProduitController($app);
		$produits = $produitController->getProduits();
		$app->render('accueil', ['produits' => $produits]);
    });

    $router->get('/test', function() use ($app) {
        echo '<h1> Test de routages </h1>';
    });

    $router->get('/hello-world/@name', function($name) {
        echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
    });

	$router->get('/produit/@id:[0-9]', function($id) use ($app) {
		$detailController = new DetailController($app);
		$information_produit = $detailController->getInformationProduit($id);
		$app->render('produit', ['produit' => $information_produit]);
	});


    $router->group('/api', function() use ($router) {
        $router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
        $router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
        $router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
    });
    
}, [ SecurityHeadersMiddleware::class ]);