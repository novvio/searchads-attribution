<?php
namespace App\Controllers;

use App\Models\DeviceData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DeviceController { 
	public function addDevice($request, $response) {
		$params = $request->getparams();

		$checkData = ['device_id'] => $params['deviceId'];
		$updateData = [
						'country' => $params['country'],
						'attribution_channel' => $params['attributionChannel']
		];

		DeviceData::updateOrCreate($checkData, $updateData);

		$responseMessage = [
			'status' => 'Success',
			'message' => 'Device added.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayOrganic($request, $response) {
		$todayOrganic = DeviceData::where('attribution_channel', 'organic')
						->where('created_at', '>=', Carbon::today())
						->count();

		$responseMessage = [
			'status' => 'Success',
			'todayOrganic' => $todayOrganic
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayPaid($request, $response) {
		$todayPaid = DeviceData::where('attribution_channel', '!=','organic')
						->where('created_at', '>=', Carbon::today())
						->count();

		$responseMessage = [
			'status' => 'Success',
			'todayPaid' => $todayPaid
		];

		return $response->withJson($responseMessage, 200);
	}
}