<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MainTest extends TestCase
{
    public function testFoundInDataBase() {
        $this->json('GET', '/city', ['id' => '3444876'])->seeJson();
        $this->seeInDatabase('cities', ['id' => '3444876']);
    }

    public function testOutDated() {
        $this->assertTrue(true);
    }

    public function testOpenWeatherApi() {
        $this->assertTrue(true);

    }
}
