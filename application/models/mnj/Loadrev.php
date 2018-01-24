<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loadrev extends CI_Model{

  #load ktg mannajement
  public function mdl_mnjktg()
  {
    $ktgmnj = $this->db->get("ktgmanaj")->result();
    return $ktgmnj;
  }

  #load detail manajemen dan revisi
  public function mdl_rev($key){

    $rev = $this->db->query(
      "SELECT
      	ktgmanaj.ktgmanaj,
        mnj_var.id_manajvar,
      	mnj_var.mnj_var,
      	mnj_var.mnj_do,
      	mnj_nilai.nilai_0,
      	mnj_nilai.nilai_4,
      	mnj_nilai.nilai_7,
      	mnj_nilai.nilai_10,
      	mnj_rekap.hasil,
      	eva_mnj.coments,
      	eva_mnj.rev_date
      FROM
      	ktgmanaj
      LEFT JOIN mnj_var ON mnj_var.id_ktgmanaj = ktgmanaj.id_ktgmanaj
      LEFT JOIN mnj_nilai ON mnj_nilai.id_manajvar = mnj_var.id_manajvar
      LEFT JOIN mnj_rekap ON mnj_rekap.id_manajvar = mnj_var.id_manajvar
      LEFT OUTER JOIN eva_mnj ON eva_mnj.idmnj_rekap = mnj_rekap.idmnj_rekap
      WHERE
      	ktgmanaj.id_ktgmanaj = '$key'")->result();
    return $rev;

  }

  #jumlah nilah hasil kategori Manajemen
  public function mdl_jumlah($key){

    $jumlah = $this->db->query(
      "SELECT
      	Sum(mnj_rekap.hasil) AS hasil
      FROM
      	mnj_rekap
      LEFT JOIN mnj_var ON mnj_rekap.id_manajvar = mnj_var.id_manajvar
      WHERE
      	mnj_var.id_ktgmanaj = '$key'")->result();
    return $jumlah;

  }

}
