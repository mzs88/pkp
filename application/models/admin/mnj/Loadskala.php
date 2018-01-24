<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loadskala extends CI_Model{

  public function __construct()  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function md_ktg(){
    return $this->db->get('mnj_ktg')->result();
  }

  public function md_skala($key){
    return $this->db->query(
      "SELECT
      	mnj_var.id_manajvar,
      	mnj_var.mnj_var,
      	mnj_var.mnj_do,
      	mnj_nilai.idmnj_nilai,
      	mnj_nilai.nilai_0,
      	mnj_nilai.nilai_4,
      	mnj_nilai.nilai_7,
      	mnj_nilai.nilai_10,
      	mnj_nilai.create_date,
      	mnj_nilai.edit_date,
      	operator.idoperator,
      	operator.nama
      FROM
      	mnj_var
      LEFT JOIN mnj_nilai ON mnj_nilai.id_manajvar = mnj_var.id_manajvar
      LEFT JOIN operator ON mnj_nilai.idoperator = operator.idoperator
      WHERE
      	mnj_var.id_ktgmanaj = '$key'")->result();
  }

}
