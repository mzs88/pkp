<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('verifikasi');
    }

    public function index()
    {

  		$this->load->view('pkms/login');

  	}

  	public function autlogin()
    {

  		$pkms = $this->input->post('pkms');
  		$pass = $this->input->post('pass');
  		$this->verifikasi->md_login($pkms, $pass);

  	}
  }
