<?php

namespace App\Core;

use App\Core\Session as Session;

class Token
{

  /**
   * Generate token untuk mencegah CSRF.
   *
   * @return string
   */
  public static function generate()
  {
    return Session::put(Config::get('session.token_name'), md5(uniqid()));
  }

  /**
   * Mengecek apakah token yang dikirimkan sama dengan token yang disimpan di session.
   *
   * @return string $token
   * @return bool
   */
  public static function match($token)
  {
    $token_name = Config::get('session.token_name');

    if(Session::exists($token_name) && $token === Session::get($token_name)) {
      Session::delete($token_name);
      return true;
    }

    return false;
  }

}
