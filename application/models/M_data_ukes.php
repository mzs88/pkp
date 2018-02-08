<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_ukes extends CI_Model {

	public function loadUkesA()
	{
		$this->db->select('idukes_a, ukes_a');
		$this->db->from('ukes_a');
		return $this->db->get()->result();
	}

	public function loadUkesB($key)
	{
		$this->db->select('idukes_b, ukes_b');
		$this->db->from('ukes_b');
		$this->db->where('idukes_a', $key);
		return $this->db->get()->result();
	}

	public function loadUkesC($key)
	{
		$this->db->select('idukes_c, ukes_c');
		$this->db->from('ukes_c');
		$this->db->where('idukes_b', $key);
		return $this->db->get()->result();
	}

	public function checkData($key, $pkms, $bln, $thn)
	{
		$this->db->select('ukes_d.idukes_d');
		$this->db->from('ukes_d');
		$this->db->join('nilai_pkp', 'nilai_pkp.idukes_d = ukes_d.idukes_d');
		$this->db->where('ukes_d.idukes_c', $key);
		$this->db->where('nilai_pkp.id_pkms', $pkms);
		$this->db->where('nilai_pkp.bln', $bln);
		$this->db->where('nilai_pkp.thn', $thn);
		return $this->db->get();
	}

	// public function getNilai($key, $pkms, $bln, $thn)
	// {

	// }

	public function loadUkesD($key)
	{
		$this->db->select('ukes_d.idukes_d, ukes_d.ukes_d, target.op, target.nilai, target.sat, sasaran.id_sasaran, sasaran.sasaran');
		$this->db->from('ukes_d');
		$this->db->join('target', 'target.idukes_d = ukes_d.idukes_d', 'left');
		$this->db->join('sasaran', 'sasaran.id_sasaran = target.id_sasaran', 'left');
		$this->db->where('ukes_d.idukes_c', $key);
		return $this->db->get();
	}

	public function loadFilterData($pkms, $bln, $thn)
	{
		$this->db->distinct();
		$this->db->select('nilai_pkp.bln, nilai_pkp.thn');
		$this->db->from('puskesmas');
		$this->db->join('nilai_pkp', 'nilai_pkp.id_pkms = puskesmas.id_pkms');
		$this->db->where('puskesmas.id_pkms', $pkms);
		$this->db->where('nilai_pkp.bln', $bln);
		$this->db->where('nilai_pkp.thn', $thn);
		return $this->db->get();
	}

	public function loadNilaiUkes($key, $pkms, $bln, $thn)
	{
		$this->db->select('ukes_d.idukes_d, ukes_d.ukes_d, sasaran.id_sasaran, sasaran.sasaran, target.id_target, target.op, target.nilai, target.sat,  nilai_pkp.total, nilai_pkp.target, nilai_pkp.pencapaian, nilai_pkp.analisa, nilai_pkp.tindak_lanjut');
		$this->db->from('ukes_d');
		$this->db->join('nilai_pkp', 'nilai_pkp.idukes_d = ukes_d.idukes_d', 'left');
		$this->db->join('target', 'target.idukes_d = ukes_d.idukes_d', 'left');
		$this->db->join('sasaran', 'sasaran.id_sasaran = target.id_sasaran', 'left');
		$this->db->where('ukes_d.idukes_c', $key);
		$this->db->where('nilai_pkp.id_pkms', $pkms);
		$this->db->where('nilai_pkp.bln', $bln);
		$this->db->where('nilai_pkp.thn', $thn);
		return $this->db->get();
	}

	public function checkDataUkes($key)
	{
		$this->db->where('idnilai_pkp', $key);
		return $this->db->get('nilai_pkp');
	}

	public function addNilaiUkes($data)
	{
		$this->db->insert('nilai_pkp', $data);
	}

	public function updateNilaiUkes($key, $data)
	{
		$this->db->where('idnilai_pkp', $key);
		$this->db->update('nilai_pkp', $data);
	}



}

/* End of file M_data_input_ukes.php */
/* Location: ./application/models/M_data_input_ukes.php */