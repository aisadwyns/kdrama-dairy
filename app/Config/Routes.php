<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/home', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');
$routes->get('/kdrama', 'KDrama::index');
$routes->get('/kdrama/create', 'KDrama::create');
$routes->post('/kdrama/save', 'KDrama::save');
$routes->get('/kdrama/(:segment)', 'KDrama::detail/$1');
