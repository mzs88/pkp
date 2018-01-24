<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  #mengambil data analisa sesuai table
  public function md_ambil($key, $table, $field){

    $this->db->where($field, $key);
    $hasil = $this->db->get($table);
    return $hasil;

  }

  #insert data analisa sesuai table
  public function md_tambah($table, $data){

    $this->db->insert($table, $data);

  }

  #update data analisa sesuai table
  public function md_update($key, $field, $table, $data){

    $this->db->where($field, $key);
    $this->db->update($table, $data);

  }

  #mengambil data nilai ukes
  public function md_nilai($key){

    $this->db->where('idnilai_pkp',$key);
    $hasil = $this->db->get('nilai_pkp');
    return $hasil;

  }

  #insert data ukes
  public function md_tmbh_nilai($data){

    $this->db->insert('nilai_pkp', $data);

  }

  #update data ukes
  public function md_update_nilai($key, $data){

    $this->db->where('idnilai_pkp',$key);
    $this->db->update('nilai_pkp', $data);

  }





}
