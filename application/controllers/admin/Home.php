<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('auth');
			$this->load->model('admin/chart/data');
			$this->auth->authAdmin();
		}

		public function index()
		{
			$data['jdl'] = 'Dashbord';
			$data['ani'] = 'ani';
			$comp = array(
				'content' => $this->load->view('admin/content', $data, true),
				'topnav' => $this->ct_topnav(),
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
			redirect('admin/login');
		}

		public function getData()
		{
			$data['bln']  = date('m');
			$data['thn']  = date('Y');
			$data['pkms'] = $this->data->pkmsRekap();

			$sumUkes = 0;
			$sumMnj  = 0;
			$sumMt   = 0;
			$data;

			$chart = $this->load->view('admin/chart/chart',$data,true);
			echo $chart;

		}
	}
?>
