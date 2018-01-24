<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loadpenilaian extends CI_Model{

  public function md_pkms(){
    return $this->db->query(
      "SELECT distinct
        pkms.id_pkms,
        pkms.kode_pkms,
        pkms.nm_pkms,
        pkms.almt_pkms,
        pkms.kepala_pkms,
        YEAR(mjrkp.create_date) AS tahun
      FROM
        puskesmas pkms
          INNER JOIN
        mnj_rekap mjrkp ON mjrkp.id_pkms = pkms.id_pkms")->result();
  }

  #load ktg mannajement
  public function mdl_mnjktg(){
    $ktgmnj = $this->db->get("mnj_ktg")->result();
    return $ktgmnj;
  }

  #load detail manajemen dan revisi
  public function mdl_rev($key, $pkms){

    return $this->db->query(
      "SELECT
      	mnj_ktg.ktgmanaj,
      	mnj_var.id_manajvar,
      	mnj_var.mnj_var,
      	mnj_var.mnj_do,
      	mnj_rekap.idmanaj_penilaian,
      	mnj_nilai.nilai_0,
      	mnj_nilai.nilai_4,
      	mnj_nilai.nilai_7,
      	mnj_nilai.nilai_10,
      	mnj_rekap.hasil,
      	eva_mnj.ideva_mnj,
      	eva_mnj.coments,
      	eva_mnj.rev_date
      FROM
      	mnj_ktg
      LEFT JOIN mnj_var ON mnj_var.id_ktgmanaj = mnj_ktg.id_ktgmanaj
      LEFT JOIN mnj_nilai ON mnj_nilai.id_manajvar = mnj_var.id_manajvar
      LEFT JOIN mnj_rekap ON mnj_rekap.id_manajvar = mnj_var.id_manajvar
      LEFT OUTER JOIN eva_mnj ON eva_mnj.idmanaj_penilaian = mnj_rekap.idmanaj_penilaian
      WHERE
      	mnj_ktg.id_ktgmanaj = '$key'
      AND mnj_rekap.id_pkms = '$pkms'")->result();

  }

  #jumlah nilah hasil kategori Manajemen
  public function mdl_jumlah($key,$pkms){

    return $this->db->query(
      "SELECT
      	Sum(mnj_rekap.hasil) AS hasil
      FROM
      	mnj_rekap
      LEFT JOIN mnj_var ON mnj_rekap.id_manajvar = mnj_var.id_manajvar
      WHERE
      	mnj_var.id_ktgmanaj = '$key'
      AND mnj_rekap.id_pkms = '$pkms'")->result();

  }

}
