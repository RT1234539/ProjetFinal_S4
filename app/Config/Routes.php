<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes publiques (login)
$routes->get('/', 'UtilisateurController::loginForm');
$routes->post('login', 'UtilisateurController::login');
$routes->get('logout', 'UtilisateurController::logout');

// Routes admin (role 1) — protégées par auth:admin
$routes->group('', ['filter' => 'auth:admin'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'UtilisateurController::dashboard');

    // Gains
    $routes->get('gains', 'GainsController::listeGains');

    // Frais
    $routes->group('frais', function ($routes) {
        $routes->get('ajouter', 'FraisController::ajouterForm');
        $routes->post('ajouter', 'FraisController::insert');
        $routes->get('edit/(:num)', 'FraisController::edit/$1');
        $routes->post('update/(:num)', 'FraisController::update/$1');
        $routes->get('delete/(:num)', 'FraisController::delete/$1');
    });

    // Préfixes
    $routes->get('prefix', 'PrefixController::index');
    $routes->get('prefix/form', 'PrefixController::form');
    $routes->post('prefix/save', 'PrefixController::save');
    $routes->get('prefix/edit/(:num)', 'PrefixController::edit/$1');
    $routes->post('prefix/update/(:num)', 'PrefixController::update/$1');
    $routes->get('prefix/delete/(:num)', 'PrefixController::delete/$1');

    // Autre opérateur
    $routes->get('autre-operateur', 'AutreOperateurController::index');
    $routes->get('autre-operateur/form', 'AutreOperateurController::form');
    $routes->post('autre-operateur/save', 'AutreOperateurController::save');
    $routes->get('autre-operateur/edit/(:num)', 'AutreOperateurController::edit/$1');
    $routes->post('autre-operateur/update/(:num)', 'AutreOperateurController::update/$1');
    $routes->get('autre-operateur/delete/(:num)', 'AutreOperateurController::delete/$1');
    $routes->get('autre-operateur/externe', 'AutreOperateurController::externeForm');
    $routes->post('autre-operateur/externe/save', 'AutreOperateurController::externeSave');
    $routes->get('autre-operateur/externe/delete/(:num)', 'AutreOperateurController::externeDelete/$1');

    // Types d'opérations
    $routes->get('operations', 'OperationController::index');
    $routes->post('operations/save', 'OperationController::save');
    $routes->get('operations/edit/(:num)', 'OperationController::edit/$1');
    $routes->post('operations/update/(:num)', 'OperationController::update/$1');
    $routes->get('operations/delete/(:num)', 'OperationController::supprimer/$1');

    // Clients (admin)
    $routes->get('clients', 'UtilisateurController::listeClients');
    $routes->get('clients/detail/(:num)', 'UtilisateurController::detailClient/$1');
});

// Routes client (role 2) — protégées par auth:client
$routes->group('', ['filter' => 'auth:client'], function ($routes) {

    $routes->get('accueil', 'UtilisateurController::accueil');

    $routes->group('clients', function ($routes) {
        $routes->get('solde', 'OperationUtilisateurController::voirSolde');
        $routes->get('depot', 'OperationUtilisateurController::depotForm');
        $routes->post('depot', 'OperationUtilisateurController::faireUnDepot');
        $routes->get('retrait', 'OperationUtilisateurController::retraitForm');
        $routes->post('retrait', 'OperationUtilisateurController::faireUnRetrait');
        $routes->get('transfert', 'OperationUtilisateurController::transfertForm');
        $routes->post('transfert', 'OperationUtilisateurController::faireUnTransfert');
        $routes->get('transfert-externe', 'OperationUtilisateurController::transfertExterneForm');
        $routes->post('transfert-externe', 'OperationUtilisateurController::faireTransfertExterne');
        $routes->get('transfert-multiple', 'OperationUtilisateurController::transfertMultipleForm');
        $routes->post('transfert-multiple', 'OperationUtilisateurController::faireTransfertMultiple');
        $routes->get('historique', 'OperationUtilisateurController::historique');
    });
});

$routes->group('', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('promotion', 'PromotionController::updateForm');
    $routes->post('promotion', 'PromotionController::update');
});
