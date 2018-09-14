<?php

$app->post('/addDevice', 'DeviceController:addDevice');

$app->post('/addAttribution', 'AttributionsController:addAttribution');

$app->run();