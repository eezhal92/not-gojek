<?php

namespace App\Controllers;

use App\Core\Redirect;
use App\Core\Validator;

class Controller
{

  protected $validator;
  protected $middlewares = [];

  public function __construct()
  {
    $this->validator = new Validator;
  }

  protected function validate($inputs = [], $rules = [])
  {
    $this->validator->validate($inputs, $rules);

    if(!$this->validator->passed()) {
      return Redirect::back(['errors' => $this->validator->errors()]);
    }
  }

  protected function filter($middleware_name, $options = [])
  {      
    if(is_null($middleware_name)) {
      throw new \InvalidArgumentException("Please provide filter name.");        
    }

    if(count($options) > 0) {
      $this->middlewares[$middleware_name] = $options;
    } else {
      $this->middlewares[$middleware_name] = 'all';
    }      
  }

  public function getRegisteredMiddleware()
  {
    return $this->middlewares;
  }
  
}
