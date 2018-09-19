<?php
namespace App\Controllers;

use App\Models\AttributionData;
use App\Models\DeviceData;
use App\Models\PurchaseData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class FilterController {
	public function filter($request, $response) {
		$params = $request->getparams();

		$from = Carbon::parse($params['from']);
		$to = Carbon::parse($params['to']);
		$dateArray = array($from, $to->addDay());

		$devices = DeviceData::join('attributions', 'devices.device_id', '=', 'attributions.device_id')
						->where('devices.attribution_channel', '!=', 'organic');

		$sales = PurchaseData::join('attributions', 'purchases.device_id', '=', 'attributions.device_id')
						->join('devices', 'purchases.device_id', '=', 'devices.device_id')
						->where('devices.attribution_channel', '!=', 'organic');

		if (!empty($params['from'])) {
			$devices->whereBetween('devices.updated_at', $dateArray);
			$sales->whereBetween('purchases.created_at', $dateArray);
		}

		if (!empty($params['campaignId'])) {
			$devices->where('attributions.campaign_id', $params['campaignId']);
			$sales->where('attributions.campaign_id', $params['campaignId']);
		}

		if (!empty($params['adGroupId'])) {
			$devices->where('attributions.adgroup_id', $params['adGroupId']);
			$sales->where('attributions.adgroup_id', $params['adGroupId']);
		}

		if (!empty($params['keyword'])) {
			$devices->where('attributions.keyword', $params['keyword']);
			$sales->where('attributions.keyword', $params['keyword']);
		}

		$devices = $devices->get()->count('devices.device_id');
		$turnOver = $sales->sum('purchases.price');
		$sales = $sales->get()->count('purchases.device_id');

		$responseMessage = [
			'status' => 'Success',
			'devices' => $devices,
			'sales' => $sales,
			'turnOver' => $turnOver
		];

		return $response->withJson($responseMessage, 200);				
	}
}