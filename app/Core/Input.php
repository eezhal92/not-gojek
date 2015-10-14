<?php

namespace App\Core;

class Input
{

  /**
   * Mengecek apakah terjadi request dengan input
   *
   * @param string $type
   * @return bool
   */
  public static function isExists($type = 'post')
  {
    switch ($type) {
      case 'post':
        return (!empty($_POST)) ? true : false;
        break;

      case 'get':
        return (!empty($_GET)) ? true : false;
        break;

      default:
        return false;
        break;
    }
  }

  /**
   * Mengambil semua input yang ada pada GLOBAL varible
   *
   * @return array
   */
  public static function all()
  {
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
      case 'POST':
        return $_POST;
        break;

      case 'GET':
        return $_GET;
        break;

      default:
        return [];
        break;
    }
  }

  /**
   * Mengambil item tertentu pada input
   *
   * @param string $item
   * @return string
   */
  public static function get($item)
  {
    if(isset($_POST[$item])) {
      return $_POST[$item];
    } else if(isset($_GET[$item])) {
      return $_GET[$item];
    }

    return '';
  }
}
