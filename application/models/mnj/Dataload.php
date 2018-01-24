<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class DataLoad extends CI_Model {

    #load ktg mannajement
    public function MnjKtg()
    {
      return $this->db->get("mnj_ktg")->result();
    }

    #load variable dan nilai
    public function GetVar($key)
    {
      $vardo = $this->db->query(
        "SELECT
            vardo.id_manajvar,
            vardo.mnj_var,
            vardo.mnj_do,
            nilai.nilai_0,
            nilai.nilai_4,
            nilai.nilai_7,
            nilai.nilai_10
        FROM
            mnj_var vardo
                INNER JOIN
            mnj_nilai nilai ON vardo.id_manajvar = nilai.id_manajvar
        WHERE
            vardo.id_ktgmanaj = '$key'")->result();
      return $vardo;
    }

    public function CekData($key, $pkms, $date)
    {
      return $this->db->query(
        "SELECT
          *
        FROM
          mnj_rekap
        LEFT JOIN
          mnj_var ON mnj_var.id_manajvar = mnj_rekap.id_manajvar
        WHERE
          mnj_var.id_ktgmanaj = '$key' AND mnj_rekap.id_pkms = '$pkms' AND MONTH(mnj_rekap.create_date) = '$date'");
    }

    public function DataVar($key,$pkms,$date)
    {
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
        mnj_rekap.hasil
      FROM
        mnj_nilai
      LEFT JOIN
        mnj_rekap ON mnj_rekap.id_manajvar = mnj_nilai.id_manajvar
        LEFT JOIN
        mnj_var ON mnj_var.id_manajvar = mnj_rekap.id_manajvar
        WHERE mnj_var.id_ktgmanaj = '$key'
        AND mnj_rekap.id_pkms = '$pkms'
        AND MONTH(mnj_rekap.create_date)='$date'")->result();
    }

    public function DataKtg($pkms, $bln)
    {
      return $this->db->query(
        "SELECT DISTINCT
          ktg.id_ktgmanaj,
          ktg.ktgmanaj,
          mnjp.total
        FROM
          mnj_ktg ktg
        LEFT JOIN
          mnj_var mnjv ON mnjv.id_ktgmanaj = ktg.id_ktgmanaj
        LEFT JOIN
          mnj_rekap mnjp ON mnjp.id_manajvar = mnjv.id_manajvar
        WHERE
          mnjp.id_pkms = '$pkms' AND MONTH(mnjp.create_date) = '$bln'
        ORDER BY
          ktg.id_ktgmanaj")->result();
    }

    public function DataAkhir($key, $pkms, $date)
    {
      return $this->db->query(
        "SELECT
          mnjv.id_manajvar,
          mnjv.mnj_var,
          mnjv.mnj_do,
          mnjn.idmnj_nilai,
          mnjn.nilai_0,
          mnjn.nilai_4,
          mnjn.nilai_7,
          mnjn.nilai_10,
          mnjp.hasil,
          mnjp.total,
          mnje.coments,
          mnje.rev_date
        FROM
          mnj_var mnjv
        LEFT JOIN
          mnj_nilai mnjn ON mnjn.id_manajvar = mnjv.id_manajvar
        LEFT JOIN
          mnj_rekap mnjp ON mnjp.id_manajvar = mnjn.id_manajvar
        LEFT JOIN
          eva_mnj mnje ON mnje.idmanaj_penilaian = mnjp.idmanaj_penilaian
        WHERE
          mnjv.id_ktgmanaj = '$key' AND mnjp.id_pkms = '$pkms' AND MONTH(mnjp.create_date) = '$date'")->result();
    }

       public function CllData($pkms)
    {
      return $this->db->query(
        "SELECT DISTINCT
          MONTH(mnjn.create_date) as bulan,
          YEAR(mnjn.create_date) as tahun
        FROM
          puskesmas pkms
        INNER JOIN
          mnj_rekap mnjn ON mnjn.id_pkms = pkms.id_pkms
        WHERE
          pkms.id_pkms = 1")->result();
    }

    public function ViewData()
    {

    }

  }
?>
