<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Loaddata extends CI_Model {

    public function mdl_ukesa(){
      $ukesa = $this->db->get("ukes_a")->result();
      return $ukesa;
    }

    public function mdl_ukesb($key){
      $this->db->where('idukes_a', $key);
      $ukesb = $this->db->get('ukes_b')->result();
      return $ukesb;
    }

    public function mdl_ukesc($key){
      $this->db->where('idukes_b', $key);
      $ukesc = $this->db->get('ukes_c')->result();
      return $ukesc;
    }

    public function mdl_ukesd($key){
      $this->db->where('idukes_c',$key);
      $ukesd = $this->db->get('ukes_d')->result();
      return $ukesd;

    }

  }
?>
