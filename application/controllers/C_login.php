<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_verifikasi_login');
	}

	public function index()
	{
		$data = array();
		$this->load->view('v_login', $data);
	}

	public function verifikasi()
	{
		$uname = $this->input->post('UserName');
		$pass = md5($this->input->post('PassWord'));
		$checkAdmin = $this->m_verifikasi_login->chek_operator($uname, $pass);
		if ($checkAdmin->num_rows()>0)
		{
			foreach ($checkAdmin->result() as $valAdmin)
			{
				$sesAdmin["uname"] = $valAdmin->uname;
				$sesAdmin["nama"] = $valAdmin->nama;
				$sesAdmin["idop"] = $valAdmin->idoperator;
				$this->session->set_userdata( $sesAdmin );
			}
			redirect('c_admin_home','refresh');
		}
		else
		{
			$checkPkms = $this->m_verifikasi_login->chek_pkms($uname, $pass);
			if ($checkPkms->num_rows()>0)
			{
				foreach ($checkPkms->result() as $valPkms)
				{

					$sesPkms["uname"] = $valPkms->kode_pkms;
					$sesPkms["pkms"] = $valPkms->nm_pkms;
					$sesPkms["idpkms"] = $valPkms->id_pkms;
					$this->session->set_userdata( $sesPkms );
				}
				redirect('c_pkms_home','refresh');
			}
			else
			{
				$this->session->set_flashdata('Error', 'Login Gagal');
				redirect('c_login','refresh');
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */