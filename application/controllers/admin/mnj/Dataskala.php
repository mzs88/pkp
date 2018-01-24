<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataskala extends CI_Controller{

  public function __construct()  {
    parent::__construct();

    $this->auth->authAdmin();
    $this->load->model('admin/mnj/loadskala');
    $this->load->model('admin/mnj/execute');

  }

  function index()  {

    $data = array();

    $comp['content']  = $this->load->view('admin/mnj/skala',$data, true);
    $comp['jdl']      = 'Data Skala';
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

  public function save(){

    $key = $this->input->post('id');

    $query = $this->execute->mdl_data($key);

    if ($query->num_rows()>0) {

      $data['id_manajvar']    = $this->input->post('idmnj');
      $data['idoperator']     = $this->input->post('idop');
      $data['nilai_0']        = $this->input->post('nnol');
      $data['nilai_4']        = $this->input->post('npat');
      $data['nilai_7']        = $this->input->post('ntu');
      $data['nilai_10']       = $this->input->post('nluh');
      $data['edit_date']      = date("Y-m-d h:i:sa");

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
      $data['create_date']    = date("Y-m-d h:i:sa");

      $this->execute->mdl_insert($data);
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
      redirect('admin/mnj/dataskala');
      //print_r($data);

    }


  }

}
