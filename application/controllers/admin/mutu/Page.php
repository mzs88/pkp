<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

  public function __construct()  {
    parent::__construct();

    $this->auth->authAdmin();
    $this->load->model('admin/mutu/loaddata');
    $this->load->model('admin/mutu/execute');

  }

  function index()  {

    $data['target']   = $this->loaddata->md_target();
    $comp['content'] = $this->load->view('admin/mutu/target',$data,true);
    $comp['jdl']      = 'Target Tahunan Penilaian Mutu';
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();
    $this->load->view('admin/home',$comp);

  }

  public function ct_topnav(){
		$data = array();
		return $this->load->view('admin/topnav', $data, true);
	}

	public function ct_sidebar(){
		$data = array();
		return $this->load->view('admin/sidebar', $data, true);
	}

  public function listmutu(){

    $data['listmutu'] = $this->loaddata->md_pkms();

    $comp['content']  = $this->load->view('admin/mutu/datamutu',$data,true);
    $comp['jdl']      = 'Penilaian Mutu';
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();
    $this->load->view('admin/home',$comp);

  }

  public function viewdata(){

    $data['idpkms'] =$this->input->get('pkms', TRUE);
    $this->db->where('id_pkms',$this->input->get('pkms', TRUE));
    $jdl = $this->db->get('puskesmas')->row_array();

    $comp['content']  = $this->load->view('admin/mutu/viewdata',$data,true);
    $comp['jdl']      = '<small>Penilaian Mutu Puskesmas</small> '.$jdl['nm_pkms'];
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();
    $this->load->view('admin/home',$comp);

  }

  public function savetarget(){

    $key = $this->input->post('id');
    $query = $this->execute->md_data($key);

    if ($query->num_rows()>0) {
      $data['idmt_op_htng']    = $this->input->post('idvar');
      $data['idoperator']         = $this->input->post('idop');
      $data['op']                 = $this->input->post('op');
      $data['target']             = $this->input->post('trgt');
      $data['tahun']              = $this->input->post('thn');
      $data['edit_date']          = date("Y-m-d h:i:sa");

      $this->execute->md_update($key, $data);
      $this->session->set_flashdata('info', 'Data berhasil dirubah');
      redirect('admin/mutu/page');
    }else{
      $data['idmt_op_htng']    = $this->input->post('idvar');
      $data['idoperator']         = $this->input->post('idop');
      $data['op']                 = $this->input->post('op');
      $data['target']             = $this->input->post('trgt');
      $data['tahun']              = $this->input->post('thn');
      $data['create_date']        = date("Y-m-d h:i:sa");

      $this->execute->md_insert($data);
      $this->session->set_flashdata('info', 'Data berhasil ditambah');
      redirect('admin/mutu/page');
    }

  }


  public function revisi(){

    $key = $this->input->post('id');
    $query = $this->execute->md_revdata($key);

    if ($query->num_rows()>0) {

      $data['idoperator']         = $this->input->post('idop');
      $data['idmt_rekap']   = $this->input->post('idmutu');
      $data['coments']            = $this->input->post('cmnt');
      $data['rev']                = $this->input->post('rev');
      $data['rev_date']           = date('Y-m-d h:i:sa');

      $this->execute->md_revupdate($key, $data);
      $this->session->set_flashdata('info', 'Data berhasil dirubah');
      redirect('admin/mutu/page');

    }else{

      $data['idoperator']         = $this->input->post('idop');
      $data['idmt_rekap']   = $this->input->post('idmutu');
      $data['coments']            = $this->input->post('cmnt');
      $data['rev']                = $this->input->post('rev');
      $data['rev_date']           = date('Y-m-d h:i:sa');

      $this->execute->md_revinsert($data);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
      redirect('admin/mutu/page');

    }
  }



}
