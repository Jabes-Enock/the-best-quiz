<?php

$routes->group('api/categories', ['namespace' => 'Categories\Controllers\Api'], static function ($routes) {
    $routes->get('', 'CategoriesController::index');
    $routes->post('', 'CategoriesController::create');
    $routes->get('(:num)', 'CategoriesController::show/$1');
    $routes->put('(:num)', 'CategoriesController::update/$1');
    $routes->delete('(:num)', 'CategoriesController::delete/$1');
});


$routes->group('categorias', ['namespace' => 'Categories\Controllers'], static function ($routes) {
    $routes->get('', 'CategoriesViewsController::index');
    $routes->get('adicionar', 'CategoriesViewsController::create');
    $routes->get('(:num)/editar', 'CategoriesViewsController::edit/$1');
    $routes->get('(:num)/delete', 'CategoriesViewsController::delete/$1');
});
