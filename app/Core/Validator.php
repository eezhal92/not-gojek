<?php

namespace App\Core;

class Validator
{
  
  /**
   * Indikasi apakah validasi berhasil dilewati.
   *
   * @var boolean $passed
   */
  private $passed = false;

  /**
   * Daftar error, jika tidak sesuai rule validasi.
   *
   * @var array $errors
   */
  private $errors = [];

  /**
   * Objek DB, digunakan untuk mengakses database.
   *
   * @var DB $db
   */
  private $db;

  /**
   * Menampung rules yang akan divalidasi.
   *
   * @var array $rules
   */
  private $rules = [];

  /**
   * Menampung rules yang diperbolehlan/tersedia.
   *
   * @var array $rules
   */
  private $allowed_rules = [
    'required', 'min', 'max', 'matches', 'unique'
  ];

  public function __construct()
  {
    // $this->db = DB::getInstance();
  }

  private function check($source, $items = [])
  {
    foreach ($items as $item => $rules) {
      foreach ($rules as $rule => $rule_value) {
        $value = trim($source[$item]);

        if($rule == 'required' && empty($value)) {
          $this->addError("{$item} is required");
        } else if(!empty($value)) {
          switch ($rule) {
            case 'min':
              if(strlen($value) < $rule_value) {
                $this->addError("{$item} must be a minimum of {$rule_value}");
              }
              break;

            case 'max':
              if(strlen($value) > $rule_value) {
                $this->addError("{$item} must be a maximum of {$rule_value}");
              }
              break;

            case 'matches':
              if($value != $source[$rule_value]) {
                $this->addError("{$item} must match {$rule_value}");
              }
              break;

            case 'unique':
              # perform db query
              break;

          }
        }
      }
    }

    if(empty($this->errors)) {
      $this->passed = true;
    }

    return $this;
  }

  /**
   * Validasi rule sesuai input.
   * Contoh: $v->validate($_POST, ['name' => 'required|min:3'])
   *
   * @param array $source
   * @param array $items
   * @return void
   */
  public function validate($source, $items = [])
  {

    foreach($items as $field => $rules) {
      $explode = explode('|',$rules);
      $rules = [];
      foreach($explode as $value){
        $x = explode(':', $value);
        if(count($x) == 1) {
          if($this->isInRule($x[0])) {
            array_push($x, true);
            list($key, $val) = $x;
          }
        } else {
          if($this->isInRule($x[0])) {
            list($key, $val) = $x;
            if((int)$val) $val = (int)$val;
          }
        }

        $rules[$key] = $val;
      }

      $this->rules[$field] = $rules;
    }

    $this->check($source, $this->rules);
  }

  /**
   * Mengecek apakah nilai yang diberikan terdaftar dalam
   * rule yang diperbolehkan.
   *
   * @param string $rule
   * @return Exception|boolean
   */
  private function isInRule($rule)
  {
    if(!in_array($rule, $this->allowed_rules)) {
        throw new Exception("There's no rule such: {$rule}. Please provide correct rule.");
    }

    return true;
  }

  /**
   * Menambah pesan error
   *
   * @param string $error
   * @return void
   */
  public function addError($error)
  {
    $this->errors[] = $error;
  }

  /**
   * Mengembalikan semua error pada suatu request.
   *
   * @return array $errors
   */
  public function errors()
  {
    return $this->errors;
  }

  /**
   * Mengembalkan nilai apakah proses validasi berhasil.
   *
   * @return boolean
   */
  public function passed()
  {
    return $this->passed;
  }

}
