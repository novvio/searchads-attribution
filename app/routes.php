<?php

$app->get('/addDevice', 'DeviceController:addDevice');

$app->get('/addPuchase', 'SearchAdsController:addPurchase');

$app->run();