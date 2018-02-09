<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mutu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->load->model('m_data_mutu');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data["ktgMutu"] = $this->m_data_mutu->getKtgMutu()->result();

		$comp['jdl']     = "Input Data Mutu";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('mutu/v_input_mutu', $data, true);
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

/* End of file C_mutu.php */
/* Location: ./application/controllers/C_mutu.php */