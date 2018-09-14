<?php

$app->get('/addDevice', 'DeviceController:addDevice');

$app->get('/addPurchase', 'SearchAdsController:addPurchase');

$app->run();