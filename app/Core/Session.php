<?php

namespace App\Core;

class Session
{

  /**
   * Menyimpan value pada session sesuai key yang diberi.
   *
   * @param string $name
   * @param mixed $value
   * @param mixed
   */
  public static function put($name, $value)
  {
    return $_SESSION[$name] = $value;
  }

  /**
   * Mengambil value session berdasarkan key.
   *
   * @param string $name
   * @return mixed
   */
  public static function get($name)
  {
    return $_SESSION[$name];
  }

  /**
   * Menghapus value pada session sesuai key yang diberi.
   *
   * @param string $name
   * @return void
   */
  public static function delete($name)
  {
    if(self::exists($name)) {
      unset($_SESSION[$name]);
    }
  }

  /**
   * Mengecek key pada session, apakah tersedia atau tidak.
   *
   * @param string $name
   * @param bool
   */
  public static function exists($name)
  {
    return (isset($_SESSION[$name])) ? true : false ;
  }

  /**
   * Menyimpan atau mengambil value dari session.
   *
   * @param string $name
   * @param string $message
   * @param string|void
   */
  public static function flash($name, $message = '')
  {
      if(self::exists($name)) {
          $session = self::get($name);
          self::delete($name);
          return $session;
      } else {
        self::put($name, $message);
      }
  }

}
