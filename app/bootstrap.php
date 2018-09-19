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

$container['AttributionController'] = function() {
	return new \App\Controllers\AttributionController;
};

$container['EventController'] = function() {
	return new \App\Controllers\EventController;
};

$container['FilterController'] = function() {
	return new \App\Controllers\FilterController;
};

require 'routes.php';