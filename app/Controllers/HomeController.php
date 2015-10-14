<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Config;
use App\Core\Redirect;
use App\Core\Session;
use App\Models\Mobil;
use App\Models\Posisi;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->filter('auth', ['only' => 'getMobil']);
    // $this->filter('admin', ['except' => 'bar']);
    // $this->filter('something');    
  }

  public function index($args)
  {
  	return view('index');
  }

  public function create($args)
  {
    dd('create');
  }

  public function getLogin()
  {
    if(Session::exists(Config::get('session.name'))) {
      return Redirect::to('/');
    }

    return view('auth.login');
  }  

}
