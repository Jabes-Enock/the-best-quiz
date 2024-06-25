<?php

$routes->group('api/quiz', ['namespace' => 'Quiz\Controllers\Api'], static function ($routes) {
    $routes->get('technologies', 'Quiz::getVisibleTechnologies');
    $routes->get('categories-by-technology/(:num)', 'Quiz::categoriesByTechnology/$1');
    $routes->get('questions-by-category/(:num)', 'Quiz::questionsByCategory/$1');
    $routes->post('check-answer', 'Quiz::checkAnswer');
});

$routes->group('/', ['namespace' => 'Quiz\Controllers'], static function ($routes) {
    $routes->get('', 'QuizViews::index');
    $routes->get('quiz/(:num)', 'QuizViews::categoriesByTech/$1');
    $routes->get('quiz/perguntas/(:num)', 'QuizViews::questions/$1');
    /*  $routes->get('(:num)/editar', 'QuizViews::edit/$1');
     $routes->get('(:num)/delete', 'QuizViews::delete/$1'); */
});
