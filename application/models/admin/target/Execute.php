<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  public function mdl_data($key){

    $this->db->where('id_target',$key);
    $target = $this->db->get('target')->result();
    return $target;

  }

  public function mdl_insert($data){

    return $this->db->insert('target')->result();

  }

}
