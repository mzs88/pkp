<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Page extends CI_Controller {

    public function __construct()  {
      parent::__construct();

      $this->auth->authAdmin();
      $this->load->model('admin/pkms/execute');

    }

    public function index(){
			$data = array(
				'db_pkms' => $this->db->get('puskesmas')->result(),
				'idpkms'=> "",
				'kode' 	=> "",
				'nama' 	=> "",
				'kep' 	=> "",
				'almt' 	=> "",
				'tlpn' 	=> "",
				'jns' 	=> "",
				'long'	=> "",
				'lat'		=> "",
				'luas'	=> "",
				'poned'	=> "",
				'email'	=> "",
			);
			$comp = array(
				'content' => $this->load->view('admin/pkms/pkms', $data, true),
				'jdl'			=> 'Data Puskesmas',
				'topnav' 	=> $this->ct_topnav(),
				'sidebar' => $this->ct_sidebar()
			);

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

		public function ct_logout(){
			$this->session->sess_destroy();
			redirect('ctrl_login');
		}

		public function addpkms(){
			$val = array(
				'db_pkms' => $this->db->get('puskesmas')->result(),
				'idpkms'=> "",
				'kode' 	=> "",
				'nama' 	=> "",
				'kep' 	=> "",
				'almt' 	=> "",
				'tlpn' 	=> "",
				'jns' 	=> "",
				'long'	=> "",
				'lat'		=> "",
				'luas'	=> "",
				'poned'	=> "",
				'email'	=> "",
			);
			$comp = array(
				'content' => $this->load->view('admin/pkms/tamb', $val, true),
				'jdl'			=> 'Tambah Data Puskesmas',
				'topnav' 	=> $this->ct_topnav(),
				'sidebar' => $this->ct_sidebar()
			);

			$this->load->view('admin/home',$comp);
		}

		public function ct_rstpass(){
			$this->mdl_auth->authAdmin();
			$key = $this->input->post('idpkms');

			$query = $this->execute->md_ambil($key);

			if ($query->num_rows()>0) {
				$data = array(
					'idpkms'		=> $this->input->post('idpkms')
				);

				$this->execute->md_update($key,$data);
			}
		}

		public function savepkms(){
			$key = $this->input->post('idpkms');

			$query = $this->execute->md_ambil($key);

			if ($query->num_rows()>0) {
				$data = array(
					'id_pkms'			=> $this->input->post('idpkms'),
					'kode_pkms' 	=> $this->input->post('kode'),
					'nm_pkms' 		=> $this->input->post('nama'),
					'kepala_pkms' => $this->input->post('kep'),
					'almt_pkms' 	=> $this->input->post('almt'),
					'phone_pkms' 	=> $this->input->post('tlpn'),
					'jenis' 			=> $this->input->post('jns'),
					'long'				=> $this->input->post('long'),
					'lat'					=> $this->input->post('lat'),
					'luas'				=> $this->input->post('luas'),
					'poned'				=> $this->input->post('poned'),
					'email_pkms'	=> $this->input->post('email'),
          'idoperator'        => $this->input->post('idop'));
				$this->execute->md_update($key, $data);
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/pkms/page');
			}else{
				$data = array(
					'id_pkms'     => $this->input->post('idpkms'),
					'kode_pkms' 	=> $this->input->post('kode'),
					'nm_pkms' 		=> $this->input->post('nama'),
					'kepala_pkms' => $this->input->post('kep'),
					'almt_pkms' 	=> $this->input->post('almt'),
					'phone_pkms' 	=> $this->input->post('tlpn'),
					'jenis' 		  => $this->input->post('jns'),
					'long'		    => $this->input->post('long'),
					'lat'			    => $this->input->post('lat'),
					'luas'		    => $this->input->post('luas'),
					'poned'		    => $this->input->post('poned'),
					'email_pkms'	=> $this->input->post('email'),
					'pass' 		    => md5($this->input->post('kode')),
          'idoperator'        => $this->input->post('idop'));

				$this->execute->md_tambah($data);
				$this->session->set_flashdata('success', 'Data berhasil ditambah');
				redirect('admin/pkms/page/addpkms');
			}


		}

		public function editpkms(){

			$key = $this->uri->segment(5);
			$this->db->where('id_pkms', $key);
			$query = $this->db->get('puskesmas');

			if ($query->num_rows()>0) {
				foreach ($query->result() as $row) {
					$val = array(
						'idpkms'=> $row->id_pkms,
						'kode' 	=> $row->kode_pkms,
						'nama' 	=> $row->nm_pkms,
						'kep' 	=> $row->kepala_pkms,
						'almt' 	=> $row->almt_pkms,
						'tlpn' 	=> $row->phone_pkms,
						'jns' 	=> $row->jenis,
						'long'	=> $row->long,
						'lat'		=> $row->lat,
						'luas'	=> $row->luas,
						'poned'	=> $row->poned,
						'email'	=> $row->email_pkms,
            'idop'  => $row->idoperator
					);
				}
			}else{
				$val = array(
					'idpkms'=> "",
					'kode' 	=> "",
					'nama' 	=> "",
					'kep' 	=> "",
					'almt' 	=> "",
					'tlpn' 	=> "",
					'jns' 	=> "",
					'long'	=> "",
					'lat'		=> "",
					'luas'	=> "",
					'poned'	=> "",
					'email'	=> "",
          'idop'  => ""
					);
			}

			$comp = array(
				'content' => $this->load->view('admin/pkms/tamb', $val, true),
				'jdl'			=> 'Edit Data Puskesmas',
				'topnav' 	=> $this->ct_topnav(),
				'sidebar' => $this->ct_sidebar()
			);

			$this->load->view('admin/home',$comp);
		}

		public function ct_delete(){

			$key = $this->uri->segment(3);
			$this->db->where('id_pkms', $key);
			$query = 	$this->db->get('puskesmas');

			if ($query->num_rows()>0) {

				$this->execute->md_delete($key);
			}
			redirect('admin/pkms/page');
		}
		public function ct_reset(){

			$key = $this->uri->segment(3);


			$this->db->where('id_pkms', $key);
			$query = $this->db->get('puskesmas');

			if($query->num_rows()>0){
				foreach ($query->result() as $rows){
					$data = array(
						'pass' => md5($rows->kode_pkms),
					);
				}

				$this->execute->md_reset($key, $data);
				$this->session->set_flashdata('success', 'Data berhasil diubah');
				redirect('admin/pkms/page');
			}

		}

  }

?>
