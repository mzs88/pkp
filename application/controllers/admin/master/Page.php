<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/master/dataload');
		$this->load->model('admin/master/Execute');
	}

	public function index()
	{
		$data['ukesA'] = $this->dataload->dtUkesA();
		$data['ukesB'] = $this->dataload->dtUkesB();
		$comp['content'] 	= $this->load->view('admin/master/bobot',$data,true);
		$comp['jdl']			= 'Bobot Upaya Kesehatan dan Program';
		$comp['topnav'] 	= $this->ct_topnav();
		$comp['sidebar'] 	= $this->ct_sidebar();

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

	public function getBbtA()
	{
		$key = $this->input->post('id');
		$query = $this->dataload->getBbtA($key);
		header('Conten-Type: application/json');
    echo json_encode($query);
	}

	public function getBbtB()
	{
		$key = $this->input->post('id');
		$query = $this->dataload->getBbtB($key);
		header('Conten-Type: application/json');
    echo json_encode($query);
	}

	public function bbtAsave()
	{
		$key = $this->input->post('idbbt');
		$field = $this->input->post('field');
		$table = $this->input->post('table');
		$fieldukes = $this->input->post('fieldukes');

		$query = $this->Execute->checkBbtA($key, $field, $table);
		if ($query->num_rows()>0)
		{
			$data['idoperator']	= $this->input->post('op');
			$data[$fieldukes]		= $this->input->post('idukes');
			$data['bobot']			= $this->input->post('bbt');
			$data['edit_date']	= date("Y-m-d h:i:sa");

			$this->Execute->editBbtA($key, $field, $table, $data);
			$this->session->set_flashdata('info', 'Data berhasil dirubah');
		}
		else
		{
			$data['idoperator']		= $this->input->post('op');
			$data[$fieldukes]			= $this->input->post('idukes');
			$data['bobot']				= $this->input->post('bbt');
			$data['create_date']	= date("Y-m-d h:i:sa");

			$this->Execute->inBbtA($table, $data);
			$this->session->set_flashdata('info', 'Data berhasil ditambah');
			echo "insert";
		}
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/admin/master/Page.php */