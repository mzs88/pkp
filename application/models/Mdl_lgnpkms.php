<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Mdl_lgnpkms extends CI_Model{

    public function md_lgnpkms($pkms, $pass){
  		$ps = md5($pass);
  		$this->db->where('kode_pkms',$pkms);
  		$this->db->where('pass',$ps);
  		$query = $this->db->get('puskesmas');

  		if ($query->num_rows()>0) {

  			foreach ($query->result() as $row) {
          $sess['kode'] = $row->kode_pkms;
          $sess['pass'] = $row->pass;
          $sess['pkms'] = $row->nm_pkms;
          $sess['idpkms'] = $row->id_pkms;
  				$this->session->set_userdata($sess);
  				redirect('puskesmas');
  			}

  		}else{
  			$this->session->set_flashdata('info', 'login gagal');
  			redirect('Ctrl_lgnpkms');
  		}

  	}

  }
