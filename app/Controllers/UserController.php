<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AppModel;

use Illuminate\Database\Capsule\Manager as Capsule;
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

	public function login($request, $response) {
		$params = $request->getparams();

		$getUser = UserModel::where('username', $params['username'])
				->where('password', $params['password'])
				->first();

		if ($getUser) {
			$userId = $getUser->get('id');

			$apiKey = AppModel::where('api_key', $userId)
					->pluck('api_key')
					->toArray();

			$responseMessage = [
				'status' => 'Success',
				'apiKey' => $apiKey
			];

			return $response->withJson($responseMessage, 200);
		} else {
			$responseMessage = [
				'error' => [
					'status' => 401,
					'message' => 'Bad login data.'
				]
			];
			
			return $response->withJson($responseMessage, 401);
		}
	}
}