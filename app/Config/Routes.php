<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group('frais', ['filter' => 'AuthFilter'], function ($routes) {
    $routes->get('ajouter', 'FraisController::ajouterForm');
    $routes->post('ajouter', 'FraisController::insert');
});

$routes->get('gains', 'GainsController::listeGains', ['filter' => 'AuthFilter']);

$routes->get('/', 'UtilisateurController::loginForm');
$routes->post('login', 'UtilisateurController::login');
