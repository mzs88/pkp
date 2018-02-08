<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_mnj extends CI_Model {

	public function loadKtgMnj()
	{
		$this->db->select('id_ktgmanaj, ktgmanaj');
		return $this->db->get('mnj_ktg');
	}

	public function checkVarNi($key, $pkms, $bln, $thn)
	{
		$this->db->select('idmanaj_penilaian');
		$this->db->from('mnj_rekap');
		$this->db->where('id_ktgmanaj', $key);
		$this->db->where('id_pkms', $pkms);
		$this->db->where('bln', $bln);
		$this->db->where('thn', $thn);
		return $this->db->get();

	}

	public function loadVarNilai($key, $pkms, $bln, $thn)
	{
		$this->db->select('mnj_rekap.idmanaj_penilaian, mnj_var.id_manajvar, mnj_var.mnj_var, mnj_var.mnj_do, mnj_nilai.nilai_0, mnj_nilai.nilai_4, mnj_nilai.nilai_7, mnj_nilai.nilai_10, mnj_rekap.hasil');
		$this->db->from('mnj_var');
		$this->db->join('mnj_nilai', 'mnj_nilai.id_manajvar = mnj_var.id_manajvar', 'left');
		$this->db->join('mnj_rekap', 'mnj_rekap.id_manajvar = mnj_var.id_manajvar', 'left');
		$this->db->where('mnj_var.id_ktgmanaj', $key);
		$this->db->where('mnj_rekap.id_pkms', $pkms);
		$this->db->where('mnj_rekap.bln', $bln);
		$this->db->where('mnj_rekap.thn', $thn);
		return $this->db->get();
	}

	public function loadVarNiEv($key, $pkms, $bln, $thn)
	{
		$this->db->select('mnj_rekap.idmanaj_penilaian, mnj_var.mnj_var, mnj_var.mnj_do, mnj_nilai.nilai_0, mnj_nilai.nilai_4, mnj_nilai.nilai_7, mnj_nilai.nilai_10, mnj_rekap.hasil, eva_mnj.coments, eva_mnj.rev_date');
		$this->db->from('mnj_rekap');
		$this->db->join('mnj_var', 'mnj_var.id_manajvar = mnj_rekap.id_manajvar', 'left');
		$this->db->join('mnj_nilai', 'mnj_nilai.id_manajvar = mnj_var.id_manajvar', 'left');
		$this->db->join('eva_mnj', 'eva_mnj.idmanaj_penilaian = mnj_rekap.idmanaj_penilaian', 'left');
		$this->db->where('mnj_rekap.id_ktgmanaj', $key);
		$this->db->where('mnj_rekap.id_pkms', $pkms);
		$this->db->where('mnj_rekap.bln', $bln);
		$this->db->where('mnj_rekap.thn', $thn);
		return $this->db->get();
	}

	public function loadVar($key)
	{
		$this->db->select('mnj_var.id_manajvar, mnj_var.mnj_var, mnj_var.mnj_do, mnj_nilai.nilai_0, mnj_nilai.nilai_4, mnj_nilai.nilai_7, mnj_nilai.nilai_10');
		$this->db->from('mnj_var');
		$this->db->join('mnj_nilai', 'mnj_nilai.id_manajvar = mnj_var.id_manajvar', 'left');
		$this->db->where('mnj_var.id_ktgmanaj', $key);
		return $this->db->get();
	}

	public function cekData($key)
	{

    $this->db->where('idmanaj_penilaian', $key);
    return $this->db->get('mnj_rekap');

  }

  public function insertMnj($data)
  {

    $this->db->insert('mnj_rekap',$data);

  }

  public function updateMnj($key, $data)
  {

    $this->db->where('idmanaj_penilaian', $key);
    $this->db->update('mnj_rekap', $data);

  }

}

/* End of file M_data_mnj.php */
/* Location: ./application/models/M_data_mnj.php */