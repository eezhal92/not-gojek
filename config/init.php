<?php

session_start();
/*
|--------------------------------------------------------------------------
| Setting Global Constant
|--------------------------------------------------------------------------
*/

/**
 * Path dari file yang digunakan untuk views
 */
 define('BASE_VIEW', __DIR__ . '\..\views\\');

/**
 * Path dari projek
 */
 define('BASE_PATH', __DIR__ . '\..\\');

 /**
  * Base URL dari aplikasi
  */
 $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
 define('BASE_URL', $root);

// global $router;
$match = $router->match();

if(empty($match)) {
  header('HTTP/1.1 404 Not Found');
  view('404');
  exit();
}

list( $controller, $action ) = explode( '@', $match['target'] );

$controller = "App\Controllers\\".$controller;

if ( is_callable(array($controller, $action)) ) {
  $controller = new $controller();

  $middleware->run($controller, $action, $match['params']);
} else {
  die('Error [Method Missing]: Cannot call <b>'.$controller.'@'.$action .'.</b>  ');
}
