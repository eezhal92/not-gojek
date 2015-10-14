<?php

namespace App\Core;

use App\Core\Session;
use App\Core\Config;
use App\Core\Redirect;
use App\Models\User;

class Auth
{
  
  public static function check()
  {
  	if(Session::exists(Config::get('session.name'))) {
  		return true;
  	}

  	return false;
  }

  public static function user()
  {
  	return (self::check()) ? Session::get(Config::get('session.name')) : false ; 
  }


}