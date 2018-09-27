<?php
namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\AttributionModel;
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

		AttributionModel::updateOrCreate($checkData, $updateData)->touch();

		$responseMessage = [
			'status' => 'Success',
			'message' => 'Attribution added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayCampaigns($request, $response) {
		$todayCampaigns = Capsule::table('attributions')
					->join('purchases', 'attributions.device_id', '=', 'purchases.device_id')
					->select('attributions.campaign_id', 'attributions.campaign_name', Capsule::raw('count(*) as total'))
					->where('purchases.created_at', '>=', Carbon::today())
					->groupBy('attributions.campaign_id', 'attributions.campaign_name')
					->orderBy('total', 'desc')
					->get();

		$responseMessage = [
			'status' => 'Success',
			'todayCampaigns' => $todayCampaigns
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayAdGroups($request, $response) {
		$todayAdGroups = Capsule::table('attributions')
					->join('purchases', 'attributions.device_id', '=', 'purchases.device_id')
					->select('attributions.adgroup_id', 'attributions.adgroup_name', Capsule::raw('count(*) as total'))
					->where('purchases.created_at', '>=', Carbon::today())
					->groupBy('attributions.adgroup_id', 'attributions.adgroup_name')
					->orderBy('total', 'desc')
					->get();
					
		$responseMessage = [
			'status' => 'Success',
			'todayAdGroups' => $todayAdGroups
		];

		return $response->withJson($responseMessage, 200);
	}
}