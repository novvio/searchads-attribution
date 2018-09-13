<?php

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($config);

require 'database.php';

$container = $app->getContainer();

$container['db'] = function ($container) use ($capsule) {
	return $capsule;
};

$container['ExampleDataController'] = function () {
	return new \App\Controllers\ExampleDataController;
};

require 'routes.php';