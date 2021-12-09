<?php
use Controllers\MainController;
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;

SimpleRouter::get('/', [MainController::class, 'getDefault']);
SimpleRouter::get('city/{city}', [MainController::class, 'getMeasurement'])->where(['city' => '[0-9]+']);

SimpleRouter::error(function(Request $request) {
    MainController::getDefault();
});
