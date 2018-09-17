<?php

$app->post('/addDevice', 'DeviceController:addDevice');

$app->post('/addAttribution', 'AttributionController:addAttribution');

$app->post('/addPurchase', 'EventController:addPurchase');

$app->get('/todayTurnover', 'EventController:getTodayTurnover');

$app->run();