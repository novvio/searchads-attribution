<?php

$app->post('/addDevice', 'DeviceController:addDevice');

$app->get('/addAttribution', 'AttributionsController:addAttribution');

$app->run();