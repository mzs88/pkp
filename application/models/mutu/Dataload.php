<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataload extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	public function ktgMutu()
	{
		return $this->db->get('mt_ktg')->result();
	}

	public function cekNilaiMutu($key,$pkms,$bln)
	{
		return $this->db->query(
			"SELECT
			  *
			FROM
			  mt_rekap mpnl
			LEFT JOIN
			  mt_op_htng mvar ON mvar.idmt_op_htng = mpnl.idmt_op_htng
			LEFT JOIN
			  mt_ktg ktg ON ktg.idmt_ktg = mvar.idmt_ktg
			WHERE
			  ktg.idmt_ktg = '$key' AND mpnl.id_pkms = '$pkms' AND MONTH(mpnl.create_date) = '$bln'");	;
	}

	public function varKosong()
	{
		return $this->db->query(
			"SELECT
			  ktg.idmt_ktg,
			  ktg.mtktg,
			  opht.idmt_op_htng,
			  opht.variable,
			  opht.operasional,
			  opht.penghitungan,
			  mtar.idmt_target,
			  mtar.op,
			  mtar.target
			FROM
			  mt_ktg ktg
			LEFT JOIN
			  mt_op_htng opht ON opht.idmt_ktg = ktg.idmt_ktg
			LEFT JOIN
			  mt_target mtar ON mtar.idmt_op_htng = opht.idmt_op_htng")->result();
	}

	#load variable dan target mutu
  public function mdl_varmutu($key,$pkms,$bln)
  {
    $vardo = $this->db->query(
      "SELECT
			  *
			FROM
			  mt_op_htng mvar
			LEFT JOIN
			  mt_ktg ktg ON ktg.idmt_ktg = mvar.idmt_ktg
			LEFT JOIN
			  mt_target mtar ON mtar.idmt_op_htng = mvar.idmt_op_htng
			LEFT JOIN
			  mt_rekap mpnl ON mpnl.idmt_op_htng = mvar.idmt_op_htng
			WHERE
			  mvar.idmt_ktg = '$key' AND mpnl.id_pkms = '$pkms' AND MONTH(mpnl.create_date) = '$bln'")->result();
    return $vardo;
  }

  public function getVar($key)
  {
  	return $this->db->query(
  		"SELECT
			  *
			FROM
			  mt_op_htng mvar
			LEFT JOIN
			  mt_ktg ktg ON ktg.idmt_ktg = mvar.idmt_ktg
			LEFT JOIN
			  mt_target mtar ON mtar.idmt_op_htng = mvar.idmt_op_htng
			WHERE
			  ktg.idmt_ktg = '$key'")->result();
  }

  public function dataRekap($pkms)
  {
  	return $this->db->query(
  		"SELECT DISTINCT
			  MONTH(mtrkp.create_date) AS bulan,
			  YEAR(mtrkp.create_date) AS tahun
			FROM
			  mt_rekap mtrkp
			LEFT JOIN
			  puskesmas pkms ON pkms.id_pkms = mtrkp.id_pkms
			WHERE
			  pkms.id_pkms = '$pkms'")->result();
  }

  public function ktgRekap($pkms, $bln, $thn)
  {
  	return $this->db->query(
  		"SELECT DISTINCT
  			mtktg.idmt_ktg,
			  mtktg.mtktg,
			  mtrkp.total_var
			FROM
			  mt_ktg mtktg
			LEFT JOIN
			  mt_op_htng mtop ON mtop.idmt_ktg = mtktg.idmt_ktg
			LEFT JOIN
			  mt_rekap mtrkp ON mtrkp.idmt_op_htng = mtop.idmt_op_htng
			WHERE
			  mtrkp.id_pkms = '$pkms' AND MONTH(mtrkp.create_date) = '$bln' AND YEAR(mtrkp.create_date) = '$thn'")->result();

  }

  public function varRekap($ktg, $pkms, $bln, $thn)
  {
  	return $this->db->query(
  		"SELECT
			  *
			FROM
			  mt_op_htng mtop
			LEFT JOIN
			  mt_target mttar ON mttar.idmt_op_htng = mtop.idmt_op_htng
			LEFT JOIN
			  mt_rekap mtrkp ON mtrkp.idmt_op_htng = mtop.idmt_op_htng
		  LEFT JOIN
			  eva_mt emt ON mtrkp.idmt_rekap = emt.idmt_rekap
			WHERE
			  mtrkp.id_pkms = '$pkms' AND mtop.idmt_ktg = '$ktg' AND MONTH(mtrkp.create_date) = '$bln' AND YEAR(mtrkp.create_date) = '$thn'")->result();
  }

}



/* End of file Dataload.php */
/* Location: ./application/models/Dataload.php */