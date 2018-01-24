<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller{

    public function index(){

      $this->load->view('puskesmas/login');

    }

    public function autpkmslogin(){

      $pkms = $this->input->post('pkms');
      $pass = $this->input->post('pass');
      $this->load->model('Mdl_lgnpkms');
      $this->Mdl_lgnpkms->md_lgnpkms($pkms, $pass);

    }

  }
