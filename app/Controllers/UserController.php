<?php
namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class UserController { 
	public function getApiKey($request, $response) {
		$params = $request->getparams();

		$md5 = md5($params['appstore_id'] + Carbon::now());
		$sha = hash('sha256', $md5);
		$apiKey = hash('ripemd160', $sha);

		$responseMessage = [
			'status' => 'Success',
			'apiKey' => $apiKey
		];

		return $response->withJson($responseMessage, 200);
	}
}