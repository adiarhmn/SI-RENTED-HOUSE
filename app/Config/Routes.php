<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', static function () {
    return redirect()->to('/dashboard');
});

// Public Routes
$routes->group('', static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
});

// Private Routes
$routes->group('', static function ($routes) {
    $routes->get('user', 'Admin\UserController::index');
    $routes->post('user', 'Admin\UserController::store');
    $routes->put('user/(:num)', 'Admin\UserController::update/$1');
    $routes->delete('user/(:num)', 'Admin\UserController::destroy/$1');
});
