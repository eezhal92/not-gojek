<?php

$router = new AltoRouter;

$router->map('GET', '/', 'HomeController@index', 'home');
$router->map('GET', '/login', 'AuthController@getLogin', 'get-login');
$router->map('POST', '/login', 'AuthController@postLogin', 'post-login');
// $router->map('GET', '/logout', 'AuthController@getLogout', 'get-logout');

$router->map('GET', '/api/mobil', 'Api\MobilController@index', 'api.mobil.index');
// $router->map('GET', '/api/jalan', 'Api\JalanController@index', 'api.jalan.index');
$router->map('POST', '/api/jalan/[i:id_jalan]', 'Api\JalanController@updateOrCreateDistance', 'api.jalan.update-create-distance');

/**
 * Agar bisa diakses global, seperti pada view
 */
$GLOBALS['router'] = $router;
