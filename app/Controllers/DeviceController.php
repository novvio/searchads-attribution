<?php
namespace App\Controllers;

use App\Models\DeviceData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DeviceController { 
	public function addDevice($request, $response) {
		$params = $request->getparams();

		DeviceData::updateOrCreate($params);

		$database = DeviceData::get();

		return $response->withJson($database, 200);
	}
}