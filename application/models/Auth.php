<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Auth extends CI_Model{

    public function authPkms(){

      $pkms = $this->session->userdata('kode');
      if (empty($pkms)) {
        $this->session->sess_destroy();
        redirect('login','refresh');
      }

    }

    public function authAdmin(){

			$pkms = $this->session->userdata('uname');
			if (empty($pkms)) {
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}

		}

  }
