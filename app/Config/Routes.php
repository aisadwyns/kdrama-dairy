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
$routes->get('/aktor', 'Aktor::index');
$routes->get('/kdrama/create', 'KDrama::create');
$routes->get('/kdrama/edit/(:segment)', 'KDrama::edit/$1');
$routes->post('/kdrama/save', 'KDrama::save');
$routes->post('/kdrama/save/(:num)', 'Kdrama::update/$1');
$routes->delete('kdrama/(:num)', 'KDrama::delete/$1');
$routes->get('/kdrama/(:any)', 'KDrama::detail/$1');
$routes->get('pages/(:segment)', 'Pages::detail/$1');
