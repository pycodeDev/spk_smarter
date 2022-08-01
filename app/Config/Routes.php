<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::p_login');

$routes->get('/logout', 'Home::logout');

$routes->get('/dashboard', 'Admin\Dashboard::index', ['filter' => 'cekLogin']);
$routes->get('/profil', 'Admin\Dashboard::profil', ['filter' => 'cekLogin']);
$routes->get('/stok', 'Admin\Dashboard::stok', ['filter' => 'cekLogin']);
$routes->get('/chart', 'Admin\Dashboard::chart', ['filter' => 'cekLogin']);

// Produk
$routes->get('/produk', 'Admin\Products::index', ['filter' => 'cekLogin']);
$routes->get('/produk/add', 'Admin\Products::add', ['filter' => 'cekLogin']);
$routes->post('/produk/', 'Admin\Products::store', ['filter' => 'cekLogin']);
$routes->add('/produk/edit/(:num)', 'Admin\Products::edit/$1', ['filter' => 'cekLogin']);
$routes->post('/produk/(:num)', 'Admin\Products::update/$1', ['filter' => 'cekLogin']);
$routes->get('/produk/(:num)', 'Admin\Products::delete/$1', ['filter' => 'cekLogin']);

// Produk Masuk
$routes->get('/produk_masuk', 'Admin\Products_masuk::index', ['filter' => 'cekLogin']);
$routes->get('/produk_masuk/detail/(:alphanum)', 'Admin\Products_masuk::detail/$1', ['filter' => 'cekLogin']);
$routes->get('/produk_masuk/add/(:alphanum)', 'Admin\Products_masuk::add/$1', ['filter' => 'cekLogin']);
$routes->post('/produk_masuk/(:alphanum)', 'Admin\Products_masuk::store/$1', ['filter' => 'cekLogin']);
$routes->get('/produk_masuk/edit/(:num)', 'Admin\Products_masuk::edit', ['filter' => 'cekLogin']);
$routes->post('/produk_masuk/(:num)', 'Admin\Products_masuk::update', ['filter' => 'cekLogin']);
$routes->get('/produk_masuk/(:num)/(:alphanum)', 'Admin\Products_masuk::delete/$1/$2', ['filter' => 'cekLogin']);

// Produk Keluar
$routes->get('/produk_keluar', 'Admin\Products_keluar::index', ['filter' => 'cekLogin']);
$routes->get('/produk_keluar/detail/(:alphanum)', 'Admin\Products_keluar::detail/$1', ['filter' => 'cekLogin']);
$routes->get('/produk_keluar/add/(:alphanum)', 'Admin\Products_keluar::add/$1', ['filter' => 'cekLogin']);
$routes->post('/produk_keluar/(:alphanum)', 'Admin\Products_keluar::store/$1', ['filter' => 'cekLogin']);
$routes->get('/produk_keluar/edit/(:num)', 'Admin\Products_keluar::edit', ['filter' => 'cekLogin']);
$routes->post('/produk_keluar/(:num)', 'Admin\Products_keluar::update', ['filter' => 'cekLogin']);
$routes->get('/produk_keluar/(:num)/(:alphanum)', 'Admin\Products_keluar::delete/$1/$2', ['filter' => 'cekLogin']);

// Kelola Kriteria
$routes->get('/kriteria', 'Admin\Kriteria::index', ['filter' => 'cekLogin']);
$routes->get('/kriteria/add', 'Admin\Kriteria::add', ['filter' => 'cekLogin']);
$routes->post('/kriteria', 'Admin\Kriteria::store', ['filter' => 'cekLogin']);
$routes->get('/kriteria/del', 'Admin\Kriteria::delete', ['filter' => 'cekLogin']);

// Kelola Sub Kriteria
$routes->get('/sub_kriteria', 'Admin\Sub_kriteria::index', ['filter' => 'cekLogin']);
$routes->post('/search', 'Admin\Sub_kriteria::search', ['filter' => 'cekLogin']);
$routes->get('/sub_kriteria/add/(:alphanum)', 'Admin\Sub_kriteria::add/$1', ['filter' => 'cekLogin']);
$routes->post('/sub_kriteria/(:alphanum)', 'Admin\Sub_kriteria::store/$1', ['filter' => 'cekLogin']);
$routes->get('/sub_kriteria/del/(:alphanum)', 'Admin\Sub_kriteria::delete/$1', ['filter' => 'cekLogin']);

// Kelola Alternatif
$routes->get('/alternatif', 'Admin\Alternatif::index', ['filter' => 'cekLogin']);
$routes->get('/alternatif/add', 'Admin\Alternatif::add', ['filter' => 'cekLogin']);
$routes->post('/alternatif/', 'Admin\Alternatif::store', ['filter' => 'cekLogin']);
$routes->add('/alternatif/edit/(:num)', 'Admin\Alternatif::edit/$1', ['filter' => 'cekLogin']);
$routes->post('/alternatif/(:num)', 'Admin\Alternatif::update/$1', ['filter' => 'cekLogin']);
$routes->get('/alternatif/(:num)', 'Admin\Alternatif::delete/$1', ['filter' => 'cekLogin']);

// Kelola Perangkingan
$routes->get('/rank', 'Admin\Perangkingan::index', ['filter' => 'cekLogin']);
$routes->get('/rank/add/(:num)', 'Admin\Perangkingan::add/$1', ['filter' => 'cekLogin']);
$routes->post('/rank/(:num)', 'Admin\Perangkingan::store/$1', ['filter' => 'cekLogin']);
$routes->get('/rank/(:num)', 'Admin\Perangkingan::delete/$1', ['filter' => 'cekLogin']);

//perangkingan
$routes->get('/eksekusi', 'Admin\Perangkingan::smarter', ['filter' => 'cekLogin']);

//laporan
$routes->get('/laporan', 'Admin\Perangkingan::laporan', ['filter' => 'cekLogin']);
$routes->get('/laporan/download', 'Admin\Perangkingan::laporan_html', ['filter' => 'cekLogin']);

// error Login Page Auth
$routes->get('/(:alphanum)', 'Home::index/$1');

/**
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
