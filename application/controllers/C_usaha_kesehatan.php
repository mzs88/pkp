<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usaha_kesehatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check_login');
		$this->load->model('m_data_ukes');
		$this->m_check_login->checkLoginSession();
	}

	public function index()
	{
		$data["dtUkesA"] = $this->m_data_ukes->loadUkesA();
		$comp['jdl']     = "Input Data Usaha Kesehatan";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('ukes/v_input_ukes', $data, true);
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

	public function ukesB()
	{
		$key  = $this->input->post('id');
		$json = $this->m_data_ukes->loadUkesB($key);
		header('Conten-Type: application/json');
    echo json_encode($json);
	}

	public function ukesC()
	{
		$key  = $this->input->post('id');
		$json = $this->m_data_ukes->loadUkesC($key);
		header("Conten-Type:application/json");
		echo json_encode($json);
	}

	public function ukesD()
	{

		$key  = $this->input->post('id');
		$pkms = $this->session->userdata('idpkms');
		$bln  = monthToNumber($this->input->post('bln'));
		$thn  = $this->input->post('thn');
		$data["checkData"] = $this->m_data_ukes->checkData($key, $pkms, $bln, $thn);
		$data["loadNilai"] = $this->m_data_ukes->loadNilaiUkes($key, $pkms, $bln, $thn)->result();
		$data["ukesD"] = $this->m_data_ukes->loadUkesD($key)->result();
		$result = $this->load->view('help/loadukes_d', $data, true);
		echo $result;

	}

	//save nilai ukes
	public function saveNilaiUkes()
	{
		foreach ((array)$this->input->post('idnilai') as $key=> $keyId)
		{
			$check = $this->m_data_ukes->checkDataUkes($keyId);
			if ($check->num_rows()>0)
			{
				$data['id_pkms']        = $this->session->userdata('idpkms');
        $data['id_sasaran']     = $this->input->post('idssrn')[$key];
        $data['idukes_d']       = $this->input->post('idukes')[$key];
        $data['total']          = $this->input->post('total')[$key];
        $data['target']         = $this->input->post('target')[$key];
        $data['pencapaian']     = $this->input->post('pncp')[$key];
        $data['analisa']        = $this->input->post('analisis')[$key];
        $data['tindak_lanjut']  = $this->input->post('tndklnjt')[$key];
        $data['bln']						= monthToNumber($this->input->post('bln'));
        $data['thn']						= $this->input->post('thn');
        $data['edit_date']      = date("Y-m-d h:i:sa");

				$this->m_data_ukes->updateNilaiUkes($keyId, $data);
			}
			else
			{
				$data['id_pkms']        = $this->session->userdata('idpkms');
        $data['id_sasaran']     = $this->input->post('idssrn')[$key];
        $data['idukes_d']       = $this->input->post('idukes')[$key];
        $data['total']          = $this->input->post('total')[$key];
        $data['target']         = $this->input->post('target')[$key];
        $data['pencapaian']     = $this->input->post('pncp')[$key];
        $data['analisa']        = $this->input->post('analisis')[$key];
        $data['tindak_lanjut']  = $this->input->post('tndklnjt')[$key];
        $data['bln']						= monthToNumber($this->input->post('bln'));
        $data['thn']						= $this->input->post('thn');
        $data['create_date']    = date("Y-m-d h:i:sa");

				$this->m_data_ukes->addNilaiUkes($data);
			}
		}

	}

	public function filterDataUkes()
	{
		$data = array();

		$comp['jdl']     = "Input Data Usaha Kesehatan";
		$comp["topnav"]  = $this->topnav();
		$comp["sidebar"] = $this->sidebar();
		$comp["content"] = $this->load->view('ukes/v_ukes_pkms', $data, true);
		$this->load->view('home/v_pkms_home', $comp, FALSE);
	}

	public function getDataFilter()
	{
		$data["pkms"] = $this->session->userdata('idpkms');
		$data["bln"] = monthToNumber($this->input->post('bln'));
		$data['thn'] = $this->input->post('thn');
		$data["dtUkesA"] = $this->m_data_ukes->loadUkesA();
		// $data["getFilter"] = $this->m_data_ukes->loadFilterData($pkms, $bln, $thn)->result();
		$result = $this->load->view('help/data_ukes', $data, true);
		echo $result;
	}

	public function scrollViewUkes()
	{
		$data["pkms"] = $this->session->userdata('idpkms');
		$data["bln"] = monthToNumber($this->input->post('bln'));
		$data['thn'] = $this->input->post('thn');
		$data["dtUkesA"] = $this->m_data_ukes->loadUkesA();
		// $data["getFilter"] = $this->m_data_ukes->loadFilterData($pkms, $bln, $thn)->result();
		$result = $this->load->view('help/scrol_ukes', $data, true);
		echo $result;
	}

	public function priviewDataUkes()
	{
		$pkms = $this->session->userdata('idpkms');
		$bln = monthToNumber($this->input->post('bln'));
		$thn = $this->input->post('thn');
	}



}

/* End of file C_usaka_kesehatan.php */
/* Location: ./application/controllers/C_usaka_kesehatan.php */