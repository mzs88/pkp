<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data = array();
		$comp['jdl'] = 'Dashboard';
		$comp['topnav']  = $this->topnav();
		$comp['sidebar'] = $this->sidebar();
		$comp['content'] = $this->load->view('content/v_admin_content', $data,true);
		$this->load->view('home/v_admin_home', $comp, false);
	}

	public function topnav()
	{
		$data = array();
		return $this->load->view("topnav/v_admin_topnav", $data, true);
	}

	public function sidebar()
	{
		$data = array();
		return $this->load->view('sidebar/v_admin_sidebar', $data, true);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('c_login','refresh');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */