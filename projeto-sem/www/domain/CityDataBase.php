<?php
namespace Domain;

use Domain\City;
use Carbon\Carbon;

class CityDataBase extends City
{
	protected $db;

	function __construct($cityId) {
		$this->db = mysqli_connect("127.0.0.1", "admin", "admin", "fasters");
		parent::__construct($cityId);
    }


	function getMeasurementValue(){
        if ($this->db->connect_errno) {
			return NULL;
		}

		$sql_query = "SELECT * FROM cities WHERE id=%u";
		$sql_query = sprintf($sql_query, $this->getCityId());

		$queryResult = $this->db->query($sql_query);

		if ($queryResult->num_rows >= 1) {
			$data = $queryResult->fetch_all(MYSQLI_ASSOC);

			$currentDate = Carbon::now();
			$measurementDate = Carbon::createFromFormat('Y-m-d H:i:s', $data[0]['date']);

			$this->setCityName($data[0]['name']);
			$this->setMeasurementDate($currentDate);  
			$this->setSource("DataBase");  

			if ($currentDate->diffInMinutes($measurementDate) <= 20) {
				return (float) $data[0]['measurement'];			
			}else{
				return NULL;
			}
		}else{
			return NULL;
		}
    }
}
