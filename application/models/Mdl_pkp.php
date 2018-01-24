<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Mdl_pkp extends CI_Model {

			function load_ukka($p){
				$ukka = $this->db->query("SELECT ukk_a.id_ukka, ukk_a.ukka, anlisa_ukka.var_tot, anlisa_ukka.analisa, anlisa_ukka.tndk_lnjt, puskesmas.id_pkms, puskesmas.puskesmas FROM ukk_a INNER JOIN anlisa_ukka ON ukk_a.id_ukka = anlisa_ukka.id_ukka INNER JOIN puskesmas ON anlisa_ukka.id_pkms = puskesmas.id_pkms WHERE puskesmas.id_pkms = '$p'");
				return $ukka;
			}

			function load_ukkb($key, $p){
				$query= $this->db->query("SELECT ukk_b.id_ukkb, ukk_b.ukkb, anlisa_ukkb.var_tot, anlisa_ukkb.analisa, anlisa_ukkb.tndk_lnjt, puskesmas.id_pkms, puskesmas.puskesmas FROM ukk_b INNER JOIN anlisa_ukkb ON ukk_b.id_ukkb = anlisa_ukkb.id_ukkb INNER JOIN puskesmas ON anlisa_ukkb.id_pkms = puskesmas.id_pkms WHERE ukk_b.id_ukka = '$key' AND puskesmas.id_pkms = '$p'"); 
				return $query;
			}

			function load_ukkc($key, $p){
				$query= $this->db->query("SELECT ukk_c.id_ukkc, ukk_c.ukkc, anlisa_ukkc.var_tot, anlisa_ukkc.analisa, anlisa_ukkc.tindak_lanjut, puskesmas.id_pkms, puskesmas.puskesmas FROM ukk_c INNER JOIN anlisa_ukkc ON ukk_c.id_ukkc = anlisa_ukkc.id_ukkc INNER JOIN puskesmas ON anlisa_ukkc.id_pkms = puskesmas.id_pkms WHERE ukk_c.id_ukkb = '$key' AND puskesmas.id_pkms = '$p'"); 
				return $query;
			}

			function load_ukkd($key, $p){
				$query= $this->db->query("SELECT ukk_d.id_ukkd, ukk_d.ukkd, tth.target AS tth, ssrn.sasaran, p.total, p.target, p.pencapaian, p.riil, p.analisa, p.tindak_lanjut, puskesmas.id_pkms, puskesmas.puskesmas FROM ukk_d INNER JOIN penilaian AS p ON ukk_d.id_ukkd = p.id_ukkd INNER JOIN sasaran AS ssrn ON ssrn.id_sasaran = p.id_sasaran INNER JOIN target_tahunan AS tth ON ukk_d.id_ukkd = tth.id_ukkd INNER JOIN puskesmas ON p.id_pkms = puskesmas.id_pkms WHERE ukk_d.id_ukkc = '$key' AND puskesmas.id_pkms = '$p'");
				return $query;
			}

    }
?>
