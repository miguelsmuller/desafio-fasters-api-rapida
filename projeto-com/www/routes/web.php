<?php

$router->group(['prefix' => 'city'], function () use ($router) {
    $router->get('/{id}', 'MainController@getCity');
});

