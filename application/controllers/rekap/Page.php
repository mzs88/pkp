<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekap/Dataload');
	}

  function index()
  {
    $data['idpkms'] = $this->session->userdata('idpkms');
    $data['vardo'] = 0;
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/rekap/dtrekap', $data, true); #load content
    $comp['jdl']      = 'Penilaian UKES'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  #top navigation
  public function ct_topnav()
  {

		$data = array();
		return $this->load->view('pkms/topnav', $data, true);

	}

	public function ct_sidebar()
	{

    #cek data jika ada revisi dan menampilkan pada sidebar
    $anu = 0;

    // $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
    // if ($query->num_rows()>0) {
    //   foreach ($query->result() as $value) {
    //     $anu = $value->jml;
    //   }
    // }
    //
		$data['jml'] = $anu;
		return $this->load->view('pkms/sidebar', $data, true);

	}

  public function viewRekap()
  {
    $data['idpkms']    = $this->session->userdata('idpkms');
    $data['bln']      = $this->input->get('bln');
    $data['thn']      = $this->input->get('thn');
    $data['nmBln']    = $this->input->get('nmbln');
    $comp['content']  = $this->load->view('pkms/rekap/viewrkp', $data, true); #load content
    $comp['jdl']      = 'Penilaian UKES'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  public function chartRekap()
  {
    $idpkms = $this->session->userdata('idpkma');
    $bln = '1';
    $thn = '2';
  }

}

/* End of file Page.php */
/* Location: ./application/controllers/rekap/Page.php */