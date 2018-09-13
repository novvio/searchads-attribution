<?php
namespace App\Controllers;

use App\Models\ExampleData;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class ExampleDataController { 

    public function Example($request, $response) {
        $Examples = ExampleData::->get()->toArray();

        return $response->withJson(['Examples' => $Examples], 200);
    }   
}