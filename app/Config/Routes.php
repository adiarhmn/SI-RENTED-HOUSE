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
    // Users
    $routes->get('user', 'Admin\UserController::index');
    $routes->post('user', 'Admin\UserController::store');
    $routes->put('user/(:num)', 'Admin\UserController::update/$1');
    $routes->delete('user/(:num)', 'Admin\UserController::destroy/$1');

    // Tenant
    $routes->get('tenant', 'Admin\TenantController::index');
    $routes->post('tenant', 'Admin\TenantController::store');
    $routes->put('tenant/(:num)', 'Admin\TenantController::update/$1');
    $routes->delete('tenant/(:num)', 'Admin\TenantController::destroy/$1');

    // Property
    $routes->get('property', 'Admin\PropertyController::index');
    $routes->post('property', 'Admin\PropertyController::store');
    $routes->put('property/(:num)', 'Admin\PropertyController::update/$1');
    $routes->delete('property/(:num)', 'Admin\PropertyController::destroy/$1');


    // Detail Property
    $routes->get('detail-property', 'Admin\DetailPropertyController::index');
    $routes->post('detail-property', 'Admin\DetailPropertyController::store');
    $routes->put('detail-property/(:num)', 'Admin\DetailPropertyController::update/$1');
    $routes->delete('detail-property/(:num)', 'Admin\DetailPropertyController::destroy/$1');
    
});
