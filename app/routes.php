<?php

use App\Middleware\AuthMiddleware; 

// Mobile Endpoints
$app->group('', function() {
	$this->get('/', function() {
	});

	$this->post('/addDevice', 'DeviceController:addDevice');
	$this->post('/addAttribution', 'AttributionController:addAttribution');
	$this->post('/addPurchase', 'EventController:addPurchase');
})->add(new AuthMiddleware($container));

// Panel Endpoints
$app->get('/todayTurnover', 'EventController:getTodayTurnover');
$app->get('/todaySales', 'EventController:getTodaySales');
$app->get('/todayOrganic', 'DeviceController:getTodayOrganic');
$app->get('/todayPaid', 'DeviceController:getTodayPaid');
$app->get('/lastSales', 'EventController:getLastSales');
$app->get('/todayCampaigns', 'AttributionController:getTodayCampaigns');
$app->get('/todayAdGroups', 'AttributionController:getTodayAdGroups');
$app->get('/filter', 'FilterController:filter');

$app->run();