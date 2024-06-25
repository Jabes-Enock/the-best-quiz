<?php

$routes->group(
    'api/dashboard',
    ['namespace' => 'Dashboard\Controllers\Api'],
    static function ($routes) {
        $routes->get('resume-resources', 'Dashboard::resumeResources');
        $routes->get('categories-related-questions', 'Dashboard::categoriesJoinQuestions');
    }
);

$routes->group('/dashboard', ['namespace' => 'Dashboard\Controllers'], static function ($routes) {
    $routes->get('', 'Dashboard::index');
    $routes->get('adicionar', 'Dashboard::create');
    $routes->get('(:num)/editar', 'Dashboard::edit/$1');
    $routes->get('(:num)/delete', 'Dashboard::delete/$1');
});
