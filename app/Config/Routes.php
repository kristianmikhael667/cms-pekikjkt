<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers\Admin\Dashboard');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('admin', function ($routes) {
	$routes->get('/', 'Dashboard::index', ['namespace' => 'App\Controllers\Admin\Dashboard']);
	$routes->get('dashboard', 'Dashboard::index', ['namespace' => 'App\Controllers\Admin\Dashboard']);
	// $routes->get('login', 'Login::index', ['namespace' => 'App\Controllers\Admin\Login']);
	$routes->group('auth', function ($routes) {
		$routes->get('login', 'Login::index', ['namespace' => 'App\Controllers\Admin\Auth']);
		$routes->post('login', 'Login::log', ['namespace' => 'App\Controllers\Admin\Auth']);
		$routes->post('logout', 'Logout::logout', ['namespace' => 'App\Controllers\Admin\Auth']);
	});
	$routes->group('users', function ($routes) {
		$routes->get('list', 'User::index', ['namespace' => 'App\Controllers\Admin\User']);
		$routes->get('seller', 'User::seller', ['namespace' => 'App\Controllers\Admin\User']);
		$routes->get('createuser', 'User::createuser', ['namespace' => 'App\Controllers\Admin\User']);
		$routes->post('postuser', 'User::postuser', ['namespace' => 'App\Controllers\Admin\User']);
	});
	$routes->group('roles', function ($routes) {
		$routes->get('banneduser', 'Role::index', ['namespace' => 'App\Controllers\Admin\Role']);
		$routes->get('merchantuser', 'Role::merchant', ['namespace' => 'App\Controllers\Admin\Role']);
		$routes->get('dkiuser', 'Role::dki', ['namespace' => 'App\Controllers\Admin\Role']);
		$routes->get('adminuser', 'Role::admin', ['namespace' => 'App\Controllers\Admin\Role']);
	});
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}