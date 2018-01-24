<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Execute extends CI_Model {

		public function md_ambil($key){
			$this->db->where('id_pkms', $key);
			$hasil = $this->db->get('puskesmas');
			return $hasil;
		}

		public function md_tambah($data){
			$this->db->insert('puskesmas', $data);
		}

		public function md_update($key, $data){
			$this->db->where('id_pkms', $key);
			$this->db->update('puskesmas', $data);
		}

		public function md_delete($key){
			$this->db->where('id_pkms', $key);
			$this->db->delete('puskesmas');
		}

		public function md_reset($key, $data){
			$this->db->where('id_pkms', $key);
			$this->db->update('puskesmas', $data);
		}

	}

?>
