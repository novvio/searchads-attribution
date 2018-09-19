<?php

$app->post('/addDevice', 'DeviceController:addDevice');

$app->post('/addAttribution', 'AttributionController:addAttribution');

$app->post('/addPurchase', 'EventController:addPurchase');

$app->get('/todayTurnover', 'EventController:getTodayTurnover');

$app->get('/todaySales', 'EventController:getTodaySales');

$app->get('/todayOrganic', 'DeviceController:getTodayOrganic');

$app->get('/todayPaid', 'DeviceController:getTodayPaid');

$app->get('/lastSales', 'EventController:getLastSales');

$app->get('/todayCampaigns', 'AttributionController:getTodayCampaigns');

$app->get('/todayAdGroups', 'AttributionController:getTodayAdGroups');

$app->run();