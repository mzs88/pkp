<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_user extends CI_Model {
		public function md_ambil($key){
			$this->db->where('idoperator', $key);
			$hasil = $this->db->get('operator');
			return $hasil;
		}

		public function md_tambah($data){
			$this->db->insert('operator', $data);
		}

		public function md_update($key, $data){
			$this->db->where('idoperator', $key);
			$this->db->update('operator', $data);
		}

		public function md_delete($key){
			$this->db->where('idoperator', $key);
			$this->db->delete('operator');
		}

		public function md_reset($key, $data){
			$this->db->where('idoperator', $key);
			$this->db->update('operator', $data);
		}
}