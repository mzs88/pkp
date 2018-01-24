<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Verifikasi extends CI_Model{

    public function md_login($pkms, $pass){
  		$ps = md5($pass);
  		$this->db->where('kode_pkms',$pkms);
  		$this->db->where('pass',$ps);
  		$query = $this->db->get('puskesmas');

  		if ($query->num_rows()>0) {

  			foreach ($query->result() as $row) {
          $sess['kode'] = $row->kode_pkms;
          $sess['pkms'] = $row->nm_pkms;
          $sess['idpkms'] = $row->id_pkms;
  				$this->session->set_userdata($sess);
  				redirect('home');
  			}

  		}else{
  			$this->session->set_flashdata('info', 'login gagal');
  			redirect('login');
  		}

  	}

  }
