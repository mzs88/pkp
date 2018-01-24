<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Listukk extends CI_Controller {


		public function index(){
			$this->auth->authAdmin();
			$this->load->model('admin/ukk/loaddata');

			$ukesa = $this->db->get('ukes_a');
			$anu = $ukesa->row();

			$data = array(
				'dbukesa' => $this->db->get('ukes_a')->result(),
				$this->db->where('idukes_a', 3),
				'dbukesb' => $this->db->get('ukes_b')->result(),
				'dbukesc' => $this->db->get('ukes_c')->result(),
				'dbukesd' => $this->db->get('ukes_d')->result()
			);

			$comp = array(
				'content' => $this->load->view('admin/ukk/listukk', $data, true),
				'jdl'		=> 'List UKK',
				'topnav' => $this->ct_topnav(),
				'sidebar' => $this->ct_sidebar()
			);

			$this->load->view('admin/home',$comp);

		}

		public function ukb($key){
			$this->db->where('idukes_a',$key);
			$this->db->get('ukes_b');
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

	}
?>
