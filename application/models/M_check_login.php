<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_check_login extends CI_Model {

	// public function checkPkms()
	// {
	// 	$sess = $this->session->userdata('kode');
	// 	if (empty($sess)) {
	// 		$this->session->session_destroy();
	// 		redirect('c_login','refresh');
	// 	}
	// }

	public function checkLoginSession()
	{
		$sess = $this->session->userdata('uname');
		if (empty($sess)) {
			$this->session->sess_destroy();
			redirect('c_login','refresh');
		}
	}

}

/* End of file Check_login.php */
/* Location: ./application/models/Check_login.php */