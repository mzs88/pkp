<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Target extends CI_Controller {

	public function index(){
		$this->auth->authAdmin();
    $this->load->model('admin/target/loaddata');

    $data['target']     = $this->loaddata->mdl_target();
    $data['dbukkd']     = $this->loaddata->mdl_ukkd();
    $data['sasaran']    = $this->loaddata->mdl_sasaran();
    $data['trgt']       ='';
    $data['idslctUKK']  ='';
    $data['idslctSsrn'] ='';
    $data['slctUKK']    ='--Pilih--';
    $data['slctOP']     ='--Pilih--';
    $data['slctSsrn']   ='--Pilih--';
    $data['slctThn']    ='--Pilih--';

    $comp['content']    = $this->load->view('admin/target/target', $data, true);
    $comp['jdl']        = "Target Tahunan";
    $comp['topnav']     = $this->ct_topnav();
    $comp['sidebar']    = $this->ct_sidebar();

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

	public function ct_loadUkk(){
		$this->auth->authAdmin();
		$this->db->get('view_target');
	}

	public function ct_tambah(){
		$this->auth->authAdmin();
		$val = array(
			'dbukkd' => $this->db->query(
                    'SELECT
                    	ukes_d.idukes_d,
                    	ukes_d.ukes_d
                    FROM
                    	ukes_d
                    WHERE
                    	idukes_d NOT IN (
                    		SELECT
                    			target.idukes_d
                    		FROM
                    			target
                    	)'),
			'ssrn' 				=> $this->db->get('sasaran'),
			'slctOP'			=> '--Pilih--',
			'idslctUKK'		=> '',
			'slctUKK'			=> '--Pilih--',
			'idslctSsrn'	=> '',
			'slctSsrn'		=> '--Pilih--',
			'trgt'				=> '',
			'slctThn'			=> '--Pilih--'
		);
		$comp = array(
			'content' 		=> $this->load->view('admin/target/add', $val, true),
			'jdl'					=> 'Set Target',
			'topnav' 			=> $this->ct_topnav(),
			'sidebar' 		=> $this->ct_sidebar()
		);

		$this->load->view('admin/home',$comp);
	}

	public function ct_edit(){
		$this->auth->authAdmin();
		$key = $this->uri->segment(3);
		//$this->db->where('ukk_d.idukes_d', $key);
			$query = $this->db->query(
                "SELECT
                	ukes_d.idukes_d,
                	ukes_d.ukes_d,
                	sasaran.id_sasaran,
                	sasaran.sasaran,
                	target.op,
                	target.nilai,
                	target.tahun
                FROM
                	target
                INNER JOIN ukes_d ON ukes_d.idukes_d = target.idukes_d
                INNER JOIN sasaran ON sasaran.id_sasaran = target.id_sasaran
                WHERE
                	ukes_d.idukes_d = '$key'");

		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$val = array(
					'dbukkd'			=> $this->db->query(
                            'SELECT
                            	ukes_d.idukes_d,
                            	ukes_d.ukes_d
                            FROM
                            	ukes_d
                            WHERE
                            	idukes_d NOT IN (
                            		SELECT
                            			target.idukes_d
                            		FROM
                            			target
                            	)'),
					'ssrn'				=> $this->db->get('sasaran'),
					'slctOP'			=> $row->op,
					'idslctUKK'		=> $row->idukes_d,
					'slctUKK'			=> $row->ukes_d,
					'idslctSsrn'	=> $row->id_sasaran,
					'slctSsrn'		=> $row->sasaran,
					'trgt'				=> $row->nilai,
    			'slctThn'			=> $row->tahun
				);
			}
		}else{
			$val = array(
					'ukes_d' 			=> $this->db->query(
                            'SELECT
                            	ukes_d.idukes_d,
                            	ukes_d.ukes_d
                            FROM
                            	ukes_d
                            WHERE
                            	idukes_d NOT IN (
                            		SELECT
                            			target.idukes_d
                            		FROM
                            			target
                            	)'),
					'ssrn' 				=> $this->db->get('sasaran'),
					'slctOP'			=> '--Pilih--',
					'idslctUKK'		=> '',
					'slctUKK'			=> '--Pilih--',
					'idslctSsrn'	=> '',
					'slctSsrn'		=> '--Pilih--',
					'trgt'				=> '',
					'slctThn'			=> '--Pilih--'
				);
		}

		$comp = array(
			'content' => $this->load->view('admin/target/add', $val, true),
			'jdl'			=> 'Edit Target Tahunan',
			'topnav' 	=> $this->ct_topnav(),
			'sidebar' => $this->ct_sidebar()
		);

		$this->load->view('admin/home',$comp);
	}

	public function ct_simpan(){
		$this->auth->authAdmin();
		$key = $this->input->post('cmb_ukkd');
		$data = array(
			'idukes_d' 		=> $this->input->post('cmb_ukkd'),
			'id_sasaran' 	=> $this->input->post('cmb_sasaran'),
			'op' 					=> $this->input->post('cmb_op'),
			'nilai' 			=> $this->input->post('trgt'),
			'tahun' 			=> $this->input->post('cmb_thn')
		);

		$this->load->model('mdl_target');
		$query = $this->mdl_target->md_ambil($key);

		if ($query->num_rows()>0) {
			$this->mdl_target->md_update($key,$data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/target/target');
		}else{
			$this->mdl_target->md_tambah($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/target/target/ct_tambah');
		}
	}
}
