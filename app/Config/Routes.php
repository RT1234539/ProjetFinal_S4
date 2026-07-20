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
