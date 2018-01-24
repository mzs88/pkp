<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loaddata extends CI_Model{

  public function mdl_target(){

    return $this->db->query(
      "SELECT
        target.id_target,
        ukes_d.ukes_d,
        sasaran.sasaran,
        target.op,
        target.nilai,
        target.tahun
      FROM
        sasaran
      INNER JOIN target ON target.id_sasaran = sasaran.id_sasaran
      INNER JOIN ukes_d ON target.id_sasaran = ukes_d.idukes_d")->result();

  }

  public function mdl_ukkd(){

    return $this->db->query(
      "SELECT
        ukes_d.idukes_d,
        ukes_d.ukes_d
      FROM
        ukes_d
      WHERE
        idukes_d NOT IN (
          SELECT
            target.idukes_d
          FROM
            target
        )")->result();

  }

  public function mdl_sasaran(){

    return $this->db->get('sasaran')->result();

  }

}
