<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aanalisa extends CI_Controller{

  function index(){

    $data = array(
      'jdl'		=> 'Input Analisa dan Tindak Lanjut'
    );
    $comp = array(
      'content' => $this->load->view('puskesmas/nilaiukes/analisa', $data, true),
      'topnav' => $this->ct_topnav(),
      'sidebar' => $this->ct_sidebar()
    );
    $this->load->view('puskesmas/home',$comp);

  }

  public function ct_topnav(){

    $data = array();
    return $this->load->view('puskesmas/topnav', $data, true);

  }


  public function ct_sidebar(){

    $data = array();
    return $this->load->view('puskesmas/sidebar', $data, true);

  }

  public function ct_save_ukes_a(){

    $key = $this->intput->post('id');

  }

}
