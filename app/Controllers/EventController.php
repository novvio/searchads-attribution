<?php
namespace App\Controllers;

use App\Models\PurchaseData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class EventController { 
	public function addPurchase($request, $response) {
		$params = $request->getparams();

		$purchaseData = [
				'device_id' => $params['deviceId'],
				'purchase_id' => $params['purchaseId'],
				'purchase_name' => $params['purchaseName'],
				'price' => $params['price']
		];

		$purchase = new PurchaseData;
		$purchase->create($purchase);

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Purchase event added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}

	public function getTodayTurnover($request, $response) {
		$today = Carbon::today();

		$purchaseData = new PurchaseData;
		$purchasesArray = $purchaseData->where('purchase_id', 'des')->get()->toArray();

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Purchase event added to device.',
			'purchaseData' => $purchasesArray
		];

		return $response->withJson($responseMessage, 200);
	}
}