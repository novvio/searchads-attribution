<?php
namespace App\Controllers;

use App\Models\DeviceData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DeviceControler { 
	public function addDevice($request, $response) {
		return $response->withJson(['Examples' => 'celil'], 200);
	}
}