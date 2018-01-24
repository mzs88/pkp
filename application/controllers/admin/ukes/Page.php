<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

  public function __construct()  {
    parent::__construct();
    $this->auth->authAdmin();
    $this->load->model('admin/ukes/dataload');
    $this->load->model('admin/ukes/execute');
  }

  function index()  {

    $data['listpkms'] = $this->dataload->mdl_lspkms();

    $comp['content']  = $this->load->view('admin/ukes/dataukes',$data, true);
    $comp['jdl']      = 'Data UKES';
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

    $data['idpkms']   = $this->uri->segment(5);
    $this->db->where('id_pkms',$this->uri->segment(5));
    $judul = $this->db->get('puskesmas')->row_array();

    $comp['content']  = $this->load->view('admin/ukes/viewdata',$data, true);
    $comp['jdl']      = $judul['nm_pkms'];
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();

    $this->load->view('admin/home',$comp);

  }


  public function simpan(){

    $key    = $this->input->post('id');
    $field  = $this->input->post('field');
    $table  = $this->input->post('table');

    $dt = $this->execute->mdl_data($key, $field, $table);

    if ($dt->num_rows()>0) {
      $data[$field]         = $this->input->post('idan');
      $data['idoperator']   = $this->input->post('idop');
      $data['coments']      = $this->input->post('cmnt');
      $data['rev']          = $this->input->post('rev');
      $data['rev_date']     = date("Y-m-d h:i:sa");

      $this->execute->mdl_update($key, $field, $table, $data);
      $this->session->set_flashdata('info','Data berhasil diubah');
      redirect('admin/ukes/dataukes');
    }else{
      $data[$field]         = $this->input->post('idan');
      $data['idoperator']   = $this->input->post('idop');
      $data['coments']      = $this->input->post('cmnt');
      $data['rev']          = $this->input->post('rev');
      $data['rev_date']     = date("Y-m-d h:i:sa");

      $this->execute->mdl_insert($table, $data);
      $this->session->set_flashdata('info', 'Data berhasil dirubah');
      redirect('admin/ukes/dataukes');
    }
  }

  public function slctdata()
  {
    $bln = $this->input->post('bln');
    $data['getdata'] = $this->dataload->getdata($bln);
    $result = $this->load->view('admin/ukes/ukesbln',$data,true);
    echo $result;
  }

  public function viewukes()
  {
    $data['idpkms'] = $this->input->get('pkms');
    $data['bln'] = $this->input->get('bln');

    $comp['content'] = $this->load->view('admin/ukes/viewdata',$data, true);
    $comp['jdl']      = 'Data UKES';
    $comp['topnav']   = $this->ct_topnav();
    $comp['sidebar']  = $this->ct_sidebar();

    $this->load->view('admin/home',$comp);
  }

  public function saveEva()
  {
    $ideva = $this->input->post('ideva');
    $id = $this->input->post('id');
    $cmt = $this->input->post('cmt');
    $date = date('Y-m-d h:i:sa');
    $field = $this->input->post('field');
    $table = $this->input->post('table');
    $fieldana = $this->input->post('fana');
    // $bln = $this->input->post('bln', TRUE);
    // $thn = $this->input->post('thn');
    $idop = $this->session->userdata('idop');

    $cek = $this->execute->mdl_data($ideva, $field, $table);
    if ($cek->num_rows()>0)
    {
      $data['idoperator']   = $idop;
      $data['coments']      = $cmt;
      $data['rev_date']     = $date;
      $data['rev']          = 1;

      $this->execute->mdl_update($ideva, $field, $table, $data);
    }
    else
    {
      $data[$fieldana]      = $id;
      $data['idoperator']   = $idop;
      $data['coments']      = $cmt;
      $data['rev_date']     = $date;
      $data['rev']          = 1;

      $this->execute->mdl_insert($table, $data);
    }


  }

}
