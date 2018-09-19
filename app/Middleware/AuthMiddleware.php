<?php

namespace App\Middleware;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\AppData;

class AuthMiddleware {

	public function __invoke($request, $response, $next) {
		$apiKey = $request->getHeader('Authorization')[0];
		$exist = AppData::where('api_key', $api_key)->exists();

		if (!$exist) {
			$responseMessage = ['ss' => 'sd'];
			$response->withHeader('Content-Type', 'application/json');
			$response->withStatus(401);
			$response->write(json_encode($responseMessage));
			return $response;
		}

        $response = $next($request, $response);

        return $response;
	}
}