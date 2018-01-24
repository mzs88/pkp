<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revukes extends CI_Controller{

  function index(){
    $this->load->model('mdl_autpkms');
    $this->mdl_autpkms->md_autpkms();
    $this->load->model('ukes/loadrev');

    $data['noa'] = 1;
    $data ['dbukkd'] = $this->db->get('ukes_d')->result();
    $comp = array(
      'content' => $this->load->view('pkms/ukes/revukes', $data, true),
      'jdl'		  => 'Revisi Penilaian UKES',
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

  public function ct_save_analisa(){

    $key = $this->input->post('id');
    $table = $this->input->post('table');
    $field = $this->input->post('field');

    $this->load->model('exanalisis');
    $query = $this->exanalisis->md_ambil($key, $table, $field);

    if ($query->num_rows()>0) {

      $data[$field]          = $this->input->post('id');
      $data['id_pkms']       = $this->input->post('pkms');
      $data['analisa']       = $this->input->post('analisa');
      $data['tindak_lanjut'] = $this->input->post('tndklnjt');
      $data['edit_date']    = date("Y-m-d h:i:sa");
      // $data['rev']           = $this->input->post('revisi');

      $this->exanalisis->md_update($key, $field, $table, $data);
      $this->session->set_flashdata('success', 'Data berhasil dirubah');
      redirect('ukes/inukes');

    }else{

      $data[$field]           = $this->input->post('id');
      $data['id_pkms']        = $this->input->post('pkms');
      $data['analisa']        = $this->input->post('analisa');
      $data['tindak_lanjut']  = $this->input->post('tndklnjt');
      $data['create_date']    = date("Y-m-d h:i:sa");
      // $data['rev']            = $this->input->post('revisi');


      $this->exanalisis->md_tambah($table, $data);
      $this->session->set_flashdata('success', 'Data berhasil ditambah');
      redirect('ukes/inukes');

    }

  }

  public function ct_save_nilai(){

    $key = $this->input->post('id');

    $this->load->model('ukes/loadukes');
    $query = $this->loadukes->md_nilai($key);

    if ($query->num_rows()>0) {

      $data['id_pkms']        = $this->input->post('pkms');
      $data['id_sasaran']     = $this->input->post('idssrn');
      $data['total']          = $this->input->post('total');
      $data['target']         = $this->input->post('target');
      $data['pencapaian']     = $this->input->post('pncp');
      $data['analisa']        = $this->input->post('analisa');
      $data['tindak_lanjut']  = $this->input->post('tndklnjt');
      $data['edit_date']      = date("Y-m-d h:i:s");

      $this->loadukes->md_update_nilai($key, $data);
      $this->session->set_flashdata('sucsess', 'Data berhasil diubah');
      redirect('ukes/inukes');

    }else{

      $data['id_pkms']        = $this->input->post('pkms');
      $data['id_sasaran']     = $this->input->post('idssrn');
      $data['idukes_d']       = $this->input->post('id');
      $data['total']          = $this->input->post('total');
      $data['target']         = $this->input->post('target');
      $data['pencapaian']     = $this->input->post('pncp');
      $data['analisa']        = $this->input->post('analisa');
      $data['tindak_lanjut']  = $this->input->post('tndklnjt');
      $data['create_date']    = date("Y-m-d h:i:s");

      $this->loadukes->md_tmbh_nilai($data);
      $this->session->set_flashdata('sucsess', 'Data berhasil diubah');
      redirect('ukes/inukes');

    }
  }

}
