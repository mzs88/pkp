<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Loadrev extends CI_Model {

    public function mdl_ukesa($pkms,$date,$thn){

      return $this->db->query(
        "SELECT
            ua.idukes_a,
            ua.ukes_a,
            an.idanalisa_a,
            an.nilai,
            an.analisa,
            an.tindak_lanjut,
            eaa.ideva_a,
            eaa.coments,
            eaa.rev_date,
            op.nama
        FROM
            ukes_a ua
                LEFT JOIN
            analisa_a an ON ua.idukes_a = an.idukes_a
                LEFT JOIN
            eva_a eaa ON eaa.idanalisa_a = an.idanalisa_a
                LEFT JOIN
            operator op ON op.idoperator = eaa.idoperator
        WHERE
            an.id_pkms = '$pkms' AND MONTH(an.create_date) = '$date' AND YEAR(an.create_date)='$thn'")->result();

    }

    public function mdl_ukesb($key, $pkms, $date){

      $ukesb = $this->db->query(
        "SELECT
            ub.idukes_b,
            ub.ukes_b,
            bn.idanalisa_b,
            bn.nilai,
            bn.analisa,
            bn.tindak_lanjut,
            eab.ideva_b,
            eab.coments,
            eab.rev_date,
            op.nama
        FROM
            ukes_b ub
                LEFT JOIN
            analisa_b bn ON ub.idukes_b = bn.idukes_b
                LEFT JOIN
            eva_b eab ON eab.idanalisa_b = bn.idanalisa_b
                LEFT JOIN
            operator op ON op.idoperator = eab.idoperator
        WHERE
            bn.id_pkms = '$pkms' AND ub.idukes_a = '$key' AND MONTH(bn.create_date) = '$date'")->result();
      return $ukesb;

    }

    public function mdl_ukesc($key, $pkms, $date){

      $ukesb = $this->db->query(
        "SELECT
          ukes_c.idukes_c,
          ukes_c.idukes_b,
          ukes_c.ukes_c,
          analisa_c.nilai,
          analisa_c.idanalisa_c,
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
        AND puskesmas.id_pkms = '$pkms' AND MONTH(analisa_c.create_date) = '$date'")->result();
      return $ukesb;

    }

    public function mdl_ukesd($key, $pkms, $date){
      //$this->db->where('idukes_c',$key);
      $ukesd = $this->db->query(
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
        nilai_pkp.analisa,
        nilai_pkp.tindak_lanjut,
        nilai_pkp.riil,
        nilai_pkp.create_date,
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
      AND puskesmas.id_pkms = '$pkms' AND MONTH(nilai_pkp.create_date) = '$date' ")->result();
      return $ukesd;

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

    public function md_nilai($key){

      $this->db->where('idukes_d',$key);
      $hasil = $this->db->get('nilai_pkp');
      return $hasil;

    }


    public function md_tmbh_nilai($data){

      $this->db->insert('nilai_pkp', $data);

    }

    public function md_update_nilai($key, $data){

      $this->db->where('idukes_d',$key);
      $this->db->update('nilai_pkp', $data);

    }

  }
?>
