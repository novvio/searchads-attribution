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

		$attribution = new PurchaseData;
		$attribution->create($purchaseData);

		$responseMessage = [
			'Status' => 'Success',
			'Message' => 'Purchase event added to device.'
		];

		return $response->withJson($responseMessage, 200);
	}
}