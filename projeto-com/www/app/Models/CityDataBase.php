<?php
namespace App\Models;

use DB;
use Carbon\Carbon;
use App\Models\City;

class CityDataBase extends City
{
	function getMeasurementValue(){		
		$data = DB::select(
			"SELECT * FROM cities WHERE id=:id",
			[
				'id' => $this->getCityId()
			]
		);

		if (sizeof($data) >= 1) {
			$currentDate = Carbon::now();
			$measurementDate = Carbon::createFromFormat('Y-m-d H:i:s', $data[0]->date);

			$this->setCityName($data[0]->name);
			$this->setMeasurementDate($data[0]->date);  
			$this->setSource("DataBase");  

			if ($currentDate->diffInMinutes($measurementDate) <= 20) {
				return (float) $data[0]->measurement;			
			}else{
				return NULL;
			}
		}else{
			return NULL;
		}
    }
}
