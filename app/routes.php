<?php

use App\Middleware\AuthMiddleware; 

$app->group('', function() {
// Mobile Endpoints
	$this->get('/', function() {
	});

	$this->post('/addDevice', 'DeviceController:addDevice');
	$this->post('/addAttribution', 'AttributionController:addAttribution');
	$this->post('/addPurchase', 'EventController:addPurchase');

// Panel Endpoints
	$this->get('/todayTurnover', 'EventController:getTodayTurnover');
	$this->get('/todaySales', 'EventController:getTodaySales');
	$this->get('/todayOrganic', 'DeviceController:getTodayOrganic');
	$this->get('/todayPaid', 'DeviceController:getTodayPaid');
	$this->get('/lastSales', 'EventController:getLastSales');
	$this->get('/todayCampaigns', 'AttributionController:getTodayCampaigns');
	$this->get('/todayAdGroups', 'AttributionController:getTodayAdGroups');
	
})->add(new AuthMiddleware($container));

$app->get('/filter', 'FilterController:filter');
$app->get('/getApiKey', 'UserController:getApiKey');

$app->run();