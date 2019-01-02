<?php

namespace App\Middleware;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\AppModel;

class AuthMiddleware {

	public function __invoke($request, $response, $next) {
		$apiKey = $request->getHeader('Authorization')[0];
		$exist = AppModel::where('api_key', $apiKey)->exists();
		$request['userID'] = 'celil';

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