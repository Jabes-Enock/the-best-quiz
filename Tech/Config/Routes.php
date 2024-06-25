<?php

$routes->group('api/technologies', ['namespace' => 'Tech\Controllers\Api'], static function ($routes) {
    $routes->get('', 'TechController::index');
    $routes->post('', 'TechController::create');
    $routes->get('(:num)', 'TechController::show/$1');
    $routes->put('(:num)', 'TechController::update/$1');
    $routes->delete('(:num)', 'TechController::delete/$1');
});


$routes->group('tecnologias', ['namespace' => 'Tech\Controllers'], static function ($routes) {
    $routes->get('', 'TechViewsController::index');
    $routes->get('adicionar', 'TechViewsController::create');
    $routes->get('(:num)/editar', 'TechViewsController::edit/$1');
    $routes->get('(:num)/delete', 'TechViewsController::delete/$1');
});
