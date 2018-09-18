<?php 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$url = parse_url(getenv("DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

$capsule->addConnection (
	[
        'driver'   => 'pgsql',
        'host'     => $host,
        'database' => $database,
        'username' => $username,
        'password' => $password,
        'charset'  => 'utf8',
        'prefix'   => '',
        'schema'   => 'public',
	]
);

$capsule->bootEloquent();
$capsule->setAsGlobal();