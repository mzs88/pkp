<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_rekap extends CI_Model {

	public function ukesRkpA(){
    $this->db->select('ukes_a.idukes_a, ukes_a.ukes_a, bobot_a.bobot');
    $this->db->from('ukes_a');
    $this->db->join('bobot_a', 'bobot_a.idukes_a = ukes_a.idukes_a', 'left');
    return $this->db->get();
  }

  public function ukesRkpB($key)
  {
  	$this->db->select('ukes_b.idukes_b, ukes_b.ukes_b, bobot_b.bobot');
  	$this->db->from('ukes_b');
  	$this->db->join('bobot_b', 'bobot_b.idukes_b = ukes_b.idukes_b', 'left');
  	$this->db->where('ukes_b.idukes_a', $key);
  	return $this->db->get();
  }

  public function ukesRkpC($key)
  {
  	$this->db->select('idukes_c, ukes_c');
		$this->db->from('ukes_c');
		$this->db->where('idukes_b', $key);
		return $this->db->get();
  }

  public function ukesRkpD($key, $pkms, $bln, $thn)
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

  // data rekap
  public function loadKtgMnj()
	{
		$this->db->select('mnj_ktg.id_ktgmanaj, mnj_ktg.ktgmanaj, mj_bobot.bobot');
		return $this->db->get('mnj_ktg');
	}

  public function loadDataManaj($pkms, $bln, $thn)
	{
		//$this->db->distinct();
		$this->db->select('DISTINCT mnj_ktg.ktgmanaj, mnj_rekap.hasil, mj_bobot.bobot',false);
		$this->db->from('mnj_ktg');
		$this->db->join('mnj_rekap', 'mnj_rekap.id_ktgmanaj = mnj_ktg.id_ktgmanaj', 'left');
		$this->db->join('mj_bobot', 'mj_bobot.id_ktgmanaj = mnj_rekap.id_ktgmanaj', 'left');
		// $this->db->where('mnj_rekap.id_ktgmanaj', $key);
		$this->db->where('mnj_rekap.id_pkms', $pkms);
		$this->db->where('mnj_rekap.bln', $bln);
		$this->db->where('mnj_rekap.thn', $thn);
		return $this->db->get();
	}

}

/* End of file M_data_rekap.php */
/* Location: ./application/models/M_data_rekap.php */