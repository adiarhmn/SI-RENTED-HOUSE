<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Public\DashboardController::index');

// Public Routes
$routes->group('', static function ($routes) {
});

// Before Auth Routes [Route Tidak Memiliki Session]
$routes->group('', static function ($routes) {
    $routes->get('login', 'AuthController::index');
    $routes->post('login', 'AuthController::Login');
});

// After Routes [Route Harus Memiliki Session]
$routes->group('', static function ($routes) {
    $routes->get('logout', 'AuthController::logout');

    // Rent
    $routes->get('rent', 'Public\RentController::index');
    $routes->post('rent', 'Public\RentController::store');
    $routes->put('rent/(:num)', 'Public\RentController::update/$1');
    $routes->delete('rent/(:num)', 'Public\RentController::destroy/$1');
});

// Private Routes Tenant
$routes->group('penyewa', ['filter' => 'TenantFilter'], static function ($routes) {
    $routes->get('dashboard', 'Public\DashboardController::DashboardTenant');
    $routes->get('profile', 'Public\ProfileController::index');
    $routes->get('property', 'Public\PropertyController::index');
});


// Private Routes Admin
$routes->group('', ['filter' => 'AdminFilter'], static function ($routes) {

    $routes->get('dashboard', 'Admin\DashboardController::index');
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
    $routes->get('detail-property/(:num)', 'Admin\DetailPropertyController::index/$1');
    $routes->post('detail-property/(:num)', 'Admin\DetailPropertyController::store/$1');
    $routes->put('detail-property/(:num)', 'Admin\DetailPropertyController::update/$1');
    $routes->delete('detail-property/(:num)', 'Admin\DetailPropertyController::destroy/$1');

    // Payment
    $routes->get('payment', 'Admin\PaymentController::index');
    $routes->post('payment', 'Admin\PaymentController::store');
    $routes->post('payment/process', 'Admin\PaymentController::process');
    $routes->put('payment/(:num)', 'Admin\PaymentController::update/$1');
    $routes->delete('payment/(:num)', 'Admin\PaymentController::destroy/$1');
});
