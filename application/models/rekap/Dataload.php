<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataload extends CI_Model {

	public function pkmsRekap($pkms)
	{

    return $this->db->query(
      "SELECT DISTINCT

          MONTHNAME(npkp.create_date) as bulan,
          YEAR(npkp.create_date) as tahun,
          MONTH(npkp.create_date) as bln
      FROM
          nilai_pkp npkp
              LEFT JOIN
          puskesmas pkms ON pkms.id_pkms = npkp.id_pkms
      WHERE
          pkms.id_pkms = '$pkms'")->result();
  }

	public function ukesRkpA($pkms, $bln, $thn ){
    return $this->db->query(
      "SELECT
        ukes_a.idukes_a,ukes_a.ukes_a, bobot_a.bobot, analisa_a.create_date
      FROM
        ukes_a
          LEFT JOIN
        bobot_a ON bobot_a.idukes_a = ukes_a.idukes_a
          LEFT JOIN
        analisa_a ON analisa_a.idukes_a = ukes_a.idukes_a
      WHERE
        analisa_a.id_pkms = '$pkms'
          AND MONTH(analisa_a.create_date) = '$bln' AND YEAR(analisa_a.create_date) = '$thn'")->result();
  }

  public function ukesRkpB($key, $pkms, $bln, $thn){
    return $this->db->query(
      "SELECT
          ukes_b.ukes_b,
          analisa_b.nilai,
          bobot_b.bobot,
          analisa_b.nilai * bobot_b.bobot AS program,
          analisa_b.create_date
      FROM
          ukes_b
              LEFT JOIN
          bobot_b ON bobot_b.idukes_b = ukes_b.idukes_b
              LEFT JOIN
          analisa_b ON analisa_b.idukes_b = ukes_b.idukes_b
      WHERE
          ukes_b.idukes_a = '$key'
              AND analisa_b.id_pkms = '$pkms'
              AND MONTH(analisa_b.create_date) = '$bln' AND YEAR(analisa_b.create_date) = '$thn'")->result();
  }

  public function mnjRekap($pkms, $bln, $thn)
  {
  	return $this->db->query(
  		"SELECT DISTINCT
			  mjktg.id_ktgmanaj,
			  mjktg.ktgmanaj,
			  mjrkp.total,
			  mjbb.bobot
			FROM
			  mnj_ktg mjktg
			LEFT JOIN
			  mnj_var mjvar ON mjvar.id_ktgmanaj = mjktg.id_ktgmanaj
			LEFT JOIN
			  mnj_rekap mjrkp ON mjrkp.id_manajvar = mjvar.id_manajvar
			LEFT JOIN
			  mj_bobot mjbb ON mjbb.id_ktgmanaj = mjktg.id_ktgmanaj
			WHERE
			  mjrkp.id_pkms = '$pkms' AND MONTH(mjrkp.create_date) = '$bln' AND YEAR(mjrkp.create_date) = '$thn'")->result();
  }

  public function mtRekap($pkms, $bln, $thn)
  {
  	return $this->db->query(
  		"SELECT DISTINCT
			  mtktg.idmt_ktg,
			  mtktg.mtktg,
			  mtrkp.total_var,
			  mtbb.bobot
			FROM
			  mt_ktg mtktg
			LEFT JOIN
			  mt_op_htng mtop ON mtop.idmt_ktg = mtktg.idmt_ktg
			LEFT JOIN
			  mt_rekap mtrkp ON mtrkp.idmt_op_htng = mtop.idmt_op_htng
			LEFT JOIN
			  mt_bobot mtbb ON mtbb.idmt_ktg = mtktg.idmt_ktg
			WHERE
			  mtrkp.id_pkms = '$pkms' AND MONTH(mtrkp.create_date) = '$bln' AND YEAR(mtrkp.create_date) = '$thn'")->result();
  }



}

/* End of file Dataload.php */
/* Location: ./application/models/rekap/Dataload.php */