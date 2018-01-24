<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Loadmutu extends CI_Model {

    #load variable dan target mutu
    public function mdl_varmutu(){
      $vardo = $this->db->query(
        "SELECT
        	mt_op_htng.idmt_op_htng,
        	mt_op_htng.variable,
        	mt_op_htng.operasional,
        	mt_op_htng.penghitungan,
        	mt_target.op,
        	mt_target.target,
        	mt_rekap.idmt_rekap,
        	mt_rekap.mutu_total,
        	mt_rekap.mutu_capaian,
        	mt_rekap.mutu_analisa,
        	mt_rekap.mutu_rtl,
        	evaluasi_mutu.coments,
        	evaluasi_mutu.rev_date
        FROM
        	mt_op_htng
        LEFT JOIN mt_target ON mt_target.idmt_op_htng = mt_op_htng.idmt_op_htng
        LEFT JOIN mt_rekap ON mt_rekap.idmt_op_htng = mt_op_htng.idmt_op_htng
        LEFT JOIN evaluasi_mutu ON evaluasi_mutu.idmt_rekap = mt_rekap.idmt_rekap")->result();
      return $vardo;
    }

  }
?>
