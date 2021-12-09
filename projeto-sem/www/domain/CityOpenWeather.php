<?php
namespace Domain;

use Domain\City;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class CityOpenWeather extends City
{
    protected $db;
    protected $api_key = null;

    function __construct($id) {
        $this->api_key = getenv('KEY_OPEN_WEATHER');
        $this->db = mysqli_connect("127.0.0.1", "admin", "admin", "fasters");
        
        parent::__construct($id);
    }

    function getMeasurementValue(){
        $url = "http://api.openweathermap.org/data/2.5/weather?id=%s&units=metric&appid=%s";
        $url = sprintf($url, $this->getCityId(), $this->key);

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
        if ($this->db->connect_errno) {
			return NULL;
		}

        $sql_query = "INSERT INTO cities (id, name, date, measurement) 
        VALUES (%u, '%s', '%s', '%s')
        ON DUPLICATE KEY UPDATE 
        name=VALUES(name), date=VALUES(date), measurement=VALUES(measurement)";

        $sql_query = sprintf($sql_query, $this->getCityId(), $this->getCityName(), $this->getMeasurementDate(), $measurementValue);

		$queryResult = $this->db->query($sql_query);
	}
}
