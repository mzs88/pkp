<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataload extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	public function dtUkesA()
	{
		return $this->db->query(
			"SELECT
		    a.idukes_a, a.ukes_a, bb.idbobot_a, bb.bobot
			FROM
		    ukes_a a
	        LEFT JOIN
		    bobot_a bb ON bb.idukes_a = a.idukes_a;")->result();
	}

	public function getBbtA($key)
	{
		$this->db->where('idukes_a',$key);
		return $this->db->get('bobot_a')->result();
	}

		public function getBbtB($key)
	{
		$this->db->where('idukes_b',$key);
		return $this->db->get('bobot_b')->result();
	}


	public function dtUkesB()
	{
		return $this->db->query(
			"SELECT
		    b.idukes_b, b.ukes_b, bb.idbobot_b, bb.bobot
			FROM
		    ukes_b b
	        LEFT JOIN
		    bobot_b bb ON bb.idukes_b = b.idukes_b")->result();
	}



}

/* End of file DataLoad.php */
/* Location: ./application/models/DataLoad.php */