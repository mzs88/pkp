<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart_pkms extends CI_Model {

	public function getBulan($thn)
	{
		$this->db->select('id_pkms, bln');
		$this->db->from('mt_rekap');
		$this->db->where('thn', $thn);
	}


	public function ukesChartA(){
    $this->db->select('ukes_a.idukes_a, ukes_a.ukes_a, bobot_a.bobot');
    $this->db->from('ukes_a');
    $this->db->join('bobot_a', 'bobot_a.idukes_a = ukes_a.idukes_a', 'left');
    return $this->db->get();
  }

  public function ukesChartB($key)
  {
  	$this->db->select('ukes_b.idukes_b, ukes_b.ukes_b, bobot_b.bobot');
  	$this->db->from('ukes_b');
  	$this->db->join('bobot_b', 'bobot_b.idukes_b = ukes_b.idukes_b', 'left');
  	$this->db->where('ukes_b.idukes_a', $key);
  	return $this->db->get();
  }

  public function ukesChartC($key)
  {
  	$this->db->select('idukes_c, ukes_c');
		$this->db->from('ukes_c');
		$this->db->where('idukes_b', $key);
		return $this->db->get();
  }

  public function ukesChartD($key, $pkms, $bln, $thn)
  {
  	$this->db->select('ukes_d.idukes_d, ukes_d.ukes_d, sasaran.id_sasaran, sasaran.sasaran, target.id_target, target.op, target.nilai, target.sat,  nilai_pkp.total, nilai_pkp.target, nilai_pkp.pencapaian, nilai_pkp.analisa, nilai_pkp.tindak_lanjut, nilai_pkp.bln');
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

  public function loadKtgMnjChart()
	{
		$this->db->select('mnj_ktg.id_ktgmanaj, mnj_ktg.ktgmanaj, mj_bobot.bobot');
		return $this->db->get('mnj_ktg');
	}

	public function loadDataManajChart($pkms, $bln, $thn)
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

	//data mutu

	public function getKtgMutuChart()
	{
		$this->db->select('mt_ktg.idmt_ktg, mt_ktg.mtktg, mt_bobot.bobot');
		$this->db->from('mt_ktg');
		$this->db->join('mt_bobot', 'mt_bobot.idmt_ktg = mt_ktg.idmt_ktg', 'left');
		return $this->db->get('');
	}

	public function loadRekapMutuChart($key, $pkms, $bln, $thn)
	{
		$this->db->select('mt_rekap.idmt_rekap, mt_op_htng.idmt_op_htng, mt_op_htng.variable, mt_op_htng.operasional, mt_op_htng.penghitungan, mt_rekap.total, mt_rekap.capaian, mt_target.idmt_target, mt_target.op, mt_target.target, mt_rekap.analisa, mt_rekap.tndk_lnjt, eva_mt.comments, eva_mt.rev_date, mt_bobot.bobot');
		$this->db->from('mt_ktg');
		$this->db->join('mt_op_htng', 'mt_op_htng.idmt_ktg = mt_ktg.idmt_ktg', 'left');
		$this->db->join('mt_rekap', 'mt_rekap.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->join('eva_mt', 'eva_mt.idmt_rekap = mt_rekap.idmt_rekap', 'left');
		$this->db->join('mt_target', 'mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->join('mt_bobot', 'mt_bobot.idmt_ktg = mt_rekap.idmt_ktg', 'left');
		$this->db->where('mt_rekap.idmt_ktg', $key);
		$this->db->where('mt_rekap.id_pkms', $pkms);
		$this->db->where('mt_rekap.bln', $bln);
		$this->db->where('mt_rekap.thn', $thn);
		return $this->db->get();
	}


}

/* End of file M_data_chart.php */
/* Location: ./application/models/M_data_chart.php */