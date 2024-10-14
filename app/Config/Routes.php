<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::getList');
$routes->group('users', function ($routes) {
    $routes->get('register', 'UserController::getRegister');
    $routes->get('edit/(:num)', 'UserController::getEdit/$1');
    $routes->get('delete/(:num)', 'UserController::deleteUser/$1');
    $routes->get('/', 'UserController::getList');

    $routes->post('register', 'UserController::saveUser');
    $routes->post('edit', 'UserController::editUser');
});
