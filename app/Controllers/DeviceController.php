<?php
namespace App\Controllers;

use App\Models\DeviceData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DeviceController { 
	public function addDevice($request, $response) {
		$params = $request->getparams();

		$deviceData = [
			'device_id' => $params['deviceId'],
			'country' => $params['country'],
			'attribution_channel' => $params['attributionChannel']
		];

		$devices = new DeviceData;
		$devices->updateOrCreate($deviceData);

		return $response->withJson($devices->get(), 200);
	}
}