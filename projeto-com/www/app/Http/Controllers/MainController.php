<?php

namespace App\Http\Controllers;

use App\Models\CityOpenWeather;
use App\Models\CityDataBase;
use App\Models\City;

class MainController extends Controller
{
    public function getCity($id){
        $response = new CityDataBase($id);

		if (is_null($response->getMeasurementValue())) {
			$response = new CityOpenWeather($id);
		}
        
        return response()->json([
            'city' => $response->getCityName(),
			'measurement' => $response->getMeasurementValue(),
			'source' => $response->getSource(),
        ]);
    } 
}