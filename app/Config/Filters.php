<?php

namespace Config;

use App\Filters\isLoggedIn;
use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'isLoggedIn' => \App\Filters\isLoggedIn::class,
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		'isLoggedIn' => [
			'before' => [
				'/',
				'admin',
				'admin/dashboard',
				'admin/users/*',
				'admin/tenant/*',
				'admin/banner/*',
				'admin/roles/*'
			],
			'after' => [
				'admin/auth/login'
			]
		]
	];
}
