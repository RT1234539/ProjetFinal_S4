<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('frais', function ($routes) {
    $routes->get('ajouter', 'FraisController::ajouter');
    $routes->post('ajouter', 'FraisController::insert');
});
