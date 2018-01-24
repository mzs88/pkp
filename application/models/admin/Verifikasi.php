<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Verifikasi extends CI_Model {

		public function md_login($pkms, $pass){
			$ps = md5($pass);
			$this->db->where('uname',$pkms);
			$this->db->where('pass',$ps);
			$query = $this->db->get('operator');

			if ($query->num_rows()>0) {

				foreach ($query->result() as $row) {
					$sess['idop'] = $row->idoperator;
					$sess['uname'] = $row->uname;
					$sess['nama'] = $row->nama;
					$this->session->set_userdata($sess);
					redirect('admin/home');
				}

			}else{
				$this->session->set_flashdata('info', 'login gagal');
				redirect('admin/login');
			}

		}

	}
