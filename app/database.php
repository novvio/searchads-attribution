<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

/*
$capsule->addConnection (
	[
		'driver' => 'mysql',
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'database' => 'password_db',
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci',
		'prefix' => ''
	]
);

*/

$capsule->addConnection (
	[
		'driver' => 'pgsql',
		'host' => ENV['HOST'],
		'username' => ENV['USER'],
		'password' => ENV['PASS'],
		'database' => ENV['DATABASE'],
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci',
		'port' => '5432',
		'prefix' => '',
		'sslmode' => 'require'
	]
);




$capsule->bootEloquent();
$capsule->setAsGlobal();