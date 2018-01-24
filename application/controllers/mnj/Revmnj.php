<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revmnj extends CI_Controller{

  function index(){
    date_default_timezone_set("Asia/Jakarta");

    $this->auth->authPkms();
    $this->load->model('mnj/loadrev');
    $data['hasil']=0;
    $comp = array(
      'content' => $this->load->view('pkms/mnj/revmnj', $data, true),
      'jdl'		  => 'Revisi Penilaian Manajemen',
      'topnav'  => $this->ct_topnav(),
      'sidebar' => $this->ct_sidebar()
    );
    $this->load->view('pkms/home',$comp);
  }

  public function ct_topnav(){

		$data = array();
		return $this->load->view('pkms/topnav', $data, true);
	}

	public function ct_sidebar(){
    $anu = 0;
    // $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
    // if ($query->num_rows()>0) {
    //   foreach ($query->result() as $value) {
    //     $anu = $value->jml;
    //   }
    // }

		$data['jml'] = $anu;
		return $this->load->view('pkms/sidebar', $data, true);
	}

}
