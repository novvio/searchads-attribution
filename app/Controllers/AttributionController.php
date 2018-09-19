<?php
namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\AttributionData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AttributionController { 
	public function addAttribution($request, $response) {
		$params = $request->getparams();

		$checkData = [
			'device_id' => $params['deviceId']
		];

		$updateData = [
			'campaign_name' => $params['campaignName'],
			'campaign_id' => $params['campaignId'],
			'adgroup_name' => $params['adgroupName'],
			'adgroup_id' => $params['adgroupId'],
			'keyword' => $params['keyword']
		];

		AttributionData::updateOrCreate($checkData, $updateData)->touch();

		$responseMessage = [
			'status' => 'Success',
			'message' => 'Attribution added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayCampaigns($request, $response) {
		$trends = Capsule::table('attributions')
					->select('campaign_id','campaign_name', Capsule::raw('count(*) as total'))
					->where('updated_at', '>=', Carbon::today())
					->groupBy('campaign_id', 'campaign_name')
					->orderBy('total', 'desc')
					->get();

		$responseMessage = [
			'status' => 'Success',
			'trends' => $trends
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayAdGroups($request, $response) {
		$trends = Capsule::table('attributions')
					->select('adgroup_id', Capsule::raw('count(*) as total'))
					->where('updated_at', '>=', Carbon::today())
					->groupBy('adgroup_name')
					->orderBy('total', 'desc')
					->get();
					
		$responseMessage = [
			'status' => 'Success',
			'trends' => $trends
		];

		return $response->withJson($responseMessage, 200);
	}
}