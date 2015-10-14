<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Mobil;

class MobilController extends Controller
{

  public function __construct()
  {
  	$this->filter('auth');
  }

  public function index($args)
  {
  	$mobil = new Mobil;
  	 
    echo json_encode($mobil->all());
    exit;
  }

}