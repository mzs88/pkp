<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_mutu extends CI_Model {

	public function getKtgMutu()
	{
		$this->db->select('idmt_ktg, mtktg');
		return $this->db->get('mt_ktg');
	}

	public function cekNilaiMutu($key, $pkms, $bln, $thn)
	{
		$this->db->select('idmt_ktg');
		$this->db->from('mt_rekap');
		$this->db->where('idmt_ktg', $key);
		$this->db->where('id_pkms', $pkms);
		$this->db->where('bln', $bln);
		$this->db->where('thn', $thn);
		return $this->db->get();
	}

}

/* End of file M_data_mutu.php */
/* Location: ./application/models/M_data_mutu.php */