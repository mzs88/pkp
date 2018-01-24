<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {

    public function index(){

  		$this->load->view('admin/login');

  	}

  	public function autlogin(){

  		$pkms = $this->input->post('pkms');
  		$pass = $this->input->post('pass');
  		$this->load->model('admin/verifikasi');
  		$this->verifikasi->md_login($pkms, $pass);

  	}

    public function logout(){
      $this->session->sess_destroy();
      redirect('admin/home');
    }
  }
