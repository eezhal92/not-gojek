<?php

namespace App\Core;

use PDO;
use PDOException;

class DB
{
  /**
   * Instance dari DB.
   *
   * @var DB
   */
  private static $_instance = null;

  /**
   * Instance dari PDO
   *
   * @var PDO
   */
  private $_pdo;

  /**
   * Untuk menyimpan instance dari PDOStatement.
   *
   * @var PDO`nt
   */
  private $_query;

  /**
   * Status hasil eksekusi query
   *
   * @var boolean
   */
  private $_error = false;

  /**
   * Koleksi record hasil eksekusi query.
   *
   * @var array
   */
  private $_results;

  /**
   * Jumlah koleksi record hasil eksekusi query.
   *
   * @var integer
   */
  private $_count = 0;

  public function __construct()
  {
    try {
      $this->_pdo = new PDO('mysql:host='.env('hostname').';dbname='.env('database'), env('username'), env('password'));
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  /**
   * Membuat instance kelas DB dengan pola Singleton
   *
   * @return DB
   */
  public function getInstance()
  {
    if(!isset(self::$_instance)) {
      self::$_instance = new DB;
    }

    return self::$_instance;
  }

  /**
   * Eksekusi query
   *
   * @return $this
   */
  public function query($sql, $params = [])
  {
    $this->_error = false;

    if($this->_query = $this->_pdo->prepare($sql)) {
      $pos = 1;

      if(count($params)) {
        foreach ($params as $param) {
          $this->_query->bindValue($pos, $param);
          $pos++;
        }
      }

      if($this->_query->execute()) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        // dd($this->_results);
        $this->_count = $this->_query->rowCount();
      } else {
        $this->_error = true;
      }
    }

    return $this;
  }

  /**
   * Membuat query
   *
   * @return mixed
   */
  public function action($action, $table, $where = [])
  {
    if(count($where) == 3) {
      $allowed_operators = ['>', '<', '=', '>=', '<='];

      $field    = $where[0];
      $operator = $where[1];
      $value    = $where[2];

      if(in_array($operator, $allowed_operators)) {
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

        if(!$this->query($sql, [$value])->isError()) {
            return $this;
        }
      }
    } else if(count($where) == 0) {
      // Cek jika action adalah SElECT
      if (strpos(strtolower($action), 'select') !== false) {
        $sql = "{$action} FROM {$table}";
        if(!$this->query($sql, [])->isError()) {
            return $this;
        }
      }
    }

    return false;
  }

  /**
   * Membuat record baru pada table
   *
   * @param string $table
   * @param aray $fields
   * @return boolean
   */
  public function insert($table, $fields = [])
  {
    if(count($fields)) {
      $keys = array_keys($fields);
      $values = null;
      $x = 1;

      foreach ($fields as $field) {
        $values .= "?";
        if($x < count($fields)) {
            $values .=", ";
        }
        $x++;
      }

      $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

      // echo $sql;
      if(!$this->query($sql, $fields)->isError()) {
        return true;
      }
    }

    return false;
  }

  /**
   * Seleksi record dari table
   *
   * @param string $table
   * @param array $where
   * @return mixed
   */
  public function get($table, $where = [])
  {
    return $this->action("SELECT * ", $table, $where);
  }

  /**
   * Update record pada table
   *
   * @param string $table
   * @param integer $id
   * @param array $fields
   * @return boolean
   */
  public function update($table, $id_field, $fields = [])
  {
    if(count($fields)) {
      $sets = "";
      $i = 1;

      foreach ($fields as $field => $value) {
        $sets .="{$field} = ?";
        if($i < count($fields)) {
          $sets .=", ";
        }
        $i++;
      }

      if(is_array($id_field)) {
        $key = key($id_field);
        $sql = "UPDATE {$table} SET {$sets} WHERE {$key} = {$id_field[$key]}";        
       } // else {
      //   $sql = "UPDATE {$table} SET {$sets} WHERE id = {$id}";             
      // }

      if(!$this->query($sql, $fields)->isError()) {
        return true;
      }
    }

    return false;
  }

  /**
   * Menghapus record pada table
   *
   * @param string $table
   * @param array $where
   * @return mixed
   */
  public function delete($table, $where = [])
  {
    return $this->action("DELETE ", $table, $where);
  }

  /**
   * Mengembalikan hasil dari query
   *
   * @return array
   */
  public function results()
  {
    return $this->_results;
  }

  /**
   * Mengembalikan record pertama dari hasil query
   *
   * @return Object
   */
  public function first()
  {
    return $this->results()[0];
  }

  /**
   * Mengecek apabila terjadi error pada query
   *
   * @return boolean
   */
  public function isError()
  {
    return $this->_error;
  }

  /**
   * Mengembalikan jumlah record query
   *
   * @return integer
   */
  public function count()
  {
    return $this->_count;
  }

}
