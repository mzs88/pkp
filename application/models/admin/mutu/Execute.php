<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Execute extends CI_Model{

  public function __construct()  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function md_data($key){
    $this->db->where('idmt_target',$key);
    return $this->db->get('mt_target');
  }

  public function md_insert($data){
    return $this->db->insert('mt_target',$data);
  }

  public function md_update($key, $data){
    $this->db->where('idmt_target', $key);
    return $this->db->update('mt_target', $data);
  }

  public function md_revdata($key){
    $this->db->where('idevaluasi_mutu', $key);
    return $this->db->get('evaluasi_mutu');
  }

  public function md_revinsert($data){
    return $this->db->insert('evaluasi_mutu',  $data);
  }

  public function md_revupdate($key, $data){
    $this->db->where('idevaluasi_mutu', $key);
    return $this->db->update('evaluasi_mutu', $data);
  }

}
