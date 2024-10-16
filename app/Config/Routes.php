<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::user');
$routes->get('user', 'User::index');
$routes->post('/user/update', 'User::updateProfile');

$routes->get('/login', 'Home::index');
$routes->get('/register', 'Home::register');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

$routes->get('/admin/user_roles', 'UserRoleManagement::index', ['filter' => 'role:admin']);
$routes->get('/admin/user_roles/edit/(:num)', 'UserRoleManagement::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/user_roles/update', 'UserRoleManagement::updateRole', ['filter' => 'role:admin']);

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('roles', 'RoleController::index');
    $routes->get('roles/create', 'RoleController::create');
    $routes->post('roles/store', 'RoleController::store');
    $routes->get('roles/edit/(:num)', 'RoleController::edit/$1');
    $routes->post('roles/update/(:num)', 'RoleController::update/$1');
    $routes->post('roles/delete/(:num)', 'RoleController::delete/$1');

    $routes->get('permissions', 'PermissionsController::index');
    $routes->get('permissions/create', 'PermissionsController::create');
    $routes->post('permissions/store', 'PermissionsController::store');
    $routes->get('permissions/edit/(:num)', 'PermissionsController::edit/$1');
    $routes->post('permissions/update/(:num)', 'PermissionsController::update/$1');
    $routes->get('permissions/delete/(:num)', 'PermissionsController::delete/$1');

    $routes->get('access', 'RolePermissionController::index');
    $routes->get('role_permission', 'RolePermissionController::index');
    $routes->post('access/assign', 'RolePermissionController::assignPermission');
    $routes->post('access/remove/(:num)', 'RolePermissionController::removePermission/$1');
});

$routes->get('/komik', 'Komik::index');
$routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
$routes->post('/komik/update/(:segment)', 'Komik::update/$1');
$routes->post('/komik/save', 'Komik::save');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
$routes->get('/komik/(:any)', 'komik::detail/$1');
