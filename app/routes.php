<?php

$app->post('/addDevice', 'DeviceController:addDevice');

$app->get('/addPurchase', 'SearchAdsController:addPurchase');

$app->run();