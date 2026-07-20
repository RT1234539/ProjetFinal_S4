<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes existantes
$routes->group('frais', function ($routes) {
    $routes->get('ajouter', 'FraisController::ajouterForm');
    $routes->post('ajouter', 'FraisController::insert');
});

$routes->get('gains', 'GainsController::listeGains');

$routes->get('/', 'UtilisateurController::loginForm');
$routes->post('login', 'UtilisateurController::login');

$routes->get('prefix', 'PrefixController::index');
$routes->get('prefix/form', 'PrefixController::form');
$routes->post('prefix/save', 'PrefixController::save'); 


$routes->get('clients', 'UtilisateurController::listeClients');

// Routes client
$routes->get('accueil', 'UtilisateurController::accueil');

$routes->group('clients', function ($routes) {
    $routes->get('depot', 'OperationUtilisateurController::depotForm');
    $routes->post('depot', 'OperationUtilisateurController::faireUnDepot');
    $routes->get('retrait', 'OperationUtilisateurController::retraitForm');
    $routes->post('retrait', 'OperationUtilisateurController::faireUnRetrait');
    $routes->get('transfert', 'OperationUtilisateurController::transfertForm');
    $routes->post('transfert', 'OperationUtilisateurController::faireUnTransfert');
    $routes->get('historique', 'OperationUtilisateurController::historique');
});
