<?php
namespace App\Controllers;

use App\Models\AttributionsData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class AttributionsController { 
	public function addAttribution($request, $response) {
		$params = $request->getparams();

		$attributionData = [
				'device_id' => $params['deviceId'],
				'campaign_name' => $params['campaignName'],
				'campaign_id' => $params['campaignId'],
				'adgroup_name' => $params['adgroupName'],
				'adgroup_id' => $params['adgroupId'],
				'keyword' => $params['keyword']
		];

		$attribution = new AttributionsData;
		$attribution->updateOrCreate($attributionData);

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Devices attribution added.'
		];

		return $response->withJson($responseMessage, 200);
	}
}