<?php
namespace App\Controllers;

use App\Models\DeviceData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DeviceController { 
	public function addDevice($request, $response) {
		$params = $request->getparams();

		$devices = new DeviceData;
		$devices->create($params);
		$devices->save();

		$database = DeviceData::get();

		return $response->withJson($database, 200);
	}
}