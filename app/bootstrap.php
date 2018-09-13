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

$container['AuthenticationDataController'] = function () {
	return new \App\Controllers\AuthenticationDataController;
};

$container['InformationDataController'] = function () {
	return new \App\Controllers\InformationDataController;
};

$container['InformationAppendDataController'] = function () {
	return new \App\Controllers\InformationAppendDataController;
};

$container['InformationDeleteDataController'] = function () {
	return new \App\Controllers\InformationDeleteDataController;
};

$container['InformationUpdateDataController'] = function () {
	return new \App\Controllers\InformationUpdateDataController;
};

$container['FavoriteDataController'] = function () {
	return new \App\Controllers\FavoriteDataController;
};

$container['ForgotPasswordDataController'] = function () {
	return new \App\Controllers\ForgotPasswordDataController;
};


require 'routes.php';