<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Mdl_autpkms extends CI_Model{

    public function md_autpkms(){

      $pkms = $this->session->userdata('kode');
      if (empty($pkms)) {
        $this->session->sess_destroy();
        redirect('login','refresh');
      }

    }

  }
