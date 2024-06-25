<?php

$routes->group(
    'api/questions',
    ['namespace' => 'Questions\Controllers\Api'],
    static function ($routes) {
        $routes->get('', 'QuestionsController::index');
        $routes->post('', 'QuestionsController::create');
        $routes->get('(:num)', 'QuestionsController::show/$1');
        $routes->put('(:num)', 'QuestionsController::update/$1');
        $routes->delete('(:num)', 'QuestionsController::delete/$1');
        $routes->get('search/(:alpha)', 'QuestionsController::filter/$1');
    }
);


$routes->group('perguntas', ['namespace' => 'Questions\Controllers'], static function ($routes) {
    $routes->get('', 'QuestionsViewsController::index');
    $routes->get('adicionar', 'QuestionsViewsController::create');
    $routes->get('(:num)/editar', 'QuestionsViewsController::edit/$1');
    $routes->get('(:num)/delete', 'QuestionsViewsController::delete/$1');

});
