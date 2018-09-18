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

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Device added.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayOrganic($request, $response) {
		$today = Carbon::today();

		$todayOrganic = PurchaseData::where('attribution_channel', 'organic')
						->where('created_at', '>=', Carbon::today())
						->count();

		$responseMessage = [
			'status' => 'Success',
			'message' => 'Purchase event added to device.',
			'todayOrganic' => $todayOrganic
		];

		return $response->withJson($responseMessage, 200);
	}
}