<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('auth', function ($routes) {
    $routes->get('login', 'UtilisateurController::loginForm');
    $routes->get('register', 'UtilisateurController::registerForm');

    $routes->post('login', 'UtilisateurController::login');
    $routes->post('register', 'UtilisateurController::register');
});
