<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  #mengambil data
  public function cekData($key){

    $this->db->where('id_manajvar', $key);
    $hasil = $this->db->get('mnj_rekap');
    return $hasil;

  }

  #insert data manajemen
  public function md_insert($data){

    $this->db->insert('mnj_rekap',$data);

  }

  #update data manajemen
  public function md_update($key, $data){

    $this->db->where('id_manajvar', $key);
    $this->db->update('mnj_rekap', $data);

  }

}
