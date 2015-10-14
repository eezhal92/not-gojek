<?php

use App\Core\Session;
use App\Core\Config;
use App\Core\Redirect;
use App\Core\Middleware;

$middleware = new Middleware;

/**
 * Berhubung isu method next pada Middleware.
 * Sekarang hanya bisa menggunakan before middleware/filter. 
 * Note: Dikarenakan fungsi exit() pada helper view().
 */

$middleware->add('auth', function($params) use ($middleware) {
  // echo "auth <br>";	
  
  if(!Session::exists(Config::get('session.name'))) {
    if(is_ajax()) {
      http_response_code(401);
      exit;
    } else {
      Redirect::route('get-login');
	 }
  }	

  $middleware->next($params);
});

$middleware->add('admin', function($params) use ($middleware) {
  // do something
  
  $middleware->next($params);
});

$middleware->add('something', function($params) use ($middleware) {
  // do something
  
  $middleware->next($params);
});

$GLOBALS['middleware'] = $middleware;
