<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  #load data penilian mutu
  public function mdl_load($key)
  {

    $this->db->where('idmt_rekap',$key);
    $mutu = $this->db->get('mt_rekap');
    return $mutu;

  }

  #insert data penilian mutu
  public function insertMutu($data)
  {

    $this->db->insert('mt_rekap',$data);

  }

  #update data penilian mutu
  public function updateMutu($key, $data)
  {

    $this->db->where('idmt_rekap', $key);
    $this->db->update('mt_rekap',$data);

  }

}
