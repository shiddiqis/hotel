<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*$1 yaitu nama boleh semua jenis data (:any) */
/*kedua $2 untuk umur hanya boleh angka saja :num */
$routes->get('/nama/(:any)/(:num)', 'Web::nama/$1/$2');
// $routes->get('/biodata', 'Web::biodata');

/*route untuk function hitung dan proses*/
$routes->get('/hitung', 'Web::hitung');
$routes->post('/hitung/proses', 'Web::proses');

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
/* GET=langsung tulis di url | POST=harus melewati proses */
/*('untuk menamai url','alamat controller dan function')*/
$routes->get('/', 'Kamar::index');
$routes->get('/register', 'Auth::showRegister');
$routes->post('/daftar', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');
//======================================
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);
$routes->post('/admin/save', 'Admin::save', ['filter' => 'auth']);
$routes->get('/user', 'Kamar::user', ['filter' => 'auth']);
//======================================
$routes->get('/admin/(:any)/edit', 'Admin::edit/$1', ['filter' => 'auth']);
$routes->put('/admin', 'Admin::update', ['filter' => 'auth']);
$routes->get('/admin/(:any)/delete', 'admin::destroy/$1', ['filter' => 'auth']);
//======================================
$routes->get('/kamar', 'Kamar::kamar', ['filter' => 'auth']);
$routes->post('/kamar/save', 'Kamar::save', ['filter' => 'auth']);
//======================================
$routes->get('/kamar/(:any)/edit', 'Kamar::edit/$1', ['filter' => 'auth']);
$routes->put('/kamar', 'Kamar::update', ['filter' => 'auth']);
$routes->get('/kamar/(:any)/delete', 'Kamar::destroy/$1', ['filter' => 'auth']);
//======================================
$routes->get('/reservasi/(:any)/edit', 'reservasi::edit/$1', ['filter' => 'auth']);
$routes->put('/reservasi', 'reservasi::index', ['filter' => 'auth']);
$routes->put('/reservasi/filter', 'reservasi::filterReservasi', ['filter' => 'auth']);
$routes->get('/reservasi/(:any)/delete', 'reservasi::destroy/$1', ['filter' => 'auth']);
//======================================
$routes->get('/pemesanan/(:any)', 'Pesan::pemesanan/$1', ['filter' => 'auth']);
//======================================
$routes->get('/kamar', 'Kamar::kamar', ['filter' => 'auth']);
$routes->post('/kamar/save', 'Kamar::save', ['filter' => 'auth']);
//=======================================
$routes->get('/fasilitas/(:any)/edit', 'Fasilitas::edit/$1', ['filter' => 'auth']);
$routes->put('/fasilitas', 'Fasilitas::update', ['filter' => 'auth']);
$routes->get('/fasilitas/(:any)/delete', 'Fasilitas::destroy/$1', ['filter' => 'auth']);
$routes->post('/pesanKamar', 'Pesan::pesanKamar', ['filter' => 'auth']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
