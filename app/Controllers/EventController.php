<?php
namespace App\Controllers;

use App\Models\PurchaseModel;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class EventController { 

	public function addPurchase($request, $response) {
		$params = $request->getparams();

		$request = [
				'device_id' => $params['deviceId'],
				'purchase_id' => $params['purchaseId'],
				'purchase_name' => $params['purchaseName'],
				'price' => $params['price']
		];

		PurchaseModel::create($request);

		$responseMessage = [
			'status' => 'Success',
			'message' => 'Purchase event added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayTurnover($request, $response) {
		$todayTurnover = PurchaseModel::where('created_at', '>=', Carbon::today())
						->sum('price');

		$responseMessage = [
			'status' => 'Success',
			'todayTurnover' => $request
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodaySales($request, $response) {
		$params = $request->getparams();
		$todaySales = PurchaseModel::join('devices', 'purchases.device_id', '=', 'devices.device_id')
									->where('devices.attribution_channel', $params['channel'])
									->where('purchases.created_at', '>=', Carbon::today())
									->count();

		$responseMessage = [
			'status' => 'Success',
			'todaySales' => $todaySales
		];

		return $response->withJson($responseMessage, 200);
	}


	public function getLastSales($request, $response) {
        $lastSales = PurchaseModel::join('attributions', 'purchases.device_id', '=', 'attributions.device_id')
					            ->select('purchases.*', 'attributions.campaign_name', 'attributions.adgroup_name')
					            ->orderBy('purchases.created_at', 'desc')
					            ->take(5)
					            ->get()
					            ->makeHidden('purchase_id')
					            ->toArray();

		$responseMessage = [
			'status' => 'Success',
			'lastSales' => $lastSales
		];

		return $response->withJson($responseMessage, 200);
	}
}