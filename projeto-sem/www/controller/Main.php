<?php
namespace Controller;

use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Response;
use Pecee\Http\Request;

use Domain\CityDataBase;
use Domain\CityOpenWeather;

class Main
{
	public function getIndex(){
		SimpleRouter::response()->json([
			'erro' => 'Parameter not found',
			'message' => 'try put city name in request url'
		]);
	}

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

	public function getErro($erro){   
		if ($erro == 404) {
			$msg = "Not Found";
		} elseif($erro == 403) {
			$msg = "Forbidden";
		}
		
		SimpleRouter::response()->json([
			'erro' => 'Erro',
			'message' => $msg
		]);
	}
}

