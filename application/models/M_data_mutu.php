<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_mutu extends CI_Model {

	public function getKtgMutu()
	{
		$this->db->select('idmt_ktg, mtktg');
		return $this->db->get('mt_ktg');
	}

	public function checkNiMutu($key, $pkms, $bln, $thn)
	{
		$this->db->select('idmt_rekap');
		$this->db->from('mt_rekap');
		$this->db->where('idmt_ktg', $key);
		$this->db->where('id_pkms', $pkms);
		$this->db->where('bln', $bln);
		$this->db->where('thn', $thn);
		return $this->db->get();
	}

	public function loadVar($key)
	{
		$this->db->select('mt_ktg.idmt_ktg, mt_op_htng.idmt_op_htng, mt_op_htng.variable, mt_op_htng.operasional, mt_op_htng.penghitungan, mt_target.op, mt_target.target');
		$this->db->from('mt_ktg');
		$this->db->join('mt_op_htng', 'mt_op_htng.idmt_ktg = mt_ktg.idmt_ktg', 'left');
		$this->db->join('mt_target', 'mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->where('mt_op_htng.idmt_ktg', $key);
		return $this->db->get();
	}

	public function loadVarNiEv($key, $pkms, $bln, $thn)
	{
		$this->db->select('mt_rekap.idmt_rekap, mt_op_htng.idmt_op_htng, mt_op_htng.variable, mt_op_htng.operasional, mt_op_htng.penghitungan, mt_rekap.total, mt_rekap.capaian, mt_target.idmt_target, mt_target.op, mt_target.target, mt_rekap.analisa, mt_rekap.tndk_lnjt, eva_mt.comments, eva_mt.rev_date');
		$this->db->from('mt_rekap');
		$this->db->join('mt_op_htng', 'mt_op_htng.idmt_ktg = mt_rekap.idmt_ktg', 'left');
		$this->db->join('mt_target', 'mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->join('eva_mt', 'eva_mt.idmt_rekap = mt_rekap.idmt_rekap', 'left');
		$this->db->where('mt_rekap.idmt_ktg', $key);
		$this->db->where('mt_rekap.id_pkms', $pkms);
		$this->db->where('mt_rekap.bln', $bln);
		$this->db->where('mt_rekap.thn', $thn);
		return $this->db->get();
	}

	public function loadDataMutu($key, $pkms, $bln, $thn)
	{
		$this->db->select('mt_rekap.idmt_rekap, mt_op_htng.idmt_op_htng, mt_op_htng.variable, mt_op_htng.operasional, mt_op_htng.penghitungan, mt_rekap.total, mt_rekap.capaian, mt_target.idmt_target, mt_target.op, mt_target.target, mt_rekap.analisa, mt_rekap.tndk_lnjt, eva_mt.comments, eva_mt.rev_date');
		$this->db->from('mt_ktg');
		$this->db->join('mt_op_htng', 'mt_op_htng.idmt_ktg = mt_ktg.idmt_ktg', 'left');
		$this->db->join('mt_rekap', 'mt_rekap.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->join('eva_mt', 'eva_mt.idmt_rekap = mt_rekap.idmt_rekap', 'left');
		$this->db->join('mt_target', 'mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng', 'left');
		$this->db->where('mt_rekap.idmt_ktg', $key);
		$this->db->where('mt_rekap.id_pkms', $pkms);
		$this->db->where('mt_rekap.bln', $bln);
		$this->db->where('mt_rekap.thn', $thn);
		return $this->db->get();
	}

	public function checkData($key)
	{
		$this->db->where('idmt_rekap', $key);
		return $this->db->get('mt_rekap');
	}

	public function insertMutu($data)
	{
		$this->db->insert('mt_rekap', $data);
	}

	public function updateMutu($key, $data)
	{
		$this->db->where('idmt_rekap', $key);
		$this->db->update('mt_rekap', $data);
	}

}

/* End of file M_data_mutu.php */
/* Location: ./application/models/M_data_mutu.php */