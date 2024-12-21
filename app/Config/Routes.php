<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// all pages for everyone
$routes->get('/', 'pages::index');
$routes->get('login', 'pages::login');
$routes->get('register', 'pages::register');
$routes->post('/register', 'Auth::register');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

//untuk pengguna
$routes->get('/detailpakaian/(:num)', 'pelanggan::detailpakaian/$1');
$routes->post('/pemesanan', 'pemesanan::pemesanan');
$routes->post('/buatpesanan', 'pemesanan::buatpesanan');
$routes->get('/detailorder', 'pemesanan::detailorder');
$routes->get('/lihatpesanan/(:num)', 'pemesanan::lihatpesanan/$1');

//untuk admin
$routes->get('admin/homeAdmin', 'admin::homeAdmin');
$routes->get('admin/pakaian', 'admin::pakaian');
$routes->get('admin/kategoripakaian', 'admin::kategoripakaian');
$routes->get('admin/metodepembayaran', 'admin::metodepembayaran');
$routes->get('admin/metodepengiriman', 'admin::metodepengiriman');
$routes->post('admin/tambahpakaian', 'admin::tambahpakaian');
$routes->post('admin/tambahkategori_p', 'admin::tambahkategori');
$routes->post('admin/kelolagambar', 'admin::kelolagambar_store');
$routes->get('admin/kelolagambar_v', 'admin::kelolagambar_v');

$routes->get('admin/viewtambahpakaian', 'admin::viewtambahpakaian');
$routes->get('admin/tambahkategori', 'admin::tambahkategori_v');
$routes->get('/jenisPakaian/(:num)', 'pelanggan::jenisPakaian/$1');





// $routes->get('auth/login', 'Auth::login');
// $routes->post('auth/login', 'Auth::login');
// $routes->get('auth/register', 'Auth::register');
// $routes->post('auth/register', 'Auth::register');
// $routes->get('auth/logout', 'Auth::logout');
