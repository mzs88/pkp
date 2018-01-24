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
				'dbop' 	=> $this->db->get('operator')->result(),
				'idop'	=> "",
				'nama' 	=> "",
				'email'	=> "",
				'uname' => "",
				'sts' 	=> ""
			);
		$comp = array(
			'content' => $this->load->view('admin/user/view_usr', $data, true),
			'jdl'			=> 'Data User',
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

	public function ct_add(){

		$val = array(
			'idop'	=> "",
			'nama' 	=> "",
			'email'	=> "",
			'uname' => "",
			'sts' 	=> ''
		);
		$comp = array(
			'content' => $this->load->view('user/view_add', $val, true),
			'jdl'			=> 'Tambah Data User',
			'topnav' 	=> $this->ct_topnav(),
			'sidebar' => $this->ct_sidebar()
		);

		$this->load->view('home',$comp);
	}

	public function ct_save(){
		$this->mdl_auth->authAdmin();
		$key = $this->input->post('idop');


		$this->load->model('mdl_user');
		$query = $this->mdl_user->md_ambil($key);

		if ($query->num_rows()>0) {
			$data = array(

				'nama' 	=> $this->input->post('nama'),
				'email'	=> $this->input->post('email'),
				'uname' => $this->input->post('uname'),
				'sts' 	=> $this->input->post('sts')

			);
			$this->mdl_user->md_update($key,$data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/user/page');
		}else{
			$data = array(

				'nama' 			=> $this->input->post('nama'),
				'email'			=> $this->input->post('email'),
				'uname' 	  => $this->input->post('uname'),
				'pass	'   	=> md5($this->input->post('uname')),
				'sts' 			=> $this->input->post('sts')

			);
			$this->mdl_user->md_tambah($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('ctrl_user/ct_add');
		}
	}

	public function ct_edit(){

		$key = $this->uri->segment(3);
		$this->db->where('idoperator', $key);
		$query = $this->db->get('operator');

		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$val = array(
					'idop' 	=> $row->idoperator,
					'nama' 	=> $row->nama,
					'email'	=> $row->email,
					'uname' => $row->uname,
					'sts' 	=> $row->sts
				);
			}
		}else{
			$val = array(
				'idop'	=> "",
				'nama' 	=> "",
				'email'	=> "",
				'uname' => "",
				'sts'		=> ""
			);
		}

		$comp = array(
			'content' => $this->load->view('user/view_add', $val, true),
			'jdl'			=> 'Edit Data User',
			'topnav' 	=> $this->ct_topnav(),
			'sidebar' => $this->ct_sidebar()
		);

		$this->load->view('home',$comp);
	}

	public function ct_delete(){
		$this->mdl_auth->authAdmin();
		$this->load->model('mdl_user');
		$key = $this->uri->segment(3);
		$this->db->where('idoperator', $key);
		$query = 	$this->db->get('operator');

		if ($query->num_rows()>0) {
			$this->mdl_user->md_delete($key);
		}
		redirect('ctrl_user');
	}

	public function ct_reset(){
		$this->mdl_auth->authAdmin();
		$this->load->model('mdl_user');
		$key = $this->uri->segment(3);
		$this->db->where('idoperator', $key);
		$query = 	$this->db->get('operator');

		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$data = array(
					'pass' => md5($row->uname)
				);
			}
			$this->mdl_user->md_update($key,$data);
		}
		redirect('ctrl_user');
	}
}
?>
