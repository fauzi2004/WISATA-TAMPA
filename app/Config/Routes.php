<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('wisata', 'Wisata::index');
$routes->get('wisata/detail/(:num)', 'Wisata::detail/$1');
$routes->get('tentang', 'Tentang::index');

// Auth Routes
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::processLogin');
$routes->get('register', 'Auth::register');
$routes->post('register/process', 'Auth::processRegister');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('lupa-password', 'Auth::forgotPassword');
$routes->post('lupa-password/process', 'Auth::processForgotPassword');
$routes->get('reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('reset-password/process', 'Auth::processResetPassword');
// Pesanan Routes
$routes->get('pesanan', 'Pesanan::index');
$routes->post('pesanan/proses', 'Pesanan::proses');
$routes->get('pesanan/detail/(:num)', 'Pesanan::detail/$1');
$routes->post('pesanan/upload_bukti', 'Pesanan::upload_bukti');
$routes->get('pesanan/cetak/(:num)', 'Pesanan::cetak/$1');

// Profil Routes
$routes->get('profil', 'Profil::index');
$routes->post('profil/update', 'Profil::update');
$routes->get('profil/ubah_password', 'Profil::ubah_password');
$routes->post('profil/process_ubah_password', 'Profil::process_ubah_password');

// Notifikasi Routes
$routes->get('notifikasi/read/(:num)', 'Notifikasi::mark_read/$1');
$routes->get('notifikasi/read-all', 'Notifikasi::mark_all_read');
$routes->get('notifikasi/check-new', 'Notifikasi::check_new');

// Testimoni Routes
$routes->post('testimoni/simpan', 'Testimoni::simpan');

// Admin Routes
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // Admin Wisata Routes
    $routes->get('wisata', 'Admin\Wisata::index');
    $routes->get('wisata/tambah', 'Admin\Wisata::tambah');
    $routes->post('wisata/simpan', 'Admin\Wisata::simpan');
    $routes->get('wisata/edit/(:num)', 'Admin\Wisata::edit/$1');
    $routes->post('wisata/update/(:num)', 'Admin\Wisata::update/$1');
    $routes->get('wisata/hapus/(:num)', 'Admin\Wisata::hapus/$1');
    
    // Admin Pemesanan Routes
    $routes->get('pemesanan', 'Admin\Pemesanan::index');
    $routes->get('pemesanan/detail/(:num)', 'Admin\Pemesanan::detail/$1');
    $routes->post('pemesanan/konfirmasi/(:num)', 'Admin\Pemesanan::konfirmasi/$1');
    $routes->post('pemesanan/tolak/(:num)', 'Admin\Pemesanan::tolak/$1');
    // Admin Fasilitas Routes
    $routes->get('fasilitas', 'Admin\Fasilitas::index');
    $routes->post('fasilitas/tambah', 'Admin\Fasilitas::tambah');
    $routes->get('fasilitas/hapus/(:num)', 'Admin\Fasilitas::hapus/$1');
    
    // Admin Galeri Routes
    $routes->get('galeri', 'Admin\Galeri::index');
    $routes->post('galeri/tambah', 'Admin\Galeri::tambah');
    $routes->get('galeri/hapus/(:num)', 'Admin\Galeri::hapus/$1');
    
    // Admin User Routes
    $routes->get('user', 'Admin\User::index');
    $routes->post('user/tambah', 'Admin\User::tambah');
    $routes->post('user/update_role', 'Admin\User::update_role');
    $routes->post('user/reset_password', 'Admin\User::reset_password');
    $routes->get('user/hapus/(:num)', 'Admin\User::hapus/$1');
    
    // Admin Kategori Routes
    // Routes untuk admin profil
    $routes->get('profil', 'Admin\Profil::index');
    $routes->post('profil/update', 'Admin\Profil::update');

    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->post('kategori/tambah', 'Admin\Kategori::tambah');
    $routes->post('kategori/update', 'Admin\Kategori::update');
    $routes->get('kategori/hapus/(:num)', 'Admin\Kategori::hapus/$1');
    
    // Admin Testimoni Routes
    $routes->get('testimoni', 'Admin\Testimoni::index');
    $routes->get('testimoni/wisata/(:num)', 'Admin\Testimoni::wisata/$1');
    $routes->get('testimoni/setujui/(:num)', 'Admin\Testimoni::setujui/$1');
    $routes->get('testimoni/tolak/(:num)', 'Admin\Testimoni::tolak/$1');
    $routes->get('testimoni/hapus/(:num)', 'Admin\Testimoni::hapus/$1');
    
    // Admin Laporan Routes
    $routes->get('laporan/pendapatan', 'Admin\Laporan::pendapatan');
    
    // Admin Pengaturan Routes
    $routes->get('pengaturan/kontak', 'Admin\Pengaturan::kontak');
    $routes->post('pengaturan/update_kontak', 'Admin\Pengaturan::update_kontak');
    $routes->get('pengaturan/profile_desa', 'Admin\Pengaturan::profile_desa');
    $routes->post('pengaturan/update_profile', 'Admin\Pengaturan::update_profile');
    $routes->get('pengaturan/tampilan_web', 'Admin\Pengaturan::tampilan_web');
    $routes->post('pengaturan/update_tampilan_web', 'Admin\Pengaturan::update_tampilan_web');
});
