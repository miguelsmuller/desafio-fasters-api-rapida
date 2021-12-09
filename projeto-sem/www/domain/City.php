<?php
namespace Domain;

abstract class City
{
	private $cityId;
	private $cityName;
    private $measurementDate;
    private $measurementValue;
	private $source;

	function __construct($cityId){
		$this->setCityId($cityId);
		$this->getMeasurementValue();
	}

	public function getCityId(){ return $this->cityId; }
	protected function setCityId($cityId){ $this->cityId = $cityId; }

	public function getCityName(){ return $this->cityName; }
	protected function setCityName($cityName){ $this->cityName = $cityName; }

	public function getMeasurementDate(){ return $this->measurementDate; }
    protected function setMeasurementDate($measurementDate){ $this->measurementDate = $measurementDate; }

	abstract public function getMeasurementValue();
	private function setMeasurementValue($measurementValue){ $this->measurementValue = $measurementValue; }

	public function getSource(){ return $this->source; }
	protected function setSource($source){ $this->source = $source; }
}

