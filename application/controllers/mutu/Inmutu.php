<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inmutu extends CI_Controller{

  #content
  function index(){
    $this->auth->authPkms(); #verifikasi login
    $this->load->model('mutu/loadmutu'); #load modal untuk load data ukes
    $data['vardo']=0;
    #$data['dbukkd'] = $this->db->get('ukes_d')->result();

    $comp['content']  = $this->load->view('pkms/mutu/inmutu',$data, true); #load content
    $comp['jdl']      = 'Penilaian Mutu'; #judul content
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

  #simpan nilai mutu
  public function ct_save(){

    $key = $this->input->post('id'); #get id

    $this->load->model('mutu/execute'); #load model mutu
    $query = $this->execute->mdl_load($key); #mengambil data berdasarkan key

    #cek apa terdapat data yang sama apa tidak
    if ($query->num_rows()>0) {

      #jika ada data yang sama maka data akan di update
      $data['id_pkms']          = $this->input->post('pkms');
      $data['idmt_op_htng']  = $this->input->post('idmutu');
      $data['mutu_total']       = $this->input->post('total');
      $data['mutu_capaian']     = $this->input->post('pncp');
      $data['mutu_analisa']     = $this->input->post('analisa');
      $data['mutu_rtl']         = $this->input->post('tndklnjt');
      $data['edit_date']        = date("Y-m-d h:i:sa");

      $this->execute->mdl_update($key, $data);
      $this->session->set_flashdata('info', 'Data berhasil dirubah');

    }else{

      #jika tidak ada data yang sama maka data akan ditambahkan
      $data['id_pkms']          = $this->input->post('pkms');
      $data['idmt_op_htng']  = $this->input->post('idmutu');
      $data['mutu_total']       = $this->input->post('total');
      $data['mutu_capaian']     = $this->input->post('pncp');
      $data['mutu_analisa']     = $this->input->post('analisa');
      $data['mutu_rtl']         = $this->input->post('tndklnjt');
      $data['edit_date']        = date("Y-m-d h:i:sa");

      $this->execute->mdl_insert($data);
      $this->session->set_flashdata('info','Data berhasil ditambahkan');

    }

  }

}
