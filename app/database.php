<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

/*
$capsule->addConnection (
	[
		'driver' => 'pgsql',
		'host' => 'localhost',
		'username' => 'celilbozkurt',
		'password' => '',
		'database' => 'celilbozkurt',
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci',
		'prefix' => ''
	]
);

*/

$capsule->addConnection (
	[
		'driver' => 'pgsql',
		'host' => getenv('HOST'),
		'username' => getenv('USER'),
		'password' => getenv('PASS'),
		'database' => getenv('DATABASE'),
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci',
		'port' => '5432',
		'prefix' => '',
		'sslmode' => 'require',
		'url' => getenv('DATABASE_URL')
	]
);


$capsule->bootEloquent();
$capsule->setAsGlobal();