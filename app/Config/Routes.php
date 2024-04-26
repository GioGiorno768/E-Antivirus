<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

# Keterangan:
# Home = Nama File Controller
# index = Nama Function/Method
$routes->get('/', 'Member\AuthController::index');
$routes->get('/', 'Super\AuthAdminController::index');


// group yang harus login user (memiliki session)
$routes->group("dashboard", ["filter" => "authuserfilter"], function($routes){
    $routes->get('', 'Member\HomeController::dashboard');
    $routes->post('changePassword', 'Member\UserController::change_password');
});

// group yang harus login admin (memiliki session)
$routes->group("administrator", ["filter" => "authadminfilter"], function($routes){
    $routes->get('dashboard', 'Super\AdminController::dashboard');
    $routes->get('master-admin', 'Super\AdminController::masteradmin');
    $routes->get('master-admin-dtss', 'Super\AdminController::masteradmin_datatable_ss');
    $routes->get('master-admin/edit/(:num)', 'Super\AdminController::edit_masteradmin/$1');
    $routes->post('master-admin/update/(:num)', 'Super\AdminController::update_masteradmin/$1');
    $routes->get('master-admin/delete/(:num)', 'Super\AdminController::delete_masteradmin/$1');
    $routes->get('master-admin/proses_delete/(:num)', 'Super\AdminController::prosesDeleteAdmin/$1');
    $routes->get('master-user', 'Super\AdminController::masteruser');
    $routes->get('master-user-dtss', 'Super\AdminController::masteruser_datatable_ss');
    $routes->get('master-user/edit/(:num)', 'Super\AdminController::edit_masteruser/$1');
    $routes->post('master-user/update/(:num)', 'Super\AdminController::update_masteruser/$1');
    $routes->get('master-user/delete/(:num)', 'Super\AdminController::delete_masteruser/$1');
    $routes->get('master-user/proses_delete/(:num)', 'Super\AdminController::prosesDelete/$1');
    $routes->post('tambah-user', 'Super\AdminController::tambah_user');
    $routes->post('tambah-admin', 'Super\AdminController::tambah_admin');
    $routes->get('rekap-keperluan-user', 'Super\AdminController::rekapkeperluanuser');
    $routes->get('rekap-keperluan-user-dtss', 'Super\AdminController::rekapkeperluanuser_datatable_ss');
    $routes->get('rekap-keperluan-user/edit/(:num)', 'Super\AdminController::edit_rekapkeperluanuser/$1');
    
});

// Auth Route user
$routes->get('/login', 'Member\AuthController::login');
$routes->post('/login', 'Member\AuthController::login_action');
$routes->get('/logout', 'Member\AuthController::logout_action');


// Auth Route admin
$routes->get('/admin/login', 'Super\AuthAdminController::login');
$routes->post('/admin/login', 'Super\AuthAdminController::login_action');
$routes->get('/admin/logout', 'Super\AuthAdminController::logout_action');