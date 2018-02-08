<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_verifikasi_login extends CI_Model {

	public function chek_operator($uname, $pass)
	{
		$this->db->select('idoperator, nama, uname, pass');
		$this->db->from('operator');
		$this->db->where('uname', $uname);
		$this->db->where('pass', $pass);
		return $this->db->get();
	}

	public function chek_pkms($kode, $pass)
	{
		$this->db->select('id_pkms, kode_pkms, nm_pkms, pass');
		$this->db->from('puskesmas');
		$this->db->where('kode_pkms', $kode);
		$this->db->where('pass', $pass);
		return $this->db->get();
	}

}

/* End of file Verifikasi_login.php */
/* Location: ./application/models/Verifikasi_login.php */