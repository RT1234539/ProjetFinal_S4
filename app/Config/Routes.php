<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes existantes
$routes->group('frais', function ($routes) {
    $routes->get('ajouter', 'FraisController::ajouterForm');
    $routes->post('ajouter', 'FraisController::insert');
    $routes->get('edit/(:num)', 'FraisController::edit/$1');
    $routes->post('update/(:num)', 'FraisController::update/$1');
    $routes->get('delete/(:num)', 'FraisController::delete/$1');
});

$routes->get('gains', 'GainsController::listeGains');

$routes->get('/', 'UtilisateurController::loginForm');
$routes->post('login', 'UtilisateurController::login');

// Routes opérateur - Préfixes
$routes->get('prefix', 'PrefixController::index');
$routes->get('prefix/form', 'PrefixController::form');
$routes->post('prefix/save', 'PrefixController::save');
$routes->get('prefix/edit/(:num)', 'PrefixController::edit/$1');
$routes->post('prefix/update/(:num)', 'PrefixController::update/$1');
$routes->get('prefix/delete/(:num)', 'PrefixController::delete/$1');

// Routes opérateur - Types d'opérations
$routes->get('operations', 'OperationController::index');
$routes->post('operations/save', 'OperationController::save');
$routes->get('operations/edit/(:num)', 'OperationController::edit/$1');
$routes->post('operations/update/(:num)', 'OperationController::update/$1');
$routes->get('operations/delete/(:num)', 'OperationController::supprimer/$1');

// Routes opérateur - Clients
$routes->get('clients', 'UtilisateurController::listeClients');

// Routes client
$routes->get('accueil', 'UtilisateurController::accueil');

$routes->group('clients', function ($routes) {
    $routes->get('solde', 'OperationUtilisateurController::voirSolde');
    $routes->get('depot', 'OperationUtilisateurController::depotForm');
    $routes->post('depot', 'OperationUtilisateurController::faireUnDepot');
    $routes->get('retrait', 'OperationUtilisateurController::retraitForm');
    $routes->post('retrait', 'OperationUtilisateurController::faireUnRetrait');
    $routes->get('transfert', 'OperationUtilisateurController::transfertForm');
    $routes->post('transfert', 'OperationUtilisateurController::faireUnTransfert');
    $routes->get('historique', 'OperationUtilisateurController::historique');
});
