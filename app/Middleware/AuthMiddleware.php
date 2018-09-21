<?php

namespace App\Middleware;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\UserData;

class AuthMiddleware {

	public function __invoke($request, $response, $next) {
		$apiKey = $request->getHeader('Authorization')[0];
		$exist = UserData::where('api_key', $apiKey)->exists();

		if (!$exist) {
			$responseMessage = [
				'error' => [
					'status' => 401,
					'message' => 'Bad Authentication data.'
				]
			];
			
			$response = $response->withJson($responseMessage, 401);
			return $response;
		}

        $response = $next($request, $response);

        return $response;
	}
}