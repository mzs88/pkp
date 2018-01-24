<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->authPkms();
    $this->load->model('mnj/Dataload');
    $this->load->model('mnj/Execute');
    $this->load->model('mnj/Loadrev');
  }

  public function index()
  {
    $data = array();
    $comp = array
    (
      'content' => $this->load->view('pkms/mnj/inmnj', $data, true),
      'jdl'		  => 'Penilaian Manajemen',
      'topnav'  => $this->ct_topnav(),
      'sidebar' => $this->ct_sidebar()
    );
    $this->load->view('pkms/home',$comp);
  }

  public function ct_topnav()
  {
		$data = array();
		return $this->load->view('pkms/topnav', $data, true);
	}

	public function ct_sidebar()
  {
    $anu=0;
    // $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
    // if ($query->num_rows()>0) {
    //   foreach ($query->result() as $value) {
    //     $anu = $value->jml;
    //   }
    // }

		$data['jml'] = $anu;
		return $this->load->view('pkms/sidebar', $data, true);
	}

  public function GetVariable()
  {
    $data['id'] = $this->input->post('id');
    $data['pkms'] = $this->session->userdata('idpkms');
    $data['date'] = date('m');
    $respon = $this->load->view('pkms/mnj/variable',$data,true);
    echo $respon;
  }

  #simpan data manajemen
  public function save()
  {

    foreach ($this->input->post('idnilai') as $key => $value)
    {
      $query = $this->Execute->CekData($value);
      if ($query->num_rows()>0)
      {
          $data['id_pkms']      = $this->session->userdata('idpkms');
          $data['id_manajvar']  = $this->input->post('idvar')[$key];
          $data['hasil']        = $this->input->post('nilai')[$key];
          $data['total']        = $this->input->post('totNilai');
          $data['edit_date']    = date("Y-m-d h:i:sa");

          $this->Execute->md_update($value, $data); #update data
      }
      else
      {
          $data['id_pkms']      = $this->session->userdata('idpkms');;
          $data['id_manajvar']  = $this->input->post('idvar')[$key];
          $data['hasil']        = $this->input->post('nilai')[$key];
          $data['total']        = $this->input->post('totNilai');
          $data['create_date']  = date("Y-m-d h:i:sa");

          $this->Execute->md_insert($data); #update data
      }
    }

  }

  public function collectdata()
  {
    $data['idpkms'] = $this->session->userdata('idpkms');
    $data['date'] = $this->input->get('date');

    $comp['content']  = $this->load->view('pkms/mnj/dtmnj', $data, true); #load content
    $comp['jdl']      = 'Data UKES Perbulan '.$this->input->get('bln');; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  public function ViewData()
  {
    $data['idpkms'] = $this->session->userdata('idpkms');
    $data['bln'] = $this->input->get('date');
    $comp = array
    (
      'content' => $this->load->view('pkms/mnj/viewdt', $data, true),
      'jdl'     => 'Penilaian Manajemen Bulan <i>'.$this->input->get('bln').'</i>',
      'topnav'  => $this->ct_topnav(),
      'sidebar' => $this->ct_sidebar()
    );
    $this->load->view('pkms/home',$comp);
  }

}
