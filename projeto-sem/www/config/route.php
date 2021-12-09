<?php
use Controller\Main;
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;

SimpleRouter::get('/', [Main::class, 'getIndex']);
SimpleRouter::get('/{city}', [Main::class, 'getMeasurement'])->where(['city' => '[0-9]+']);

SimpleRouter::error(function(Request $request, \Exception $e) {
    Main::getErro($e->getCode());
});
