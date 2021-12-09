<?php
namespace App\Models;

use DB;
use Carbon\Carbon;
use App\Models\City;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CityOpenWeather extends City
{
    protected $api_key = null;

    function __construct($id) {
        $this->api_key = getenv('KEY_OPEN_WEATHER');
        
        parent::__construct($id);
    }

    function getMeasurementValue(){
        $key = getenv("REMOTE_ADDR");

        $url = sprintf(
            "http://api.openweathermap.org/data/2.5/weather?id=%s&units=metric&appid=%s", 
            $this->getCityId(), 
            $this->api_key, 
        );

        $client =  new Client(['http_errors' => false]);
        $response = $client->request('GET', $url, ['connect_timeout' => 3.5]);    

        if ($response->getStatusCode() != "200"){
            return NULL;
        }

        $response = json_decode($response->getBody());
        
        $this->setCityName($response->name);
        $this->setMeasurementDate(date("Y-m-d H:i:s")); 
        $this->setSource("API");
        $this->setMeasurementValue($response->main->temp);

        return $response->main->temp;
    }

    function setMeasurementValue($measurementValue){
        $data = DB::insert(
			"INSERT INTO cities (id, name, date, measurement) 
            VALUES (:id, :name, :date, :measurement)
            ON DUPLICATE KEY UPDATE 
            name=VALUES(name), date=VALUES(date), measurement=VALUES(measurement)",
			[
				'id' => $this->getCityId(),
                'name' => $this->getCityName(),
                'date' => $this->getMeasurementDate(),
                'measurement' => $measurementValue
			]
		);
	}
}
