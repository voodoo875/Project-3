<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->get('/login/register', 'Login::register');
$routes->post('/login/save', 'Login::save');
$routes->post('/login/proses', 'Login::proses');
$routes->get('login/keluar', 'Login::keluar');

$routes->group('admin', function ($routes) {
    $routes->add('/', 'admin\Home::index');
    $routes->get('home', 'admin\Home::index');
    $routes->get('wisata', 'admin\Wisata::index');
    $routes->add('wisata/add', 'admin\Wisata::add');
    $routes->post('wisata/save', 'admin\Wisata::save');
    $routes->get('wisata/edit/(:segment)', 'admin\Wisata::edit/$1');
    $routes->post('wisata/update', 'admin\Wisata::update');
    $routes->get('wisata/delete/(:segment)', 'admin\Wisata::delete/$1');

    $routes->get('login', 'admin\Login::index');
    $routes->post('login/cek', 'admin\Login::cek');
    $routes->get('login/keluar', 'admin\Login::keluar');

    $routes->get('petugas', 'admin\petugas::index');
    $routes->get('petugas/add', 'admin\petugas::add');
    $routes->post('petugas/save', 'admin\petugas::save');
    $routes->get('petugas/edit/(:segment)', 'admin\petugas::edit/$1');
    $routes->post('petugas/update', 'admin\petugas::update');
    $routes->get('petugas/delete/(:segment)', 'admin\petugas::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
