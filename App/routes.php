<?php

use Framework\Route;
use Framework\Router;

Router::addRoute(new Route('page/{id}', 'PageController@index', Route::METHOD_GET));
Router::addRoute(new Route('page/{id}/create', 'PageController@index', Route::METHOD_GET));
Router::addRoute(new Route('page/{id}/update/{q}', 'PageController@index', Route::METHOD_GET));
echo "Маршруты добавлены<br>";