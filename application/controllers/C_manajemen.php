<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manajemen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->load->model('m_data_mnj');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data["ktgMnj"] = $this->m_data_mnj->loadKtgMnj()->result();

		$comp['jdl']     = "Input Data Manajemen";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('manajemen/v_input_mnj', $data, true);
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

	public function getDataInput()
	{
		$key = $this->input->post('id');
		$pkms = $this->session->userdata('idpkms');
		$bln = monthToNumber($this->input->post('bln'));
		$thn = $this->input->post('thn');

		$data["checkVarNi"] = $this->m_data_mnj->checkVarNi($key, $pkms, $bln, $thn);
		$data["getVarNi"] = $this->m_data_mnj->loadVarNilai($key, $pkms, $bln, $thn)->result();
		$data["getVar"] = $this->m_data_mnj->loadVar($key)->result();

		$result = $this->load->view('help/variable_mnj', $data, true);
		echo $result;
	}

	public function saveNilaiMnj()
	{
		foreach ((array)$this->input->post('idnilai') as $key => $value)
    {
      $query = $this->m_data_mnj->cekData($value);
      if ($query->num_rows()>0)
      {
          $data['id_pkms']      = $this->session->userdata('idpkms');
          $data['id_ktgmanaj']  = $this->input->post('ktg');
          $data['id_manajvar']  = $this->input->post('idvar')[$key];
          $data['hasil']        = $this->input->post('nilai')[$key];
          $data['bln']          = monthToNumber($this->input->post('bln'));
          $data['thn']          = $this->input->post('thn');
          //$data['total']        = $this->input->post('totNilai');
          $data['edit_date']    = date("Y-m-d h:i:sa");

          $this->m_data_mnj->updateMnj($value, $data); #update data
      }
      else
      {
          $data['id_pkms']      = $this->session->userdata('idpkms');;
          $data['id_ktgmanaj']  = $this->input->post('ktg');
          $data['id_manajvar']  = $this->input->post('idvar')[$key];
          $data['hasil']        = $this->input->post('nilai')[$key];
          $data['bln']          = monthToNumber($this->input->post('bln'));
          $data['thn']          = $this->input->post('thn');
          //$data['total']        = $this->input->post('totNilai');
          $data['create_date']  = date("Y-m-d h:i:sa");

          $this->m_data_mnj->insertMnj($data); #update data
      }
    }
	}

	public function viewDataMnj()
	{
		$data = array();

		$comp['jdl']     = "View Data Manajemen";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('manajemen/v_data_mnj_pkms', $data, true);
		$this->load->view('home/v_pkms_home', $comp, FALSE);
	}

	public function getDataMnj()
	{
		$data["idpkms"]  = $this->session->userdata('idpkms');
		$data["bln"] 		 = monthToNumber($this->input->post('bln'));
		$data["thn"]     = $this->input->post('thn');
		$data["ktgmnj"]  = $this->m_data_mnj->loadKtgMnj()->result();

		$result = $this->load->view('help/data_mnj', $data, true);
		echo $result;
	}

}

/* End of file C_manajemen.php */
/* Location: ./application/controllers/C_manajemen.php */