<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapenilaian extends CI_Controller{

  public function __construct()  {
    parent::__construct();

    $this->auth->authAdmin();
    $this->load->model('admin/mnj/loadpenilaian');
    $this->load->model('admin/mnj/execute');

  }

  function index()  {

    $data ['hasil']   = 0;
    $data['listpkms']  = $this->loadpenilaian->md_pkms();

    $comp['content']  = $this->load->view('admin/mnj/datapenilaian',$data, true);
    $comp['jdl']      = 'Penilaian Manajemen';
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

  public function viewdata(){

    $data['idpkms']   = $this->input->get('id', TRUE);
    $data['hasil']    = 0;
    $this->db->where('id_pkms',$this->input->get('id', TRUE));
    $judul = $this->db->get('puskesmas')->row_array();

    $comp['content']  = $this->load->view('admin/mnj/viewdata',$data, true);
    $comp['jdl']      = '<small>Penilaian Manajemen Puskesmas</small> '.$judul['nm_pkms'];
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();

    $this->load->view('admin/home',$comp);

  }

  public function save()
  {

    $key = $this->input->post('id');

    $query = $this->execute->mdl_data($key);

    if ($query->num_rows()>0) {

      $data['id_manajvar']    = $this->input->post('idmnj');
      $data['idoperator']     = $this->input->post('idop');
      $data['nilai_0']        = $this->input->post('nnol');
      $data['nilai_4']        = $this->input->post('npat');
      $data['nilai_7']        = $this->input->post('ntu');
      $data['nilai_10']       = $this->input->post('nluh');
      $data['edit_date']      = date("Y-m-d h:i:s");

      $this->execute->mdl_update($key,$data);
      $this->session->set_flashdata('info', 'Data berhasil dirubah');
      redirect('admin/mnj/dataskala');
      //print_r($data);

    }else{

      $data['id_manajvar']    = $this->input->post('idmnj');
      $data['idoperator']     = $this->input->post('idop');
      $data['nilai_0']        = $this->input->post('nnol');
      $data['nilai_4']        = $this->input->post('npat');
      $data['nilai_7']        = $this->input->post('ntu');
      $data['nilai_10']       = $this->input->post('nluh');
      $data['create_date']    = date("Y-m-d h:i:s");

      $this->execute->mdl_insert($data);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
      redirect('admin/mnj/dataskala');
      //print_r($data);

    }

  }

  public function saveEva()
  {
    $key = $this->input->post('id');

    $query = $this->execute->dtEva($key);
    if ($query->num_rows()>0)
    {
      $data['idmanaj_penilaian'] = $this->input->post('id');
      $data['idoperator'] = $this->input->post('idop');
      $data['coments'] = $this->input->post('cmt');
      $data['rev'] = $this->input->post('rev');
      $data['rev_date'] = date('Y-m-d h:i:s');
      $this->execute->upEva($key,$data);
    }
    else
    {
      $data['idmanaj_penilaian'] = $this->input->post('id');
      $data['idoperator'] = $this->input->post('idop');
      $data['coments'] = $this->input->post('cmt');
      $data['rev'] = $this->input->post('rev');
      $data['rev_date'] = date('Y-m-d h:i:s');
      $this->execute->inEva($data);
    }


  }

}
