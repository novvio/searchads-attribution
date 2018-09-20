<?php

use App\Middleware\AuthMiddleware; 

// Mobile Endpoints
$app->group('', function() {
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
	$this->get('/filter', 'FilterController:filter');
})->add(new AuthMiddleware($container));


$app->run();