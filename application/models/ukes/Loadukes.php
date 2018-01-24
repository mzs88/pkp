<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Loadukes extends CI_Model {
    #mengambil data ukes_a
    public function mdlUkesA(){
      return $this->db->get('ukes_a')->result();
    }

    public function mdlAnaA($key, $pkms, $bln, $thn){
      return $this->db->query(
        "SELECT
          aa.idanalisa_a,
          aa.nilai,
          aa.analisa,
          aa.tindak_lanjut
        FROM
          ukes_a a
        LEFT JOIN
          analisa_a aa ON aa.idukes_a = a.idukes_a
        WHERE
         a.idukes_a = '$key' AND aa.id_pkms = '$pkms' AND MONTH(aa.create_date) = '$bln' AND YEAR(aa.create_date) = '$thn'")->result();
    }

    #mengambil data ukes_b
    public function mdlUkesB($key){
      $this->db->where('idukes_a',$key);
      return $this->db->get('ukes_b')->result();
    }

    public function mdlAnaB($key, $pkms, $bln, $thn)
    {
      return $this->db->query(
        "SELECT
          bb.idanalisa_b,
          bb.nilai,
          bb.analisa,
          bb.tindak_lanjut
        FROM
          ukes_b b
        LEFT JOIN
          analisa_b bb ON bb.idukes_b = b.idukes_b
        WHERE
          b.idukes_b = '$key' AND bb.id_pkms = '$pkms' AND MONTH(bb.create_date) = '$bln' AND YEAR(bb.create_date) = '$thn' ")->result();
    }

    #mengambil data ukes_c
    public function mdlUkesC($key){
      $this->db->where('idukes_b',$key);
      return $this->db->get('ukes_c')->result();
    }

    public function mdlAnaC($key, $pkms, $bln, $thn){
      return $this->db->query(
        "SELECT
          cc.idanalisa_c,
          cc.nilai,
          cc.analisa,
          cc.tindak_lanjut
        FROM
          ukes_c c
        LEFT JOIN
          analisa_c cc ON cc.idukes_c = c.idukes_c
        WHERE
          c.idukes_c = '$key' AND cc.id_pkms = '$pkms' AND MONTH(cc.create_date) = '$bln' AND YEAR(cc.create_date) = '$thn' ")->result();
    }

    #mengambil data ukes_d
    public function mdlUkesDVal($key,$pkms,$date){
      return $this->db->query(
        "SELECT
          ukes_d.idukes_d,
          ukes_d.ukes_d,
          target.op,
          target.nilai,
          sasaran.id_sasaran,
          sasaran.sasaran,
          nilai_pkp.idnilai_pkp,
          nilai_pkp.target,
          nilai_pkp.total,
          nilai_pkp.pencapaian,
          nilai_pkp.riil,
          nilai_pkp.analisa,
          nilai_pkp.tindak_lanjut
        FROM
          ukes_d
            LEFT JOIN
          target ON target.idukes_d = ukes_d.idukes_d
            LEFT JOIN
          sasaran ON target.id_sasaran = sasaran.id_sasaran
            LEFT JOIN
          nilai_pkp ON ukes_d.idukes_d = nilai_pkp.idukes_d
            LEFT JOIN
          puskesmas ON nilai_pkp.id_pkms = puskesmas.id_pkms
        WHERE
          ukes_d.idukes_c = '$key'
            AND puskesmas.id_pkms = '$pkms'
            AND MONTH(nilai_pkp.create_date) = '$date' ")->result();
    }

    public function mdlUkesD($key){
      return $this->db->query(
        "SELECT
            ukes_d.idukes_d,
            ukes_d.ukes_d,
            target.op,
            target.nilai,
            sasaran.id_sasaran,
            sasaran.sasaran
        FROM
            ukes_d
                LEFT JOIN
            target ON target.idukes_d = ukes_d.idukes_d
                LEFT JOIN
            sasaran ON target.id_sasaran = sasaran.id_sasaran
        WHERE
            ukes_d.idukes_c = '$key'")->result();
    }

    public function mdlUkesDchek($key, $pkms, $date){
      return $this->db->query(
        "SELECT
          ukes_d.idukes_d,
          ukes_d.ukes_d,
          target.op,
          target.nilai,
          sasaran.id_sasaran,
          sasaran.sasaran,
          nilai_pkp.target,
          nilai_pkp.total,
          nilai_pkp.pencapaian,
          nilai_pkp.riil,
          nilai_pkp.analisa,
          nilai_pkp.tindak_lanjut
        FROM
          ukes_d
            LEFT JOIN
          target ON target.idukes_d = ukes_d.idukes_d
            LEFT JOIN
          sasaran ON target.id_sasaran = sasaran.id_sasaran
            LEFT JOIN
          nilai_pkp ON ukes_d.idukes_d = nilai_pkp.idukes_d
            LEFT JOIN
          puskesmas ON nilai_pkp.id_pkms = puskesmas.id_pkms
        WHERE
          ukes_d.idukes_c = '$key'
            AND puskesmas.id_pkms = '$pkms'
            AND MONTH(nilai_pkp.create_date) = '$date' ");
    }

    public function md_npkp($key, $pkms){
      return $this->db->query(
        "SELECT
          nilai_pkp.idnilai_pkp,
          nilai_pkp.total,
          nilai_pkp.target,
          nilai_pkp.pencapaian,
          ROUND(
            nilai_pkp.pencapaian / nilai_pkp.total * 100,
            2
          ) AS riil,
          nilai_pkp.analisa,
          nilai_pkp.tindak_lanjut
        FROM
          nilai_pkp
        WHERE
          nilai_pkp.idukes_d = '$key'
        AND nilai_pkp.id_pkms = '$pkms' ")->result();
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
                LEFT JOIN
            nilai_pkp ON ukes_d.idukes_d = nilai_pkp.idukes_d
        WHERE
            ukes_d.idukes_c = '$key'")->result();
      return $subvar;
    }


    public function rkpUkesA(){
      return $this->db->query(
        "SELECT
          ukes_a.ukes_a,
          analisa_a.nilai,
          MONTHNAME(analisa_a.create_date) as bln
        FROM
          ukes_a
        LEFT JOIN
          analisa_a ON analisa_a.idukes_a = ukes_a.idukes_a ORDER BY analisa_a.nilai ASC")->result();
    }

    public function rkpUkesB($key, $pkms){
      return $this->db->query(
        "SELECT
            *
        FROM
            ukes_b
                LEFT JOIN
            analisa_b ON analisa_b.idukes_b = ukes_b.idukes_b
        WHERE
            analisa_b.id_pkms = 1
                AND ukes_b.idukes_a = 1");
    }

    public function DataUkes($pkms){

      return $this->db->query(
        "SELECT DISTINCT
            MONTHNAME(npkp.create_date) as bulan,
            YEAR(npkp.create_date) as tahun,
            MONTH(npkp.create_date) as bln
        FROM
            nilai_pkp npkp
                INNER JOIN
            puskesmas pkms ON pkms.id_pkms = npkp.id_pkms
                INNER JOIN
            analisa_a ana ON pkms.id_pkms = ana.id_pkms
                INNER JOIN
            analisa_b anb ON anb.id_pkms = pkms.id_pkms
                INNER JOIN
            analisa_c anc ON anc.id_pkms = pkms.id_pkms
        WHERE
            pkms.id_pkms = '$pkms'")->result();
    }

  }
?>
