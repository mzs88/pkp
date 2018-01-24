<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataload extends CI_Model{

  public function __construct()  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function mdl_lspkms()
  {
    return $this->db->query(
      "SELECT
        puskesmas.id_pkms,
      	puskesmas.kode_pkms,
      	puskesmas.nm_pkms,
      	puskesmas.almt_pkms,
      	puskesmas.kepala_pkms

      FROM
      	puskesmas
      INNER JOIN nilai_pkp ON nilai_pkp.id_pkms = puskesmas.id_pkms
      GROUP BY
      	puskesmas.id_pkms")->result();
  }

  public function dtukesa($pkms, $bln)
  {

   return $ukesa = $this->db->query(
      "SELECT
      	ukes_a.idukes_a,
      	ukes_a.ukes_a,
        analisa_a.idanalisa_a,
        analisa_a.nilai,
      	analisa_a.analisa,
      	analisa_a.tindak_lanjut,
        eva_a.ideva_a,
      	eva_a.coments,
      	eva_a.rev_date,
      	puskesmas.id_pkms
      FROM
      	ukes_a
      LEFT OUTER JOIN analisa_a ON analisa_a.idukes_a = ukes_a.idukes_a
      LEFT OUTER JOIN eva_a ON eva_a.idanalisa_a = analisa_a.idanalisa_a
      LEFT JOIN puskesmas ON analisa_a.id_pkms = puskesmas.id_pkms
      WHERE
      	puskesmas.id_pkms = '$pkms' AND MONTH(analisa_a.create_date) = '$bln' ")->result();

  }

  public function mdl_ukesb($key,$pkms, $bln){

    $ukesb = $this->db->query(
      "SELECT
      	ukes_b.idukes_b,
      	ukes_b.ukes_b,
        analisa_b.idanalisa_b,
        analisa_b.nilai,
      	analisa_b.analisa,
      	analisa_b.tindak_lanjut,
        eva_b.ideva_b,
      	eva_b.coments,
      	eva_b.rev_date,
      	puskesmas.id_pkms
      FROM
      	ukes_b
      LEFT OUTER JOIN analisa_b ON analisa_b.idukes_b = ukes_b.idukes_b
      LEFT OUTER JOIN eva_b ON eva_b.idanalisa_b = analisa_b.idanalisa_b
      INNER JOIN puskesmas ON analisa_b.id_pkms = puskesmas.id_pkms
      WHERE
      	ukes_b.idukes_a = '$key'
      AND puskesmas.id_pkms = '$pkms' AND MONTH(analisa_b.create_date) = '$bln' ")->result();
    return $ukesb;

  }

  public function mdl_ukesc($key,$pkms, $bln){

    $ukesb = $this->db->query(
      "SELECT
      	ukes_c.idukes_c,
      	ukes_c.idukes_b,
      	ukes_c.ukes_c,
        analisa_c.idanalisa_c,
        analisa_c.nilai,
      	analisa_c.analisa,
      	analisa_c.tindak_lanjut,
        eva_c.ideva_c,
      	eva_c.coments,
      	eva_c.rev_date,
      	puskesmas.id_pkms
      FROM
      	ukes_c
      LEFT OUTER JOIN analisa_c ON analisa_c.idukes_c = ukes_c.idukes_c
      LEFT OUTER JOIN eva_c ON eva_c.idanalisa_c = analisa_c.idanalisa_c,
       puskesmas
      WHERE
      	ukes_c.idukes_b = '$key'
      AND puskesmas.id_pkms = '$pkms' AND MONTH(analisa_c.create_date) = '$bln'")->result();
    return $ukesb;

  }

  public function mdl_ukesd($key,$pkms,$bln){
    //$this->db->where('idukes_c',$key);
    return $this->db->query(
      "SELECT
      	ukes_d.idukes_d,
      	ukes_d.idukes_c,
      	ukes_d.ukes_d,
      	target.op,
      	target.nilai,
      	sasaran.id_sasaran,
      	sasaran.sasaran,
      	nilai_pkp.total,
      	nilai_pkp.target,
      	nilai_pkp.pencapaian,
      	nilai_pkp.riil,
        nilai_pkp.analisa,
      	nilai_pkp.tindak_lanjut,
      	puskesmas.id_pkms,
      	eva_pkp.coments,
      	eva_pkp.rev_date,
      	nilai_pkp.idnilai_pkp,
      	eva_pkp.ideva_pkp
      FROM
      	ukes_d
      LEFT JOIN target ON target.idukes_d = ukes_d.idukes_d
      LEFT JOIN sasaran ON target.id_sasaran = sasaran.id_sasaran
      LEFT JOIN nilai_pkp ON nilai_pkp.id_sasaran = sasaran.id_sasaran
      AND nilai_pkp.idukes_d = ukes_d.idukes_d
      LEFT JOIN puskesmas ON nilai_pkp.id_pkms = puskesmas.id_pkms
      LEFT JOIN eva_pkp ON eva_pkp.idnilai_pkp = nilai_pkp.idnilai_pkp
      WHERE
      	ukes_d.idukes_c = '$key'
      AND puskesmas.id_pkms = '$pkms' AND MONTH(nilai_pkp.create_date) = '$bln'")->result();

  }

  public function mdl_subvar($key){
    $subvar = $this->db->query(
      "SELECT
          ukes_d.ukes_d,
          ukes_d.idukes_c,
          nilai_pkp.total,
          nilai_pkp.target,
          nilai_pkp.pencapaian,
          round(sum(ROUND(nilai_pkp.pencapaian / nilai_pkp.total * 100,2))/count(ukes_d.idukes_c),2) as subvar
      FROM
          ukes_d
              INNER JOIN
          nilai_pkp ON ukes_d.idukes_d = nilai_pkp.idukes_d
      WHERE
          ukes_d.idukes_c = '$key'")->result();
    return $subvar;
  }

  public function getdata($bln)
  {
    return $this->db->query(
      "SELECT DISTINCT
          pkms.id_pkms,
          pkms.nm_pkms,
          YEAR(npkp.create_date) AS tahun,
          MONTH(npkp.create_date) AS bulan
      FROM
          puskesmas pkms
              INNER JOIN
          nilai_pkp npkp ON npkp.id_pkms = pkms.id_pkms
      WHERE
          MONTH(npkp.create_date) = '$bln'")->result();
  }

}
