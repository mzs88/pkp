<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rekap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->load->model('m_data_rekap');
		$this->load->model('m_data_ukes');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data["ukesRkpA"] = $this->m_data_rekap->ukesRkpA()->result();

		$comp['jdl']     = "Input Data Manajemen";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('rekap/v_rekap_pkms', $data, true);
		$this->load->view('home/v_pkms_home', $comp, FALSE);
	}

	public function topnav()
	{
		$data = array();
		return $this->load->view('topnav/v_pkms_topnav', $data, true);
	}

	public function sidebar()
	{
		$data = array();
		return $this->load->view('sidebar/v_pkms_sidebar', $data, true);
	}

}

/* End of file C_rekap_pkms.php */
/* Location: ./application/controllers/C_rekap_pkms.php */