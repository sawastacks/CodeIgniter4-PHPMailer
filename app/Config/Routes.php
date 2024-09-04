<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/contact', 'EmailController::index',['as'=>'index']);
$routes->post('/contact', 'EmailController::sendEmail',['as'=>'send']);
