<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inukes extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->auth->authPkms();
    $this->load->model('ukes/loadukes'); #load modal untuk load data ukes
    $this->load->model('ukes/execute'); #load modal execute
    $this->load->model('ukes/loadrev');
    $idpkms = $this->session->userdata('idpkms');
  }

  #content
  function index(){

    $data['vardo'] = 0;
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/ukes/inputukes', $data, true); #load content
    $comp['jdl']      = 'Penilaian UKES'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  #top navigation
  public function ct_topnav(){

		$data = array();
		return $this->load->view('pkms/topnav', $data, true);

	}

	public function ct_sidebar(){

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

  public function loadUkkB(){
    $key = $this->input->post('id');

    $ukkB = $this->loadukes->mdlUkesB($key);
    header('Conten-Type: application/json');
    echo json_encode($ukkB);
  }

  public function loadUkkC(){
    $key      = $this->input->post('id');
    $ukkB     = $this->loadukes->mdlUkesC($key);
    header('Conten-Type: application/json');
    echo json_encode($ukkB);
  }

  public function loadUkkD(){
    $data['id'] = $this->input->post('id');
    $data['pkms'] = $this->input->post('pkms');
    $data['date'] = date('m');
    $respon = $this->load->view('pkms/ukes/coba',$data,true);
    echo $respon;
  }

  // public function loadUkkD(){
  //   $key    = $this->input->post('id');
  //   $ukkB   = $this->loadukes->mdlUkesD($key);
  //   header('Conten-Type: application/json');
  //   echo json_encode($ukkB);
  // }

  public function getNilaiUkka(){

    $key    = $this->input->post('id');
    $pkms   = $this->input->post('pkms');
    $bln    = $this->input->post('bln');
    $thn    = $this->input->post('thn');

    $query  = $this->loadukes->mdlAnaA($key, $pkms, $bln, $thn);
    header('Conten-Type: application/json');
    echo json_encode($query);

  }

  public function getNilaiUkkb(){

    $key    = $this->input->post('id');
    $pkms   = $this->input->post('pkms');
    $bln    = $this->input->post('bln');
    $thn    = $this->input->post('thn');

    $query  = $this->loadukes->mdlAnaB($key, $pkms, $bln, $thn);
    header('Conten-Type: application/json');
    echo json_encode($query);

  }

  public function getNilaiUkkc(){

    $key    = $this->input->post('id');
    $pkms   = $this->input->post('pkms');
    $bln   = $this->input->post('bln');
    $thn    = $this->input->post('thn');

    $query  = $this->loadukes->mdlAnaC($key, $pkms, $bln, $thn);
    header('Conten-Type: application/json');
    echo json_encode($query);

  }

  public function getRkpUkesA(){
    $rkp = $this->loadukes->rkpUkesA();
    header('Conten-Type: application/json');
    echo json_encode($rkp);
  }


  #simpan dan update jika ada data untuk analisa
  public function ct_save_analisa(){

    $key    = $this->input->post('idnilai'); #get id
    $table  = $this->input->post('table'); #get table
    $field  = $this->input->post('field'); #get field
    $ukes   = $this->input->post('fieldUkes');

    $this->load->model('ukes/execute'); #load modal execute
    $query = $this->execute->md_ambil($key, $table, $field); #ambil data analisa sesuai id, table dan field

    if ($query->num_rows()>0) {

      $data['id_pkms']        = $this->session->userdata('idpkms');
      $data[$ukes]            = $this->input->post('id');
      $data['nilai']          = $this->input->post('nilai');
      $data['analisa']        = $this->input->post('analisa');
      $data['tindak_lanjut']  = $this->input->post('tndklnjt');
      $data['edit_date']      = date("Y-m-d h:i:sa");

      $this->execute->md_update($key, $field, $table, $data); #update data nilai
      $this->session->set_flashdata('success', 'Data berhasil dirubah');
      //redirect('ukes/inukes');

    }else{

      $data['id_pkms']        = $this->session->userdata('idpkms');
      $data[$ukes]             = $this->input->post('id');
      $data['nilai']          = $this->input->post('nilai');
      $data['analisa']        = $this->input->post('analisa');
      $data['tindak_lanjut']  = $this->input->post('tndklnjt');
      $data['create_date']    = date("Y-m-d h:i:sa");

      $this->execute->md_tambah($table, $data); #insert data nilai
      $this->session->set_flashdata('success', 'Data berhasil ditambah');
      //redirect('ukes/inukes');

    }

  }

  #simpan dan update jika ada data untuk nilai
  public function ct_save_nilai(){
    foreach ((array)$this->input->post('idnilai') as $key => $valId) {

      $query = $this->execute->md_nilai($valId);
      if ($query->num_rows()>0) {
        $data['id_pkms']        = $this->session->userdata('idpkms');;
        $data['id_sasaran']     = $this->input->post('idssrn')[$key];
        $data['idukes_d']       = $this->input->post('idukes')[$key];
        $data['total']          = $this->input->post('total')[$key];
        $data['target']         = $this->input->post('target')[$key];
        $data['pencapaian']     = $this->input->post('pncp')[$key];
        $data['riil']           = $this->input->post('riil')[$key];
        $data['analisa']        = $this->input->post('analisis')[$key];
        $data['tindak_lanjut']  = $this->input->post('tndklnjt')[$key];
        $data['create_date']    = date("Y-m-d h:i:s");

        $this->execute->md_update_nilai($valId,$data);
      }else{
        $data['id_pkms']        = $this->session->userdata('idpkms');;
        $data['id_sasaran']     = $this->input->post('idssrn')[$key];
        $data['idukes_d']       = $this->input->post('idukes')[$key];
        $data['total']          = $this->input->post('total')[$key];
        $data['target']         = $this->input->post('target')[$key];
        $data['pencapaian']     = $this->input->post('pncp')[$key];
        $data['riil']           = $this->input->post('riil')[$key];
        $data['analisa']        = $this->input->post('analisis')[$key];
        $data['tindak_lanjut']  = $this->input->post('tndklnjt')[$key];
        $data['create_date']    = date("Y-m-d h:i:s");

        $this->execute->md_tmbh_nilai($data);
      }

    }
    $this->session->set_flashdata('sucsess', 'Data berhasil diubah');
  }

  public function dtUkes(){

    $data['idpkms'] = $this->session->userdata('idpkms');
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/ukes/dataukes', $data, true); #load content
    $comp['jdl']      = 'Data UKES Perbulan'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  public function viewUkes(){
    $data['idpkms'] = $this->session->userdata('idpkms');
    $data['date'] = $this->input->get('date');
    $data['thn'] = $this->input->get('thn');

    $comp['content']  = $this->load->view('pkms/ukes/revukes', $data, true); #load content
    $comp['jdl']      = 'Data UKES Perbulan '.$this->input->get('bln');; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

  public function dtrekap(){

    $data['idpkms'] = $this->session->userdata('idpkms');
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/ukes/datarekap', $data, true); #load content
    $comp['jdl']      = 'Data Rekap UKES Perbulan'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

   public function viewrekap(){
    $data['idpkms'] = $this->session->userdata('idpkms');
    $data['date'] = $this->input->get('date');
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/ukes/rekap', $data, true); #load content
    $comp['jdl']      = 'Data Rekap UKES Perbulan '.$this->input->get('bln');; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
  }

}
