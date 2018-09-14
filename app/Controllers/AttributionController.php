<?php
namespace App\Controllers;

use App\Models\AttributionData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class AttributionController { 
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

		$attribution = new AttributionData;
		$attribution->updateOrCreate($attributionData);

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Attribution added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}
}