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

$container['DeviceController'] = function() {
	return new \App\Controllers\DeviceController;
};

$container['AttributionsController'] = function() {
	return new \App\Controllers\AttributionsController;
};

require 'routes.php';