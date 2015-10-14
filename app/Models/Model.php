<?php

namespace App\Models;

use App\Core\DB;

abstract class Model {

  /**
   * Instance dari kelas DB. Untuk mengakses data pada tabel.
   *
   * @var DB $db
   */
  protected $db;

  /**
   * Tabel database yang digunakan model ini.
   *
   * @var string
   */
  protected $table;

  /**
   * Primary key model ini, default.
   *
   * @var integer
   */
  protected $primaryKey = 'id';

  /**
   * Set instance DB pada property $db.
   *
   * @return void
   */
  public function __construct()
  {
    $this->db = DB::getInstance();
  }

  /**
   * Mengambil record data tertentu, berdasarkan column id.
   *
   * @param integer|array $fields
   * @return StdClass Object
   */
  public function find($fields)
  {
    if (!is_array($fields)) $fields = [$this->primaryKey, '=', $fields]; 
      
    $this->db->get($this->table, $fields);            
    
    return $this->db->first();
  }

  /**
   * Mengambil semua data record.
   *
   * @return array
   */
  public function all()
  {
      $this->db->get($this->table);

      return $this->db->results();
  }

  /**
   * Membuat record baru.
   *
   * @return boolean
   */
  public function create($data = [])
  {
    try {
      $this->db->insert($this->table, $data);

      return true;
    } catch(\Exception $e) {
      die($e->getMessage);
    }
  }

  /**
   * Memperbarui record tertentu.
   *
   * @param integer $id
   * @param array $data
   * @return boolean
   */
  public function update($id, $data = [])
  {
    try {
      if(!is_array($id)) $id = [$this->primaryKey => $id];
      $this->db->update($this->table, $id, $data);

      return true;
    } catch(\Exception $e) {
      die($e->getMessage);
    }
  }

  /**
   * Menghapus record tertentu berdasarkan column id.
   *
   * @param integer $id
   * @return bool
   */
  public function delete($id)
  {
    try {
      $this->db->delete($this->table, [$this->primaryKey, '=', $id]);

      return true;
    } catch(\Exception $e) {
      throw new \Exception("Cannot delete record.");
    }
  }

}
