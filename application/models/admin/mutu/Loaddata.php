<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loaddata extends CI_Model{

  public function __construct()  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function md_pkms(){
    return $this->db->query(
      "SELECT DISTINCT
      	puskesmas.id_pkms,
      	puskesmas.kode_pkms,
      	puskesmas.nm_pkms,
      	puskesmas.almt_pkms,
      	puskesmas.kepala_pkms,
      	YEAR(mt_rekap.create_date) as tahun
      FROM
      	puskesmas
      INNER JOIN mt_rekap ON mt_rekap.id_pkms = puskesmas.id_pkms")->result();
  }

  public function md_target(){

    return $this->db->query(
      "SELECT
      	mt_op_htng.idmt_op_htng,
      	mt_op_htng.variable,
      	mt_op_htng.operasional,
      	mt_op_htng.penghitungan,
      	mt_target.idmt_target,
      	mt_target.op,
      	mt_target.target,
      	mt_target.tahun,
      	mt_target.create_date,
      	operator.nama
      FROM
      	mt_target
      LEFT JOIN mt_op_htng ON mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng
      LEFT JOIN operator ON mt_target.idoperator = operator.idoperator")->result();

  }

  #load variable dan target mutu
  public function mdl_varmutu($pkms){
    $vardo = $this->db->query(
      "SELECT
      	mt_op_htng.idmt_op_htng,
      	mt_op_htng.variable,
      	mt_op_htng.operasional,
      	mt_op_htng.penghitungan,
      	mt_target.op,
      	mt_target.target,
      	mt_rekap.idmt_rekap,
      	mt_rekap.total,
      	mt_rekap.capaian,
      	mt_rekap.analisa,
      	mt_rekap.tndk_lnjt,
      	eva_mt.idmt_rev,
      	eva_mt.comments,
      	eva_mt.rev_date
      FROM
      	mt_op_htng
      LEFT JOIN mt_target ON mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng
      LEFT JOIN mt_rekap ON mt_rekap.idmt_op_htng = mt_op_htng.idmt_op_htng
      LEFT JOIN eva_mt ON eva_mt.idmt_rekap = mt_rekap.idmt_rekap
      WHERE
      	mt_rekap.id_pkms = '$pkms'")->result();
    return $vardo;
  }


}
