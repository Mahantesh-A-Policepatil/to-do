<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerSubmit');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginSubmit');

$routes->get('/logout', 'AuthController::logout');

//$routes->group('tasks', ['filter' => 'auth'], function ($routes) {
$routes->get('tasks', 'TaskController::index');
$routes->get('tasks/create', 'TaskController::create');
$routes->post('tasks/store', 'TaskController::store');
$routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('tasks/delete/(:num)', 'TaskController::delete/$1');
//});