<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Core\Input;
use App\Models\Jalan;

class JalanController extends Controller
{
  
  protected $jalan;

  public function __construct()
  {
  	$this->jalan = new Jalan;
  }

  public function index()
  {
  	return view('jalan');
  }

  public function updateOrCreateDistance($args)
  {
    $id_jalan = $args['id_jalan'];

  	$road = $this->jalan->find($id_jalan);  	
  	
  	if(count($road) > 0) { // jika ketemu, update
  	  $this->jalan->update($id_jalan, [
  	  	'jarak'  => Input::get('distance'),
  	  	'start'  => Input::get('start'),
  	  	'finish' => Input::get('finish'),
  	  ]);
  	} else { // jika tidak, insert
  	  $this->road->create([
  	  	'id_pengguna' => 1,
  	  	'start'		  => Input::get('start'),
  	  	'finish'	  => Input::get('finish'),  	  	
  	  ]);
  	}
  }

  public function getLastPosition($args)
  {
  	// update field jalan berdasarkan id mobil
  }

}