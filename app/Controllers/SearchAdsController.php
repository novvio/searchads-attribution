<?php
namespace App\Controllers;

use App\Models\SearchAdsData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class SearchAdsController { 
	public function addPurchase($request, $response) {
		return $response->withJson(['Examples' => 'celil'], 200);
	}
}