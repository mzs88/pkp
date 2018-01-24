<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  public function mdl_data($key){

    $this->db->where('idmanaj_penilaian',$key);
    return $this->db->get('mnj_nilai');

  }

  public function mdl_insert($data){

    $this->db->insert('mnj_nilai',$data);

  }

  public function mdl_update($key, $data){

    $this->db->where('idmanaj_penilaian',$key);
    $this->db->update('mnj_nilai',$data);

  }

  public function dtEva($key)
  {
    $this->db->where('idmanaj_penilaian',$key);
    return $this->db->get('eva_mnj');
  }

  public function inEva($data)
  {
    $this->db->insert('eva_mnj',$data);
  }

  public function upEva($key, $data)
  {
    $this->db->where('idmanaj_penilaian', $key);
    $this->db->update('eva_mnj', $data);
  }

}
