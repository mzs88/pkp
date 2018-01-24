<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_target extends CI_Model {

    public function md_ambil($key){
      $this->db->where('idukes_d', $key);
      $hasil = $this->db->get('target');
      return $hasil;
    }

    public function md_tambah($data){
      $this->db->insert('target', $data);
    }

    public function md_update($key, $data){
      $this->db->where('idukes_d', $key);
      $this->db->update('target', $data);
    }

	public function ambil_ukkb($key){
		$this->db->where('id_ukka', $key);
		$query = $this->db->get('ukk_b');

    if($query->result()){
        $result = $query->result();

        foreach($result as $row){
            $options[$row->id_ukkb] = $row->ukkb;
        }
        return $options;
    }
	}


	public function ambil_ukkc	($key){
		$this->db->where('id_ukkb', $key);
		$query = $this->db->get('ukk_c');

    if($query->result()){
        $result = $query->result();

        foreach($result as $row){
            $options[$row->id_ukkc] = $row->ukkc;
        }
        return $options;
    }
	}


}
