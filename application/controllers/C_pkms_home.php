<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pkms_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->load->model('m_chart_pkms');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data = array();
		$comp['jdl']     = "Dashboard";
		$comp['topnav']  = $this->topnav();
		$comp['sidebar'] = $this->sidebar();
		$comp['content'] = $this->load->view('content/v_pkms_content', $data,true);
		$this->load->view('home/v_pkms_home', $comp, false);
	}

	public function topnav()
	{
		$data = array();
		return $this->load->view("topnav/v_pkms_topnav", $data, true);
	}

	public function sidebar()
	{
		$data = array();
		return $this->load->view('sidebar/v_pkms_sidebar', $data, true);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('c_login','refresh');
	}

	public function getChart($value='')
	{
		$data["pkms"]     = $this->session->userdata('idpkms');
		$data["bln"]      = date("m");
		$data["thn"]      = date("Y");
		// $data["puskes"]   = $this->m_chart_pkms->getBulan()->result();
		$data["ukesChartA"] = $this->m_chart_pkms->ukesChartA()->result();
		$data["ktgMutu"]  = $this->m_chart_pkms->getKtgMutuChart()->result();
		$result           = $this->load->view('help/data_chart_pkms', $data, true);
		echo $result;
	}

}

/* End of file C_pkms_home.php */
/* Location: ./application/controllers/C_pkms_home.php */