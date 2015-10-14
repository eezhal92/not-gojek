<?php

namespace App\Core;

class Hash
{

  /**
   * Nilai default crypt cost factor.
   *
   * @var int
   */
  protected static $rounds = 10;

  /**
   * Hash nilai yang diberi.
   * Jika ingin menyimpan di database, siapkan field dengan legth minimal 60, sebaiknya 255.
   */
  public static function make($string, $options = [])
  {
    $cost = isset($options['rounds']) ? $options['rounds'] : self::$rounds;

    return password_hash($string, PASSWORD_DEFAULT, ['cost' => $cost]);
  }

  /**
   * Mengecek nilai plain yang diberi dengan hash.
   *
   * @param  string  $value
   * @param  string  $hashed_value
   * @return bool
   */
  public static function check($value, $hashed_value)
  {
    if(strlen($hashed_value === 0)) {
      return false;
    }

    return password_verify($value, $hashed_value);
  }

}
