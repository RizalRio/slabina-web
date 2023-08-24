<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('admin', function($routes){
    $routes->get('', 'admin\Auth::index');
    $routes->get('auth', 'admin\Auth::auth');

    $routes->group('dashboard', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Dashboard::index');
    });

    $routes->group('pengguna', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Pengguna::index');
        $routes->post('add', 'admin\Pengguna::add');
        $routes->post('edit', 'admin\Pengguna::edit');
        $routes->post('get', 'admin\Pengguna::get');
        $routes->post('data', 'admin\Pengguna::data');
        $routes->post('delete', 'admin\Pengguna::delete');
    });

    $routes->group('tentang', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Tentang::index');
        $routes->post('add', 'admin\Tentang::add');
        $routes->post('edit', 'admin\Tentang::edit');
        $routes->post('get', 'admin\Tentang::get');
        $routes->post('data', 'admin\Tentang::data');
        $routes->post('delete', 'admin\Tentang::delete');
    });

    $routes->group('galery', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Galeri::index');
        $routes->post('add', 'admin\Galeri::add');
        $routes->post('edit', 'admin\Galeri::edit');
        $routes->post('get', 'admin\Galeri::get');
        $routes->post('data', 'admin\Galeri::data');
        $routes->post('delete', 'admin\Galeri::delete');
        $routes->post('select', 'admin\Galeri::select');
    });

    $routes->group('slide', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Slide::index');
        $routes->post('add', 'admin\Slide::add');
        $routes->post('edit', 'admin\Slide::edit');
        $routes->post('get', 'admin\Slide::get');
        $routes->post('data', 'admin\Slide::data');
        $routes->post('delete', 'admin\Slide::delete');
        $routes->post('select', 'admin\Slide::select');
    });

    $routes->group('configuration', ['filter' => 'authfilter'], function($routes){
        $routes->get('', 'admin\Konfigurasi::index');
        $routes->post('edit', 'admin\Konfigurasi::edit');
        $routes->post('data', 'admin\Konfigurasi::data');
    });
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
