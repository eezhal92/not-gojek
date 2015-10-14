<?php

namespace App\Core;

use App\Core\Session as Session;

class Redirect
{

  /**
   * Redirect menuju halaman tertentu.
   *
   * @param string $location
   * @return response
   */
  public static function to($location)
  {
    if($location) {
      if(is_numeric($location)) {
        switch ($location) {
          case 404:
              header('HTTP/1.0 404 Not Found');
              exit();
            break;
        }
      }
      header('Location: ' . $location);
      exit();
    }

    return false;
  }

  public static function route($route_name)
  {
    if($route_name) {
      try {
        global $router;

        header('Location: ' . $router->generate($route_name));
        exit();
      } catch (\Exception $e) {
        throw $e;
      }      
    }

    return false;
  }

  /**
   * Redirect kembali ke halaman sebelumnya.
   *
   * @param array $data
   * @return response
   */
  public static function back($data = [])
  {
    if(count($data) == 1) {
      Session::flash(key($data), current($data));
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
