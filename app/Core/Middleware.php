<?php

namespace App\Core;

use Closure;
use App\Core\Input as Input;

class Middleware {

  public static $middlewares = [];
  public static $toBeCalledMiddlewares = [];

  /**
   * Menambah closure ke daftar middleware yang tersedia.
   *
   * @param string $middlewareName
   * @param Closure $middleware
   * @return void
   */
  public function add($middlewareName, Closure $middleware) {
    self::$middlewares[$middlewareName] = $middleware;
  }

  /**
   * Memanggil middleware selanjutnya
   *
   * @param array $params
   * @return void
   */
  public function next($params = []) {
    // $current_call = array_shift(self::$toBeCalledMiddlewares);

    // if(!isset(self::$middlewares[$current_call]) && !empty($current_call)) {
    //   throw new \Exception("{$current_call} not listed on config/filters.php.");      
    // }

    // $middleware = (!empty($current_call)) ? self::$middlewares[$current_call] : false;
    $middleware = array_shift(self::$toBeCalledMiddlewares);

    if($middleware) {       
      call_user_func($middleware($params));
    } else {
      call_user_func_array([$params['controller'], $params['action']], [$params['route_params']]);            
    }
  }

  private function setToBeCalledMiddlewares($controllerRegisteredMiddlewares, $method)
  {
    foreach($controllerRegisteredMiddlewares as $filter => $option) {
      if(!isset(self::$middlewares[$filter])) {
        throw new \Exception("{$filter} not listed on config/filters.php.");      
      }
      
      if($option == 'all') {
        self::$toBeCalledMiddlewares[$filter] = self::$middlewares[$filter];
      } else if(is_array($option)) {
        $filter_key = array_keys($option)[0];        
        
        $list = $option[$filter_key];

        if($filter_key == 'only' && $this->inMiddlewareList($method, $list)) {          
          // dd('n');
          self::$toBeCalledMiddlewares[$filter] = self::$middlewares[$filter];
        } else if($filter_key == 'except' && !$this->inMiddlewareList($method, $list)) {
          self::$toBeCalledMiddlewares[$filter] = self::$middlewares[$filter];          
        }
      }
    }

  }

  private function inMiddlewareList($method, $list)
  {
    if(is_array($list)) {
      return in_array($method,$list);
    } else if(is_string($list)) {
      return ($method == $list) ? true : false;
    }
  }

  // run middleware
  public function run($controller, $action, $route_params) {
    $this->setToBeCalledMiddlewares($controller->getRegisteredMiddleware(), $action);
    
    $params = [
      'controller'   => $controller,
      'action'       => $action,
      'route_params' => $route_params,
      'input'        => Input::all()
    ];

    return $this->next($params);
  } 

}
