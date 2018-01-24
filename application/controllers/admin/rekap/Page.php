<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin/rekap/dataload');
	}

	public function index()
	{
		$data['jdl'] = 'Dashbord';
		$data['ani'] = 'ani';
		$comp = array(
			'content' => $this->load->view('admin/rekap/filter', $data, true),
			'topnav' => $this->ct_topnav(),
			'sidebar' => $this->ct_sidebar()

		);

		$this->load->view('admin/home',$comp);

	}

	public function ct_topnav()
	{
		$data = array();
		return $this->load->view('admin/topnav', $data, true);
	}

	public function ct_sidebar()
	{
		$data = array();
		return $this->load->view('admin/sidebar', $data, true);
	}

	public function viewdata()
	{
		$data['pkms'] = $this->input->get('pkms');
		$data['bln']  = $this->input->get('bln');
		$data['thn']  = $this->input->get('thn');
		$data['jdl']  = 'View Data';
		$comp = array(
			'content' => $this->load->view('admin/rekap/viewdata', $data, true),
			'topnav' => $this->ct_topnav(),
			'sidebar' => $this->ct_sidebar()

		);

		$this->load->view('admin/home',$comp);
	}



}

/* End of file Page.php */
/* Location: ./application/controllers/admin/rekap/Page.php */