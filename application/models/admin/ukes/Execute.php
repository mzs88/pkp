<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  public function __construct()  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function mdl_data($key,$field,$table){

    $this->db->where($field, $key);
    return $this->db->get($table);

  }

  public function mdl_insert($table,$data){

    return $this->db->insert($table,$data);

  }

  public function mdl_update($key, $field, $table, $data){

    $this->db->where($field, $key);
    return $this->db->update($table, $data);

  }

}
