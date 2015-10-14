<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Config;
use App\Core\Hash;
use App\Core\Input;
use App\Core\Redirect;
use App\Core\Session;
use App\Models\User;

class AuthController extends Controller
{

  public function getLogin()
  {
  	return view('auth.login');
  }

  public function postLogin($args)
  {
  	$username = Input::get('username');
  	$password = Input::get('password');

    $this->validate(Input::all(), [
      'username' => 'required'
    ]);

  	try {
  	  $user = new User;
  	  $user = $user->find(['username', '=', $username]);
  	  // dd($user);
  	  if(count($user) === 1) {
  		  if(Hash::check($password, $user->password)) {
  		    Session::put(Config::get('session.name'), $user);
  		    return (is_ajax()) ? http_request() : Redirect::to('/');
  		  }
  	  }
  	} catch(\Exception $e) {
  	  throw $e;
  	}  	

  	return Redirect::back();
  }

  public function getLogout()
  {
  	if(Auth::check()) {
  		Session::delete(Config::get('session.name'));
  	}

  	return Redirect::to('/');
  }
}