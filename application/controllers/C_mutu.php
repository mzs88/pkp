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

	public function getInputMutu()
	{
		$idktg           		= $this->input->post('idktg');
		$pkms            		= $this->session->userdata('idpkms');
		$bln             		= monthToNumber($this->input->post('bln'));
		$thn             		= $this->input->post('thn');
		$data["chekData"]		= $this->m_data_mutu->checkNiMutu($idktg, $pkms, $bln, $thn);
		$data["getVar"]  		= $this->m_data_mutu->loadVar($idktg, $pkms, $bln, $thn)->result();
		$data["getVarNiEv"] = $this->m_data_mutu->loadVarNiEv($idktg, $pkms, $bln, $thn)->result();

		$result = $this->load->view('help/data_mutu', $data, true);
		echo $result;
	}

	public function saveNilaiMutu()
	{
		foreach ((array)$this->input->post('idMtNilai') as $key => $value)
		{
			$check = $this->m_data_mutu->checkData($value);
			if ($check->num_rows()>0)
			{
				$data['id_pkms']			= $this->session->userdata('idpkms');
				$data['idmt_ktg']			= $this->input->post('idktg');
				$data['idmt_op_htng']	= $this->input->post('idMtVar')[$key];
				$data['total']				= $this->input->post('total')[$key];
				$data['capaian']			= $this->input->post('cpaian')[$key];
				$data['analisa']			= $this->input->post('analisa')[$key];
				$data['tndk_lnjt']		= $this->input->post('tndkLnjt')[$key];
				$data['bln']          = monthToNumber($this->input->post('bln'));
				$data['thn']          = $this->input->post('thn');
				$data['edit_date']	  = date("Y-m-d h:i:sa");

				$this->m_data_mutu->updateMutu($value, $data);
			}
			else
			{
				$data['id_pkms']			= $this->session->userdata('idpkms');
				$data['idmt_ktg']			= $this->input->post('idktg');
				$data['idmt_op_htng']	= $this->input->post('idMtVar')[$key];
				$data['total']				= $this->input->post('total')[$key];
				$data['capaian']			= $this->input->post('cpaian')[$key];
				$data['analisa']			= $this->input->post('analisa')[$key];
				$data['tndk_lnjt']		= $this->input->post('tndkLnjt')[$key];
				$data['bln']          = monthToNumber($this->input->post('bln'));
				$data['thn']          = $this->input->post('thn');
				$data['create_date']	= date("Y-m-d h:i:sa");

				$this->m_data_mutu->insertMutu($data);
			}
		}
	}

	public function viewDataMutu()
	{
		$data["ktgMutu"] = $this->m_data_mutu->getKtgMutu()->result();

		$comp['jdl']     = "View Data Mutu";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('mutu/v_mutu_pkms', $data, true);
		$this->load->view('home/v_pkms_home', $comp, FALSE);
	}

	public function getDataMutu()
	{
		$data["ktgMutu"] = $this->m_data_mutu->getKtgMutu()->result();
		$data["idpkms"]  = $this->session->userdata('idpkms');
		//$data["ktg"]     = $this->input->post('idktg');
		$data["bln"]     = monthToNumber($this->input->post('bln'));
		$data["thn"]     = $this->input->post('thn');

		$result          = $this->load->view('help/data_nilai_mutu', $data, true);
		echo $result;
	}

}

/* End of file C_mutu.php */
/* Location: ./application/controllers/C_mutu.php */