<?php
namespace Controllers;

use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Response;
use Pecee\Http\Request;

use Models\CityDataBase;
use Models\CityOpenWeather;

class MainController
{
	public function getMeasurement($id){
		$response = new CityDataBase($id);

		if (is_null($response->getMeasurementValue())) {
			$response = new CityOpenWeather($id);
		}
	
		SimpleRouter::response()->json([
			'city' => $response->getCityName(),
			'measurement' => $response->getMeasurementValue(),
			'source' => $response->getSource(),
		]);
	}

	public function getDefault(){   
		SimpleRouter::response()->json([
			'error' => 'INVALID_ROUTE'
		]);
	}
}

