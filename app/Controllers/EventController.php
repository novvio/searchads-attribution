<?php
namespace App\Controllers;

use App\Models\PurchaseData;

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

		PurchaseData::create($request);

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Purchase event added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayTurnover($request, $response) {
		$today = Carbon::today();

		$totalPrices = PurchaseData::where('created_at', '>=', $today)
						->sum('price');

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Purchase event added to device.',
			'TodayPrices' => $totalPrices
		];

		return $response->withJson($responseMessage, 200);
	}
}